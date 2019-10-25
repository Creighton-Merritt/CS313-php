<?php

    $newItem = htmlspecialchars($_POST['newItem']);
    $name = htmlspecialchars($_POST['Name']);
    $activity = htmlspecialchars($_POST['Activity']);
    $location = htmlspecialchars($_POST['Location']);

    require('dbConnect.php');
    $db = get_db();

    $statement = $db->prepare("INSERT INTO items(item_name, person_name_id, activity_name_id, location_name_id)
    VALUES ('$newItem',(SELECT person_id from person where first_name = '$name'),
    (SELECT activity_id from activity where activity_name = '$activity'),
    (SELECT location_id from location where location_name = '$item_location'));");
    $statement->execute();

    $new_page = "additems.php";
    header("Location: $new_page");
    die();
?>
