

<?php
   include 'includes/Nav.php';
    
  if(isset($_COOKIE['userid'])){
    $userId = $_COOKIE['userid'];
    $selectUserFromCookie = $connection -> query("SELECT * FROM users WHERE id = '$userId'");
    $user = $selectUserFromCookie -> fetch_assoc();
    $userNamee = $user['username']; 
    
  }
  else{
    $userNamee = "none";
  }
   if(isset($_GET['id'])){
     $productId = $_GET['id'];
    $query = $connection -> query("SELECT * FROM products WHERE id =$productId");
    $product = $query ->fetch_assoc();
    $productCat  = $product['category'];
    $productID = $product['id'];
    $price =$product['price'];
      if ($product['sale'] > 0){
        $price = $product['sale'];
      }
    }else{
     $query = $connection -> query("SELECT * FROM products LIMIT 1");
    $product = $query ->fetch_assoc();
    $productCat  = $product['category'];
    $productID = $product['id'];
    $price =$product['price'];
      if ($product['sale'] > 0){
        $price = $product['sale'];
      }
   }

?>


    
      <section class="py-5">
        <div class="container">
          <div class="row mb-5">
            <div class="col-lg-6">
              <!-- PRODUCT SLIDER-->
              <div class="row m-sm-0">
                <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0">
                  <div class="owl-thumbs d-flex flex-row flex-sm-column" data-slider-id="1">
                    <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="img/product-detail-1.jpg" alt="..."></div>
                    <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="img/product-detail-2.jpg" alt="..."></div>
                    <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="img/product-detail-3.jpg" alt="..."></div>
                    <div class="owl-thumb-item flex-fill mb-2"><img class="w-100" src="img/product-detail-4.jpg" alt="..."></div>
                  </div>
                </div>
                <div class="col-sm-10 order-1 order-sm-2">
                  <div class="owl-carousel product-slider" data-slider-id="1"><a class="d-block" href="admin/images/<?= $product['image'] ?>" data-lightbox="product" title="<?= $product['name'] ?>"><img class="img-fluid" src="admin/images/<?= $product['image'] ?>" alt="..."></a><a class="d-block" href="img/product-detail-2.jpg" data-lightbox="product" title="Product item 2"><img class="img-fluid" src="img/product-detail-2.jpg" alt="..."></a><a class="d-block" href="img/product-detail-3.jpg" data-lightbox="product" title="Product item 3"><img class="img-fluid" src="img/product-detail-3.jpg" alt="..."></a><a class="d-block" href="img/product-detail-4.jpg" data-lightbox="product" title="Product item 4"><img class="img-fluid" src="img/product-detail-4.jpg" alt="..."></a></div>
                </div>
              </div>
            </div>
            <!-- PRODUCT DETAILS-->
            <div class="col-lg-6">
              <ul class="list-inline mb-2">
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
              </ul>
              <h1><?= $product['name'] ?></h1>
              <p class="text-muted lead">$<?= $price ?></p>
              <p class="text-small mb-4"><?= $product['describtion'] ?></p>
              <div class="row align-items-stretch mb-4">
                <div class="col-sm-5 pr-sm-0">
                  <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                    <div class="quantity">
                      <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                      <input class="form-control border-0 shadow-0 p-0 " id="quantity" type="text" value="1">
                      <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                    </div>
                  </div>
               </div>                                                                                                                       <!--     product -->
                <div class="col-sm-3 pl-sm-0"><button class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0 detailaddtocart" data-user-id="<?php 
                  if(isset($_COOKIE['userid'])){
                    echo $_COOKIE['userid'];
                  }
                ?>" data-product-id="<?= $product['id']?>"  data-product-name="<?= $product['name']?>">Add to cart</button></div>
              </div><a class="btn btn-link text-dark p-0 mb-4" href="#"><i class="far fa-heart mr-2"></i>Add to wish list</a><br>
              <ul class="list-unstyled small d-inline-block">
                <li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">SKU:</strong><span class="ml-2 text-muted">039</span></li>
                <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Category:</strong><a class="reset-anchor ml-2" href="#"><?php
                    $productCat =  $product['category'];
                    $query=$connection -> query("SELECT * FROM category WHERE id = $productCat");
                    $category = $query->fetch_assoc();
                    echo $category['name'];
                ?></a></li>
                <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Tags:</strong><a class="reset-anchor ml-2" href="#">Innovation</a></li>
              </ul>
            </div>
          </div>
          <!-- DETAILS TABS-->
          <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a></li>
            <li class="nav-item"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a></li>
          </ul>
          <div class="tab-content mb-5" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
              <div class="p-4 p-lg-5 bg-white">
                <h6 class="text-uppercase">Product description </h6>
                <p class="text-muted text-small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
              <div class="p-4 p-lg-5 bg-white">
                <div class="row">
                  <div class="col-lg-8 review-contain">
                    <!-- review div -->
                    <?php
                        $selection = $connection -> query("SELECT * FROM reviews WHERE product_id = {$product['id']}  ORDER BY id DESC LIMIT 4");
                        if($selection -> num_rows > 0){
                          
                          foreach($selection as $review){
                            $rate = $review['rate'];                         
                       
                    ?>
                    <div class="media mb-3"> <!-- <img class="rounded-circle" src="img/customer-1.png" alt="" width="50"> -->
                      <div class="media-body ml-3 hvr-grow">
                        <h6 class="mb-0 text-uppercase"><?php
                            $userId = $review['user_id'];
                            $selectUser = $connection -> query("SELECT * FROM users WHERE id = $userId");
                            $userName = $selectUser ->fetch_assoc();
                            echo $userName['username'];
                        ?></h6>
                        
                        <ul class="list-inline mb-1 text-xs" title="<?= $rate?> star">
                          <?php
                              for($i = 0; $i < $rate ; $i++) {
                                if($i +1 > $rate) {
                              
                          ?>
                          <li class="list-inline-item m-0"><i class="fas fa-star-half-alt text-warning"></i></li>
                          <?php
                              }else{
                          ?>
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <?php
                              }}
                          ?>
                                                    <!-- <li class="list-inline-item m-0"><i class="fas fa-star-half-alt text-warning"></i></li> -->
                        </ul>
                        <p class="text-small mb-0 text-muted"><?= $review['describition']?></p>

                      </div>
                    </div>
                   <?php
                        }}else{
                          echo "<h4 class ='txt-c'> There is no <span class = 'fw-bold text-danger'> Reviews </span> to this product </h4>";
                        }
                   ?>

                   <form class="mt-30" id="sendComment" data-product-id = "<?= $product['id'] ?>" data-user-id = <?php
                       if(isset($_COOKIE['userid'])){
                        echo $_COOKIE['userid'];
                       }
                   ?> >
                     
                  </div>
                   <div class="row">
                        <div class="col">
                          <input type="text" required class="form-control comment-value" placeholder="Enter your Comment">
                        </div>
                        <div class=" w-fit" >
                          <input type="number"  max="5" step=".001" min="0" required class="form-control   rate-value" placeholder=" rate">
                        </div>
                        <div class="d-inline-block w-fit">
                          <input type="submit" class="btn btn-primary sendcomment"  value="send">
                        </div>
                        <div class="spinner-border text-warning d-none" role="status">
                            <span class="visually-hidden">Loading...</span>
                          </div>
                      </div>
                      <p class="comment-error c-red fs-15 mt-10"> </p>
                    </form>
                </div>
              </div>
            </div>
          </div>
          <!-- RELATED PRODUCTS-->
          <h2 class="h5 text-uppercase mb-4 reeeeeee">Related products</h2>
          <div class="row">
            <?php
                $selection = $connection -> query("SELECT * FROM products WHERE category = $productCat && id != $productID LIMIT 4");
                foreach($selection as $prod){
            ?>
            <!-- PRODUCT-->
            <div class="col-lg-3 col-sm-6">
              <div class="product text-center skel-loader hvr-float">
                <div class="d-block mb-3 position-relative"><a class="d-block" href="?id=<?= $prod['id']?>"><img class="img-fluid w-100" src="admin/images/<?= $prod['image']?>" alt="..."></a>
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
                      <li class="list-inline-item m-0 p-0"><button class="btn btn-sm btn-dark addtocart"  data-user-id="<?php 
                       if(isset($_COOKIE['userid'] )){
                        echo $_COOKIE['userid'] ;
                       }
                       ?>"  data-product-id="<?= $prod['id']?>"  data-product-name="<?= $prod['name']?>">Add to cart</button></li>
                      <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView<?= $prod['id']?>" data-toggle="modal"><i class="fas fa-expand"></i></a></li>
                    </ul>
                  </div>
                </div>
                <h6> <a class="reset-anchor" href="?id=<?= $prod['id']?>"><?= $prod['name']?></a></h6>
                <p class="small text-muted">$<?= $prod['price']?></p>
              </div>
            </div>
<!--  Modal -->
            <div class="modal fade" id="productView<?= $prod['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="row align-items-stretch">
                <div class="col-lg-6 p-lg-0"><a class="product-view d-block h-100 bg-cover bg-center" style="background: url(admin/images/<?= $prod['image'] ?>)" href="admin/images/<?= $prod['image'] ?>" data-lightbox="productview" title="Red digital smartwatch"></a><a class="d-none" href="img/product-5-alt-1.jpg" title="Red digital smartwatch" data-lightbox="productview"></a><a class="d-none" href="img/product-5-alt-2.jpg" title="Red digital smartwatch" data-lightbox="productview"></a></div>
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
                    <h2 class="h4"><?= $prod['name']?></h2>
                    <p class="text-muted">$<?= $prod['price']?></p>
                    <p class="text-small mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</p>
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
                      <div class="col-sm-5 pl-sm-0"><button class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0 modaladdtocart"  data-user-id="<?php 
                        if(isset($_COOKIE['userid'])){
                          echo $_COOKIE['userid'];
                        }
                      ?>"  data-product-id="<?= $prod['id']?>"  data-product-name="<?= $prod['name']?>">Add to cart</button></div>
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
          </div>
        </div>
      </section>
      <footer class="bg-dark text-white">
        <div class="container py-4">
          <div class="row py-5">
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">Customer services</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="#">Help &amp; Contact Us</a></li>
                <li><a class="footer-link" href="#">Returns &amp; Refunds</a></li>
                <li><a class="footer-link" href="#">Online Stores</a></li>
                <li><a class="footer-link" href="#">Terms &amp; Conditions</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">Company</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="#">What We Do</a></li>
                <li><a class="footer-link" href="#">Available Services</a></li>
                <li><a class="footer-link" href="#">Latest Posts</a></li>
                <li><a class="footer-link" href="#">FAQs</a></li>
              </ul>
            </div>
            <div class="col-md-4">
              <h6 class="text-uppercase mb-3">Social media</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="#">Twitter</a></li>
                <li><a class="footer-link" href="#">Instagram</a></li>
                <li><a class="footer-link" href="#">Tumblr</a></li>
                <li><a class="footer-link" href="#">Pinterest</a></li>
              </ul>
            </div>
          </div>
          <div class="border-top pt-4" style="border-color: #1d1d1d !important">
            <div class="row">
              <div class="col-lg-6">
                <p class="small text-muted mb-0">&copy; 2020 All rights reserved.</p>
              </div>
              <div class="col-lg-6 text-lg-right">
                <p class="small text-muted mb-0">Template designed by <a class="text-white reset-anchor" href="https://bootstraptemple.com/p/bootstrap-ecommerce">Bootstrap Temple</a></p>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- JavaScript files-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="vendor/lightbox2/js/lightbox.min.js"></script>
      <script src="vendor/nouislider/nouislider.min.js"></script>
      <script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
      <script src="vendor/owl.carousel2/owl.carousel.min.js"></script>
      <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
      <script src="js/front.js"></script>
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
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <!-- add to cart with quantity -->
     <script src="js/detailaddtocart.js"></script>
     <!-- add to cart wittout quantity -->
     <script src="js/addtocart.js"></script>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- favorite requests -->
    <script src="js/fav.js"></script>
    <script src="js/alertify.min.js"></script>
    <script>
 
 let userNamee ="<?= $userNamee?>";
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


        if(logedInOrNot){
          $("#sendComment").submit(function(e){
            e.preventDefault();

            let rateValue = parseFloat($(".rate-value").val());

      if (isNaN(rateValue) || rateValue < 0 || rateValue > 5) {
        alertify.notify("Rate must be a number between 0 and 5", "error", 2, function () {
          $(".rate-value").addClass("is-invalid");
        });
      }else{
        $(".rate-value").removeClass("is-invalid");
        let comment =$(".comment-value").val();
        let rate =rateValue ;
            userId = $(this).attr("data-user-id");
            productId = $(this).attr("data-product-id");
            
            

            $.ajax({
              method: "POST",
              url: "phpUserFuntions/addcomment.php",
              dataType: "json",
              data: {
                userid: userId,
                productid: productId,
                comment:comment,
                rate :rate
              },
              headers: {},
              beforeSend:function(){
                $(".spinner-border").removeClass("d-none");
                $(".sendcomment").addClass("disabled");
              },
              success: function (response) {
                // Handle the JSON response
                console.log(response);
             /////////////////   it adds four comments /////////////////
                if(response.status == "sucsess"){
                  $(".comment-value").val('');
                  $(".rate-value").val("");
                  const newCommentHtml = `
                            <div class="media mb-3">
                             <!-- <img class="rounded-circle" src="img/customer-1.png" alt="" width="50"> -->
                              <div class="media-body ml-3 hvr-grow">
                                <h6 class="mb-0 text-uppercase">${userNamee}</h6>
                                <ul class="list-inline mb-1 text-xs" title="${rate} star">
                                  ${(() => {
                                    let starsHTML = "";
                                    for (let i = 0; i < rate; i++) {
                                      if (i + 1 > rate) {
                                        starsHTML += `<li class="list-inline-item m-0"><i class="fas fa-star-half-alt text-warning"></i></li>`;
                                      } else {
                                        starsHTML += `<li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>`;
                                      }
                                    }
                                    return starsHTML;
                                  })()}
                                </ul>
                                <p class="text-small mb-0 text-muted">${comment}</p>
                              </div>
                            </div>
                          `;
                  $(".comment-error").addClass("d-none")
                   
                    alertify.notify(response.message, "success", 2, function () {
                    $(".spinner-border").addClass("d-none");
                    $(".sendcomment").removeClass("disabled");
                      $(".review-contain").append(newCommentHtml);
                    });
                }else if(response.status == "error"){
                   $(".comment-error").text(response.message);
                  
                    alertify.notify(response.message, "error", 2, function () {
                      $(".spinner-border").addClass("d-none");
                      $(".sendcomment").removeClass("disabled");
                      $(".comment-error").removeClass("d-none")
                     });
                }
               
              },
              error: function (res) {
                console.log(res);
              },
            });
          }
          })
        }



         

    </script>
  </body>
</html>