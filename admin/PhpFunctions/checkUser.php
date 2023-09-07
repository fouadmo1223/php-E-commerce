<?php
    

    session_start();

    echo "<pre>";

    include "connection.php";
    print_r($_POST);
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = $connection -> query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    print_r($check);
    if( $check -> num_rows > 0){
        
        $userdata = $check -> fetch_assoc();
        print_r($userdata);
        if($userdata['permission'] == "1" || $userdata['permission'] == "2"){
            $_SESSION['login'] = $username;
              header("Location:../index.php");
        }else{
            $_SESSION['error'] = "<div class='alert alert-danger' role='alert'>Wrong cridntionals</div>";
            header("Location:../login.php");
            echo $_SESSION['error'];
        }
    }else{
        $_SESSION['error'] = "<div class='alert alert-danger' role='alert'>Wrong cridntionals</div>";
        header("Location:../login.php");
        echo $_SESSION['error'];
    }


?>