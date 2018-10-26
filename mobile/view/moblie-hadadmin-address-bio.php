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
			<link rel="stylesheet" type="text/css" href="css/delete-box.css"/>
      <link rel="stylesheet" type="text/css" href="./css/mobile_imformation_myaddress.css">
      <script src="./js/js/mobile_imformation_myaddress.js" type="text/javascript"></script>
			<script language="javascript" src="./js/js/addressClass.js"></script>
	<style>
	</style>
</head>
<body>
	<div id="opacity" class="hello"></div><!-- 用于弹出隐藏框时暗化背景 -->
	<div id="opacity2" class="hello"></div><!-- 用于弹出隐藏框时暗化背景 -->
	
	
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
                    <a href="mobile-shop-address.php">专柜地址</a>
                </li>
                
                <li>
                    <a href="mobile-healing-community.php">愈颜社区</a>
                </li>
                <li>
                    <a href="#">专柜地址</a>
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
      
			<div class="mobile-content" style="background: #fff; min-width:320px ;"> 
				<div id="beijing" class="beijing"></div>
				<div id="suredel" class="suredel">
					<div class="wenhao">你确认要删除吗？<span style="display: none;" id="shopid"></span></div>
					<a class="sure" href="#" id="querem" onclick="queRen()">确认</a><a href="#" onclick="quXiao()" id="sure" class="sure">取消</a>
				</div>
								<div class="moblie-hadadmin-address-bio">
									<div class="mab-breadhead">
										<ul class="breadcrumb">
											<li><a href="default.v.php">首页</a></li>
											<li><a href="moblie-hadadmin-bio.php">我的账户</a></li>
											<li>我的地址簿</li>
										</ul>
									</div>
									<div class="moblie-admin-bio-head">
										我的地址簿
									</div>
									<div class="moblie-admin-bio-box">
										<a href="#" onclick="addressAdd()">添加新地址</a>
									</div>
									
									<?php
										if (isset($_SESSION['logname'])) {
												$user_phone = $_SESSION['logname'];
												$ikum = $shop->checkUserName($user_phone);//获取整条用户的信息
												$id = $ikum[0]['id'];
												$yuki = $shop->checkInformation($id);//获取整条information的信息
												$in_sum = sizeof($yuki);
												if($in_sum==0){
														echo '
																<div class="moblie-hadadmin-bio-head">
																	您还没有任何收货地址
																</div>
														';
												}
												else{
													echo '<div class="mibox_all">';
													for ($i=0; $i < $in_sum; $i++) {
														echo '
																		<div class="mibox"><div>';
														echo        $yuki[$i]['user_name'];
														echo		 '</div><div>';
														echo        $yuki[$i]['province3'].'  '.$yuki[$i]['city3'].'  '.$yuki[$i]['area3'];
														echo   ' 	</div><div>';
														echo        $yuki[$i]['detailed_add'];
														echo   ' 	</div><div>邮政编码: ';
														echo    		$yuki[$i]['user_post'];
														echo   '	</div><div>手机号码: ';
														echo 				$yuki[$i]['user_phone'];
														echo   '	</div><div>固定电话: ';
														echo   			$yuki[$i]['user_tel'];
														echo   ' 	</div><div class="content-newAddress1">
																				<a onclick="infoUpdate(';
														echo 				$yuki[$i]['user_id'];
														echo 			')" href="#">编辑</a>
																			</div>
																			<a href="#" class="content-newAddress2"
																				id="a-delete" onclick="del_user(';
														echo 				$yuki[$i]['user_id'];
														echo 			')"> 删除
																			</a>
																		</div>
														';
													}
													echo '</div>';
												}
												
										}
										else{
											echo '
														<div class="moblie-hadadmin-bio-head">
															您还没有任何收货地址
														</div>
											';
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
      <div id="addressAdd" class="address-add">
          <div class="address-add-content">
            <div class="address-add-close">
              <a href="#" onclick="addressAddClose()"><span class="close-dialog">×</span></a>
            </div>
            
              <div class="address-add-title">
                <span class="font-grey1 font-size4">添加新地址</span>
              </div>
              <div class="address-add-tips">
                <span class="font-grey1 font-size2">*为必填项</span>
              </div>
              <div class="address-add-item">
                <form id="userAddressAdd" method="post" action="../api/information.api.php?act=info">
                  <div class="address-add-item-box">
                    
                      <input type="text" placeholder="您的姓名*" id="name" name="name" value="" class="input-normal" maxlength="20" onblur="checkName()"><br/>
                      <div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-name"></div>
                      <input type="text" placeholder="您的手机*:135312345678" id="phone" name="phone" value="" class="input-normal" onblur="checkPhone()"><br/>
                      <div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-phone"></div>
                      <input type="text" placeholder="固定电话:021-12345678" id="telephone" name="telephone" value="" class="input-normal" onblur="checkTelephone()"><br/>
                      <div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-telephone"></div>
                      
                      
                              
                      <select name="province3"></select>
                      <select name="city3"></select>
                      <select name="area3"></select>
                      <script language="javascript" defer>
                
                    
                
                        new PCAS("province3","city3","area3");
                
                      </script>
                      <input type="text" placeholder="地址*" id="address" name="address" value="" class="input-normal" onblur="checkAddress()"><br/>
                      <div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-address"></div>
                      <input type="text" placeholder="邮编*:523500" id="postal" name="postal" value="" class="input-normal" maxlength="6" onblur="checkPostal()"><br/>
                      <div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-postal"></div>
                   
                  </div>
                  <div class="address-add-confirm">
                    <input type="submit" name="" value="确认并保存" onclick="return checkInput()" class="submit">
                  </div>
                </form>
              </div>
            
          </div>
        </div>
      <div id="addressAdd2" class="address-add">
      		<div class="address-add-content">
      			<div class="address-add-close">
      				<a href="#" onclick="addressAddClose2()"><span class="close-dialog">×</span></a>
      			</div>
      			
      				<div class="address-add-title">
      					<span class="font-grey1 font-size4">修改地址</span>
      				</div>
      				<div class="address-add-tips">
      					<span class="font-grey1 font-size2">*为必填项</span>
      				</div>
      				<div class="address-add-item">
      					<form id="userAddressAdd" method="post" action="../api/information.api.php?act=alter">
      						<div class="address-add-item-box">
      							
      								<input type="text" placeholder="您的姓名*" id="name2" name="name2" value="" class="input-normal" maxlength="20" onblur="checkName2()"><br/>
      								<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-name"></div>
      								<input type="text" placeholder="您的手机*:135312345678" id="phone2" name="phone2" value="" class="input-normal" onblur="checkPhone2()"><br/>
      								<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-phone"></div>
      								<input type="text" placeholder="固定电话:021-12345678" id="telephone2" name="telephone2" value="" class="input-normal" onblur="checkTelephone2()"><br/>
      								<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-telephone"></div>
											<input  style="display: none;"  type="password" id="user_id2" name="user_id2"><br/>
      								
      								
      												
      								<select id="province2" name="province2"></select>
      								<select id="city2" name="city2"></select>
      								<select id="area2" name="area2"></select>
      								<script language="javascript" defer>
      					
      							
      					
      									new PCAS("province2","city2","area2");
      					
      								</script>
      								<input type="text" placeholder="地址*" id="address2" name="address2" value="" class="input-normal" onblur="checkAddress2()"><br/>
      								<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-address"></div>
      								<input type="text" placeholder="邮编*:523500" id="postal2" name="postal2" value="" class="input-normal" maxlength="6" onblur="checkPostal2()"><br/>
      								<div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-postal"></div>
      						
      						</div>
      						<div class="address-add-confirm">
      							<input type="submit" name="" value="确认并保存" onclick="return checkInput2()" class="submit">
      						</div>
      					</form>
      				</div>
      			
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
		function infoUpdate($id){
				
				document.getElementById('addressAdd2').style.display='block';
				document.getElementById('opacity2').style.display='block';
								$.ajax({
										url:"../api/information.api.php?act=show",
										type:"get",
										dataType:"json",
										data:{"user_id":$id},
										success:function(data){
											console.log(data);
												$("#name2").val(data[0].user_name);
												$("#phone2").val(data[0].user_phone);
												$("#telephone2").val(data[0].user_tel);
												$('#province2').append("<option selected = 'selected' value='"+data[0].province3+"'>"+data[0].province3+"</option>");
												$('#city2').append("<option selected = 'selected' value='"+data[0].city3+"'>"+data[0].city3+"</option>");
												$('#area2').append("<option selected = 'selected' value='"+data[0].area3+"'>"+data[0].area3+"</option>");
												$("#address2").val(data[0].detailed_add);
												$("#postal2").val(data[0].user_post);
												$("#user_id2").val(data[0].user_id);
										}
								})
											// alert("已添加到购物袋！");
			}
			function del_user($id){
				$('#a-delete').parent().parent().parent().parent().find("#suredel").css("display","block");
				$('#a-delete').parent().parent().parent().parent().find("#beijing").css("display","block");
				$('#shopid').text($id);
// 				if (confirm("你确定删除吗？")) { 
// 								$.ajax({
// 										url:"../api/index1.api.php?act=uid",
// 										type:"get",
// 										dataType:"json",
// 										data:{"user_id":$id},
// 										success:function(data){
// 											console.log(data);
// 											// alert("已添加到购物袋！");
// 											window.location.reload();
// 											// window.location.href='bio-shoppingcart.php';
// 										}
// 								})
// 				}
// 				else{
// 					
// 				}
					// alert($id);
			}
			function quXiao(){
				$('#sure').parent().parent().find("#beijing").css("display","none");
				$('#sure').parent().parent().find("#suredel").css("display","none");
			}
			function queRen(){
				var shopid =  $('#querem').parent().parent().find("#shopid").text();
								$.ajax({
										url:"../api/index1.api.php?act=uid",
										type:"get",
										dataType:"json",
										data:{"shop_id":shopid},
										success:function(data){
											console.log(data);
											// alert("已添加到购物袋！");
											window.location.reload();
											// window.location.href='bio-shoppingcart.php';
										}
								})
			     function searchBoxSubmit(){
    var searchValue = $("#searchBox").val();
    var searchUrl =encodeURI('mobile-goods-fiflter.php?searchValue=' + searchValue+'&searchJudge=search');
    window.location.href =searchUrl;}
			}
			
		
	</script>
</body>
</html>