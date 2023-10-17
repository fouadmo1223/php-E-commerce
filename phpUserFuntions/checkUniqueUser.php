<?php
    include "../admin/PhpFunctions/connection.php";
   $userName = $_POST['username'];
   $userName = mysqli_real_escape_string($connection, $userName);
   if(strlen($userName) <= 2 ){
    $response = array("status" => "error", "message" => "<span class = 'c-red fs-14 '>User name is required and must be 3 char or more</span>");
    echo json_encode($response);
    die();
}
   $userSelect = $connection -> query("SELECT * FROM users WHERE username = '$userName'");
   if($userSelect -> num_rows == 0){
    $response = array("status" => "sucsess", "message" => "<span class = 'c-green fs-14 '>Username is available </span>");
    echo json_encode($response);
    die();
   }else{
    $response = array("status" => "error", "message" => "<span class = 'c-red fs-14 '>Username exist ,Try another one</span>");
    echo json_encode($response);
    die();
   }

?>