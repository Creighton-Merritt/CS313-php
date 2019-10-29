<?php
    require("dbConnect.php");
    $db = get_db();

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['userpass']);

    // Redirect to signup.php
    // if(//no username or password)
    // {
    //     header("Location: signup.php");
    //     die(); 
    // }

    // Hash the password and insert into database

    // Redirect to sign-in page
    header("Location: signIn.php");
    die();

?>