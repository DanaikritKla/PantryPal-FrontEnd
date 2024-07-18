<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
if(isset($_POST["forget"])){
  checkPassword($_POST["email"]);
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
          <h2 class="title-section">Forget Password</h2>
          <div class="divider"></div>
          <form name="register_form" action="" method="post" >
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">Email</label>
                <input type="text" id="fname" name="email" class="form-control">
              </div>
            </div>

            <div class="row form-group mt-4">
              <div class="col-md-12">
                <input type="submit" name="forget" value="Send request" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-6 py-3">
          <div class="img-fluid py-3 text-center">
            <img src="assets/img/login.png" alt="">
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