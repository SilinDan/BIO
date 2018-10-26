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
	<title>收货地址</title>
    <link rel="stylesheet" type="text/css" href="./css/bio-shoppingcart.css">
    <link rel="stylesheet" type="text/css" href="./css/payment_layout.css">
    <link rel="stylesheet" type="text/css" href="./css/payment-right-layout.css">
    <link rel="stylesheet" type="text/css" href="./css/payment-left-layout.css">
    <link rel="stylesheet" type="text/css" href="css/user_imformation.css"/>
	<script language="javascript" src="./js/addressClass.js"></script>
    <script type="text/javascript" src="./js/myAddress.js"></script>
    <script type="text/javascript" src="./js/bio-header.js"></script>
    <script type="text/javascript" src="./js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="./js/bio-shoppingcart_2.js"></script>
    <style type="text/css">
		.check_box a,body,select{font-size:12px;text-decoration:none;width: 100px;height: 40px;}

		.check_box a,pre{color:#808080;}
		
		#ok_form2{
			display: none;
		}
		.save_add{
			height: 35px;
			width: 80px;
			border: 1px solid #2b626f;
			background: #2b626f;
			color: #fff;
		}
		.save_add1{
			height: 35px;
			width: 80px;
			border: 1px solid #2b626f;
			background: #fff;
			color: #2b626f;
		}
		.tips{
			color: #f00;
		}
    </style>
</head>
<body>
	<div id="opacity" class="hello"></div><!-- 用于弹出隐藏框时暗化背景 -->
	<div id="opacity2" class="hello"></div><!-- 用于弹出隐藏框时暗化背景 -->
	<div style="width: 1600px;height: 2000px;margin-left: 20%;">
	<div class="header">
	    <div class="header_content">
	    	<a href="index.v.php"><img src="./images/header_logo.png" title="Biotherm碧欧泉官方网上商城"></a>
	    	<span class="header_text">官方订购热线：4008215518
            <br/>
            顾客关怀中心：4008215215</span>
	    </div>
	</div>
	<div id="addressAdd" class="address-add">
		<div class="address-add-content">
			<div class="address-add-close">
				<a href="#" onclick="addressAddClose()"><span class="close-dialog">×</span></a>
			</div>
			<div class="address-add-contentMin">
				<div class="address-add-title">
					<span class="font-grey1 font-size4">添加新地址</span>
				</div>
				<div class="address-add-tips">
					<span class="font-grey1 font-size3">*为必填项</span>
				</div>
				<div class="address-add-item">
					<form id="userAddressAdd" method="post" action="../api/information.api.php?act=info">
						<div class="address-add-item-box">
							<div class="address-add-item-left">
								<input type="text" placeholder="您的姓名*" id="name" name="name" value="" class="input-normal" maxlength="20" onblur="checkName()"><br/>
								<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-name"></div>
								<input type="text" placeholder="您的手机*" id="phone" name="phone" value="" class="input-normal" onblur="checkPhone()"><br/>
								<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-phone"></div>
								<input type="text" placeholder="固定电话" id="telephone" name="telephone" value="" class="input-normal" onblur="checkTelephone()"><br/>
								<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-telephone"></div>
							</div>
							<div class="address-add-item-right1">						
								<select name="province3"></select>
								<select name="city3"></select>
								<select name="area3"></select>
								<script language="javascript" defer>
					
							
					
									new PCAS("province3","city3","area3");
					
								</script>
								<input type="text" placeholder="地址*" id="address" name="address" value="" class="input-normal" onblur="checkAddress()"><br/>
								<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-address"></div>
								<input type="text" placeholder="邮编*" id="postal" name="postal" value="" class="input-normal" maxlength="6" onblur="checkPostal()"><br/>
								<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-postal"></div>
							</div>
						</div>
						<div class="address-add-confirm">
							<input type="submit" name="" value="确认并保存" onclick="return checkInput()" class="submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div id="addressAdd2" class="address-add">
		<div class="address-add-content">
			<div class="address-add-close">
				<a href="#" onclick="addressAddClose2()"><span class="close-dialog">×</span></a>
			</div>
			<div class="address-add-contentMin">
				<div class="address-add-title">
					<span class="font-grey1 font-size4">修改地址</span>
				</div>
				<div class="address-add-tips">
					<span class="font-grey1 font-size3">*为必填项</span>
				</div>
				<div class="address-add-item">
					
					<form id="userAddressAdd" method="post" action="../api/information.api.php?act=alter">
						<div class="address-add-item-box">
							<div class="address-add-item-left">
								<input type="text" placeholder="您的姓名*" id="name2" name="name2" value="" class="input-normal" maxlength="20" onblur="checkName2()"><br/>
								<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-name" id="tips-name2"></div>
								<input type="text" placeholder="您的手机*" id="phone2" name="phone2" value="" class="input-normal" onblur="checkPhone2()"><br/>
								<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-phone" id="tips-phone2"></div>
								<input type="text" placeholder="固定电话" id="telephone2" name="telephone2" value="" class="input-normal" onblur="checkTelephone2()"><br/>
								<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-telephone" id="tips-telephone2"></div>
							</div>
							<div class="address-add-item-right1">						
								<select name="province2" id="province2"></select>
								<select name="city2" id="city2"></select>
								<select name="area2" id="area2"></select>
								<script language="javascript" defer>
					
							
					
									new PCAS("province2","city2","area2");
					
								</script>
								<input type="text" placeholder="地址*" id="address2" name="address2" value="" class="input-normal" onblur="checkAddress2()"><br/>
								<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-address" id="tips-address2"></div>
								<input type="text" placeholder="邮编*" id="postal2" name="postal2" value="" class="input-normal" maxlength="6" onblur="checkPostal2()"><br/>
								<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-postal" id="tips-postal2"></div>
								<input  style="display: none;"  type="password" id="user_id2" name="user_id2"><br/>
							</div>
						</div>
						<div class="address-add-confirm">
							<input type="submit" name="" value="确认并保存" onclick="return checkInput2()" class="submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="cart">
      <div class="cart_content">
      	 <div class="cart_contentleft">     
                <div class="primary">
		          <div class="cart-left">
		            <div class="cart-left-header">
						<ul class="header-ul">
							<table class="header-table" cellpadding="0" cellspacing="0">
								<tr>
									<td class="header-td_one"><span class="font-greyb">我的购物袋</span></td>
									<td class="header-td_two"><span class="font-greya">支付及物流</span></td>
									<td class="header-td_three"><span class="font-greyb">成功提交订单</span></td>
								</tr>
							</table>
						</ul>
					</div>
			<div>
				<span class="checkout_step_title">支付与交流</span>
			</div>
		</div>
		
		<?php
				$user_phone = $_SESSION['logname'];
				$ikum = $shop->checkUserName($user_phone);//获取整条用户的信息
				$id = $ikum[0]['id'];
				$ikum = $shop->checkShop($id);//获取整条购物车的信息
				$shop_sum = sizeof($ikum);
				
				$yuki = $shop->checkInformation($id);
				$in_num = sizeof($yuki);
				
				if($in_num==0){
					echo '
									<div class="receipt_information">
											<div class="recipt_sh">
												<span>收货及配送信息</span>
											</div>
											<div class="recipt_top">
												<div class="recipt_title">
													<h5>收货人信息</h5>
												</div>
												<div class="recipt_top_left">
													<a href="">使用新地址</a>
												</div>
												<div class="recipt_top_right">
													<span>(*为必填项)</span>
												</div>
											</div>
											<div class="input_demo">
											<form method="post" class="form-x" action="../api/information.api.php?act=information">
												<div class="left_input">
													姓名*<br />
													<input class="input_wh" type="text" name="user_name" maxlength="20"/>
													<span class="tips" name="user"></span>
												</div>
												<div class="right_input">
													您的手机*<br />
													<input type="text" class="input_wh" name="user_phone" placeholder="例如：13800000000 " maxlength="11"/><br />
													<span class="tips" name="phone"></span>
												</div>
											</div>
											<div class="input_demo">
												<div class=left_input>
													<div class="check_box">
														<div class="check_box_add">	
															省份*<br />
															<select name="province1"></select>
														</div>
														<div class="check_box_add">
															城市*<br />
															<select name="city1"></select>
														</div>
														<div class="check_box_add">
															区*<br />
															<select name="area1"></select><br>
														</div>
													</div>
												</div>
											<script language="javascript" defer>
								
										
								
												new PCAS("province1","city1","area1");
								
											</script>
												<div class="right_input">
													邮编*<br />
													<input class="input_wh" type="text" name="user_post" maxlength="6"/>
													<span class="tips" name="email"></span>
												</div>
											</div>
											<div class="input_demo">
												<div class="left_input">
													详细地址*<br />
													<input class="input_wh" type="text" name="detailed_add" maxlength="100"/>
													<span class="tips" name="add"></span>
												</div>
												<div class="right_input">
													固定电话<br />
													<input class="input_wh" type="text" name="user_tel" placeholder="例如：021-62010000 " maxlength="20"/>
												</div>
											</div>
										</div>
										<div class="save_box">
											<input type="submit" class="save" value="保存"/>
										</div>
										</form>
											<div class="cart_coupon">
										<div class="cartcoupon_content">
					';
				}
				else{
						echo '
								<div class="cart_coupon">
							<div class="cartcoupon_content">
								<table class="invioce_form1">
									<tr>
											<td class="topic"><span class="carttopic_font">收货及配送信息</span></td>
											<td></td>
											<td></td>
											
									</tr>
								</table>';
					echo'		<table class="invioce_form" id="invioce_form1">
												<tr>
														<td width="5%"></td>
														<td class="topic1"><span class="carttopic_font">收货人信息</span></td>
														<td><span class="carttopic_font">地址</span></td>
														<td><span class="carttopic_font">邮编</span></td>
														<td><span class="carttopic_font">手机</span></td>
														<td></td>
												</tr>';
													echo '<tr><td width="5%"></td>
																		<td class="topic1"><span name="c_username" id="c_username" class="carttopic_font1">';
													echo $yuki[0]['user_name'];
													echo '		</span><span id="c_userid" name="c_userid" style="display:none;">';
													echo $yuki[0]['user_id'];
													echo '</span></td>
																		<td width="200px">
																			<span id="c_pro" name="c_pro" class="carttopic_font1">';
													echo $yuki[0]['province3'];
													echo '			</span>
																			<span id="c_city" name="c_city" class="carttopic_font1">';
													echo $yuki[0]['city3'];
													echo '			</span>
																			<span id="c_area" name="c_area" class="carttopic_font1">';
													echo $yuki[0]['area3'];
													echo '			</span><span id="c_del" name="c_del" class="carttopic_font1">';
													echo $yuki[0]['detailed_add'];
													echo '			</span>
																		</td>
																		<td width="70px"><span id="c_post" name="c_post" class="carttopic_font1">';
													echo $yuki[0]['user_post'];
													echo '	</span></td>
																<td width="100px"><span id="c_phone" name="c_phone" class="carttopic_font1">';
													echo $yuki[0]['user_phone'];
													echo '</span></td>
																<td><span class="carttopic_font1" id="update" onclick="changeAdd(this)">修改> </span></td>
														</tr>';
											echo '
								</table>
								
								<table class="invioce_form" style="display:none;" id="invioce_form2">
												<tr>
														<td width="5%"></td>
														<td class="topic1"><span class="carttopic_font">收货人信息</span></td>
														<td><span class="carttopic_font">地址</span></td>
														<td><span class="carttopic_font">邮编</span></td>
														<td><span class="carttopic_font">手机</span></td>
														<td></td>
												</tr>';
												for ($i=0; $i < $in_num; $i++) {
													echo '<tr onclick="checkhang(this)">';
																if($i==0){
																		echo '<td width="5%"><input type="checkbox" checked="checked" name="list[]" /></td>';
																}
																else{
																	echo '<td width="5%"><input type="checkbox" name="list[]" /></td>';
																}
													
													echo	'<td class="topic1"><span name="d_name" class="carttopic_font1">';
																echo $yuki[$i]['user_name'];
																echo '</span><span id="d_userid" name="d_userid" style="display:none;">';
																echo $yuki[$i]['user_id'];
																echo '</sapn></td>
																<td width="200px"><span name="d_address" class="carttopic_font1">';
																echo $yuki[$i]['province3'].$yuki[$i]['city3'].$yuki[$i]['area3'].$yuki[$i]['detailed_add'];
																echo '</span></td>
																<td><span name="d_post" class="carttopic_font1">';
																echo $yuki[$i]['user_post'];
																echo '</span></td>
																<td><span name="d_phone" class="carttopic_font1">';
																echo $yuki[$i]['user_phone'];
																echo '</span></td>
																<td><span class="carttopic_font1" onclick="infoUpdate(';
																echo $yuki[$i]['user_id'];
																echo ')">修改> </span><span class="carttopic_font1" onclick="del_user(';
																echo $yuki[$i]['user_id'];
																echo ')">删除> </span></td>
														</tr>';
												}
											echo '<tr><td></td><td class="topic1">
															<a href="#" style="text-decoration: underline;color:#535355;" onclick="addressAdd()">	
																<span class="carttopic_font1">添加新地址> </span> 
															</a>
														</td><td colspan="4"></td></tr>
														<tr><td class="topic1"></td>
																<td colspan="2">
																	<input class="save_add" id="save_add" onclick="saveAdd()" type="button" value="保存">
																	<input class="save_add1" id="kanso" type="button" onclick="kanso()" value="取消">
																</td>
														</tr>
								</table>
						';
				}
		?>
										
										<table class="invioce_form" id="invioce_form3">
											<tr>
															<td class="topic" style="width: 680px;" colspan="2"><span class="carttopic_font">给我们留言</span></td>
												<td><input class="message_box" id="message" onclick="message()" type="button" name="massage" value=""></td>
												
											</tr>
											<tr>
												<td style="font-size: 1.3rem;padding-left: 10px; height: 30px; width: 680px;" colspan="2" >
													<span id="messok" name="messok"></span>
												</td>
											</tr>
										</table>
										<table class="invioce_form" id="invioce_form4" style="display: none;">
											<tr>
															<td class="topic" style="width: 680px;" colspan="2"><span class="carttopic_font">给我们留言</span></td>
												<td><input class="message_box" id="message1" onclick="message1()" type="button" name="massage" value=""></td>
												
											</tr>
											<tr>
												<td style="color: #2B626F;padding-left: 20px;" class="carttopic_font1">您的留言</td>
												<td width="150px"></td>
												<td class="carttopic_font2">您可以输入<span class="geshu">100</span>个字</td>
											</tr>
											<tr><td colspan="3"><textarea name="message_text" id="message_text" class="message_text" type="text"></textarea></td></tr>
											<tr>
												<td></td>
												<td></td>
												<td><input type="button" onclick="messageSave()" id="message_save" class="message_save" value="保存"></td>
											</tr>
										</table>
										
										<table class="invioce_form" id="invioce_form5">
											<tr>
															<td class="topic" style="width: 680px;"><span class="carttopic_font" >发票信息</span></td>
												<td ></td>
												<td><input class="message_box" id="invoice" onclick="invoice()"  type="button" name="invoice" value=""></td>
												
											</tr>
											<tr>
												<td style="font-size: 1.3rem; padding-left: 10px; height: 30px; width: 680px;" colspan="2" >
													<span id="invok" name="invok"></span><span id="invok1" name="invok1"></span>
												</td>
											</tr>
										</table>
										
										<table class="invioce_form" id="invioce_form6" style="display: none;">
											<tr>
															<td class="topic" style="width: 680px;"><span class="carttopic_font" >发票信息</span></td>
												<td ></td>
												<td><input class="message_box" id="invoice1" onclick="invoice1()"  type="button" name="invoice1" value=""></td>
												
											</tr>
											<tr>
												<td style="color: #2B626F;padding-left: 20px;" class="carttopic_font1">*发票类型
														<select style="height: 30px;" name="xuanze" id="xuanze" >
																<option name="only" id="only" value="个人" onclick="seleinvo1()" >个人</option>
																<option name="all" id="all" value="公司" onclick="seleinvo()">公司</option>
														</select>
												</td>
												<td width="150px" id="d_company" class="carttopic_font2" style="display: none;">*公司名称<input type="text" id="company" name="company"></td>
												<td class="carttopic_font2"><input type="button" onclick="invoSave()" id="invo_save" class="message_save" value="保存"></td>
											</tr>
											<tr>
												<td ></td>
												<td class="carttopic_font2" id="d_number" style="display: none;">*缴纳识别号<input type="text" id="c_number" name="c_number"></td>
												<td></td>
												
											</tr>
										</table>
												
										<div class="pay_form">
												
													<span class="carttopic_font">支付方式</span><br/>
													
												<div class="pay_way">
												在线支付 ( 运费 ¥0 )
												<br/>
												<img style="margin-right: 5px;" src="./images/check.png">
												<img style="margin-right: 20px;" src="./images/login-icon-alipay.png"><a href="">查看更多付款方式></a><br/>
												货到付款  ( 运费 ¥0 )
											</div>
		
		
									</div>
									
										<table class="price_form">
											<tr>
															<td style="width: 300px;height: 100px;"></td>
												<td style="color: #535355;font-size: 14px;">商品价格：<br/>
												运费：</td>
											<?php 
													$sum =0;
													for($i=0; $i < $shop_sum; $i++){
														$id = $ikum[$i]['goods_id'];
														$roy = $shop->checkGood($id);//获取整条商品的信息
														$single_sum = $roy[0]['goods_price']*$ikum[$i]['shop_num'];
														$sum += $single_sum;
													}
													echo '<td><span id="sum_price" name="sum_price" class="amount">';
													echo $sum;
													echo '</span><span class="amount">¥</span><br/><br/>
																		<span class="amount">¥0</span></td>
																		
																	</tr>
																</table>
								
															<table class="total_form">
																	<tr>
																					<td style="width: 235px;font-size: 18px;color: #535355">总计：</td>
																		<td><span class="amount">¥';
													echo $sum;
													echo '</span></td>';
											?>
												
		
											</tr>
										</table>
										<div class="cart_coupon_botton">
										
										<input id="submit_imm" type="button" onclick="getAll()" class="submit_imm" value="提交订单">
									</div>
								</div>
		
							</div>
	</div>


   </div>
   
      	<div class="cart_contentright">	
				<div class="payment-right">
					<div class="order-summary">
						<div class="order-summary-content">
				
							<div class="order-summary-detail">
								<div class="order-summary-title">订单总结</div>
								<div class="product-number-total">购物袋有
								<span class="span-number-blue">
								<?php
									echo $shop_sum;
								?></span>件产品</div>
								<a href="" class="a-esc-amend"> 返回修改></a>
							</div>
							
							<?php
										for ($i=0; $i < $shop_sum; $i++) {
											$id = $ikum[$i]['goods_id'];
											$roy = $shop->checkGood($id);
												echo '<div class="order-product">
																<div class="order-product-content">
																	<div class="order-product-image">
																		<a href=""><img src="./images/goods/';
												echo  $roy[0]['goods_img'];
												echo '" class="image-BIO10009_1"></a>
																</div>
																<div class="order-product-detail">
																	<div class="product-name">';
												echo  $roy[0]['goods_name'];
												echo '</div><div class="product-spec">规格 ';
												echo  $roy[0]['goods_size'];
												echo 'ml中性</div>
															<div class="product-number">数量 <span>';
												echo	$ikum[$i]['shop_num'];
												echo '</span></div></div>
															<div class="order-product-price">¥';
												echo  $roy[0]['goods_price'];
												echo '</div></div></div>';
										}
										echo '<div class="product-price-freight">
														<div class="product-price-totil">
															<div class="term-script">商品价格：</div>
															<div class="term-price">¥';
										
										echo $sum;
										echo '</div>
														</div>
														<div class="product-freight">
															<div class="term-script">运费：</div>
															<div class="term-price">¥0</div>
														</div>
													</div>

													<div class="order-product-total-price">
														<div class="term-total">总计：</div>
														<div class="term-total-price">¥';
										echo $sum;
										echo '</div>
													</div>
												</div>';
							?>
							
							

						<div class="empty-div"></div>

						<div class="order-footer">
							<div class="order-footer-content">
								<div class="term-contaction">联系我们<a href="" class="a-help-center">帮助中心></a></div>
								<p>我们提供一周7天服务</p>
								<p>（9:00 - 21:00）</p>
								<p>官网订购热线：4008215518</p>
								<p>顾客关怀中心：4008205215</p>
								<p>欧莱雅中国有限公司</p>
								<p>地址：上海市静安区南京西路1601号</p>
							</div>
						</div>

					</div>
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
	</div>
</body>
</html>
<!-- <script src="js/jquery/2.0.0/jquery.min.js" type="text/javascript" charset="utf-8"></script> -->
    <script type="text/javascript" src="./js/jquery-3.3.1.js"></script>
		<script>
			
 function del_user($id){
	if (confirm("你确定删除吗？")) { 
					$.ajax({
							url:"../api/index1.api.php?act=uid",
							type:"get",
							dataType:"json",
							data:{"user_id":$id},
							success:function(data){
								console.log(data);
								// alert("已添加到购物袋！");
								window.location.reload();
								// window.location.href='bio-shoppingcart.php';
							}
					})
	}
	else{
		
	}
		// alert($id);
}
function infoUpdate($id){
	
	document.getElementById('addressAdd2').style.display='block';
	document.getElementById('opacity2').style.display='block';
					$.ajax({
							url:"../api/information.api.php?act=show",
							type:"get",
							dataType:"json",
							data:{"user_id":$id},
							success:function(data){
								console.log(data);
									$("#name2").val(data[0].user_name);
									$("#phone2").val(data[0].user_phone);
									$("#telephone2").val(data[0].user_tel);
									$('#province2').append("<option selected = 'selected' value='"+data[0].province3+"'>"+data[0].province3+"</option>");
									$('#city2').append("<option selected = 'selected' value='"+data[0].city3+"'>"+data[0].city3+"</option>");
									$('#area2').append("<option selected = 'selected' value='"+data[0].area3+"'>"+data[0].area3+"</option>");
									$("#address2").val(data[0].detailed_add);
									$("#postal2").val(data[0].user_post);
									$("#user_id2").val(data[0].user_id);
							}
					})
								// alert("已添加到购物袋！");
}
function checkhang(e) {
	if ($(e).find("input[name = 'list[]']").is(":checked")) {
			$(e).find("input[name = 'list[]']").removeAttr("checked");
			
						 // $(":checkbox").not($(e)).removeAttr("checked");
	}
	else{
		// $(e).find("input[name = 'list[]']").prop("checked","checked");
		$(e).find("input[name = 'list[]']").attr("checked","checked");
		$(e).siblings().find("input[name = 'list[]']").removeAttr("checked");
	}
}
function changeAdd(){
	// alert('hi');
	 // $('#update').parent().parent().addClass("#ok_form2");
	// $('#update').parent().parent().attr({'display':'none'});
		$('#update').parent().parent().parent().parent().css("display","none");
		$('#update').parent().parent().parent().parent().parent().find("#invioce_form2").css("display","block");
		
}
function saveAdd(){
	
		if($('#save_add').parent().parent().parent().find("input[name = 'list[]']").is(":checked")){
				// $('#save_add').parent().parent().parent().find("input[checked = 'checked']").css("display","none");
			var name = $('#save_add').parent().parent().parent().find("input[checked = 'checked']").parent().parent().find("span[name = 'd_name']").text();
			var adress = $('#save_add').parent().parent().parent().find("input[checked = 'checked']").parent().parent().find("span[name = 'd_address']").text();
			var post = $('#save_add').parent().parent().parent().find("input[checked = 'checked']").parent().parent().find("span[name = 'd_post']").text();
			var phone = $('#save_add').parent().parent().parent().find("input[checked = 'checked']").parent().parent().find("span[name = 'd_phone']").text();
			var id = $('#save_add').parent().parent().parent().find("input[checked = 'checked']").parent().parent().find("span[name = 'd_userid']").text();
			
		}
		// var info = name+adress+post+phone
		
		$("#c_username").text(name);
		$("#c_del").text(adress);
		$("#c_post").text(post);
		$("#c_phone").text(phone);
		$("#c_userid").text(id);
		
		
		// alert(info);
		$('#save_add').parent().parent().parent().parent().css("display","none");
		$('#save_add').parent().parent().parent().parent().parent().find("#invioce_form1").css("display","block");
// 						$('#update').parent().parent().parent().parent().parent().find("#invioce_form2").css("display","block");
		
}
function kanso(){
		$('#kanso').parent().parent().parent().parent().css("display","none");
		$('#kanso').parent().parent().parent().parent().parent().find("#invioce_form1").css("display","block");
}
function message(){
		$('#message').parent().parent().parent().parent().css("display","none");
		$('#message').parent().parent().parent().parent().parent().find("#invioce_form4").css("display","block");
}
function message1(){
		$('#message1').parent().parent().parent().parent().css("display","none");
		$('#message1').parent().parent().parent().parent().parent().find("#invioce_form3").css("display","block");
}
function messageSave(){
		var text = $('#message_save').parent().parent().parent().parent().find("#message_text").val();
		$("#messok").text(text);
		$('#message_save').parent().parent().parent().parent().css("display","none");
		$('#message_save').parent().parent().parent().parent().parent().find("#invioce_form3").css("display","block");

}
function invoice(){
	$('#invoice').parent().parent().parent().parent().css("display","none");
	$('#invoice').parent().parent().parent().parent().parent().find("#invioce_form6").css("display","block");
}
function invoice1(){
	$('#invoice1').parent().parent().parent().parent().css("display","none");
	$('#invoice1').parent().parent().parent().parent().parent().find("#invioce_form5").css("display","block");
}
function seleinvo(){
			$('#all').parent().parent().parent().find('#d_company').css("display","block");
			$('#all').parent().parent().parent().parent().parent().find('#d_number').css("display","block");
}
function seleinvo1(){
			$('#only').parent().parent().parent().find('#d_company').css("display","none");
			$('#only').parent().parent().parent().parent().parent().find('#d_number').css("display","none");
}
function invoSave(){
		var chal = $('#invo_save').parent().parent().parent().parent().find("#xuanze").val();
		if(chal=='个人'){
				var c = '个人';
				$("#invok").text(c);
			}
		else if(chal=='公司'){
			var a = $('#invo_save').parent().parent().parent().parent().find("#company").val();
			var b = $('#invo_save').parent().parent().parent().parent().find("#c_number").val();
			
			$("#invok").text(a);
			$("#invok1").text(b);
		}
		// $('#invo_save').parent().parent().parent().parent().parent().css("display","none");
	$('#invo_save').parent().parent().parent().parent().parent().find("#invioce_form5").css("display","block");
	$('#invo_save').parent().parent().parent().parent().parent().find("#invioce_form6").css("display","none");
}
function getAll(){
			var a =  $('#submit_imm').parent().parent().parent().find("#c_username").text();
			var b =  $('#submit_imm').parent().parent().parent().find("#c_pro").text();
			var c =  $('#submit_imm').parent().parent().parent().find("#c_city").text();
			var d =  $('#submit_imm').parent().parent().parent().find("#c_area").text();
			var e =  $('#submit_imm').parent().parent().parent().find("#c_del").text();
			var f =  $('#submit_imm').parent().parent().parent().find("#c_post").text();
			var g =  $('#submit_imm').parent().parent().parent().find("#c_phone").text();
			var h =  $('#submit_imm').parent().parent().parent().find("#messok").text();
			var i =  $('#submit_imm').parent().parent().parent().find("#invok").text();
			var j =  $('#submit_imm').parent().parent().parent().find("#invok1").text();
			var k =  $('#submit_imm').parent().parent().parent().find("#sum_price").text();
			var l =  $('#submit_imm').parent().parent().parent().find("#c_userid").text();
			
			var info = a+b+c+d+e+f+g+h+i+j+k;
			
			$.ajax({
								url:"../api/order.api.php?act=add",
								type:"get",
								dataType:"json",
								data:{"a":a,"b":b,"c":c,"d":d,"e":e,"f":f,"g":g,"h":h,"i":i,"j":j,"k":k,"l":l},
								success:function(data){
									console.log(data);
									// alert(data);
									// window.location.reload();
									window.location.href='bio-shoppingcart_3.php?order='+data;
								}
						})
			
			// alert(info)
}

$(function(){
	$("#message_text").keyup(function(){
		
		$(".geshu").text(100-$("#message_text").val().length);

	})
})
		</script>
