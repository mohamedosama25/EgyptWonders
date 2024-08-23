<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body style="background-color: rgb(56, 53, 53)">
    <nav id="navbar"></nav>
    <div id="loading-screen"></div>
    <div id="login">
    <div class="auth-container">
        <h1 id="sign">Sign In</h1>
        <form action="signIn.php" method="post">
            <label for="username">Username</label>
            <input  class="input-signup" type="text" id="username" name="username" required placeholder="Enter Your Username">
            
            <label for="password">Password</label>
            <input  class="input-signup" type="password" id="password" name="password" required placeholder="Enter Your Password">
            
            <button type="submit">Sign In</button>
        </form>
        <p id="user">New user? <a href="signup.php">Sign Up</a></p>
    </div></div>
    <?php
    session_start();  //bn3ml session 3shan nst5dmha accrross pages

    $conn = mysqli_connect("localhost", "root", "", "egyptWonders");
    if (!$conn) {
        die('Could not Connect to MySQL: ' . mysqli_connect_error());
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $hashedpassword = md5($password);

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$hashedpassword'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone'] = $row['phone'];
            echo '<script>alert("Login Successful"); window.location.href = "index.html"</script>';

        } else {
            echo '<script>alert("Invalid Username or Password")</script>';
        }
    }




    ?>
    <script src="js/navbar.js"></script>
</body>
</html>
