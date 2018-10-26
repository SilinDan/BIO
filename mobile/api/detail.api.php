<?php
error_reporting(E_ALL || ~E_NOTICE);
include("../model/Db.class.php");//链接数据库
include("../controller/detail.class.php");//链接控制函数
include("../controller/shop.class.php");
$shop = new Shop();

$goodsDetail=new GoodsDetail;

//异步取值
if ($_GET['act']=="ajaxShow") {
	$rows= $goodsDetail->datailShow();
	print_r(json_encode($rows));

}

if ($_GET['act']=="ajaxShowComment") {
	$rows= $goodsDetail->CommentShow();
	print_r(json_encode($rows));

}

if ($_GET['act']=="ajaxAddComment") {
	$user_phone = $_SESSION['logname'];
	$ikum = $shop->checkUserName($user_phone);//获取整条用户的信息
	$id = $ikum[0]['id'];
	$rows= $goodsDetail->CommentAdd($id);
	if ($rows>0) {
			echo "<script>alert('评论成功！');window.history.go(-1);</script>";
		}
		else{
			echo "<script>alert('评论失败！')</script>";
		}
}
if ($_GET['act']=="ajaxZan") {
	$rows= $goodsDetail->commentZan();
	echo $rows;
}
//男士商品
if ($_GET['act']=="ajaxManShow") {
	$rows= $goodsDetail->datailManShow();
	// print_r($rows);
	print_r(json_encode($rows));
}

?>