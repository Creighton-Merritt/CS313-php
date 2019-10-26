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

    <div class="container-fluid">
        <h1>Edit Item Details</h1>
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
    <div class="col-md-auto">
        <h2>Item lookup</h2>
        <?php
        if(!isset($_REQUEST['submit_btn'])) {
            ?>
            <form action="" method="POST">
                    Item name: 
                    <input type="text" name="s_item_name" required><br>
                    <input type="submit" value="Search" name="submit_btn"><br>
            </form>
        <?php
        }
        ?>
        <?php
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
        if(isset($_REQUEST['edit'])) {
            $get_item = $_POST['checked'];
            if(empty($get_item)) {
                echo("You didn't select any items");
            } 
            foreach($get_item as $id) {
                $statement = $db->prepare("SELECT item_name FROM items WHERE item_id = $id;");
                $statement->execute();
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                $itemname = $row['item_name'];
                $itemid = $id;
                ?>
                <form action="itemedited.php" method="POST">
                    <br><br>
                    Item name: 
                    <?php
                    echo"<input type='hidden' name'itemid' value='$itemid'>";
                    echo"<input type='text' name='itemname' value='$itemname'required><br>";
                  
                }
                    ?>
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
                    <input type="submit" value="Submit" name="submit"><br>
                </form>  
                <?php
        }
        ?>
        <?php
        if (isset($_GET['edit']) && $_GET['edit'] == 'true') {
            echo "<strong>Item updated!</strong><br><br>";
            ?>
                <meta http-equiv="refresh" content="1;URL=https://hidden-lowlands-67545.herokuapp.com/campinglist/edititems.php"/>
            <?php
        }
        ?>
    </div>
</body>
</html>