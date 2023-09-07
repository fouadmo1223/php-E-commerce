
<?php
	$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$uri = $_SERVER['REQUEST_URI'];

$currentURL = $protocol . "://" . $host . $uri;


if(strpos($currentURL, "index")){
	$page= "index";
}elseif(strpos($currentURL, "products")){
	$page = "products";
}
elseif (strpos($currentURL, "users")){
	$page = "users";
}
elseif (strpos($currentURL, "categories")){
	$page = "categories";
}
elseif (strpos($currentURL, "orders")){
	$page = "orders";
}
?>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?= strtolower($_SESSION['login']) ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="<?php
				if($page == "index"){
					echo "active";
				}
			?>"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="<?php
				if($page == "products"){
					echo "active";
				}
			?>"><a href="products.php"><em class="fa fa-calendar">&nbsp;</em> Products</a></li>

			<li class="<?php
				if($page == "orders"){
					echo "active";
				}
			?>"><a href="orders.php"><em class="fa fa-folder">&nbsp;</em> Orders</a></li>

				<li class="<?php
				if($page == "categories"){
					echo "active";
				}
			?>"><a href="categories.php"><em class="fa fa-cart-plus">&nbsp;</em> Categories and Brands</a></li>

				<li class="<?php
				if($page == "users"){
					echo "active";
				}
			?>"><a href="users.php"><em class="fa fa-user">&nbsp;</em> Users</a></li>
			<li><a href="PhpFunctions/logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->