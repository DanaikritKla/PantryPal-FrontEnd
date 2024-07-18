<?php

$con = mysqli_connect("localhost","root","","refrigerator");
$con->set_charset("utf8");


//$con->query("SET NAMES utf8");

if($_REQUEST["load"]=="material_data"){

	$materials_id = $_GET["materials_id"];
	
	$result = $con->query("select id, mat_name, mat_unit from materials where id = '{$materials_id}' ");

	$array = array();
	while($row = $result->fetch_object()){
		
		array_push($array, $row);
	}
	echo json_encode($array);
}


?>



