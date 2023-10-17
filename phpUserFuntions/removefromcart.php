<?php

    include "../admin/PhpFunctions/connection.php";
    $orderId = $_POST['orderid'];
    $productCount = $_POST['count'];
    $productId = $_POST['productid'];
    $response= array("status" => "sucsess", "message" => "product has been removed");
    $deleteSelectedOrder = $connection -> query("DELETE FROM orders WHERE id = $orderId");
    $selectProduct = $connection -> query("SELECT * FROM products WHERE id = $productId");
    $product = $selectProduct -> fetch_assoc();
    $productOldCount = $product['count'];
    $productNewCount = $productOldCount + $productCount;
    if($deleteSelectedOrder){
        $update = $connection ->query("UPDATE products SET count = $productNewCount WHERE id = $productId");
        echo json_encode($response);
    }else{
        $response= array("status" => "error", "message" => "Process Failed");
        echo json_encode($response);
    }

?>