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
			<link rel="stylesheet" type="text/css" href="css/default.css"/>
			<link rel="stylesheet" type="text/css" href="css/mobile-goods-fiflter.css"/>
			<link rel="stylesheet" type="text/css" href="css/bootstrap/3.3.6/bootstrap.css"/>
			<script src="js/bootstrap/3.3.6/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="css/style.css">
<style>
    .goods-small img {
        height: 200px;
    }
    .mdbbp5-img img {
        top: 40%;
    }
</style>
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
      			<a class="logo" href="default.v.php" title="Biotherm碧欧泉官方网上商城"></a>
      			<img src="images/search.png" class="icon-search">
      			<a href="mobile-shoppingcart1.php"><img src="images/shoping.png" class="icon-shoping" ></a>
      	</div>
      	<div class="mobile-input">
      		<div class="mobile-input-serach">
      			<input type="" name="" id="searchBox" value="" placeholder="绿活泉" onfocus="if (value =='绿活泉'){value =''}"onblur="if (value ==''){value='绿活泉'}"/>
      			<button typte="button" onclick="searchBoxSubmit()"></button>
      		</div>
      	</div>			
      </div>
      
			<div class="mobile-content" style="background: #fff; min-width:320px ;"> 
            		<div class="mobile-banner">
            			<div id="myCarousel" class="carousel slide">
            				<!-- 轮播（Carousel）指标 -->
            				<ol class="carousel-indicators">
            					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            					<li data-target="#myCarousel" data-slide-to="1"></li>
            					<li data-target="#myCarousel" data-slide-to="2"></li>
            				</ol>   
            				<!-- 轮播（Carousel）项目 -->
            				<div class="carousel-inner">
            					<div class="item active">
            						<img src="images/1.jpg" alt="First slide">
            					</div>
            					<div class="item">
            						<img src="images/2.jpg" alt="Second slide">
            					</div>
            					<div class="item">
            						<img src="images/6.jpg" alt="Third slide">
            					</div>
            				</div>
            			</div> 	
            		</div>
            		<div class="mobile-gift">
            			<a href="mobile-giftcenter.php">
            				<div class="mobile-tehui-small">
            					<span class="font-tehui">特惠礼盒</span>
            					<div class="bootstrap-icon">
            						<span class="glyphicon glyphicon-gift"></span>
            						<span class="glyphicon glyphicon-chevron-right"></span>
            					</div>
            				</div>
            			</a>
            			<a href="mobile-giftcenter.php">
            				<div class="mobile-mane-small">
            					<span class="font-tehui">满额礼赠</span>
            					<div class="bootstrap-icon">
            						<span class="glyphicon glyphicon-signal"></span>
            						<span class="glyphicon glyphicon-chevron-right"></span>
            					</div>
            				</div>
            			</a>
            		</div>
            		<div class="mobile-star-goods-banner">
            		<div id="yourCarousel" class="carousel slide">
            			<!-- 轮播（Carousel）项目 -->
            			<div class="carousel-inner" >
            				<div class="item active">
            					<div class="mobile-star-goods" >
            						<h1>明星单品</h1>
            						<div class="goods-bunner" id="goods_one">
            							
            						</div>
            					</div>
            				</div>
            				<div class="item"><div class="mobile-star-goods" ><h1>明星单品</h1><div class="goods-bunner" id="goods_two"></div></div></div>
                            <div class="item"><div class="mobile-star-goods" ><h1>明星单品</h1><div class="goods-bunner" id="goods_three"></div></div></div>
                            <div class="item"><div class="mobile-star-goods" ><h1>明星单品</h1><div class="goods-bunner" id="goods_four"></div></div></div>
                           <div class="item"><div class="mobile-star-goods" ><h1>明星单品</h1><div class="goods-bunner" id="goods_five"></div></div></div>
            				<!-- <div class="item">
            					<img src="/wp-content/uploads/2014/07/slide3.png" alt="Third slide">
            				</div> -->
            			</div>
            			<!-- 轮播（Carousel）导航 -->
            			<a class="left carousel-control" href="#yourCarousel" role="button" data-slide="prev">
            				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            				<span class="sr-only">Previous</span>
            			</a>
            			<a class="right carousel-control" href="#yourCarousel" role="button" data-slide="next">
            				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            				<span class="sr-only">Next</span>
            			</a>
            		</div> 
            			
            		</div>
            		<div class="mobile-star-goods">
            			<h1>特惠礼盒</h1>
            				<div class="goods-bunner" id="giftBox">	
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
	<script src="js/jquery-validation-1.14.0/lib/jquery.js"" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery-validation-1.14.0/dist/jquery.validate.min.js" type="text/javascript" charset="utf-8"></script>
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
		
         
	</script>

    <script type="text/javascript" src="./js/js/index.js"></script>
</body>
</html>