<?php
    session_start();
    header('Content-type:text/html;charset=utf-8');
		include("../model/Db.class.php");
		include("../controller/shop.class.php");
		include("../controller/order.class.php");
		$shop = new Shop();
		$oye = new Order();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>支付页</title>
    <link rel="stylesheet" type="text/css" href="./css/bio-shoppingcart.css">
    <link rel="stylesheet" type="text/css" href="./css/bio-shoppingcart_end.css">
 

</head>
<body>

	<div class="header">
	    <div class="header_content">
	    	<a href="index.v.php"><img src="./images/header_logo.png" title="Biotherm碧欧泉官方网上商城"></a>
	    	<span class="header_text">官方订购热线：4008215518
            <br/>
            顾客关怀中心：4008215215</span>
	    </div>
	</div>



    <div class="cart_infobox">
        <div class="infobox_content">
          
          <div class="infobox_left"> 

           <div class="cart-left-header">
             <ul class="header-ul">
              <table class="header-table" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="header-td_one"><span class="font-greyb">我的购物袋</span></td>
                  <td class="header-td_two"><span class="font-greyb">支付及物流</span></td>
                  <td class="header-td_three"><span class="font-greya">成功提交订单</span></td>
                </tr>
              </table>
            </ul>
          </div>
            <div class="confirm_box">
                 <p class="topic_font">订单已提交成功，请尽快付款！</p>
								 <?php 
									echo '
									<p class="info_font">感谢您购买<span id="WIDsubject" name="WIDsubject">碧欧泉产品</span>，订单号为
												<span  name="WIDout_trade_no" id="WIDout_trade_no">';
									$order_num = $_GET['order'] ;
									echo  $order_num;
									echo '</span>。<br/>
											为了保证及时处理您的订单，请于下单24小时内完成支付，否则您的订单将会被取消。</p>
									</div>
									<div class="amount_box">
											<p class="amout_font"> 订单金额：<span class="amout_font" style="color: #28626F;">¥<span id="WIDtotal_amount" name="WIDtotal_amount">';
									$order_message =  $oye->checkOrder($order_num);
									$sum_price = $order_message[0]['sum_price'];
									echo $sum_price;
									echo '</span></span></p>
									<img style="margin-right: 20px;width: 40px;height: 40px;" src="./images/login-icon-alipay.png"> <a href="">查看更多付款方式></a>
									</div>
									
									<a href="../../public/alipay20171220-window/pagepay/pagepay.php?num=';
									echo $order_num;
									echo '&price=';
									echo $sum_price;
									echo '&name=碧欧泉产品';
									echo '" class="pay">立即支付</a>';
									
									// echo '<input class="pay" name="pay23" id="pay23" type="button" onclick="fukuan()" value="付 款">';
								 ?>
                 
                
                
                
          </div>


          <div class="infobox_right">  
            <div class="info_follow">
                  <br/>
                  <br/>
                  <span style="font-size: 30px;">跟踪订单</span>
                  <br/>
                  <a href="" style="color:#535355;">我的账号</a>><a href="" style="color:#535355;">我的订单</a>
                  <p>您将受到一封您订单详情的邮件</p>
                </div>
              <div class="cart_bottom">
                  <span style="font-size: 20px;">联系我们</span>&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="" style="color:#535355;">帮助中心></a>
                  <p>我们提供一周7天服务<br />
                  （9:00 - 21:00）</p>
                  <p>官网订购热线：4008215518</p>
                  <p>顾客关怀中心：4008205215</p>
                  <p>欧莱雅中国有限公司</p>
                  <p>地址：上海市静安区南京西路 1601号</p>
                </div>
              </div>

        </div>

    </div>
	


	 <div class="cart_footer" >
		<img style="margin-bottom: 30px;" src="./images/footer.png">
	 <div class="footer_content">
	  
	 	<span class="footer_text">全国配送：快递可至全国各地（宅急送，圆通，顺丰，联邦快递，EMS等） 快递2至6日正常送到全国</span>
	  <div class="payment">
	 	<img src=""><span class="footer_text"> 安全支付保障</span></div>
    <div class="footer_asset">
    	<div class="footer_img">
	 	<img  src="./images/police_badge_icon.jpg" title="上海工商"> <img src="./images/faithicon.png" title="诚信网站"></div>
	 	<span class="footer_text"> 沪ICP备08100043号-18 ©L'Oreal China 欧莱雅 (中国)有限公司版权所有</span>
	 	 <a href=""><span class="footer_text">条款和协议</span></a>
	 	 <a href=""><span class="footer_text">网站地图</span></a>
	 </div>
	 </div>
     

	 
	</div>
</body>
</html>
<script>
	function fukuan(){
		// $('#pay').parent().parent().parent().parent().css("display","none");
		// $('#pay23').parent().css("display","none");
		alert(name);
// 		$.ajax({
// 				url:"../../public/alipay20171220-window/pagepay/pagepay.php",
// 				type:"get",
// 				dataType:"json",
// 				data:{"user_id":$id},
// 				success:function(data){
// 					console.log(data);
// 					// alert("已添加到购物袋！");
// 					window.location.reload();
// 					// window.location.href='bio-shoppingcart.php';
// 				}
// 		})
	}
</script>