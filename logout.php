<?php
    if(isset($_COOKIE['userid'])){
        setcookie('userid',"", strtotime("-1 day"));
        $response= array("status" => "success", "message" => "you are loged out");
            echo json_encode($response);
    }else{
        $response= array("status" => "error", "message" => "somthing went wrong ,try again");
        echo json_encode($response);
    }
?>