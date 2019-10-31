<?php
    require ('dbConnect.php');
    $db = get_db();
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
        <div class = "container-fluid">
            <div class ="row">
                <div class="col-md-6"> 
                    <h2>Delete item from list</h2>
                    <?php
                    //If the button has not been pressed (like right when the page is first loaded) then this menu will appear so you can search
                    //for items to delete.
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
                    //After the Search button is pressed I run this select query to list all the items that match the search. 
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
                            //List each item with a checkbox so more than one record can be deleted at a time.
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
                </div>
            </div>
        </div>
    </body>
</html>