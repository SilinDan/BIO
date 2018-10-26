<?php
	header("content-type:text/html; charset=utf-8;");
	session_start();
	include("../model/Db.class.php");
	include("../controller/index.class.php");

	
	$str=$_SESSION["_code"];//取 code.php 中生成的验证码字符串

	$cod=$_POST["codes"];//用户提交的字符串
	$index = new Index();

	if (isset($_GET['act'])&&$_GET['act']=="login") {
		
		$res = $index->checkLoginInfo();
		if (!empty($res)) {
			echo "<script>alert('$res');window.history.go(-1);</script>";
			exit;
		}

		if(strlen(trim($cod))>0){	
			if(strtoupper($cod)==strtoupper($str)){

			}
			else{ echo "<script>alert('验证码错误！');window.history.go(-1);</script>"; exit;}
		}/*else{echo "<script>alert('请输入验证码！');window.history.go(-1);</script>"; exit;}*/


		$res = $index->loginReg();
		if ($res == '用户登录成功！') {
			echo "<script>alert('用户登录成功！');</script>";
			$index->getUserName();
		}
		else {
			echo "<script>alert('$res');window.history.go(-1);</script>";
		}
		// echo "用户登录！";
	}

	/*if (isset($_GET['act'])&&$_GET['act']=="login") {
		if(strlen(trim($code))>0){	
			if(strtoupper($code)==strtoupper($str)){

			}
			else{ echo "<script>alert('验证码错误！');window.history.go(-1);</script>"; exit;}
		}/*else{echo "<script>alert('请输入验证码！');window.history.go(-1);</script>"; exit;}
	
}
*/