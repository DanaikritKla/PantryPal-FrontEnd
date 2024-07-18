<?php
require_once("connect.php");
?>
<?php
if (mysqli_connect_error($con)) {
  echo "Fail to Connect to Database".mysqli_connect_error();

}

$sql = "SELECT m.id, m.menu_name, m.food_category, m.food_type, m.menu_image, mc.cook  
FROM menus m 
LEFT JOIN menus_cook mc ON m.id = mc.menus_id
ORDER BY m.id DESC";

$query = mysqli_query($con,$sql);
if($query)
{
  while ($row=mysqli_fetch_array($query))
  {
    $frag[] = $row;
  }

  print(json_encode($frag));
}
//echo json_encode($arr);
mysqli_close($con);
?>