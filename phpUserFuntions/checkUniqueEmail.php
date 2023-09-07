<?php
    include "../admin/PhpFunctions/connection.php";
   $email = $_POST['email'];
   $email = mysqli_real_escape_string($connection, $email);
   $emailSelect = $connection -> query("SELECT * FROM users WHERE email = '$email'");
   if($emailSelect -> num_rows == 0){
    $response = array("status" => "sucsess", "message" => "<span class = 'c-green fs-14 '>E-mail is available </span>");
    echo json_encode($response);
   }else{
    $response = array("status" => "error", "message" => "<span class = 'c-red fs-14 '>E-mail exist ,Try another one</span>");
    echo json_encode($response);
   }

?>