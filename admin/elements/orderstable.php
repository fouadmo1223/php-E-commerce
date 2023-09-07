<table class="table table-bordered table-hover table-responsive table-bordered">
					<thead  class="thead-dark">
						<tr>
							<th scope="col" style="text-align: center;" >Id</th>
							<th scope="col" style="text-align: center;" >Product Name</th>
							<th scope="col" style="text-align: center;" >User Name</th>
							<th scope="col" style="text-align: center;" >Quantity</th>
							<th scope="col" style="text-align: center;" >Opreations</th>

						</tr>
					</thead>
					<tbody>
						<?php
							include ("PhpFunctions/connection.php");
							$selection = "SELECT * FROM orders";
							$orders = $connection -> query($selection);
							foreach ($orders as $order){

						?>
						<tr>
						<th scope="row" style="text-align: center;"> <?= $order['id'] ?></th>
						<td style="text-align: center;"><?php
                            $productId = $order['product_id'];
                            $quuery = $connection -> query("SELECT * FROM products WHERE id = $productId");
                            $product = $quuery -> fetch_assoc();
                            echo $product['name'];
                        ?></td>
                        
                        <td style="text-align: center;"><?php
                            $userId = $order['user_id'];
                            $quuery = $connection -> query("SELECT * FROM users WHERE id = $userId");
                            $user = $quuery -> fetch_assoc();
                            echo $user['username'];
                        ?>  </td>

						<td style="text-align: center;"><?= $order['quantity'] ?></td>
						
						<td style="text-align: center;">
							<div class="d-felx ">
							 <button id="<?= $order['id']?>" data-user-name = "<?= $user['username']?>" class="btn btn-danger ml-10 hvr-hang deleteuser">Delete</button> 

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
			<script>
				let alldeleteButton =document.querySelectorAll(".deleteuser");
			alldeleteButton.forEach(function(deleteuser) { 
				deleteuser.onclick=function(){
					let elemId = this.getAttribute("id");
					let userName = this.getAttribute("data-user-name");
					let deleteButton = $(this);
					
					swal({
						title: "Are you sure ?",
						text: "Once deleted, you will not be able to recover this order",
						icon: "warning",
						buttons: true,
						dangerMode: true,
						})
						.then((willDelete) => {
						if (willDelete) {

					  $.ajax({
							method: "POST",
							url: "PhpFunctions/deleteOrder.php",
							dataType: "json",
							data: {
								orderid: elemId,
								username:userName
								
							},
							headers: {},
							success: function (response) {
								// Handle the JSON response
								console.log(response);
								if(response.status == "sucsess"){
									$(deleteButton).parent().parent().parent().remove();
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
						text: "deleting order is Cancelled",
							icon: "error",
						
						}).then(()=>{
									
									alertify.notify(`${userName}'s order is kept`, 'success', 1, function(){ });
								});
						}
					});
				}
			})

			
			</script>