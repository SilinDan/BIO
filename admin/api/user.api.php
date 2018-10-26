<?php   
	header("content-type:text/html; charset=utf-8;");
	include("../model/Db.class.php");
	include("../controller/user.class.php");
	$user = new User();

	if (isset($_GET['act'])&&$_GET['act']=="add") {
		// $res = $user->checkRegInfo();
		// if (!empty($res)) {
		// 	echo "<script>alert('$res');window.history.go(-1);</script>";
		// 	exit;
		// }
		// echo "进行添加！";
		// var_dump($res);
		// $user->userReg();
		$res = $user->adminAdd();
		if ($res == '管理员添加成功！') {
			echo "<script>alert('管理员添加成功！');window.history.go(-1);</script>";
		}
		else {
			echo "<script>alert('$res');window.history.go(-1);</script>";
		}
	}

	 if (isset($_GET['act'])&&$_GET['act']=="changepwd") {
		
		$res = $user->changepwd();
		if ($res == '修改密码成功！') {
			echo "<script>alert('修改密码成功！');window.history.go(-1);</script>";
		}
		else {
			echo "<script>alert('$res');window.history.go(-1);</script>";
		}
		// echo
		
	}


	if (isset($_GET['act'])&&$_GET['act']=="ajaxCheckAdname") {
	
		$name = $_POST['user'];
		$ikum = $user->checkAdminName($name); 
		$length = sizeof($ikum);
		$str = str_split($name);

		if ($length > 0) {
			echo "用户名已存在！";
		}else{
				echo "用户名可以使用！";
		}
	}
	if (isset($_GET['act'])&&$_GET['act']=="ajaxCheckAdqq") {
	
		$name = $_POST['user'];
		$ikum = $user->checkAdminQQ($name); 
		$length = sizeof($ikum);
		$str = str_split($name);

		if ($length > 0) {
			echo "邮箱已存在！";
		}else{
			if (count($str)>=11) {
				echo "该邮箱可以使用！";
			}
			else{
				echo "请输入正确的邮箱";
			}
		}
	}

	if (isset($_GET['order'])&&$_GET['order']=="add") {
		// $res = $user->checkRegInfo();
		// if (!empty($res)) {
		// 	echo "<script>alert('$res');window.history.go(-1);</script>";
		// 	exit;
		// }
		// echo "进行添加！";
		// var_dump($res);
		// $user->userReg();
		$res = $user->orderAdd();
		if ($res == '订单添加成功！') {
			echo "<script>alert('订单添加成功！');window.location.href='../view/index.html';</script>";
		}
		else {
			echo "<script>alert('$res');window.history.go(-1);</script>";
		} 
	}
	
	if (isset($_GET['order'])&&$_GET['order']=="ajaxCheckOrdernum") {
	
		$name = $_POST['user'];
		$ikum = $user->checkOrdernum($name); 
		$length = sizeof($ikum);
		$str = str_split($name);

		if ($length > 0) {
			echo "订单号已存在！";
		}else{
			if (count($str)>=11) {
				echo "订单号可以使用！";
			}
			else{
				echo "请输入订单号";
			}
		}
	}
	if (isset($_GET['order'])&&$_GET['order']=="alter") {
		$res = $user->orderAlter();
		if ($res == '订单修改成功！') {
			echo "<script>alert('订单修改成功！');
					window.history.go(-2);
					fresh_page();
					</script>";
		}
		else {
			echo "<script>alert('$res');window.history.go(-1);</script>";
		}
	}
	if (isset($_GET['order'])&&$_GET['order']=="ajaxGetOrderInfo") {
		
			$id = $_POST['id'];
			$ikum = $user->GetOrderInfo($id); 
			
			echo json_encode($ikum);//返回json格式
		}
	if (isset($_GET['user'])&&$_GET['user']=="look") {
		
			$id = $_POST['id'];
			$ikum = $user->findInfoId($id); 
			
			echo json_encode($ikum);//返回json格式
		}
		if (isset($_GET['act'])&&$_GET['act']=="adminDelete") {
			
				$id = $_POST['id'];
				$ikum = $user->adminDelete($id); 
		
				// echo json_encode(array(length=>$ikum)); 
				echo json_encode($ikum);
			}
		if (isset($_GET['order'])&&$_GET['order']=="orderDelete") {
			
				$id = $_POST['id'];
				$ikum = $user->orderDelete($id); 
		
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