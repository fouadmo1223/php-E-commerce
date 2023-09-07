
<a class="btn btn-primary mb-20" href="?action=adduser">Add Admin</a>

<table class="table table-bordered table-hover table-responsive ">
					<thead  class="table-dark">
						<tr>
							<th scope="col">Id</th>
							<th scope="col">Name</th>
							<th scope="col">E-mail</th>
							<th scope="col">Permission</th>
							<th scope="col">Opreations</th>

						</tr>
					</thead>
					<tbody>
						<?php
							include ("PhpFunctions/connection.php");
							$selection = "SELECT * FROM users";
							$users = $connection -> query($selection);
							foreach ($users as $user){

						?>
						<tr>
						<th scope="row"> <?= $user['id'] ?></th>
						<td><?= $user['username'] ?></td>
						<td><?= $user['email'] ?></td>
						<td><?php
                            $user_per = $user['permission'];
                            $quuery = $connection -> query("SELECT * FROM permissions WHERE id = $user_per");
                            $per = $quuery -> fetch_assoc();
                            echo $per['name'];
                        ?>  </td>
						<td>
							<div class="d-felx ">
								<a class="btn btn-primary " href="?action=edituser&id=<?= $user['id']?>">Edit</a> <button id="<?= $user['id']?>" class="btn btn-warning ml-10 hvr-hang deleteuser">Delete</button> 

								<?php
									if($user['permission'] != "4"){
								?>
								<button id="<?= $user['id']?>" data-username="<?= $user['username']?>" class="btn btn-danger ml-10 hvr-buzz blockuser">Block</button>
								<?php
									}else{
								?>
									<a  href="PhpFunctions/removeblock.php?id=<?= $user['id']?>" id="<?= $user['id']?>" data-username="<?= $user['username']?>" class="btn btn-success ml-10 hvr-back-pulse">Remove Block</a>
								<?php
									}
								?>
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
				let alldeleteButton =document.querySelectorAll(".deleteuser");
			alldeleteButton.forEach(function(deleteuser) { 
				deleteuser.onclick=function(){
					let elemId = this.getAttribute("id");
					
					swal({
						title: "Are you sure ?",
						text: "Once deleted, you will not be able to recover this imaginary file!",
						icon: "warning",
						buttons: true,
						dangerMode: true,
						})
						.then((willDelete) => {
						if (willDelete) {
							swal("User is deleted successfully ", {
							icon: "success",
							}).then(()=>{
						
							window.location.href ="PhpFunctions/deletuser.php?id=" + elemId;
						
					});
						} else {
							swal({
						text: "deleting user is Cancelled",
							icon: "error",
						
						})
						}
					});
				}
			})

			let allblockButton =document.querySelectorAll(".blockuser");
			allblockButton.forEach(function(blockeuser) { 
				blockeuser.onclick=function(){
					let elemId = this.getAttribute("id");
					let username = this.getAttribute("data-username");
					swal({
						title: `Are you sure you want to block @${username}?`,
						icon: "warning",
						buttons: true,
						dangerMode: true,
						})
						.then((willDelete) => {
						if (willDelete) {
							swal(username + " is Blocked successfully ", {
							icon: "success",
							}).then(()=>{
						
							window.location.href ="PhpFunctions/blockuser.php?id=" + elemId;
						
					});
						} else {
							swal({
						text: `Blocking ${username} is Cancelled`,
							icon: "error",
						
						})
						}
					});
				}
			})
			</script>