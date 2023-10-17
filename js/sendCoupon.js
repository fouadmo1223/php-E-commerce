$(".send-coupon").submit(function (e) {
  e.preventDefault();
  $.ajax({
    url: "phpUserFuntions/checkcoupon.php",
    method: "POST",
    dataType: "json",
    data: {
      string: $(".coupon").val(),
    },
    beforeSend: function () {
      $(".coupon-button").addClass("disabled");
      $(".coupon").attr("readonly", "");
    },
    success: function (response) {
      console.log(response);
      if (response.status == "error") {
        swal(response.message, {
          icon: "error",
        }).then(() => {
          $(".coupon-button").removeClass("disabled");
          $(".coupon").removeAttr("readonly");
          alertify.notify(response.message, "error", 2, function () {});
        });
      } else {
        couponvalid = true;
        swal(response.message, {
          icon: "success",
        }).then(() => {
          $(".sub-total").text(`${response.value}%`);
          let subTotal = response.value;
          let total = parseFloat($(".total").text().split("$")[1]);
          if (couponvalid) {
            let newTotal = total - total * (subTotal / 100);
          } else {
            newTotal = total;
          }
          $(".total").text(`$${newTotal}`);
          alertify.notify(response.message, "success", 2, function () {});
        });
      }
    },
  });
});
