<?php   
	header("content-type:text/html; charset=utf-8;");
	include("../model/Db.class.php");
	include("../controller/goods.class.php");
	$user = new User();

	if (isset($_GET['goods'])&&$_GET['goods']=="add") {
		$res = $user->goodsAdd();
		if ($res == '商品添加成功！') {
			echo "<script>alert('商品添加成功！');location.href = '../view/listgoods.php?page=1&size=20';</script>";
		}
		else {
			echo "<script>alert('$res');</script>";
		}
	}

	if (isset($_GET['goods'])&&$_GET['goods']=="alter") {
		$res = $user->goodsAlter();
		if ($res == '商品修改成功！') {
			echo "<script>alert('商品修改成功！');
				   window.history.go(-2);
				   fresh_page();
				   </script>";
		}
		else {
			echo "<script>alert('$res');window.history.go(-1);</script>";
		}
	}


	if (isset($_GET['goods'])&&$_GET['goods']=="ajaxCheckGoodsName") {
	
		$name = $_POST['user'];
		$ikum = $user->checkGoodsName($name); 
		$length = sizeof($ikum);
		$str = str_split($name);

		if ($length > 0) {
			echo "商品已存在！";
		}else{
			if (count($str)>=11) {
				echo "该商品还没入库！";
			}
			else{
				echo "请输入商品名";
			}
		}
	}

	if (isset($_GET['goods'])&&$_GET['goods']=="ajaxGetGoodsInfo") {
	
		$id = $_POST['id'];
		$ikum = $user->GetGoodsInfo($id); 

		echo json_encode($ikum);//返回json格式
	}

	if (isset($_GET['goods'])&&$_GET['goods']=="ajaxDeleteGoods") {
	
		$id = $_POST['id'];
		$ikum = $user->DeleteGoods($id); 

		echo json_encode(array(length=>$ikum));
	}


//模糊搜索商品名
	if (isset($_GET['act'])&&$_GET['act']=="ajaxSearchBtn") {
		// echo "yy";

		$rows= $user->searchName();
		// return $rows;
		print_r(json_encode($rows));

	}

?>