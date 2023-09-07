<?php
include "connection.php";
  $orderId = $_POST['orderid'];
  $userName = $_POST['username'];
  $response = array("status" => "sucsess", "message" => "$userName's order is cancelled");
  $query = $connection -> query("DELETE FROM orders WHERE id = $orderId");
  if($query){
    echo json_encode($response);
  }else{
    $response = array("status" => "error", "message" => "Process is failed , try again");
    echo json_encode($response);  
  }
    
  
?>