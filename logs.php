<?php
error_reporting(0);
function saveLogs($users_id,$food_type){

  $con = mysqli_connect("localhost","root","","refrigerator");
  $con->set_charset("utf8");

  $res = mysqli_query($con,"select * from logs where users_id = '".$users_id."' and food_type='".$food_type."' ");
  
  while($row = mysqli_fetch_array($res)) {
    $data['id'] = $row['id'];
    $data['counters'] = $row['counters'];
  }
  if (!empty($data)) {
    $bal = $data['counters'] + 1;
    mysqli_query($con,"UPDATE logs SET counters='".$bal."' WHERE id = '".$data['id']."'");
  }else{
    mysqli_query($con,"INSERT INTO logs (users_id, food_type, counters) VALUES('".$users_id."','".$food_type."','1')");
  }
  mysqli_close($con);
}

?>

