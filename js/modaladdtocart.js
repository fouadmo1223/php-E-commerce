  $(".modaladdtocart").click(function () {
         let userId = $(this).attr("data-user-id");
         let productId = $(this).attr("data-product-id");
         let productName = $(this).attr("data-product-name");
         let productQuantity =$("#modalquantity").val();
         console.log($(this).closest(".pro").find(".quantitymodal").val());
         
       });