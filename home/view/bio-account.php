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
	<title>登录成功页面</title>
	<link rel="stylesheet" href="./css/bio-account.css" />
	<link rel="stylesheet" type="text/css" href="./css/biotherm_footer1.css">
	<link rel="stylesheet" type="text/css" href="./css/header -80percentage.css">
	<link rel="stylesheet" type="text/css" href="./css/bio_detailed1.css">
	<link rel="stylesheet" type="text/css" href="./css/bio_try.css">
	<link rel="stylesheet" type="text/css" href="./css/header1.css">
	<link rel="stylesheet" type="text/css" href="./css/E-zine.css">
	<link rel="stylesheet" type="text/css" href="./css/user_imformation.css">
    <script type="text/javascript" src="./js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="./js/bio-header.js"></script>
    <script src="./js/shopUpDown.js"></script>
    <script type="text/javascript" src="./js/E-zine.js"></script>
	<style>
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
	<!-- 引入头部 -->
	<?php
	include("./header/headerNavigation.php");
	?>
	
	<div class="acc_cnt">
		<div class="acc_main">
			<div class="cnt_top">
				<br />
				<a class="cnt_top_a" href="index.v.php">首页	>	</a>
				<a class="cnt_top_a" href="bio-account.php">我的账户 >	</a>
				<span class="cnt_top_span">个人资料</span>
				<h1 class="cnt_top_h1">我的账户</h1>	
			</div>
			<div class="cnt_left">
				<div id="links_box">
					<a href="bio-account.php">个人资料</a>
					<a href="user_imformation_myAddress.php">收货地址</a>
					<a href="user_imformation_myOrder.php">我的订单</a>
					<a href="user_imformation_myTry.php">我的试用装</a>
					<a href="user_imformation_myCollect.php">我的收藏夹</a>
				</div>
				
			</div>
			<div class="cnt_right">
				<div class="split-line-div1">
					<span class="split-line1"></span>
					<span class="split-line-text1">我的信息</span>
					<span class="split-line1"></span>
				</div>
				<?php
				
					if(isset($_SESSION['logname'])) {
						$user_phone = $_SESSION['logname'];
						$ikum = $shop->checkUserName($user_phone);//获取整条用户的信息
						echo '<p  class="right_p">用户名：	<span class="right_text">';
						echo $ikum[0]['name'];
						echo '</span></p>';
						echo '<p  class="right_p">邮箱地址：	<span class="right_text">';
						echo $ikum[0]['qqcom'];
						echo '</span></p>';
						echo '<p  class="right_p">手机号码：	<span class="right_text">';
						echo $ikum[0]['user_phone'];
						echo '</span></p>';
						echo '<br />';
					}
					else{
						echo '<p  class="right_p">用户名：	<span class="right_text">';
						echo '</span></p>';
						echo '<p  class="right_p">邮箱地址：	<span class="right_text">';
						echo '</span></p>';
						echo '<p  class="right_p">手机号码：	<span class="right_text">';
						echo '</span></p>';
						echo '<br />';
					}
				
				?>
			
				<p >您当前已累计积分： <span>未查询到您的积分</span></p>
				<p>因为您没有留下手机号码，所以无法查到您的积分信息，请点击“<a class="right_a" href="Modify-Information.php">编辑我的信息</a>”，添加您的手机号。</p>
				<p>温馨提示：柜台/官网以您的手机号码为绑定进行同步积分，欢迎进入<a class="right_a" href="redemption-club.bio.php">积分兑礼页面 ></a></p>
				<a href="Account-ChangePassword.php" class="right_button">	修改密码</a>
				<a href="Modify-Information.php" class="right_button">	编辑我的信息</a>
				
			</div>

		</div>	
	</div>








<div id="footer">
		<div id="footer_box">
			<div class="cart_footer" >
			<img style="margin-bottom: 30px;" src="./images/footer.png">
			<div class="footer_content">
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
</html></body>
</html>

