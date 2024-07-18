<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
$allFoodRandom = getAllFoodRandom();
?>

<style>
  .checked {
    color: orange;
  }
</style>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <?php
    require_once("nav.php");
    ?>
  </header>

  <!-- Blog -->
  <div class="page-section">
    <div class="container">
      <div class="text-center wow fadeInUp">
        <h2 class="title-section">เมนูที่แนะนำ</h2>
        <div class="divider mx-auto"></div>
      </div>
      <div class="row mt-5">
        <?php if(empty($allFoodRandom)){ ?>
          <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
        <?php }else{?>
          <?php $i=1;?>
          <?php foreach($allFoodRandom as $dataRan){ ?>
            <?php $avgRattingStar = getAvgRattingStar($dataRan["id"]);?>
            <div class="col-lg-3 py-3">
              <div class="card-blog">
                <a href="detail_food.php?id=<?php echo $dataRan["id"];?>"><img src="food/<?php echo $dataRan["menu_image"];?>" alt="" class="img-fluid"></a>
                <div class="body">
                  <h5 class="post-title"><a href="detail_food.php?id=<?php echo $dataRan["id"];?>"><?php echo $dataRan["menu_name"];?></a></h5>
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
            </div>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </div>


  <!-- Banner info -->
  <div class="page-section banner-info">
    <div class="wrap bg-image" style="background-image: url(assets/img/bg_pattern.svg);">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 pr-lg-5 wow fadeInUp">
            <h2 class="title-section">เรื่องอาหาร เป็นเรื่องง่ายๆ <br/>My Frigerator</h2>
            <div class="divider"></div>
            <p>ระบบที่ช่วยให้คุณจัดการเรื่องการทำอาหารในแต่มื้อ โดยการคำนวณวัตถุดิบของคุณที่อยู่ภายในบ้าน</p>

          </div>
          <div class="col-lg-6 py-3 wow fadeInRight">
            <div class="img-fluid text-center">
              <img src="assets/img/banner_2.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .wrap -->
  </div> <!-- .page-section -->



  <?php
  require_once("footer.php");
  ?>
  

  
</body>
</html>