<?php
 include "../admin/PhpFunctions/connection.php";
    $userName = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $permissiion =3;
    $beforeblocked =3;
    $gender = $_POST['gender'];
    if(strlen($userName) <= 2 ){
        $response = array("status" => "error", "message" => "User name is required");
        echo json_encode($response);
        die();
    }
    elseif(strlen($email) <= 2 ){
        $response = array("status" => "error", "message" => "Email is required");
        echo json_encode($response);
        die();
    }
    elseif(strlen($password) <= 6 ){
        $response = array("status" => "error", "message" => "Password length must be 6 characters or over");
        echo json_encode($response);
        die();
    }elseif(strlen($gender) <= 0  ){
        $response = array("status" => "error", "message" => "Gender is required" ,);
        echo json_encode($response);
        die();
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $response = array("status" => "error", "message" => " Enter a vailed E-mail ");
        echo json_encode($response);
        die();
     }else{
        $select = $connection -> query("SELECT * FROM `wait-list` WHERE email = '$email'");
        if($select -> num_rows == 0 ){
            $insert = $connection -> query("INSERT INTO `wait-list` (username,password,gender,email,permission,beforeblock) VALUES ('$userName', '$password', '$gender', '$email','3','3')");
            $response = array("status" => "succses", "message" => "Your info added to wait list" );
            setcookie("email","$email",strtotime("+1 day"),"/");
            if(isset($_COOKIE['userid'])){
                setcookie("userid","".strtotime("-1 hour"),"/");
            }
            echo json_encode($response);
            die();
        }else{
            $update = $connection -> query("UPDATE `wait-list` SET username = $userName ,email = $email,gender = $gender,password = $password");
            $response = array("status" => "succses", "message" => "Your info is updated" );
            echo json_encode($response);
            die();
        }
    }

    
?>