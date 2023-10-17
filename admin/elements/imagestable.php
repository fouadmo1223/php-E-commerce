
<?php
include "PhpFunctions/connection.php";
    $productId = $_GET['id'];
    $selection = $connection -> query("SELECT * FROM product_images WHERE product_id = $productId ");
    $numOfImages =$selection ->num_rows; 
    if($numOfImages == 4){
        include "changeImage.php";
    }elseif($numOfImages == 0){
        include "addproductsimages.php";
    }
?>