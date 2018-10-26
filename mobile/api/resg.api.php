<?php
	header("content-type:text/html; charset=utf-8;");
	session_start();
	include("../model/Db.class.php");
	include("../controller/Resg.class.php");
	$db=new Db();
	$resg=new Resg();
	

	// $_GET['act']
	if (isset($_GET['act'])&&$_GET['act']=="ajaxCheckUser") {
		
			$name = $_POST['user'];
			$ikum = $resg->checkUserName($name); 
			$length = sizeof($ikum);
			$str = str_split($name);
	
			if ($length > 0) {
				echo "用户名已存在！";
			}else{
				if (count($str)>=11) {
					echo "用户名可以使用！";
				}
				else{
					echo "";
				}
			}
		}
		if (isset($_GET['act'])&&$_GET['act']=="ajaxCheckCode") {	
			
			$str=$_SESSION["_code"];//取 code.php 中生成的验证码字符串
			$cod=$_POST['code'];//用户提交的字符串
			if (strcasecmp($str,$cod)==0) {
				echo "验证码正确！";
			}else{
				echo "验证码错误！";
			}
		}
		if (isset($_GET['act'])&&$_GET['act']=="reg") {;
			$res = $resg->userReg();
			if ($res == '用户注册成功！') {
				echo '<img style="width:100%;height:150px;" src="../view/images/KV2018092601-2.jpg">
					<div style="font-size: 15px;height:20px;line-height:15px;background: #2B626F; color: #fff;"><center>';
				echo $res.'</center></div><script>setTimeout(function(){window.location.href="../view/moblie-admin-bio.php"},1000);</script>';
			}
			else {
				echo '<img style="width:100%;height:150px;" src="../view/images/KV2018092601-2.jpg">
					<div style="font-size: 15px;height:20px;line-height:15px;background: #2B626F; color: #fff;"><center>';
				echo $res.'</center></div><script>setTimeout(function(){window.history.go(-1)},1000);</script>';
			}
		}



