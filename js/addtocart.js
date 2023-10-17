(async () => {
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
          console.log(res);
        },
      });
    }
  });
})();
