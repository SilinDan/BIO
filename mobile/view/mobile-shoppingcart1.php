<?php
    session_start();
    header('Content-type:text/html;charset=utf-8');
		include("../model/Db.class.php");
		include("../controller/shop.class.php");
		$shop = new Shop();
?> 
<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>我的购物袋</title>
  <script src="js/jquery/2.0.0/jquery.min.js" type="text/javascript" charset="utf-8"></script>
  <link rel="stylesheet" type="text/css" href="css/default.css"/>
  <link rel="stylesheet" type="text/css" href="css/mobile-shoppingcart.css"/>
  <link rel="stylesheet" type="text/css" href="css/bootstrap/3.3.6/bootstrap.css"/>
  <script src="js/bootstrap/3.3.6/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
  <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/bootstrap-3.3.4.css">
  <link rel="stylesheet" type="text/css" href="./css/bio-mobile.css">
   <link rel="stylesheet" href="css/style.css">
  
  <style type="text/css">
     .text_box{
       width: 20%;
     }
		 .suredel{
			 height: 100px;
			width: 250px;
			border-radius: 0%;
			background: #fff;
			margin: 0 auto;
			position: absolute;
			left: 20%;
			top: 40%;
			color: #000;
			display: none;
		 }
		 .beijing{
			 height: 100%;
			 width: 100%;
			 background: #000;
			opacity: 0.6;
			position: absolute;
			display: none;
			 
		 }
		 .wenhao{
			 font-size: 1.3em;
			 padding-left: 22%;
			 padding-top: 15px;
		 }
		 .sure{
			 border: 1px solid #2B669A;
			 background: #2B669A;
			height: 35px;
			width: 70px;
			opacity: 1;
			line-height: 35px;
			padding-left: 20px;
			margin-left: 35px;
			float: left;
			color: #fff;
			margin-top: 15px;
		 }

  </style>
</head>

<body>

<div id="beijing" class="beijing"></div>
<div id="suredel" class="suredel">
	<div class="wenhao">你确认要删除吗？<span style="display: none;" id="shopid"></span></div>
	<div class="sure" id="querem" onclick="queRen()">确认</div><div onclick="quXiao()" id="sure" class="sure">取消</div>
</div>
<div class="cart_header">
    <a href="default.v.php"><img class="header_logo" src="./images/header_logo.png" title="Biotherm碧欧泉官方网上商城"></a>
    </div>

      <div class="mobile-content" style="background: #fff; min-width:320px ;"> 
                    <div class="mobile-shopping-title">
                      <div class="active">
                        我的购物袋
                      </div>
                      <div class="shopping-title-nav">
                        支付及物流
                      </div>
                      <div class="shopping-title-nav">
                        成功提交订单
                      </div>
                    </div>
        <?php
        	if (isset($_SESSION['logname'])) {
        		$user_phone = $_SESSION['logname'];
        		$ikum = $shop->checkUserName($user_phone);//获取整条用户的信息
        		$id = $ikum[0]['id'];
        		$ikum = $shop->checkShop($id);//获取整条购物车的信息
        		$shop_sum = sizeof($ikum);
        		// print_r($ikum);
        		
        		if($shop_sum!=0){
        				echo '
        						<div class="cart_content">
        																		<a href="default.v.php" class="continue-shopping"><span class="font-greyc">继续购物></span></a>
        										<div class="cart-table">
        											
        												<ul class="cart-ul">'; 
								for ($i=0; $i < $shop_sum; $i++) {
										$id = $ikum[$i]['goods_id'];
										$roy = $shop->checkGood($id);//获取整条商品的信息
										
										echo '<li class="cart-li">
														<table class="cart-table-content" cellpadding="0" cellspacing="0">
															<tr>
																<td class="cart-table-content-td1"><a href="mobile-detail-bio.php?id=';
										echo  $roy[0]['goods_id'];
										echo '"><img style="height:80px;width:80px;" src="images/';
										echo  $roy[0]['goods_img'];
										echo 				'"></a></td>
						
																<td class="cart-table-content-td2">
																	<div class="product-subtitle">';	
																	echo  $roy[0]['goods_name'];
																	echo 				'</div>
						
																	<div class="sttribute-size">';
																	echo  $roy[0]['goods_size'];
																	echo 				'ml</div>
						
																	<div>
																		<input type="button" value="-" onclick="del(';
																	echo 	$ikum[$i]['shop_id'];
																	echo 								')"/>
																		<input type="text" class="text_box" value="';
																	echo								$ikum[$i]['shop_num'];
																	echo 								'" />
																		<input type="button" value="+" onclick="add(';
																	echo	$ikum[$i]['shop_id'];
																	echo 					')"/>
																	</div>
						
																	<div class="product-price">¥<span>';
																	echo  $roy[0]['goods_price'];
																	echo 				'</span></div>
						
																	<div class="delete-div"><a href="#" id="a-delete"  class="a-delete" onclick="del_goods(';
																	echo  $ikum[$i]['shop_id'];
																	echo						')">删除</a></div>
																</td>
						
																<td class="cart-table-content-td3">
																	<div class="product-total-price">
																		<div class="font-total-price">¥<span>';
																	echo  $roy[0]['goods_price']*$ikum[$i]['shop_num'];
																	echo 			   		'</span></div>
																	</div>
																	<div class="product-repertory">
																		<span>有库存</span>
																	</div>
																</td>
						
															
												
															</tr>
														</table>
													</li>';
								}
								echo '	
														</ul>
													</div>
								
								
								
												<div class="promotion-message">
														<div class="promotion-title">
															<span class="font-promotion-title">#秋季化妆品盛典#<br/>9.11-9.20<br/></span>
														</div>
														<br/>
														<div class="promotion-part">
														
															<div class="promotion-describe">
																<ul class="promotion-describe-ul">
																	<li class="promotion-describe-li">
																		<br/>
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
																		<td style="width:45%;color: #535355;font-size: 14px;">商品价格：<br/>
																		运费：
																		</td>
																		<td>
																		<span class="amount" id="all_price">¥'; 
															$sum =0;
															for($i=0; $i < $shop_sum; $i++){
																$id = $ikum[$i]['goods_id'];
																$roy = $shop->checkGood($id);//获取整条商品的信息
																$single_sum = $roy[0]['goods_price']*$ikum[$i]['shop_num'];
																$sum += $single_sum;
															}
															echo $sum;
															echo '</span><br/>
																		<span class="amount">¥0</span>
																	</td>
																	</tr>
																</table>
															<table class="total_form">
																	<tr>
																			<td style="width: 230px;font-size: 18px;color: #535355;">总计：</td>
																		<td><span class="amount" id="all_total_price">¥'; 
															echo $sum;
															echo '</span></td>
								
																	</tr>
																</table>
														</div>
								
																<div class="points">
																	<div class="points">
																	<span class="points_text"><img src="./images/points.png" center>积分奖励：恭喜您获得
																	<span class="amount_pionts" id="all_total_points">';
															echo $sum;
															echo '</span>积分<br/><span style="color:#ccc; font-size: 12px;">*该积分为常规积分，不包括特殊活动和促销</span></span>
																	
																</div></div>
															
													</div> 
															
										
								</div>
        				';
								echo '
									<div class="mobile-footer-call">
													<span>官方订购热线：400 821 5518</span>  
										 </div>

											<div class="mobile-shopping-footer">
											 
												<div class="mobile-payfornow">
													<span>总计:¥</span>
													<span id="price_sum_up">'; 
										echo $sum;
										echo '</span>
													<a href="mobile-shoppingcart2.php"><button>立即结算</button></a>
												</div>
											</div>
								';
        		}
        		else{
        			echo '<div class="shopping-goods">
        							<h2>我的购物袋</h2>
        							<div class="shopping-null">
        									<span>您的购物袋是空的,立即购买您喜欢的产品。</span><br>
        									<a href="default.v.php" class="keep-shopping">继续购物></a>
        							</div>
        						</div>
        						<div class="mobile-shopping-footer">
        							<div class="mobile-footer-call">
        								<span>官方订购热线：400 821 5518</span>	
        							</div>
        							<div class="mobile-payfornow">
        								<span>总计：￥0</span>
        								<a href="default.v.php"><button>继续购物</button></a>
        							</div>
        						</div>';
								
													echo '
														<div class="mobile-footer-call">
																		<span>官方订购热线：400 821 5518</span>  
															 </div>
								
																<div class="mobile-shopping-footer">
																 
																	<div class="mobile-payfornow">
																		<span>总计:¥</span>
																		<span id="price_sum_up">0</span>
																		<a href="default.v.php"><button>继续购物</button></a>
																	</div>
																</div>
													';
        		}
        		
        	}
					else{
						echo '<div class="shopping-goods">
										<h2>我的购物袋</h2>
										<div class="shopping-null">
												<span>您的购物袋是空的,立即购买您喜欢的产品。</span><br>
												<a href="default.v.php" class="keep-shopping">继续购物></a>
										</div>
									</div>
									<div class="mobile-shopping-footer">
										<div class="mobile-footer-call">
											<span>官方订购热线：400 821 5518</span>	
										</div>
										<div class="mobile-payfornow">
											<span>总计：￥0</span>
											<a href="default.v.php"><button>继续购物</button></a>
										</div>
									</div>';
					echo '
						<div class="mobile-footer-call">
										<span>官方订购热线：400 821 5518</span>  
							 </div>

								<div class="mobile-shopping-footer">
								 
									<div class="mobile-payfornow">
										<span>总计:¥</span>
										<span id="price_sum_up">0</span>
										<a href="default.v.php"><button>继续购物</button></a>
									</div>
								</div>
					';
					}
        ?>
       

                
                    
       </div>      

</body>
</html>
</body>
<script src="js/jquery/2.0.0/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script>
function del_goods($id){
		$('#a-delete').parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().find("#beijing").css("display","block");
		$('#a-delete').parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().find("#suredel").css("display","block");
		$('#shopid').text($id);
}
function quXiao(){
	$('#sure').parent().parent().find("#beijing").css("display","none");
	$('#sure').parent().parent().find("#suredel").css("display","none");
}
function queRen(){
	var shopid =  $('#querem').parent().parent().find("#shopid").text();
					$.ajax({
							url:"../api/index1.api.php?act=del",
							type:"get",
							dataType:"json",
							data:{"shop_id":shopid},
							success:function(data){
								console.log(data);
								// alert("已添加到购物袋！");
								window.location.reload();
								// window.location.href='bio-shoppingcart.php';
							}
					})
	// $('#querem').parent().parent().find("#suredel").css("display","none");
	
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
  
</script>
</html>



