<?php
require_once("connect.php");
?>
<?php
$USERNAME = $_POST["USERNAME"];
$PASSWORD = $_POST["PASSWORD"];
$EMAIL = $_POST["EMAIL"];

$sql = "INSERT INTO users (username, password, email) VALUES('".$USERNAME."','".$PASSWORD."','".$EMAIL."')";
$query = mysqli_query($con,$sql);
$objResult = mysqli_fetch_array($query);
$intNumRows = $con->affected_rows;

if($intNumRows == 0){
	$arr = array('success' => 0);
}else{
	$arr = array('success' => 1);
}
echo json_encode($arr);
//$intNumRows = mysqli_num_rows($query);
//$intNumRows = $con->affected_rows;
//if($intNumRows == 0){
	//$arr = array('register' => array('success' => 0));
	//$arr = array('success' => 0);
 	//print(json_encode($arr));
//}else{
	//$arr = array('success' => 1);
	//$arr = array('register' => array('success' => 1));
 	//print(json_encode($arr));
//}
echo json_encode($arr);
mysqli_close($con);
?>