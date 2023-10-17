<?php
	include("Componnents/Nav.php");
	include("Componnents/Sidebar.php");
?>
	
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Products</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Products</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<?php
					if(!isset($_GET["action"])){
						include("elements/productable.php");
					}elseif($_GET["action"] == "addproduct"){
						include("elements/addProductForm.php");
					}elseif($_GET["action"] == "editproduct"){
						include("elements/editProdcut.php");
					}elseif($_GET["action"] == "images"){
						include("elements/imagestable.php");
					}
				?>
			</div>
		</div><!--/.row-->

	
	</div>	<!--/.main-->
	  

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
