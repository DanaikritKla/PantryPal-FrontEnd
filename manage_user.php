<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
$allUser = getAllUser();
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
        <div class="col-lg-12 py-12">
          <h2 class="title-section" style="text-align: center;">Manage user</h2>
          <table class="table">
            <thead>
              <tr>
                <td>Username</td>
                <td>Email</td>
              </tr>
            </thead>
            <tbody>
              <?php if(empty($allUser)){ ?>
                <?php echo "<h3>data not found</h3>";?>
              <?php }else{?>
                <?php $i=1;?>
                <?php foreach($allUser as $data){ ?>
                  <tr>
                    <td><?php echo $data["username"];?></td>
                    <td><?php echo $data["email"];?></td>
                    
                  </tr>
                  <?php $i++; ?>
                <?php } ?>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <?php
  require_once("footer.php");
  ?>


  
</body>
</html>