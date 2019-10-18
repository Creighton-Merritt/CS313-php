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
    <link rel="stylesheet" type="text/css" href="css/home.css">

    <title>Assignments</title>
</head>
    <div class="container-fluid">
        <h1>Assignments</h1>
       
    </div>
<body>
        <div class="container-fluid">
                <a id="returnHome" href="home.php">Home &#9658;</a>
                <p id="php">     
                    <?php
                    echo "Today is " . date("F d, Y");  
                    ?> 
                </p>
                <br>
        </div>
        <div id="hrline" class="container-fluid">
                <hr> 
                <br>
                <p>"79% of stair accidents happen on the stairs!" - Gumball Watterson</p>
                <br>
                <a href="week03/week03product.php">Week 03 - PHP Shopping Cart</a><br>
                <a href="campinglist/main.html">Week 05 - Camping List</a>
        </div>
    
</body>
</html>