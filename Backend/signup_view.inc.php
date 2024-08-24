<?php
declare(strict_types=1);

function signup_inputs(){
    ?>
    <label for="username">Username</label>
    <input
      class="input-signup"
      type="text"
      id="username"
      name="username"
      placeholder="Enter a username"
      required
    />

    <label for="email">Email</label>
    <input
      class="input-signup"
      type="email"
      id="email"
      name="email"
      placeholder="Enter Your Email"
    />

    <label for="phone">Phone Number</label>
    <input
      class="input-signup"
      type="tel"
      id="phone"
      name="phone"
      required
      placeholder="Enter Your Phone Number"
    />

    <label for="password">Password</label>
    <input
      class="input-signup"
      type="password"
      id="password"
      name="password"
      required
      placeholder="Enter a password"
    />

    <label for="confirm-password">Confirm Password</label>
    <input
      class="input-signup"
      type="password"
      id="confirm-password"
      name="confirm-password"
      required
      placeholder="Confirm Your Password"
    />

    <?php
    if(isset($_SESSION["signupData"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])){
        
        echo '<input
      class="input-signup"
      type="text"
      id="username"
      name="username"
      placeholder="Enter a username" value="' . $_SESSION["signupData"]["username"] . '"
      required
    />';

    }


    if(isset($_SESSION["signupData"]["email"]) && !isset($_SESSION["errors_signup"]["email_registered"])  && !isset($_SESSION["errors_signup"]["email_invalid"])){
        echo ' <input
      class="input-signup"
      type="email"
      id="email"
      name="email"
      placeholder="Enter Your Email" value=" ' . $_SESSION["signupData"]["email"] . '"
    />';
        
    }


}





function check_signup_errors(){
    if(isset($_SESSION["signup_error"])){
        $error = $_SESSION["signup_error"];
        echo "<br>";
        foreach($error as $error){
            echo "<script>alert('$error')</script>";
        }
        unset($_SESSION["signup_error"]);
    
    }else if(isset($_GET['signup']) && $_GET['signup'] == "success"){
        echo "<br>";
        echo '<p class="form-success">You have successfully signed up!</p>';

    }
}
?>
