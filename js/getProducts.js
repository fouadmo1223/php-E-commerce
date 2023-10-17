function getProdcts(data) {
  if (data.length > 0) {
    for (let i = 0; i < data.length; i++) {
      console.log(data[i].id);
      $(".product-container").append(`
                 <!--        Product     -->
                 <div class="col-lg-4 col-sm-6  hvr-float mb-20" data-aos="fade-up"  data-aos-duration="1500">
                        <div class="product text-center"  >
                          <div class="mb-3 position-relative">
                          ${
                            data[i].new == 1
                              ? `<div class="badge text-white badge-primary">New</div>`
                              : ""
                          }${
        data[i].sale > 0
          ? `<div class="badge text-white badge-info">Sale</div>`
          : ""
      }<a class="d-block mb-20" style='height:300px' href="detail.php?id=${
        data[i].id
      }"><img class="img-fluid w-100" src="admin/images/${
        data[i].image
      }" alt="..."></a>
                            <div class="product-overlay">
                              <ul class="mb-0 list-inline">
                                <li class="list-inline-item m-0 p-0"><button class="btn btn-sm btn-outline-dark favorite ${
                                  data[i].fav ? "heart-clicked" : ""
                                }" data-product-id=${
        data[i].id
      } data-product-name=${
        data[i].name
      } data-user-id=${userId}><i class="far fa-heart"></i></button></li>
                                <li class="list-inline-item m-0 p-0"><button class="btn btn-sm btn-dark addtocart " data-product-id=${
                                  data[i].id
                                } data-product-name=${
        data[i].name
      } data-user-id=${userId}>Add to cart</button></li>
                                <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView${
                                  data[i].id
                                }" data-toggle="modal"><i class="fas fa-expand"></i></a></li>
                              </ul>
                            </div>
                          </div>
                          <h6> <a class="reset-anchor" href="detail.php">${
                            data[i].name
                          }</a></h6>
                          <p class="small text-muted">$${
                            data[i].sale > 0 ? data[i].sale : data[i].price
                          }</p>
                        </div>
                      </div>
                      
                        <!--        Modal     -->
    
                      <div class="modal fade" id="productView${
                        data[i].id
                      }" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="row align-items-stretch">
                    <div class="col-lg-6 p-lg-0"><a class="product-view d-block h-100 bg-cover bg-center" style="background: url(admin/images/${
                      data[i].image
                    })" href="admin/images/${
        data[i].image
      }" data-lightbox="productview" title="Red digital smartwatch"></a><a class="d-none" href="admin/images/${
        data[i].image
      }" title=${
        data[i].name
      } data-lightbox="productview"></a><a class="d-none" href="img/product-5-alt-2.jpg" title="Red digital smartwatch" data-lightbox="productview"></a></div>
                    <div class="col-lg-6">
                      <button class="close p-4" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      <div class="p-5 my-md-4">
                        <ul class="list-inline mb-2">
                          <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                        </ul>
                        <h2 class="h4">${data[i].name}</h2>
                        <p class="text-muted">$${
                          data[i].sale > 0 ? data[i].sale : data[i].price
                        }</p>
                        <p class="text-small mb-4">${data[i].describtion}</p>
                        <div class="row align-items-stretch mb-4">
                          <div class="col-sm-7 pr-sm-0">
                            <div class="border d-flex align-items-center justify-content-between py-1 px-3"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                              <div class="quantity">
                                <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                                <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                                <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-5 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="cart.php">Add to cart</a></div>
                        </div><a class="btn btn-link text-dark p-0" href="#"><i class="far fa-heart mr-2"></i>Add to wish list</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
                      
                      `);
    }

    (async () => {
      //////////         add to fav     /////////////////////////

      $(".favorite").click(function () {
        $(this).toggleClass("heart-clicked");
        let userId = $(this).attr("data-user-id");
        let productId = $(this).attr("data-product-id");
        let productName = $(this).attr("data-product-name");
        if ($(this).hasClass("heart-clicked")) {
          if (logedInOrNot) {
            $.ajax({
              method: "POST",
              url: "phpUserFuntions/addtofav.php",
              dataType: "json",
              data: {
                userid: userId,
                productid: productId,
              },
              headers: {},
              success: function (response) {
                // Handle the JSON response
                console.log(response);
                swal({
                  title: `${productName} is added to favorites`,
                  icon: "success",
                  dangerMode: true,
                }).then(() => {
                  $(".num-of-fav").text(parseInt($(".num-of-fav").text()) + 1);
                });
              },
              error: function (res) {
                console.log(res);
              },
            });
          }
        } else {
          if (logedInOrNot) {
            $.ajax({
              method: "POST",
              url: "phpUserFuntions/removefromfav.php",
              dataType: "json",
              data: {
                userid: userId,
                productid: productId,
              },
              headers: {},
              success: function (response) {
                // Handle the JSON response
                console.log(response);
                swal({
                  title: `${productName} is removed from favorites`,
                  icon: "error",
                  dangerMode: true,
                }).then(() => {
                  $(".num-of-fav").text(parseInt($(".num-of-fav").text()) - 1);
                });
              },
              error: function (res) {
                console.log(res);
              },
            });
          }
        }
      });

      //////////         add to cart     /////////////////////////

      $(".addtocart").click(function () {
        let userId = $(this).attr("data-user-id");
        let productId = $(this).attr("data-product-id");
        let productName = $(this).attr("data-product-name");
        if (logedInOrNot) {
          $.ajax({
            method: "POST",
            url: "phpUserFuntions/addtocart.php",
            dataType: "json",
            data: {
              userid: userId,
              productid: productId,
            },
            headers: {},
            success: function (response) {
              // Handle the JSON response
              console.log(response);
              swal({
                title: `${productName} is added to card`,
                icon: "success",
                dangerMode: true,
              }).then(() => {
                $(".num-of-products").text(
                  parseInt($(".num-of-products").text()) + 1
                );
              });
            },
            error: function (res) {
              console.log(res);
            },
          });
        }
      });
    })();
  } else {
    $(".product-container").append(
      `<h3 class="mt-40 hvr-back-pulse txt-c rad-10 ">There is no product's to show </h3>`
    );
  }
}
