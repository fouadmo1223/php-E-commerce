<?php
  include "PhpFunctions/connection.php";




?>
<form method="post" action="PhpFunctions/insertProduct.php"  enctype="multipart/form-data">

  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name"  class="form-control" id="name">
  </div>

  <div class="form-group">
    <label for="price">Price</label>
    <input type="number" name="price"  class="form-control" id="price">
  </div>
  <div class="form-group">
    <label for="price">Sale</label>
    <input type="number" name="sale"  class="form-control" id="sale">
  </div>

   <div class="form-group">
    <label for="price">New</label>
    <input type="number" name="new" max="1" min="0"  class="form-control" id="new">
  </div>

  <div class="form-group">
    <label for="sale">Count</label>
    <input type="number" name="count"  class="form-control" id="sale">
  </div>

   <div class="form-group">
    <label for="exampleFormControlSelect1">categories</label>
    <select name="category" class="form-control" id="exampleFormControlSelect1">

      <?php
        $selectCat= "SELECT * FROM category";
        $queryCat = $connection -> query($selectCat);
        $indecator=1;
        foreach ($queryCat as $cat){
      ?>
      <option <?php
          if($indecator == 1){
            echo "selected";
            $indecator++;
          }
      ?> value="<?= $cat['id'] ?>" ><?= $cat['name'] ?></option>
      <?php } ?>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect2">Brand</label>
    <select name="brand" class="form-control" id="exampleFormControlSelect2">

      <?php
        $selectCat= "SELECT * FROM brand";
        $queryCat = $connection -> query($selectCat);
        $indecator2=1;
        foreach ($queryCat as $cat){
      ?>
      <option <?php
          if($indecator2 ==1){
            echo "selected";
            $indecator2++;
          }
      ?> value="<?= $cat['id'] ?>" ><?= $cat['name'] ?></option>
      <?php } ?>
    </select>
  </div>


  <div class="form-group">
    <label for="img">Images</label>
    <input type="file" name="img"  class="form-control" id="img" accept="image/*">
  </div>
          
  <div class="form-group mb-10">
        <label for="floatingPassword2">describtion</label>
        <textarea  class="form-control"  required name="discribtion"  style="height: 80px;" id="floatingPassword2" placeholder="Product description"></textarea>
        
    </div>

 


  <button type="submit" class="btn btn-primary mb-20 hvr-hang">Add</button>
</form>

