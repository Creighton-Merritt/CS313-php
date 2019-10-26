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
        <h1>Add to Database</h1>
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
            <form action="itemadded.php" method="post">
                Item name:<br>
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
                <input type="submit" value="submit"><br>
            </form>  
        </div>
    </body>
</html>