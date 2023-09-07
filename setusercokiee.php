<?php
   echo $_GET['id'];
   setcookie("userid", $_GET['id'],strtotime("+1 day"));
   header("location: index.php");
?>