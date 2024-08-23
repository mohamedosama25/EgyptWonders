<?php

require_once 'Backend/signup_view.inc.php';
require_once 'Backend/config_session.inc.php';
?>


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

        <form action="Backend/signup.inc.php" method="post">
         

          <button type="submit">Sign Up</button>
        </form>
        <p id="user">Already a user? <a href="signin.html">Login</a></p>
      </div>
    </div>
    <script src="js/navbar.js"></script>

    <?php
    check_signip_errors();
    ?>

  </body>
</html>
