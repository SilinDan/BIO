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
	<title>产品页面</title>
	<script src="js/jquery/2.0.0/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/3.3.6/bootstrap.css"/>
	<script src="js/bootstrap/3.3.6/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/bootstrap-3.3.4.css">
	<link rel="stylesheet" href="css/style.css">
			
			<link rel="stylesheet" type="text/css" href="css/default.css"/>
			<link rel="stylesheet" type="text/css" href="css/mobile-choose-content.css"/>
			<link rel="stylesheet" type="text/css" href="css/moblie-admin-bio.css"/>
      <link rel="stylesheet" type="text/css" href="./css/mobile-order-detial.css">
	
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
      			<a href="mobile-shoppincart.html"><img src="images/shoping.png" class="icon-shoping" ></a>
      	</div>
      	<div class="mobile-input">
      		<div class="mobile-input-serach">
            <input type="" name="" id="searchBox" value="" placeholder="绿活泉" onfocus="if (value =='绿活泉'){value =''}"onblur="if (value ==''){value='绿活泉'}"/>
            <button type="button" onclick="searchBoxSubmit()"></button>
          </div>
      	</div>			
      </div>
      
			<div class="mobile-content" style="background: #fff; min-width:320px;"> 
			<div class="moblie-hadadmin-address-bio">
					<div class="mab-breadhead" style="width: 90%;">
						<ul class="breadcrumb">
							<li><a href="default.v.php">首页</a></li>
							<li><a href="moblie-hadadmin-bio.php">我的账户</a></li>
							<li>我的订单</li>
						</ul>
					</div>

					<div class="mobile-order-detial-box">
            <div class="mobile-order-detial-top">
              <div class="order-detial-title font-grey">订单详情</div>
            </div>

            <div class="mobile-order-detial-middle1">
              <div class="order-detial-middle1-content font-grey">
								<?php
									$o_num = $_GET['num'];
									$ikum = $shop->checkOrderNum($o_num);//获取整条订单的信息1
									$userid = $ikum[0]['user_id'];
									$usermess = $shop->checkInfoUserId($userid);//获取整条用户的信息1
									$del = $shop->checkOrderDetail($o_num);//获取多条订单详情的信息2
									$ordernum = sizeof($del);
									echo '
											  <div class="order-date">下单日期： ';
									$n = $ikum[0]['order_time'];
									$time = date("Y-m-d H:i:s",$n);
									echo $time;
									echo '</div>
														<div class="order-date">订单号: '; 
									echo $o_num;
									echo'</div>
														<div class="order-date">订单状态: ';
									$sty = $ikum[0]['pay_state'];
									$o_sty = $ikum[0]['order_state'];	
									
										if($sty=='已支付'){
											echo '订单';
											echo $sty;
										}
										else if($o_sty=='已取消'){	
											echo '订单';
											echo $o_sty;
										}
										else if($sty=='待支付'){
											echo  '等待支付';
										}
											
									echo '</div>
														<div class="order-date">总价：  ¥'; 
									echo $ikum[0]['sum_price'];
									echo '</div>
													</div>
												</div>
						
												<div class="mobile-order-detial-middle2">
													商品
												</div>
											<div class="mobile-order-detial-goods-box">
									';
									for($i=0;$i<$ordernum;$i++){
										$g_id = $del[$i]['goods_id'];
										$g_mess = $shop->checkGood($g_id);
										echo '
												<div class="order-detial-goods">
													<div class="order-detial-goods-left"><img src="./images/';
										echo $g_mess[0]['goods_img'] ;			
										echo '" style="width: 122px;height: 122px;"></div>
													<div class="order-detial-goods-right">
													<div class="order-goods-name">';
										echo $g_mess[0]['goods_name'] ;
										echo '<span style="float:right;">￥';
										echo $g_mess[0]['goods_price'] ;
										echo '</span></div>
														<div class="order-goods-number">
															<div class="goods-number">数量';
										echo $del[$i]['goods_sum'] ;
										echo '</div>
															<div class="goods-price font-blue">￥'; 
										echo $g_mess[0]['goods_price']*$del[$i]['goods_sum'];
										echo '</div>
														</div>
													</div>
												</div>
										';
									}
									echo '
											</div>
											 <div class="mobile-order-detial-middle2">
												收货人信息
											</div>
					
											<div class="mobile-order-detial-middle3">
												<div class="order-detial-middle3-content font-grey">
													<div class="order-buyer-imformation">';
									echo $usermess[0]['user_name'];
									echo '</div>
													<div class="order-buyer-imformation">';
									echo $usermess[0]['province3'].$usermess[0]['city3'].$usermess[0]['area3'];
									echo '</div>
													<div class="order-buyer-imformation">'; 
									echo $usermess[0]['detailed_add'];
									echo '</div>
													<div class="order-buyer-imformation">邮编：';
									echo $usermess[0]['user_post'];
									echo '</div>
													<div class="order-buyer-imformation">手机：'; 
									echo $usermess[0]['user_phone'];
									echo '</div>
													<div class="order-buyer-imformation">留言：'; 
									echo $ikum[0]['message'];
									echo '</div>
												</div>
											</div>
											<div class="mobile-order-detial-middle2">
												支付方式
											</div>
											<div class="mobile-order-detial-middle4">'; 
									echo $ikum[0]['pay_way'];
									echo '</div>
					
											<div class="mobile-order-detial-middle2">
												发票信息
											</div>
											<div class="mobile-order-detial-middle4">是否需要发票：'; 
										$fapiao = $ikum[0]['invoice'];			
										if($fapiao!=null){
											echo '是';
											echo '<br>';
											echo '发票：';
											echo $fapiao;
										}
										else{
											echo '否';
										}
										echo '</div>
					';
									
								?>
              

          

           
            

            <div class="order-back"><a href="moblie-hadadmin-myorder-bio.php">返回订单列表</a></div>
            <div class="order-back"><a href="default.v.php">继续购物</a></div>

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
</body>
<script type="text/javascript">
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
</html>