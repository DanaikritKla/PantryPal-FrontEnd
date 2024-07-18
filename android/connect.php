<?php
$host ='127.0.0.1';
$username ='root';
$pwd ='';
$db ='pantry';
date_default_timezone_set('Asia/Bangkok');
$con = mysqli_connect($host,$username,$pwd,$db) or die('Unable to connect');
$con->set_charset("utf8");

/*$con = mysqli_connect("localhost","devzonet_postbox","postbox","devzonet_postbox");

$con->set_charset("utf8");
date_default_timezone_set("Asia/Bangkok");*/
?>