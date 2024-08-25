<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <nav id="navbar"></nav>
  <div id="loading-screen"></div>
  <div class="auth-page">
    <div class="auth-container">
      <h1 id="sign">Sign Up</h1>
      <?php
        // Initialize variables
        $username = $email = $phone = $password = $confirmpassword = "";
        
        // Error handling
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $password = $_POST["password"];
            $confirmpassword = $_POST["confirm-password"];

            // Validation
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Please enter a valid email !';
            } 
            if (strlen($password) < 8) {
                $errors[] = 'Password should be at least 8 characters !';
            } 
            if ($password != $confirmpassword) {
                $errors[] = 'Passwords do not match !';
            } 
            if (empty($username) || empty($password) || empty($email) || empty($phone)) {
                $errors[] = 'Please fill in all fields !';
            }

            // If no errors, proceed to insert the data
            if (empty($errors)) {
                $conn = mysqli_connect("localhost", "root", "", "egyptWonders");
                if (!$conn) {
                    die('Could not Connect to MySQL: ' . mysqli_connect_error());
                }

                // Check if the username already exists
                $sql = "SELECT * FROM users WHERE username='$username'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $errors[] = 'Username already taken, please choose another one !';
                } else {
                    // Insert the user into the database
                    $hashedpassword = md5($password);
                    $sql = "INSERT INTO users (username, email, phone, password) 
                              VALUES ('$username', '$email', '$phone', '$hashedpassword')";

                    if (mysqli_query($conn, $sql)) {
                        echo "<script> window.location.href='signin.php';</script>";
                        exit(); // Prevent further execution
                    } else {
                        $errors[] = "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }

                mysqli_close($conn);
            }

            // Pass PHP errors to JavaScript for toast display
            if (!empty($errors)) {
                echo "<script>
                          window.onload = function() {
                              var errors = " . json_encode($errors) . ";
                              
                                  showToast(errors[0]);
                                  scrollToBottom();
                              
                          };
                      </script>";
            }
        }
      ?>

      

      <form action="signUp.php" method="post">
        <label for="username">Username</label>
        <input
          class="input-signup"
          type="text"
          id="username"
          name="username"
          placeholder="Enter a username"
          required
          value="<?php echo htmlspecialchars($username); ?>" />

        <label for="email">Email</label>
        <input
          class="input-signup"
          type="email"
          id="email"
          name="email"
          placeholder="Enter Your Email"
          value="<?php echo htmlspecialchars($email); ?>" />

        <label for="phone">Phone Number</label>
        <input
          class="input-signup"
          type="tel"
          id="phone"
          name="phone"
          required
          placeholder="Enter Your Phone Number"
          value="<?php echo htmlspecialchars($phone); ?>" />

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
      <div class="toast-container" id="toast-container"></div>
    </div>
  </div>
  <script src="js/navbar.js"></script>
  <script>
    // Function to show toast message
    function showToast(message) {
      var toastContainer = document.getElementById('toast-container');
      var toast = document.createElement('div');
      toast.className = 'toast';
      toast.innerText = message;

      toastContainer.appendChild(toast);

      // Show the toast
      setTimeout(() => {
        toast.classList.add('show');
      }, 300);

      // Hide the toast after 3 seconds
      setTimeout(() => {
        toast.classList.remove('show');
        toast.addEventListener('transitionend', () => toast.remove());
      }, 3000);
    }

    // Function to scroll to the bottom of the page
    function scrollToBottom() {
      window.scrollTo(0, document.body.scrollHeight);

    }
  </script>
</body>

</html>
