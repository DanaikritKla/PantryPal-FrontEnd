<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 

$currentAdmin = getCurrentAdmin($_GET["id"]);

if(isset($_POST["submit"])){
  if($_POST["id"] == ""){
    saveAdmin($_POST["firstname"],$_POST["lastname"],$_POST["username"],$_POST["password"],$_POST["email"]);
  }else{
    editAdmin($_POST["id"],$_POST["firstname"],$_POST["lastname"],$_POST["username"],$_POST["password"],$_POST["email"]);
  }
  
}

if($_GET["id"] == ""){
  $txtHead = "Add admin";
}else{
  $txtHead = "Edit admin";
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
          <form action="" method="post" class="contact-form py-12 px-lg-12">
            <input type="hidden" id="id" name="id" value="<?php echo $currentAdmin['id'];?>">
            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="text-black" for="fname">Firstname</label>
                <input type="text" id="fname" name="firstname" class="form-control" value="<?php echo $currentAdmin['firstname'];?>">
              </div>
              <div class="col-md-6">
                <label class="text-black" for="lname">Lastname</label>
                <input type="text" id="lname" name="lastname" class="form-control" value="<?php echo $currentAdmin['lastname'];?>">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="text-black" for="fname">Username</label>
                <input type="text" id="fname" name="username" class="form-control" value="<?php echo $currentAdmin['username'];?>">
              </div>
              <div class="col-md-6">
                <label class="text-black" for="lname">Password</label>
                <input type="password" id="password" name="password" class="form-control" value="<?php echo $currentAdmin['password'];?>">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">Email</label>
                <input type="email" id="fname" name="email" class="form-control" value="<?php echo $currentAdmin['email'];?>">
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
            <img src="assets/img/register.png" alt="">
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