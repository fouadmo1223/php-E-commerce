<?php
    include "../admin/PhpFunctions/connection.php";
   $userName = $_POST['username'];
   $userName = mysqli_real_escape_string($connection, $userName);
   $userSelect = $connection -> query("SELECT * FROM users WHERE username = '$userName'");
   if($userSelect -> num_rows == 0){
    $response = array("status" => "sucsess", "message" => "<span class = 'c-green fs-14 '>Username is available </span>");
    echo json_encode($response);
   }else{
    $response = array("status" => "error", "message" => "<span class = 'c-red fs-14 '>Username exist ,Try another one</span>");
    echo json_encode($response);
   }

?>