<?php
    session_start();
    header('Content-type:text/html;charset=utf-8');
		include("../model/Db.class.php");
		include("../controller/shop.class.php");
		$shop = new Shop();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="js/jquery/2.0.0/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="./css/css/bootstrap/3.3.6/bootstrap.css"/>
		<script src="js/bootstrap/3.3.6/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="./css/css/header.css">
		<link rel="stylesheet" type="text/css" href="./css/bio_detailed1.css"/>
		<link rel="stylesheet" type="text/css" href="./css/css/index-bio1.css">
		<link rel="stylesheet" type="text/css" href="./css/css/goods-list.css"/>
		<link rel="stylesheet" type="text/css" href="./css/css/changping-box.css">
		<link rel="stylesheet" type="text/css" href="./css/biotherm_footer1.css"/>
		<link rel="stylesheet" type="text/css" href="./css/header1.css">
		<link rel="stylesheet" type="text/css" href="./css/user-panel.css">
	    <script type="text/javascript" src="./js/jquery-3.3.1.js"></script>
	    <link rel="stylesheet" type="text/css" href="./css/E-zine.css">
    	<script src="./js/shopUpDown.js"></script>
   		<script type="text/javascript" src="./js/E-zine.js"></script>
   	 	<script type="text/javascript" src="./js/Set_Top.js"></script>
	    

		<title>满额礼赠</title>
		<style type="text/css">
			a{
				text-decoration: none;
				color:#111;
				/*font-size: 16px;*/
			}
			body{
				margin: 0 auto;
				background: #292929;
				min-width: 1280px;
			}
			.search_box {
			    background: #202020 url(images/search_logo.png) no-repeat right;
			    border: 1px solid #fff;
			    width: 200px;
			    height: 30px;
			    text-indent: 8px;
					color: #fff;
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
		<div class="goods-list-all">
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


		<!-- 引入头部 -->
		<?php
		include("./header/headerNavigation.php");
		?>

			<div class="goods-content">
				<div class="little-nav">
					<span><a href="index.v.php">首页></a></span>
					<a href="" style="color: #535355;">  特惠礼盒</a>
				</div>
				<div class="goods-list-bunner">
					<img src="images/gifts_02.jpg" >
				</div>
				<div class="goods-show-box">
					<div class="left-filter">
						
						<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								<div class="panel-heading" style="background: #fff;">
									<h4 class="panel-title" >
											产品筛选
									</h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<a data-toggle="collapse" data-parent="#accordion" 
									href="#collapseTwo">
										<h4 class="panel-title">
												全部礼盒	
										</h4>
									</a>
								</div>
								
							</div>
							
							
						</div>
				
					</div>
					<div class="right-goods-show" id="right-goods-show">
						<div class="index-single-all">
							<div class="index-single-botton">
								<div class="isb-introduce" id="isb-introduce">
									<a href="">
										<img src="./images/detail-bio1.png">
									</a>
									<div class="isb-introduce-ying" id="isb-introduce-ying">快速浏览</div>
									<div class="isb-introduce-name">
										蓝源精华露*
									</div>
									<div class="isb-introduce-zi">
										NEW BLUE THERAPY ACCELERATED SERUM 
									</div>
									<div class="isb-introduce-zi">50ml</div>
									<div class="isb-introduce-star">
										<img src="./images/star-blue.png">
										<img src="./images/star-blue.png">
										<img src="./images/star-blue.png">
										<img src="./images/star-blue.png">
										<img src="./images/star-blue.png">
									</div>
								</div>
								<div class="isb-price">¥390</div>
							</div>
							<div class="isb-buy">
								<input type="submit" name="hurry-buy" value="50ml" class="isb-buy-name1">
							</div>
							<div class="isb-buy1">
								<input type="submit" name="hurry-buy" value="立即购买" class="isb-buy-name">
							</div>
						</div>

						<div class="index-single-all">
							<div class="index-single-botton">
								<div class="isb-introduce">
								<a href="">
									<img src="./images/detail-bio2.png">
								</a>
								<div class="isb-introduce-ying">快速浏览</div>
									<div class="isb-introduce-name">
										蓝源精华露*
									</div>
									<div class="isb-introduce-zi">NEW BLUE THERAPY ACCELERATED SERUM </div>
									<div class="isb-introduce-zi">50ml</div>
									<div class="isb-introduce-star">
										<img src="./images/star-blue.png">
										<img src="./images/star-blue.png">
										<img src="./images/star-blue.png">
										<img src="./images/star-blue.png">
										<img src="./images/star-blue.png">
									</div>
								</div>
								<div class="isb-price">¥390</div>
							</div>
							<div class="isb-buy">
								<input type="submit" name="hurry-buy" value="50ml" class="isb-buy-name1">
							</div>
							<div class="isb-buy1">
								<input type="submit" name="hurry-buy" value="立即购买" class="isb-buy-name">
							</div>
						</div>	

						<div class="index-single-all">
							<div class="index-single-botton">
								<div class="isb-introduce">
								<div class="isb-introduce-new">New</div>
									<a href="">
										<img src="./images/detail-bio3.png">
									</a>
									<div class="isb-introduce-ying">快速浏览</div>
									<div class="isb-introduce-name">
										蓝源精华露*
									</div>
									<div class="isb-introduce-zi">
										NEW BLUE THERAPY ACCELERATED SERUM 
									</div>
									<div class="isb-introduce-zi">50ml</div>
									<div class="isb-introduce-star">
										<img src="./images/star-blue.png">
										<img src="./images/star-blue.png">
										<img src="./images/star-blue.png">
										<img src="./images/star-blue.png">
										<img src="./images/star-blue.png">
									</div>
								</div>
								<div class="isb-price">¥390</div>
							</div>
							<div class="isb-buy">
								<input type="submit" name="hurry-buy" value="50ml" class="isb-buy-name1">
							</div>
							<div class="isb-buy1">
								<input type="submit" name="hurry-buy" value="立即购买" class="isb-buy-name">
							</div>
						</div>

						<div class="index-single-all">
							<div class="index-single-botton">
								<div class="isb-introduce">
								<div class="isb-introduce-new">New</div>
									<a href="">
										<img src="./images/detail-bio3.png">
									</a>
									<div class="isb-introduce-ying">快速浏览</div>
									<div class="isb-introduce-name">
										蓝源精华露*
									</div>
									<div class="isb-introduce-zi">
										NEW BLUE THERAPY ACCELERATED SERUM 
									</div>
									<div class="isb-introduce-zi">50ml</div>
									<div class="isb-introduce-star">
										<img src="./images/star-blue.png">
										<img src="./images/star-blue.png">
										<img src="./images/star-blue.png">
										<img src="./images/star-blue.png">
										<img src="./images/star-blue.png">
									</div>
								</div>
								<div class="isb-price">¥390</div>
							</div>
							<div class="isb-buy">
								<input type="submit" name="hurry-buy" value="50ml" class="isb-buy-name1">
							</div>
							<div class="isb-buy1">
								<input type="submit" name="hurry-buy" value="立即购买" class="isb-buy-name">
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
		
		
		</div>
		
		
				
	</body>
	<script type="text/javascript" src="./js/bio-header.js"></script>
	<script type="text/javascript">


		//获取全部礼盒
		$(document).ready(function(){	
			$.ajax({
				url:"../api/searchGoodsList.api.php?act=ajaxGiftShow",
				 type:"get",
			     dataType:"json",
			     data:{ },
			       success:function(data){
	               console.log(data);
	               var tab=""; 
	               $.each(data,function(i){
		               tab+='<div class="index-single-all"><div class="index-single-botton">';
							tab+='<div class="isb-introduce" id="isb-introduce">';
							// tab+='<div class="isb-introduce-new">New</div>';
								tab+='<img src="./images/goods/'+data[i].goods_img+'">';
								tab+='<a href="detail-bio.php?id='+data[i].goods_id+'">';
									tab+='<div class="isb-introduce-ying" id="isb-introduce-ying">快速浏览</div>';
								tab+='</a>';
								tab+='<div class="isb-introduce-name">'+data[i].goods_name+'</div>';
								tab+='<div class="isb-introduce-zi">'+data[i].goods_english+'</div>';
								tab+='<div class="isb-introduce-zi">'+data[i].goods_size+'ml</div>';
								tab+='<div class="isb-introduce-star">';
									tab+='<img src="./images/star-blue.png">';
									tab+='<img src="./images/star-blue.png">';
									tab+='<img src="./images/star-blue.png">';
									tab+='<img src="./images/star-blue.png">';
									tab+='<img src="./images/star-blue.png">';
								tab+='</div>';
							tab+='</div>';
							tab+'<div class="isb-price">¥'+data[i].goods_price+'</div>';
						tab+='</div>';
						tab+='<div class="isb-buy">';
							tab+='<input type="submit" name="hurry-buy" value="'+data[i].goods_size+'ml" class="isb-buy-name1">';
						tab+='</div>';
						tab+='<div class="isb-buy1">'
							tab+='<input type="submit" name="hurry-buy" value="立即购买" onclick="getGoodsId('+data[i].goods_id+')" class="isb-buy-name">';
						tab+='</div></div>';
	               })
	               $("#right-goods-show").html(tab);
	            }
			})		
		})



		//点击购买
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
		}

	</script>
	<script type="text/javascript">
		//控制隐藏div快速浏览的显示

		$(document).ready(function(){
			$(document).on('mouseover','#isb-introduce',function(){
				$(this).children().eq(1).children().show();
			});

			$(document).on('mouseout','#isb-introduce',function(){
				$(this).children().eq(1).children().hide();
			});
		});
	</script>

</html>