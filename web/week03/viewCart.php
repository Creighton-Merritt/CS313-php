<?php
session_start();
error_reporting(0);

// remove an item
if ( isset($_GET["delete"]) ) {
    $i = $_GET["delete"];
    $qty = $_SESSION["qty"][$i];
    $oPrice = $_SESSION["prices"][$i]/$qty;
    $qty--;
    if ($qty == 0) {
        $_SESSION["prices"][$i] = 0;
        unset($_SESSION["cart"][$i]);
    } else {
    $nPrice = ($oPrice * $qty);
    $_SESSION["qty"][$i] = $qty;
    $_SESSION["prices"][$i] = $nPrice;
    }
}   

// add another
if ( isset($_GET["add"]) ) {
    $i = $_GET["add"];
    $qty = $_SESSION["qty"][$i];
    $oPrice = $_SESSION["prices"][$i]/$qty;
    $qty++;
    if ($qty == 0) {
        $_SESSION["prices"][$i] = 0;
        unset($_SESSION["cart"][$i]);
    } else {
    $nPrice = ($oPrice * $qty);
    $_SESSION["qty"][$i] = $qty;
    $_SESSION["prices"][$i] = $nPrice;
    }
} 

// get total
if (!isset($_SESSION["total"]) ) {
    $_SESSION["total"] = 0;
    for ($i=0; $i < count($products); $i++) {
        $_SESSION["qty"][$i] = 0;
        $_SESSION["prices"][$i] = 0;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="css/viewCart.css">
    <title>Shopping Cart</title>
</head>
<body>
    <div class="container-fluid">
        <h1>Shopping Cart</h1>
    </div>
    <div class="container-fluid">
        <a id="continueShopping" href="week03product.php">&#9668; Continue Shopping </a>
        <a id="checkout" href="checkout.php">Checkout &#9658;</a>
        <br>
    </div>
    <div id="hrline" class="container-fluid">
        <hr>
    </div>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <?php
                if ( isset($_SESSION["cart"]) ) {
                ?>

                <table >
                    <tr>
                        <th><h3>Product</h3></th>
                        <th width="100px"></th>
                        <th><h3>Qty</h3></th>
                        <th width="50px"></th>
                        <th><h3>Amount</h3></th>
                        <th width="30px"></th>
                        <th><h3>Quantity</h3></th>
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
                        <td><a href="?delete=<?php echo($i); ?>"> - </a><a href="?add=<?php echo($i); ?>"> + </a></td>
                        
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
            </div>
        </div>
    </div>

    
</body>
</html>