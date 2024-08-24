<!-- <?php
// Database connection
// $conn = new mysqli('localhost', 'root', '', 'egyptWonders');

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Read the JSON file
// $json_data = file_get_contents('places.json');
// $places = json_decode($json_data, true);

// // Insert data into the database
// foreach ($places as $place) {
//     $name = $conn->real_escape_string($place['name']);
//     $imagesrc = $conn->real_escape_string($place['imagesrc']);
//     $description = $conn->real_escape_string($place['description']);
//     $prices = $conn->real_escape_string(json_encode($place['price']));
//     $hours = $conn->real_escape_string($place['hours']);
//     $hotels = $conn->real_escape_string(json_encode($place['hotels']));

//     $sql = "INSERT INTO places (name, imagesrc, description, prices, hours, hotels) 
//             VALUES ('$name', '$imagesrc', '$description', '$prices', '$hours', '$hotels')";

//     if ($conn->query($sql) === TRUE) {
//         echo "Record added successfully<br>";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
// }

// // Close connection
// $conn->close();
?> -->
<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'egyptWonders');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read the JSON file
$json_data = file_get_contents('hotels.json');
$hotels = json_decode($json_data, true);

// Insert data into the database
foreach ($hotels as $hotel) {
    $name = $conn->real_escape_string($hotel['name']);
    $city = $conn->real_escape_string($hotel['city']);
    $insideimg = $conn->real_escape_string($hotel['insideimg']);
    $outsideimg = $conn->real_escape_string($hotel['outsideimg']);
    $description = $conn->real_escape_string($hotel['description']);
    $prices = $conn->real_escape_string($hotel['prices']);
    $link = $conn->real_escape_string($hotel['link']);

    $sql = "INSERT INTO hotels (name, city, insideimg, outsideimg, description, prices, link) 
            VALUES ('$name', '$city', '$insideimg', '$outsideimg', '$description', '$prices', '$link')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
