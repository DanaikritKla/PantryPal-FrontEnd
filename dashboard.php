<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
$allFood = getAllFood();
if (isset($_GET['delete'])) {
  deleteFood($_GET['delete']);
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
          <h2 class="title-section" style="text-align: center;">Menu List</h2>
          <table class="table">
            <thead>
              <tr>
                <td></td>
                <td>Name</td>
                <td></td>
              </tr>
            </thead>
            <tbody>
              <?php if(empty($allFood)){ ?>
              <?php }else{?>
                <?php $i=1;?>
                <?php foreach($allFood as $data){ ?>
                  <tr>
                    <td><img src="food/<?php echo $data["menu_image"];?>" style="width:60px;height:80px;"></td>
                    <td><?php echo $data["menu_name"];?></td>
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