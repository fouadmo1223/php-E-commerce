<?php

    include "../admin/PhpFunctions/connection.php";
    $orderId = $_POST['orderid'];
    $response= array("status" => "sucsess", "message" => "product has been removed");
    $deleteSelectedOrder = $connection -> query("DELETE FROM orders WHERE id = $orderId");
     
    if($deleteSelectedOrder){
        echo json_encode($response);
    }else{
        $response= array("status" => "error", "message" => "Process Failed");
        echo json_encode($response);
    }

?>