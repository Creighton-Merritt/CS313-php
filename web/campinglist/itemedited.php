<?php

    $itemname = htmlspecialchars($_POST['itemname']);
    $itemid = $_POST['itemid'];
    $name = htmlspecialchars($_POST['Name']);
    $activity = htmlspecialchars($_POST['Activity']);
    $location = htmlspecialchars($_POST['Location']);

    require('dbConnect.php');
    $db = get_db();

    $statement = $db->prepare("UPDATE items SET item_name = '$itemname',
                    person_name_id = (SELECT person_id FROM person WHERE first_name = '$name'),
                    activity_name_id = (SELECT activity_id FROM activity WHERE activity_name = '$activity'),
                    location_name_id = (SELECT location_id FROM location WHERE item_location = '$location')
                    WHERE item_id = $itemid;");
    $statement->execute();
    $new_page = "main.php?page=edititems";
    header("Location: $new_page");
    exit;   
?>