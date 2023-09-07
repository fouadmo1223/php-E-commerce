<?php
         include 'admin/PhpFunctions/connection.php';
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$uri = $_SERVER['REQUEST_URI'];

$currentURL = $protocol . "://" . $host . $uri;


if(strpos($currentURL, "index")){
	$page= "index";
}elseif(strpos($currentURL, "shop")){
	$page = "shop";
}
elseif (strpos($currentURL, "detail")){
	$page = "detail";
}
elseif (strpos($currentURL, "categories")){
	$page = "categories";
}
elseif (strpos($currentURL, "cart")){
	$page = "cart";
}
if(isset($_COOKIE['userid'])){
$userId = $_COOKIE['userid'];
$selecOrders = $connection -> query("SELECT * FROM orders WHERE user_id =$userId");

$numOfOrders = $selecOrders -> num_rows;

$selectfav = $connection -> query("SELECT * FROM favorites WHERE user_id =$userId");
$numOfFav = $selectfav -> num_rows;

}


?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Boutique | Ecommerce bootstrap template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="css/bootstrapp.min.css">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Lightbox-->
    <link rel="stylesheet" href="vendor/lightbox2/css/lightbox.min.css">
    <!-- Range slider-->
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
    <!-- Bootstrap select-->
    <link rel="stylesheet" href="vendor/bootstrap-select/css/bootstrap-select.min.css">
    <!-- Owl Carousel-->
    <link rel="stylesheet" href="vendor/owl.carousel2/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/owl.carousel2/assets/owl.theme.default.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

        <!-- alertify  -->
  <link rel="stylesheet" href="css/alertify.min.css" />
<!-- include a theme -->
<link rel="stylesheet" href="css/themes/default.min.css" />
  <link rel="stylesheet" href="css/hover.css" />
   <link rel="stylesheet" href="css/framework.css">

        <style>
          .heart-clicked{
    color: #fff !important;
    background-color: #111111 !important;
    border-color: #111111 !important;
}
.btn-outline-dark:focus {
    color: #111111 ;
    background-color: transparent ;
    background-image: none ;
    border-color: #111111 
}
/* Hide the up and down arrows for number input */
  input[type="number"]::-webkit-inner-spin-button,
  input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    appearance: none;
    margin: 0;
  }

  /* Firefox also requires a separate rule */
  input[type="number"] {
    -moz-appearance: textfield;
  }
        </style>
        
  </head>
  <body>
    <div class="page-holder">
      <!-- navbar-->
      <header class="header bg-white">
        <div class="container px-0 px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.php"><span class="font-weight-bold text-uppercase text-dark">Boutique</span></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <!-- Link--><a class="nav-link <?php
                      if($page == "index"){echo "active";}
                  ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <!-- Link--><a class="nav-link <?php
                      if($page == "shop"){echo "active";}
                  ?>" href="shop.php" >Shop</a>
                </li>
                <li class="nav-item">
                  <!-- Link--><a class="nav-link <?php
                      if($page == "detail"){echo "active";}
                  ?>" href="detail.php" >Product detail</a>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                  <div class="dropdown-menu mt-3" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="index.php">Homepage</a><a class="dropdown-item border-0 transition-link" href="shop.php">Category</a><a class="dropdown-item border-0 transition-link" href="detail.php">Product detail</a><a class="dropdown-item border-0 transition-link" href="cart.php">Shopping cart</a><a class="dropdown-item border-0 transition-link" href="checkout.php">Checkout</a></div>
                </li>
              </ul>
              <ul class="navbar-nav ml-auto">               
                <li class="nav-item"><a class="nav-link <?php
                      if($page == "cart"){echo "active";}
                  ?>" href="cart.php"> <i class="fas fa-dolly-flatbed mr-1 text-gray"></i>Cart<small class="text-gray ">(<span class="num-of-products"><?php 
                if(isset($_COOKIE['userid'])){
                  echo $numOfOrders;
                }else{
                  echo 0;
                }
                ?></span>)</small></a></li>
                <li class="nav-item"><a class="nav-link" href="#"> <i class="far fa-heart mr-1"></i><small class="text-gray"> (<span class="num-of-fav"><?php 
                if(isset($_COOKIE['userid'])){
                  echo $numOfFav;
                }else{
                  echo 0;
                }
                ?></span>)</small></a></li>
                <li class="nav-item"><a class="nav-link" href="login.html"> <i class="fas fa-user-alt mr-1 text-gray"></i>Login</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </header>