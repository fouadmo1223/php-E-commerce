<?php
  include "PhpFunctions/connection.php";
  
?>
<form method="post" action="PhpFunctions/insertUser.php"  enctype="multipart/form-data">

  <div class="form-group">
    <label for="name">Username</label>
    <input required type="text" name="username"  class="form-control" id="name">
  </div>

  <div class="form-group">
    <label for="price">E-mail</label>
    <input required type="email" name="email"  class="form-control" id="email">
  </div>

  <div class="form-group">
    <label for="sale">Password</label>
    <input required type="text" name="password"  class="form-control" id="password">
  </div>

   <div class="form-group">
    <label for="exampleFormControlSelect1">Gender</label>
    <select name="gender" class="form-control " style="width: 25%;" id="exampleFormControlSelect1">

      <?php
        $selectCat= "SELECT * FROM gender";
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

 


  <button type="submit" class="btn btn-primary mb-20 hvr-hang">Add</button>
</form>
<?php
    if(isset($_SESSION['username_error'])){
      echo $_SESSION['username_error'];
      unset( $_SESSION['username_error']);
    }
?>