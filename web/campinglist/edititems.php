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
</head>
<body>
    <div class="col-md-auto">
        <?php
        //Display only this menu when page is loaded
        if(!isset($_REQUEST['submit_btn']) && !isset($_REQUEST['edit'])) {
            ?>
            <form action="" method="POST">
                <h3>Item lookup</h3>
                    Item name: 
                    <input type="text" name="s_item_name" required><br>
                    <input type="submit" value="Search" name="submit_btn"><br>
            </form>
        <?php
        }
        ?>
        <?php
        //After form is submitted the query is run here and items are listed with radio buttons.
        if(isset($_REQUEST['submit_btn'])) {
            $select_item = $_POST["s_item_name"];
            $statement = $db->prepare("SELECT item_name, item_id, first_name, activity_name
                                    FROM items inner join person on person_name_id = person_id
                                    inner join activity on activity_name_id = activity_id
                                    WHERE item_name LIKE '%$select_item%';");
            $statement->execute();
            ?>
            <form action="" method="POST">
            <?php
                $count = 0;
                while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                {
                    $item_id = $row['item_id'];
                    $item = $row['item_name'];
                    $first_name = $row['first_name'];
                    $activity = $row['activity_name'];
                    echo "<input type='radio' name='checked[]' value='$item_id'><label>$item - $first_name - $activity</label><br>"; 
                    $count++;
                }
            ?>
            <input type="submit" value="Edit item details" name="edit"><br><br>
            </form>
        <?php
        }
        //Menu appears if a record is selected to edit
        if(isset($_REQUEST['edit'])) {
            $get_item = $_POST['checked'];
            if(empty($get_item)) {
                ?>
                <meta http-equiv="refresh" content="1;URL=https://hidden-lowlands-67545.herokuapp.com/campinglist/main.php?page=edititems"/>
                <?php
            } 
            if (!empty($get_item)) {
                foreach($get_item as $id) {
                    $statement = $db->prepare("SELECT item_name, item_id FROM items WHERE item_id = $id;");
                    $statement->execute();
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                    $itemname = $row['item_name'];
                    $itemid = $row['item_id'];
                    
                    ?>
                    <!-- User can edit item name and all other details except item_id -->
                    <form action="itemedited.php" method="POST">
                        <br><br>
                        <h3>Edit item details</h3><br>
                        <?php        
                        echo"Item name: <input type='text' name='itemid' value='$itemid' id='hidden'><br>";
                        echo"<input type='text' name='itemname' value='$itemname'required><br>";
                    }
                        ?>
                        Who will use it?: 
                        <select name="Name" required>
                            <option value=""></option>
                            <?php
                            while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
                                $name = $row['first_name'];
                                echo "<option value='$name'>$name</option>";
                            }
                            ?>
                        </select><br>       
                        Camping location: 
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
                        <input type="submit" value="Submit" name="submit"><br>
                    </form>  
                    <?php
                }
        }
        ?>
    </div>
</body>
</html>