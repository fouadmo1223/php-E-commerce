<?php 
	include("Componnents/Nav.php");
	include("Componnents/Sidebar.php");
?>
	
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row">

			<?php
				$allOrders = $connection -> query("SELECT * FROM orders");
				$numOfOrders = $allOrders ->num_rows;

				$allProducts = $connection -> query("SELECT * FROM products");
				$numOfProducts = $allProducts ->num_rows;

				$allUsers = $connection -> query("SELECT * FROM users");
				$numOfUsers = $allUsers ->num_rows;
			?>

				<div class="col-xs-6 col-md-3 col-lg-3 no-padding part">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
							<div class="large"><?= $numOfOrders ?></div>
							<div class="text-muted">Orders</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding part">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
							<div class="large"><?= $numOfProducts ?></div>
							<div class="text-muted">Products</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding part">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large"><?= $numOfUsers ?></div>
							<div class="text-muted"> Users</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding part">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
							<div class="large">25.2k</div>
							<div class="text-muted">Page Views</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
	</div>	<!--/.main-->
			<div class="row">
			<div class="col-lg-12">
				<h3 class=" fw-bold " style="letter-spacing: -2px;">Last Order</h3>
			</div>
		</div><!--/.row-->

		<?php
			$selectOrder = $connection -> query("SELECT * FROM orders ORDER BY id DESC LIMIT 1");
			$order = $selectOrder -> fetch_assoc();
		?>

		<div class="panel panel-container">
			<div class="row">

				<?php
					$userId = $order['user_id'];
					$selectUser = $connection -> query("SELECT * FROM users WHERE id = $userId");
					$user = $selectUser -> fetch_assoc();
				?>

				<div class="col-xs-6 col-md-4 col-lg-4 no-padding part">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-user color-blue"></em>
							<div class="large"><a class="cur-point" href="users.php?action=edituser&id=<?= $user['id'];?>">
								
								<?= $user['username'];?>
							
							</a></div>
							<div class="text-muted">User Name</div>
						</div>
					</div>
				</div>

				<div class="col-xs-6 col-md-4 col-lg-4 no-padding part">
					<?php
						$productId = $order['product_id'];
						$selectProduct = $connection -> query("SELECT * FROM products WHERE id = $productId ");
						$product = $selectProduct -> fetch_assoc();
					?>

					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-orange"></em>
							<div class="large"><a class="cur-point" href="products.php?action=editproduct&id=<?=$product['id']?>" >
								
								<?= substr($product['name'], 0, 15)?>
							
							</a></div>
							<div class="text-muted" title="<?= $product['name'] ?>">Product</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-4 col-lg-4 no-padding part">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large"><?= $order['quantity'] ?></div>
							<div class="text-muted">Quntity</div>
						</div>
					</div>
				</div>
				
			</div><!--/.row-->
	</div>

		</div>
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<!-- <script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script> -->
	<script>
	
	</script>
		
</body>
</html>