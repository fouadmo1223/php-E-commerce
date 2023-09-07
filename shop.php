<?php
session_start();

    include 'includes/Nav.php';
   
    if(!isset($_SESSION['page'])){
      $_SESSION['page'] = 0;
    }
$pageee = $_SESSION['page'];
// echo "<h1>$pageee</h1>";

    if(!isset($_GET['cat_id'])){
      $selectAll = "SELECT * FROM products";
      $pages = $connection -> query($selectAll);
      $numOfPages = ceil(($pages -> num_rows) / 7);
      $selectProduct = "SELECT * FROM products LIMIT $pageee,7";
    }else{
      $catId = $_GET['cat_id'];
      $selectAll = "SELECT * FROM products WHERE category = $catId";
      $pages = $connection -> query($selectAll);
      $numOfPages = ceil(($pages -> num_rows) / 7);
      $selectProduct = "SELECT * FROM products WHERE category = $catId  LIMIT $pageee,7";
    }
    $query = $connection -> query($selectProduct);
?>
      <!--  Modal -->
      <?php
          foreach($query as $product){ 
      ?>
      <div class="modal fade" id="productView<?=$product['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="row align-items-stretch">
                <div class="col-lg-6 p-lg-0"><a class="product-view d-block h-100 bg-cover bg-center" style="background: url(admin/images/<?=$product['image']?>)" href="admin/images/<?=$product['image']?>" data-lightbox="productview" title="Red digital smartwatch"></a><a class="d-none" href="img/product-5-alt-1.jpg" title="Red digital smartwatch" data-lightbox="productview"></a><a class="d-none" href="img/product-5-alt-2.jpg" title="Red digital smartwatch" data-lightbox="productview"></a></div>
                <div class="col-lg-6">
                  <button class="close p-4" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <div class="p-5 my-md-4 pro">
                    <ul class="list-inline mb-2">
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                    </ul>
                    <h2 class="h4"><?=$product['name']?></h2>
                    <p class="text-muted">$<?php
                        if($product['sale'] > 0 ){
                          echo $product['sale'];
                        }else{
                          echo $product['price'];
                        }
                    ?></p>
                    <p class="text-small mb-4"><?=$product['describtion']?></p>
                    <div class="row align-items-stretch mb-4">
                      <div class="col-sm-7 pr-sm-0">
                        <div class="border d-flex align-items-center justify-content-between py-1 px-3"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                          <div class="quantity">
                            <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                            <input class="form-control border-0 shadow-0 p-0 quantitymodal"  type="text" value="1">
                            <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-5 pl-sm-0"><button class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0 modaladdtocart" data-user-id=<?php 
                        if(isset($_COOKIE['userid'] )){echo "{$_COOKIE['userid']}";}
                      ?>  data-product-id="<?= $product['id']?>"  data-product-name="<?= $product['name']?>">Add to cart</button></div>
                    </div><a class="btn btn-link text-dark p-0" href="#"><i class="far fa-heart mr-2"></i>Add to wish list</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
          }
      ?>
      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Shop</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <div class="container p-0">
            <div class="row">
              <!-- SHOP SIDEBAR-->
              <div class="col-lg-3 order-2 order-lg-1">
                
                <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase font-weight-bold">Categories </strong></div>
                <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                  <li class="mb-2"><a class="reset-anchor" href="?">All</a></li>
                  <?php
                        $selection = $connection -> query('SELECT * FROM  category');
                      foreach($selection as $category){
                  ?>
                  <li class="mb-2"><a class="reset-anchor <?php
                     if(isset($_GET['cat_id'])){
                       if($category['id'] == $_GET['cat_id']){echo"cat-active";}
                     }
                  ?>" href="phpUserFuntions/nextProductPage.php?cat_id=<?= $category['id']?>&page=0"><?= $category['name']?></a></li>
                  <?php
                      }
                  ?>
                </ul>
            <h6 class="text-uppercase mb-4">Price range</h6>
                <div class="price-range pt-4 mb-5">
                  <div id="range"></div>
                  <div class="row pt-2">
                    <div class="col-6"><strong class="small font-weight-bold text-uppercase">From</strong></div>
                    <div class="col-6 text-right"><strong class="small font-weight-bold text-uppercase">To</strong></div>
                  </div>
                </div>
                <h6 class="text-uppercase mb-3">Show only</h6>
                <div class="custom-control custom-checkbox mb-1">
                  <input class="custom-control-input" id="customCheck1" type="checkbox">
                  <label class="custom-control-label text-small" for="customCheck1">Returns Accepted</label>
                </div>
                <div class="custom-control custom-checkbox mb-1">
                  <input class="custom-control-input" id="customCheck2" type="checkbox">
                  <label class="custom-control-label text-small" for="customCheck2">Returns Accepted</label>
                </div>
                <div class="custom-control custom-checkbox mb-1">
                  <input class="custom-control-input" id="customCheck3" type="checkbox">
                  <label class="custom-control-label text-small" for="customCheck3">Completed Items</label>
                </div>
                <div class="custom-control custom-checkbox mb-1">
                  <input class="custom-control-input" id="customCheck4" type="checkbox">
                  <label class="custom-control-label text-small" for="customCheck4">Sold Items</label>
                </div>
                <div class="custom-control custom-checkbox mb-1">
                  <input class="custom-control-input" id="customCheck5" type="checkbox">
                  <label class="custom-control-label text-small" for="customCheck5">Deals &amp; Savings</label>
                </div>
                <div class="custom-control custom-checkbox mb-4">
                  <input class="custom-control-input" id="customCheck6" type="checkbox">
                  <label class="custom-control-label text-small" for="customCheck6">Authorized Seller</label>
                </div>
                <h6 class="text-uppercase mb-3">Buying format</h6>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" id="customRadio1" type="radio" name="customRadio">
                  <label class="custom-control-label text-small" for="customRadio1">All Listings</label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" id="customRadio2" type="radio" name="customRadio">
                  <label class="custom-control-label text-small" for="customRadio2">Best Offer</label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" id="customRadio3" type="radio" name="customRadio">
                  <label class="custom-control-label text-small" for="customRadio3">Auction</label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" id="customRadio4" type="radio" name="customRadio">
                  <label class="custom-control-label text-small" for="customRadio4">Buy It Now</label>
                </div>
              </div>
              <!-- SHOP LISTING-->
              <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                <div class="row mb-3 align-items-center">
                  <div class="col-lg-6 mb-2 mb-lg-0">
                    <p class="text-small text-muted mb-0">Showing 1–12 of 53 results</p>
                  </div>
                  <div class="col-lg-6">
                    <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                      <li class="list-inline-item text-muted mr-3"><a class="reset-anchor p-0" href="#"><i class="fas fa-th-large"></i></a></li>
                      <li class="list-inline-item text-muted mr-3"><a class="reset-anchor p-0" href="#"><i class="fas fa-th"></i></a></li>
                      <li class="list-inline-item">
                        <select class="selectpicker ml-auto" name="sorting" data-width="200" data-style="bs-select-form-control" data-title="Default sorting">
                          <option value="default">Default sorting</option>
                          <option value="popularity">Popularity</option>
                          <option value="low-high">Price: Low to High</option>
                          <option value="high-low">Price: High to Low</option>
                        </select>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="row">
                  <!-- PRODUCT-->
                  <?php
                      foreach($query as $product){ 
                        $price =$product['price'];
                  ?>
                  <div class="col-lg-4 col-sm-6  hvr-float" >
                    <div class="product text-center" data-aos="fade-up"  data-aos-duration="1500">
                      <div class="mb-3 position-relative">
                        <div class="badge text-white badge-"></div><a class="d-block" href="detail.php?id=<?=$product['id']?>"><img class="img-fluid w-100" src="admin/images/<?=$product['image']?>" alt="..."></a>
                         <?php
                      if($product['new'] == 1){
                        echo "<div class='badge text-white badge-primary'>New</div>";
                      }if ($product['sale'] > 0){
                        echo "<div class='badge text-white badge-info'>Sale</div>";
                        $price = $product['sale'];
                      }
                  ?>
                        <div class="product-overlay">
                          <ul class="mb-0 list-inline">
                                <li class="list-inline-item m-0 p-0 "><button class="btn btn-sm btn-outline-dark favorite <?php
                        if(isset($_COOKIE['userid'])){
                            $selection = $connection -> query("SELECT * FROM favorites where user_id = {$_COOKIE['userid']} && product_id = {$product['id']}");
                          if ($selection -> num_rows > 0){
                            echo "heart-clicked";
                          }
                        }
                      ?>" data-product-id="<?= $product['id'] ?>" data-product-name="<?= $product['name'] ?>" data-user-id="<?php 
                      if(isset($_COOKIE['userid'])){
                        echo $_COOKIE['userid'];
                      }
                      ?>" ><i class="far fa-heart"></i></button></li>
                            <li class="list-inline-item m-0 p-0"><button class="btn btn-sm btn-dark addtocart"  data-user-id=<?php
                                if(isset($_COOKIE['userid'])){
                                  echo $_COOKIE['userid'];
                                }
                            ?> data-product-id="<?= $product['id']?>"  data-product-name="<?= $product['name']?>">Add to cart</button></li>
                            <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView<?=$product['id']?>" data-toggle="modal"><i class="fas fa-expand"></i></a></li>
                          </ul>
                        </div>
                      </div>
                      <h6> <a class="reset-anchor" href="detail.php?id=<?=$product['id']?>"><?=$product['name']?></a></h6>
                      <p class="small text-muted">$<?=$price?></p>
                    </div>
                  </div>
                  <?php
                      } 
                  ?>
             
                 
                </div>
                <!-- PAGINATION-->
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center justify-content-lg-end">
                    <?php
                        for($i = 0; $i < $numOfPages ; $i++){
                    ?>
                    <li class="page-item <?php
                        if($_SESSION['page'] / 7 == $i) {echo "active";}
                    ?>"><a class="page-link" href="phpUserFuntions/nextProductPage.php?page=<?= $i ?> <?php
                        if(isset($_GET['cat_id'])){
                          echo "&cat_id=" . $_GET['cat_id'];
                        }
                    ?>"><?= $i+1 ?></a></li>
                    
                  <?php
                      }
                  ?>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </section>
      </div>
         <?php
    include 'includes/Footer.php';
?>
      <!-- JavaScript files-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="vendor/lightbox2/js/lightbox.min.js"></script>
      <script src="vendor/nouislider/nouislider.min.js"></script>
      <script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
      <script src="vendor/owl.carousel2/owl.carousel.min.js"></script>
      <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
      <script src="js/front.js"></script>
      <!-- favorite requests  -->
      <script src="js/fav.js"></script>
      <!-- add to cart requests -->
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <!-- modal add to cart  -->
    <script src="js/detailaddtocart.js"></script>
      <script src="js/addtocart.js"></script>
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <!-- Nouislider Config-->
      
      <script>
            AOS.init();
        var range = document.getElementById('range');
        noUiSlider.create(range, {
            range: {
                'min': 0,
                'max': 2000
            },
            step: 5,
            start: [100, 1000],
            margin: 300,
            connect: true,
            direction: 'ltr',
            orientation: 'horizontal',
            behaviour: 'tap-drag',
            tooltips: true,
            format: {
              to: function ( value ) {
                return '$' + value;
              },
              from: function ( value ) {
                return value.replace('', '');
              }
            }
        });
        
      </script>
      <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite - 
        //   see more here 
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {
        
            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
        
      </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </div>
     
    <script>

          let logedInOrNot = <?php
          if(isset($_COOKIE['userid'])){
            echo "true";
          }else{
            echo "false";
          }
      ?>;
      $(document).click(function(event){
          if (!logedInOrNot && !$(event.target).closest('.swal-modal').length) {
          swal({
            icon:"info",
            title: "You Should login First",
            icon: "info",
            buttons: {confirm :"login",
            cancel: "Cancel"},
           
        }).then((res)=>{
         if(res){
         window.location.href ="login.html";
         }else{
       
         }
        })
  }
      })



        

    </script>
  </body>
</html>