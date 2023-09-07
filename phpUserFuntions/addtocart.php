<?php

include "../admin/PhpFunctions/connection.php";
   $userId = $_POST["userid"];
   $productId = $_POST["productid"];
   if(isset($_POST["quantity"])){
      $productQuntity = $_POST["quantity"];
   }else{
      $productQuntity = 1;
   }
   
   $selection = $connection -> query("SELECT * FROM orders WHERE user_id = $userId && product_id = $productId");
   if($selection -> num_rows == 0){
     $response = array("status" => "sucsess", "message" => "product is added");
      $insert = "INSERT INTO orders (user_id,product_id,quantity) VALUES ('$userId', '$productId', '$productQuntity')";
     $query = $connection -> query($insert);
   }else{
       $response= array("status" => "sucsess", "message" => "product quantity is added 1");
       $fetch = $selection -> fetch_assoc();
       $quntatity = $fetch['quantity'];
       $newQuantity  = $quntatity + $productQuntity;
       $update = "UPDATE orders SET quantity = $newQuantity WHERE product_id = $productId && user_id = $userId";
       $query = $connection -> query($update);
   }
      
         if($query){
            echo json_encode($response);
         }else{
              $response= array("status" => "error", "message" => "process failed");
              echo json_encode($response);
         }

?>