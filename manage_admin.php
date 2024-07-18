<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
$allAdmin = getAllAdmin();
if (isset($_GET['delete'])) {
  deleteAdmin($_GET['delete']);
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
        <div class="col-lg-12 py-12">
          <h2 class="title-section" style="text-align: center;">Manage admin</h2>
          <a href="edit_admin.php" class="btn btn-success" style="float:right;"> Add admin</a><br/><br/>
          <table class="table">
            <thead>
              <tr>
                <td>Username</td>
                <td>First-Lastname</td>
                <td>Email</td>
                <td></td>
              </tr>
            </thead>
            <tbody>
              <?php if(empty($allAdmin)){ ?>
                <?php echo "<h3>data not found</h3>";?>
              <?php }else{?>
                <?php $i=1;?>
                <?php foreach($allAdmin as $data){ ?>
                  <tr>
                    <td><?php echo $data["username"];?></td>
                    <td><?php echo $data["firstname"];?> <?php echo $data["lastname"];?></td>
                    <td><?php echo $data["email"];?></td>
                    <td style="text-align:right;">
                      <a href="edit_admin.php?id=<?php echo $data['id'];?>" class="btn btn-warning">Edit</a>
                      <a href="?delete=<?php echo $data['id'];?>" class="btn btn-danger" onClick="javascript: return confirm('Confirm delete');">Delete</a>
                    </td>
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