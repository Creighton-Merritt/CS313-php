<?php
session_start();
error_reporting(0);
$name = htmlspecialchars($_POST["name"]);
$street = htmlspecialchars($_POST["street"]);
$city = htmlspecialchars($_POST["city"]);
$state = htmlspecialchars($_POST["state"]);
$zip = htmlspecialchars($_POST["zip"]);

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="css/confirmation.css">
    
    <title>Products</title>
</head>
<body>
        <div class="container-fluid">
            <h1>Thank You For Your Order</h1>
        </div>
        <div class="container-fluid">
            <a id="viewCart" href="logout.php">Start New Order &#9658;</a>
            <br>
        </div>
        <div id="hrline" class="container-fluid">
            <hr>
        </div>
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <p><h4>You have ordered:</h4></p>
                    
                <?php
                    if ( isset($_SESSION["cart"]) ) {
                ?>
                    <table >
                    <tr>
                        <th>Product</th>
                        <th width="100px"></th>
                        <th>Qty</th>
                        <th width="50px"></th>
                        <th>Amount</th>
                        <th width="30px"></th>
                        <th></th>
                    </tr>
                <?php
                    $total = 0;
                    foreach ( $_SESSION["cart"] as $i ) {
                ?>
                        <tr>
                            <td><?php echo( $_SESSION["products"][$i] ); ?></td>
                            <td width="50px">&nbsp;</td>
                            <td><?php echo( $_SESSION["qty"][$i] ); ?></td>
                            <td width="15px">&nbsp;</td>
                            <td><?php echo( $_SESSION["prices"][$i]); ?></td>
                            <td width="15px">&nbsp;</td>
                        </tr>
                    <?php
                    
                    $total = $total + $_SESSION["prices"][$i];
                    }
                    $_SESSION["total"] = $total;
                    ?>
                        <tr height="30">
                            <td> </td>
                        </tr>
                        <tr height="30">
                            <td><h4>Total : <?php echo($total); ?></h4></td>
                    </tr>
                </table>
                
                <?php
                }
                ?>
            <p><h4>It will be shipped to:</h4></p>
            <p>&nbsp;<?=$name?><br>
                &nbsp;<?=$street?><br>
                &nbsp;<?=$city?>, <?=$state?> <?$zip?></p>

        </body>
</html>