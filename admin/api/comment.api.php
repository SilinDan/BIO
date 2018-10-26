<?php   
	header("content-type:text/html; charset=utf-8;");
	include("../model/Db.class.php");
	include("../controller/comment.class.php");
	$user = new User();

	if (isset($_GET['comment'])&&$_GET['comment']=="add") {
		// $res = $user->checkRegInfo();
		// if (!empty($res)) {
		// 	echo "<script>alert('$res');window.history.go(-1);</script>";
		// 	exit;
		// }
		// echo "进行添加！";
		// var_dump($res);
		// $user->userReg();
		$res = $user->commentAdd();
		if ($res == '评论添加成功！') {
			echo "<script>alert('评论添加成功！');window.location.href='../view/listcomment.php';</script>";
		}
		else {
			echo "<script>alert('$res');window.history.go(-1);</script>";
		}
	}

	if (isset($_GET['comment'])&&$_GET['comment']=="alter") {
		$res = $user->commentAlter();
		if ($res == '评论修改成功！') {
			echo "<script>alert('评论修改成功！');</script>";
		}
		else {
			echo "<script>alert('$res');window.history.go(-1);</script>";
		}
	}


	if (isset($_GET['comment'])&&$_GET['comment']=="ajaxCheckcommentName") {
	
		$name = $_POST['user'];
		$ikum = $user->checkcommentName($name); 
		$length = sizeof($ikum);
		$str = str_split($name);

		if ($length > 0) {
			echo "评论已存在！";
		}else{
			if (count($str)>=11) {
				echo "该评论还没入库！";
			}
			else{
				echo "请输入评论名";
			}
		}
	}

	if (isset($_GET['comment'])&&$_GET['comment']=="ajaxGetcommentInfo") {
	
		$id = $_POST['id'];
		$ikum = $user->GetcommentInfo($id); 

		echo json_encode($ikum);//返回json格式
	}

	if (isset($_GET['comment'])&&$_GET['comment']=="ajaxDeletecomment") {
	
		$id = $_POST['id'];
		$ikum = $user->Deletecomment($id); 

		echo json_encode(array(length=>$ikum));
	}


	if (isset($_GET['comment'])&&$_GET['comment']=="commentDelete") {
			
				$id = $_POST['id'];
				$ikum = $user->commentDelete($id); 
		
				// echo json_encode(array(length=>$ikum)); 
				echo json_encode($ikum);
			}

			//模糊搜索商品名
	if (isset($_GET['act'])&&$_GET['act']=="ajaxSearchBtn") {
		// echo "yy";

		$rows= $user->searchName();
		// return $rows;
		print_r(json_encode($rows));

	}
