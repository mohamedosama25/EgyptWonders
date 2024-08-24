<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav id="navbar"></nav>
    
    <div id="loading-screen"></div>

    <?php
session_start();
if (isset($_SESSION['username'])) {
    echo "<h1 class='quote'>" . $_SESSION['username'] . "'s Saved Places</h1>";
    echo "<a href='logout.php'>
            <button class='Btn'>
                <div class='sign'>
                    <svg viewBox='0 0 512 512'>
                        <path d='M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z'></path>
                    </svg>
                </div>
                <div class='text'>Logout</div>
            </button>
          </a>";

    // Fetch saved places for the logged-in user
    $username = $_SESSION['username'];

    $dbHost = 'localhost';
    $dbName = 'egyptwonders';
    try {
        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4", 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT saved_places FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $user['saved_places']) {
            $savedPlacesIds = json_decode($user['saved_places'], true);

            // Load the places data from the JSON file
            $placesData = file_get_contents('places.json');
            $places = json_decode($placesData, true);

            // Filter the places that are saved by the user
            $savedPlaces = array_filter($places, function($place) use ($savedPlacesIds) {
                return in_array($place['id'], $savedPlacesIds);
            });

            echo "<div id='cards-container' style=' flex-wrap: wrap;'></div>";
            echo "<script>
                const places = " . json_encode(array_values($savedPlaces)) . ";
                function createCards(startIndex) {
                    const container = document.getElementById('cards-container');
                    container.innerHTML = '';

                    for (let i = startIndex; i < startIndex + places.length; i++) {
                        const place = places[i % places.length];
                        const card = document.createElement('div');
                        card.className = 'card';

                        const img = document.createElement('img');
                        img.setAttribute('src', place.imagesrc);
                        img.setAttribute('alt', place.name);

                        const contentDiv = document.createElement('div');
                        contentDiv.className = 'card__content';

                        const title = document.createElement('p');
                        title.className = 'card__title';
                        title.textContent = place.name;

                        const description = document.createElement('p');
                        description.className = 'card__description';
                        description.textContent = place.description;

                        contentDiv.appendChild(title);
                        contentDiv.appendChild(description);
                        card.appendChild(img);
                        card.appendChild(contentDiv);

                        card.addEventListener('click', () => {
                            window.location.href = 'pageDetails.php?id=' + place.id;
                        });

                        container.appendChild(card);
                    }
                }
                createCards(0);
                </script>";
        } else {
            echo "<p>You don't have any saved places.</p>";
        }
    } catch (PDOException $e) {
        echo "<p>Error fetching saved places: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p class='please-lo'>Please <u><a href='signin.php'>sign in</a></u> to view your account details.</p>";
}
?>

<script src="js/navbar.js"></script>
</body>
</html>
