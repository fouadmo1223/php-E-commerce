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
<script src="js/jquery-3.6.1.min.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <style>

  .ajs-header,.ajs-close,.ajs-buttons{
    display: none !important;
  }

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

@keyframes square-animation {
 0% {
  left: 0;
  top: 0;
 }

 10.5% {
  left: 0;
  top: 0;
 }

 12.5% {
  left: 32px;
  top: 0;
 }

 23% {
  left: 32px;
  top: 0;
 }

 25% {
  left: 64px;
  top: 0;
 }

 35.5% {
  left: 64px;
  top: 0;
 }

 37.5% {
  left: 64px;
  top: 32px;
 }

 48% {
  left: 64px;
  top: 32px;
 }

 50% {
  left: 32px;
  top: 32px;
 }

 60.5% {
  left: 32px;
  top: 32px;
 }

 62.5% {
  left: 32px;
  top: 64px;
 }

 73% {
  left: 32px;
  top: 64px;
 }

 75% {
  left: 0;
  top: 64px;
 }

 85.5% {
  left: 0;
  top: 64px;
 }

 87.5% {
  left: 0;
  top: 32px;
 }

 98% {
  left: 0;
  top: 32px;
 }

 100% {
  left: 0;
  top: 0;
 }
}

.loader {
 position: relative;
 width: 96px;
 height: 96px;
 transform: rotate(45deg);
}

.loader-square {
 position: absolute;
 top: 0;
 left: 0;
 width: 28px;
 height: 28px;
 margin: 2px;
 border-radius: 0px;
 background: black;
 background-size: cover;
 background-position: center;
 background-attachment: fixed;
 animation: square-animation 10s ease-in-out infinite both;
}

.loader-square:nth-of-type(0) {
 animation-delay: 0s;
}

.loader-square:nth-of-type(1) {
 animation-delay: -1.4285714286s;
}

.loader-square:nth-of-type(2) {
 animation-delay: -2.8571428571s;
}

.loader-square:nth-of-type(3) {
 animation-delay: -4.2857142857s;
}

.loader-square:nth-of-type(4) {
 animation-delay: -5.7142857143s;
}

.loader-square:nth-of-type(5) {
 animation-delay: -7.1428571429s;
}

.loader-square:nth-of-type(6) {
 animation-delay: -8.5714285714s;
}

.loader-square:nth-of-type(7) {
 animation-delay: -10s;
}

.loader {
  width: 48px;
  height: 48px;
  margin: auto;
  position: relative;
}

.loader:before {
  content: '';
  width: 48px;
  height: 5px;
  background: #f0808050;
  position: absolute;
  top: 60px;
  left: 0;
  border-radius: 50%;
  animation: shadow324 0.5s linear infinite;
}

.loader:after {
  content: '';
  width: 100%;
  height: 100%;
  background: #f08080;
  position: absolute;
  top: 0;
  left: 0;
  border-radius: 4px;
  animation: jump7456 0.5s linear infinite;
}

@keyframes jump7456 {
  15% {
    border-bottom-right-radius: 3px;
  }

  25% {
    transform: translateY(9px) rotate(22.5deg);
  }

  50% {
    transform: translateY(18px) scale(1, .9) rotate(45deg);
    border-bottom-right-radius: 40px;
  }

  75% {
    transform: translateY(9px) rotate(67.5deg);
  }

  100% {
    transform: translateY(0) rotate(90deg);
  }
}

@keyframes shadow324 {

  0%,
    100% {
    transform: scale(1, 1);
  }

  50% {
    transform: scale(1.2, 1);
  }
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
                <li class="nav-item"><a class="nav-link" href="favorite.php"> <i class="far fa-heart mr-1"></i><small class="text-gray"> (<span class="num-of-fav"><?php 
                if(isset($_COOKIE['userid'])){
                  echo $numOfFav;
                }else{
                  echo 0;
                }
                ?></span>)</small></a></li>
                <?php
                    if(isset($_COOKIE['userid'])){
                      echo '<li class="nav-item "><a class="nav-link logout" href="login.php"> <i class="fas fa-user-alt mr-1 text-gray"></i>logout</a></li>';
                    }else{
                      echo '<li class="nav-item "><a class="nav-link " href="login.php"> <i class="fas fa-user-alt mr-1 text-gray"></i>Login</a></li>';
                      // اعمل ايفنت لما اضغط يبعت ريكوس تيعمل logout
                    }
                ?>
              </ul>
            </div>
          </nav>
        </div>
      </header>
      <script>
        $(".logout").click(function(e){
          e.preventDefault();
          $.ajax({
            method:"post",
            url : "logout.php",
            dataType:"json",
            beforeSend:function(data){
              var customContent = '<div class"logout-loader"><div class="loader"></div></div>';

// Open the Alertify dialog with custom content and set it as not closable by dimmer
              alertify.alert(customContent, function () {
                alertify.success('Great');
              }).set({'closableByDimmer': false}).show();
            },
            success:function(data){
              console.log(data);
              $(".ajs-close").trigger("click")
              window.location.replace("login.php");

            },
            error:function(data){
              console.log(data);
            }
          })
        })
      </script>