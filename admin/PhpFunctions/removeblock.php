<?php
    print_r($_GET);
     $userId = $_GET['id'];
    include("connection.php");
    $selection = "SELECT * FROM users WHERE id = $userId";
    $query = $connection -> query($selection);
    $user = $query ->fetch_assoc();
    $permission = $user['beforeblocked'];
    


    
    $UPDATE = "UPDATE  users SET  permission  ='$permission' WHERE id = $userId";
    $connection ->query($UPDATE);
    header("location:../users.php");
?>