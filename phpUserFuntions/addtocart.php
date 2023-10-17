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
   $selectProductbyId = $connection -> query("SELECT * FROM products WHERE id = $productId");
   $product =  $selectProductbyId -> fetch_assoc();
   $count = $product['count'];
   
   if($count > 0) {
      if($selection -> num_rows == 0){
         if($productQuntity < $count){
             $newCount = $count - 1;
            $response = array("status" => "sucsess", "message" => "product is added");
            $insert = "INSERT INTO orders (user_id,product_id,quantity) VALUES ('$userId', '$productId', '$productQuntity')";
           
            $update = $connection -> query("UPDATE products SET count = $newCount WHERE id = $productId");
           $query = $connection -> query($insert);
         }else{
            $response= array("status" => "error", "message" => " Quantity is larger than the stored product quantity");
            echo json_encode($response);
            die();
         }
       
       }else{
         $fetch = $selection -> fetch_assoc();
         $quntatity = $fetch['quantity'];
         $newQuantity  = $quntatity + $productQuntity;
         if($count > $newQuantity ){
            $newCount = $count - $productQuntity;
            
            $response= array("status" => "sucsess", "message" => "product quantity is added $productQuntity");
            $update2 = $connection -> query("UPDATE products SET count = $newCount WHERE id = $productId");
            $update = "UPDATE orders SET quantity = $newQuantity WHERE product_id = $productId && user_id = $userId";
            $query = $connection -> query($update);
         }else{
            $response= array("status" => "error", "message" => " Quantity is larger than the stored product quantity");
            echo json_encode($response);
            die();
         }

           
       }
   }else{
      $response = array("status" => "error", "message" => "product is sold out");
      echo json_encode($response);
      die();
   }
      
         if($query){
            
            echo json_encode($response);
         }else{
              $response= array("status" => "error", "message" => "process failed");
              echo json_encode($response);
         }

?>