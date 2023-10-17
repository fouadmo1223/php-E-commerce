$(".remove-from-cart").click(function () {
  let orederId = $(this).attr("data-order-id");
  let productId = $(this).attr("data-product-id");
  let productCount = $(this).attr("data-count");
  let removeButton = $(this);

  let productPrice = parseFloat(
    $(this).closest("td").prev().find(".product-total").text().split("$")[1]
  );

  let totalPrice = parseFloat($(".total").text().split("$")["1"]);
  let subTotal = parseFloat($(".sub-total").text().split("%")["0"]);

  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this imaginary file!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      console.log(orederId);
      $.ajax({
        method: "POST",
        url: "phpUserFuntions/removefromcart.php",
        dataType: "json",
        data: {
          orderid: orederId,
          count: productCount,
          productid: productId,
        },
        beforeSend: function () {},
        success: function (response) {
          if (response.status == "sucsess") {
            let newTotalPrice = 0;
            if (couponvalid) {
              newTotalPrice =
                totalPrice - (productPrice - productPrice * (subTotal / 100));
            } else {
              newTotalPrice = totalPrice - productPrice;
            }

            $(".total").text(`$${newTotalPrice}`);
            console.log(response);
            $(removeButton).parent().parent()[0].remove();
            $(".num-of-products").text(
              parseInt($(".num-of-products").text()) - 1
            );

            swal("Poof! Your product has been deleted!", {
              icon: "success",
            }).then(() => {
              alertify.notify(response.message, "success", 2, function () {});
            });
          } else {
            swal("Some thing Went wrong ,please try again", {
              icon: "error",
            }).then(() => {
              alertify.notify(response.message, "error", 2, function () {});
            });
          }
        },
      });
    } else {
      swal("Your product is safe!", {
        icon: "error",
      }).then(() => {
        alertify.notify("Your product still exist", "error", 2, function () {});
      });
    }
  });
});
