<?php
include "../admin/PhpFunctions/connection.php";
   $userId = $_POST["userid"];
   $productId = $_POST["productid"];
     $response = array("status" => "sucsess", "message" => "product is fav");
      $insert = "INSERT INTO favorites (user_id,product_id) VALUES ('$userId', '$productId')";
     $query = $connection -> query($insert);
     if($query){
        echo json_encode($response);
     }else{
        $response = array("status" => "error", "message" => "failed to add product");
        echo json_encode($response);
     }
  
?>