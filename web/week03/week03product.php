<?php
    session_start();
    error_reporting(0);

    //products and prices
    $products = array("Gryffindor Crest", "Hogwarts Crest", "Hufflepuff Crest", "Ravenclaw Crest", "Slytherin Crest", 
                        "Owl Post", "Sealing wax - Pack of 5");
    $prices = array("12.99", "12.99", "12.99", "12.99", "12.99","12.99", "8.99");
   
    //save to session variables
    if ( isset($_GET["add"]) ) {
        $i = $_GET["add"];
        $qty = $_SESSION["qty"][$i] + 1;
        $_SESSION["products"][$i] = $products[$i];
        $_SESSION["prices"][$i] = $prices[$i] * $qty;
        $_SESSION["cart"][$i] = $i;
        $_SESSION["qty"][$i] = $qty;
     }

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="css/product.css">
    
    <title>Products</title>
</head>
<body>
    
    <div class="container-fluid">
        <h1>Harry Potter Wax Seal Stamp Supplies</h1>
    </div>
    <div class="container-fluid">
        <a id="viewCart" href="viewCart.php">View Shopping Cart &#9658;</a>
        <br>
    </div>
    <div id="hrline" class="container-fluid">
        <hr>
    </div>

    <div class="container-fluid">
        <div id="product" class="row justify-content-between, justify-content-around">
        <?php
            for ($i=0; $i<3; $i++) {
        ?>
            <div class="col-sm-3"> 
                <img src="images/<?php echo($products[$i]); ?>.jpg" alt="<?php echo($products[$i]); ?>" width="200px" height="200px"> 
                <h5><?php echo($products[$i]); ?></h5>
                <p class="price">$<?php echo($prices[$i]); ?></p>
                <a id="abutton"" type="button" href="?add=<?php echo($i); ?>">Add to cart</a>
            </div>
        <?php
            }
        ?>
        </div>
    </div>
    <div class="container-fluid">
        <div id="product" class="row justify-content-between, justify-content-around">
        <?php
            for ($i=3; $i<6; $i++) {
        ?>
                    <div class="col-sm-3"> 
                <img src="images/<?php echo($products[$i]); ?>.jpg" alt="<?php echo($products[$i]); ?>" width="200px" height="200px"> 
                <h5><?php echo($products[$i]); ?></h5>
                <p class="price">$<?php echo($prices[$i]); ?></p>
                <a id="abutton" type="button" href="?add=<?php echo($i); ?>">Add to cart</a>
            </div>
        <?php
            }
        ?>
        </div>
    </div>
    <div class="container-fluid">
        <div id="product" class="row justify-content-between, justify-content-around">
        <?php
            for ($i=6; $i<7; $i++) {
        ?>
                <div class="col-sm-3"> 
                <img src="images/<?php echo($products[$i]); ?>.jpg" alt="<?php echo($products[$i]); ?>" width="200px" height="200px"> 
                <h5><?php echo($products[$i]); ?></h5>
                <p class="price">$<?php echo($prices[$i]); ?></p>
                <a id="abutton" type="button" href="?add=<?php echo($i); ?>">Add to cart</a>
            </div>
        <?php
            }
        ?>
        </div>
    </div>
    
</body>
</html>

