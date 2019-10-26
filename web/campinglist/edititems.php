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
                <a id="home" href="../home.php">&#9668; Home </a>
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
                                echo "<input type='radio' name='checked[]' value='$ditem_id'><label>$ditem - $dfirst_name - $dactivity</label><br>"; 
                            }
                        ?>
                        <input type="submit" value="Delete Selected" name="delete">
                        </form>
                    <?php
                    }
            ?>
            <?php
                    // //put inside previous if statement?
                    // if(isset($_REQUEST['edit'])) {
                    // $get_item = $_POST['checked'];
                    // $statement = db->prepare

                ?>
            </div>
        </div>
</body>
</html>