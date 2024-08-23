<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body style="background-color: rgb(56, 53, 53)">
  <nav id="navbar"></nav>
  <div id="loading-screen"></div>
  <div class="auth-container">
    <h1 id="sign">Sign Up</h1>
    <form action="signUp.php" method="post">
      <label for="username">Username</label>
      <input
        class="input-signup"
        type="text"
        id="username"
        name="username"
        placeholder="Enter a username"
        required />

      <label for="email">Email</label>
      <input
        class="input-signup"
        type="email"
        id="email"
        name="email"
        placeholder="Enter Your Email" />

      <label for="phone">Phone Number</label>
      <input
        class="input-signup"
        type="tel"
        id="phone"
        name="phone"
        required
        placeholder="Enter Your Phone Number" />

      <label for="password">Password</label>
      <input
        class="input-signup"
        type="password"
        id="password"
        name="password"
        required
        placeholder="Enter a password" />

      <label for="confirm-password">Confirm Password</label>
      <input
        class="input-signup"
        type="password"
        id="confirm-password"
        name="confirm-password"
        required
        placeholder="Confirm Your Password" />

      <button type="submit">Sign Up</button>
    </form>
    <p id="user">Already a user? <a href="signin.php">Login</a></p>
  </div>
  <script src="js/navbar.js"></script>
</body>

<?php
$conn = mysqli_connect("localhost", "root", "", "egyptWonders");
if (!$conn) {
  die('Could not Connect to MySQL: ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirm-password"];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script> alert('Please enter a valid mail') </script>";
  } else if (strlen($password) < 8) {
    echo "<script> alert('Password should be at least 8 characters') </script>";
  }
  else if ($password != $confirmpassword) {
    echo "<script> alert('Passwords do npt match') </script>";
  }
  else{
    $hashedpassword = md5($password);
    $sql = "INSERT INTO users (username, email, phone, password) 
              VALUES ('$username', '$email', '$phone', '$hashedpassword')";

  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Registration successful!'); window.location.href='signin.php';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }           
           
  }
}

mysqli_close($conn);

?>

</html>