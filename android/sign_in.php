<?php
require_once("connect.php");
?>
<?php
$email = $_POST["EMAIL"];
$password = $_POST["PASSWORD"];
if (mysqli_connect_error($con)) {
  echo "Fail to Connect to Database".mysqli_connect_error();

}

$query = mysqli_query($con,"SELECT id, username, password, email FROM users WHERE email = '".$email."' AND password = '".$password."' ");
$objResult = mysqli_fetch_array($query);
$intNumRows = mysqli_num_rows($query);

if($intNumRows == 0){
	$arr['loggedIn'] = "0";
	$arr['id'] = "";
	$arr['username'] = "";
	$arr['password'] = "";
	$arr['email'] = "";
}else{
	$arr['loggedIn'] = "1";
	$arr['id'] = $objResult["id"];
	$arr['username'] = $objResult["username"];
	$arr['password'] = $objResult["password"];
	$arr['email'] = $objResult["email"];
}
echo json_encode($arr);
mysqli_close($con);
?>