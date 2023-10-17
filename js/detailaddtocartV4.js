(async () => {
  $(".detailaddtocart").click(function () {
    let userId = $(this).attr("data-user-id");
    let productId = $(this).attr("data-product-id");
    let productName = $(this).attr("data-product-name");
    let productQuantity = $("#quantity").val();
    if (logedInOrNot) {
      $.ajax({
        method: "POST",
        url: "phpUserFuntions/addtocart.php",
        dataType: "json",
        data: {
          userid: userId,
          productid: productId,
          quantity: productQuantity,
        },
        headers: {},
        success: function (response) {
          // Handle the JSON response
          console.log(response);
          if (response.status == "sucsess") {
            swal({
              title: `${response.message}`,
              icon: "success",
              dangerMode: true,
            }).then(() => {
              $(".num-of-products").text(
                parseInt($(".num-of-products").text()) + 1
              );
            });
          } else {
            swal({
              title: `${productName} ${response.message}`,
              icon: "error",
              dangerMode: true,
            });
          }
        },
        error: function (res) {
          swal({
            title: `failed to add ${productName} `,
            text: "Something went wrong plaese try again later",
            icon: "error",
            dangerMode: true,
          });
        },
      });
    }
  });

  $(".modaladdtocart").click(function () {
    let userId = $(this).attr("data-user-id");
    let productId = $(this).attr("data-product-id");
    let productName = $(this).attr("data-product-name");
    let productQuantity = $(this).closest(".pro").find(".quantitymodal").val();
    if (logedInOrNot) {
      $.ajax({
        method: "POST",
        url: "phpUserFuntions/addtocart.php",
        dataType: "json",
        data: {
          userid: userId,
          productid: productId,
          quantity: productQuantity,
        },
        headers: {},
        success: function (response) {
          // Handle the JSON response
          console.log(response);
          if (response.status == "sucsess") {
            swal({
              title: `${productName} is added to card`,
              icon: "success",
              dangerMode: true,
            }).then(() => {
              $(".num-of-products").text(
                parseInt($(".num-of-products").text()) + 1
              );
            });
          } else {
            swal({
              title: `${productName} ${response.message}`,
              icon: "error",
              dangerMode: true,
            });
          }
        },
        error: function (res) {
          swal({
            title: `failed to add ${productName} `,
            text: "Something went wrong plaese try again later",
            icon: "error",
            dangerMode: true,
          });
        },
      });
    }
  });
})();
