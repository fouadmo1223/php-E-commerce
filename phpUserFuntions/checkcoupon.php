<?php
    if($_POST['string'] != ""){
        $coupon = $_POST['string'];
        if(strlen($coupon) != "8"){
            $response = array("status" => "error", "message" => "Coupon dose not exist");
            echo json_encode($response);
        }else{
            include "../admin/PhpFunctions/connection.php";
            $select = $connection -> query("SELECT * FROM coupon WHERE string = '$coupon'");
            if($select -> num_rows == 0 ){
                $response = array("status" => "error", "message" => "Coupon dose not exist");
                echo json_encode($response);
            }
            else{
                $cuponInfo = $select -> fetch_assoc();
                // $couponId = $cuponInfo['id'];
                // $deletCoupon = $connection -> query("DELETE FROM coupon WHERE id = $couponId");
                $response = array("status" => "sucsess", "message" => "Coupon is found","value" => $cuponInfo['value']);
                echo json_encode($response);
            }
        }
    }else{
        $response = array("status" => "error", "message" => "Coupon must be exist");
        echo json_encode($response);
    }
?>