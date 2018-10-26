<?php
    session_start();
    header('Content-type:text/html;charset=utf-8');
		include("../model/Db.class.php");
		include("../controller/shop.class.php");
		$shop = new Shop();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>碧欧泉我的订单</title>
    <link rel="stylesheet" type="text/css" href="css/user_imformation_myOrder_finished.css"/>
    <link rel="stylesheet" type="text/css" href="./css/biotherm_footer1.css">
	<link rel="stylesheet" type="text/css" href="./css/header -80percentage.css">
	<link rel="stylesheet" type="text/css" href="./css/bio_detailed1.css">
	<link rel="stylesheet" type="text/css" href="./css/bio_try.css">
	<link rel="stylesheet" type="text/css" href="css/header1.css">
    <script type="text/javascript" src="./js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="./js/bio-header.js"></script>
    <script src="js/shopUpDown.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/E-zine.css">
	<script type="text/javascript" src="./js/E-zine.js"></script>
	
	<style type="text/css">
		.nowpay{
			height: 30px;
			width: 70px;
			border: 1px solid #2B626F;
			background: #2B626F;
			color: #fff;
		}
		.jump a{
		text-decoration: underline;
		color: #000;
		}
		.jump{
			font-size: 14px;
			text-align: center;
		}
		.orderinfo table td{
					text-align: center;
		}
   </style>
   
   </script>
</head>
<body>
<div class="subscribe">
			<button class="subscribe_close">×</button>
			<div class="subscribe_ok">订阅成功，感谢您的订阅</div>
			<div class="subscribe_href"><a href="index.v.php">继续购物</a></div>
			<span>还没有账号？</span>
			<div class="subscribe_href"><a href="bio-register.php">立即注册</a></div>
		</div>
		<div class="body_box"></div>
		
		<!-- 引入头部 -->
		<?php
		include("./header/headerNavigation.php");
		?>

	<div class="background">
		<div class="user-imformation-content">
			<div class="content-header">
				<div class="content-nav">
					<span class="font-size1 font-white"><a class="font-grey" href="index.v.php">首页</a>  >  <a class="font-grey" href="bio-account.php">我的账户</a> > 我的订单</span>
				</div>
				<div class="content-title font-white font-size2">我的账户</div>
			</div>
			<div class="content-column">
				<div class="content-column-left">
					<a href="bio-account.php">个人资料</a>
					<a href="user_imformation_myAddress.php">收货地址</a>
					<a href="user_imformation_myOrder.php">我的订单</a>
					<a href="user_imformation_myTry.php">我的试用装</a>
					<a href="user_imformation_myCollect.php">我的收藏夹</a>
				</div>
				<div class="content-column-right">
					<div class="split-line-div1">
						<span class="split-line1"></span>
						<span class="split-line-text1">我的订单</span>
						<span class="split-line1"></span>
					</div>
					<?php 
						$user_phone = $_SESSION['logname'];
						$ikum = $shop->checkUserName($user_phone);//获取整条用户的信息
						$id = $ikum[0]['id'];
						$ikum = $shop->checkOrder($id);//获取多条订单的信息
						$order_all = sizeof($ikum);
						$dai1 =0;
						$had = 0;
						for($i=0; $i < $order_all; $i++){
							$sty = $ikum[$i]['pay_state'];
							$oderstate = $ikum[$i]['order_state'];
							if($sty=='待支付'&&$oderstate=='待确认'){
									$dai1++;
							}
							else{
								$had++;
							}
						}

							echo '
									<div class="content-orderNum">
										<table border="1" width="100%" height="40px" cellpadding="5px;" cellspacing="0">
											<tr>
												<td width="20%" class="td1"><a class="order-finished" href="user_imformation_myOrder.php">未完成订单（';
							echo $dai1;
							echo '）</a></td>
												<td width="20%" class="td2"><a class="order-finished" href="user_imformation_myOrder_finished.php">已完成订单（';
							echo $had;
							echo '）</a></td>
												<td width="80%" class="td3"><a class="order-integral" href="redemption-club.bio.php">查看积分订单></a></td>
											</tr>
										</table>';
							if($had!=0){
								echo '
										<div class="orderinfo">
											<table width="699">
												<tr>
													<th>订单编号:</th>
													<th>下单日期</th>					
																				<th>商品</th>
													<th>数量</th>	
													<th>总价</th>
													<th>订单状态</th>	
													<th>操作</th>	
												</tr>
								';
									for($i=0; $i < $order_all; $i++){	
										$sty = $ikum[$i]['pay_state'];
										$o_sty = $ikum[$i]['order_state'];
										$o_num = $ikum[$i]['order_num'];
										$del = $shop->checkOrderDetail($o_num);//获取多条订单详情的信息
										$del_sum = sizeof($del);
										
											if($sty=='已支付'||$o_sty=='已取消'){
													echo '
														<tr height="100px">
															<td width="130px">';
													echo $o_num;
													echo'</td>
															<td width="180px">';
															$ti = $ikum[$i]['order_time'];
															$time = date("Y-m-d H:i:s",$ti);
													echo $time;
													echo '</td>
															<td width="80px"><img style="width: 80px;height: 80px;border: 1px solid #ccc;" src="./images/goods/';
											
														$g_id = $del[0]['goods_id'];
														$g_mess = $shop->checkGood($g_id);
														$g_img =$g_mess[0]['goods_img'] ;
														echo $g_img;
															
													echo '" /></td>
															<td width="70px">';
													echo $del_sum;
													echo '</td>
															<td width="70px">¥';
													echo $ikum[$i]['sum_price'];
													echo '</td>
															<td width="100px">';
															if($sty=='待支付'){
																	echo '订单';
																	echo $o_sty;
															}
															else{	
																echo $sty;
																}
													echo '</td>
															<td width="100px" style="margin-top:20px">
															<a style="color:#535355;text-decoration:underline;" href="bio-orderdetail.php?num=';
													echo $o_num;
													echo '">查看详情</a><br>
															<a style="color:#535355;text-decoration:underline;" href="#"  onclick="buyAgain(';
														echo "'$o_num'";
														echo ')" href="">再次购买</a></td>
														</tr>
													';
											}
									}
										echo '
												</table >
											</div>
										';
								}
							else{
								echo '
										<div class="content-textList">
											<p class="font-grey1 font-size3">你还没有任何订单， <a href="index.v.php">立即开始购物</a></p>
										</div>
								';
							}
					?>
						
					</div>
					
				</div>
			</div>
			
		</div>

	<div id="footer">
		<div id="footer_box">
			<div id="footer_box_img">
				<div id="img1">100%官方正品保证</div>
				<div id="img2">支持多种支付方式<br>
				在线支付免运费</div>
				<div id="img3">专享官网特惠礼遇</div>
				<div id="img4">线上线下积分共享</div>
			</div>
			<div id="footer_box_mailbox">
				<div id="footer_box_mailbox1">
					<div id="text1">
						<span>订阅电子杂志</span>
					</div>
					<div id="text_input">
						<input id="input1" type="text" name="" placeholder="输入您的邮箱">
						<input id="input3" type="image" src="images/2018-09-10_202455.png" name="img">
						<input id="input2" type="checkbox" name="NO"><span style="color: #535355;">我同意依照本<a class="subscribe_href_a" href="http://policy.lorealchina.com/termsofusewebsite">使用条款</a>和<a class="subscribe_href_a" href="http://policy.lorealchina.com/privacypolicy">隐私政策</a>对我的个人信息进行收集和使用；我已阅读并确认被给予充分机会理解该<a class="subscribe_href_a" href="http://policy.lorealchina.com/termsofusewebsite">使用条款</a>和<a class="subscribe_href_a" href="http://policy.lorealchina.com/privacypolicy">隐私政策</a>的内容。</span><br />
						<span class="tips_1" id="tips_1"></span><span class="tips_2" id="tips_2"></span>
					</div>
				</div>
				<div id="footer_box_mailbox2">
					<table>
						<tr id="height_td">
							<td>脸部护理</td>
							<td>身体护理</td>
							<td>防晒隔离</td>
							<td>品牌故事</td>
							<td>帮助中心</td>
							<td>快速订单查询</td>
						</tr>
						<tr id="height_td1">
							<td>活泉系列-保湿</td>
							<td>凝乳丝滑系列-润肤</td>
							<td>防晒</td>
							<td>碧欧泉故事</td>
							<td>快速订单查询</td>
							<td id="rowspan_td" rowspan="5">
								<img src="images/weibo_icon_primary.jpg">
								<img src="images/wechat_icon_primary.jpg">
								<img id="td_img" src="images/weibo_icon_primary.jpg">
								<img src="images/mobile_icon_primary.jpg">
							</td>
						</tr>
						<tr id="height_td1">
							<td>蓝源系列-抗老</td>
							<td>光感纤体系列-塑身</td>
							<td>隔离</td>
							<td>逾60年致力于护肤</td>
							<td>常见问题</td>
						</tr>
						<tr id="height_td1">
							<td>奇迹系列-修护</td>
							<td>保湿香氛系列-香氛</td>
							<td>气垫</td>
							<td>碧欧泉灵魂成分</td>
							<td>联系我们</td>
						</tr>
						<tr id="height_td1">
							<td>滢澈皙白系列-美白</td>
							<td>阳光欢愉系列-清爽</td>
							<td></td>
							<td>碧欧泉的承诺</td>
							<td>法律信息</td>
						</tr>
						<tr id="height_td1">
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>网站地图</td>
						</tr>
					</table>
				</div>
			</div>
			<div id="footer_box_safety">
				<img src="images/footer_payment_methods_icon.jpg">&nbsp;
				<span>安全支付保障</span>
			</div>
			<div id="footer_box_term">
				<div id="footer_box_term1">
					<div id="img1">
						<img src="images/police_badge_icon.jpg">
						<span>沪ICP备08100043号-26 ©L'Oreal China 欧莱雅 (中国)有限公司版权所有</span>
						<img src="images/police.png">
						<span>沪公网安备 31010602001504号</span>
					</div>
					<div id="img2">
						<span>使用条款 | cookies政策 | 隐私声明 | 隐私声明</span>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>
</html>
<script>
	function buyAgain($o_num){
		$.ajax({
				url:"../api/order.api.php?act=again",
				type:"get",
				dataType:"json",
				data:{"or_num":$o_num},
				success:function(data){
					console.log(data);
					// alert(data); 会不会数据太长了 还有这种？我之前传这个 用超链接也可以的 没试过ajax
					// window.location.reload();
					window.location.href='bio-shoppingcart.php';
				}
		})
		// alert('再买');
	}
</script>