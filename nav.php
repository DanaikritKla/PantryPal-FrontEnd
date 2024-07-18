<?php 
$user = getUser($_SESSION["id"]);
if (isset($_GET['logout'])) {
  logout();
}
?>
  
<div class="container">
    <?php if($_SESSION["id"] != "" && !empty($_SESSION["id"])){ ?>
      <p class="text-right" id="copyright" style="color:black;">You : <a href="view_profile.php"><?php echo $user["firstname"];?> <?php echo $user["lastname"];?></a><br/><a href='?logout=true' class="btn btn-danger" onClick="javascript: return confirm('Confirm logout');" style="color:black;">Logout</a>
      </p>
    <?php }else{ ?>
      <p class="text-right" id="copyright" style="color:black;">You are not logged in</p>
    <?php } ?>

  </div>
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
  

  <div class="container">


    <a href="#" class="navbar-brand">PantryPal</a>

    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarContent">
      <ul class="navbar-nav ml-auto">

        <!--<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>-->
        <?php if($_SESSION["id"] == "" && empty($_SESSION["id"])){ ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Login</a>
          </li>
        <?php }else{ ?>
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="manage_admin.php">Manage admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="manage_user.php">Manage user</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="manage_material.php">Manage ingredients</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="manage_food.php">Manage recipe</a>
            </li>
         
        <?php } ?>
        
        
      </ul>
    </div>

  </div>
</nav>

<div class="container">
  <div class="page-banner">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-md-6">
        <h1 class="text-center" style="color:black;">Pantry Pal</h1>
      </div>
    </div>
  </div>
</div>