<?php
    session_start();
    header('Content-type:text/html;charset=utf-8');
		include("../model/Db.class.php");
		include("../controller/shop.class.php");
		include("../controller/order.class.php");
		$shop = new Shop();
		$oye = new Order();
?> 
<?php
	/* *
	 * 功能：支付宝手机网站支付接口(alipay.trade.wap.pay)接口调试入口页面
	 * 版本：2.0
	 * 修改日期：2016-11-01
	 * 说明：
	 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
	 请确保项目文件有可写权限，不然打印不了日志。
	 */
	
	header("Content-type: text/html; charset=utf-8");
	
	
	require_once dirname ( __FILE__ ).DIRECTORY_SEPARATOR.'alipay.trade.wap.pay-PHP-UTF-8/wappay/service/AlipayTradeService.php';
	require_once dirname ( __FILE__ ).DIRECTORY_SEPARATOR.'alipay.trade.wap.pay-PHP-UTF-8/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php';
	require dirname ( __FILE__ ).DIRECTORY_SEPARATOR.'alipay.trade.wap.pay-PHP-UTF-8/config.php';
	if (!empty($_GET['order'])&& trim($_GET['order'])!=""){
	    //商户订单号，商户网站订单系统中唯一订单号，必填
	    $out_trade_no = $_GET['order'] ;
	 
	    //订单名称，必填
			$order_name = '碧欧泉产品';
	    $subject = $order_name;
	
	    //付款金额，必填
						$order_message =  $oye->checkOrder($out_trade_no);
						$sum_price = $order_message[0]['sum_price'];
	    $total_amount = $sum_price;
	
	    //商品描述，可空
	    $body = ' ';
	
	    //超时时间
	    $timeout_express="1m";
	
	    $payRequestBuilder = new AlipayTradeWapPayContentBuilder();
	    $payRequestBuilder->setBody($body);
	    $payRequestBuilder->setSubject($subject);
	    $payRequestBuilder->setOutTradeNo($out_trade_no);
	    $payRequestBuilder->setTotalAmount($total_amount);
	    $payRequestBuilder->setTimeExpress($timeout_express);
	
	    $payResponse = new AlipayTradeService($config);
	    $result=$payResponse->wapPay($payRequestBuilder,$config['return_url'],$config['notify_url']);
	
	    return ;
	}
	?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>提交订单</title>
	<script src="js/jquery/2.0.0/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="css/default.css"/>
	<link rel="stylesheet" type="text/css" href="css/mobile-shoppingcartend.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/3.3.6/bootstrap.css"/>
	<script src="js/bootstrap/3.3.6/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
<!-- 	<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/bootstrap-3.3.4.css"> -->
	<link rel="stylesheet" href="css/style.css">
	<style>
	    *{
	        margin:0;
	        padding:0;
	    }
	    ul,ol{
	        list-style:none;
	    }
	    body{
	        font-family: "Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
	    }
	    .hidden{
	        display:none;
	    }
	    .new-btn-login-sp{
	        padding: 1px;
	        display: inline-block;
	        width: 75%;
	    }
	    .new-btn-login {
	        background-color: #02aaf1;
	        color: #FFFFFF;
	        font-weight: bold;
	        border: none;
	        width: 100%;
	        height: 30px;
	        border-radius: 5px;
	        font-size: 16px;
	    }
	    #main{
	        width:100%;
	        margin:0 auto;
	        font-size:14px;
	    }
	    .red-star{
	        color:#f00;
	        width:10px;
	        display:inline-block;
	    }
	    .null-star{
	        color:#fff;
	    }
	    .content{
	        margin-top:5px;
	    }
	    .content dt{
	        width:100px;
	        display:inline-block;
	        float: left;
	        margin-left: 20px;
	        color: #666;
	        font-size: 13px;
	        margin-top: 8px;
	    }
	    .content dd{
	        margin-left:120px;
	        margin-bottom:5px;
	    }
	    .content dd input {
	        width: 85%;
	        height: 28px;
	        border: 0;
	        -webkit-border-radius: 0;
	        -webkit-appearance: none;
	    }
	    #foot{
	        margin-top:10px;
	        position: absolute;
	        bottom: 15px;
	        width: 100%;
	    }
	    .foot-ul{
	        width: 100%;
	    }
	    .foot-ul li {
	        width: 100%;
	        text-align:center;
	        color: #666;
	    }
	    .note-help {
	        color: #999999;
	        font-size: 12px;
	        line-height: 130%;
	        margin-top: 5px;
	        width: 100%;
	        display: block;
	    }
	    #btn-dd{
	        margin: 20px;
	        text-align: center;
	    }
	    .foot-ul{
	        width: 100%;
	    }
	    .one_line{
	        display: block;
	        height: 1px;
	        border: 0;
	        border-top: 1px solid #eeeeee;
	        width: 100%;
	        margin-left: 20px;
	    }
	    .am-header {
	        display: -webkit-box;
	        display: -ms-flexbox;
	        display: box;
	        width: 100%;
	        position: relative;
	        padding: 7px 0;
	        -webkit-box-sizing: border-box;
	        -ms-box-sizing: border-box;
	        box-sizing: border-box;
	        background: #1D222D;
	        height: 50px;
	        text-align: center;
	        -webkit-box-pack: center;
	        -ms-flex-pack: center;
	        box-pack: center;
	        -webkit-box-align: center;
	        -ms-flex-align: center;
	        box-align: center;
	    }
	    .am-header h1 {
	        -webkit-box-flex: 1;
	        -ms-flex: 1;
	        box-flex: 1;
	        line-height: 18px;
	        text-align: center;
	        font-size: 18px;
	        font-weight: 300;
	        color: #fff;
	    }
	</style>
	
	<style>
		.mobile-footer-call{
			line-height: 0px;
		}
		.Gopay {
			border: 1px solid #535353;
			height: 35px;
			width: 100px;
			color: #2B542C;
			background: #fff;
			line-height:35px;
			
		}
		.Gopay a{
			color: #02A2AA;
			text-decoration: none;
		}
		.payleft{
			width: 50%;
			float: left;
			margin-top: 20px;;
		}
		.payright{
			width: 50%;
			float: right;
			margin-top: 12px;;
		}
	</style>
</head>
<body>
	<div id="main">
	        <form name=alipayment action='' method=post>
	            <div id="body" style="clear:left">
	                <dl class="content">
	                    <dt>商户订单号
	：</dt>
	                    <dd>
	                        <input id="WIDout_trade_no" name="WIDout_trade_no" />
	                    </dd>
	                    <hr class="one_line">
	                    <dt>订单名称
	：</dt>
	                    <dd>
	                        <input id="WIDsubject" name="WIDsubject" />
	                    </dd>
	                    <hr class="one_line">
	                    <dt>付款金额
	：</dt>
	                    <dd>
	                        <input id="WIDtotal_amount" name="WIDtotal_amount" />
	                    </dd>
	                    <hr class="one_line">
	                    <dt>商品描述：</dt>
	                    <dd>
	                        <input id="WIDbody" name="WIDbody" />
	                    </dd>
	                    <hr class="one_line">
	                    <dt></dt>
	                    <dd id="btn-dd">
	                        <span class="new-btn-login-sp">
	                            <button class="new-btn-login" type="submit" style="text-align:center;">确 认</button>
	                        </span>
	                        <span class="note-help">如果您点击“确认”按钮，即表示您同意该次的执行操作。</span>
							<a href="../../mobile/view/default.v.php" style="text-decoration: none;"><span class="note-help">返回主页 > </span></a>
	                    </dd>
	                </dl>
	            </div>
			</form>
	        <div id="foot">
				<ul class="foot-ul">
					<li>
						支付宝版权所有 2015-2018 ALIPAY.COM 
					</li>
				</ul>
			</div>
		</div>
	
	<div id="wrapper">
        <div class="overlay"></div>
        <!-- Sidebar -->
       <div class="cart_header">
        <a href="default.v.php"><img class="header_logo" src="./images/header_logo.png" title="Biotherm碧欧泉官方网上商城"></a>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
	    
		<div class="mobile-content" style="background: #fff; min-width:320px ;"> 
			<div class="mobile-shopping-title">
				<div class="shopping-title-nav-submit">
					我的购物袋
				</div>
				<div class="shopping-title-nav-submit">
					支付及物流
				</div>
				<div class="active-submit">
					成功提交订单
				</div>
			</div>

			<div class="order-submit-content">
				<div class="order-submit-succes">
					<img src="./images/2018-09-15_102632.png">
					<span>订单已提交成功，请尽快付款!</span>
				</div>
				<div class="order-submit-detail">
					<?php
						$order_num = $_GET['order'] ;
						echo '
						<p>感谢你购买碧欧泉产品，订单号为</p>';
						echo $order_num;
						echo '<p>为了保证及时处理您的订单，请于下单24小时内完成支付， 否则订单将会被取消。</p>
									</div>
									<div class="order-sum">
										订单金额：<span class="span-order-sum">¥'; 
						$order_message =  $oye->checkOrder($order_num);
						$sum_price = $order_message[0]['sum_price'];
						echo $sum_price;
						echo '</span></div>
									<div class="order-payment">
										<img src="./images/2018-09-15_105628.png"><a href="#" class="a-order-payment">查看更多支付方式></a>
									</div>		
								</div>



								<div class="mobile-shopping-footer">
									<div class="mobile-footer-call">
										<span>官方订购热线：400 821 5518</span>	
									</div>
									<div class="mobile-payfornow">
										<div class="payleft">
											<span>总计：￥';
											echo $sum_price;
											echo'</span>
										</div>
										<div class="payright">
											<div  >
												<input class="Gopay" value="立即支付" type="submit" ></div>
										</div>
									</div>';
										
					?>
					
				
				
			</div>
										
		</div>	
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
	
	<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
	<script src="http://www.jq22.com/jquery/bootstrap-3.3.4.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
		  var trigger = $('.hamburger'),
		      overlay = $('.overlay'),
		     isClosed = false;

		    trigger.click(function () {
		      hamburger_cross();      
		    });

		    function hamburger_cross() {

		      if (isClosed == true) {          
		        overlay.hide();
		        trigger.removeClass('is-open');
		        trigger.addClass('is-closed');
		        isClosed = false;
		      } else {   
		        overlay.show();
		        trigger.removeClass('is-closed');
		        trigger.addClass('is-open');
		        isClosed = true;
		      }
		  }
		  
		  $('[data-toggle="offcanvas"]').click(function () {
		        $('#wrapper').toggleClass('toggled');
		  });  
		});
	</script>
</body>
</html>