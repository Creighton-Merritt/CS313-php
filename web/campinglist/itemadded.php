<?php

    $newItem = htmlspecialchars($_POST['newItem']);
    $name = htmlspecialchars($_POST['Name']);
    $activity = htmlspecialchars($_POST['Activity']);
    $location = htmlspecialchars($_POST['Location']);

    require('dbConnect.php');
    $db = get_db();

    $pid = $db->prepare("SELECT person_id FROM person WHERE first_name = '$name';");
    $aid = $db->prepare("SELECT activity_id FROM activity WHERE activity_name = '$activity';");
    $lid = $db->prepare("SELECT location_id FROM location WHERE location_name = '$location';");
    $pid->execute();
    $aid->execute();
    $lid->execute();
    $person_id = $pid->fetch();
    $activity_id = $aid->fetch();
    $location_id = $lid->fetch();
    $stmt = $db->prepare("INSERT INTO items(item_name, person_name_id, activity_name_id, location_name_id)
                        VALUES (:newItem, :person_id, :activity_id, :location_id);");
    $stmt->bindValue(':newItem', $newItem, PDO::PARAM_STR);
    $stmt->bindValue(':person_id', $person_id, PDO::PARAM_INT);
    $stmt->bindValue(':activity_id', $activity_id, PDO::PARAM_INT);
    $stmt->bindValue(':location_id', $location_id, PDO::PARAM_INT);
    $stmt->execute();


    // This works in postresql, but I can't get it to work with php, so I used the solution above
    // $statement = $db->prepare("INSERT INTO items(item_name, person_name_id, activity_name_id, location_name_id)
    // VALUES ('$newItem',(SELECT person_id from person where first_name = '$name'),
    // (SELECT activity_id from activity where activity_name = '$activity'),
    // (SELECT location_id from location where location_name = '$location'));");
    // $statement->execute();

    $new_page = "additems.php";
    header("Location: $new_page");
    die();
?>
