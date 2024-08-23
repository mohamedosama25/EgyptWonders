
<?php
declare(strict_types=1);

function get_username(object $pdo $username){
    $query="SELECT username FROM users WHERE username = :username";
  $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_email(object $pdo, string $email){
    $query="SELECT email FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $username, string $password, string $email, string $phone){
    $query="INSERT INTO users (username, password, email, phone) VALUES (:username, :password, :email, :phone)";
    $stmt = $pdo->prepare($query);
    $options = ['cost' => 12];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);


    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $hashedPassword);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":phone", $phone);
    $stmt->execute();
}