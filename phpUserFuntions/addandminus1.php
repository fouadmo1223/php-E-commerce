<?php
    include "../admin/PhpFunctions/connection.php";
    $productId = $_POST['productid'];
    $userId = $_POST['userid'];

    $selectPro = $connection -> query("SELECT * FROM products WHERE id = $productId");
    $product = $selectPro->fetch_assoc();
    $productCount = $product['count'];

    $selecOrder = $connection -> query("SELECT * FROM orders WHERE user_id = $userId AND product_id = $productId");
    $order = $selecOrder->fetch_assoc();
    $orderQuqntity= $order['quantity'];



    if(isset($_POST['add'])){

     if($productCount - 1 >= 0 ){
        $newOrderQuqntity = $orderQuqntity +1;
        $newProductCount = $productCount - 1;

        $updatecount = $connection -> query("UPDATE products SET count = $newProductCount WHERE id = $productId");
        $updateQunat = $connection ->query("UPDATE orders SET quantity = $newOrderQuqntity WHERE user_id = $userId AND product_id = $productId");
        $response= array("status" => "sucsss", "message" => "product is added by 1 ");
         echo json_encode($response);
         die();

     }else{
        $response= array("status" => "error", "message" => "product is out of stock");
         echo json_encode($response);
         die();
     }

    }
    else{
        $newOrderQuqntity = $orderQuqntity - 1;
        $newProductCount = $productCount + 1;
        if($newOrderQuqntity >= 1){
            $updatecount = $connection -> query("UPDATE products SET count = $newProductCount WHERE id = $productId");
            $updateQunat = $connection ->query("UPDATE orders SET quantity = $newOrderQuqntity WHERE user_id = $userId AND product_id = $productId");
            $response= array("status" => "sucsss", "message" => "product is minsued  by 1 ");
             echo json_encode($response);
             die();
        }elseif($newOrderQuqntity = 0){
            $updatecount = $connection -> query("UPDATE products SET count = $newProductCount WHERE id = $productId");
            $updateQunat = $connection ->query("UPDATE orders SET quantity = $newOrderQuqntity WHERE user_id = $userId AND product_id = $productId");
            $response= array("status" => "error", "message" => "you can delete the product now");
             echo json_encode($response);
             die();
        }else{
            $response= array("status" => "error", "message" => "you can delete the product now");
            echo json_encode($response);
            die();
        }
       
       
    }
?>
