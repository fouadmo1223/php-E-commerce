<?php
   $arr = [];
 include "../admin/PhpFunctions/connection.php";
    
    if(isset($_POST['catid'])){
       if($_POST['sort'] == 'low'){
        $select = "SELECT * FROM products WHERE category = {$_POST['catid']} ORDER BY price ASC";
       }elseif($_POST['sort'] == 'high'){
        $select = "SELECT * FROM products WHERE category = {$_POST['catid']} ORDER BY price DESC";
       }elseif($_POST['sort'] == 'popularity'){
         
        $select = "SELECT * FROM products  ORDER BY rate DESC";
       }else{
          $select = "SELECT * FROM products  WHERE category = {$_POST['catid']}";
       }
    }else{
         if($_POST['sort'] == 'low'){
        $select = "SELECT * FROM products  ORDER BY price ASC";
       }elseif($_POST['sort'] == 'high'){
        $select = "SELECT * FROM products  ORDER BY price DESC";
       }elseif($_POST['sort'] == 'popularity'){
       
        $select = "SELECT * FROM products  ORDER BY rate DESC";
       }else{
          $select = "SELECT * FROM products";
       }
    }
    $query =$connection -> query($select);

      foreach ($query as $product) {
    if(isset($_POST['userid'])){
        $userId = $_POST['userid'];
    $selectFav = $connection->query("SELECT * FROM favorites WHERE user_id = $userId && product_id = {$product['id']}");
    
    if ($selectFav->num_rows > 0) {
        $product['fav'] = true;
    } else {
        $product['fav'] = false;
    }
    }

    $arr[] = $product; // Add the modified product to the array
}
echo json_encode($arr);
?>