<?php


    $catname = $_POST['catname'];
   
    include ("connection.php");

   $insert = "INSERT INTO category (name ) VALUES ('$catname')";
   $connection -> query($insert);
   header("Location:../categories.php");