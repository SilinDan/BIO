<?php
    session_start();
    header('Content-type:text/html;charset=utf-8');
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>产品页面</title>
	<script src="js/jquery/2.0.0/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/3.3.6/bootstrap.css"/>
	<script src="js/bootstrap/3.3.6/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/bootstrap-3.3.4.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- <link rel="stylesheet" type="text/css" href="./css/user-panel.css">	 -->	
	<link rel="stylesheet" type="text/css" href="css/default.css"/>
	<link rel="stylesheet" type="text/css" href="css/mobile-choose-content.css"/>
	<link rel="stylesheet" type="text/css" href="css/moblie-admin-bio.css"/>
	<link rel="stylesheet" type="text/css" href="css/moblie-resg-bio.css"/>
	<script src="js/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/js/mobile-admin-bio.js" type="text/javascript" charset="utf-8"></script>
	<style type="text/css">
		.border-red{
			border: 1px solid #f00;
		}
		.border-blue{
			border: 1px solid #99BBF2;
		}
	</style>

	<!-- <script type="text/javascript">
		function verificationUser(){
			var num=/^[1][\d]{9}[\d]$/g;
			var email=/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/;
			if($("#input-id").val()==""){
				$(".tips-user").text("请输入您的邮箱或手机号");
				$("#input-id").addClass("border-red").removeClass("border-blue");
				
			}else if(num.test($("#input-id").val())||email.test($("#input-id").val())){
				$(".tips-user").text("");
				$("#input-id").addClass("border-blue");
				
			}else {
				$(".tips-user").text("请输入有效的邮箱或手机号");
				$("#input-id").addClass("border-red").removeClass("border-blue");
			}
			
		}
		function verificationPwd(){
			if($("#input-pwd").val()==""){
				$(".tips-pwd").text("请输入您的密码");
				$("#input-pwd").addClass("border-red").removeClass("border-blue");
			}else if($("#input-pwd").val().length<8){
				$(".tips-pwd").text("请输入8-30个字符");
				$("#input-pwd").addClass("border-red").removeClass("border-blue");
			}else {
				$(".tips-pwd").text("");
				$("#input-pwd").addClass("border-blue");
			}
		}
	</script> -->
</head>
<body>
	
	<div id="wrapper">
        <div class="overlay"></div>
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                      <img src="images/logo-primary-mobile.png" alt="" style="width: 100%;">
                    </a>
                </li>
                <li>
                		<a href="mobile-free-try.php">免费试用</a>
                </li>
                <li>
                <a href="mobile-choose-yours.php">选择您的护肤品</a>
                </li>
                <li>
                <a href="moblie-hadadmin-bio.html">我的账户</a>
                </li>
                <li>
                	<a href="mobile-healing-community.php">愈颜社区</a>
                </li>
                <li>
                	<a href="mobile-shop-address.php">专柜地址</a>
                </li>
				<li>
					<a href="moblie-helpcenter-bio.html">帮助中心</a>
				</li>
				<li>
					<a href="mobile_brand_activity.php">品牌活动</a>
				</li>
				<li>
					<a href="mobile-vip-center.html">会员中心</a>
				</li>
            </ul>
			
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
      <div class="mobile-header">
      	<div class="mobile-top">
      			<button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
      				<span class="hamb-top"></span>
      				<span class="hamb-middle"></span>
      				<span class="hamb-bottom"></span>
      			</button>
      			<a href="moblie-admin-bio.php"><img src="images/person.png" class="icon-person"></a>	
      			<a class="logo" href="default.v.php" title="Biotherm碧欧泉官方网上商城"></a>
      			<img src="images/search.png" class="icon-search">
      			<img src="images/shoping.png" class="icon-shoping" >
      	</div>
      	<div class="mobile-input">
      		<div class="mobile-input-serach">
            <input type="" name="" id="searchBox" value="" placeholder="绿活泉" onfocus="if (value =='绿活泉'){value =''}"onblur="if (value ==''){value='绿活泉'}"/>
            <button type="button" onclick="searchBoxSubmit()"></button>
          </div>
      	</div>			
      </div>
      
			<div class="mobile-content" style="background: #fff; min-width:320px ;"> 
				<div class="moblie-admin-bio">
					<div class="mab-breadhead">
						<ul class="breadcrumb">
							<li><a href="default.v.php">首页</a></li>
							<li>已注册用户登录</li>
						</ul>
					</div>
					<div class="moblie-admin-bio-head">
						用户登录
					</div>
					<div class="moblie-admin-bio-goto">
						我还是新用户，前往 <a href="mobile-resg.php">注册</a>
					</div>
					<form action="../api/index.api.php?act=login" method="post">
					<div class="moblie-admin-bio-box">
						<input class="mabb-name" id="input-id" type="text " name="logname" placeholder="您的邮箱/手机*" onblur="verificationUser()">
						<div style=" position: absolute;color: #f00;font-size: 1.2rem;" class="tips-user"></div>
					</div>
		
					<div class="moblie-admin-bio-box">
						<input class="mabb-name" id="input-pwd" type="password" name="logpwd" placeholder="您的密码*" onblur="verificationPwd()">
						<div style=" position: absolute;color: #f00;font-size: 1.2rem;" class="tips-pwd"></div>
					</div>
					
					<div class="moblie-admin-bio-forget">
						<a href="">忘记密码？</a>
						<span class="mabf-rember">
							<i class="iconfont icon-tijiao"></i>
							<a href="">记住用户名</a>
						</span>
					</div>
					<div class="moblie-admin-bio-box">
						<input type="submit" name="bio_denglu" value="登录" class="mabb-name-admin" >
					</div>
					</form>
					
					<div class="moblie-admin-bio-huo">
						<div class="mabh-left"></div>
						<div class="mabh-center">或</div>
						<div class="mabh-left"></div>
					</div>
					<div class="moblie-admin-bio-fri">
						使用合作网站账号登录
					</div>
					<div class="moblie-admin-bio-puin">
						<div class="mabp-qq">QQ</div>
						<div class="mabp-weibo">微博</div>
						<div class="mabp-alipay">支付宝</div>
					</div>
					<div class="moblie-admin-bio-bai"></div>
					<div class="moblie-admin-bio-callup">
						<div class="mabc-up">
							<div class="mabc-help1">联系我们</div>
							<div class="mabc-help"><a href="">帮助中心></a></div>
						</div>
						<div class="mabc-name">
							我们提供一周7天服务（9:00 - 21:00）
						</div>
						<div class="mabc-name1">
							官网订购热线：4008215518
						</div>
						<div class="mabc-name1">
							顾客关怀中心：4008205215
						</div>
						<div class="mabc-name1">
							欧莱雅中国有限公司
						</div>
						<div class="mabc-name1">
							地址：上海市静安区南京西路1601号
						</div>
					</div>
					<div class="moblie-admin-bio-bai"></div>
				</div>
				
                		<div class="mobile-footer-zhifubao">
                			<div class="footer-car-content">
                				<img src="images/footer-car.png" width="15%">
                				<span class="footer-font-white">支持支付宝，在线支付免运费</span>
                			</div>	
                		</div>
                		<div class="mobile-footer-call">
                			<span>官方订购热线：400 821 5518 | 顾客关怀中心：400 820 5215</span>
                		</div>
                		<div class="mobile-footer-about">
                			<span>关注我们</span>
                			<img src="images/sina.jpg" ><br />
                				<a href="">
                				<img src="images/police.png" >
                				<span style="font-size: 0.7rem;color: #101010;">沪公网安备 31010602001504号</span>
                				</a><br />
                		
                				<a href="">
                				<img src="images/police_badge_icon.jpg" >
                				<span>沪ICP备08100043号-26</span>
                				</a><br />
                				<a href="#"><span class="use-underline">使用条款</span></a>
                				<a href="#"><span class="use-underline">cookies政策</span></a>
                				<a href="#"><span class="use-underline">隐私声明</span></a>
                		</div>
                			 <div class="mobile-bottom">
                      <a href="default.v.php">首页</a>
                      <a href="mobile-goods-fiflter.php?searchValue=护肤&searchJudge=second">头部</a>
                      <a href="mobile-goods-fiflter.php?searchValue=牛奶润肤&searchJudge=second">身体</a>
                      <a href="mobile-goods-fiflter.php?searchValue=防晒&searchJudge=second">防晒</a>
                      <a href="mobile-goods-fiflter.php?searchValue=男士产品&searchJudge=man"">男士</a>
                    </div>
     </div>	
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
	
	<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
	<script src="http://www.jq22.com/jquery/bootstrap-3.3.4.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
		  var trigger = $('.hamburger'),
		      overlay = $('.overlay'),
		     isClosed = false;

		    trigger.click(function () {
		      hamburger_cross();      
		    });

		    function hamburger_cross() {

		      if (isClosed == true) {          
		        overlay.hide();
		        trigger.removeClass('is-open');
		        trigger.addClass('is-closed');
		        isClosed = false;
		      } else {   
		        overlay.show();
		        trigger.removeClass('is-closed');
		        trigger.addClass('is-open');
		        isClosed = true;
		      }
		  }
		  
		  $('[data-toggle="offcanvas"]').click(function () {
		        $('#wrapper').toggleClass('toggled');
		  });  
		});
		$(document).ready(function(){
            $(".icon-search").click(function(){
               if ($(".mobile-input").css("display")=="none"){
                 $(".mobile-input").css("display","block");
               }else{
                 $(".mobile-input").css("display","none");
               }               
            });
          });
		    function searchBoxSubmit(){
    var searchValue = $("#searchBox").val();
    var searchUrl =encodeURI('mobile-goods-fiflter.php?searchValue=' + searchValue+'&searchJudge=search');
    window.location.href =searchUrl;}

	</script>
</body>
</html>