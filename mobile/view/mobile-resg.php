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
	<script type="text/javascript" src="./js/js/moblie-resg-bio.js"></script>
	<script type="text/javascript" src="./js/js/checkcode.js"></script>
	<script src="js/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/js/mobile-admin-bio.js" type="text/javascript" charset="utf-8"></script>
	<style type="text/css">
		.border-red{
			border: 1px solid #f00;
		}
		.border-blue{
			border: 1px solid #99BBF2;
		}
		.ok{
			color: #f00;
			font-size: 12px;
			float: right;
			line-height: 27px;
		}
		.ok1{
			color: #f00;
			font-size: 12px;
			float: right;
			padding-right: 29%;
		}
	</style>

	<script type="text/javascript">
		function ajaxCheckUser() {
			$("#user").blur(function () {
				//alert($(this).val());
				$.ajax({
					url:"../api/resg.api.php?act=ajaxCheckUser",
					type:'post',
					dataType:"html", //等我下是不是这个ikun问题读不到ikum。。没听到作业 尴尬继续吧
					data:{user:$(this).val()}, //是这样获取的，对吧？不知道哈哈
					success:function(res) {
						$("#tishi").html(res);
					}
				})
			})
		}
		$(ajaxCheckUser)
		function ajaxCheckCode() {
			$("#code").blur(function () {
				//alert($(this).val());
				$.ajax({
					url:"../api/resg.api.php?act=ajaxCheckCode",
					type:'post',
					dataType:"html", //等我下是不是这个ikun问题读不到ikum。。没听到作业 尴尬继续吧
					data:{code:$(this).val()}, //是这样获取的，对吧？不知道哈哈
					success:function(res) {
						$("#tishi1").html(res);
					}
				})
			})
		}
		$(ajaxCheckCode)
	</script>
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
							<li>新用户注册</li>
						</ul>
					</div>
					<div class="moblie-admin-bio-head">
						注册成为会员
					</div>
					<div class="moblie-admin-bio-goto">
						我是已注册用户，前往 <a href="moblie-admin-bio.php">登录</a>
					</div>
		
					
					<form action="../api/resg.api.php?act=reg" method="post" id="mytrform" >
						<table>
							<div class="moblie-resg-bio-chock">
								<input type="radio" checked="ture" name="sex" value="女士">女士
								<input type="radio" name="sex" value="男士">男士
								*为必填项
							</div>

							<div class="moblie-resg-bio-box">
								<input class="mrbb-name" id="user" type="text " name="user" placeholder="您的邮箱/手机*" onblur="checkuser()">
								<div id="tishi" class="ok"></div>
							</div>
							<div class="tips user"></div>
							

							<div class="moblie-resg-bio-box">
								<input class="mrbb-name" id="pwd1" type="password" name="pwd" placeholder="密码" onblur="checkpwd1()">
							</div>
							<div class="moblie-resg-bio-qiangdu">
							
								<div id="mrbq-red">密码强度</div>
								
							</div>
							
						
							<div class="tips pwd1"></div>
							<div class ="tips" ></div>
							<div class="moblie-resg-bio-tis">
								8-30个字符
							</div>
							<div class="moblie-resg-bio-box">
								<input class="mrbb-name" id="pwd2" type="password" name="pwd2" placeholder="确认密码" onblur="checkpwd2()">
							</div>
							<div class="moblie-resg-bio-qiangdu">
								<div id="mrbq-red1">密码强度</div>
								
							</div>
							

								<div class="tips pwd2"></div>
							<div class="moblie-resg-bio-tis">
								
							</div>

							<div class="moblie-resg-bio-box">
								<input class="mrbb-name" id="mrbb-name1" type="text " name="phone"   placeholder="您的手机*" onblur="checkphone()"/>
							</div>
							<div class="tips phone" ></div>
							

							<div class="moblie-resg-bio-box">
								<input class="mrrb-name" id="code" type="text " name="code" placeholder="请输入验证码*" maxlength="4" onblur="checkcode()">
								
								<!-- <input type="text" name="mrbb-pic" class="mrrb-pic"> -->
								<img name="mrbb-pic" id="img_code" title="单击刷新验证码" class="mrrb-pic" src="../../public/checkcode/code.php" style="cursor:pointer;" alt="" onclick="this.src='../../public/checkcode/code.php?id='+Math.random()">
								<div class="mrrb-zi">看不清？<a href="javascript:chang_codes()">换一张</a></div>
							</div>




							
							







							<div class="tips code"></div>
							<div id="tishi1" class="ok1"></div>

							<div class="moblie-resg-bio-premit-all">
								<div class="moblie-resg-bio-premit">
									<input type="checkbox" id="check"  name="list[]">

									<div class="mrbp-zi " id="zi">我愿意订阅碧欧泉电子杂志，及时接收最新资讯和促销信息。</div>
								</div>
								<div class="moblie-resg-bio-premit">
									<input type="checkbox" id="check1"  name="list1[]">
									<div class="mrbp-zi" id="zi1">我同意依照本使用条款和隐私政策对我的个人信息进行收集和使用；我已阅读并确认被给予充分机会理解该使用条款和隐私政策的内容。</div>
								</div>
							</div>
							
							<div class="moblie-admin-bio-box">
								<input class="mrbb-name-admin" type="submit" name="mabb-name" value="立即注册" onclick="return register();">
							</div>
						</table>
					</form>
					<div class="moblie-admin-bio-callup">
					<div class="mabc-up">
						<div class="mabc-help1">联系我们</div>
						<div class="mabc-help"><a href="moblie-helpcenter-bio.php">帮助中心></a></div>
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
				</div>
				<div class="moblie-admin-bio-bai"></div>
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
	<script type="text/javascript" src="./js/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="./js/js/bio-header.js"></script>
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
	</script>
	
	<script type="text/javascript">
									  
	  $("#pwd1").keyup(function() { 
							
	  	switch($("#pwd1").val().length ){
	  		case 0: $("#mrbq-red").text("密码强度");
	  				$("#mrbq-red").removeClass();
	          		break;
	    	case 1: $("#mrbq-red").text("非常弱");
	    			$("#mrbq-red").removeClass();
	    			$("#mrbq-red").addClass("mrbq-red1");
	          		break;
	        case 2: $("#mrbq-red").text("非常弱");
	    			$("#mrbq-red").removeClass();
	    			$("#mrbq-red").addClass("mrbq-red1");
	          		break;
	        case 3: $("#mrbq-red").text("非常弱");
	    			$("#mrbq-red").removeClass();
	    			$("#mrbq-red").addClass("mrbq-red1");
	          		break;
	        case 4: $("#mrbq-red").text("非常弱");
	    			$("#mrbq-red").removeClass();
	    			$("#mrbq-red").addClass("mrbq-red1");
	          		break;
	         case 5:$("#mrbq-red").text("非常弱");
	         		$("#mrbq-red").removeClass();
	    			$("#mrbq-red").addClass("mrbq-red1");
	          		break;	
	    	case 6: $("#mrbq-red").text("普通");
	    			$("#mrbq-red").removeClass();
	             	$("#mrbq-red").addClass("mrbq-red2");
	            	break;
	        case 7: $("#mrbq-red").text("普通");
	          		$("#mrbq-red").removeClass();
	             	$("#mrbq-red").addClass("mrbq-red21");
	            	break;
	    	case 8: $("#mrbq-red").text("中等");
	    			$("#mrbq-red").removeClass();
	            	$("#mrbq-red").addClass("mrbq-red3");
	            	break;
	        case 9: $("#mrbq-red").text("中等");
	          		$("#mrbq-red").removeClass();
	            	$("#mrbq-red").addClass("mrbq-red31");
	            	break;
	        case 10:$("#mrbq-red").text("中等");
	          		$("#mrbq-red").removeClass();
	            	$("#mrbq-red").addClass("mrbq-red32");
	            	break;
	        case 11:$("#mrbq-red").text("中等");
	          		$("#mrbq-red").removeClass();
	            	$("#mrbq-red").addClass("mrbq-red33");
	            	break;
	    	case 12:$("#mrbq-red").text("强");
	    			$("#mrbq-red").removeClass();
	             	$("#mrbq-red").addClass("mrbq-red4");
	             	break;
	        case 13:$("#mrbq-red").text("强");
	          		$("#mrbq-red").removeClass();
	             	$("#mrbq-red").addClass("mrbq-red41");
	            	break;
	        case 14:$("#mrbq-red").text("强");
	          		$("#mrbq-red").removeClass();
	             	$("#mrbq-red").addClass("mrbq-red42");
	            	break;
	
	        default:$("#mrbq-red").text("非常强");
	             	$("#mrbq-red").addClass("mrbq-red5");
	            	break;
	   
	   }
	 });
	
		</script> 
	<script type="text/javascript">
			 $("#pwd2").keyup(function() { 
	
		    	switch($("#pwd2").val().length ){
		    		case 0: $("#mrbq-red1").text("密码强度");
		    				$("#mrbq-red1").removeClass();
		            		break;
		      		case 1: $("#mrbq-red1").text("非常弱");
		      				$("#mrbq-red1").removeClass();
		      				$("#mrbq-red1").addClass("mrbq-red1");
		            		break;
		            case 2: $("#mrbq-red1").text("非常弱");
		      				$("#mrbq-red1").removeClass();
		      				$("#mrbq-red1").addClass("mrbq-red1");
		            		break;
		           	case 3: $("#mrbq-red1").text("非常弱");
		      				$("#mrbq-red1").removeClass();
		      				$("#mrbq-red1").addClass("mrbq-red1");
		            		break;
		            case 4: $("#mrbq-red1").text("非常弱");
		      				$("#mrbq-red1").removeClass();
		      				$("#mrbq-red1").addClass("mrbq-red1");
		            		break;
		           	case 5: $("#mrbq-red1").text("非常弱");
		           			$("#mrbq-red1").removeClass();
		      				$("#mrbq-red1").addClass("mrbq-red1");
		            		break;	
		      		case 6: $("#mrbq-red1").text("普通");
		      				$("#mrbq-red1").removeClass();
		               		$("#mrbq-red1").addClass("mrbq-red2");
		              		break;
		            case 7: $("#mrbq-red1").text("普通");
		            		$("#mrbq-red1").removeClass();
		               		$("#mrbq-red1").addClass("mrbq-red21");
		              		break;
		      		case 8: $("#mrbq-red1").text("中等");
		      				$("#mrbq-red1").removeClass();
		              		$("#mrbq-red1").addClass("mrbq-red3");
		              		break;
		            case 9: $("#mrbq-red1").text("中等");
		            		$("#mrbq-red1").removeClass();
		              		$("#mrbq-red1").addClass("mrbq-red31");
		              		break;
		            case 10:$("#mrbq-red1").text("中等");
		            		$("#mrbq-red1").removeClass();
		              		$("#mrbq-red1").addClass("mrbq-red32");
		              		break;
		            case 11:$("#mrbq-red1").text("中等");
		            		$("#mrbq-red1").removeClass();
		              		$("#mrbq-red1").addClass("mrbq-red33");
		              		break;
		      		case 12:$("#mrbq-red1").text("强");
		      				$("#mrbq-red1").removeClass();
		               		$("#mrbq-red1").addClass("mrbq-red4");
		               		break;
		            case 13:$("#mrbq-red1").text("强");
		            		$("#mrbq-red1").removeClass();
		               		$("#mrbq-red1").addClass("mrbq-red41");
		              		break;
		            case 14:$("#mrbq-red1").text("强");
		            		$("#mrbq-red1").removeClass();
		               		$("#mrbq-red1").addClass("mrbq-red42");
		              		break;
	
		            default:$("#mrbq-red1").text("非常强");
		               		$("#mrbq-red1").addClass("mrbq-red5");
		              		break;
		     
		     }
		   });
			  //点击购买
        function getGoodsId($id) {
            $.ajax({
                url:"../../home/api/index1.api.php?act=add",
                type:"get",
                dataType:"json",
                data:{"id":$id},
                success:function(data){
                   if(data==0){
                    window.location.href="moblie-admin-bio.php";
                    
                   }else{
                     window.location.href="mobile-shoppingcart1.php";
                   }
                }
            })
        }

        function searchBoxSubmit(){
    var searchValue = $("#searchBox").val();
    var searchUrl =encodeURI('mobile-goods-fiflter.php?searchValue=' + searchValue+'&searchJudge=search');
    window.location.href =searchUrl;}

		</script>
	
</body>
</html>