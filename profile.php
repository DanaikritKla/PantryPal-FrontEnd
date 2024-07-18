<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
$currentUser = getCurrentUser($_SESSION["id"]);
if(isset($_POST["submit"])){
  editProfile($_POST["id"],$_POST["firstname"],$_POST["lastname"],$_POST["username"],$_POST["password"]);
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
          <h2 class="title-section">Edit Profile</h2>
          <div class="divider"></div>
          <form action="#" method="post" class="contact-form py-12 px-lg-12">
            <input type="hidden" id="id" name="id" value="<?php echo $currentUser['id'];?>">
            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="text-black" for="fname">ชื่อ</label>
                <input type="text" id="fname" name="firstname" class="form-control" value="<?php echo $currentUser['firstname'];?>">
              </div>
              <div class="col-md-6">
                <label class="text-black" for="lname">นามสกุล</label>
                <input type="text" id="lname" name="lastname" class="form-control" value="<?php echo $currentUser['lastname'];?>">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="text-black" for="fname">Username</label>
                <input type="text" id="fname" name="username" class="form-control" value="<?php echo $currentUser['username'];?>">
              </div>
              <div class="col-md-6">
                <label class="text-black" for="lname">Password</label>
                <input type="password" id="lname" name="password" class="form-control" value="<?php echo $currentUser['password'];?>">
              </div>
            </div>

            <div class="row form-group mt-4">
              <div class="col-md-12">
                <input type="submit" name="submit" value="บันทึก" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-6 py-3">
          <div class="img-fluid py-3 text-center">
            <img src="assets/img/profile.png" alt="">
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