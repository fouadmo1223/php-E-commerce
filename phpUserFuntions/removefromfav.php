<?php
     include "../admin/PhpFunctions/connection.php";
    $productId= $_POST['productid'];
    $userId = $_POST['userid'];
    $response= array("status" => "sucsess", "message" => "product has been removed");
    $deleteSelectedOrder = $connection -> query("DELETE FROM favorites WHERE product_id = $productId && user_id = $userId");
     
    if($deleteSelectedOrder){
        echo json_encode($response);
    }else{
        $response= array("status" => "error", "message" => "Process Failed");
        echo json_encode($response);
    }
?>