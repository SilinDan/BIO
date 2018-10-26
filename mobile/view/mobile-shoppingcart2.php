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
	<title>收货地址- Biotherm碧欧泉中国官方网站_files</title>
	<link rel="stylesheet" href="./css/mobile-shoppingcart2.css" />
	<link rel="stylesheet" type="text/css" href="css/mobile-shoppingcart.css"/>
	<link rel="stylesheet" type="text/css" href="./css/mobile_imformation_myaddress.css">
	<link rel="stylesheet" type="text/css" href="css/delete-box.css"/>
	<script type="text/javascript" src="./js/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="./js/js/mobile-shoppingcart_2.js"></script>
	<script language="javascript" src="./js/js/addressClass.js"></script>
</head>
<style type="text/css">
	body{
		margin: 0;
	}
	.mess_box{
		height: 125px;
		width: 99%;
		margin: 0 auto;
		line-height: 20px;
		border-bottom: 1px solid #CBCBCC;
		margin-top: 10px;
	}
	.mess_box a{
		text-decoration: none;
		color: #535355;
	}
	.mess_box1{
		height: 150px;
		width: 99%;
		margin: 0 auto;
		line-height: 20px;
		margin-top: 10px;
	}
	.mess_box1 a{
		text-decoration: none;
		color: #535355;
	}
	.carttopic_font1{
		float: right;
		margin-right: 5%;
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
	.baocun{
		margin-top: 10px;
		margin-bottom: 10px;
	}
	.address-add-confirm .submit{
	margin-top: 20px;
	}
	.sure{
		width: 55px;
	}
	.mess_all{
		display: none;
	}
	.gobox{
		padding-left: 20px;
	}
</style>
<script>
	
</script>
<body>
	<div id="opacity2" class="hello"></div><!-- 用于弹出隐藏框时暗化背景 -->
	<div id="opacity" class="hello"></div><!-- 用于弹出隐藏框时暗化背景 -->
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
					<span class="font-grey1 font-size3" style="font-size: 0.8rem;line-height: 40px;">*为必填项</span>
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
							<input type="submit" name="" style="margin-top: 0px;" value="确认并保存" onclick="return checkInput()" class="submit">
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
				
					<div class="address-add-title">
						<span class="font-grey1 font-size4">修改地址</span>
					</div>
					<div class="address-add-tips">
						<span class="font-grey1 font-size2">*为必填项</span>
					</div>
					<div class="address-add-item">
						<form id="userAddressAdd" method="post" action="../api/information.api.php?act=alter">
							<div class="address-add-item-box">
								
									<input type="text" placeholder="您的姓名*" id="name2" name="name2" value="" class="input-normal" maxlength="20" onblur="checkName2()"><br/>
									<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-name"></div>
									<input type="text" placeholder="您的手机*:135312345678" id="phone2" name="phone2" value="" class="input-normal" onblur="checkPhone2()"><br/>
									<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-phone"></div>
									<input type="text" placeholder="固定电话:021-12345678" id="telephone2" name="telephone2" value="" class="input-normal" onblur="checkTelephone2()"><br/>
									<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-telephone"></div>
									<input  style="display: none;"  type="password" id="user_id2" name="user_id2"><br/>
									
									
													
									<select id="province2" name="province2"></select>
									<select id="city2" name="city2"></select>
									<select id="area2" name="area2"></select>
									<script language="javascript" defer>
						
								
						
										new PCAS("province2","city2","area2");
						
									</script>
									<input type="text" placeholder="地址*" id="address2" name="address2" value="" class="input-normal" onblur="checkAddress2()"><br/>
									<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-address"></div>
									<input type="text" placeholder="邮编*:523500" id="postal2" name="postal2" value="" class="input-normal" maxlength="6" onblur="checkPostal2()"><br/>
									<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-postal"></div>
							
							</div>
							<div class="address-add-confirm">
								<input type="submit" name="" value="确认并保存" onclick="return checkInput2()" class="submit">
							</div>
						</form>
					</div>
				
			</div>
		</div>
	<div id="beijing" class="beijing"></div>
	<div id="suredel" class="suredel">
		<div class="wenhao">你确认要删除吗？<span style="display: none;" id="shopid"></span></div>
		<a class="sure" href="#" id="querem" onclick="queRen()">确认</a><a href="#" onclick="quXiao()" id="sure" class="sure">取消</a>
	</div>
					
	<div class="shopping_main">
          <div class="cart_header">
     <a href="default.v.php"><img class="header_logo" src="./images/header_logo.png" title="Biotherm碧欧泉官方网上商城"></a>
          </div>

<div class="shopping-container" style="padding-left: 2%;">
	

		<div class="shopping_top">
			<div class="shopping_title">
				<div class="title_1and3"><span>我的购物袋</span></div>
				<div class="title_2"><span>支付及物流</span></div>
				<div class="title_1and3"><span>成功提交订单</span></div>
			</div>
			<div class="title_zfywl">
				<span>支付与物流</span>
			</div>
			<p>收货及配送信息</p>
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
						<div class="shopping_add">
									<p>收货人信息</p>
									<p ><a class=" add_a" href="">使用新地址</a></p>
									<span class="add_span"> (*为必填项)</span>
								<form method="post" class="form-x" action="../api/information.api.php?act=information">
									<div class="add_input" style="margin-top: 2rem">
										姓名* <br />
										<input class="input_demo" name="user_name" id="name" type="text" />
										<span class="tips" name="tips_name"></span>
									</div>
									<div class="add_input">
										您的手机*<br />
										<input class="input_demo" name="user_phone"  id="phone" type="text" placeholder="例如：13800000000 "/>
										<span class="tips" name="tips_phone"></span>
									</div>
									<input type="checkbox"  checked="checked" /><span>将此手机号用作您的注册人手机号</span><br />
						
									<div class="shopping_check_box">
										省份*<br />
										<select name="province1"></select>
									</div>
									<div class="shopping_check_box">
										城市*<br />
										<select name="city1"></select>
									</div>
									<div class="shopping_check_box">
										区*<br />
										<select name="area1"></select>
									</div>
											<script language="javascript" defer>
								
										
								
												new PCAS("province1","city1","area1");
								
											</script>
									<div class="add_input">
										邮编* <br />
										<input class="input_demo" name="user_post" id="email" type="text" />
										<span class="tips" name="tips_email"></span>
									</div>
									<div class="add_input">
										详细地址* <br />
										<input class="input_demo" name="detailed_add" id="add" type="text"  />
										<span class="tips" name="tips_add"></span>
									</div>
									<div class="add_input">
										固定电话 <br />
										<input class="input_demo" name="user_tel" type="text" placeholder="例如：021-62010000 "/>
									</div>
									<input type="submit" class="shopping_bc" value="保存"/>
								</form>
						</div>
					';
				}
				else{
					echo '<div class="shopping_add">
									<strong><p>收货人信息</p></strong>
									<div class="mess_all1" id="mess_all1">';
									echo '<div class="mess_box1"><div name="c_username" id="c_username">'; 
									echo $yuki[0]['user_name'];
									echo '<span id="c_userid" name="c_userid" >';
									echo $yuki[0]['user_id'];
									echo '</span>';
									echo '</div>';
									echo '<div id="c_pro" name="c_pro" style="float:left;margin-right:5px;">'; 
									echo $yuki[0]['province3'];
									echo '</div>';
									echo '<div id="c_city" name="c_city"  style="float:left;margin-right:5px;">'; 
									echo $yuki[0]['city3'];
									echo '</div>';
									echo '<div  id="c_area" name="c_area"  style="margin-right:5px;">'; 
									echo $yuki[0]['area3'];
									echo '</div>';
									echo '<div id="c_del" name="c_del">'; 
									echo $yuki[0]['detailed_add'];
									echo '</div>'; 
									echo '<div id="c_post" name="c_post">'; 
									echo $yuki[0]['user_post'];
									echo '</div>';
									echo '<div id="c_phone" name="c_phone" >'; 
									echo $yuki[0]['user_phone'];
									echo '</div>
												<a href="#" id="update" class="carttopic_font1" onclick="changeAdd()">修改> </a>
												<div style="margin-top:10px;"><a href="#" style="text-decoration: underline;color:#535355;padding-top:5px;" onclick="addressAdd()">	
													<span>添加新地址> </span> 
												</a></div></div>
												</div>
									
								<div class="mess_all" id="mess_all">';
										for ($i=0; $i < $in_num; $i++) { 
												echo '<div class="mess_box" onclick="checkhang(this)"><div name="d_name">'; 
											if($i==0){
													echo '<td width="5%"><input type="checkbox" checked="checked" name="list[]" /></td>';
											}
											else{
												echo '<td width="5%"><input type="checkbox" name="list[]" /></td>';
											}
												echo $yuki[$i]['user_name'];
												echo '</div>';
												echo '<div class="gobox" name="d_pro" style="float:left;margin-right:5px;">'; 
												echo $yuki[$i]['province3'];
												echo '</div>';
												echo '<div id="d_userid" name="d_userid" style="display:none;">';
												echo $yuki[$i]['user_id'];
												echo '</div>';
												echo '<div class="gobox" name="d_city"style="float:left;margin-right:5px;">'; 
												echo $yuki[$i]['city3'];
												echo '</div>';
												echo '<div class="gobox" name="d_area"style="margin-right:5px;">'; 
												echo $yuki[$i]['area3'];
												echo '</div>';
												echo '<div class="gobox" name="d_del">'; 
												echo $yuki[$i]['detailed_add'];
												echo '</div>'; 
												echo '<div class="gobox" name="d_post">'; 
												echo $yuki[$i]['user_post'];
												echo '</div>';
												echo '<div class="gobox" name="d_phone">'; 
												echo $yuki[$i]['user_phone'];
												echo '</div>
															<a href="#" class="carttopic_font1" onclick="del_user(';
												echo $yuki[$i]['user_id'];
												echo ')">删除> </a>
															<a href="#" class="carttopic_font1" onclick="infoUpdate(';
												echo $yuki[$i]['user_id'];
												echo ')">修改> </a></div>';
										}
					
					echo '<div style="margin-top:10px;"><a href="#" style="text-decoration: underline;color:#535355;padding-top:5px;" onclick="addressAdd()">	
									<span>添加新地址> </span> 
								</a></div>
								<div class="baocun">
									<input class="save_add" id="save_add" onclick="saveAdd()" type="button" value="保存">
									<input class="save_add1" id="kanso" type="button" onclick="kanso()" value="取消">
								</div></div></div>';
				}
		?>
		 
		
			<div class="message_board">
				<div class="message_title">
					<div class="title_text"><h4>给我们留言</h4>
						<span id="messok" style="height: 20px;width: 100%;font-size: 0.7rem;"></span>
					</div>
					<div  class="title_choos">
						<button class="none_button" id="note_choose" name="NO"></button>
					</div>
				</div>
				<div class="message_box">
					<div class="message_biaoti">您的留言</div>
					<div class="message_zishu">您还可以输入<span class="geshu">100</span>字</div>
					<div class="message_note"><textarea maxlength="100" name="message_text" id="message_text" cols="35" rows="3"></textarea></div>
					<div class="save_note_box">
						<input type="button" class="save_note" id="save_note" onclick="messageSave()" value="保存" >
					</div>
				</div>
				
			</div>
			<div class="invoice_box">
				<div class="message_title">
					<div class="title_text"><h4>发票信息</h4>
						<span id="invok" style="height: 20px;width: 50%;font-size: 0.7rem;" name="invok"></span>
						<span id="invok1" style="height: 20px;width: 50%;font-size: 0.7rem;" name="invok1"></span>
					</div>
					<div  class="title_choos">
						<button class="invoice_button" id="invoice_choose" name="NO" ></button>
					</div>
				</div>
				<div class="save_invoice_box">
					<div class="invoice_choose" >
						<span style="float: left;">*发票类型 </span><br />
						<select name="invoice" id="invoice" style="float: left;width: 4rem;height: 1.5rem;">
							<option selected="selected" value="个人" >个人</option>	
							<option value="公司">公司</option>	

						</select>
						
					</div>
					<div class="invoice_right">
						<div class="close_all" style="display: none;">
							<span>*公司名称</span>
							<input type="text" id="company" name="company" class="company_name" />
							<span style="color: #f00" class="company_tips" name="company_name"></span>
							<br /><br /><span>*纳税识别号</span>
							<input type="text" id="c_number" name="c_number" class="company_num" />
							<span style="color: #f00" class="num_tips" name="company_name"></span>
						</div>
						<button onclick="invoSave()" id="invo_save" class="save_invoice">保存</button>
					</div>

				</div>
				
			</div>
				
			</div>

		
		<div class="shopping_tail">
			<span class="tail_span"> 支付方式 </span>
			<p class="tail_a"> 在线支付 ( 运费 ¥0 ) </p>		
			<input class="tail_radio" type="radio" name="[]"  checked="checked"/><a class ="tail_pay" href="" > 查看更多支付方式></a><br />
			<div class="div_d"> 
				<input class="tail_radio" type="radio" name="[]" /><a class="tail_a" href="">货到付款</a> <span class="tail_a">( 运费 ¥0 ) </span>	
			</div>
		</div>
</div>
		<div class="tail_foot">
			<span >官方订购热线：400 821 5518</span>
			<div class="jiesuan">
				<?php
					$sum =0;
					for($i=0; $i < $shop_sum; $i++){
						$id = $ikum[$i]['goods_id'];
						$roy = $shop->checkGood($id);//获取整条商品的信息
						$single_sum = $roy[0]['goods_price']*$ikum[$i]['shop_num'];
						$sum += $single_sum;
					}
					echo '总计：¥<span id="sum_price">';
					echo $sum;
					echo '</span>'
				?>
				 <input  id="submit_imm" onclick="getAll()" class="jie_input" type="text" value="立即结算" />
			</div>
		</div>
		
		
	</div>
</body>
</html>
<script>
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
										window.location.href='mobile-shoppingcart3.php?order='+data;
									}
							})
				
				// alert(info)
	}
	function saveAdd(){
	
			if($('#save_add').parent().parent().parent().find("input[name = 'list[]']").is(":checked")){
					// $('#save_add').parent().parent().parent().find("input[checked = 'checked']").css("display","none");
				var name = $('#save_add').parent().parent().parent().find("input[checked = 'checked']").parent().parent().find("div[name = 'd_name']").text();
				var pro = $('#save_add').parent().parent().parent().find("input[checked = 'checked']").parent().parent().find("div[name = 'd_pro']").text();
				var city = $('#save_add').parent().parent().parent().find("input[checked = 'checked']").parent().parent().find("div[name = 'd_city']").text();
				var area = $('#save_add').parent().parent().parent().find("input[checked = 'checked']").parent().parent().find("div[name = 'd_area']").text();
				var del = $('#save_add').parent().parent().parent().find("input[checked = 'checked']").parent().parent().find("div[name = 'd_del']").text();
				var post = $('#save_add').parent().parent().parent().find("input[checked = 'checked']").parent().parent().find("div[name = 'd_post']").text();
				var phone = $('#save_add').parent().parent().parent().find("input[checked = 'checked']").parent().parent().find("div[name = 'd_phone']").text();
				var id = $('#save_add').parent().parent().parent().find("input[checked = 'checked']").parent().parent().find("div[name = 'd_userid']").text();
				
			}
// 			// var info = name+adress+post+phone
// 			
			$("#c_username").text(name);
			$("#c_pro").text(pro);
			$("#c_city").text(city);
			$("#c_area").text(area);
			$("#c_del").text(del);
			$("#c_post").text(post);
			$("#c_phone").text(phone);
			$("#c_userid").text(id);
// 			
// 			
			// alert(name);
			document.getElementById('mess_all').style.display='none';
			document.getElementById('mess_all1').style.display='block';
// 			$('#save_add').parent().parent().parent().parent().parent().find("#invioce_form1").css("display","block");
			
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
	function invoSave(){
			var chal = $('#invo_save').parent().parent().find("#invoice").val();
			// alert(chal)
			if(chal=='个人'){
					var c = '个人';
					$("#invok").text(c);
				}
			else if(chal=='公司'){
				var a = $('#invo_save').parent().parent().find("#company").val();
				var b = $('#invo_save').parent().parent().find("#c_number").val();
				
				$("#invok").text(a);
				$("#invok1").text(b);
			}
// 			// $('#invo_save').parent().parent().parent().parent().parent().css("display","none");
// 		$('#invo_save').parent().parent().parent().parent().parent().find("#invioce_form5").css("display","block");
// 		$('#invo_save').parent().parent().parent().parent().parent().find("#invioce_form6").css("display","none");
	}
	function messageSave(){
		var text = $('#save_note').parent().parent().find("#message_text").val();
		 // $('#save_note')parent().parent().parent().find("#message_text").var();
		 // alert(text);
			$("#messok").text(text);
	
	}
	function changeAdd(){
		// document.getElementById('beijing').style.display='block';
		document.getElementById('mess_all').style.display='block';
		document.getElementById('mess_all1').style.display='none';

			// $('#update').parent().parent().parent().parent().parent().find("#invioce_form2").css("display","block");
			
	}
	function kanso(){
		document.getElementById('mess_all').style.display='none';
		document.getElementById('mess_all1').style.display='block';
			// $('#kanso').parent().parent().parent().parent().parent().find("#invioce_form1").css("display","block");
	}
	 function del_user($id){
		 document.getElementById('beijing').style.display='block';
		 document.getElementById('suredel').style.display='block';
		 $('#shopid').text($id);
// 		if (confirm("你确定删除吗？")) { 
					
// 		}
// 		else{
// 			
// 		}
			// alert($id);
	}
	function quXiao(){
		document.getElementById('beijing').style.display='none';
		document.getElementById('suredel').style.display='none';
	}
	function queRen(){
		var shopid =  $('#querem').parent().parent().find("#shopid").text();
					$.ajax({
							url:"../api/index1.api.php?act=uid",
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
</script>