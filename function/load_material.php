<?php

$connect = new PDO('mysql:host=localhost;dbname=refrigerator', 'root', '');
$connect->exec("set names utf8");
$data = array();

$userId = $_GET['user_id'];

/*$query = "SELECT *,c.id as cid 
FROM coolers c 
LEFT JOIN materials m ON c.materials_id = m.id
WHERE c.users_id = '".$userId."' ORDER BY c.id DESC";*/

$query = "SELECT *,l.id as lid 
FROM likes l 
LEFT JOIN menus m ON l.menus_id = m.id
WHERE l.users_id = '".$userId."' ORDER BY l.id DESC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
   $arrDate = explode("-", $row["date_select"]);
   $arrDate[0] = $arrDate[0] - 543;
   $convert_date_use = $arrDate[0].'-'.$arrDate[1].'-'.$arrDate[2];

 $data[] = array(
  'id'   => $row["lid"],
  'title'   => $row["menu_name"],
  'start'   => $convert_date_use,
  'end'   => $convert_date_use
 );
}

echo json_encode($data);

?>