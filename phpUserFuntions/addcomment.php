<?php
include "../admin/PhpFunctions/connection.php";
    if(!isset($_POST['comment'])){
        $response= array("status" => "error", "message" => "Comment is required");
        echo json_encode($response);
    }elseif(!isset($_POST['rate'])){
        $response= array("status" => "error", "message" => "Rate is required");
        echo json_encode($response);
    }elseif(!is_numeric($_POST['rate'])){
        $response= array("status" => "error", "message" => "Rate must be number");
        echo json_encode($response);
    }
    else{
        $comment = $_POST['comment'];
        $rate = $_POST['rate'];
        $productId = $_POST['productid'];
        $userId = $_POST['userid'];
        

        $comment = mysqli_real_escape_string($connection, $comment);

        $insert = "INSERT INTO reviews (user_id,product_id,describition,rate) VALUES ('$userId', '$productId', '$comment', '$rate')";
        $query = $connection -> query($insert);
        if($query){
            $response= array("status" => "sucsess", "message" => "Comment is sent successfully");
            echo json_encode($response);
        }else{
            $response= array("status" => "error", "message" => "Something went wrong, please try again");
            echo json_encode($response); 
        }
        
    }
?>