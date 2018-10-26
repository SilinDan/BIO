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
	<link rel="stylesheet" href="css/style.css">
			
			<link rel="stylesheet" type="text/css" href="css/default.css"/>
			<link rel="stylesheet" type="text/css" href="css/mobile-choose-content.css"/>
			<link rel="stylesheet" type="text/css" href="css/mobile-goods-fiflter.css"/>
	<style type="text/css">
		a{
			color:#111;
		}
		.fenlei{
			width: 50%;
			float: left;
		}
		.panel-title span {
    font-size: 1.25rem;
    font-weight: 500;
    margin-right: -12px;
    float: right;
}
.goods-small img {
    width: 200px;
    height: 187px;
    width: 100%;
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
      			<button type="button" onclick="searchBoxSubmit()"></button>
      		</div>
      		<!--  <div class="mobile-input-serach">
            <input type="" name="" id="searchBox" value="" placeholder="绿活泉" onfocus="if (value =='绿活泉'){value =''}"onblur="if (value ==''){value='绿活泉'}"/>
            <button typte="button" onclick="searchBoxSubmit()"></button> -->
      	</div>			
      </div>
      
			<div class="mobile-content" style="background: #fff; min-width:320px ;"> 
				
								<div class="little-nav">
									<a href="default.v.php">	 首页 </a><span> ></span>
									<a href=""> 产品筛选</a> <span> ></span>
									<a href="" style="color: #535355;" id="fiflter_name">	  </a>
								</div>


<!-- 产品筛选由此处开始 =========================================================================================================-->
<div style="margin-top: 6rem ">	
			<div class="mobile-goods-fiflter">
				<a data-toggle="collapse" data-parent="#accordion" href="#goodsfiflter">
				<div class="goods-fiflter">
					<span>产品筛选</span>
					<span class="glyphicon glyphicon-plus"></span>
				</div>
				</a>
				<div id="goodsfiflter" class="panel-collapse collapse">
           			<div class="panel-group" id="accordion">
					    <div class="mobile-goods-classify">
					       <div class="goods-classify">
					       	 <a data-toggle="collapse" data-parent="#accordion" 
					                href="#collapseOne">
					            <h4 class="panel-title">
					                脸部护理
					                <span class="glyphicon glyphicon-plus"></span>
					            </h4>
					         </a>
					        </div>
					        <div id="collapseOne" class="panel-collapse collapse">
					            <div class="panel-body">
					           
					            </div>
					        </div>
					    </div>
					    <div class="mobile-goods-classify">
					       <div class="goods-classify">
					       	 <a data-toggle="collapse" data-parent="#accordion" 
					                href="#collapseTwo">
					                
					            <h4 class="panel-title">   
					               身体护理
					               <span class="glyphicon glyphicon-plus"></span>
					            </h4>
					         </a>
					        </div>
					        <div id="collapseTwo" class="panel-collapse collapse">
					        <div class="panel-body">
					          
					        </div>
					        </div>
					    </div>
					     <div class="mobile-goods-classify">
					       <div class="goods-classify">
					       	 <a data-toggle="collapse" data-parent="#accordion" 
					                href="#collapseThree">
					            <h4 class="panel-title">
					                隔离防晒
					                <span class="glyphicon glyphicon-plus"></span>
					            </h4>
					          </a>
					        </div>
					        <div id="collapseThree" class="panel-collapse collapse">
					            <div class="panel-body">
					             
					            </div>
					        </div>
					    </div>
					    <div class="mobile-goods-classify">
					       <div class="goods-classify">
					       	 <a data-toggle="collapse" data-parent="#accordion" 
					                href="#collapsefive">
					            <h4 class="panel-title">
					                按系列
					                <span class="glyphicon glyphicon-plus"></span>
					            </h4>
					          </a>
					        </div>
					        <div id="collapsefive" class="panel-collapse collapse">
					            <div class="panel-body">
					                
					            </div>
					        </div>
					    </div>
					</div>
       			</div>
			</div>


</div>



<!-- 产品显示由此处开始
=================================================================================================================================== -->
								
								<div class="mobile-goods-classify">
										<div class="goods-classify">
											<span id="goods_title"></span>
										</div>
								</div>	
								
								<div class="mobile-star-goods">
										<div class="goods-bunner">
											<div class="goods-small"><a href="mobile-detail-bio.php"><img src="images/BIO00072.png" ></a><span class="span-font">碧欧泉活泉润透卸妆乳</span><br>
												<span class="span-weight">200ml</span><div class="star-grade"><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" style="color: #8B8B8B;"></span></div><span class="font-price"> ￥490</span><br />
												<a href="mobile-detail-bio.php"><button type="button" class="konw-detail">了解详情</button></a><button type="button" class="tobuy-rightnow">立即购买</button>	
											</div>
											
											<div class="goods-small">
												<a href="mobile-detail-bio.php">
												<img src="images/BIO00072.png" >
												</a>
												<span class="span-font">碧欧泉活泉润透卸妆乳</span>
												<br>
												<span class="span-weight">200ml</span>
												<div class="star-grade">
													<span class="glyphicon glyphicon-star" ></span>
													<span class="glyphicon glyphicon-star" ></span>
													<span class="glyphicon glyphicon-star" ></span>
													<span class="glyphicon glyphicon-star" ></span>
													<span class="glyphicon glyphicon-star" style="color: #8B8B8B;"></span>
												</div>
												<span class="font-price"> ￥490</span><br />
												<button type="button" class="konw-detail">了解详情</button>	
												<button type="button" class="tobuy-rightnow">立即购买</button>	
											</div>
																					
										</div>
								</div>
						
<!-- 底部由此开始=================================================================================================================== -->
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

		//获取 分解 上一个搜索页面传来的多个参数
		function GetRequest() {   
		   var url = location.search; //获取url中"?"符后的字串   
		   var theRequest = new Object();   
		   if (url.indexOf("?") != -1) {   
		      var str = url.substr(1);   
		      strs = str.split("&");   
		      for(var i = 0; i < strs.length; i ++) {   
		         theRequest[strs[i].split("=")[0]]=decodeURI(strs[i].split("=")[1]);  //解码，防止中文乱码 
		      }   
		   }   
		   return theRequest;   
		}

		//获取脸部护理列表
		$(document).ready(function(){
			var cate_id = 1;		
			$.ajax({
				url:"../../home/api/searchGoodsList.api.php?act=ajaxSecondShowBox",
				 type:"get",
			     dataType:"json",
			     data:{
			     	cate_id: cate_id,
			     },
			     success:function(data){
			     	var tab='<div class="panel-body">';
			     	
			            $.each(data,function(i){
			             	tab+='<a href="./mobile-goods-fiflter.php?searchValue='+data[i].second_name+'&searchJudge=second">'
			               	tab+='<div class="fenlei"><span style="font-size:20px;margin-right:4px">○</span>'+data[i].second_name+'</div>' 
			              	tab+='</a>'
			              })
					tab+='</div>'	
			          $('#collapseOne').html(tab);
			     }
			})		
		})

		//获取左侧二级分类身体护理列表
		$(document).ready(function(){
			var cate_id = 2;		
			$.ajax({
				url:"../../home/api/searchGoodsList.api.php?act=ajaxSecondShowBox",
				 type:"get",
			     dataType:"json",
			     data:{
			     	cate_id: cate_id,
			     },
			     success:function(data){
			     
			      	var tab='<div class="panel-body">';
			     	
			            $.each(data,function(i){
			             	tab+='<a href="./mobile-goods-fiflter.php?searchValue='+data[i].second_name+'&searchJudge=second">'
			               	tab+='<div class="fenlei"><span style="font-size:20px;margin-right:4px">○</span>'+data[i].second_name+'</div>' 
			              	tab+='</a>'
			              })
					tab+='</div>'	
			          $('#collapseTwo').html(tab);
			          $("#collapseOne").css("aria-expanded","false");
					  $("#collapseTwo").css("aria-expanded","true");
					            
			     }
			})		
		})

		//获取左侧二级分类防晒隔离列表
		$(document).ready(function(){
			var cate_id = 3;		
			$.ajax({
				url:"../../home/api/searchGoodsList.api.php?act=ajaxSecondShowBox",
				 type:"get",
			     dataType:"json",
			     data:{
			     	cate_id: cate_id,
			     },
			     success:function(data){
			     
			      	var tab='<div class="panel-body">';
			     	
			            $.each(data,function(i){
			             	tab+='<a href="./mobile-goods-fiflter.php?searchValue='+data[i].second_name+'&searchJudge=second">'
			               	tab+='<div class="fenlei"><span style="font-size:20px;margin-right:4px">○</span>'+data[i].second_name+'</div>' 
			              	tab+='</a>'
			              })
					tab+='</div>'	
			          $('#collapseThree').html(tab);
			     }
			})		
		})
//获取系列
		$(document).ready(function(){	
			$.ajax({
				url:"../../home/api/searchGoodsList.api.php?act=ajaxSerieShowBox",
				 type:"get",
			     dataType:"json",
			     data:{ },
			     success:function(data){
			     	var tab='<div class="panel-body">';
			     	
			            $.each(data,function(i){
			             	tab+='<a href="./mobile-goods-fiflter.php?searchValue='+data[i].serie_name+'&searchJudge=serie">'
			               	tab+='<div class="fenlei"><span style="font-size:20px;margin-right:4px">○</span>'+data[i].serie_name+'</div>' 
			              	tab+='</a>'
			              })
					tab+='</div>'	
			          $('#collapsefive').html(tab);
			     }
			})		
		})

		//解析 上一个搜索页面传来的参数
		$(document).ready(function(){
			//获取 上一个搜索页面传来的多个参数
			var Request = new Object();
		    Request = GetRequest();
		    var searchValue,searchJudge;
		    searchValue = Request['searchValue'];
		    searchJudge = Request['searchJudge'];
		    // alert(searchValue);
		    $('#fiflter_name').html(searchValue);

		    //点击导航分类，根据二级分类搜索的商品显示
	   		if (searchJudge=="second") {
	   			// alert(searchJudge);
	   			$.ajax({
	            url:"../../home/api/searchGoodsList.api.php?act=ajaxSecondShow",
	            type:"get",
	            dataType:"json",
	            data:{
	            	second_name:searchValue,	
	            },
	            success:function(data){
	               var tab = '';
	               $.each(data,function(i){
	               	tab+='<div class="goods-small"><a href="mobile-detail-bio.php?id='+data[i].goods_id+'"><img src="../../home/view/images/goods/'+data[i].goods_img+'" ></a><span class="span-font">'+data[i].goods_name+'</span><br><span class="span-weight">'+data[i].goods_size+'ml</span><div class="star-grade"><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" style="color: #8B8B8B;"></span></div><span class="font-price"> ￥'+data[i].goods_price+'</span><br /><a href="mobile-detail-bio.php?id='+data[i].goods_id+'"><button type="button" class="konw-detail">了解详情</button></a><button type="button" class="tobuy-rightnow" onclick="getGoodsId('+data[1].goods_id+')">立即购买</button>	</div>'
	               })
	              $('#goods_title').html(searchValue);
	              $('.goods-bunner').html(tab);
	            }
	          })
	   		}


	   		//点击导航分类，根据二级分类系列产品搜索的商品显示
	   		if (searchJudge=="serie") {
	   			// alert(searchJudge);
	   			$.ajax({
	            url:"../../home/api/searchGoodsList.api.php?act=ajaxSerieShow",
	            type:"get",
	            dataType:"json",
	            data:{
	            	serie_name:searchValue,	
	            },
	            success:function(data){
	            	var tab = '';
	                $.each(data,function(i){
	               	tab+='<div class="goods-small"><a href="mobile-detail-bio.php?id='+data[i].goods_id+'"><img src="../../home/view/images/goods/'+data[i].goods_img+'" ></a><span class="span-font">'+data[i].goods_name+'</span><br><span class="span-weight">'+data[i].goods_size+'ml</span><div class="star-grade"><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" style="color: #8B8B8B;"></span></div><span class="font-price"> ￥'+data[i].goods_price+'</span><br /><a href="mobile-detail-bio.php?id='+data[i].goods_id+'"><button type="button" class="konw-detail">了解详情</button></a><button type="button" class="tobuy-rightnow" onclick="getGoodsId('+data[1].goods_id+')">立即购买</button>	</div>'
	               })
	               $('#goods_title').html(searchValue);
	              $('.goods-bunner').html(tab);
	            }
	          })
	   		}

	   		//点击搜索，根据输入框输入的值搜索的商品显示
	   		if (searchJudge=="search") {
	   			// alert(searchJudge);
	   			$.ajax({
	            url:"../../home/api/searchGoodsList.api.php?act=ajaxShow",
	            type:"get",
	            dataType:"json",
	            data:{
	            	goods_name:searchValue,	
	            },
	            success:function(data){
	              var tab = '';
	                $.each(data,function(i){
	               	tab+='<div class="goods-small"><a href="mobile-detail-bio.php?id='+data[i].goods_id+'"><img src="../../home/view/images/goods/'+data[i].goods_img+'" ></a><span class="span-font">'+data[i].goods_name+'</span><br><span class="span-weight">'+data[i].goods_size+'ml</span><div class="star-grade"><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" style="color: #8B8B8B;"></span></div><span class="font-price"> ￥'+data[i].goods_price+'</span><br /><a href="mobile-detail-bio.php?id='+data[i].goods_id+'"><button type="button" class="konw-detail">了解详情</button></a><button type="button" class="tobuy-rightnow" onclick="getGoodsId('+data[1].goods_id+')">立即购买</button>	</div>'
	               })
	               $('#goods_title').html(searchValue);
	              $('.goods-bunner').html(tab);
	            }
	          })
	   		}

	   		//点击导航分类，根据 全部 搜索的商品显示
	   		if (searchJudge=="all") {
	   			// alert(searchJudge);
	   			$.ajax({
	            url:"../../home/api/searchGoodsList.api.php?act=ajaxAllShow",
	            type:"get",
	            dataType:"json",
	            data:{
	            	
	            },
	            success:function(data){
	             var tab = '';
	                $.each(data,function(i){
	               	tab+='<div class="goods-small"><a href="mobile-detail-bio.php?id='+data[i].goods_id+'"><img src="../../home/view/images/goods/'+data[i].goods_img+'" ></a><span class="span-font">'+data[i].goods_name+'</span><br><span class="span-weight">'+data[i].goods_size+'ml</span><div class="star-grade"><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" style="color: #8B8B8B;"></span></div><span class="font-price"> ￥'+data[i].goods_price+'</span><br /><a href="mobile-detail-bio.php?id='+data[i].goods_id+'"><button type="button" class="konw-detail">了解详情</button></a><button type="button" class="tobuy-rightnow" onclick="getGoodsId('+data[1].goods_id+')">立即购买</button>	</div>'
	               })
	               $('#goods_title').html(searchValue);
	              $('.goods-bunner').html(tab);
	            }
	          })
	   		}

   		//点击导航分类，根据 全部 搜索的商品显示
	   		if (searchJudge=="man") {
	   			// alert(searchJudge);
	   			$.ajax({
	            url:"../api/detail.api.php?act=ajaxManShow",
	            type:"get",
	            dataType:"json",
	            data:{
	            	
	            },
	            success:function(data){
	             var tab = '';
	                $.each(data,function(i){
	               	tab+='<div class="goods-small"><a href="mobile-detail-bio.php?id='+data[i].goods_id+'"><img src="../../home/view/images/goods/'+data[i].goods_img+'" ></a><span class="span-font">'+data[i].goods_name+'</span><br><span class="span-weight">'+data[i].goods_size+'ml</span><div class="star-grade"><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" ></span><span class="glyphicon glyphicon-star" style="color: #8B8B8B;"></span></div><span class="font-price"> ￥'+data[i].goods_price+'</span><br /><a href="mobile-detail-bio.php?id='+data[i].goods_id+'"><button type="button" class="konw-detail">了解详情</button></a><button type="button" class="tobuy-rightnow" onclick="getGoodsId('+data[1].goods_id+')">立即购买</button>	</div>'
	               })
	               $('#goods_title').html(searchValue);
	              $('.goods-bunner').html(tab);
	            }
	          })
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