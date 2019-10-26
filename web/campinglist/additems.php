<?php
    require ('dbConnect.php');
    $db = get_db();
    $pstmt = $db->prepare("SELECT first_name from person;");
    $pstmt->execute();
    $lstmt = $db->prepare("SELECT item_location from location;");
    $lstmt->execute();
    $astmt = $db->prepare("SELECT activity_name from activity ORDER BY activity_id;");
    $astmt->execute();
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
        <h1>Manage Database</h1>
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
        <div class="container-fluid">
            <div class = "row" id="left">
                <div class="col-sm"> 
                    <h3>Add item to list</h3>
                    <form action="itemadded.php" method="POST">
                        Item name: 
                        <input type="text" name="newItem" required><br>
                        Assign to person: 
                        <select name="Name" required>
                            <option value=""></option>
                            <?php
                            while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
                                $name = $row['first_name'];
                                echo "<option value='$name'>$name</option>";
                            }
                            ?>
                        </select><br>       
                        Assign to camping location: 
                        <select name="Activity" required>
                            <option value=""></option>
                            <?php
                            while ($row = $astmt->fetch(PDO::FETCH_ASSOC)) {
                                $activity = $row['activity_name'];
                                echo "<option value='$activity'>$activity</option>";
                            }
                            ?>
                        </select><br>
                        Where is it located in the house?: 
                        <select name="Location" required>
                            <option value=""></option>
                            <?php
                            while ($row = $lstmt->fetch(PDO::FETCH_ASSOC)) {
                                $location = $row['item_location'];
                                echo "<option value='$location'>$location</option>";
                            }
                            ?>
                        </select><br>
                        <input type="submit" value="Submit"><br>
                    </form>  
                    <?php
                        if (isset($_GET['success']) && $_GET['success'] == 'true') {
                            echo '<span width="15"><strong>Item added!<strong></span>';
                            ?>
                                <meta http-equiv="refresh" content="1;URL=https://hidden-lowlands-67545.herokuapp.com/campinglist/additems.php"/>
                            <?php
                        }
                    ?>
                </div>
                <div class="col-sm" id="right"> 
                    <h3>Delete item from list</h3>
                    <?php
                    if(!isset($_REQUEST['submit_btn'])) {
                        ?>
                        <form action="" method="POST">
                                Item name: 
                                <input type="text" name="d_item_name" required><br>
                                <input type="submit" value="Search" name="submit_btn"><br>
                        </form>
                    <?php
                    }
                    ?>
                    <?php
                    if(isset($_REQUEST['submit_btn'])) {
                        $delete_item = $_POST["d_item_name"];
                        $statement = $db->prepare("SELECT item_name, item_id, first_name, activity_name
                                                FROM items inner join person on person_name_id = person_id
                                                inner join activity on activity_name_id = activity_id
                                                WHERE item_name LIKE '%$delete_item%';");
                        $statement->execute();
                        ?>
                        <form action="itemdeleted.php" method="POST">
                        <?php
                            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                            {
                                $ditem_id = $row['item_id'];
                                $ditem = $row['item_name'];
                                $dfirst_name = $row['first_name'];
                                $dactivity = $row['activity_name'];
                                echo "<input type='checkbox' name='checked[]' value='$ditem_id'><label>$ditem - $dfirst_name - $dactivity</label><br>"; 
                            }
                        ?>
                        <input type="submit" value="Delete Selected" name="delete">
                        </form>
                    <?php
                    }
                    ?>
                    <?php
                        if (isset($_GET['deleted']) && $_GET['deleted'] == 'true') {
                            echo "<strong>Item deleted!<strong><br><br>";
                            ?>
                                <meta http-equiv="refresh" content="1;URL=https://hidden-lowlands-67545.herokuapp.com/campinglist/additems.php"/>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>