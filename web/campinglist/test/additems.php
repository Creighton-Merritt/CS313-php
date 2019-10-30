<?php
    // Queries for drop down lists below
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
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</head>
<body>
    <div class = "container-fluid">
        <div class ="row">
            <div class="col-md-6"> 
                <h3>Add item to list</h3>
                <!-- Form for adding items. I run a query for each drop down list category and pass the value to itemadded.php -->
                <form action="itemadded.php" method="POST">
                    Item name: 
                    <input type="text" name="newItem" required><br>
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
                    <input type="submit" value="Submit"><br>
                </form>  
                <?php
                    // Code for confirmation message. If item was added it pops up for 1-2 seconds before the page refreshes.
                    if (isset($_GET['success']) && $_GET['success'] == 'true') {
                        echo '<p><strong>Item added!</strong></p>';
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