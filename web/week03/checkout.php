<?php
session_start();
error_reporting(0);
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="css/checkout.css">
    
    <title>Products</title>
</head>
<body>
        <div class="container-fluid">
            <h1>Checkout</h1>
        </div>
        <div class="container-fluid">
            <a id="viewCart" href="viewCart.php">&#9668; Back to Shopping Cart</a>
            <br>
        </div>
        <div id="hrline" class="container-fluid">
            <hr>
        </div>
    <form action="confirmation.php" method="post">  
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    Name: <input type="text" name="name"><br>
                    Address: <input type="text" name="street"><br>
                    City:       <input type="text" name="city"><br>
                    State:      <input type="text" name="state"><br>
                    Zip Code:   <input type="text" name="zip"><br>
                    <input type="submit"value="submit"><br>
                </div>
            </div>
        </div>
    </form>
</body>
</html>