<?php
  
    include 'includes/Nav.php';
   
?>
<?php
              $selection = $connection -> query("SELECT * FROM products LIMIT 8");
              foreach($selection as $product){
          ?>

      <!--  Modal -->
      <div class="modal fade" id="productView<?= $product['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="row align-items-stretch">
                <div class="col-lg-6 p-lg-0"><a class="product-view d-block h-100 bg-cover bg-center" style="background: url(admin/images/<?= $product['image']?>)" href="admin/images/<?= $product['image']?>" data-lightbox="productview" title="Red digital smartwatch"></a><a class="d-none" href="img/product-5-alt-1.jpg" title="Red digital smartwatch" data-lightbox="productview"></a><a class="d-none" href="img/product-5-alt-2.jpg" title="Red digital smartwatch" data-lightbox="productview"></a></div>
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
                    <h2 class="h4"><?= $product['name']?></h2>
                    <p class="text-muted">$<?= $product['price']?></p>
                    <p class="text-small mb-4"><?= $product['describtion']?></p>
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
      <!-- HERO SECTION-->
      <div class="container " style="overflow: hidden;">
        <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url(img/hero-banner-alt.jpg)">
          <div class="container py-5">
            <div class="row px-4 px-lg-5">
              <div class="col-lg-6">
                <p class="text-muted small text-uppercase mb-2"  data-aos="fade-right"  data-aos-duration="1000">New Inspiration 2020</p>
                <h1 class="h2 text-uppercase mb-3"  data-aos="fade-right" data-aos-duration="1000" data-aos-delay="500">20% off on new season</h1><a class="btn btn-dark" href="shop.php"  data-aos="fade-right" data-aos-duration="1000" data-aos-delay="1000">Browse collections</a>
              </div>
            </div>
          </div>
        </section>
        <!-- CATEGORIES SECTION-->
        <section class="pt-5">
          <header class="text-center">
            <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
            <h2 class="h5 text-uppercase mb-4">Browse our categories</h2>
          </header>
          <div class="row">
            <div class="col-md-4 mb-4 mb-md-0"  data-aos="fade-right"  data-aos-duration="2000"><a class="category-item" href="shop.php?cat_id=3"><img class="img-fluid" src="img/cat-img-1.jpg" alt=""><strong class="category-item-title">Clothes</strong></a></div>
            <div class="col-md-4 mb-4 mb-md-0"  data-aos="fade-up" data-aos-duration="2000"><a class="category-item mb-4" href="shop.php?cat_id=8"><img class="img-fluid" src="img/cat-img-2.jpg" alt=""><strong class="category-item-title">Shoes</strong></a><a class="category-item" href="shop.php?cat_id=6"><img class="img-fluid" src="img/cat-img-3.jpg" alt=""><strong class="category-item-title">Watches</strong></a></div>
            <div class="col-md-4"  data-aos="fade-left" data-aos-duration="2000"><a class="category-item" href="shop.php?cat_id=2"><img class="img-fluid" src="img/cat-img-4.jpg" alt=""><strong class="category-item-title">Electronics</strong></a></div>
          </div>
        </section>
        <!-- TRENDING PRODUCTS-->
        <section class="py-5">
          <header>
            <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
            <h2 class="h5 text-uppercase mb-4">Top trending products</h2>
          </header>
          <div class="row">

          <?php
              $selection = $connection -> query("SELECT * FROM products LIMIT 8");
              foreach($selection as $product){
                $price =$product['price'];
          ?>
            <!-- PRODUCT-->
            <div class="col-xl-3 col-lg-4 col-sm-6 "  data-aos="fade-up"  data-aos-duration="1500">
              <div class="product text-center hvr-float">
                <div class="position-relative mb-3">
                  <div class="badge text-white badge-"></div>
                  <?php
                      if($product['new'] == 1){
                        echo "<div class='badge text-white badge-primary'>New</div>";
                      }if ($product['sale'] > 0){
                        echo "<div class='badge text-white badge-info'>Sale</div>";
                        $price = $product['sale'];
                      }
                  ?>
                  <a class="d-block" href="detail.php?id=<?= $product['id']?>"><img class="img-fluid w-100" src="admin/images/<?= $product['image']?>" alt="..."></a>
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
                      if(isset($_COOKIE['userid'])){echo  $_COOKIE['userid'] ;}
                      ?>" ><i class="far fa-heart"></i></button></li>
                      <li class="list-inline-item m-0 p-0"><button class="btn btn-sm btn-dark addtocart" data-user-id=<?php 
                        if(isset($_COOKIE['userid'] )){echo "{$_COOKIE['userid']}";}
                      ?>  data-product-id="<?= $product['id']?>"  data-product-name="<?= $product['name']?>">Add to cart</button></li>
                      <li class="list-inline-item mr-0 "><a class="btn btn-sm btn-outline-dark" href="#productView<?= $product['id']?>" data-toggle="modal"><i class="fas fa-expand"></i></a></li>
                    </ul>
                  </div>
                </div>
                <h6> <a class="reset-anchor" href="detail.php?id=<?= $product['id']?>"><?= $product['name']?></a></h6>
                <p class="small text-muted">$<?= $price?></p>
              </div>
            </div>
          
           <?php
               }
           ?>
          </div>
        </section>
        <!-- SERVICES-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row text-center">
              <div class="col-lg-4 mb-3 mb-lg-0"  data-aos="fade-right"  data-aos-duration="1500">
                <div class="d-inline-block">
                  <div class="media align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#delivery-time-1"> </use>
                    </svg>
                    <div class="media-body text-left ml-3">
                      <h6 class="text-uppercase mb-1">Free shipping</h6>
                      <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 mb-3 mb-lg-0"  data-aos="fade-up"  data-aos-duration="1500">
                <div class="d-inline-block">
                  <div class="media align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#helpline-24h-1"> </use>
                    </svg>
                    <div class="media-body text-left ml-3">
                      <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                      <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4"  data-aos="fade-left"  data-aos-duration="1500">
                <div class="d-inline-block">
                  <div class="media align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#label-tag-1"> </use>
                    </svg>
                    <div class="media-body text-left ml-3">
                      <h6 class="text-uppercase mb-1">Festival offer</h6>
                      <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- NEWSLETTER-->
        <section class="py-5">
          <div class="container p-0">
            <div class="row">
              <div class="col-lg-6 mb-3 mb-lg-0">
                <h5 class="text-uppercase">Let's be friends!</h5>
                <p class="text-small text-muted mb-0">Nisi nisi tempor consequat laboris nisi.</p>
              </div>
              <div class="col-lg-6">
                <form action="#">
                  <div class="input-group flex-column flex-sm-row mb-3">
                    <input class="form-control form-control-lg py-3" type="email" placeholder="Enter your email address" aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-dark btn-block" id="button-addon2" type="submit">Subscribe</button>
                    </div>
                  </div>
                </form>
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
      <script src="js/alertify.js"></script>
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
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
      <script src="js/addtocart.js"></script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- favorite requests -->
    <script src="js/fav.js"></script>
    <!-- modal add to cart  -->
    <script src="js/detailaddtocart.js"></script>
    <script>
       AOS.init();
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