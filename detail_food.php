<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
require_once("function/logs.php");
?>
<?php 
$currentFood = getCurrentFood($_GET["id"]);
$allFoodMaterial = getAllFoodMaterial($_GET["id"]);
$currentCook = getCurrentCook($_GET["id"]);
$avgRattingStar = getAvgRattingStar($_GET["id"]);
$checkRatingSubmit = getCheckRatingSubmit($_SESSION["id"],$_GET["id"]);
if($_SESSION["id"] != ""){
  saveLogs($_SESSION["id"],$currentFood["food_type"]);
}

if(isset($_POST["submit"])){
  saveRatting($_POST["users_id"],$_POST["menus_id"],$_POST["ratting_score"]);
}
if(isset($_POST["select"])){
  saveLike($_POST["users_id"],$_POST["menus_id"]);
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
          <h2 class="title-section">Menu</h2>
          <div class="divider"></div>
          <form name="register_form" action="" method="post" >
            <input type="hidden" id="users_id" name="users_id" value="<?php echo $_SESSION['id'];?>">
            <input type="hidden" id="menus_id" name="menus_id" value="<?php echo $currentFood['id'];?>">
            <input type="hidden" id="ratting_score" name="ratting_score">
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">Food Name : <?php echo $currentFood["menu_name"];?></label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">Food Category : <?php echo $currentFood["food_category"];?></label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">Food Type : <?php echo $currentFood["food_type"];?></label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">This Menu : <?php echo round($avgRattingStar["numAvg"]);?> ดาว</label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <?php $star = round($avgRattingStar["numAvg"]);?>
                <?php if($star == 1){ ?>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                <?php }else if($star == 2){ ?>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                <?php }else if($star == 3){ ?>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                <?php }else if($star == 4){ ?>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                <?php }else if($star == 5){ ?>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                <?php }else{ ?>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                <?php } ?>
              </div>
            </div>
            <?php if($_SESSION["id"] != ""){ ?>
              <?php if($checkRatingSubmit["numCount"] == 0){ ?>
                <div class="row form-group">
                  <div class="col-md-12 mb-3 mb-md-0">
                    <h2>Rate this Menu</h2>
                    <div class="star-wrapper">
                      <i class="fa-regular fa-star"></i>
                      <i class="fa-regular fa-star"></i>
                      <i class="fa-regular fa-star"></i>
                      <i class="fa-regular fa-star"></i>
                      <i class="fa-regular fa-star"></i>
                    </div>
                  </div>
                </div>


                <div class="row form-group mt-4">
                  <div class="col-md-12">
                    <input type="submit" name="submit" value="Vote" class="btn btn-primary">
                  </div>
                </div>
              <?php } ?>
            <?php } ?>


          </form>
        </div>


        <div class="col-lg-6 py-3">
          <div class="img-fluid py-3 text-center">
            <img src="food/<?php echo $currentFood["menu_image"];?>" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="page-section">
    <div class="container">
      <div class="row align-items-center">

        <div class="col-lg-12 py-3">
          <form action="" method="post" class="form-search-blog">
            <input type="hidden" id="users_id" name="users_id" value="<?php echo $_SESSION['id'];?>">
            <input type="hidden" id="menus_id" name="menus_id" value="<?php echo $currentFood['id'];?>">
            <h2 class="title-section">วัตถุดิบ</h2>
            <div class="divider"></div>

            <table class="table">
              <tbody>
                <?php if(empty($allFoodMaterial)){ ?>
                  <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
                <?php }else{?>
                  <?php $i=1;?>
                  <?php foreach($allFoodMaterial as $dataMat){ ?>
                    <?php $coolerCheck = getCurrentCheckMaterialInCooler($_SESSION["id"],$dataMat["materials_id"]);?>
                    <tr>
                      <td style="width:5%;"><?php echo $i;?></td>
                      <td><?php echo $dataMat["mat_name"];?></td>
                      <td><?php echo $dataMat["amount"];?> <?php echo $dataMat["units"];?></td>
                    </tr>
                    <?php $i++; ?>
                  <?php } ?>
                <?php } ?>
              </tbody>
            </table>
            <?php if($_SESSION["id"] != ""){ ?>
              <div class="row form-group mt-4" style="text-align:center;">
                <div class="col-md-12">
                  <input type="submit" name="select" value="เลือกเมนูนี้" class="btn btn-info">
                </div>
              </div>
            <?php } ?>
          </form>
        </div>

      </div>
    </div>
  </div>

  <div class="page-section">
    <div class="container">
      <div class="row align-items-center">

        <div class="col-lg-12 py-3">
          <h2 class="title-section">วิธีการทำ</h2>
          <div class="divider"></div>

          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <?php echo $currentCook["cook"];?>
            </div>
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