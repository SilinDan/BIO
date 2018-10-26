<?php
    session_start();
    header('Content-type:text/html;charset=utf-8');
    include("../model/Db.class.php");
	include("../controller/shop.class.php");
	$shop = new Shop();
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>我的账户</title>
	<script src="js/jquery/2.0.0/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/3.3.6/bootstrap.css"/>
	<script src="js/bootstrap/3.3.6/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/bootstrap-3.3.4.css">
	<link rel="stylesheet" href="css/style.css">
			
			<link rel="stylesheet" type="text/css" href="css/mobile-bio-account.css"/>
			<link rel="stylesheet" type="text/css" href="css/regs-bio-add.css"/>
			<link rel="stylesheet" type="text/css" href="css/default.css"/>
			<link rel="stylesheet" type="text/css" href="css/mobile-choose-content.css"/>
			<link rel="stylesheet" type="text/css" href="css/mobile-vip-center.css"/>
			<script type="text/javascript" src="./js/js/Account-ChangePassword.js"></script>
	
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
                   <a href="moblie-hadadmin-bio.php">我的账户</a>
                </li>
                
                <li>
                   <a href="mobile-healing-community.php">愈颜社区</a>
                </li>
                <li>
                    <a href="mobile-shop-address.php">专柜地址</a>
                </li>
				<li>
					<a href="moblie-helpcenter-bio.php">帮助中心</a>
				</li>
				<li>
					<a href="mobile_brand_activity.php">品牌活动</a>
				</li>
				<li>
					<a href="mobile-vip-center.php">会员中心</a>
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
      			<?php
							if (isset($_SESSION['logname'])) {
											echo '<a href="moblie-hadadmin-bio.php"><img src="images/person.png" class="icon-person"></a>';
								}
								else{

											echo '<a href="moblie-admin-bio.php"><img src="images/person.png" class="icon-person"></a>';    	
								}
						?>
      			<a class="logo" href="default.v.php"title="Biotherm碧欧泉官方网上商城"></a>
      			<img src="images/search.png" class="icon-search">
      			<a href="mobile-shoppincart.html"><img src="images/shoping.png" class="icon-shoping" ></a>
      	</div>
      	<div class="mobile-input">
      		<div class="mobile-input-serach">
            <input type="" name="" id="searchBox" value="" placeholder="绿活泉" onfocus="if (value =='绿活泉'){value =''}"onblur="if (value ==''){value='绿活泉'}"/>
            <button typte="button" onclick="searchBoxSubmit()"></button>
          </div>
      	</div>			
      </div>
      
			<div class="mobile-content" style="background: #fff; min-width:320px ;"> 
				
								<div class="little-nav">
									<a href="default.v.php">	 首页 </a><span> ></span>
									<span>	我的账户 </span><span> ></span>
									<span style="color: #535355;">	个人资料 </span>
								</div>

			<div class="cnt_right" style="border-top: 2px solid #ccc;">
				<div class="split-line-div1" style="font-size: 30px;text-align: center;margin-top: 20px;margin-bottom: 20px;">
			
					<span class="split-line-text1">重新设置密码</span>
	
				</div>
				<form action="../api/information.api.php?act=update" method="post">	
						<?php
							if(isset($_SESSION['logname'])) {
								$user_phone = $_SESSION['logname'];
								$okuser = $shop->checkUserName($user_phone);
								$pwd123 = $okuser[0]['pwd'];
								
								echo '
										<input class="password_box" id="old_pwd" type="password" name="old_pwd" placeholder="旧密码:" onblur="checkold_pwd()" value="'; 
								echo $pwd123;
								echo '" />
								';
							}else{
								echo '
										<input class="password_box" id="old_pwd" type="password" name="old_pwd" placeholder="旧密码:" onblur="checkold_pwd()" '; 
								echo ' />';
							}
						?>
						<div class="old_pwd" style="float: left;position: relative;left: 10px;color: #f00;top: -4px;width: 400px;height: 10px;"></div>

					<input class="password_box" id="pwd" name="pwd" type="password" maxlength="30" placeholder="新密码:" onblur="checkpwd1()"/>
					<div class="pwdstrong">
						<div style="width:100%;height: 20px; border-left: 4px #D9534F solid;border-radius: 5px;">
							<div id="strong1" class="strong">密码强度</div>
						</div>
						<div class="pwd" style="color: #f00;""></div>
					</div>
					<input class="password_box" id="pwd2" name="pwd" type="password" maxlength="30" placeholder="确认新密码:" onblur="checkpwd2()"/>
					<div class="pwdstrong">
						<div style="width:100%;height: 20px; border-left: 4px #D9534F solid;border-radius: 5px;">
							<div id="strong2"  class="strong">密码强度</div>
						</div>
						<div class="pwd2" style="float: left;color: #f00;"></div>
					</div>
					<div style="color: #ADACAC; font-size: 12px; margin: 0 120px">8-30个字符</div>
					<div class="button_box">
						
						<a href="moblie-hadadmin-bio-account.php" style="text-decoration: none;color: #2B626F;" class="pwdbutton1">取消</a>
						<input type="submit"  class="pwdbutton2" value="提交"  onclick="return changePwd();"/>
					</div>
				
				</form>
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
	</script>
</body>
</html>
<script type="text/javascript">
$("#pwd").keyup(function() { 
						
  	switch($("#pwd").val().length ){
  		case 0: $("#strong1").text("密码强度");
  				$("#strong1").removeClass();
          		break;
    	case 1: $("#strong1").text("非常弱");
    			$("#strong1").removeClass();
    			$("#strong1").addClass("mrbq-red1");
          		break;
        case 2: $("#strong1").text("非常弱");
    			$("#strong1").removeClass();
    			$("#strong1").addClass("mrbq-red1");
          		break;
        case 3: $("#strong1").text("非常弱");
    			$("#strong1").removeClass();
    			$("#strong1").addClass("mrbq-red1");
          		break;
        case 4: $("#strong1").text("非常弱");
    			$("#strong1").removeClass();
    			$("#strong1").addClass("mrbq-red1");
          		break;
         case 5:$("#strong1").text("非常弱");
         		$("#strong1").removeClass();
    			$("#strong1").addClass("mrbq-red1");
          		break;	
    	case 6: $("#strong1").text("普通");
    			$("#strong1").removeClass();
             	$("#strong1").addClass("mrbq-red2");
            	break;
        case 7: $("#strong1").text("普通");
          		$("#strong1").removeClass();
             	$("#strong1").addClass("mrbq-red21");
            	break;
    	case 8: $("#strong1").text("中等");
    			$("#strong1").removeClass();
            	$("#strong1").addClass("mrbq-red3");
            	break;
        case 9: $("#strong1").text("中等");
          		$("#strong1").removeClass();
            	$("#strong1").addClass("mrbq-red31");
            	break;
        case 10:$("#strong1").text("中等");
          		$("#strong1").removeClass();
            	$("#strong1").addClass("mrbq-red32");
            	break;
        case 11:$("#strong1").text("中等");
          		$("#strong1").removeClass();
            	$("#strong1").addClass("mrbq-red33");
            	break;
    	case 12:$("#strong1").text("强");
    			$("#strong1").removeClass();
             	$("#strong1").addClass("mrbq-red4");
             	break;
        case 13:$("#strong1").text("强");
          		$("#strong1").removeClass();
             	$("#strong1").addClass("mrbq-red41");
            	break;
        case 14:$("#strong1").text("强");
          		$("#strong1").removeClass();
             	$("#strong1").addClass("mrbq-red42");
            	break;

        default:$("#strong1").text("非常强");
             	$("#strong1").addClass("mrbq-red5");
            	break;
   
   }
 });

	</script> 
	<script type="text/javascript">
		  $("#pwd2").keyup(function() { 

	    	switch($("#pwd2").val().length ){
	    		case 0: $("#strong2").text("密码强度");
	    				$("#strong2").removeClass();
	            		break;
	      		case 1: $("#strong2").text("非常弱");
	      				$("#strong2").removeClass();
	      				$("#strong2").addClass("mrbq-red1");
	            		break;
	            case 2: $("#strong2").text("非常弱");
	      				$("#strong2").removeClass();
	      				$("#strong2").addClass("mrbq-red1");
	            		break;
	           	case 3: $("#strong2").text("非常弱");
	      				$("#strong2").removeClass();
	      				$("#strong11").addClass("mrbq-red1");
	            		break;
	            case 4: $("#strong2").text("非常弱");
	      				$("#strong2").removeClass();
	      				$("#strong2").addClass("mrbq-red1");
	            		break;
	           	case 5: $("#strong2").text("非常弱");
	           			$("#strong2").removeClass();
	      				$("#strong2").addClass("mrbq-red1");
	            		break;	
	      		case 6: $("#strong2").text("普通");
	      				$("#strong2").removeClass();
	               		$("#strong2").addClass("mrbq-red2");
	              		break;
	            case 7: $("#strong2").text("普通");
	            		$("#strong2").removeClass();
	               		$("#strong2").addClass("mrbq-red21");
	              		break;
	      		case 8: $("#strong2").text("中等");
	      				$("#strong2").removeClass();
	              		$("#strong2").addClass("mrbq-red3");
	              		break;
	            case 9: $("#strong2").text("中等");
	            		$("#strong2").removeClass();
	              		$("#strong2").addClass("mrbq-red31");
	              		break;
	            case 10:$("#strong2").text("中等");
	            		$("#strong2").removeClass();
	              		$("#strong2").addClass("mrbq-red32");
	              		break;
	            case 11:$("#strong2").text("中等");
	            		$("#strong2").removeClass();
	              		$("#strong2").addClass("mrbq-red33");
	              		break;
	      		case 12:$("#strong2").text("强");
	      				$("#strong2").removeClass();
	               		$("#strong2").addClass("mrbq-red4");
	               		break;
	            case 13:$("#strong2").text("强");
	            		$("#strong2").removeClass();
	               		$("#strong2").addClass("mrbq-red41");
	              		break;
	            case 14:$("#strong2").text("强");
	            		$("#strong2").removeClass();
	               		$("#strong2").addClass("mrbq-red42");
	              		break;

	            default:$("#strong2").text("非常强");
	               		$("#strong2").addClass("mrbq-red5");
	              		break;
	     
	     }
	   });

        function searchBoxSubmit(){
    var searchValue = $("#searchBox").val();
    var searchUrl =encodeURI('mobile-goods-fiflter.php?searchValue=' + searchValue+'&searchJudge=search');
    window.location.href =searchUrl;}
	</script>