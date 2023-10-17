$(".add-price").click(function () {
  let addButton = $(this);
  $(this).addClass("disabled");
  let userId = $(this).attr("data-user-id");
  let productId = $(this).attr("data-pro-id");

  $.ajax({
    method: "POST",
    url: "phpUserFuntions/addandminus1.php",
    dataType: "json",
    data: {
      add: true,
      userid: userId,
      productid: productId,
    },
    success: function (data) {
      console.log(data);
      $(this).removeClass("disabled");
      if (data.status == "sucsss") {
        let productTotal = $(addButton)
          .closest("td")
          .next()
          .find(".product-total")
          .text()
          .split("$")[1];
        let productPrice = $(addButton)
          .closest("td")
          .prev()
          .find(".product-price")
          .text()
          .split("$")[1];
        let finalTotal = $(".total").text().split("$")["1"];
        if ($(".sub-total").text() != "0") {
          discount = $(".sub-total").text().split("%")[0];
        } else {
          discount = 0;
        }
        let newProductTotal =
          parseFloat(productTotal) + parseFloat(productPrice);
        if (couponvalid) {
          finalTotal =
            parseFloat(finalTotal) +
            (parseFloat(productPrice) -
              parseFloat(productPrice) * parseFloat(discount / 100));
        } else {
          finalTotal = parseFloat(finalTotal) + parseFloat(productPrice);
        }

        $(addButton)
          .closest("td")
          .next()
          .find(".product-total")
          .text(`$${newProductTotal}`);
        $(".total").text(`$${finalTotal}`);
      } else {
        alertify.notify(data.message, "error", 2, function () {});
      }
    },
  });
});

$(".dec-price").click(function () {
  let decButton = $(this);
  $(this).addClass("disabled");
  let userId = $(this).attr("data-user-id");
  let productId = $(this).attr("data-pro-id");

  $.ajax({
    method: "POST",
    url: "phpUserFuntions/addandminus1.php",
    dataType: "json",
    data: {
      minus: true,
      userid: userId,
      productid: productId,
    },
    success: function (data) {
      $(this).removeClass("disabled");
      console.log(data);
      if (data.status == "sucsss") {
        let productTotal = $(decButton)
          .closest("td")
          .next()
          .find(".product-total")
          .text()
          .split("$")[1];
        let productPrice = $(decButton)
          .closest("td")
          .prev()
          .find(".product-price")
          .text()
          .split("$")[1];
        let finalTotal = $(".total").text().split("$")["1"];
        if ($(".sub-total").text() != "0") {
          discount = $(".sub-total").text().split("%")[0];
        } else {
          discount = 0;
        }
        let newProductTotal = parseFloat(productTotal);
        if (parseFloat(newProductTotal) > 0) {
          newProductTotal = parseFloat(productTotal) - parseFloat(productPrice);
          if (couponvalid) {
            finalTotal =
              parseFloat(finalTotal) -
              (parseFloat(productPrice) -
                parseFloat(productPrice) * parseFloat(discount / 100));
          } else {
            finalTotal = parseFloat(finalTotal) - parseFloat(productPrice);
          }
        }

        $(decButton)
          .closest("td")
          .next()
          .find(".product-total")
          .text(`$${newProductTotal}`);
        $(".total").text(`$${finalTotal}`);
      } else {
        alertify.notify(data.message, "error", 2, function () {});
      }
    },
  });
});
