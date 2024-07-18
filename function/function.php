<?php
error_reporting(0);

//เชื่อต่อ Database
$con = mysqli_connect("localhost","root","","pantry");
$con->set_charset("utf8");

function checkLogin($username,$password){
	$data = array();
	global $con;
	$res = mysqli_query($con,"select * from admins where username = '".$username."' and password='".$password."' ");
	
	while($row = mysqli_fetch_array($res)) {
		$data['id'] = $row['id'];
	}
	if (!empty($data)) {

		session_start();
		$id = $data['id'];
		$_SESSION['id'] = $data['id'];
		echo ("<script language='JavaScript'>alert('Login Successfully');window.location.href='dashboard.php';</script>");
		
		
	}else{
		echo "<script type='text/javascript'>alert('Username or password is incorrect');</script>";
	}
	
	mysqli_close($con);

}

function checkPassword($email){
	$data = array();
	global $con;
	$res = mysqli_query($con,"select * from users where email = '".$email."' ");
	
	while($row = mysqli_fetch_array($res)) {
		$data['id'] = $row['id'];
	}
	if (!empty($data)) {
		$id = $data['id'];
		echo ("<script language='JavaScript'>
			window.location.href='reset_password.php?users_id=$id';
			</script>");
		
		
	}else{
		echo "<script type='text/javascript'>alert('user not found');</script>";
	}
	
	mysqli_close($con);

}

function formatDateFull($date){
	if($date=="0000-00-00"){
		return "";
	}
	if($date=="")
		return $date;
	$raw_date = explode("-", $date);
	return  $raw_date[2] . "/" . $raw_date[1] . "/" . $raw_date[0];
}

function logout(){
	session_start();
	session_unset();
	session_destroy();
	echo ("<script language='JavaScript'>
		window.location.href='index.php';
		</script>");
	exit();
}

function getCheckEmail($email){

	global $con;

	$res = mysqli_query($con,"SELECT count(*) as numEmail FROM users WHERE email = '".$email."'");
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}

function resetPassword($id,$password){

	global $con;

	$sql="UPDATE users SET password='".$password."' WHERE id = '".$id."'";
	mysqli_query($con,$sql);
	
	mysqli_close($con);

	echo ("<script language='JavaScript'>
		alert('Data edited successfully');
		window.location.href='index.php';
		</script>"); 
	
}


function saveAdmin($firstname,$lastname,$username,$password,$email){

	global $con;

	mysqli_query($con,"INSERT INTO admins (username, password, firstname, lastname, email) VALUES('".$username."','".$password."','".$firstname."','".$lastname."','".$email."')");
	mysqli_close($con);

	echo ("<script language='JavaScript'>
		alert('Data saved successfully');
		window.location.href='manage_admin.php';
		</script>"); 
	
}

function editAdmin($id,$firstname,$lastname,$username,$password,$email){

	global $con;

	$sql="UPDATE admins SET username='".$username."',password='".$password."',firstname='".$firstname."',lastname='".$lastname."',email='".$email."' WHERE id = '".$id."'";
	mysqli_query($con,$sql);
	
	mysqli_close($con);

	echo ("<script language='JavaScript'>
		alert('Data edited successfully');
		window.location.href='manage_admin.php';
		</script>"); 
	
}

function editProfile($id,$firstname,$lastname,$username,$password,$email){

	global $con;

	$sql="UPDATE admins SET username='".$username."',password='".$password."',firstname='".$firstname."',lastname='".$lastname."',email='".$email."' WHERE id = '".$id."'";
	mysqli_query($con,$sql);
	
	mysqli_close($con);

	echo ("<script language='JavaScript'>
		alert('Data edited successfully ');
		window.location.href='profile.php';
		</script>"); 
	
}

function deleteAdmin($id){
	global $con;

	mysqli_query($con,"DELETE FROM admins WHERE id='".$id."'");
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('Data deleted successfully');
		window.location.href='manage_admin.php';
		</script>"); 

}

function getAllAdmin(){
	global $con;

	$sql = "SELECT * FROM admins ORDER BY id DESC";
	
	$res = mysqli_query($con,$sql);

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['id'],
			'username' => $row['username'],
			'password' => $row['password'],
			'firstname' => $row['firstname'],
			'lastname' => $row['lastname'],
			'email' => $row['email']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

function getUser($id){

	global $con;

	$res = mysqli_query($con,"SELECT * FROM admins WHERE id = '".$id."'");
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}

function getCurrentAdmin($id){

	global $con;

	$res = mysqli_query($con,"SELECT * FROM admins WHERE id = '".$id."'");
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}

function getAllUser(){
	global $con;

	$sql = "SELECT * FROM users ORDER BY id DESC";
	
	$res = mysqli_query($con,$sql);

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['id'],
			'username' => $row['username'],
			'password' => $row['password'],
			'email' => $row['email']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

function saveMaterial($mat_name){
	
	global $con;

	$sql = "INSERT INTO materials (mat_name) VALUES('".$mat_name."')";
	mysqli_query($con,$sql);

	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('Data added successfully ');
		window.location.href='manage_material.php';
		</script>"); 
	
}

function editMaterial($id,$mat_name){

	global $con;

	$sql="UPDATE materials SET mat_name='".$mat_name."' WHERE id = '".$id."'";
	mysqli_query($con,$sql);
	
	mysqli_close($con);

	echo ("<script language='JavaScript'>
		alert('Data edited successfully ');
		window.location.href='manage_material.php';
		</script>"); 
	
}

function deleteMaterial($id){
	global $con;

	mysqli_query($con,"DELETE FROM materials WHERE id='".$id."'");
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('Data deleted successfully');
		window.location.href='manage_material.php';
		</script>"); 

}

function getAllMaterial(){
	global $con;

	$res = mysqli_query($con,"SELECT * FROM materials ORDER BY id DESC");

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['id'],
			'mat_name' => $row['mat_name']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}


function getCurrentMaterial($id){

	global $con;

	$res = mysqli_query($con,"SELECT * FROM materials WHERE id = '".$id."'");
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}


function saveFood($menu_name,$food_category,$food_type,$menu_image,$materials_id,$amount,$units,$cook){
	global $con;

	if($menu_image != null){
		if(move_uploaded_file($_FILES["menu_image"]["tmp_name"],"food/".$_FILES["menu_image"]["name"]))
		{

			$sql = "INSERT INTO menus (menu_name, food_category, food_type, menu_image) VALUES('".$menu_name."','".$food_category."','".$food_type."','".$_FILES["menu_image"]["name"]."')";
			mysqli_query($con,$sql);

		}
	}else{

		$sql = "INSERT INTO menus (menu_name, food_category, food_type) VALUES('".$menu_name."','".$food_category."','".$food_type."')";
		mysqli_query($con,$sql);

	}

	$last_id = $con->insert_id;
	
	foreach( $materials_id as $key => $mi ) {
		if ($mi != "") {
			$am = $amount[$key];
			$uni = $units[$key];
			$sql_mat = "INSERT INTO menus_material (menus_id, materials_id, amount, units) VALUES ('".$last_id."','".$mi."','".$am."','".$uni."')";
			mysqli_query($con,$sql_mat);
		}
	}

	$sql_cook = "INSERT INTO menus_cook (menus_id, cook) VALUES ('".$last_id."','".$cook."')";
	mysqli_query($con,$sql_cook);

	echo ("<script language='JavaScript'>
		alert('Data saved successfully');
		window.location.href='manage_food.php';
		</script>"); 
	
}

function editFood($id,$menu_name,$food_category,$food_type,$menu_image,$materials_id,$amount,$units,$cook){
	global $con;

	if($menu_image != null){
		if(move_uploaded_file($_FILES["menu_image"]["tmp_name"],"food/".$_FILES["menu_image"]["name"]))
		{
			$sql="UPDATE menus SET menu_name='".$menu_name."',food_category='".$food_category."',food_type='".$food_type."',menu_image='".$_FILES["menu_image"]["name"]."' WHERE id = '".$id."'";
			mysqli_query($con,$sql);
			
		}
	}else{
		$sql="UPDATE menus SET menu_name='".$menu_name."',food_category='".$food_category."',food_type='".$food_type."' WHERE id = '".$id."'";
		mysqli_query($con,$sql);

	}
	
	mysqli_query($con,"DELETE FROM menus_material WHERE menus_id='".$id."'");
	mysqli_query($con,"DELETE FROM menus_cook WHERE menus_id='".$id."'");
	foreach( $materials_id as $key => $mi ) {
		if ($mi != "") {
			$am = $amount[$key];
			$uni = $units[$key];
			$sql_mat = "INSERT INTO menus_material (menus_id, materials_id, amount, units) VALUES ('".$id."','".$mi."','".$am."','".$uni."')";
			mysqli_query($con,$sql_mat);
		}
	}

	$sql_cook = "INSERT INTO menus_cook (menus_id, cook) VALUES ('".$id."','".$cook."')";
	mysqli_query($con,$sql_cook);

	echo ("<script language='JavaScript'>
		alert('Data saved successfully');
		window.location.href='manage_food.php';
		</script>"); 
	
}

function deleteFood($id){
	global $con;

	mysqli_query($con,"DELETE FROM menus WHERE id='".$id."'");
	mysqli_query($con,"DELETE FROM menus_material WHERE menus_id='".$id."'");
	mysqli_query($con,"DELETE FROM menus_cook WHERE menus_id='".$id."'");
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('Data deleted successfully');
		window.location.href='manage_food.php';
		</script>"); 

}

function getAllFood(){
	global $con;

	$sql = "SELECT * FROM menus ORDER BY id DESC";
	
	$res = mysqli_query($con,$sql);

	$data = array();

	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['id'],
			'menu_name' => $row['menu_name'],
			'food_category' => $row['food_category'],
			'food_type' => $row['food_type'],
			'menu_image' => $row['menu_image']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

function getAllFoodMaterial($menus_id){
	global $con;

	$sql = "SELECT *,mm.id as mmid
	FROM menus_material mm
	LEFT JOIN materials m ON mm.materials_id = m.id
	WHERE mm.menus_id = '".$menus_id."'
	ORDER BY mm.id ASC";
	

	$res = mysqli_query($con,$sql);

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['mmid'],
			'menus_id' => $row['menus_id'],
			'materials_id' => $row['materials_id'],
			'amount' => $row['amount'],
			'mat_name' => $row['mat_name'],
			'units' => $row['units']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

function getAllFoodCook($menus_id){
	global $con;

	$sql = "SELECT * FROM menus_cook WHERE menus_id = '".$menus_id."' ORDER BY id ASC";
	
	$res = mysqli_query($con,$sql);

	$data = array();

	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['id'],
			'menus_id' => $row['menus_id'],
			'cook' => $row['cook']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

function getCurrentFood($id){

	global $con;

	$sql = "SELECT * FROM menus WHERE id = '".$id."'";

	$res = mysqli_query($con,$sql);
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}

function getCurrentCook($id){

	global $con;

	$sql = "SELECT * FROM menus_cook WHERE menus_id = '".$id."'";

	$res = mysqli_query($con,$sql);
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}


?>