<?php
    // print_r($_POST);
   
        $name=$_POST["name"];
        $price=$_POST["price"];
		$sale=$_POST["sale"];
		$new=$_POST["new"];
        $count=$_POST["count"];
        $brand=$_POST["brand"];
        // $image=$_POST["img"];
        $category=$_POST["category"];
        $discribtion=$_POST["discribtion"];
        $views = 0;
    

        

    // print_r($_FILES);


    $temp= $_FILES['img']['tmp_name'];
    $imgName = $_FILES['img']['name'];

    if ($_FILES['img']['error'] == 0) {

	// extension

	$extensions = ['jpg' , 'png' , 'gif','jpeg',"webp","avif"];
	$ext = explode('.', $imgName);
	$ext = end($ext);

	if (in_array($ext, $extensions)) {

		// size 

		if ($_FILES['img']['size'] < 2000000) {

			// unique name
			$newName = md5(uniqid()) . "." . $ext;
			
			move_uploaded_file($temp, "../images/$newName");

		} else {

			echo "file size is too big";
			exit();
		}

	} else {

		echo "<h2 class ='txt-c'>wrong extension</h2>";
		exit();
	}



}else {

	echo "you must upload an image";
	die();

}

    include("connection.php");
    $name = mysqli_real_escape_string($connection, $name);
$price = mysqli_real_escape_string($connection, $price);
$sale = mysqli_real_escape_string($connection, $sale);
$new = mysqli_real_escape_string($connection, $new);
$discribtion = mysqli_real_escape_string($connection, $discribtion);
$count = mysqli_real_escape_string($connection, $count);
$brand = mysqli_real_escape_string($connection, $brand);
$category = mysqli_real_escape_string($connection, $category);
$views = mysqli_real_escape_string($connection, $views);
$newName = mysqli_real_escape_string($connection, $newName);

    $insert = "INSERT INTO products (name, price,describtion,count,brand,category,views,image,sale,new) VALUES ('$name', '$price', '$discribtion','$count','$brand', '$category','$views','$newName','$sale','$new')";
    $connection ->query($insert);
    header("location:../products.php");

?>