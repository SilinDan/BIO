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
			
			<link rel="stylesheet" type="text/css" href="css/default.css"/>
			<link rel="stylesheet" type="text/css" href="css/mobile-choose-content.css"/>
			<link rel="stylesheet" type="text/css" href="css/moblie-admin-bio.css"/>
	<style type="text/css">
		.breadcrumb {
			background: #fff;
			margin-bottom: 0px;
			border-bottom: none;
			border-radius: 0px;
			padding: 8px 1px;
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
					<a href="moblie-helpcenter-bio.html">帮助中心</a>
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
		<div class="moblie-hadadmin-helpcenter-bio">
				<div class="mab-breadhead">
					<ul class="breadcrumb">
						<li><a href="default.v.php">首页</a></li>
						<li>帮助中心</li>
					</ul>
				</div>
				<div class="moblie-helpcenter-bio-head">
					帮助中心
				</div>
				<div class="moblie-helpcenter-bio-tou">
					常见问题>
				</div>
				<div class="moblie-helpcenter-bio-answer">
					<span style="font-size: 1.2em;">碧欧泉这个品牌创立了多长时间？</span><br>
					碧欧泉品牌已经有50多年的历史了。1952年创立，1970年被欧莱雅集团收购，并于1991年并入该集团的奢侈品部门。<br><br>
					<span style="font-size: 1.2em;">碧欧泉产品的产地在哪里？</span><br>  
					碧欧泉护理产品的研究和生产实验室位于摩纳哥。<br><br>
				</div>
				<div class="moblie-helpcenter-bio-tou">
					联系我们>
				</div>
				<div class="moblie-helpcenter-bio-answer">
					<span style="font-size: 1.2em;">我们提供一周7天服务（9:00－21:00）</span><br><br>
					<span class="glyphicon glyphicon-earphone"></span>官方订购热线：4008215518<br>
					<span class="glyphicon glyphicon-earphone"></span>顾客关怀中心：4008205215<br>
					欧莱雅中国有限公司<br>  
					地址：上海市静安区南京西路1601号<br><br>
				</div>
				<div class="moblie-helpcenter-bio-tou">
					隐私声明>
				</div>
				<div class="moblie-helpcenter-bio-answer-long">
					<span style="font-size: 1.2em;">本隐私政策如何适用？</span><br><br>
					本隐私政策适用于所有网站，应用程序，在线游戏/抽奖活动，以及由注册在中国大陆的欧莱雅集团实体发起或赞助的其他在线或者线下过程中个人信息被处理的活动（“平台”）。欧莱雅集团是指任何实体直接或者间接控制、被欧莱雅集团控制的实体、或者与另一个欧莱雅集团实体共同控制下的实体。请访问www.loreal.com以获取更多关于欧莱雅集团的信息。 本隐私政策不适用于第三方网站，包括那些我们平台可能提及的或通过链接可能访问的网站<br>  
				</div>
				<div class="moblie-helpcenter-bio-tou">
					使用条款>
				</div>
				<div class="moblie-helpcenter-bio-answer">
					<span style="font-size: 1.2em;">访问网站</span><br><br>
					访问并使用本网站，您必须已成年（已满18周岁）并拥有可用的且有效的电子邮件地址。如果您尚未成年，则必须提前得到父母的许可。<br>  <br>
					在访问本网站之前，您需要在表格中填写必填字段（以“*”作标记的字段）。任何不准确、不完整的注册将不会被接受。<br><br>
				</div>
				<div class="moblie-helpcenter-bio-tou">
					Cookies政策>
				</div>
				<div class="moblie-helpcenter-bio-answer-long">
					<span style="font-size: 1.2em;">什么是Cookies？</span><br><br>
					Cookies是当您在您的设备上（电脑，平板电脑或手机）访问互联网（包括我们的网站）时储存到您的电脑上的小型文本文档。<br>
					我们不会将 Cookies 用于本政策所述目的之外的任何用途。<br><br>
					<span style="font-size: 1.2em;">我们为何使用Cookies 以及我们使用哪些Cookies？</span><br><br>
					网页浏览器的默认设置通常被设为接收Cookies，但是您可以通过改变浏览器设置而轻松更改。<br>
				</div>
				<div class="moblie-helpcenter-bio-tou">
					产品信息>
				</div>
				<div class="moblie-helpcenter-bio-answer">
					<span style="font-size: 1.2em;">为什么男士的皮肤比较容易油腻？</span><br><br>
					皮脂分泌受到男性荷尔蒙，睾丸素的影响。特别是T字区，看上去特别油亮。如果皮脂分泌过剩，就会造成粉刺或肤色黯淡。<br>
					日常剃须，特别是使用湿剃的情况下，会改变两颊和脖子附近的皮肤状况，破坏皮脂膜。剃须过程也去掉了表皮层的自我防护，因此皮肤很容易脱水和干裂。 <br><br>
				</div>
				<div class="moblie-helpcenter-bio-tou">
					官网订购>
				</div>
				<div class="moblie-helpcenter-bio-answer-long">
					<span style="font-size: 1.2em;">订单概况</span><br>
					进行支付之前，您可以查看所有和订单有关的信息：产品、赠送的礼品和样品、送货地址、方式和费用，以及订单总额。确保您已认可常规销售条件，然后选中下列选项框进行支付：“我接受常规销售条件”。 <br><br>
					<span style="font-size: 1.2em;">付款和验证 </span><br>
					订单通过验证后，确认页面会告知您的订单编号。订单确认后，很快会发送一封电子邮件给您告知已接受您的服务需求。如果发出订单24小时后还未收到订单确认邮件，请通过电话400 821 5518（周一至周日上午9点至下午9点，免费）联系客服。<br><br>
				</div>
				<div class="moblie-helpcenter-bio-tou">
					我的欧碧泉账号>
				</div>
				<div class="moblie-helpcenter-bio-answer">
					<span style="font-size: 1.2em;">修改个人密码？</span><br><br>
					 登录后，点击“我的账户”链接。点击“修改我的个人信息”，进行必要的修改之后点击确认完成修改。忘记密码？<br>
					如果您忘记了自己密码，可以点击“忘记密码”链接。屏幕中央会出现一个窗口，输入您的电子邮箱或手机，完成相关验证，即可找回您的密码。<br>
				</div>
				<div class="moblie-helpcenter-bio-tou">
					配送及售后服务>
				</div>
				<div class="moblie-helpcenter-bio-answer-long">
					<span style="font-size: 1.2em;">商品退换货说明</span><br>
					您在碧欧泉官网订购的产品，凡在收到货物后发现以下情形的，可以在签收货物之日起7日内无条件退货或者换货<br><br>
					<span style="font-size: 1.2em;">产品断货或遗漏  </span><br>
					产品暂时断货如果某种产品暂时断货，当您将该产品添加到购物袋中时，会出现提示信息告知产品断货。或致电服务热线： 400-821-5518进行预约。 <br>
					如果订单已经确认，在产品准备过程中发现断货，客服部分会及时于您取得联系做相应的处理。产品包裹中有遗漏 <br>
				</div>
				<div class="moblie-helpcenter-bio-tou">
					我们的承诺>
				</div>
				<div class="moblie-helpcenter-bio-answer-long">
					<span style="font-size: 1.2em;">  碧欧泉产品全部采用天然成份，充分考虑人体皮肤的需求和效果。<br>  在www.biotherm.com.cn网站在线定购碧欧泉产品，我们承诺提供以下各项服务：</span><br><br>
					1. 安全支付   在定购过程中，您在一个受保护的网站（SSL 加密）中进行操作，确保您的私人信息保密。<br>
					2. 快速送达   我们的送货方合作伙伴将尽可能在您发出订单后2-7个工作日以内将定购产品送达。对于您在www.biotherm.com.cn网站进行采购所碰到的任何问题，都可以从碧欧泉客服部门得到相应回复。<br>
				</div>
				<div class="moblie-helpcenter-bio-tou">
					法律信息>
				</div>
				<div class="moblie-helpcenter-bio-answer-long">
					在依照法律所允许的最大范围内，包括(但不限于)免除标题的责任，商业活动，良好的质量，为某一特定目的的合适举措以及不侵犯所有权或第三方的权利，本网站与其所提供的内容不承担任何明确或是隐含类型的责任。而且，欧莱雅对本网站中所包含的功能不接受任何责任和义务，也不对本网站不中断运行或不出现差错或缺失将被修正作任何担保。欧莱雅不保证本网站与您的计算机配备兼容，也不保证本网站或它的服务不会带来差错或病毒、蠕虫或“木马程式”，欧莱雅对您遭受任何此类以破坏性为特征的损失不担负责任。欧莱雅对进入本网站的电话线以及您所使用装备的可靠性或持续有效性也不负有责任。<br>
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