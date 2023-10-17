$("#productsSorting").change(function () {
  let catId = window.location.href.split("=")[1];
  let sorting = $(this).val();
  obj = {
    sort: sorting,
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
    url: "phpUserFuntions/sorting.php",
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
