<?php
error_reporting(E_ALL || ~E_NOTICE);
include("../model/Db.class.php");//链接数据库
include("../controller/mostloved.class.php");//链接控制函数

$goodsDetail=new GoodsDetail;

//异步取值
if ($_GET['act']=="ajaxShow") {
	$rows= $goodsDetail->mostloved();
	print_r(json_encode($rows));

}

?>