<?php
    session_start();
    header('Content-type:text/html;charset=utf-8');
		include("../model/Db.class.php");
		include("../controller/shop.class.php");
		$shop = new Shop();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   
  
    <!--引用百度地图API-->
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=YMUp7bgmTHGu12aZEfzXD37Zl4kBeggN"></script>
	<title>碧欧泉专柜地址</title>
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/footer_sv.css"/>
    <link rel="stylesheet" type="text/css" href="./css/bio-register.css"/>
    <link rel="stylesheet" type="text/css" href="./css/bio_try.css">
    <link rel="stylesheet" type="text/css" href="./css/bio-shopadd.css">
  	<link rel="stylesheet" type="text/css" href="./css/header1.css">
  	<link rel="stylesheet" type="text/css" href="./css/user-panel.css">
    <script type="text/javascript" src="./js/jquery-3.3.1.js"></script>
	<script language="javascript" src="./js/addressClass.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/E-zine.css">
	<script type="text/javascript" src="./js/E-zine.js"></script>
    

	<script type="text/javascript">
		function del($id){
									$.ajax({
											url:"../api/index1.api.php?act=shop",
											type:"get",
											dataType:"json",
											data:{"shop_id":$id},
											success:function(data){
												console.log(data);
													window.location.reload();
													// alert("什么贵！");
											}
									})
									// alert("已添加到购物袋！");
							}
		function add($id){
									$.ajax({
											url:"../api/index1.api.php?act=shop1",
											type:"get",
											dataType:"json",
											data:{"shop_id":$id},
											success:function(data){
												console.log(data);
												// alert("已添加到购物袋！");
												window.location.reload();
												// window.location.href='bio-shoppingcart.php';
											}
									})
									// alert("已添加到购物袋！");
							}
		
		function verificationUser(){
			var num=/^[1][\d]{9}[\d]$/g;
			var email=/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/;
			if($(".input-id").val()==""){
				$(".tips-user").text("请输入您的邮箱或手机号");
				$(".input-id").addClass("border-red").removeClass("border-blue");
				
			}else if(num.test($(".input-id").val())||email.test($(".input-id").val())){
				$(".tips-user").text("");
				$(".input-id").addClass("border-blue");
				
			}else {
				$(".tips-user").text("请输入有效的邮箱或手机号");
				$(".input-id").addClass("border-red").removeClass("border-blue");
			}
			
		}
		function verificationPwd(){
			if($(".input-pwd").val()==""){
				$(".tips-pwd").text("请输入您的密码");
				$(".input-pwd").addClass("border-red").removeClass("border-blue");
			}else if($(".input-pwd").val().length<8){
				$(".tips-pwd").text("请输入8-30个字符");
				$(".input-pwd").addClass("border-red").removeClass("border-blue");
			}else {
				$(".tips-pwd").text("");
				$(".input-pwd").addClass("border-blue");
			}
		}
	</script>
</head>
<body>

	<!-- 引入头部 -->
	<?php
	include("./header/header.php");
	?>


	<div class="add_background">

        <div class="add_content">
			<div class="add_subtitle">
				<a class="add_litel_a" href="index.v.php">首页> </a>
				<span class="add_litel_span"> 专柜查询</span>
			</div>
			<div class="add_headlines">
				<span class="add_headlines_span">专柜查询</span>
			</div>
			<div class="add_stor">
				<div class="add_stor_left">
					<span class="add_litel_span" >查找门店</span>&nbsp;<span class="add_stor_span">请选择或输入您的查询条件</span>
				</div>
				<div class="add_stor_right">
					<span class="add_litel_span">离您最近的门店</span>
				</div>
			</div>
			<div class="add_small_map">
				<div class="add_small_map_left">
					<div class="add_small_map_left_input add_stor_span">
						<p>按省市区查询</p>
						<select name="province3"></select>
						<select name="city3"></select>
						<select name="area3"></select>
					</div>

					<script language="javascript" defer>
						
						new PCAS("province3","city3","area3");
		
					</script>

					<div class="add_small_map_left_sousuo">
						<input class="inupt_sousuo" type="submit" value="搜索" />
					</div>
					<div class="add_small_map_left_input add_stor_span" id="r-result">
						<p>按街道查询</p>
						<input class="left_input" type="text" id="suggestId" />
					</div>
					<div class="add_small_map_left_sousuo">
						<input class="inupt_sousuo" type="submit" value="搜索" />
					</div>
				</div>
				<div class="add_small_map_right">
					<div class="add_small_map_right_picture">
						<!--百度地图容器-->
						<div style="width:240px;height:168px;border:#ccc solid 1px;font-size:12px" id="map"></div>
					</div>
					<div class="add_small_map_right_gps">
						<div style="background: url(./images/locator.png) no-repeat left; text-indent: 20px;">
							<a href="" class="gps_a">广州越秀</a><br />
						</div>
						<p>地址：广州市越秀区环市东路369号广州友谊商店F1</p>
						<p>联系电话：020-85594921</p>
						<a href="" class="xianqing">查看详情</a>
					</div>
				</div>
			</div>
		</div>





		<div class="add_content_">
			
			
          <div class="add_left">
          	     
          	     <div class="add_list">
          	     	
					<p class="add_titile">上海徐太</p>

					<p class="add_detail">地址：上海市徐汇区衡山路932号<br/>
					联系电话：021-64078888</p>
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
        <div class="add_right">
        	   <!--百度地图容器-->
         <div style="width:700px;height:550px;border:#ccc solid 1px;font-size:12px" id="map_big"></div>
  
        </body>


        </div>
			
		</div>
	</div>






	<div id="footer">
		<div id="footer_box">
			<div id="footer_box_img">
				<div id="img1">100%官方正品保证</div>
				<div id="img2">支持多种支付方式<br>
				在线支付免运费</div>
				<div id="img3">专享官网特惠礼遇</div>
				<div id="img4">线上线下积分共享</div>
			</div>
			<div id="footer_box_mailbox">
				<div id="footer_box_mailbox1">
					<div id="text1">
						<span>订阅电子杂志</span>
					</div>
					<div id="text_input">
						<input id="input1" type="text" name="" placeholder="输入您的邮箱">
						<input id="input3" type="image" src="./images/2018-09-10_202455.png" name="img">
						<input id="input2" type="checkbox" name=""><span>我同意依照本使用条款和隐私政策对我的个人信息进行收集和使用；我已阅读并确认被给予充分机会理解该使用条款和隐私政策的内容。</span>
					</div>
				</div>
				<div id="footer_box_mailbox2">
					<table>
						<tr id="height_td">
							<td>脸部护理</td>
							<td>身体护理</td>
							<td>防晒隔离</td>
							<td>品牌故事</td>
							<td>帮助中心</td>
							<td>快速订单查询</td>
						</tr>
						<tr id="height_td1">
							<td>活泉系列-保湿</td>
							<td>凝乳丝滑系列-润肤</td>
							<td>防晒</td>
							<td>碧欧泉故事</td>
							<td>快速订单查询</td>
							<td id="rowspan_td" rowspan="5">
								<img src="images/weibo_icon_primary.jpg">
								<img src="images/wechat_icon_primary.jpg">
								<img id="td_img" src="images/weibo_icon_primary.jpg">
								<img src="images/mobile_icon_primary.jpg">
							</td>
						</tr>
						<tr id="height_td1">
							<td>蓝源系列-抗老</td>
							<td>光感纤体系列-塑身</td>
							<td>隔离</td>
							<td>逾60年致力于护肤</td>
							<td>常见问题</td>
						</tr>
						<tr id="height_td1">
							<td>奇迹系列-修护</td>
							<td>保湿香氛系列-香氛</td>
							<td>气垫</td>
							<td>碧欧泉灵魂成分</td>
							<td>联系我们</td>
						</tr>
						<tr id="height_td1">
							<td>滢澈皙白系列-美白</td>
							<td>阳光欢愉系列-清爽</td>
							<td></td>
							<td>碧欧泉的承诺</td>
							<td>法律信息</td>
						</tr>
						<tr id="height_td1">
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>网站地图</td>
						</tr>
					</table>
				</div>
			</div>
			<div id="footer_box_safety">
				<img src="images/footer_payment_methods_icon.jpg">&nbsp;
				<span>安全支付保障</span>
			</div>
			<div id="footer_box_term">
				<div id="footer_box_term1">
					<div id="img1">
						<img src="images/police_badge_icon.jpg">
						<span>沪ICP备08100043号-26 ©L'Oreal China 欧莱雅 (中国)有限公司版权所有</span>
						<img src="images/police.png">
						<span>沪公网安备 31010602001504号</span>
					</div>
					<div id="img2">
						<span>使用条款 | cookies政策 | 隐私声明 | 隐私声明</span>
					</div>
				</div>
			</div>
		</div>
	</div>


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


          
	map.centerAndZoom(new BMap.Point(121.453429,31.233845), 15);
	var local = new BMap.LocalSearch(map, {
		renderOptions:{map: map}
	});
	local.search("碧欧泉");

	function G(id) {
		return document.getElementById(id);
	}


	map.centerAndZoom("上海",12);                   // 初始化地图,设置城市和地图级别。

	var ac = new BMap.Autocomplete(    //建立一个自动完成的对象
		{"input" : "suggestId"
		,"location" : map
	});

	ac.addEventListener("onhighlight", function(e) {  //鼠标放在下拉列表上的事件
	var str = "";
		var _value = e.fromitem.value;
		var value = "";
		if (e.fromitem.index > -1) {
			value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
		}    
		str = "FromItem<br />index = " + e.fromitem.index + "<br />value = " + value;
		
		value = "";
		if (e.toitem.index > -1) {
			_value = e.toitem.value;
			value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
		}    
		str += "<br />ToItem<br />index = " + e.toitem.index + "<br />value = " + value;
		G("searchResultPanel").innerHTML = str;
	});

	var myValue;
	ac.addEventListener("onconfirm", function(e) {    //鼠标点击下拉列表后的事件
	var _value = e.item.value;
		myValue = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
		G("searchResultPanel").innerHTML ="onconfirm<br />index = " + e.item.index + "<br />myValue = " + myValue;
		
		setPlace();
	});

	function setPlace(){
		map.clearOverlays();    //清除地图上所有覆盖物
		function myFun(){
			var pp = local.getResults().getPoi(0).point;    //获取第一个智能搜索的结果
			map.centerAndZoom(pp, 18);
			map.addOverlay(new BMap.Marker(pp));    //添加标注
		}
		var local = new BMap.LocalSearch(map, { //智能搜索
		  onSearchComplete: myFun
		});
		local.search(myValue);
	}
  </script>



   <script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
      createMap();//创建地图
      setMapEvent();//设置地图事件
      addMapControl();//向地图添加控件
      addMapOverlay();//向地图添加覆盖物
    }
    function createMap(){ 
      map = new BMap.Map("map"); 
      map.centerAndZoom(new BMap.Point(121.453429,31.233845),15);
    }
    function setMapEvent(){
      map.enableDragging();
    }
    function addClickHandler(target,window){
      target.addEventListener("click",function(){
        target.openInfoWindow(window);
      });
    }
    function addMapOverlay(){
      var markers = [
        {content:"我的备注",title:"我的标记",imageOffset: {width:0,height:3},position:{lat:31.230942,lng:121.450554}}
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
      var navControl = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:3});
      map.addControl(navControl);
    }
    var map;
      initMap();

    map.centerAndZoom(new BMap.Point(113.351281,23.132118), 12);
	var local = new BMap.LocalSearch(map, {
		renderOptions:{map: map}
	});
	local.search("碧欧泉");

  </script>
  <script type="text/javascript" src="./js/bio-header.js"></script>
</html>