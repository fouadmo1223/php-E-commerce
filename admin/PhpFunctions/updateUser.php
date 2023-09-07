<?php
    print_r($_POST);
    echo '<br /><br />';
    print_r($_GET);


      
    if(isset($_POST)){
        $username=$_POST["username"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $permission=$_POST["permission"];
        $userid=$_POST["id"];
       
    }
    include("connection.php");
    $UPDATE = "UPDATE  users SET username ='$username', email ='$email', permission  ='$permission' WHERE id = $userid";
    $connection ->query($UPDATE);
    header("location:../users.php");
?>