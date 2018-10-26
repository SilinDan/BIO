<?php
	header("content-type:text/html; charset=utf-8;");
	session_start();
	include("../model/Db.class.php");
	include("../controller/user.class.php");
	$user = new User();

	// print_r($_GET);
	// print_r($_POST); 
	
	if (isset($_GET['act'])&&$_GET['act']=="ajaxCheckCode") {	
		
		$str=$_SESSION["_code"];//取 code.php 中生成的验证码字符串
		$cod=$_POST['code'];//用户提交的字符串
		if (strcasecmp($str,$cod)==0) {
			echo "验证码正确！";
		}else{
			echo "验证码错误！";
		}
	}
	if (isset($_GET['act'])&&$_GET['act']=="ajaxCheckUser") {
	
		$name = $_POST['user'];
		$ikum = $user->checkUserName($name); 
		$length = sizeof($ikum);
		
		if ($length > 0) {
			echo "用户名已存在！";
		}else{
			echo "用户名可以使用！";
		}
	}


	if (isset($_GET['act'])&&$_GET['act']=="reg") {
		$res = $user->checkRegInfo();
		if (!empty($res)) {
			echo "<script>alert('$res');</script>";
			exit;
		}
		// echo "进行注册！";
		// var_dump($res);
		// $user->userReg();
		$res = $user->userReg();
		if ($res == '用户注册成功！') {
			echo "<script>alert('用户注册成功！');window.location.href='../view/moblie-admin-bio.html';</script>";
		}
		else {
			echo "<script>alert('$res');</script>";
		}
	}

	if (isset($_GET['act'])&&$_GET['act']=="login") {
		
		$res = $user->checkLoginInfo();
		if (!empty($res)) {
			echo "<script>alert('$res');</script>";
			exit;
		}

		$res = $user->loginReg();
		if ($res == '用户登录成功！') {
			echo "<script>alert('用户登录成功！');window.location.href='../view/default.v.html';</script>";
		}
		else {
			echo "<script>alert('$res');</script>";
		} 
		// echo "用户登录！";
	}

	if (isset($_GET['act'])&&$_GET['act']=="out") {
		// echo "用户退出！";
		// 
		//setcookie('key','boss',time()+10,'');//服务器给客户端的
		// echo $_COOKIE[session_name()];//来自客户端的数据

		// echo "<br/>".session_id();
		$res = $user->userOut();
		if ($res == true) {
			echo "<script>alert('安全退出！');window.history.go(-1);</script>";
		}

	}

	//异步检测用户名是否存在 怪怪的，你有写好的ajax例子吗给我看看 之前的不是没成功 重启电脑又可以吗。。就是这个？对啊
	


	// echo "<pre>";
	// print_r($rows);
// // print_r();