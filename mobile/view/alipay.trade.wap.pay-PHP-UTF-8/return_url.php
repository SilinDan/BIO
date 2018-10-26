<?php
session_start();
include("../../model/Db.class.php");
include("../../controller/order.class.php");
$oye = new Order();
?>
<!DOCTYPE HTML>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
/* *
 * 功能：支付宝页面跳转同步通知页面
 * 版本：2.0
 * 修改日期：2017-05-01
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。

 *************************页面功能说明*************************
 * 该页面可在本机电脑测试
 * 可放入HTML等美化页面的代码、商户业务逻辑程序代码
 */
require_once("config.php");
require_once './wappay/service/AlipayTradeService.php';

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
// Array
// (
//     [total_amount] => 0.01
//     [timestamp] => 2017-11-12 14:36:12
//     [sign] => MPzbDfoSJCh68iL2fcXSAP5NTClKMrpm3EQ676soidE23CVzimwzdR9yRPPXSn+YWjxM8lrY7RF5075ui5zkKXD9w5h2DfjFoy3gXEOjzm/1HsmA+4gFjtc+L6Wc7gf2cHcmOtEypKKCM742v/9oLQ11rXD+VOq6JLFj+5L2JeibXgSiI5B4iAilcBoG2stKkSxRYp8BOz5OYpSIcfGydfUhT2xm75raddZrvtlXy04Yk+zJvk8Qp8L0W7RP7Nv9AOk5iqfLDrfwFrlu3ZtL+LyAyonlvyrs++SJWL9wJ6iPZfXMuro4GZHilrQes8mc/w/2msviwrBchWJGEVvtNQ==
//     [trade_no] => 2017111221001004490200190889
//     [sign_type] => RSA2
//     [auth_app_id] => 2016073000125582
//     [charset] => UTF-8
//     [seller_id] => 2088102169151659
//     [method] => alipay.trade.page.pay.return
//     [app_id] => 2016073000125582
//     [out_trade_no] => 2017111214349176
//     [version] => 1.0
// )

// echo "<pre>";
// print_r($config);




$arr=$_GET;
$alipaySevice = new AlipayTradeService($config); 
$result = $alipaySevice->check($arr);

/* 实际验证过程建议商户添加以下校验。
1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
4、验证app_id是否为该商户本身。
*/
if($result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代码
	
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
    //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

	//商户订单号
	$out_trade_no = htmlspecialchars($_GET['out_trade_no']);

	//支付宝交易号
	$trade_no = htmlspecialchars($_GET['trade_no']);
		
	// echo "验证成功<br />支付宝交易号：".$trade_no;
	$ok = $oye->updateOrder($out_trade_no);
	echo "<pre>";
	// echo $ok; 
	echo '<img style="width:100%;height:150px;" src="KV2018092601-2.jpg">
		<div style="font-size: 15px;height:20px;line-height:15px;background: #2B626F; color: #fff;"><center>';
	echo '支付成功，正在跳回订单界面</center></div>';
	echo '<script>setTimeout(function(){window.location.href="../moblie-hadadmin-myorder-finished-bio.php"},1000);</script>';
	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}else {
    //验证失败
    echo "验证失败";
}
	echo "<pre>";
	// print_r( $_SESSION);
?>
        <title>支付宝电脑网站支付return_url</title>
	</head>
    <body>
    </body>
</html>