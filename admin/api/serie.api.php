<?php   
	header("content-type:text/html; charset=utf-8;");
	include("../model/Db.class.php");
	include("../controller/serice.class.php");
	$user = new User();

if (isset($_GET['serice'])&&$_GET['serice']=="ajaxGetSerice") {

		$ikum = $user->GetSericeInfo(); 
		echo json_encode($ikum);//返回json格式
	}

?>