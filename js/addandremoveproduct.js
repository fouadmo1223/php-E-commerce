$(".add-price").click(function () {
  console.log("hello");
  let productTotal = $(this)
    .closest("td")
    .next()
    .find(".product-total")
    .text()
    .split("$")[1];
  let productPrice = $(this)
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
  let newProductTotal = parseFloat(productTotal) + parseFloat(productPrice);
  if (couponvalid) {
    finalTotal =
      parseFloat(finalTotal) +
      (parseFloat(productPrice) -
        parseFloat(productPrice) * parseFloat(discount / 100));
  } else {
    finalTotal = parseFloat(finalTotal) + parseFloat(productPrice);
  }

  $(this)
    .closest("td")
    .next()
    .find(".product-total")
    .text(`$${newProductTotal}`);
  $(".total").text(`$${finalTotal}`);
});

$(".dec-price").click(function () {
  let productTotal = $(this)
    .closest("td")
    .next()
    .find(".product-total")
    .text()
    .split("$")[1];
  let productPrice = $(this)
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

  $(this)
    .closest("td")
    .next()
    .find(".product-total")
    .text(`$${newProductTotal}`);
  $(".total").text(`$${finalTotal}`);
});
