<?php
$arr = [];
 include "../admin/PhpFunctions/connection.php";
    $minPrice = $_POST['minprice'];
    $maxPrice = $_POST['maxprice'];
    if(isset($_POST['catid'])){
        $catId = $_POST['catid'];
        $selection = "SELECT * FROM  products WHERE price >= $minPrice AND price <= $maxPrice And category =$catId "; 
    }else{
        $selection = "SELECT * FROM  products WHERE price >= $minPrice AND price <= $maxPrice "; 
    }
    $selectProducts = $connection -> query($selection);
   
   foreach ($selectProducts as $product) {
    $userId = $_POST['userid'];
    $selectFav = $connection->query("SELECT * FROM favorites WHERE user_id = $userId && product_id = {$product['id']}");
    
    if ($selectFav->num_rows > 0) {
        $product['fav'] = true;
    } else {
        $product['fav'] = false;
    }

    $arr[] = $product; // Add the modified product to the array
}
    

    if(count($arr) > 0){
    echo json_encode($arr);
    }else{
        $arr =["message" => "failed"]; 
        echo json_encode($arr);
    }
?>