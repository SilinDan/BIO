<?php
	session_start();
	header("content-type:text/html; charset=utf-8;");
	include("../model/Db.class.php");
	include("../controller/information.class.php");
	$user = new User();

	if (isset($_GET['act'])&&$_GET['act']=="ajaxCheckUser") {
	
		$name = $_POST['user'];
		$ikum = $user->checkUserName($name); 
		$length = sizeof($ikum);
		$str = str_split($name);

		if ($length > 0) {
			echo "用户名已存在！";
		}else{
			if (count($str)>=11) {
				echo "用户名可以使用！";
			}
			else{
				echo " ";
			}
		}
	}


	if (isset($_GET['act'])&&$_GET['act']=="information") {
		$Id = $_SESSION['logname'];
		$userId = $user->checkUserName($Id);
		$id = $userId[0]['id'];
		$res = $user->informationAdd($id);
		if ($res == '用户信息添加成功！') {
			echo '<div><img src="../view/images/KV2018092601-2.jpg"></div><div style="height:10px;"></div>
				<div style="font-size: 20px;height:50px;line-height:50px;background: #2B626F; color: #fff;">
				<center>用户信息添加成功！</center></div><script>setTimeout(function(){window.history.go(-1)},1000);</script>';
		}
		else {
			echo '<div><img src="../view/images/KV2018092601-2.jpg"></div><div style="height:10px;"></div>
				<div style="font-size: 20px;height:50px;line-height:50px;background: #2B626F; color: #fff;"><center>';
			echo $res.'</center></div><script>setTimeout(function(){window.history.go(-1)},1000);</script>';
		}
	}
	if (isset($_GET['act'])&&$_GET['act']=="info") {
		$Id = $_SESSION['logname'];
		$userId = $user->checkUserName($Id);
		$id = $userId[0]['id'];
		$res = $user->infoAdd($id);
		if ($res == '用户信息添加成功！') {
			echo '<div><img src="../view/images/KV2018092601-2.jpg"></div><div style="height:10px;"></div>
				<div style="font-size: 20px;height:50px;line-height:50px;background: #2B626F; color: #fff;">
				<center>用户信息添加成功！</center></div><script>setTimeout(function(){window.history.go(-1)},1000);</script>';
		}
		else {
			echo '<div><img src="../view/images/KV2018092601-2.jpg"></div><div style="height:10px;"></div>
				<div style="font-size: 20px;height:50px;line-height:50px;background: #2B626F; color: #fff;"><center>';
			echo $res.'</center></div><script>setTimeout(function(){window.history.go(-1)},1000);</script>';
		}
	}
	if (isset($_GET['act'])&&$_GET['act']=="alter") {
		$res = $user->infoUpdate();
		
		if ($res == '用户信息修改成功！') {
			echo '<div><img src="../view/images/KV2018092601-2.jpg"></div><div style="height:10px;"></div>
				<div style="font-size: 20px;height:50px;line-height:50px;background: #2B626F; color: #fff;">
				<center>用户信息修改成功！</center></div><script>setTimeout(function(){window.history.go(-1)},1000);</script>';
		}
		else {
			echo '<div><img src="../view/images/KV2018092601-2.jpg"></div><div style="height:10px;"></div>
				<div style="font-size: 20px;height:50px;line-height:50px;background: #2B626F; color: #fff;"><center>';
			echo $res.'</center></div><script>setTimeout(function(){window.history.go(-1)},5000);</script>';
		}
	}
	if (isset($_GET['act'])&&$_GET['act']=="show") {
		$inId =$_GET['user_id'];
		$res = $user->infoShow($inId);
		// print_r($res) ;
		print_r(json_encode($res));
		
	}
	if (isset($_GET['act'])&&$_GET['act']=="update") {
		$id = $_SESSION['logname'];
		
		$res = $user->updatePwd($id);
		// print_r($res) ;
		if ($res == '更改密码成功！') {
			echo '<div><img src="../view/images/KV2018092601-2.jpg"></div><div style="height:10px;"></div>
				<div style="font-size: 20px;height:50px;line-height:50px;background: #2B626F; color: #fff;">
				<center>更改密码成功！</center></div><script>setTimeout(function(){window.history.go(-2)},1000);</script>';
		}
		else {
			echo '<div><img src="../view/images/KV2018092601-2.jpg"></div><div style="height:10px;"></div>
				<div style="font-size: 20px;height:50px;line-height:50px;background: #2B626F; color: #fff;"><center>';
			echo $res.'</center></div><script>setTimeout(function(){window.history.go(-1)},1000);</script>';
		}
		
	}
	if (isset($_GET['act'])&&$_GET['act']=="umess") {
		$id = $_SESSION['logname'];
		$userId = $user->checkUserName($id);
		$id = $userId[0]['id'];
		
		$res = $user->updateMess($id);
		// print_r($res) ;
		if ($res == '更改信息成功！') {
			echo '<div><img src="../view/images/KV2018092601-2.jpg"></div><div style="height:10px;"></div>
				<div style="font-size: 20px;height:50px;line-height:50px;background: #2B626F; color: #fff;">
				<center>更改信息成功！</center></div><script>setTimeout(function(){window.history.go(-2)},1000);</script>';
		}
		else {
			echo '<div><img src="../view/images/KV2018092601-2.jpg"></div><div style="height:10px;"></div>
				<div style="font-size: 20px;height:50px;line-height:50px;background: #2B626F; color: #fff;"><center>';
			echo $res.'</center></div><script>setTimeout(function(){window.history.go(-1)},1000);</script>';
		}
		
	}