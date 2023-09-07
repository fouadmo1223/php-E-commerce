<?php
  include "PhpFunctions/connection.php";
  $id= $_GET['id'];

  $select = "SELECT * FROM users WHERE id = $id";
  $query = $connection -> query($select);
  $user = $query -> fetch_assoc();


?>
<form method="post" action="PhpFunctions/updateUser.php">
  <input type="hidden" name="id" value="<?= $user['id'] ?>">
  <div class="form-group">
    <label for="name">Username</label>
    <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control" id="name">
  </div>

  <div class="form-group">
    <label for="price">E-mail</label>
    <input type="text" name="email" value="<?= $user['email'] ?>" class="form-control" id="price">
  </div>

  <div class="form-group">
    <label for="sale">Password</label>
    <input type="text" name="password" value="<?= $user['password'] ?>" class="form-control" id="sale">
  </div>

   <div class="form-group">
    <label for="exampleFormControlSelect1">Permissions</label>
    <select name="permission" class="form-control" id="exampleFormControlSelect1">

      <?php
      $userPermission = $user['permission'];
        $selectCat= "SELECT * FROM permissions";
        $queryCat = $connection -> query($selectCat);
        foreach ($queryCat as $cat){
      ?>
      <option value="<?= $cat['id'] ?>" <?php
          if($cat['id'] == $userPermission){echo "selected";}
      ?> ><?= $cat['name'] ?></option>
      <?php } ?>
    </select>
  </div>



 


  <button type="submit" class="btn btn-primary mb-20 hvr-hang">Update</button>
</form>