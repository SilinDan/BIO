<?php
session_start();
header("content-type:text/html;charset=utf-8;");
include("../model/Db.class.php");//链接数据库
include("../controller/order.class.php");//链接控制函数


$order=new Order;

//异步取值
if ($_GET['act']=="add") {
	$h= $_GET['h'];
	$i= $_GET['i'];
	$j= $_GET['j'];
	$k= $_GET['k'];
	$l= $_GET['l'];
	$a = $i.$j;
	$m= $_SESSION['logname'];
	$userId = $order->checkUserName($m);
	$id = $userId[0]['id'];
	
	$res = $order->orderAdd($h,$a,$k,$l,$id);
	print_r(json_encode($res));
}
if ($_GET['act']=="kanso") {
	$a= $_GET['or_num'];
	$res =$order->updateOrderState($a);
	
	// print_r($res);
	// $res = $order->orderAdd($h,$a,$k,$l,$id);
	print_r(json_encode($res));
}
if ($_GET['act']=="del") {
	$a= $_GET['or_num'];
	$res =$order->delOrderDetail($a);
	
	// print_r($res);
	// $res = $order->orderAdd($h,$a,$k,$l,$id);
	print_r(json_encode($res));
}
if ($_GET['act']=="again") {
	$a= $_GET['or_num'];
	$ikum =$order->checkOrder($a);
	$id = $ikum[0]['id'];
	$res =$order->buyAgain($a,$id);
	
	// print_r($id);
	// $res = $order->orderAdd($h,$a,$k,$l,$id);
	print_r(json_encode($res));
}

?>