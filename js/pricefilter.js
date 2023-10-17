$(".price-filter").click(function () {
  maxPrice = document
    .querySelectorAll(".noUi-tooltip")[1]
    .innerHTML.split("$")[1];
  minPrice = document
    .querySelectorAll(".noUi-tooltip")[0]
    .innerHTML.split("$")[1];
  let catId = window.location.href.split("=")[1];

  obj = {
    minprice: minPrice,
    maxprice: maxPrice,
    catid: catId,
    userid: userId,
  };
  if (catId == "undefined") {
    delete obj.catid;
  }
  if (userId == "undefined") {
    delete obj.userid;
  }

  $.ajax({
    method: "POST",
    url: "phpUserFuntions/filterprice.php",
    data: obj,
    dataType: "json",
    beforeSend: function () {
      $(".pagination").addClass("d-none");
      $(".product-container").html(`
      <div class ="col-lg-12 d-flex justify-content-center align-center mt-80">
      <div class="loader">
        <div class="loader-square"></div>
        <div class="loader-square"></div>
        <div class="loader-square"></div>
        <div class="loader-square"></div>
        <div class="loader-square"></div>
        <div class="loader-square"></div>
        <div class="loader-square"></div>
        </div>
        </div>`);
    },
    success: function (data) {
      console.log(data);
      $(".product-container").html(``);
      getProdcts(data);
    },
  });
});
