<?php
    
    // print_r($_GET);
    $productId = $_GET['id'];
    include ("connection.php");
    $selection = "SELECT * FROM products WHERE id = $productId";
    $pro = $connection -> query($selection);
    $product = $pro->fetch_assoc();
     $productImage = $product['image'];
    
    $query = $connection -> query("DELETE FROM products WHERE id = $productId");
    unlink("../images/$productImage");
    header("location:  ../products.php");


?>