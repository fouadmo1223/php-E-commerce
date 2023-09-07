(async () =>{


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

})();