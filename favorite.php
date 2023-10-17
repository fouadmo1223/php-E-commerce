<?php
    include 'includes/Nav.php';
   
?>

<style>
  .fa-trash-alt:hover{
    color: red !important;
    transition: .3s;
}
</style>
      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h2 class="h2 text-uppercase mb-0">Favorites</h2>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Favorite</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <h2 class="h5 text-uppercase mb-4">Favorite Products</h2>
          <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
              <!-- CART TABLE-->
              <div class="table-responsive mb-4">
                <table class="table">
                  <thead class="bg-light">
                    <tr>
                      <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Product</strong></th>
                      <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Price</strong></th>
                 
                      
                      <th class="border-0" scope="col"> </th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- ------  Products ------- -->
                    <?php
                        $totalPrice=0;
                        $userId = $_COOKIE['userid'];
                        $selection = $connection -> query("SELECT * FROM favorites WHERE user_id = $userId ");
                        foreach($selection as $row){
                         $productId = $row['product_id'];
                         $selectProduct = $connection -> query("SELECT * FROM products WHERE id = $productId");
                         $product = $selectProduct ->fetch_assoc();
                         if($product['sale'] > 0){
                          $productPrice = $product['sale'];
                         }else{
                          $productPrice = $product['price'];
                         }
                         
                    ?>

                    <tr>
                      <th class="pl-0 border-0" scope="row">
                        <div class="media align-items-center"><a class="reset-anchor d-block animsition-link" href="detail.php?id=<?= $product['id'] ?>"><img src="admin/images/<?= $product['image'] ?>" alt="..." width="70"/></a>
                          <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link" href="detail.php?id=<?= $product['id'] ?>"><?= $product['name'] ?></a></strong></div>
                        </div>
                      </th>
                      <td class="align-middle border-0">
                        <p class="mb-0 small">$<?= $productPrice ?></p>
                      </td>                     
                      <td class="align-middle border-0"><a class="reset-anchor remove-from-fav" data-order-id ="<?= $row['product_id']?>"  data-user-id ="<?= $row['user_id']?>" style="cursor: pointer;"><i class="fas fa-trash-alt small text-muted "  ></i></a></td>
                    </tr>
                    <?php
                        }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- CART NAV-->
              <div class="bg-light px-4 py-3">
                <div class="row align-items-center text-center">
                  <div class="col-md-6 mb-3 mb-md-0 text-md-left"><a class="btn btn-link p-0 text-dark btn-sm" href="shop.php"><i class="fas fa-long-arrow-alt-left mr-2"> </i>Continue shopping</a></div>
                  <div class="col-md-6 text-md-right"><a class="btn btn-outline-dark btn-sm" href="checkout.html">Procceed to checkout<i class="fas fa-long-arrow-alt-right ml-2"></i></a></div>
                </div>
              </div>
            </div>
           
          </div>
        </section>
      </div>
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

    <!-- sweet alaert  -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- alertfy  -->
    <script src="js/alertify.min.js"></script>
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

     $(".remove-from-fav").click(function(){
     let orederId =  $(this).attr("data-order-id");
     let userId =  $(this).attr("data-user-id");
     let removeButton = $(this);
     
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {

        if (willDelete) {
          console.log(orederId)
          $.ajax({
                method:"POST",
                url:"phpUserFuntions/removefromfav.php",
                dataType: "json",
                data:{
                    productid :orederId,
                    userid:userId
                    
              }, beforeSend: function() {
               
              }
              ,success:function(response){
                 if(response.status == "sucsess"){
                  console.log(response);
                  $(removeButton).parent().parent()[0].remove();
                  $(".num-of-fav").text(
              parseInt($(".num-of-fav").text()) - 1
            );
                  
                   swal("Poof! Your product has been deleted!", {
                    icon: "success",
                  }).then(() => {
                     alertify.notify(response.message, 'success', 2, function(){});
                  })
                 }else{
                   swal("Some thing Went wrong ,please try again",{
                    icon:"error",
                  }).then(() => {
                    alertify.notify(response.message, 'error', 2, function(){});
                  })
                 }
              }
            })

        } else {
          swal("Your product is safe!",{
            icon:"error",
          }).then(() => {
                    alertify.notify("Your product still exist", 'error', 2, function(){});
                  })
        }
      });








          


     })

     
    </script>
  </body>
</html>