<?php

$con = mysqli_connect("localhost","root","","refrigerator");
$con->set_charset("utf8");
$term = mysqli_real_escape_string($con,$_GET['term']);

$sql = "SELECT * FROM materials WHERE mat_name LIKE '%".$term."%'";

$query = mysqli_query($con, $sql);

$result = [];

while($data = mysqli_fetch_array($query))
{
    $result[] = $data['mat_name'];
}
echo json_encode($result);
?>