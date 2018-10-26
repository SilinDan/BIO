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
	<meta name="viewport" content="width-device-width,user-scalable-0,initial-scale-1,maximum-scale-1"/>
	<title>碧欧泉男士Biotherm碧欧泉官方网上商城</title>
	<link rel="stylesheet" type="text/css" href="css/slide.css"/>
	<link rel="stylesheet" type="text/css" href="css/header1.css">
	<link rel="stylesheet" type="text/css" href="css/index-bio.css">
	<link rel="stylesheet" type="text/css" href="./css/biotherm_footer1.css"/>
	<link rel="stylesheet" type="text/css" href="css/index_bio_layout.css">
	<link rel="stylesheet" type="text/css" href="css/index_bio_font.css">
	<link rel="stylesheet" type="text/css" href="css/bio_navigation.css">
	<link rel="stylesheet" type="text/css" href="./css/user-panel.css">
	<script type="text/javascript" src="./js/jquery-3.3.1.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/E-zine.css">
   	<script src="./js/shopUpDown.js"></script>
   	<script type="text/javascript" src="./js/E-zine.js"></script>
   	<script type="text/javascript" src="./js/Set_Top.js"></script>
    

	<style type="text/css">
		a {
			color: #535353;
		}
	
	</style>
	
					
</head>
<body bgcolor="#292929">
	<div class="subscribe">
			<button class="subscribe_close">×</button>
			<div class="subscribe_ok">订阅成功，感谢您的订阅</div>
			<div class="subscribe_href"><a href="index.v.php">继续购物</a></div>
			<span>还没有账号？</span>
			<div class="subscribe_href"><a href="bio-register.php">立即注册</a></div>
		</div>
		<div class="body_box"></div>
		<div class="E_zine">
				<div class="E_zine_main">
					<button class="close_E-zine" >×</button>
					<div class="E_Zine_cnt">
						<div class="title">
							<span >订阅电子杂志</span><br />
							<span style="font-size: 14px;">提交您的邮箱地址，获取法国碧欧泉最新资讯、官方特惠礼遇！</span>
						</div>
						<div class="cnt_Email">
							<span class="user_email">您的邮箱 </span>
							<input id="user_email" type="text" placeholder="请输入邮箱"/>
							<button class="sub" type="submit"></button>
			
						</div>
						<span class="tips_email"></span><br />
						<div class="E_zine_btm">
			
							<div class="choose_box"><input type="checkbox"  class="choose" name="NO" /></div>
							<div class="choose_box">
								<span>我同意依照本<a href="http://policy.lorealchina.com/termsofusewebsite">使用条款</a>和<a href="http://policy.lorealchina.com/privacypolicy">隐私政策</a>对我的个人信息进行收集和使用；我已阅读并确认被给予充</span><br />
								<span>分机会理解该<a href="http://policy.lorealchina.com/termsofusewebsite">使用条款</a>和<a href="http://policy.lorealchina.com/privacypolicy">隐私政策</a>的内容。</span><br />
								<span class="tips_choos"></span>
							</div>
							
						</div>
					</div>	
				</div>
		</div>	
			<div class="detail-bio-box-fixed">
				在线咨询
			</div>
			<div class="detail-bio-box-fixed1">
				手机官网
			</div>
			<div class="detail-bio-box-fixed2">
				免费试用
			</div>
			<div class="detail-bio-box-fixed3">
				置顶
			</div>

<?php 
	if (isset($_SESSION['logname'])) {
		echo '<div id="login" class="bg">';
		echo '</div>';

	}
	else{
		echo '

			<div id="login" class="bg">
				<div class="log-bg">
					<div class="log-left">
						<div class="log-left-content">
							<div class="login-content-header">用户登录</div>
							<div class="login-content-left">
								<form action="../api/index.api.php?act=login" method="post">
									<input type="text" placeholder="您的邮箱/手机*" name="logname" value="" class="input-id" onblur="verificationUser()"><br/>
									<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-user"></div>
									<input type="password" placeholder="您的密码*" name="logpwd" value="" class="input-pwd" onblur="verificationPwd()">
									<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-pwd"></div>
									<br/>
									<div class="autolog-div">
										<a href="#" class="a-forgetpwd" onclick="">忘记密码？</a>
										<input type="checkbox" name="" value="" class="input-autolog"><span class="span-remember">记住用户名</span>
										<br/>
									</div>
									<div >
										<input type="submit" name="bio_denglu" value="登录" class="login-div" >
										<!-- <a href="#" class="log-in">登录</a> -->
									</div>
								</form>
							</div>

							<div class="login-content-center">
								<div class="split-line-div">
									<div class="split-line"></div>
									<div class="split-line-text">或</div>
									<div class="split-line"></div>
								</div>
							</div>

							<div class="login-content-right">
								<div class="other-log">
									使用合作网站账号登陆
								</div>
								<div class="other-log-way">						
									<a href="#" class="login-way"><img src="./images/login-icon-wechat.png">微信</a>
									<a href="#" class="login-way"><img src="./images/login-icon-qq.png">QQ</a>
									<a href="#" class="login-way"><img src="./images/login-icon-weibo.png">微博</a>
									<a href="#" class="login-way"><img src="./images/login-icon-alipay.png">支付宝</a>
								</div>
							</div>
						</div>
					</div>
					<div class="log-right">
						<div class="log-right-content">
							<div class="dialog-close">
								<a href="#" onclick="document.getElementById(';echo "'login'";echo ').style.display=';echo "'none'";echo '><span class="close-dialog">×</span></a>
							</div>
							<div class="new-user-content">
								<div class="new-user-title">新用户注册</div>
								<p class="p-explain">注册成为碧欧泉官方会员，第一时间获取官网最新资讯与特惠礼遇，查看物流信息，共享线上线下积分。</p>
								<div class="register-div">
									<a href="bio-register.php" class="user-register">立即注册</a>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>

		 ';
	}

 ?>

<div class="header">
					<div class="content">
					  <div class="content_left">
					  	           <a href="index.v.php"><img src="./images/2018-10-12_172720.png" title="Biotherm碧欧泉官方网上商城"></a>
					  </div>
					  <div class="content_right">
								 <div class="invagation_list">
										<?php 
																			if (isset($_SESSION['logname'])) {
																				echo '
																							<div class="shopaddress"><a href="ttt.php" style="padding-right:15px;">注销 </a><a href="bio-shopadd.php">专柜地址</a> </div>
																							<div class="service"><a href="bio-service.php">客服中心</a></div>
																							<div class="e-magzine"><a id="e-magzine" href="#">订阅电子杂志</a> </div>
																				';
																				echo '<div class="login-regis" style="color:#fff;font-size:13px;" id="login-regis"><a href="bio-account.php">';
																				echo "{$_SESSION['logname']}";
																				echo '</a></div>';
																			}
																			else{
																				echo '
																							<div class="shopaddress"><a href="bio-shopadd.php">专柜地址</a> </div>
																							<div class="service"><a href="bio-service.php">客服中心</a></div>
																							<div class="e-magzine"><a id="e-magzine" href="#">订阅电子杂志</a> </div>
																				';
																				echo '<div class="login-regis" id="login-regis"><a href="#">登陆与注册</a></div>';
																			}
									
																		 ?>
																			
																		    <div class="shopping-bag" id="shopping-bag"><a href="bio-shoppingcart.php">购物袋</a>
																				<?php
												if(isset($_SESSION['logname'])) {
												$user_phone = $_SESSION['logname'];
												$ikum = $shop->checkUserName($user_phone);//获取整条用户的信息
												$id = $ikum[0]['id'];
												$ikum = $shop->checkShop($id);//获取整条购物车的信息
												$shop_sum = sizeof($ikum);
									
												if($shop_sum!=0){
														echo '<div class="shopping-bag-box" id="shopping-bag-box" >
																		<div class="shopping-bag-box1">
																			<div class="box1"><span class="box1-text" ><strong>您的购物袋有<span id="box1-text1" class="box1-text1">';
														echo 	$shop_sum;
														echo '</span>件产品</strong></span></div>';
														
														for ($i=0; $i < $shop_sum; $i++) {
																$id = $ikum[$i]['goods_id'];
																$roy = $shop->checkGood($id);
																
																echo  '<div class="box2">
																				<div class="box2-img"><a href="detail-bio.php?id=';
																echo  $roy[0]['goods_id'];
																echo '"><img src="./images/goods/';
																echo  $roy[0]['goods_img'];
																echo '"></a></div>
																				<div class="box2-text">
																					<div class="box2-text1">
																						<span class="span1">
																			';
																echo  $roy[0]['goods_name'];
																echo  '</span><span class="span2">规格 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
																echo  $roy[0]['goods_size'];
																echo  'ml中性 <span style="float:right;" id="qianqian'; 
																echo 	$ikum[$i]['shop_id'];
																echo '">'; 
																echo  $roy[0]['goods_price'];
																echo '</span><span style="float:right;"><span style="display:none;" id="how">'; 
																echo $i;
																echo '</span>￥</span></span></div>
																				<div class="box2-text2">
																														<input type="button" id="del';
																				echo 	$ikum[$i]['shop_id'];
																				echo '" value="-" onclick="del(';
																				echo 	$ikum[$i]['shop_id'];
																				echo 								')"/>
																														<input type="text" style="width:40px;" id="text_box';
																				echo 	$ikum[$i]['shop_id'];
																				echo '" class="text_box" value="'; 
																				echo $ikum[$i]['shop_num'];
																				echo '" />
																														<input type="button" value="+" id="add';
																				echo 	$ikum[$i]['shop_id'];
																				echo '" onclick="add(';
																				echo	$ikum[$i]['shop_id'];
																				echo 					')"/>
																				
																							<strong><span class="box2-span">￥<span id="box2-span';
																				echo 	$i;
																				echo '">';
																echo  $roy[0]['goods_price']*$ikum[$i]['shop_num'];
																echo  '</span></span></strong></div>
																			</div>
																		</div>';
														}
														echo	'<div class="box3">
																	<div class="box3-text">
																		<strong><span class="box3-text1">总计：</span>
																		<span class="box3-text2">￥<span id="box3-text2">';
														$sum =0;
														for($i=0; $i < $shop_sum; $i++){
															$id = $ikum[$i]['goods_id'];
															$roy = $shop->checkGood($id);//获取整条商品的信息
															$single_sum = $roy[0]['goods_price']*$ikum[$i]['shop_num'];
															$sum += $single_sum;
														}
														echo $sum;
														echo '</span></span></strong>
																	</div>
																	<div class="box3-input">
																		<button class="input" type="button" onclick="window.location.href=';
														echo  "'bio-shoppingcart.php'";
														echo	'" name="jiesuan" value="立即结算">立即结算</button>
																	</div>
																</div>
															</div>
														</div>';
																			}
																					else{
																				echo '<div class="shopping-bag-box" style="height:200px;" id="shopping-bag-box" >
																								<div class="shopping-bag-box1" style="height:150px;">
																									<div class="box1"><span class="box1-text"><strong>
																											您的购物袋有<span class="box1-text1">0</span>件产品
																									</strong></span></div>
																									<div>您的购物袋中没有任何商品</div>
																								</div>
																							</div>';
																			}
																		}
																					else{
																			echo '<div class="shopping-bag-box" style="height:200px;" id="shopping-bag-box" >
																							<div class="shopping-bag-box1" style="height:150px;">
																								<div class="box1"><span class="box1-text"><strong>
																										您的购物袋有<span class="box1-text1">0</span>件产品
																								</strong></span></div>
																								<div>您的购物袋中没有任何商品</div>
																							</div>
																						</div>';
																		}
																				?>
																				 </div>
								 </div>
							     <div class="weixin-weibo-all">
							        <img  class="header_weibo" src="./images/weibo.png">
							     	<img  class="header_weixin" src="./images/weixin.png">

							     	<a href="searchGoodsList.php?searchValue=查看所有分类&searchJudge=all">全部产品</a>
							     	 <input type="text" class="search_box" id="searchBox" name="search"   value="绿活泉" onfocus="if (value =='绿活泉'){value =''}"onblur="if (value ==''){value='绿活泉'}"/>
							     	 <div class="search_box_submit" onclick="searchBoxSubmit()"></div>
		                           </div>  
		                           <div>
		                           
							      </div>
			          </div>
				    </div>				
	</div>
               
<div class="pcpbbar" style="background: #ccc">
		    					<a href="index.v.php"><img src="./images/MPB2018100801.jpg"></a>
			   </div>
<div id="navigation">
		<div id="navigation_main">
			<ul>
				<li><a href="bio-brandnews.php">品牌资讯</a> 
					<div id="li_box1">
						<table id="li_box1_table">
							<tr>
								<td><a href="bio_try.php">免费试用</a></td>
							</tr>
							<tr>
								<td><a href="bio_new.php">新品上市</a></td>
							</tr>
							<tr>
								<td><a href="healing_community.v.php">愈颜社区</a></td>
							</tr>
							<tr>
								<td><a href="bio_brand_activity.php">品牌活动</a></td>
							</tr>
							<tr>
								<td></td>
							</tr>
						</table>
					</div>
				</li>
				<li>脸部护理
					<div id="li_box2">
						<table id="li_box2_table">
							<tr id="li_box2_table_tr1">
								<td><img src="./images/primary-face-slot-1.jpg"></td>
								<td><img src="./images/primary-face-slot-2.jpg"></td>
								<td><img src="./images/primary-face-slot-3.jpg"></td>
							</tr>
							<tr id="li_box2_table_tr2">
								<td>按类型</td>
								<td>按功能</td>
								<td>按系列</td>
							</tr>
							<tr id="li_box2_table_tr3">
								<td><a href="searchGoodsList.php?searchValue=卸妆&searchJudge=second">卸妆</a></td>
								<td><a href="searchGoodsList.php?searchValue=保湿&searchJudge=second">保湿</a></td>
								<td><a href="searchGoodsList.php?searchValue=奇迹系列&searchJudge=serie">奇迹系列</a></td>
							</tr>
							<tr id="li_box2_table_tr3">
								<td><a href="searchGoodsList.php?searchValue=洁面&searchJudge=second">洁面</a></td>
								<td><a href="searchGoodsList.php?searchValue=修复&searchJudge=second">修复</a></td>
								<td><a href="searchGoodsList.php?searchValue=活泉系列&searchJudge=serie">活泉系列</a></td>
							</tr>
							<tr id="li_box2_table_tr3">
								<td><a href="searchGoodsList.php?searchValue=爽肤&searchJudge=second">爽肤</a></td>
								<td><a href="searchGoodsList.php?searchValue=抗衰老&searchJudge=second">抗衰老</a></td>
								<td><a href="searchGoodsList.php?searchValue=蓝源系列&searchJudge=serie">蓝源系列</a></td>
							</tr>
							<tr id="li_box2_table_tr3">
								<td><a href="searchGoodsList.php?searchValue=精华&searchJudge=second">精华</a></td>
								<td><a href="searchGoodsList.php?searchValue=卸妆&searchJudge=second">卸妆</a></td>
								<td><a href="searchGoodsList.php?searchValue=活颜清透系列&searchJudge=serie">活颜清透系列</a></td>
							</tr>
							<tr id="li_box2_table_tr3">
								<td><a href="searchGoodsList.php?searchValue=润肤&searchJudge=second">润肤</a></td>
								<td><a href="searchGoodsList.php?searchValue=眼部护理&searchJudge=second">眼部护理</a></td>
								<td><a href="searchGoodsList.php?searchValue=无瑕净颜系列&searchJudge=serie">无瑕净颜系列</a></td>
							</tr>
							<tr id="li_box2_table_tr3">
								<td><a href="searchGoodsList.php?searchValue=面膜&searchJudge=second">面膜</a></td>
								<td><a href="searchGoodsList.php?searchValue=清洁&searchJudge=second">清洁</a></td>
								<td></td>
							</tr>
							<tr id="li_box2_table_tr3">
								<td><a href="searchGoodsList.php?searchValue=隔离&searchJudge=second">隔离</a></td>
								<td></td>
								<td></td>
							</tr>
							<tr id="li_box2_table_tr3">
								<td><a href="searchGoodsList.php?searchValue=查看所有分类&searchJudge=all">查看所有分类</a></td>
								<td></td>
								<td></td>
							</tr>
						</table>
					</div>
				</li>
				<li>身体护理
					<div id="li_box3">
						<table id="li_box3_table">
							<tr id="li_box2_table_tr2">
									<td>按类型</td>
									<td>按功能</td>
									<td>按系列</td>
								</tr>
							<tr id="li_box3_table_tr2">
								<td><a href="searchGoodsList.php?searchValue=牛奶润肤&searchJudge=second">牛奶润肤</a></td>
								<td><a href="searchGoodsList.php?searchValue=润肤&searchJudge=second">润肤</a></td>
								<td><a href="searchGoodsList.php?searchValue=凝乳丝滑系列&searchJudge=serie">凝乳丝滑系列</a></td>
							</tr>
							<tr id="li_box3_table_tr2">
								<td><a href="searchGoodsList.php?searchValue=清爽沐浴&searchJudge=second">清爽沐浴</a></td>
								<td><a href="searchGoodsList.php?searchValue=塑身美体&searchJudge=second">塑身美体</a></td>
								<td><a href="searchGoodsList.php?searchValue=塑身美体系列&searchJudge=serie">塑身美体系列</a></td>
							</tr>
							<tr id="li_box3_table_tr2">
								<td><a href="searchGoodsList.php?searchValue=塑身美体&searchJudge=second">塑身美体</a></td>
								<td><a href="searchGoodsList.php?searchValue=护唇&searchJudge=second">护唇</a></td>
								<td><a href="searchGoodsList.php?searchValue=保湿香氛系列&searchJudge=serie">保湿香氛系列</a></td>
							</tr>
							<tr id="li_box3_table_tr2">
								<td><a href="searchGoodsList.php?searchValue=特殊护理&searchJudge=second">特殊护理</a></td>
								<td><a href="searchGoodsList.php?searchValue=香氛&searchJudge=second">香氛</a></td>
								<td></td>
							</tr>
							<tr id="li_box3_table_tr2">
								<td><a href="searchGoodsList.php?searchValue=活力香氛&searchJudge=second">活力香氛</a></td>
								<td></td>
								<td></td>
							</tr>
						</table>
					</div>
				</li>
				<li>防晒隔离
					<div id="li_box4">
						<table id="li_box4_table">
							<tr id="li_box2_table_tr2">
									<td>按类型</td>
									<td>按功能</td>
								</tr>
							<tr id="li_box4_table_tr2">
								<td><a href="searchGoodsList.php?searchValue=隔离&searchJudge=second">隔离</a></td>
								<td><a href="searchGoodsList.php?searchValue=修颜隔离系列&searchJudge=serie">修颜隔离系列</a></td>
								<td></td>
							</tr>
							<tr id="li_box4_table_tr2">
								<td><a href="searchGoodsList.php?searchValue=防晒&searchJudge=second">防晒</a></td>
								<td><a href="searchGoodsList.php?searchValue=骄阳防晒系列&searchJudge=serie">骄阳防晒系列</a></td>
								<td></td>
							</tr>
						</table>
					</div>
				</li>
				<li><a href="bio-mostloved.php">明星产品</a></li>
				<li><a href="member_center.bio.php">会员中心</a></li>
				<li><a href="giftBox.php"> 特惠礼盒</a></li>
				<li><img src="./images/2018-09-11_173448.png"><a href="manindex.v.php"> 碧欧泉男士</a>
					<div id="li_box5">
						<table id="li_box5_table">
							<tr>
								<td><img src="./images/Menu_ForMen_Aquapower.jpg"></td>
								<td><img src="./images/Menu_ForMen_Collections.jpg"></td>
								<td><img src="./images/Menu_ForMen_SpecialOffers.jpg"></td>
							</tr>
						</table>
					</div>
				</li>
			</ul>
		</div>
</div>
			     
<div class="banner">
	<div class="mianc">
		<link rel="stylesheet" href="css/slide.css">
		<div class="ck-slide">
			<ul class="ck-slide-wrapper">
				<li>
          <a href="javascript:"><img src="images/1.jpg" alt=""></a>
				</li>
				<li style="display:none">
					<a href="javascript:"><img src="images/2.jpg" alt=""></a>
				</li>
				<li style="display:none">
					<a href="javascript:"><img src="images/5.jpg" alt=""></a>
				</li>
				<li style="display:none">
					<a href="javascript:"><img src="images/4.jpg" alt=""></a>
				</li>
				<li style="display:none">
					<a href="javascript:"><img src="images/6.jpg" alt=""></a>
				</li>
				<!--  从V查询 -->
			</ul>
			<a href="javascript:;" class="ctrl-slide ck-prev">上一张</a> <a href="javascript:;" class="ctrl-slide ck-next">下一张</a>
			<div class="ck-slidebox">
				<div class="slideWrap">
					<ul class="dot-wrap">
						<li class="current"><em>1</em></li>
						<li><em>2</em></li>
						<li><em>3</em></li>
						<li><em>4</em></li>
					</ul>
				</div>
			</div>
		</div>
		
		<!-- js -->
		<script src="js/jquery-1.8.3.min.js"></script>
		<!-- <script src="js/slide.min.js"></script> -->
        <script src="js/slide.js"></script>
		<script>
			$('.ck-slide').ckSlide({
				autoPlay: true,//默认为不自动播放，需要时请以此设置
				dir: 'x',//默认效果淡隐淡出，x为水平移动，y 为垂直滚动
				interval:3000//默认间隔2000毫秒
				
			});
		</script>
		<!-- Demo end -->

		 
	</div>
</div>

	

<div class="mancontent" style="width: 1280px;height: 463px;margin: 0 auto;">
	<div class="mancontent_left" style="width: 50%;height: 100%; background: #fff;margin: 0;float: left;">
        <div class="mandetail" style="width: 90%;height: 70%;background: #fff;margin: 50px;">
            <div><span style="font-size: 30px;font-weight: bold;">十大</span><br/><span style="font-size: 30px;font-weight: bold;">明星产品</span>
            </div>

             <div style="margin-top: 20px;float: left;">
             	  <span style="font-size: 30px;font-weight: bold;">N°1</span><br/>
                  <span style="font-size:18px;color: #f00">男士水动力保湿乳</span><br/>
                  <span style="font-size:25px;font-weight: bold;color: #535353">￥480</span>
             

             <div><input type="button" value="立即购买" style="width: 150px;height: 60px;background: #141831;color: #fff;font-size: 18px;border: 0;"></div><br/>
             <div style="font-size: 14px;"><a href="">查看所有十大明星产品</a></div>
         </div>
 
            <div style="float: right;"><img src="./images/2018-10-12_154956.png"></div>
            </div>
          
	
</div>
<div class="mancontent_right" style="width: 50%;height: 100%;margin: 0;float: right;">

	<img src="./images/specialoffers_bg_02.jpg">
</div>


</div>

<div style="width: 100%;height: auto;text-align: center;"><img src="./images/NEW_01.jpg" style="width: 1280px;"></div>
<div style="width: 100%;height: auto;text-align: center;"><img src="./images/MENbanner_004.jpg" style="width: 1280px;"></div>

<div class="mancontent" style="width: 1280px;height: 380px;margin: 0 auto;">
		<div class="mancontent_left" style="width: 50%;height: 100%; background: #fff;margin: 0;float: left;">
		      <img src="./images/homepage_men_gift_set.jpg" style="width: 100%">
		</div>
		<div class="mancontent_right" style="width: 50%;height: 100%;margin: 0;float: right;">

			 <img src="./images/homepage-push-women_1.jpg" style="width: 100%">
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
	function searchBoxSubmit(){
		var searchValue = $("#searchBox").val();
		var searchUrl =encodeURI('searchGoodsList.php?searchValue=' + searchValue+'&searchJudge=search');
		window.location.href =searchUrl;
		// location.href='searchGoodsList.php?searchValue=' + searchValue;
	}
</script>
</html>