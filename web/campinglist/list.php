<?php
    require "dbConnect.php";
    $db = get_db();

    $name = ($_POST["Name"]);
    $location = ($_POST["Location"]);
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
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- <script src="javascript/main.js"></script> -->


    <div class="container-fluid">
        <h1><?php echo $name?> 's <?php echo $location ?> Packing List</h1>
    </div>
</head>
    <body>
        <div class="container-fluid">
                <a id="home" href="main.html">&#9668; Back </a>
                <a id="assignments" href="../assignments.php">CS-313 Assignments &#9658;</a>
                <br>
        </div>
        <div id="hrline" class="container-fluid">
                <hr>
        </div>
        <div class="container-fluid" id="#section-to-print">
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
                } else if ($location == "Mountains") {
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
                
                while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                {
                    $current_location_name_id = $row['location_name_id'];
                    $location_name = $row['item_location'];
                    $item_name = $row['item_name'];
                    
                    if ($first == true) {
                        echo "<td><strong>$location_name</strong></td>";
                        $first = false;
                    }

                    if ($count < 15) {
                        if ($count == 0 && $previous_location_name_id != $current_location_name_id) {
                            echo "<td><strong>$location_name</strong></td>";
                        } else if ($count != 0 && $previous_location_name_id != $current_location_name_id) {
                            echo "<td class=\"roomHeader\"><strong>$location_name</strong></td>";
                            $previous_location_name_id = $current_location_name_id;
                            $count++;
                        }
                        echo "<td>$count, $item_name</td>"; 
                        $count++;

                    } else if ($count == 15) {
                        if ($count == 15 && $previous_location_name_id != $current_location_name_id) {
                            echo "</tr><tr><td><strong>$location_name</strong></td>";
                            echo "<td>$count, $item_name</td>";
                            $previous_location_name_id = $current_location_name_id;
                            $count = 0;
                        } else {
                            echo "</tr><tr<td>$count, $item_name</td>";
                            $count = 0;
                        }
                        
                    }
                }
                echo "</tr></table>"
            ?> 
        </div>
    </body>
</html>