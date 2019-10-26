<?php

    $itemid = $_POST['checked'];
    if(empty($itemid)) {
        echo("You didn't select any items");
        ?>
            <meta http-equiv="refresh" content="5;URL=https://hidden-lowlands-67545.herokuapp.com/campinglist/additems.php"/>
        <?php
    } else {
        require('dbConnect.php');
        $db = get_db();
        foreach ($itemid as $id)
        {
            $stmt = $db->prepare("DELETE FROM items WHERE item_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        $new_page = "additems.php?deleted=true";
        header("Location: $new_page");
        exit;   
    }

?>