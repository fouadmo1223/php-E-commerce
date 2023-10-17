<?php
    $id = $_GET['id'];
    $selectproduct = $connection -> query("SELECT * FROM products WHERE id = $id");
    $product = $selectproduct -> fetch_assoc();

?>

<h2 class=" hvr-float-shadow txt-c" style="display: block; width:fit-content"><?=$product['name']?>'s  Imgaes</h2>


<div class="col-md-6 col-lg-3  col-12">
    <div class="d-flex p-20" style="flex-direction:column">
      <div class="mb-20 d-flex">
      
      <div>
        <button class="cssbuttons-io-button" id="image1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg>
        <span>Add Image</span>
        </button>
      </div>
      <span class="image1error c-red fs-13 ml-20 d-none"></span>
      </div>
      <div style="width:200px;height:200px" class="">
        <img src="" class="w-full h-full d-none" data-id ="image1" alt="">
      </div>
      

    </div>
</div>
<div class="col-md-6 col-lg-3  col-12">
    <div class="d-flex p-20" style="flex-direction:column">
      <div class="mb-20 d-flex"> 
      
      <div>
      <button class="cssbuttons-io-button" id="image2">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg>
  <span>Add Image</span>
</button>
      </div>
      <span class="image2error c-red fs-13 ml-20  d-none"></span>
      </div>
      <div style="width:200px;height:200px" class="">
        <img src="" class="w-full h-full d-none" data-id ="image2" alt="">
      </div>

    </div>
</div>
<div class="col-md-6 col-lg-3  col-12">
    <div class="d-flex p-20" style="flex-direction:column">
      <div class="mb-20 d-flex">
      
      <div>
        <button class="cssbuttons-io-button" id="image3">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg>
        <span>Add Image</span>
        </button>
      </div>
      <span class="image3error c-red fs-13 ml-20  d-none"></span>
      </div>
      <div style="width:200px;height:200px" class="">
        <img src="" class="w-full h-full d-none" data-id ="image3" alt="">
      </div>

    </div>
</div>
<div class="col-md-6 col-lg-3  col-12">
    <div class="d-flex p-20" style="flex-direction:column">
      <div class="mb-20 d-flex">
      
      <div>
        <button class="cssbuttons-io-button" id="image4">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg>
        <span>Add Image</span>
        </button>
      </div>
      <span class="image4error c-red fs-13 ml-20  d-none"></span>
      </div>
      <div style="width:200px;height:200px" class="">
        <img src="" class="w-full h-full d-none" data-id ="image4" alt="">
      </div>

    </div>
</div>


<form  class="send-images">
<input type="file" required name="image1" accept="image/*"  data-image-id="image1"class="d-none"  >
<input type="file" required name="image2" accept="image/*" data-image-id="image2"class="d-none"  >
<input type="file" required name="image3" accept="image/*" data-image-id="image3"class="d-none"  >
<input type="file" required name="image4" accept="image/*" data-image-id="image4"class="d-none"  >
<div class="">
<input type="submit" class="bt- btn-primary mt-40 p-10 mb-20 w-fit sendd" value="Send Images"   >
</div>
</form>
<script src="../js/alertify.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
<script>

  
    $(".cssbuttons-io-button").click(function(e){
      let targetId= $(this).attr("id");
      $(`[data-image-id='${targetId}']`).trigger("click");
      console.log(targetId);
    })

    $(".sendd").click(function(e){
        if($("[data-image-id=image1]").val() == "" || $("[data-image-id=image4]").val() == "" || $("[data-image-id=image3]").val() == "" || $("[data-image-id=image2]").val() == ""){
            e.preventDefault();
            swal("All images must have value", "","error")
        }
    })

    $("input[type=file]").change(function (event) {
    let targetImage = $(this).attr("data-image-id");
    let fileInput = event.target;
    let selectedFile = fileInput.files[0];

    if (selectedFile) {
        let reader = new FileReader();
        reader.onload = function (e) {
            let imageDataUrl = e.target.result;
            $(`[data-id='${targetImage}']`).attr("src", imageDataUrl).removeClass("d-none");
        };
        reader.readAsDataURL(selectedFile);
    }
});

let allImages = document.querySelectorAll("[data-id]");
allImages.forEach((image) => {
        if($(image).attr("src").length> 0 && $(image).hasClass("d-none")) {
            $(image).removeClass("d-none");
        }
    });

    $(".send-images").submit(function(e){
        e.preventDefault();
        let formData = new FormData(this);

       (async()=>{
            $.ajax({
                method:"POST",
                url:"PhpFunctions/addImages.php?id=<?= $id ?>",
                data:formData,
                dataType:"json",
                processData: false, // Prevent jQuery from processing the data
                contentType: false,
                success:function(data){
                    console.log(data);

                    if(data.status == "error"){
                        alertify.notify(data.message, "error", 2, function () {
                            if(data.hasOwnProperty("image1")){
                        $(".image1error").text(data.message);
                        $(".image1error").removeClass("d-none");
                    }else{
                        $(".image1error").text("");
                        if(!$(".image1error").hasClass("d-none")){
                        $(".image1error").addClass("d-none");
                    }
                }
                if(data.hasOwnProperty("image2")){
                        $(".image2error").text(data.message);
                        $(".image2error").removeClass("d-none");
                    }else{
                        $(".image2error").text("");
                        if(!$(".image2error").hasClass("d-none")){
                        $(".image2error").addClass("d-none");
                    }
                }
                if(data.hasOwnProperty("image3")){
                        $(".image3error").text(data.message);
                        $(".image3error").removeClass("d-none");
                    }else{
                        $(".image3error").text("");
                        if(!$(".image3error").hasClass("d-none")){
                        $(".image1error").addClass("d-none");
                    }
                }
                if(data.hasOwnProperty("image4")){
                        $(".image4error").text(data.message);
                        $(".image4error").removeClass("d-none");
                    }else{
                        $(".image4error").text("");
                        if(!$(".image4error").hasClass("d-none")){
                        $(".image4error").addClass("d-none");
                    }
                }
                        });
                    }else{
                        swal("Good job!", data.message, "success").then(()=>{
                            window.location.href = "products.php";
                        });
                    }

                 
                }
            })

        })();

    })

</script>