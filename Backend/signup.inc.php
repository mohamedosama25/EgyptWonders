<?php

if($_SERVER["REQUEST_METHOD"] ==="POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    try{

        require_once "dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_controller.inc.php";

        // error handlers 
        $errors=[];

        function is_input_empty($username, $password, $email, $phone){
            $errors=["input_empty"=>"Please fill in all fields!"];
         }
        if is_email_invalid($email){
            $errors["email_invalid"]="Please enter a valid email!";
        }
        if(is_username_taken($pdo, $username)){
            $errors["username_taken"]="Username is already taken!";
        }
        if(is_email_registered($pdo, $email)){
            $errors["email_registered"]="Email is already registered!";
        }


        require_once "config_session.inc.php";

        if($errors){
            $_SESSION["errors_signup"]=$errors;
            $signupData[
                "username"=>$username,
                "email"=>$email,
                "phone"=>$phone
            ];
            $_SESSION["signupData"]=$signupData;

            header("Location: ../signup.php");
            die();


        }

        create_user($pdo, $username, $password, $email, $phone);
        header("Location: ../signup.php?signup=success");
        $pdo = null;
        $stmt = null;
        die();



    } catch (PDOException $e){
        die("Query failed: ".$e->getMessage());
    }

} else{
    header("Location: ../signup.php");
    die();
}