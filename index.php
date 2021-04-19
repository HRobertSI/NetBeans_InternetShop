<?php
session_start();

require_once './connection.php';

$link = connectDatabase();
$query = "SELECT * FROM data";
$results = mysqli_query($link, $query);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Welcome to my Internet shop</h1>
        <h3>These are our products</h3>
        <?php
            while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
            { 
            //echo "<a href='showProduct.php?id=".$row['BookID']."'">."<strong>".$row['title']."</strong>, by".$row['authors']."</a><br>";
            $BookID=$row['BookID'];
            echo $BookID."<br>";
            echo "<a href='showProduct.php?id=$BookID'>"."<strong>".$row['title']."</strong></a> by: ".$row['authors']."<br>";
            echo $row['shortDes']."<br><br>";
            } 
            
            //In this example we use links with ID's of products 
        /*    foreach ($productsList as $key => $value) {
                $title = $value['title'];
                $authors = $value['authors'];
                $shortDes = $value['shortDes'];
                
                echo "<a href='showProduct.php?id=$key'><strong>$title</strong>, by $authors</a><br>";
                echo "$shortDes<br><br>";

            }*/
        ?>
        <br><br>
        <a href="cart.php">Click to see your cart</a>
        
    </body>
</html>
