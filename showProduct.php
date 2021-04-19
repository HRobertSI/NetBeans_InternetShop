<?php
session_start();

require_once './connection.php';
$id = $_REQUEST["id"];
$link = connectDatabase();
$query_book = "SELECT * FROM data WHERE BookID = $id";
$results_book = mysqli_query($link, $query_book);

//I also include here the php file with may products list
//include_once './data.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        while ($row = mysqli_fetch_array($results_book, MYSQLI_ASSOC))
            { 
                $image=$row['image'];
                $description=$row['Description'];
                echo "<h1>".$row['title']." by ".$row['authors']."</h1>";
                echo "Price ".$row['price']."<br>";
                echo "<form action = 'buy.php'>";
                    echo "<input type='hidden' name='id' value=$id>";
                    echo "<input type='submit' value='Buy this product'>";
                echo "</form><br>";
                echo "<img src='./images/$image' width='200'><br>";
                echo "<div>$description</div>";
            } 
        //Take the product ID
       /* $id = $_REQUEST["id"];

        //Now we print the whole information of this book
        $product = $productsList[$id];
        $title = $product['title'];
        $authors = $product['authors'];
        $description = $product['description'];
        $price = $product["price"];
        $image = $product["image"];

        echo "<h1>$title, by $authors</h1>";
        echo "Price  $price<br>";
        echo "<form action = 'buy.php'>";
            echo "<input type='hidden' name='id' value=$id>";
            echo "<input type='submit' value='Buy this product'>";
        echo "</form><br>";
        echo "<img src='./images/$image' width='200'><br>";
        echo "<div>$description</div>";*/
        ?>
        <br>
        <a href="index.php">Back to the main page of this shop</a>
    </body>

</html>
