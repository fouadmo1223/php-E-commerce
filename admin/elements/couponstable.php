
<form class="coupon">
<div class="mb-30 d-felx">
<button class="btn btn-primary p-10 hvr-hang mr-20 add-coupon">Add Coupon</button>
<!-- disabled readonly  -->
<div class="input-container">
  <input placeholder="Enter Discount value"  required min="0" max="100" class="input-field p-10 " id="value" type="number">
  <label for="input-field" class="input-label">Discount value</label>
  <span class="input-highlight"></span>
</div>
<div class="dot-spinner d-none">
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
</div>
</div>
</form>
<table class="table table-bordered table-hover table-responsive table-bordered coupon-table">

					<thead  class="thead-dark">
						<tr>
							<th scope="col" style="text-align: center;" >Id</th>
							<th scope="col" style="text-align: center;" >String</th>
							<th scope="col" style="text-align: center;" >Discount</th>
							<th scope="col" style="text-align: center;" >Opreations</th>

						</tr>
					</thead>
					<tbody>
						<?php
							include ("PhpFunctions/connection.php");
							$selection = "SELECT * FROM coupon";
							$coupons = $connection -> query($selection);
							foreach ($coupons as $coupon){

						?>
						<tr>
						<th scope="row" style="text-align: center;"> <?= $coupon['id'] ?></th>
						<td style="text-align: center;"><?= $coupon['string'] ?></td>
                        
                        <td style="text-align: center;"><?php 
                        $value = "{$coupon['value']} %";
                        echo $value;
                        ?>  </td>
						
						<td style="text-align: center;">
							<div class="d-felx ">
							 <button id="<?= $coupon['id']?>"  class="btn btn-danger ml-10 hvr-hang deletecoupon">Delete</button> 

							</div>
						</td>
						</tr>
					<?php
						}
					?>
					</tbody>
				</table>
				<script src="../js/alertify.min.js"></script>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="js/jquery-1.11.1.min.js"></script>
			<script>

                $(".coupon").submit(function(e){
                    e.preventDefault();
                    $.ajax({
							method: "POST",
							url: "PhpFunctions/generatecoupon.php",
							dataType: "json",
							data: {
								value: $("#value").val(),
								
							},
							headers: {},
							beforeSend:function(){
								$(".add-coupon").addClass("disabled");
								$(".dot-spinner").removeClass("d-none");
								$("#value").attr("readonly","");

							},
							success: function (response) {
								$("#value").val("");
								$("#value").blur();
								$(".add-coupon").blur();
								$(".add-coupon").removeClass("disabled");
								$(".dot-spinner").addClass("d-none");
								$("#value").removeAttr("readonly");
								// Handle the JSON response
								console.log(response);
                                if(response.status == "error"){
									swal(response.message, {
									icon: "error",
								}).then(()=>{
									
									alertify.notify(response.message, 'error', 1, function(){ });
								});
                                }else{
                                    swal(response.message, {
									icon: "success",
								}).then(()=>{
									$(".coupon-table tbody").append(`<tr>
                                    <td scope="col" style="text-align: center;" >${response.id}</td>
							<td scope="col" style="text-align: center;" >${response.string}</td>
							<td scope="col" style="text-align: center;" >${response.value}%</td>
							<td scope="col" style="text-align: center;" ><div class="d-felx ">
							 <button id=${response.id}  class="btn btn-danger ml-10 hvr-hang deletecoupon">Delete</button> 
							</div></td>
                            </tr>
                            `)
									alertify.notify(response.message, 'success', 1, function(){ });
								});
                                }
							
							}
						});

                })


                //////////////       not deleting th copoun ///// //////////////

				let alldeleteButton =document.querySelectorAll(".deletecoupon");
			alldeleteButton.forEach(function(deletecoupon) { 
				deletecoupon.onclick=function(){
					let elemId = this.getAttribute("id");
					let deleteButton = $(this);
					
					swal({
						title: "Are you sure ?",
						text: "Once deleted, you will not be able to recover this coupon",
						icon: "warning",
						buttons: true,
						dangerMode: true,
						})
						.then((willDelete) => {
						if (willDelete) {

					  $.ajax({
							method: "POST",
							url: "PhpFunctions/deletecoupon.php",
							dataType: "json",
							data: {
								id: elemId,	
							},
							headers: {},
							success: function (response) {	
								if(response.status == "sucsess"){
									$(deleteButton).parent().parent().parent().remove();;
									swal(response.message, {
									icon: "success",
								}).then(()=>{
									
									alertify.notify(response.message, 'success', 1, function(){ });
								});
								}else{
									swal(response.message, {
									icon: "error",
								}).then(()=>{
									
									alertify.notify(response.message, 'error', 1, function(){ });
								});
								}
							
							}
						});
					
						} else {
							swal({
						text: "deleting coupon is Cancelled",
							icon: "error",
						
						}).then(()=>{
									
									alertify.notify(` Coupon is kept`, 'success', 1, function(){ });
								});
						}
					});
				}
			})

			
			</script>