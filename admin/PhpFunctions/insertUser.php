<?php
    // print_r($_POST);
    session_start();
    $permissiion = 2;

    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender= $_POST['gender'];
    $email = $_POST['email'];
    $usersArray = [];
    $emailArray=[];
    include ("connection.php");

    $selection = $connection -> query("SELECT * FROM users");
    while($user = $selection -> fetch_assoc()){
        $usersArray[]=$user['username'];
        $emailArray[]=$user['email'];
    }
    
    
    if(in_array($username,$usersArray)){
      $_SESSION["username_error"] = "<div class='alert alert-danger' role='alert'>username already exists</div>";
      header('Location: ../users.php?action=adduser');
    }elseif (in_array($email,$emailArray)){
      $_SESSION["username_error"] = "<div class='alert alert-danger' role='alert'>E-mail already exists</div>";
      header('Location: ../users.php?action=adduser');
    }else{
        $insert = "INSERT INTO users (username, email,password,permission,gender ) VALUES ('$username', '$email', '$password',' $permissiion','$gender')";
          $connection ->query($insert);
    header("location:../users.php");
    }

   
    

?>