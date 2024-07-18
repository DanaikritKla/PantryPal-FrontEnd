<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
/*if(isset($_POST["submit"])){
  saveRegister($_POST["firstname"],$_POST["lastname"],$_POST["username"],$_POST["password"]);
}*/
$currentUser = getCurrentUser($_GET["id"]);

if($_GET["id"] == ""){
  $txtHead = "Add user";
  $txtConfirm = "Confirm add user";
}else{
  $txtHead = "Edit user";
  $txtConfirm = "Confirm edit user";
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
          <form action="confirm_user.php" method="post" class="contact-form py-12 px-lg-12" onsubmit="return Validate()">
            <input type="hidden" id="id" name="id" value="<?php echo $currentUser['id'];?>">
            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="text-black" for="fname">Firstname</label>
                <input type="text" id="fname" name="firstname" class="form-control" value="<?php echo $currentUser['firstname'];?>">
              </div>
              <div class="col-md-6">
                <label class="text-black" for="lname">Lastname</label>
                <input type="text" id="lname" name="lastname" class="form-control" value="<?php echo $currentUser['lastname'];?>">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">Username</label>
                <input type="text" id="fname" name="username" class="form-control" value="<?php echo $currentUser['username'];?>">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="text-black" for="fname">Email</label>
                <input type="email" id="fname" name="email" class="form-control" value="<?php echo $currentUser['email'];?>">
              </div>
              <div class="col-md-6">
                <label class="text-black" for="lname">Type</label>
                <select name="role" id="status" class="form-control" required>
                  <option value="">-- Please select --</option>
                  <option value="1" <?php if($currentUser['status']==1){?> selected<?php } ?>>admin</option>
                  <option value="2" <?php if($currentUser['status']==2){?> selected<?php } ?>>user</option>

                </select>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-6">
                <label class="text-black" for="lname">Password</label>
                <input type="password" id="password" name="password" class="form-control" value="<?php echo $currentUser['password'];?>">
              </div>
              <div class="col-md-6">
                <label class="text-black" for="lname">Confirm Password</label>
                <input type="password" id="re_password" name="re_password" class="form-control" value="<?php echo $currentUser['password'];?>">
              </div>
            </div>

            <div class="row form-group mt-4">
              <div class="col-md-12">
                <input type="submit" name="submit" value="Save" class="btn btn-primary" onClick="javascript: return confirm('<?php echo $txtConfirm;?>');">
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

  <script type="text/javascript">
    function Validate() {

      var password = document.getElementById("password").value;
      var confirmPassword = document.getElementById("re_password").value;
      if (password.length <= 4) {
        alert("รหัสผ่านห้ามน้อยกว่า 4 ตัว");
        return false;
      }
      if (password != confirmPassword) {
        alert("รหัสผ่านไม่ตรงกัน");
        return false;
      }
      return true;
    }
  </script>

  <?php
  require_once("footer.php");
  ?>


  
</body>
</html>