<?php
session_start();
header("content-type:text/html;charset=utf-8;");
include("../model/Db.class.php");//链接数据库
include("../controller/searchGoodsList.class.php");//链接控制函数


$goodsDetail=new GoodsDetail;

//异步取 搜索 商品的资料
if ($_GET['act']=="ajaxShow") {
	$rows= $goodsDetail->datailShow();
	// print_r($rows);
	print_r(json_encode($rows));
}

//异步根据二级分类取搜索商品的资料
if ($_GET['act']=="ajaxSecondShow") {
	$rows= $goodsDetail->datailSecondShow();
	// print_r($rows);
	print_r(json_encode($rows));
}

//异步根据二级分类 系列 取搜索商品的资料
if ($_GET['act']=="ajaxSerieShow") {
	$rows= $goodsDetail->datailSerieShow();
	// print_r($rows);
	print_r(json_encode($rows));
}

//异步根据二级分类 全部 取搜索商品的资料
if ($_GET['act']=="ajaxAllShow") {
	$rows= $goodsDetail->datailAllShow();
	// print_r($rows);
	print_r(json_encode($rows));
}


//获取左侧二级分类
if ($_GET['act']=="ajaxSecondShowBox") {

	$rows= $goodsDetail->SecondShow();
	print_r(json_encode($rows));
}

//获取左侧系列
if ($_GET['act']=="ajaxSerieShowBox") {

	$rows= $goodsDetail->SerieShow();
	print_r(json_encode($rows));
}

//获取特惠礼盒
if ($_GET['act']=="ajaxGiftShow") {

	$rows= $goodsDetail->GiftShow();
	print_r(json_encode($rows));
}


//根据价格从高到低显示

//异步取 搜索 商品的资料
if ($_GET['act']=="ajaxSortShow") {
	$rows= $goodsDetail->datailSortShow();
	// print_r($rows);
	print_r(json_encode($rows));
}

//异步根据二级分类取搜索商品的资料
if ($_GET['act']=="ajaxSecondSortShow") {
	$rows= $goodsDetail->datailSecondSortShow();
	// print_r($rows);
	print_r(json_encode($rows));
}

//异步根据二级分类 系列 取搜索商品的资料
if ($_GET['act']=="ajaxSerieSortShow") {
	$rows= $goodsDetail->datailSerieSortShow();
	// print_r($rows);
	print_r(json_encode($rows));
}

//异步根据二级分类 全部 取搜索商品的资料
if ($_GET['act']=="ajaxAllSortShow") {
	$rows= $goodsDetail->datailAllSortShow();
	// print_r($rows);
	print_r(json_encode($rows));
}
?>