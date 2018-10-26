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
	<title>编辑我的信息</title>
	<script src="js/jquery/2.0.0/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/3.3.6/bootstrap.css"/>
	<script src="js/bootstrap/3.3.6/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/bootstrap-3.3.4.css">
	<link rel="stylesheet" href="css/style.css">
			
			<link rel="stylesheet" type="text/css" href="css/mobile-bio-account.css"/>
			<link rel="stylesheet" type="text/css" href="css/default.css"/>
			<link rel="stylesheet" type="text/css" href="css/mobile-choose-content.css"/>
			<link rel="stylesheet" type="text/css" href="css/mobile-vip-center.css"/>
		    <script type="text/javascript" src="js/js/bio-account.js"></script>
	
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
									<span><a href="moblie-hadadmin-bio-account.php">	我的账户 </a></span><span> ></span>
									<span style="color: #535355;">	个人资料 </span>
								</div>
<div class="cnt_right" style="border-top: 2px solid #ccc;">
				<div class="split-line-div1" style="font-size: 30px;text-align: center;margin-top: 20px;margin-bottom: 20px;">
			
					<span class="split-line-text1">编辑我的信息</span>
	 
				</div>
				<form action="../api/information.api.php?act=umess" class="modify" method="post">
					<?php 
						$user_phone = $_SESSION['logname'];
						$okuser = $shop->checkUserName($user_phone);
						if($okuser[0]['sex']=='男士'){
							echo '<input class="" name="sex" type="radio" value="女" checked="checked"  />女士
									<input class="" name="sex" type="radio" value="男" style="margin: 25px 10px;" />男士';
						}else{
							echo '<input class="" name="sex" type="radio" value="女"  />女士
								<input class="" name="sex" type="radio" value="男" checked="checked"  style="margin: 25px 10px;" />男士';
						}
						echo '
								<span style="float: right">*为必填项</span>
								<br />
								<div class="model_box">
									<input type="text" id="user" name="user" class="modify_box" placeholder="您的姓名*" value="'; 
						echo $okuser[0]['name'];
						echo '" onblur="checkuser()"/>
									<div class=" user" style="color: #f00;"></div>
								</div>
								<div class="model_box">
									<input type="text" id="email" name="email" class="modify_box" placeholder="您的邮箱*" value="'; 
						echo $okuser[0]['qqcom'];
						echo '" onblur="checkemail()"/>
									<div class="email" style="color: #f00;"></div>
			
								</div>
								<div class="model_box">
									<input type="text" id="phone" name="phone" class="modify_box" placeholder="您的手机*" value="';
						echo $okuser[0]['user_phone'];
						echo '" onblur="checkphone()"/>
									<div class="phone" style="color: #f00;"></div>
								</div>
						';
					?>
				

					
					<div class="model_box">
					
							<div style="float: left;">
								<input type="text" id="code" placeholder="请输入验证码*" class="verification " maxlength="4" onblur="checkcode()" />
								<div  class="code" style="color: #f00;"></div>
								<span id="tishi1" style="color: #f00;"></span>
							</div>
							<img name="mrbb-pic" id="img_code" title="单击刷新验证码" class="verification_code" src="../../public/checkcode/code.php" style="cursor:pointer;" alt="" onclick="this.src='../../public/checkcode/code.php?id='+Math.random()">
							<div class="code_text">
								<span>看不清？</span>
								<a href="#"><span>换一张</span></a>
							</div>
					
						
					</div>
					<div style="margin-top: 20px;" >
						<a href="moblie-hadadmin-bio-account.php" style="text-decoration: none;color: #2B626F;" class="pwdbutton1">取消</a>
						<input type="submit"  class="pwdbutton2" value="保存修改"  onclick="return register();"/>
					</div>
				</form>
</div>
	
						
				
					
							
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
		function ajaxCheckCode() {
			$("#code").blur(function () {
				//alert($(this).val());
				$.ajax({
					url:"../api/user.api.php?act=ajaxCheckCode",
					type:'post',
					dataType:"html", //等我下是不是这个ikun问题读不到ikum。。没听到作业 尴尬继续吧
					data:{code:$(this).val()}, //是这样获取的，对吧？不知道哈哈
					success:function(res) {
						$("#tishi1").html(res);
					}
				})
			})
		}
		$(ajaxCheckCode);
		  function searchBoxSubmit(){
    var searchValue = $("#searchBox").val();
    var searchUrl =encodeURI('mobile-goods-fiflter.php?searchValue=' + searchValue+'&searchJudge=search');
    window.location.href =searchUrl;}
	</script>
</body>
</html>