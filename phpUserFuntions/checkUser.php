<?php
include "../admin/PhpFunctions/connection.php";
    $userNameOrEmail = $_POST['userNameOrEmail'];
    $password = $_POST['password'];
if(strlen($password)> 3  && strlen($userNameOrEmail)> 1){
   
    // Escape and sanitize user input
    $userNameOrEmail = mysqli_real_escape_string($connection, $userNameOrEmail);
    $password = mysqli_real_escape_string($connection, $password);

    // Construct the query
    $query = "SELECT * FROM users WHERE (username = '$userNameOrEmail' OR email = '$userNameOrEmail') AND password = '$password'";
    $selection = $connection->query($query);
    if($selection -> num_rows >0){
        $user= $selection ->fetch_assoc();
        if($user["permission"] == "4"){
            $response= array("status" => "error", "message" => "You are blocked ");
            echo json_encode($response);
            die(); 
        }else{
            $response= array("status" => "success", "message" => "User is found","userId" => $user['id'],"userName" => $user['permission']);
            echo json_encode($response);
            die();
        }
       
    }else{
        //  unset($_COOKIE['userid']);
        setcookie('userid',"", time() -1,"/");
        $response= array("status" => "error", "message" => "Your username or password is incorrect");
        echo json_encode($response);
    }
   
}else{
    $response= array("status" => "error", "message" => "Please enter all feilds");
    echo json_encode($response);
}


    
?>