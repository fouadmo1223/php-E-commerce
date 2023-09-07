<?php
session_start();
    $pageindex = $_GET['page'];
    $_SESSION['page'] = $pageindex * 7;
    // echo $_SESSION['page'];
    if(isset($_GET['cat_id'])){
         header("location: ../shop.php?cat_id=" . $_GET['cat_id']);
    }else{
        header("location: ../shop.php");
    }
    
?>