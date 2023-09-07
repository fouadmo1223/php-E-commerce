<a class="btn btn-warning mb-20 mt-30" href="?action=addbrand">Add Brand</a>

<table class="table table-bordered table-hover table-responsive ">
					<thead  class="table-dark">
						<tr>
							<th scope="col">Id</th>
							<th scope="col">Name</th>
							
							

						</tr>
					</thead>
					<tbody>
						<?php
							include ("PhpFunctions/connection.php");
							$selection = "SELECT * FROM brand";
							$product = $connection -> query($selection);
							foreach ($product as $product){

						?>
						<tr>
						<th scope="row"> <?= $product['id'] ?></th>
						<td><?= $product['name'] ?></td>
						
						</tr>
					<?php
						}
					?>
					</tbody>
				</table>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		