<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
$currentMaterial = getCurrentMaterial($_GET["id"]);
if(isset($_POST["submit"])){
  if($_POST["id"] == ""){
    saveMaterial($_POST["mat_name"]);
  }else{
    editMaterial($_POST["id"],$_POST["mat_name"]);
  }
  
}
if($_GET["id"] == ""){
  $txtHead = "Add ingredients";
}else{
  $txtHead = "Edit ingredients";
}
?>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <?php
    require_once("nav.php");
    ?>

  </header>

  <div class="page-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 py-3">
          <h2 class="title-section"><?php echo $txtHead;?></h2>
          <div class="divider"></div>
          <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" value="<?php echo $currentMaterial['id'];?>">
            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="lname">Ingredients name</label>
                <input type="text" id="mat_name" name="mat_name" class="form-control" value="<?php echo $currentMaterial['mat_name'];?>" required>
              </div>
            </div>
            

            <div class="row form-group mt-4">
              <div class="col-md-12">
                <input type="submit" name="submit" value="Save" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-6 py-3">
          <div class="img-fluid py-3 text-center">
            <img src="assets/img/meat.png" id="blah" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  require_once("footer.php");
  ?>


  
</body>
</html>