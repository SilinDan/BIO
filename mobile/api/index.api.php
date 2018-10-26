<?php
	header("content-type:text/html; charset=utf-8;");
	include("../model/Db.class.php");
	include("../controller/index.class.php");
	$index = new Index();

	if (isset($_GET['act'])&&$_GET['act']=="login") {
		
		$res = $index->checkLoginInfo();
		if (!empty($res)) {
			echo '<img style="width:100%;height:150px;" src="../view/images/KV2018092601-2.jpg">
				<div style="font-size: 15px;height:20px;line-height:15px;background: #2B626F; color: #fff;"><center>';
			echo $res.'</center></div><script>setTimeout(function(){window.history.go(-1)},1000);</script>';
			exit;
		}

		$res = $index->loginReg();
		if ($res == '用户登录成功！') {
// 			echo '<img style="width:100%;height:150px;" src="../view/images/KV2018092601-2.jpg">
// 				<div style="font-size: 15px;height:20px;line-height:15px;background: #2B626F; color: #fff;"><center>';
// 			echo $res.'</center></div><script>setTimeout(function(){window.history.go(-1)},1000);</script>';
			$index->getUserName();
		}
		else {
			echo '<img style="width:100%;height:150px;" src="../view/images/KV2018092601-2.jpg">
				 <div style="font-size: 15px;height:20px;line-height:15px;background: #2B626F; color: #fff;"><center>';
			echo $res.'</center></div><script>setTimeout(function(){window.history.go(-1)},1000);</script>';
			
		}
		// echo "用户登录！";
	}