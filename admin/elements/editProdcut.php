<?php
  include "PhpFunctions/connection.php";
  $id= $_GET['id'];

  $select = "SELECT * FROM products WHERE id = $id";
  $query = $connection -> query($select);
  $prod = $query -> fetch_assoc();


?>
<form method="post" class="theform" action="PhpFunctions/updateProduct.php?id=<?= $id?>" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $prod['id'] ?>">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" value="<?= $prod['name'] ?>" class="form-control" id="name">
  </div>

  <div class="form-group">
    <label for="price">Price</label>
    <input type="number" name="price" value="<?= $prod['price'] ?>" class="form-control" id="price">
  </div>
   <div class="form-group">
    <label for="price">Sale</label>
    <input type="number" name="sale" value="<?= $prod['sale'] ?>" class="form-control" id="price">
  </div>
 <div class="form-group">
    <label for="price">New</label>
    <input type="number" min="0" max="1" name="new" value="<?= $prod['new'] ?>" class="form-control" id="new">
  </div>
  <div class="form-group">
    <label for="sale">Count</label>
    <input type="number" name="count" value="<?= $prod['count'] ?>" class="form-control" id="sale">
  </div>

   <div class="form-group">
    <label for="exampleFormControlSelect1">categories</label>
    <select name="category" class="form-control" id="exampleFormControlSelect1">

      <?php
        $selectCat= "SELECT * FROM category";
        $queryCat = $connection -> query($selectCat);
        foreach ($queryCat as $cat){
      ?>
      <option value="<?= $cat['id'] ?>" <?php
          if($prod['category'] == $cat['id']){
            echo "selected";
          }
      ?> ><?= $cat['name'] ?></option>
      <?php } ?>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect2">Brand</label>
    <select name="brand" class="form-control" id="exampleFormControlSelect2">

      <?php
        $selectbrand= "SELECT * FROM brand";
        $querybrand = $connection -> query($selectbrand);
        foreach ($querybrand as $brand){
      ?>
      <option value="<?= $brand['id'] ?>" <?php
          if($prod['brand'] == $brand['id']){
            echo "selected";
          }
      ?>  ><?= $brand['name'] ?></option>
      <?php } ?>
    </select>
  </div>


  <div class="form-group">
    <label for="img">Images</label>
    <input type="file" name="image" value="" class="form-control" id="img">
    <img src="images/<?= $prod['image']?>" alt="" style="width:100px;height:100px">
  </div>
          
  <div class="form-group mb-10">
        <label for="floatingPassword2">describtion</label>
        <textarea  class="form-control"  required name="discribtion"  style="height: 80px;" id="floatingPassword2" placeholder="Product description"><?= $prod['describtion']?></textarea>
        
    </div>

 


  <button type="submit" class="btn btn-primary mb-20 hvr-hang">Update</button>
</form>
<script>

 



  
</script>