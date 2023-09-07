<?php
   
    $userId = $_GET['id'];
    $permission=4;
    include("connection.php");
    $selection = "SELECT * FROM users WHERE id = $userId";
    $query = $connection -> query($selection);
    $user = $query ->fetch_assoc();
    $beforeblocked = $user['permission'];
    print_r($user);


    
    $UPDATE = "UPDATE  users SET  permission  ='$permission',beforeblocked = '$beforeblocked' WHERE id = $userId";
    $connection ->query($UPDATE);
    header("location:../users.php");
?>