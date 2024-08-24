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

    // Retrieve the current saved places for the user
    $stmt = $pdo->prepare("SELECT saved_places FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo json_encode(['status' => 'error', 'message' => 'User not found']);
        exit;
    }

    $savedPlaces = json_decode($user['saved_places'], true) ?: [];
    echo json_encode(['status' => 'success', 'saved_places' => $savedPlaces]);
} catch (PDOException $e) {
    // Handle database errors
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
