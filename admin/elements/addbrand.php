<?php
  include "PhpFunctions/connection.php";
  
?>
<form method="post" action="PhpFunctions/insertbrand.php" >

  <div class="form-group">
    <label for="name">Brand Name</label>
    <input required type="text" name="brandname"  class="form-control" id="name">
  </div>

 
 


  <button type="submit" class="btn btn-primary mb-20 hvr-hang">Add</button>
</form>
