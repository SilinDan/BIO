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
	<title>我的购物袋</title>
    <link rel="stylesheet" type="text/css" href="./css/bio-shoppingcart.css">
    <link rel="stylesheet" type="text/css" href="./css/shopping-card-layout.css">
	<link rel="stylesheet" type="text/css" href="./css/shopping-cart-font.css">
    <style type="text/css">
    	.text_box{
				width: 20px;
			}
    </style>
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

<?php
		if (isset($_SESSION['logname'])) {
			$user_phone = $_SESSION['logname'];
			$ikum = $shop->checkUserName($user_phone);//获取整条用户的信息
			$id = $ikum[0]['id'];
			$ikum = $shop->checkShop($id);//获取整条购物车的信息
			$shop_sum = sizeof($ikum);
			 if($shop_sum!=0){
				echo '<div class="cart">
									<div class="cart_content">
										 <div class="cart_contentleft">
											 <div class="bg">
										 <div class="shopping-cart-main">
											<div class="shopping-cart-content">

											<div class="cart-left">
											<div class="cart-left-header">
												<ul class="header-ul">
													<table class="header-table" cellpadding="0"cellspacing="0">
														<tr>
															<td class="header-td-one"><span class="font-greya">我的购物袋</span></td>
															<td class="header-td-two"><span class="font-greyb">支付及物流</span></td>
															<td class="header-td-three"><span class="font-greyb">成功提交订单</span></td>
														</tr>
													</table>
												</ul>
											</div>
											
											<a href="index.v.php" class="continue-shopping"><span class="font-greyc">继续购物></span></a>
											<a href="bio-shoppingcart_2.php" class="balance"><span>立即结算</span></a>

											<div class="cart-table">
												<table class="cart-table-header" cellpadding="0"cellspacing="0">
													<tr>
														<td class="cart-table-header-td1"><span>我的购物袋</span></td>
														<td class="cart-table-header-td2"><span>单价</span></td>
														<td class="cart-table-header-td3"><span>数量</span></td>
														<td class="cart-table-header-td4"><span>价格</span></td>
													</tr>
												</table>
												<ul class="cart-ul">';
															for ($i=0; $i < $shop_sum; $i++) {
																	$id = $ikum[$i]['goods_id'];
																	$roy = $shop->checkGood($id);//获取整条商品的信息
						// 											print_r($roy);
						// 											echo '<br>';
																	
																	echo '<li class="cart-li">
																					<table class="cart-table-content" cellpadding="0"cellspacing="0">
																						<tr>
																							<td class="cart-table-content-td1"><a href="detail-bio.php?id=';
																	echo  $roy[0]['goods_id'];
																	echo '"><img src="./images/goods/';
																	echo  $roy[0]['goods_img'];
																	echo 				'"></a></td>
																							<td class="cart-table-content-td2"><div class="product-subtitle">';	
																	echo  $roy[0]['goods_name'];
																	echo 				'</div><div class="sttribute-size">';
																	echo  $roy[0]['goods_size'];
																	echo 				'ml</div>
																							<div class="delete-div"><div class="a-delete" onclick="del_goods(';
																	echo  $ikum[$i]['shop_id'];
																	echo						')">删除</div></div></td>
																							<td class="cart-table-content-td3">
																								<div class="product-price">¥<span>';
																	echo  $roy[0]['goods_price'];
																	echo 				'</span></div></td>
																							<td class="cart-table-content-td4">
																											<input type="button" value="-" onclick="del(';
																	echo 	$ikum[$i]['shop_id'];
																	echo 								')"/>
																											<input type="text" class="text_box" value="';
																	echo								$ikum[$i]['shop_num'];
																	echo 								'" />
																											<input type="button" value="+" onclick="add(';
																	echo	$ikum[$i]['shop_id'];
																	echo 					')"/>
																									</td>
																							<td class="cart-table-content-td5">
																								<div class="product-total-price">
																									<div class="font-total-price">¥<span>';
																	echo  $roy[0]['goods_price']*$ikum[$i]['shop_num'];
																	echo 			   		'</span></div>
																								</div>
																								<div class="product-repertory">';
																	if($roy[0]['goods_remain']>=1)	{				
																								echo		'<span>有库存</span>';
																	}
																	else{
																								echo		'<span>没货</span>';
																	}
																	echo 				'</div>
																							</td>
																						</tr>
																					</table>
																				</li>';
															}
															
													
									echo '			</ul>
											</div>

											<div class="promotion-message">
												<div class="promotion-title">
													<span class="font-promotion-title">#秋季化妆品盛典#<br/>9.11-9.20<br/></span>
												</div>
												<div class="promotion-part">
													<div class="promotion-pic">
														<img src="./images/cart_160705.jpg">
													</div>
													<div class="promotion-describe">
														<ul class="promotion-describe-ul">
															<li class="promotion-describe-li">
																<span class="font-describe-title">片装试用不参加任何促销活动</span>
															</li>
															<li class="promotion-describe-li">
																<div class="promotion-content">【秋季化妆品盛典之一】全场任购2件单品即享秋季护肤6件礼，4款礼包任选2款，年轻肌肤用心呵护！</div>
																<div class="promotion-explaination">促销代码：LVFALL</div>
															</li>
															<li class="promotion-describe-li">
																<div class="promotion-content">【秋季化妆品盛典之二】全场任购单品满1080元加赠限量iPad包，购指定单品组合，再享额外惊喜限定礼！</div>
																<div class="promotion-explaination"></div>
															</li>
															<li class="promotion-describe-li">
																<div class="promotion-content">【9月满额甄礼】任购单品满580即赠保湿4件礼，满1080加赠亮肤焕颜组合，满1580加赠逆龄紧致组合</div>
																<div class="promotion-explaination">女士礼包促销代码：FORHER，男士礼包促销代码：FORHIM</div>
															</li>
															<li class="promotion-describe-li">
																<div class="promotion-content"></div>
																<div class="promotion-explaination">*礼盒不参加满额礼赠<br/>
																*促销代码一次仅可输入一个，请挑选您最爱的礼包带走</div>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
											<div class="cart_coupon">
												<div class="cartcoupon_content">
														<table class="giftcard_form">
															<tr>
																			 <td style="width: 300px;height: 115px;color: #535355">促销代码</td>
																 <td ><input class="giftcard_code"type="text"  name="giftcard_code"  value=""/></td>
																 <td><button class="button_confirm">确认</button></td>
																
															</tr>
														</table>
												
														 <table class="price_form">
															<tr>
																			 <td style="width: 300px;height: 100px;"></td>
																 <td style="color: #535355;font-size: 14px;">商品价格：<br/>
																 运费：</td>
																 <td><span class="amount" id="all_price">¥';
																 $sum =0;
																 for($i=0; $i < $shop_sum; $i++){
																		$id = $ikum[$i]['goods_id'];
																		$roy = $shop->checkGood($id);//获取整条商品的信息
																		$single_sum = $roy[0]['goods_price']*$ikum[$i]['shop_num'];
																		$sum += $single_sum;
																 }
																 echo $sum;
																 echo '</span><br/><br/>
																 <span class="amount">¥0</span></td>
																
															</tr>
														</table>
													 <table class="total_form">
															<tr>
																			 <td style="width: 235px;font-size: 18px;color: #535355">总计：</td>
																 <td><span class="amount" id="all_total_price">¥';
																 echo $sum;
																 echo '</span></td>

															</tr>
														</table>
												</div>

														<div class="points">
															<div class="points">
															<span class="points_text"><img src="./images/points.png" center>  积分奖励：恭喜您获得';
															echo $sum;
															echo '积分<br/><span style="color:#ccc; font-size: 12px;">*该积分为常规积分，不包括特殊活动和促销</span></span>
															
														</div></div>
													<div class="cart_coupon_bottom">
														
														<a href="index.v.php" class="continue-shopping"><span class="font-greyc">继续购物></span></a>
														<a href="bio-shoppingcart_2.php" class="balance"><span>立即结算</span></a>
													</div>

											</div> 
										 </div>



										 <div class="cart_contentright">
									 
									<div class="big_right">


										<div class="cart_box_right">
										<br />
											<span style="font-size: 18px;">推荐产品</span><br /><br />
											<div class="cnt1">
												<div class="min_box">
													<div class="hot">Hot</div>
													<div><img src="./images/BIO10001.png" alt="" /></div>
												</div><br/>
												<span>男士清爽控油洁面膏</span><br /><br />
												<span>125ml</span><br />
												<div class="star">
													<img src="./images/2018-09-11_165957.png" alt="" /><br /><br />
												</div>
												<span style="color:#2B626F;">¥260</span>
												<div class="buy">
													<a href="#">立即购买</a>
												</div>
											</div>


											<div class="cnt1">
												<div class="min_box">
													<div class="hot">Hot</div>
													<div><img src="./images/BIO10007.png" alt="" /></div>
												</div><br/>
												<span>碧欧泉水动力洁面膏</span><br /><br />
												<span>125ml</span><br />
												<div class="star">
													<img src="./images/2018-09-11_165957.png" alt="" /><br /><br />
												</div>
												<span style="color:#2B626F;">¥240</span>
												<div class="buy">
													<a href="#">立即购买</a>
												</div>
											</div>


											<div class="cnt1">
												<div class="min_box">
													<div class="hot">Hot</div>
													<div><img src="./images/BIO10008.png" alt="" /></div>
												</div><br />
												<span>男士水动力爽肤水</span><br /><br />
												<span>200ml</span><br />
												<div class="star">
													<img src="./images/2018-09-11_165957.png" alt="" /><br /><br />
												</div>
												<span style="color:#2B626F;">¥260</span>
												<div class="buy">
													<a href="#">立即购买</a>
												</div>
											
											 </div>
											
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
									</div>
			
';
	}
			 else{
			echo '<div class="nobox">
							<div class="cart-left1">
									<div class="cart-left-header">
										<ul class="header-ul">
											<table class="header-table" cellpadding="0"cellspacing="0">
												<tr>
													<td class="header-td-one"><span class="font-greya">我的购物袋</span></td>
													<td class="header-td-two"><span class="font-greyb">支付及物流</span></td>
													<td class="header-td-three"><span class="font-greyb">成功提交订单</span></td>
												</tr>
											</table>
										</ul>
									</div>
									<div class="nonething">您的购物袋是空的，立即购买您喜欢的产品。</div>
									<a href="index.v.php" class="balance1"><span>继续购物</span></a>
							</div>
							<div class="cart_right">
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
					';
		}
		}	
		else{
			echo '<div class="nobox">
							<div class="cart-left1">
									<div class="cart-left-header">
										<ul class="header-ul">
											<table class="header-table" cellpadding="0"cellspacing="0">
												<tr>
													<td class="header-td-one"><span class="font-greya">我的购物袋</span></td>
													<td class="header-td-two"><span class="font-greyb">支付及物流</span></td>
													<td class="header-td-three"><span class="font-greyb">成功提交订单</span></td>
												</tr>
											</table>
										</ul>
									</div>
									<div class="nonething">您的购物袋是空的，立即购买您喜欢的产品。</div>
									<a href="index.v.php" class="balance1"><span>继续购物</span></a>
							</div>
							<div class="cart_right">
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
					';
		}
?>
	

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
<script src="js/jquery/2.0.0/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script>
// 	function add(q){
// 		var old_num=document.getElementById("good_num").value;
// 		var new_num=parseInt(old_num)+1;
// 		document.getElementById("good_num").value=new_num;
// 	}
// 	function del(q){
// 		var old_num=document.getElementById("good_num").value;
// 		var new_num=parseInt(old_num)-1;
// 		document.getElementById("good_num").value=new_num;
// 		if(new_num<1){
// 			alert("数量最少为1！");
// 			document.getElementById("good_num").value=1;
// 		}
// 	}
function del_goods($id){
			if (confirm("你确定删除吗？")) { 
					$.ajax({
							url:"../api/index1.api.php?act=del",
							type:"get",
							dataType:"json",
							data:{"shop_id":$id},
							success:function(data){
								console.log(data);
								// alert("已添加到购物袋！");
								window.location.reload();
								// window.location.href='bio-shoppingcart.php';
							}
					})
      }  
			else {  
					 
			}  
}

	function del($id){
			$.ajax({
					url:"../api/index1.api.php?act=shop",
					type:"get",
					dataType:"json",
					data:{"shop_id":$id},
					success:function(data){
						console.log(data);
							window.location.reload();
							// alert("什么贵！");
					}
			})
			// alert("已添加到购物袋！");
	}
	function add($id){
			$.ajax({
					url:"../api/index1.api.php?act=shop1",
					type:"get",
					dataType:"json",
					data:{"shop_id":$id},
					success:function(data){
						console.log(data);
						// alert("已添加到购物袋！");
						window.location.reload();
						// window.location.href='bio-shoppingcart.php';
					}
			})
			// alert("已添加到购物袋！");
	}
// 	function add(q){
// 		var good_num = $(q).parent().find('input[class*=text_box]');
// 		var old_num = $(good_num).val();
// 		var new_num=parseInt(old_num)+1;
// 		$(good_num).val(new_num);
// 		var one_price=$(q).parent().parent().find(".product-price span").text();
// 		var new_money=parseInt(one_price)*parseInt((good_num).val());
// 		var total_price = $(q).parent().parent().find(".font-total-price span");
// 		$(total_price).text(new_money);
// 		var a= $(".font-total-price span");
// 		var m=0;
// 		for(var i=0;i<a.length;i++){
// 			m+=Number(a[i].textContent);
// 		}
// 		$("#all_price").text("￥"+m); 
// 		$("#all_total_price").text("￥"+m);
// 	}
// 	function del(q){
// 		var good_num = $(q).parent().find('input[class*=text_box]');
// 		var old_num = $(good_num).val();
// 		var new_num=parseInt(old_num)-1;
// 		$(good_num).val(new_num);
// 		if(new_num<1){
// 				alert("再减就没有了！");
// 				$(good_num).val(1);;
// 		}
// 	var one_price=$(q).parent().parent().find(".product-price span").text();
// 	var new_money=parseInt(one_price)*parseInt((good_num).val());
// 	var total_price = $(q).parent().parent().find(".font-total-price span");
// 	$(total_price).text(new_money);
// 	var a= $(".font-total-price span");
// 	var m=0;
// 	for(var i=0;i<a.length;i++){
// 		m+=Number(a[i].textContent);
// 	}
// 	$("#all_price").text("￥"+m); 
// 	$("#all_total_price").text("￥"+m);
// 	}
	
</script>