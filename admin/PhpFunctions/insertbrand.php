<?php


    $brandname = $_POST['brandname'];
   
    include ("connection.php");

   $insert = "INSERT INTO brand (name ) VALUES ('$brandname')";
   $connection -> query($insert);
   header("Location:../categories.php");