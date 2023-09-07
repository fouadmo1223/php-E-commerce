<?php
    
    // print_r($_GET);
    $userId = $_GET['id'];
    include ("connection.php");
    
    $query = $connection -> query("DELETE FROM users WHERE id = $userId");
    header("location:  ../users.php");


?>