<?php
session_start();
header('Content-Type: application/json');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit;
}

// Retrieve the username from the session
$username = $_SESSION['username'];

// Database configuration
$dbHost = 'localhost';
$dbName = 'egyptwonders';

try {
    // Connect to the database using PDO
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the raw POST data
    $data = json_decode(file_get_contents('php://input'), true);

    if (!isset($data['placeId']) || !isset($data['action'])) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
        exit;
    }

    $placeId = $data['placeId'];
    $action = $data['action'];

    // Retrieve the current saved places for the user
    $stmt = $pdo->prepare("SELECT saved_places FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo json_encode(['status' => 'error', 'message' => 'User not found']);
        exit;
    }

    $savedPlaces = json_decode($user['saved_places'], true) ?: [];

    // Modify the saved places based on the action
    if ($action === 'add' && !in_array($placeId, $savedPlaces)) {
        $savedPlaces[] = $placeId;
    } elseif ($action === 'remove') {
        $savedPlaces = array_filter($savedPlaces, function ($id) use ($placeId) {
            return $id != $placeId; // Use != to allow string/int comparison
        });
        // Reindex the array to maintain JSON array structure
        $savedPlaces = array_values($savedPlaces);
    }

    // Update the saved places in the database
    $stmt = $pdo->prepare("UPDATE users SET saved_places = ? WHERE username = ?");
    $stmt->execute([json_encode($savedPlaces), $username]);

    echo json_encode(['status' => 'success', 'saved_places' => $savedPlaces]);
} catch (PDOException $e) {
    // Handle database errors
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
