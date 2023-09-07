<?php
include "../admin/PhpFunctions/connection.php";
   if (strlen($_POST['username']) == 0) {
    $response = array("status" => "error", "message" => "Username is required ");
    echo json_encode($response);

   } elseif (strlen($_POST['email']) == 0) {
    $response = array("status" => "error", "message" => "E-mail is required ");
    echo json_encode($response);
   } elseif (strlen($_POST['fullname']) == 0) {
    $response = array("status" => "error", "message" => "FullName is required ");
    echo json_encode($response);
   } elseif (strlen($_POST['password']) == 0) {
    $response = array("status" => "error", "message" => "Passwordis required ");
    echo json_encode($response);
   }elseif (strlen($_POST['gender']) == 0) {
    $response = array("status" => "error", "message" => "Gender is required ");
    echo json_encode($response);
   }
   else{
    $userName = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fullName = $_POST['fullname'];
    $gender = $_POST['gender'];
    if($gender == true){
      $gender =1;
    }else{
      $gender=0;
    }
    // check for the exist of username and email 

    $userName = mysqli_real_escape_string($connection, $userName);
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);
    $fullName = mysqli_real_escape_string($connection, $fullName);
   //  $gender = mysqli_real_escape_string($connection, $gender);

    $response = array("status" => "sucsess", "message" => "Your Information has been sent successfully");
    $insert = "INSERT INTO users (username,gender,email,password,permission,beforeblocked) VALUES ('$userName','$gender','$email', '$password','3','3')";
    $query = $connection -> query($insert);
  
     if($query){
        echo json_encode($response);
     }else{
        $response = array("status" => "error", "message" => "Something went wrong, Please try again ");
        echo json_encode($response);
     }
   }
?>