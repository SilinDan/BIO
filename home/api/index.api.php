<?php
	header("content-type:text/html; charset=utf-8;");
	include("../model/Db.class.php");
	include("../controller/index.class.php");
	$index = new Index();

	if (isset($_GET['act'])&&$_GET['act']=="login") {
		
		$res = $index->checkLoginInfo();
		if (!empty($res)) {
			echo '<div><img src="../view/images/KV2018092601-2.jpg"></div><div style="height:10px;"></div>
				<div style="font-size: 20px;height:50px;line-height:50px;background: #2B626F; color: #fff;"><center>';
			echo $res.'</center></div><script>setTimeout(function(){window.history.go(-1)},1000);</script>';
			exit;
		}

		$res = $index->loginReg();
		if ($res == '用户登录成功！') {
			$index->getUserName();
		}
		else {
			echo '<div><img src="../view/images/KV2018092601-2.jpg"></div><div style="height:10px;"></div>
				  <div style="font-size: 20px;height:50px;line-height:50px;background: #2B626F; color: #fff;"><center>';
			echo $res.'</center></div><script>setTimeout(function(){window.history.go(-1)},1000);</script>';
		}
	}