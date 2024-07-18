<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
if($_SESSION["id"] != ""){
  $allFoodInCooler = getAllFoodInCooler($_SESSION["id"]);
}else{
  $allFoodInCooler = getAllFoodInCoolerGuest();
}

if(isset($_POST["search"])){
  $allFoodInCooler = getSearchFoodInCooler($_POST["categories"],$_POST["search_text"]);
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

      <form action="" method="post" class="form-search-blog">
        <div class="row">
          <div class="col-sm-10">

            <div class="input-group">
              <div class="input-group-prepend">
                <select id="categories" name="categories" class="custom-select bg-light">
                  <option value="">All Categories</option>
                  <option value="อาหารคาว">อาหารคาว</option>
                  <option value="อาหารหวาน">อาหารหวาน</option>
                  <option value="อาหารชุด">อาหารชุด</option>
                  <option value="อาหารจานเดียว">อาหารจานเดียว</option>
                </select>
              </div>
              <input type="text" class="form-control" name="search_text" placeholder="Enter keyword..">
            </div>

          </div>
          <div class="col-sm-2 text-sm-right">
            <button class="btn btn-secondary" name="search" type="submit">ค้นหา</button>
          </div>
        </div>
      </form>
      

      <div class="row my-5">

        <?php if(empty($allFoodInCooler)){ ?>
          <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
        <?php }else{?>
          <?php $i=1;?>
          <?php foreach($allFoodInCooler as $data){ ?>
            <div class="col-lg-4 py-3">
              <div class="card-blog">
                <a href="detail_food.php?id=<?php echo $data["id"];?>">
                  <img src="food/<?php echo $data["menu_image"];?>" alt="" style="width:280px;height:280px;">
                </a>
                <div class="body">
                  <h5 class="post-title"><a href="detail_food.php?id=<?php echo $data["id"];?>"><?php echo $data["menu_name"];?></a></h5>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php } ?>

      </div>

      <!--<nav aria-label="Page Navigation">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>-->

    </div>
  </div>

  <?php
  require_once("footer.php");
  ?>


  
</body>
</html>