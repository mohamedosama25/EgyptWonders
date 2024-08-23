<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body >
    <nav id="navbar"></nav>
    <div class="account-container">
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo "<h1>" . $_SESSION['username'] . "</h1>";
            echo "<h2>" . $_SESSION['email'] . "</h2>";
            echo "<h2>" . $_SESSION['phone'] . "</h2>";
            echo" <p><a href='logout.php'>Logout</a></p>";
        } else {
            echo "<p>Please <u><a href='signin.php'>sign in</a></u> to view your account details.</p>";
        }
        ?>
       
    </div>
    <script src="js/navbar.js"></script>
</body>
</html>
