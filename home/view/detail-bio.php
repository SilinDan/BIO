<?php
error_reporting(E_ALL || ~E_NOTICE);
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
	<title>详情</title>
	<link href="../../public/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bio_detailed1.css">
	<link rel="stylesheet" type="text/css" href="css/biotherm_footer.css">
	<link rel="stylesheet" type="text/css" href="./css/header -80percentage.css">
	<link rel="stylesheet" type="text/css" href="./css/detail-bio.css">
	<link rel="stylesheet" type="text/css" href="./css/header1.css">
	<link rel="stylesheet" type="text/css" href="./css/user-panel.css">

	<link rel="stylesheet" type="text/css" href="./css/commentstar.css">
	<script type="text/javascript" src="./js/detail_bio_comment.js"></script>
    <script type="text/javascript" src="./js/jquery-3.3.1.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/E-zine.css">
    <script src="./js/shopUpDown.js"></script>
    <script type="text/javascript" src="./js/E-zine.js"></script>
    <script type="text/javascript" src="./js/Set_Top.js"></script>
    <style>
			#detailed_body_main #right #right_select2 {
				margin: 0px;
				padding: 0px;
				width: 160px;
				height: 35px;
				text-indent: 5px;
				background-color: #fff;
				border: 1px solid #E5E5E6;
				font-size: 14px;
		}
		/* 	#right_select2{
				margin: 0px;
				padding: 0px;
				width: 160px;
				height: 35px;
				text-indent: 5px;
				background-color: #fff;
				border: 1px solid #E5E5E6;
				font-size: 14px;
			} */
		</style>
    <script type="text/javascript">
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
		function please_login(){
			alert("请先登录");
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
		
		$(document).ready(function(){
			     	var url = location.search.split('=')[1];//获取url中"?"符后的字串
			          // alert('yyy'+url);
			          $.ajax({
			            url:"../api/detail.api.php?act=ajaxShow",
			            type:"get",
			            dataType:"json",
			            data:{
			            	goods_id:url,	
			            },
			            success:function(data){
			               // alert('yyy'+data);
			                // alert(data[0].goods_name);
			               // alert(data[0].goods_id);
			              $("#goods_name").text(data[0].goods_name);
			              $("#detailed_body_text_span1").text(data[0].goods_name);
			              $("#goods_english").text(data[0].goods_english);
			              $("#goods_price").text(data[0].goods_price);
			              $("#goods_remain").text(data[0].goods_remain);
		
			              $("#goods_size").val(data[0].goods_size+'ml').text(data[0].goods_size+'ml');
		
			              $("#goods_detail").text(data[0].goods_detail);
			              $("#goods_img").attr("src",'images/goods/'+data[0].goods_img);
						  $("#goods_img_comment").attr("src",'images/goods/'+data[0].goods_img);
						  $("#goods_name_comment").text(data[0].goods_name);	
 						  $(".detail-bio-pic").html(data[0].goods_content);      

 					
			
			           
			            }
			          })
			    });

		$(document).ready(function(){

			$.ajax({
				url:"../api/detail.api.php?act=ajaxRandShow",
				 type:"get",
			     dataType:"json",
			     data:{},
			     success:function(data){
			     	 var tab='';
			              $.each(data,function(i){
			              	 tab+='<div class="index-single-botton1"><div class="isb-introduce1" id="isb-introduce1">';
											 tab+='<img src="./images/goods/'+data[i].goods_img+'">';
											 tab+='<a href="detail-bio.php?id='+data[i].goods_id+'"><div class="isb-introduce-ying">快速浏览</div></a><a href="detail-bio.php?id='+data[i].goods_id+'">';
											 tab+='<div class="isb-introduce-name1">'+data[i].goods_name+'</div><span class="isb-introduce-ml">'+data[i].goods_size+'ml</span><div class="isb-introduce-star1">';
											 tab+='<img src="./images/star-red.png"><img src="./images/star-red.png"><img src="./images/star-red.png"><img src="./images/star-red.png"><img src="./images/star-red.png">';
											 tab+='</div></a></div><div class="isb-price1">¥'+data[i].goods_price+'</div><div class="isb-buy2"><center><input type="submit" name="hurry-buy" value="立即购买" class="isb-buy-name2" onclick="getGoodsId('+data[i].goods_id+')"></center></div></div>'
			              })
		// 	<div class="index-single-botton1">
		// 	<div class="isb-introduce1">
		// 	<a href="">
		// 		<img src="./images/index-single-box1.png">
		// 	</a>
		// 	<div class="isb-introduce-ying">快速浏览</div>
		// 	<a href="detail-bio.php?id=11">
		// 		<div class="isb-introduce-name1">
		// 			男士水动力保湿乳
		// 		</div>
		// 		<span class="isb-introduce-ml">50ml</span>
		// 		<div class="isb-introduce-star1">
		// 			<img src="./images/star-red.png">
		// 			<img src="./images/star-red.png">
		// 			<img src="./images/star-red.png">
		// 			<img src="./images/star-red.png">
		// 			<img src="./images/star-red.png">
		// 		</div>
		// 	</a>
		// 	</div>
		// 	<div class="isb-price1">¥390</div>
		// 	<div class="isb-buy2">
		// 		<center><input type="submit" name="hurry-buy" value="立即购买" class="isb-buy-name2"></center>
		// 	</div>
		// </div>
			         $('.detail-bio-box-like').html(tab);
			     }
			})
		})

		$(document).ready(function(){

			$.ajax({
				url:"../api/detail.api.php?act=ajaxRandShow",
				 type:"get",
			     dataType:"json",
			     data:{},
			     success:function(data){
			     	 var tab='';
			              $.each(data,function(i){
			              	 tab+=' <div class="index-single-all"><div class="index-single-botton"><div class="index-single-all-name">'+data[i].second_name+'</div><div class="isb-introduce"><a href="detail-bio.php?id='+data[i].goods_id+'">'
			              	 tab+='<img src="./images/goods/'+data[i].goods_img+'"><div class="isb-introduce-name">'+data[i].goods_name+'</div><div class="isb-introduce-star"><img src="./images/star-red.png"><img src="./images/star-red.png"><img src="./images/star-red.png"><img src="./images/star-red.png"><img src="./images/star-red.png"></div></a></div><div class="isb-price">'+data[i].goods_price+'</div></div><div class="isb-buy"><input type="submit" name="hurry-buy" value="'+data[i].goods_size+'ml" class="isb-buy-name1"></div><div class="isb-buy1"><input type="submit" name="hurry-buy" value="立即购买" class="isb-buy-name"  onclick="getGoodsId('+data[i].goods_id+')"></div></div>'
			              })
			
			         $('#rand_show').html(tab);
			     }
			})
		})
		
		$(document).ready(function(){
			     	var url = location.search.split('=')[1];//获取商品id
			     	   
			          $.ajax({
			            url:"../api/detail.api.php?act=ajaxShowComment",
			            type:"get",
			            dataType:"json",
			            data:{goods_id:url},
			            success:function(data){
						  var tab='';
			              $.each(data,function(i){
			              	
			               
			               tab+='<div class="detail-bio-box-comments-all1"><div class="dbbc-com1">';
			            var starnum = data[i].com_star;
			            console.log(data[i].com_star);
							for(var z=0;z<starnum;z++){
								var com_star='';
								com_star+='<img src="./images/star-red.png">';
								tab+=com_star;
								}
								 
			               tab+='<br/>用户'+data[i].user_phone+'<br/>'+data[i].com_time+'<br/>'+data[i].com_buyway +'<br/></div><div class="dbbc-left1"> ';
			               tab+=' <ul>';
			           var str=data[i].com_label;
						  var arr=new Array();
						  arr=str.split(',');//注split可以用字符或字符串分割
						  for(var y=0;y<arr.length;y++)
							{
							// alert(arr[i]);
							tab+='<li>'+arr[y]+'</li>'
							}

			               tab+='</ul>';

			              tab+='<br/>'+data[i].com_content+'</div><div class="dbbc-right1" id="dbbc-right1"><span class="dbbc-none">'+data[i].com_id+'</span><span class="dbbc-zan">'+data[i].com_like+'</span><span class="dbbc-name">该评论对您有用吗?</span><button class="dbbc-box1" id="dbbc-box1">是</button></div></div>';
			              
			               })
			               $("#comments_content_div").html(tab);
			               num='阅读'+data.length+'条评论';
			               $("#comment_num").html(num);
			               $("#read_num").html(num);

				 }
			})
	    });

	$(document).ready(function(){
		var url = location.search.split('=')[1];//获取商品id
		$('#goods_id').val(url);
	});
	</script>

</head>
<body bgcolor="#292929">
	<div class="subscribe">
        <button class="subscribe_close">×</button>
        <div class="subscribe_ok">订阅成功，感谢您的订阅</div>
        <div class="subscribe_href"><a href="index.v.php">继续购物</a></div>
        <span>还没有账号？</span>
        <div class="subscribe_href"><a href="bio-register.php">立即注册</a></div>
    </div>
	<div class="body_box"></div>
			<!-- 引入头部 -->
			<?php
			include("./header/headerNavigation.php");
			?>

		<div id="detailed_mainOne">
			<div id="detailed_main">
				<div id="detailed_body">
					<div id="detailed_body_text">
						<span><a href="index.v.html">首页</a> > 碧欧泉男士 > 脸部护理 > 按类型 > 护肤 > <span id="detailed_body_text_span1">男士水动力保湿乳</span></span>
					</div>
					<div id="detailed_body_main">
						<div id="left">
							<img id="left_img1" src="images/2018-09-12_094929.png">
							<img class="left_img2" id="goods_img" src="images/BIO10009_1.png">
						</div>
						<div id="right">
							<p class="right_p1" id="goods_name">
								男士水动力保湿乳
							</p>
							<p class="right_p2" id="goods_english">
								AQUAPOWER NORMAL SKIN
							</p>
							
							<p id="right_p3">
								<img src="images/2018-09-12_101221.png">
								<span id="read_num">阅读11条评论</span> | 

						
								<a href="#comment-add" onclick="document.getElementById('comment-add').style.display='block'" style="color:#000">
									<?php 
									if (isset($_SESSION['logname'])) 
										{
										echo "书写评论";	
										}
									?>
								</a>
							</p>
 
							<p class="right_p4" id="goods_detail">
								男士水动力保湿乳(中性) <br>
								蕴含矿物温泉精粹，卓效保湿，适合中性及混合性皮肤。<br>
								一抹即刻释放活泉动力，肌肤倍感舒适清爽，摆脱干燥困扰，散发健康光泽。<br>
								男士水动力保湿乳(干性) <br>
								蕴含矿物温泉精粹，卓效保湿，适合干性皮肤。<br>
								清爽啫喱质地，紧锁肌肤水分，为肌肤提供全天候滋润舒适
							</p>
							<div>
								<select id="right_select1" name="addr[]" id="">
									<option value="75ml中性" id="goods_size">75ml中性</option>
									<!-- <option value="75ml干性">75ml干性</option> -->
								</select>
								<select id="right_select2" name="addr1[]" >
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</div>
							<p class="right_p5">¥<span class="right_p5" id="goods_price">480</span></p>
							<div id="right_div">
								<div id="right_div_input">
									<input id="right_div_input" type="submit" name="" value="加入购物袋" onclick="GoodsId()">
								</div>
								<div id="right_div_img">
								</div>
							</div>
							<p id="right_p6">有库存</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	
	
	<div class="detail-bio-box">
		<div class="detail-bio-box-fixed">
			在线咨询
		</div>
		<div class="detail-bio-box-fixed1">
			手机官网
		</div>
		<div class="detail-bio-box-fixed2">
			免费试用
		</div>
		<div class="detail-bio-box-fixed3">
			置顶
		</div>
		<div class="detail-bio-box-link">
			<div class="dbb-link"></div>
			<div class="dbb-link2">建议搭配</div>
			<div class="dbb-link1"></div>
		</div>
		<div class="detail-bio-box-tuijian">
			<div class="dbb-tuijian">
				<input type="sumbit" name="dbb-shopbox" class="dbb-shop" value="一键加入购物袋">
				<br/>
			<div class="index-single-boss">
				<div id="rand_show">
				<div class="index-single-all">
					<div class="index-single-botton">
						<div class="index-single-all-name">
						护肤
						</div>
						<div class="isb-introduce">
						<a href="">
							<img src="./images/detail-bio1.png">
							<div class="isb-introduce-name">
								男士清爽控油保湿乳
							</div>
							<div class="isb-introduce-star">
								<img src="./images/star-red.png">
								<img src="./images/star-red.png">
								<img src="./images/star-red.png">
								<img src="./images/star-red.png">
								<img src="./images/star-red.png">
							</div>
						</a>
						</div>
						<div class="isb-price">¥390</div>
					</div>
					<div class="isb-buy">
							<input type="submit" name="hurry-buy" value="50ml" class="isb-buy-name1">
						</div>
						<div class="isb-buy1">
							<input type="submit" name="hurry-buy" value="立即购买" class="isb-buy-name">
						</div>
				</div>
				<!-- <div class="index-single-all">
					<div class="index-single-botton">
						<div class="index-single-all-name">
						清洁
						</div>
						<div class="isb-introduce">
						<a href="">
							<img src="./images/detail-bio2.png">
							<div class="isb-introduce-name">
								男士清爽控油洁面膏
							</div>
							<div class="isb-introduce-star">
								<img src="./images/star-red.png">
								<img src="./images/star-red.png">
								<img src="./images/star-red.png">
								<img src="./images/star-red.png">
								<img src="./images/star-red.png">
							</div>
						</a>
						</div>
						<div class="isb-price">¥260</div>
					</div>
					<div class="isb-buy">
							<input type="submit" name="hurry-buy" value="50ml" class="isb-buy-name1">
						</div>
						<div class="isb-buy1">
							<input type="submit" name="hurry-buy" value="立即购买" class="isb-buy-name">
						</div>
				</div>
				<div class="index-single-all">
					<div class="index-single-botton">
						<div class="index-single-all-name">
						爽肤
						</div>
						<div class="isb-introduce">
						<a href="">
							<img src="./images/detail-bio3.png">
							<div class="isb-introduce-name">
								男士清爽控油爽肤水
							</div>
							<div class="isb-introduce-star">
								<img src="./images/star-red.png">
								<img src="./images/star-red.png">
								<img src="./images/star-red.png">
								<img src="./images/star-red.png">
								<img src="./images/star-red.png">
							</div>
						</a>
						</div>
						<div class="isb-price">¥280</div>
					</div>
					<div class="isb-buy">
							<input type="submit" name="hurry-buy" value="50ml" class="isb-buy-name1">
						</div>
						<div class="isb-buy1">
							<input type="submit" name="hurry-buy" value="立即购买" class="isb-buy-name">
						</div>
				</div> -->	
				</div>
			</div>		
			</div>
			
		</div>

		<div class="detail-bio-box-link">
			<div class="dbb-link"></div>
			<div class="dbb-link2">产品详情</div>
			<div class="dbb-link1"></div>
		</div>
		<div class="detail-bio-pic">
		</div>
		<div class="detail-bio-box-link">
			<div class="dbb-link3"></div>
			<div class="dbb-link2">用户评论</div>
			<div class="dbb-link4"></div>
		</div>
		<div class="detail-bio-box-comments">
			
			<div class="detail-bio-box-comments-all">
				<div class="dbbc-com">
					<!-- <img id="goods_img" src="./images/detail-bio1.png"> -->
					<img  id="goods_img_comment" src="images/BIO10009_1.png">
					<p id="goods_name_comment">男士清爽控油保湿乳</p>
				</div>
				<div class="dbbc-left">
					总评价
					&nbsp;&nbsp;&nbsp;
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					&nbsp;&nbsp;&nbsp;
					<p id="comment_num">阅读3条评论</p>
				</div>
			<div class="dbbc-right">
						<a href="#comment-add" onclick="document.getElementById('comment-add').style.display='block'">
							<?php
							if (isset($_SESSION['logname'])) {
								echo '<div class="dbbc-box">';
								echo '添加你的评论';
								echo "</div>";
							}
							?>
						</a>
					</div>
				
				
			</div>
			<div id="comments_content_div">
			<div class="detail-bio-box-comments-all1">
				<div class="dbbc-com1">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					<br/>
					 宋苏益 <br/>
					 2017-12-13 <br/>
					 16:08:53<br/>
					 线上官网购买 <br/>
				</div>
				<div class="dbbc-left1">
					  <ul>
					  	<li>效果好</li>
					  	<li>包装完好</li>
					  </ul>
					  <br/>
						东西不错，但是被骗了，包装箱里只有买的几样，没有该有的赠品
				</div>
				<div class="dbbc-right1">
					<span class="dbbc-zan">2</span>
					<span class="dbbc-name">该评论对您有用吗?</span>
					<a href=""><div class="dbbc-box1">
						是
					</div></a>
				</div>
			</div>
			<div class="detail-bio-box-comments-all1">
				<div class="dbbc-com1">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					<br/>
					 千年老二 <br/>
					 2017-08-01 <br/>
					 10:02:39<br/>
					 线上官网购买 <br/>
				</div>
				<div class="dbbc-left1">
					  <ul>
					  	<li>效果好</li>
					  	<li>物流快捷</li>
					  	<li>包装完好</li>
					  </ul>
					  <br/>
						包装味道挺好！就是不知道效果如何！ 
				</div>
				<div class="dbbc-right1">
					<span class="dbbc-zan">1</span>
					<span class="dbbc-name">该评论对您有用吗?</span>
					<a href=""><div class="dbbc-box1">
						是
					</div></a>
				</div>
			</div>
			<div class="detail-bio-box-comments-all1">
				<div class="dbbc-com1">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					<br/>
					 13968959594  <br/>
					 2017-07-19 <br/>
					 02:56:24 <br/>
					 线上官网购买 <br/>
				</div>
				<div class="dbbc-left1">
					  <ul>
					  	<li>物流快捷</li>
					  </ul>
					  <br/>
						应该是正品，但是和京东上的价钱差好多 
				</div>
				<div class="dbbc-right1">
					<span class="dbbc-zan">0</span>
					<span class="dbbc-name">该评论对您有用吗?</span>
					<a href=""><div class="dbbc-box1">
						是
					</div></a>
				</div>
			</div>
			</div>
				<div id="comment-add" class="detail-bio-comment-add">
				<form id="addComment" method="post" action="../api/detail.api.php?act=ajaxAddComment">
					<div class="comment-add-title"><h3>发表评论</h3></div>
					<div class="comment-add-first font-grey">
						<input type="" id="goods_id" name="goods_id" style="display: none">
						<div class="comment-tags">
							<div class="comment-tags-label">
								<span>标签：</span>
							</div>
							<div class="comment-input-box">
								<input type="checkbox" name="com_label[]" value="效果好">效果好
								<input type="checkbox" name="com_label[]" value="物流快捷">物流快捷
								<input type="checkbox" name="com_label[]" value="包装完好">包装完好

							</div>
						</div>
						<div class="comment-buyWay">
							<div class="comment-tags-label font-line50">
								<span>购买途径：</span>
							</div>
							<div class="comment-input-box">
								<select class="comment-buyWay-select font-grey" name="com_buyway">
									<option class="comment-buyWay-select"  value="线上官网购买">线上官网购买</option>
									<option class="comment-buyWay-select" value="线下店铺购物">线下店铺购物</option>
									<option class="comment-buyWay-select" value="试用小样">试用小样</option>
									<option class="comment-buyWay-select" value="朋友赠送">朋友赠送</option>
								</select>
							</div>
						</div>
						<div class="comment-allUser">
							<div class="comment-tags-label font-line50">
								<span class="font-red">*</span><span>总体评价：</span>
							</div>
						<div class="rating-stars" id="rating" >
						                       
						                       <input type="number" readonly class="form-control rating-value" name="com_star" style="display: none;">

								                <div class="rating-stars-container"> 
						                         
								                    <div class="rating-star">
								                        <i class="fa fa-star"></i>
								                    </div>
								                    <div class="rating-star">
								                        <i class="fa fa-star"></i>
								                    </div>
								                    <div class="rating-star">
								                        <i class="fa fa-star"></i>
								                    </div>
								                    <div class="rating-star">
								                        <i class="fa fa-star"></i>
								                    </div>
								                    <div class="rating-star">
								                        <i class="fa fa-star"></i>
								                    </div>
								            </div>
								</div>
							
						</div>
						<div class="comment-text">
							<div class="comment-tags-label">
								<span class="font-red">*</span><span>评价：</span>
							</div>
							<div class="comment-input-box">
								<textarea id="textContent" class="comment-text-content font-grey" maxlength="170" onkeyup="checkStrLengths()" onblur="checkTextContent()" name="com_content"></textarea><br/>
								<div style=" position: relative;color: #f00;font-size: 12px;" class="tips-textContent"></div>
								<span id="textNum" class="font-size-min">您还可以输入170个字</span>
							</div>
						</div>
					</div>
					<div class="comment-add-secondary">
					<!-- 	<div class="comment-tags">
							<span class="font-grey">上传图片</span>
						</div>
						<div class="comment-add-pic">
							<div class="comment-add-pic1 margin-right">
								<input type="file" name="" class="comment-add-pic2">
							</div>
							<div class="comment-add-pic1 margin-right">
								<input type="file" name="" class="comment-add-pic2">
							</div>
							<div class="comment-add-pic1">
								<input type="file" name="" class="comment-add-pic2">
							</div>
						</div> -->
						
							<div class="comment-add-sumbit">
								<input type="submit" name="" id="comment_submit" class="comment-inputSub" value="提交您的评论" onclick="return checkInfo()">
							</div>
				
					</div>
				</form>
			</div>
		</div>
		<div class="detail-bio-box-link">
				<div class="dbb-link3"></div>
				<div class="dbb-link2">其他用户还喜欢</div>
				<div class="dbb-link4"></div>
		</div>
		<div class="detail-bio-box-like">
			<div class="index-single-botton1">
			<div class="isb-introduce1">
			<a href="">
				<img src="./images/index-single-box1.png">
			</a>
			<div class="isb-introduce-ying">快速浏览</div>
			<a href="detail-bio.php?id=11">
				<div class="isb-introduce-name1">
					男士水动力保湿乳
				</div>
				<span class="isb-introduce-ml">50ml</span>
				<div class="isb-introduce-star1">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
				</div>
			</a>
			</div>
			<div class="isb-price1">¥390</div>
			<div class="isb-buy2">
				<center><input type="submit" name="hurry-buy" value="立即购买" class="isb-buy-name2"></center>
			</div>
		</div>
		<div class="index-single-botton1">
			<div class="isb-introduce1">
			<a href="detail-bio.php?id=3">
				<img src="./images/index-single-box2.png">
			</a>
			<div class="isb-introduce-ying">快速浏览</div>
			<a href=""><div class="isb-introduce-name1">
					绿活泉
				</div></a>
				<span class="isb-introduce-ml">50ml</span>
				<div class="isb-introduce-star1">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
					<img src="./images/star-red.png">
				</div>
			</div>
			<div class="isb-price1">¥390</div>
			<div class="isb-buy2">
				<center><input type="submit" name="hurry-buy" value="立即购买" class="isb-buy-name2"></center>
			</div>
			
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
						<input id="input3" type="image" src="images/2018-09-10_202455.png" name="img">
						<input id="input2" type="checkbox" name="NO"><span style="color: #535355;">我同意依照本<a class="subscribe_href_a" href="http://policy.lorealchina.com/termsofusewebsite">使用条款</a>和<a class="subscribe_href_a" href="http://policy.lorealchina.com/privacypolicy">隐私政策</a>对我的个人信息进行收集和使用；我已阅读并确认被给予充分机会理解该<a class="subscribe_href_a" href="http://policy.lorealchina.com/termsofusewebsite">使用条款</a>和<a class="subscribe_href_a" href="http://policy.lorealchina.com/privacypolicy">隐私政策</a>的内容。</span><br />
						<span class="tips_1" id="tips_1"></span><span class="tips_2" id="tips_2"></span>
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
<script type="text/javascript" src="./js/bio-header.js"></script>

</html>
<script src="js/popper.min.js"></script>
    <script src="./css/bootstrap/3.3.6/bootstrap.min.js"></script>

    <script src="js/jquery.rating-stars.min.js"></script>
    <script>
        var ratingOptions = {
            selectors: {
                starsSelector: '.rating-stars',
                starSelector: '.rating-star',
                starActiveClass: 'is--active',
                starHoverClass: 'is--hover',
                starNoHoverClass: 'is--no-hover',
                targetFormElementSelector: '.rating-value'
            }
        };

        $(".rating-stars").ratingStars(ratingOptions);
        //点击按钮，变换样式与点赞数的增加
	$(document).on('click','#dbbc-box1',function(){

		var like=parseInt($(this).prev().prev().text())+1;
		var id=$(this).prev().prev().prev().text();
		$(this).attr("disabled","disabled").css("background","#535355").prev().prev().css("background-image","url('./images/20181013165834.png')").text(like);
		ajaxZan(id,like);

	});


	//链接数据库，把数据库的点赞数更换掉
	function ajaxZan(id,like){
		// alert("yyy"+id+like);
		$.ajax({
            url:"../api/detail.api.php?act=ajaxZan",
            type:"get",
            dataType:"html",
            data:{com_id:id,com_like:like},
            success:function(data){
            	// alert("yyy"+data);
            }
        })
	}

	//点击购买
	function getGoodsId($id) {
		$.ajax({
			url:"../api/index1.api.php?act=add",
			type:"get",
			dataType:"json",
			data:{"id":$id},
			success:function(data){
				console.log(data);
				if(data==0){
					$("#login").show();
					$("html,body").animate({
						scrollTop: "0px"
					}, 80);
					
				}else{
					window.location.href="bio-shoppingcart.php";
				}
				// window.location.href='bio-shoppingcart.php';
			}
		})
	}
	//点击购买
	function GoodsId() {
		var chal = $('#right_div_input').parent().parent().parent().parent().find("#right_select2").val();
		// alert(chal);
		var url = location.search.split('=')[1];//获取商品id
		$.ajax({
			url:"../api/index1.api.php?act=addmore",
			type:"get",
			dataType:"json",
			data:{"id":url,"num":chal},
			success:function(data){
				console.log(data);
				if(data==0){
					$("#login").show();
					$("html,body").animate({
						scrollTop: "0px"
					}, 80);
					
				}else{
					window.location.href="bio-shoppingcart.php";
				}
				// window.location.href='bio-shoppingcart.php';
			}
		})
	}
    </script>
		
		<script type="text/javascript">
				//控制隐藏div快速浏览的显示
				$(document).ready(function(){
					$(document).on('mouseover','#isb-introduce1',function(){
						$(this).children().eq(1).children().show();
					});
		
					$(document).on('mouseout','#isb-introduce1',function(){
						$(this).children().eq(1).children().hide();
					});
				});
			</script>