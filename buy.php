<?php 
session_start(); 

require_once './connection.php';
$id = $_REQUEST["id"];
$link = connectDatabase();
$query_cart = "SELECT * FROM data WHERE BookID = $id";
$results_cart = mysqli_query($link, $query_cart);      //to nič ne dela
while ($row = mysqli_fetch_array($results_cart))
        {
            $title_cart = $results_cart['title'];
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        while ($row = mysql_fetch_array($results_cart))
        {
            $title_cart = $results_cart['title'];
        }
        //In this example we use ID's of products
        //
        //Take the product ID
        //$id = $_REQUEST["id"];

        //Take the array with the product purchased previously - if there is any

        if (isset($_SESSION["cart"])) {
            $cart = $_SESSION["cart"];
        }

        //incrase the number connected with the given ID
        if (isset($cart[$id])) {
            $cart[$id] = $cart[$id] + 1;
        } else {
            //The first purchase of this product. Set the number to 1
            $cart[$id] = 1;
        }

        //Save the $cart array in the session
        $_SESSION["cart"] = $cart;
        
       // $title = $[$id]["title"];
        ?>
        
        <h2>Thank you for purchasing: <?php echo $title_cart ?> </h2>
        <br>
        <a href="index.php">Back to the main page of this shop</a>
    </body>
</html>
