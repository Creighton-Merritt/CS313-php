<?php
    require("dbConnect.php");
    $db = get_db();

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'userpass', FILTER_SANITIZE_STRING);

    //Redirect to signup.php
    if(!isset($username) || $username == "" || !isset($password) || $password == "")
    {
        header("Location: signup.php");
        die(); 
    }

    // Hash the password and insert into database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $db->prepare("INSERT INTO userlogin (username, user_password) VALUES (:username, :hashedPassword)");
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':user_password', $hashedPassword, PDO::PARAM_STR);
    $stmt->execute();
    
    // Redirect to sign-in page
    header("Location: signIn.php");
    die();

?>