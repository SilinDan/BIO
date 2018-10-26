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
	<title>碧欧泉新增地址</title>
    <link rel="stylesheet" type="text/css" href="css/user_imformation.css"/>
    <link rel="stylesheet" type="text/css" href="./css/biotherm_footer1.css">
	<link rel="stylesheet" type="text/css" href="./css/header -80percentage.css">
	<link rel="stylesheet" type="text/css" href="./css/header1.css">
	<link rel="stylesheet" type="text/css" href="./css/bio_detailed1.css">
	<link rel="stylesheet" type="text/css" href="./css/bio_try.css">
	<script language="javascript" src="./js/addressClass.js"></script>
    <script type="text/javascript" src="./js/myAddress.js"></script>
    <script type="text/javascript" src="./js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="./js/bio-header.js"></script>
    <script src="js/shopUpDown.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/E-zine.css">
	<script type="text/javascript" src="./js/E-zine.js"></script>
    
	<style type="text/css">
		
   </style>

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
<div id="opacity" class="hello"></div><!-- 用于弹出隐藏框时暗化背景 -->
<div id="opacity2" class="hello"></div><!-- 用于弹出隐藏框时暗化背景 -->
	         
	<!-- 引入头部 -->
	<?php
	include("./header/headerNavigation.php");
	?>

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
						<span class="split-line-text1">我的地址簿</span>
						<span class="split-line1"></span>
					</div>
					<div class="content-orderNum">
						
						<div class="content-textList">
							<div class="content-newAddress">
								<a href="#" onclick="addressAdd()">添加新地址</a>
							</div>
							
							<?php
							
								if(isset($_SESSION['logname'])) {
									$user_phone = $_SESSION['logname'];
									$ikum = $shop->checkUserName($user_phone);//获取整条用户的信息
									$id = $ikum[0]['id'];
									$yuki = $shop->checkInformation($id);//获取整条information的信息
									$in_sum = sizeof($yuki);
									
										if($in_sum==0){
											echo '<p class="font-grey1 font-size3">您还没有任何收货地址</p></div>';
										}
										else{
											for ($i=0; $i < $in_sum; $i++) {
												echo  '<div class="addin_box">
																 <div>';
												echo        $yuki[$i]['user_name'];
												echo		 '</div><div>';
												echo        $yuki[$i]['province3'].'  '.$yuki[$i]['city3'].'  '.$yuki[$i]['area3'];
												echo   ' 	</div><div>';
												echo        $yuki[$i]['detailed_add'];
												echo   ' 	</div><div>邮政编码: ';
												echo    		$yuki[$i]['user_post'];
												echo   '	</div><div>手机号码: ';
												echo 				$yuki[$i]['user_phone'];
												echo   '</div><div>固定电话: ';
												echo   			$yuki[$i]['user_tel'];
												echo   '</div><div class="content-newAddress1">
																		<a onclick="del_user(';
												echo 				$yuki[$i]['user_id'];
												echo 			')" href="#">删除</a>
																	</div>
																	<div class="content-newAddress2">
																		<a onclick="infoUpdate(';
												echo 				$yuki[$i]['user_id'];
												echo 			')" href="#">编辑</a>
																	</div>
															 </div>';
											}
										}
								}
							
							?>
							
							
					</div>
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
</script>