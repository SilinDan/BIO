<?php
session_start();
header("content-type:text/html;charset=utf-8;");
include("../model/Db.class.php");//链接数据库
include("../controller/index1.class.php");//链接控制函数


$goodsDetail=new GoodsDetail;

//异步取值
if ($_GET['act']=="ajaxIndex") {
	// echo "<script>alert('0000');</script>";
	// $name=$_POST['user'];
	// $sql="select * from goods  where goods_id='1'";
	// echo $sql;
	$rows= $goodsDetail->datailShow();
	// print_r($rows);
	print_r(json_encode($rows));
	// echo $ikum;
	// echo "<script>alert('$ikum');</script>";
	// print_r(json_encode($ikum));
// 	echo $ikum[0]['goods_name'];
// 	echo $ikum[0]['goods_english'];
}

// if ($_GET['act']=="add") {
	
// 	$goods= $_GET["id"];
// 	$Id = $_SESSION['logname'];
// 	$userId = $goodsDetail->checkUserName($Id);
// 	$id = $userId[0]['id'];
// 	$res= $goodsDetail->GoodsIdtoShop($goods,$id);
// 	print_r(json_encode($res));
// }

if ($_GET['act']=="add") {
	if(isset($_SESSION['logname'])){
		$goods= $_GET["id"];
		$Id = $_SESSION['logname'];
		$userId = $goodsDetail->checkUserName($Id);
		$id = $userId[0]['id'];
		$res= $goodsDetail->GoodsIdtoShop($goods,$id);
		print_r(json_encode($res));
	}else{
		print_r(json_encode(0));
	}

}
if ($_GET['act']=="addmore") {
	if(isset($_SESSION['logname'])){
		$goods= $_GET["id"];
		$num = $_GET["num"];
		$Id = $_SESSION['logname'];
		$userId = $goodsDetail->checkUserName($Id);
		$id = $userId[0]['id'];
		$res= $goodsDetail->GoodsIdtoShopMore($goods,$id,$num);
		print_r(json_encode($res));
	}else{
		print_r(json_encode(0));
	}
}
if ($_GET['act']=="add1") {
	
	$goods= $_GET['goods_id'];
	$Id = $_SESSION['logname'];
	$userId = $goodsDetail->checkUserName($Id);
	$id = $userId[0]['id'];
	$res= $goodsDetail->GoodsIdtoShop($goods,$id);
	if($res=="商品添加成功！"){
		echo true;
	}
	else{
		echo false;
	}
}
if ($_GET['act']=="del") {
	
	$shop_id= $_GET["shop_id"];
	$res= $goodsDetail->deleteGoods($shop_id);
	print_r(json_encode($res));
}
if ($_GET['act']=="uid") {
	
	$user_id= $_GET["user_id"];
	$res= $goodsDetail->deleteUser_id($user_id);
	// echo $res;
	print_r(json_encode($res));
}
if ($_GET['act']=="shop") {
	
	$shop_id= $_GET["shop_id"];
	$res= $goodsDetail->updateGoods($shop_id);
	print_r(json_encode($res));
}
if ($_GET['act']=="shop1") {
	
	$shop_id= $_GET["shop_id"];
	$res= $goodsDetail->addGoodssum($shop_id);
	
	print_r(json_encode($res));
}
?>