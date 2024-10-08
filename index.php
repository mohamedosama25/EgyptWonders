<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Egypt Wonders</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <div id="loading-screen"></div>
    <nav id="navbar"></nav>
    <h1 class="quote">
      Uncover Egypt's wonders, from the majestic pyramids to the palms of
      paradise!
    </h1>

    <div class="slider" id="slider">
        <button id="prev">&lt;</button>
        <div class="slider-content" id="slider-content"></div>
        <button id="next">&gt;</button>
    </div>
<?php
  session_start();
if (!isset($_SESSION['username'])){
    echo"<h2 id='register'>New here? <a href='signup.php'>Register</a>to save your favourite places!  </h2>";
}
?>
    <script src="js/navbar.js"></script>
    <script src="js/index.js"></script>
</body>
</html>
<!-- testtttt -->
