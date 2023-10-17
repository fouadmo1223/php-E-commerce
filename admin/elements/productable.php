
<a class="btn btn-primary mb-20" href="?action=addproduct">Add Product</a>

<table class="table table-bordered table-hover table-responsive ">
					<thead  class="table-dark">
						<tr>
							<th scope="col">Id</th>
							<th scope="col">Name</th>
							<th scope="col">Price</th>
							<th scope="col">Sale</th>
							<th scope="col">Main Image</th>
							<th scope="col">Count</th>
							<th scope="col">Opreations</th>

						</tr>
					</thead>
					<tbody>
						<?php
							include ("PhpFunctions/connection.php");
							$selection = "SELECT * FROM products";
							$product = $connection -> query($selection);
							foreach ($product as $product){

						?>
						<tr>
						<th scope="row"> <?= $product['id'] ?></th>
						<td><?= $product['name'] ?></td>
						<td>$<?= $product['price'] ?></td>
						<td>$<?= $product['sale'] ?></td>
						<td><img src="images/<?= $product['image'] ?>" style="width: 50px; height:50px" alt=""></td>
						<td><?= $product['count'] ?></td>
						<td>
							<div class="d-felx ">
								<a class="btn btn-primary mr-10" href="?action=editproduct&id=<?= $product['id']?>">Edit</a> <a class="btn btn-warning" href="?action=images&id=<?= $product['id']?>">Images</a> <button id="<?= $product['id']?>" class="btn btn-danger ml-10 hvr-buzz deleteproduct">Delete</button>
							</div>
						</td>
						</tr>
					<?php
						}
					?>
					</tbody>
				</table>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script>
				let alldeletButton =document.querySelectorAll(".deleteproduct");
			alldeletButton.forEach(function(deleteproduct) { 
				deleteproduct.onclick=function(){
					let elemId = this.getAttribute("id");
					swal({
						title: "Are you sure?",
						text: "Once deleted, you will not be able to recover this imaginary file!",
						icon: "warning",
						buttons: true,
						dangerMode: true,
						})
						.then((willDelete) => {
						if (willDelete) {
							swal("Product is deleted successfully ", {
							icon: "success",
							}).then(()=>{
						
							window.location.href ="PhpFunctions/deletProduct.php?id=" + elemId;
						
					});
						} else {
							swal({
						text: "deleting Product is Cancelled",
							icon: "error",
						
						})
						}
					});
				}
			})
			</script>