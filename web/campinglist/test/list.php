<?php
    require "dbConnect.php";
    $db = get_db();

    $name = htmlspecialchars($_POST['Name']);
    $location = htmlspecialchars($_POST['Location']);
    $name1;
    $name2;
    $loc1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="main.css">

        <div class="container-fluid">
            <?php
                if ($name == 'Coty') {
                    $name1 = "1";
                    $name2 = "8";
                } else if ($name == 'Merritt') {
                    $name1 = "2";
                    $name2 = "8";
                } else if ($name == 'Ethne') {
                    $name1 = "3";
                    $name2 = "7";
                } else if ($name == 'Indie') {
                    $name1 = "4";
                    $name2 = "7";
                }

                if ($location == "Bear Lake") { 
                    $loc1 = "1"; 
                } else if ($location == "Uinta Mountains") {
                    $loc1 = "2"; 
                } else if ($location == "San Rafael Swell") {
                        $loc1 = "3";
                }
                
                $statement = $db->prepare("SELECT item_name, person_name_id, activity_name_id, location_name_id, item_location
                        FROM location
                        LEFT JOIN items
                        ON (location_id = location_name_id)
                        WHERE ((person_name_id = $name1) OR (person_name_id = $name2) or (person_name_id = 5))
                        AND  ((activity_name_id = $loc1) OR (activity_name_id = 4))
                        ORDER BY location_name_id;");
                $statement->execute();
                echo "<table><tr>";
                $count = 0;
                $first = true;
                $previous_location_name_id = 1;
                
                //List items by location in house to make packing more efficient. 
                while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                {
                    $current_location_name_id = $row['location_name_id'];
                    $location_name = $row['item_location'];
                    $item_name = $row['item_name'];
                    
                    if ($first == true) {
                        echo "<td><strong>$location_name</strong></td>";
                        $first = false;
                    }

                    if ($count == 15) {
                        if ($previous_location_name_id != $current_location_name_id) {
                            echo "</tr><tr><td><strong>$location_name</strong></td>";
                            $previous_location_name_id = $current_location_name_id;
                        } else {
                            echo "</tr><tr>";
                        }
                        echo "<td>$item_name</td>";
                        $count = 0;
                    } else {
                        if ($previous_location_name_id != $current_location_name_id) {
                            echo "<td class=\"roomHeader\"><strong>$location_name</strong></td>";
                            $previous_location_name_id = $current_location_name_id;  
                        } 
                        echo "<td>$item_name</td>"; 
                        $count++;
                    }
                    
                }  
                echo "</tr></table>"
            ?> 
        </div>
    </body>
</html>