<?php
    $connection = new mysqli("localhost","root","","ecommerce");
      // Check connection
    // if ($connection->connect_error) {
    //     die("Connection failed: " . $connection->connect_error);
    // }

    // Set the character encoding to UTF-8
    $connection->set_charset("utf8");
    
?>