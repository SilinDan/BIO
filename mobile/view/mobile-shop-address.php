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
	<title>专柜地址</title>
	<script src="js/jquery/2.0.0/jquery.min.js" type="text/javascript" charset="utf-8"></script>
			<link rel="stylesheet" type="text/css" href="css/default.css"/>
			<link rel="stylesheet" type="text/css" href="css/mobile-goods-fiflter.css"/>
			<link rel="stylesheet" type="text/css" href="css/bootstrap/3.3.6/bootstrap.css"/>
			<script src="js/bootstrap/3.3.6/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
			<script language="javascript" src="js/js/addressClass.js"></script>
	
	<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/bootstrap-3.3.4.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/mobile-shop-address.css">

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
	    <div class="mobile-header" style="height: 50px;">
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
	    </div>
      
		<div class="mobile-content" style="background: #fff; min-width:320px ;"> 
        
    		<div class="shop-address-bg">
    			<div class="shop-address-content">
    				<div class="breadcrumb-div">
    					<ul class="breadcrumb"><!-- 面包屑导航 -->
							<li><a href="default.v.php" class="a-breadcrumb">首页</a></li>
							<li class="active">专柜查询</li>
						</ul>
    				</div>
    				<div class="address-demand-div">
    					<span>专柜查询</span>
    				</div>
    				
    				<div class="search-div">
    					<a href="#" class="a-search">搜索</a>
    				</div>
    			<div class="shop-close">离您最近的门店
    				<div class="add_list">
                    
                    <p class="add_titile">广州天河</p>

                    <p class="add_detail">地址：黄埔中路28号<br/>
                    联系电话：021-64158167</p>
                 </div>
                </div>
           
        


<div class="addmap_content">

                 <ul id="myTab" class="nav nav-tabs">
   <li class="active">
      <a href="#map" data-toggle="tab">
         地图
      </a>
   </li>
   <li><a href="#list" data-toggle="tab">列表</a></li>
  
</ul>

<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="map">
      <div style="width:394px;height:430px;border:#ccc solid 1px;font-size:12px" id="map_big"></div>
   </div>
   <div class="tab-pane fade" id="list">
       <div class="add_left">
                 
                 <div class="add_list">
                    
                    <p class="add_titile">上海百盛</p>

                    <p class="add_detail">地址：淮海中路918号<br/>
                    联系电话：021-64158167</p>
                 </div>

                 <div class="add_list">
                    
                    <p class="add_titile">上海新世界</p>

                    <p class="add_detail">地址：南京西路2-88号
                <br/>
                  联系电话：021-63592106</p>
                 </div>

                 <div class="add_list">
                    
                    <p class="add_titile">上海百一店</p>

                    <p class="add_detail">地址：南京东路800-830号
                <br/>
                    联系电话：021-63518591</p>
                 </div>

          </div>
   </div>
  </div>
</div>



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
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=YMUp7bgmTHGu12aZEfzXD37Zl4kBeggN"></script>
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
	</script>
</body>
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
      createMap();//创建地图
      setMapEvent();//设置地图事件
      addMapControl();//向地图添加控件
      addMapOverlay();//向地图添加覆盖物
    }
    function createMap(){ 
      map = new BMap.Map("map_big"); 
      map.centerAndZoom(new BMap.Point(117.058128,39.412767),12);
    }
    function setMapEvent(){
      map.enableScrollWheelZoom();
      map.enableKeyboard();
      map.enableDragging();
      map.enableDoubleClickZoom()
    }
    function addClickHandler(target,window){
      target.addEventListener("click",function(){
        target.openInfoWindow(window);
      });
    }
    function addMapOverlay(){
      var markers = [
        {content:"我的备注",title:"邹威的家",imageOffset: {width:0,height:3},position:{lat:39.424808,lng:117.134017}}
      ];
      for(var index = 0; index < markers.length; index++ ){
        var point = new BMap.Point(markers[index].position.lng,markers[index].position.lat);
        var marker = new BMap.Marker(point,{icon:new BMap.Icon("http://api.map.baidu.com/lbsapi/createmap/images/icon.png",new BMap.Size(20,25),{
          imageOffset: new BMap.Size(markers[index].imageOffset.width,markers[index].imageOffset.height)
        })});
        var label = new BMap.Label(markers[index].title,{offset: new BMap.Size(25,5)});
        var opts = {
          width: 200,
          title: markers[index].title,
          enableMessage: false
        };
        var infoWindow = new BMap.InfoWindow(markers[index].content,opts);
        marker.setLabel(label);
        addClickHandler(marker,infoWindow);
        map.addOverlay(marker);
      };
    }
    //向地图添加控件
    function addMapControl(){
      var scaleControl = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
      scaleControl.setUnit(BMAP_UNIT_IMPERIAL);
      map.addControl(scaleControl);
      var navControl = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:0});
      map.addControl(navControl);
      var overviewControl = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:false});
      map.addControl(overviewControl);
    }
    var map;
      initMap();
  </script>
</html>