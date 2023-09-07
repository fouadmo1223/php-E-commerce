<?php
  include "PhpFunctions/connection.php";
  
?>
<form method="post" action="PhpFunctions/insertcat.php" >

  <div class="form-group">
    <label for="name">Category Name</label>
    <input required type="text" name="catname"  class="form-control" id="name">
  </div>

 
 


  <button type="submit" class="btn btn-primary mb-20 hvr-hang">Add</button>
</form>
