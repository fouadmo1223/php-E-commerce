<?php
    include "../admin/PhpFunctions/connection.php";
   $email = $_POST['email'];
   $emailArr = explode(".", $email);
   $email = mysqli_real_escape_string($connection, $email);

   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $response = array("status" => "error", "message" => "<span class = 'c-red fs-14 '>Enter a vailed  E-mail</span>");
    echo json_encode($response);
    die();
   }elseif(strlen($email) <= 2 ){
    $response = array("status" => "error", "message" => "<span class = 'c-red fs-14 '>Email required and must be 3 char or more</span>");
    echo json_encode($response);
    die();
}elseif (!in_array("com",$emailArr)) {
    $response = array("status" => "error", "message" => "<span class = 'c-red fs-14 '>Email Must Contain .com</span>","1" => $email);
    echo json_encode($response);
    die();
}else{ 
   $emailSelect = $connection -> query("SELECT * FROM users WHERE email = '$email'");
   if($emailSelect -> num_rows == 0){
    $response = array("status" => "sucsess", "message" => "<span class = 'c-green fs-14 '>E-mail is available </span>");
    echo json_encode($response);
   }else{
    $response = array("status" => "error", "message" => "<span class = 'c-red fs-14 '>E-mail exist ,Try another one</span>");
    echo json_encode($response);
   }
}
?>