<?php
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
        <h2>Camping List Database</h2>
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
                <!-- <div id="menu" class="d-flex justify-content-center">

                </div> -->
            </div>
            <div class="row">
                <div id="menu">
                    <a id="content" href="main.php?page=generatelist">Generate camping list</a>
                    <a id="content" href="main.php?page=additems">Add items</a>
                    <a id="content" href="main.php?page=deleteitems">Delete items</a>
                    <a id="content" href="main.php?page=edititems">Edit item details</a>
                </div>
                <div class="col-md-6" id="Content"> 
                    <?php
                        if(isset($_GET['page']) && $_GET['page'] != '' ){    
                            $page = $_GET['page']; // page being requested
                        }else{
                            $page = 'home'; // default page
                        }
        
                        // Dynamic page based on query string
                        include($page . '.php'); 
                    ?>
                </div>
    </body>
</html>


  
