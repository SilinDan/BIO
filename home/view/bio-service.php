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
	<title>碧欧泉帮助中心</title>
    <link rel="stylesheet" type="text/css" href="./css/header1.css">
    <link rel="stylesheet" type="text/css" href="./css/footer_sv.css"/>
    <link rel="stylesheet" type="text/css" href="./css/bio-register.css"/>
    <link rel="stylesheet" type="text/css" href="./css/bio_try.css">
    <link rel="stylesheet" type="text/css" href="./css/bio_service.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/user-panel.css">
    <script type="text/javascript" src="./js/jquery-3.3.1.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/E-zine.css">
    <script src="./js/shopUpDown.js"></script>
    <script type="text/javascript" src="./js/E-zine.js"></script>
    

	<script type="text/javascript">
		
		
		function verificationUser(){
			var num=/^[1][\d]{9}[\d]$/g;
			var email=/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/;
			if($(".input-id").val()==""){
				$(".tips-user").text("请输入您的邮箱或手机号");
				$(".input-id").addClass("border-red").removeClass("border-blue");
				
			}else if(num.test($(".input-id").val())||email.test($(".input-id").val())){
				$(".tips-user").text("");
				$(".input-id").addClass("border-blue");
				
			}else {
				$(".tips-user").text("请输入有效的邮箱或手机号");
				$(".input-id").addClass("border-red").removeClass("border-blue");
			}
			
		}
		function verificationPwd(){
			if($(".input-pwd").val()==""){
				$(".tips-pwd").text("请输入您的密码");
				$(".input-pwd").addClass("border-red").removeClass("border-blue");
			}else if($(".input-pwd").val().length<8){
				$(".tips-pwd").text("请输入8-30个字符");
				$(".input-pwd").addClass("border-red").removeClass("border-blue");
			}else {
				$(".tips-pwd").text("");
				$(".input-pwd").addClass("border-blue");
			}
		}
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
	include("./header/header.php");
	?>

	<div class="se_background">
		<div class="se_content">
			<div class="auth">
				<span><a href="index.v.php">首页></a> 帮助中心</span>
			</div>
			<div class="re_contentleft"> 
			   <span class="service_title">帮助中心</span>
               <ul class="service_list">
               	<li><a href="">常见问题 </a></li>
								<div class="question" >
									<div class="question-title">
										<span >产品打开后可以保存多久？ </span>
									</div>
									<div class="question-text">
										<span>如果要了解产品打开后可以保存的时间，请仔细阅读产品包装上的说明。“开封后保存时间”或PAO指示产品打开后可以使用的月份数。</span>
									</div>
								</div>
								<div class="question" >
									<div class="question-title">
										<span >还没打开的产品可以保存多久？  </span>
									</div>
									<div class="question-text">
										<span>若产品尚未开封，根据欧盟要求，化妆品的保存时间为30个月。碧欧泉产品的保质期超过该标准，在适当的条件下可以保存更长时间，但要避免保存环境过热或过于潮湿。如果您要了解所用产品是否过期，您可以点击（链接至联系我们）这里告诉我们产品批号。您需要输入两个字母和三位数字，我们将告知该产品的生产日期。 </span>
									</div>
								</div>
								<div class="question" >
									<div class="question-title">
										<span >哪里能够找到产品的成份表？  </span>
									</div>
									<div class="question-text">
										<span>产品中的所有成份都在包装的“Ingredients”（成份）部分明确标出，在网站的产品数据表中也能找到相关信息。 </span>
									</div>
								</div>
								<div class="question" >
									<div class="question-title">
										<span >碧欧泉产品已经通过皮肤测试了吗？  </span>
									</div>
									<div class="question-text">
										<span>从最初的产品设计阶段开始，为了满足皮肤耐受度和美容功效两方面的要求，碧欧泉实验室就对产品进行全面的测试：体外测试、人造皮肤测试（Episkin）并通过其他服务提供者的配合在皮肤监测的条件下进行临床测试等。每一款碧欧泉产品都根据其特点进行了测试：眼部护理产品需进行眼科测试，针对油性皮肤产品的非粉刺测试，以及针对敏感性皮肤产品的低过敏性测试等。  </span>
									</div>
								</div>
               </ul><br><br>
                <span class="service_title">     我们的承诺</span>
               <ul class="service_list">
								<div class="question-text" >
								
										<span>
										碧欧泉产品全部采用天然成份，充分考虑人体皮肤的需求和效果。<br>
										在www.biotherm.com.cn网站在线定购碧欧泉产品，我们承诺提供以下各项服务：<br><br>

										1. 安全支付<br>
										在定购过程中，您在一个受保护的网站（SSL 加密）中进行操作，确保您的私人信息保密。<br><br>

										2. 快速送达<br>
										我们的送货方合作伙伴将尽可能在您发出订单后2-7个工作日以内将定购产品送达。<br>
										对于您在www.biotherm.com.cn网站进行采购所碰到的任何问题，都可以从碧欧泉客服部门得到相应回复。<br>
										</span>
								</div>
								
			</div>

         
        

          
    


			<div class="re_contentright">
					
					<div class="order-footer">
							<div class="order-footer-content">
								<div class="term-contaction">联系我们 <a href="" class="a-help-center">帮助中心></a></div>
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
<script type="text/javascript" src="./js/bio-header.js"></script>
</html>