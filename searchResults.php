<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'egyptWonders');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search query from the URL
$query = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';

$sql = "SELECT 'place' AS type, id, name, imagesrc AS image, description, prices, '' AS link
        FROM places
        WHERE name LIKE '%$query%' OR description LIKE '%$query%'
        UNION
        SELECT 'hotel' AS type, id, name, outsideimg AS image, description, prices, link
        FROM hotels
        WHERE name LIKE '%$query%' OR city LIKE '%$query%' OR description LIKE '%$query%'";


$result = $conn->query($sql);

$results = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }
}

// Return the results as JSON
header('Content-Type: application/json');
echo json_encode($results);

// Close the connection
$conn->close();
?>
