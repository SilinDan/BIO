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
	<link rel="stylesheet" type="text/css" href="css/delete-box.css"/>
			
			<link rel="stylesheet" type="text/css" href="css/default.css"/>
			<link rel="stylesheet" type="text/css" href="css/mobile-choose-content.css"/>
			<link rel="stylesheet" type="text/css" href="css/moblie-admin-bio.css"/>
      <link rel="stylesheet" type="text/css" href="./css/mobile_hadadmin_myorder.css">
</head>
<body>
	<div id="beijing" class="beijing"></div>
	<div id="suredel" class="suredel">
		<div class="wenhao">你确认要删除吗？<span style="display: none;" id="shopid"></span></div>
		<a class="sure" href="#" id="querem" onclick="queRen()">确认</a><a href="#" onclick="quXiao()" id="sure" class="sure">取消</a>
	</div>
					
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
			<div class="moblie-hadadmin-address-bio">
					<div class="mab-breadhead">
						<ul class="breadcrumb">
							<li><a href="default.v.php">首页</a></li>
							<li><a href="moblie-hadadmin-bio.php">我的账户</a></li>
							<li>我的订单</li>
						</ul>
					</div>
					<div class="moblie-admin-bio-head">
						我的订单
					</div>

          <?php 
            if(isset($_SESSION['logname'])) {
                  $user_phone = $_SESSION['logname'];
                  $ikum = $shop->checkUserName($user_phone);//获取整条用户的信息
                  $id = $ikum[0]['id'];
                  $ikum = $shop->checkOrder($id);//获取多条订单的信息
                  $order_all = sizeof($ikum);
                  $dai1 =0;
                  $had = 0;
                  for($i=0; $i < $order_all; $i++){
                    $sty = $ikum[$i]['pay_state'];
                    $oderstate = $ikum[$i]['order_state'];
                    if($sty=='待支付'&&$oderstate=='待确认'){
                        $dai1++;
                    }
                    else{
                      $had++;
                    }
                  }
                  if($dai1!=0){

                    //输出未完成订单数量和已完成订单数量
                    echo '
                      <div class="moblie-hadadmin-myorder-bio-box">
                        <a href="moblie-hadadmin-myorder-bio.php"><div class="mhmbb-left">
                          未完成订单（';
                    echo $dai1;
                    echo '）
                        </div></a>
                        <a href="moblie-hadadmin-myorder-finished-bio.php"><div class="mhmbb-right">
                          已完成订单（';
                    echo $had;
                    echo '）
                        </div></a>
                      </div>';

                    echo '<div class="moblie-hadadmin-order-box">';

                        for($i=0; $i < $order_all; $i++){ 
                          $sty = $ikum[$i]['pay_state'];
                          $oderstate = $ikum[$i]['order_state'];
                          $o_num = $ikum[$i]['order_num'];
                          $del = $shop->checkOrderDetail($o_num);//获取多条订单详情的信息
                          $del_sum = sizeof($del);
                          
                          if($sty=='待支付'&&$oderstate=='待确认'){


                              echo '<div class="mobile-unfinished-order-box">
                                <div class="mobile-unfinished-order-content">


                                  <div class="mobile-order-number">';
                            echo' <div class="mobile-order-h2">订单编号：</div>
                                    <div class="order-number">';
                            echo $ikum[$i]['order_num'];
                            echo' </div>
                                    <div class="waiting-pay font-blue">等';
                            echo $sty;
                            echo    '</div>
                                  </div>
                                  
                                  <div class="mobile-order-date">
                                    <div class="mobile-order-h2">下单日期：</div>
                                    <div class="order-date font-grey">';
                                    $ti = $ikum[$i]['order_time'];
                                    $time = date("Y-m-d H:i:s",$ti);
                            echo $time;
                            echo'</div>
                                  </div>

                                  <div class="mobile-order-pic-content">
                                    <div class="order-pic"><a href="#"><img src="./images/goods/';
                                    $g_id = $del[0]['goods_id'];
                                    $g_mess = $shop->checkGood($g_id);
                                    $g_img =$g_mess[0]['goods_img'] ;
                            echo $g_img;
                            echo'" style="width: 122px;height: 122px;"></a></div>
                                  </div>

                                  <div class="mobile-order-bottom ">
                                    <div class="order-info">
                                      <div class="order-info-left">共有';
                            echo $del_sum;
                            echo '件商品，总价：<span class="order-price">￥';
                            echo $ikum[$i]['sum_price'];
                            echo '</span></div>
                                      <div class="order-pay-rightNow">
                                        <a href="mobile-shoppingcart3.php?order=';
                            echo  $o_num;
                            echo '">立即支付</a>
                                      </div>
                                    </div>
                                    <div class="cut-off-line"></div>
                                    <div class="order-operation">
                                      <a href="#" onclick="buyAgain(';
                            echo "'$o_num'";
                            echo ')">再次购买</a>
                                      <a href="mobile-order-detial.php?num=';
                            echo $o_num; 
                            echo '">查看详情</a>
                                      <a href="#" onclick="orderKanso(';
                            echo "'$o_num'";
                            echo ')">取消订单</a>
                                    </div>
                                  </div>

                                </div>
                              </div>';

                          }
                        }
                        echo '</div>';
                        
                  }
                  else{

                    //没有未完成订单
                    echo '
                      <div class="moblie-hadadmin-myorder-bio-box">
                        <a href="moblie-hadadmin-myorder-bio.php"><div class="mhmbb-left">
                          未完成订单（0）</div></a>
                        <a href="moblie-hadadmin-myorder-finished-bio.php"><div class="mhmbb-right">
                          已完成订单（';
                    echo $had;
                    echo '）
                        </div></a>
                      </div>';
                    echo '<div class="moblie-hadadmin-bio-mytry-head1">
                          你还没有任何订单，<a href="">立即开始购物</a>
                        </div>';
                  }
            }
            else{

                //没有未完成订单
                echo '
                  <div class="moblie-hadadmin-myorder-bio-box">
                    <a href="moblie-hadadmin-myorder-bio.php"><div class="mhmbb-left">
                      未完成订单（0）</div></a>
                    <a href="moblie-hadadmin-myorder-finished-bio.php"><div class="mhmbb-right">
                      已完成订单（0）
                    </div></a>
                  </div>';
                echo '<div class="moblie-hadadmin-bio-mytry-head1">
                          你还没有任何订单，<a href="">立即开始购物</a>
                        </div>';
            }
         ?>

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
		function orderKanso($o_num){
			document.getElementById('beijing').style.display='block';
			document.getElementById('suredel').style.display='block';
			$('#shopid').text($o_num);
		}
		function quXiao(){
			document.getElementById('beijing').style.display='none';
			document.getElementById('suredel').style.display='none';
		}
		function queRen(){
			var o_num =  $('#querem').parent().parent().find("#shopid").text();
						$.ajax({
								url:"../api/order.api.php?act=kanso",
								type:"get",
								dataType:"json",
								data:{"or_num":o_num},
								success:function(data){
									console.log(data);
									// alert(data); 会不会数据太长了 还有这种？我之前传这个 用超链接也可以的 没试过ajax
									window.location.reload();
									// window.location.href='bio-shoppingcart_3.php?order='+data;
								}
						})
			// $('#querem').parent().parent().find("#suredel").css("display","none");
			
		}
		function buyAgain($o_num){
			$.ajax({
					url:"../api/order.api.php?act=again",
					type:"get",
					dataType:"json",
					data:{"or_num":$o_num},
					success:function(data){
						console.log(data);
						// alert(data); 会不会数据太长了 还有这种？我之前传这个 用超链接也可以的 没试过ajax
						// window.location.reload();
						window.location.href='mobile-shoppingcart1.php';
					}
			})
			// alert('再买'); 
		}
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