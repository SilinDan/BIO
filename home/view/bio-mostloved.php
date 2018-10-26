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
	<title>碧欧泉十大明星产品</title>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/bio-mostloved.css">
    <link rel="stylesheet" type="text/css" href="css/footer_sv.css"/>
    <link rel="stylesheet" type="text/css" href="./css/user-panel.css">
    <link rel="stylesheet" type="text/css" href="css/bio-register.css"/>
    <link rel="stylesheet" type="text/css" href="css/regs-bio-add.css"/>
    <link rel="stylesheet" type="text/css" href="./css/bio_detailed1.css">
    <link rel="stylesheet" type="text/css" href="./css/header1.css">
    <script type="text/javascript" src="./js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="./js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="./js/bio_new.js"></script>
    <script src="./js/resg-bio.js"></script>
    <script src="./js/checkcode.js" ></script>
    <link rel="stylesheet" type="text/css" href="./css/E-zine.css">
    <script src="./js/shopUpDown.js"></script>
    <script type="text/javascript" src="./js/E-zine.js"></script>
    
   <style type="text/css">
   	   .background{
   	   	 height: 2000px;
   	   }
   	   .re_content{
   	   	height: 1800px;
   	   }
   	   .backimg{
   	   	height: 1800px;
   	   	background: #fff url("./images/mostLoved-top-desktop.jpg") no-repeat;
   	   }
   	   


   </style>
   
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

		function ajaxCheckUser() {
			$("#user").blur(function () {
				//alert($(this).val());
				$.ajax({
					url:"../api/user.api.php?act=ajaxCheckUser",
					type:'post',
					dataType:"html", //等我下是不是这个ikun问题读不到ikum。。没听到作业 尴尬继续吧
					data:{user:$(this).val()}, //是这样获取的，对吧？不知道哈哈
					success:function(res) {
						$("#tishi").html(res);
					}
				})
			})
		}
		$(ajaxCheckUser);

		function getGoodsId($id) {
			$.ajax({
				url:"../api/index1.api.php?act=add",
				type:"get",
				dataType:"json",
				data:{"id":$id},
				success:function(data){
					console.log(data);
					alert("已添加到购物袋！");
					window.location.reload();
					// window.location.href='bio-shoppingcart.php';
				}
			})
		};
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

	<div class="background" >
		<div class="re_content">
          

			<div class="auth">
				<span><a href="index.v.php">首页 > 十大明星产品</a></span>
			</div>


		<div class="backimg">
				
	         <div id="new_list">
					<div id="new_list_box">
						<div class="new_list_box_img1">
							<div class="new_list_box1">
								快速浏览
							</div>
							
							<img src="./images/BIO10009_1.png" style="width: 220px;">
						</div>
						<div id="text1">
							<span id="text1_span1">男士水动力保湿乳</span>
							<span id="text1_span2">AQUAPOWER NORMAL SKIN</span>
						</div>
						<div id="text2">
							<span id="text2_span1">75ml中性</span><br>
							<img src="images/2018-10-13_084751.png"><br>
							<span id="text2_span2"><strong>¥480</strong></span>
						</div>
						<div id="text3">
							<a id="text3_a1" href="">了解详情</a>
							<a id="text3_a2" href="">立即购买</a>
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
<script type="text/javascript">
	//异步从数据库中取数据
                 $(document).ready(function(){
                      //alert('yyy'+'data');
                      $.ajax({
                        url:"../api/mostloved.api.php",
                        type:"get",
                        dataType:"json",
                        data:{act:"ajaxShow"},
                        success:function(data){
                            console.log(data);
        
                      		var tab='';
        
                         $.each(data,function(i){
                                tab+='<div id="new_list_box"><div class="new_list_box_img1"><div class="new_list_box1">快速浏览</div><img src="./images/goods/'+data[i].goods_img+'" style="width: 220px;"></div>	<div id="text1"><span id="text1_span1">'+data[i].goods_name+'</span><span id="text1_span2">'+data[i].goods_english+'</span></div><div id="text2"><span id="text2_span1">'+data[i].goods_size+'</span><br><img src="images/2018-10-13_084751.png"><br><span id="text2_span2"><strong>¥480</strong></span></div><div id="text3"><a id="text3_a1" href="detail-bio.php?id='+data[i].goods_id+'">了解详情</a><a id="text3_a2" href="" onclick="getGoodsId('+data[i].goods_id+')">立即购买</a></div></div>'

                         })
                          $("#new_list").html(tab);
                           }
                            })
                });


</script>


</html>



