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

    <link href="../../public/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
	<script src="js/jquery/2.0.0/jquery.min.js" type="text/javascript" charset="utf-8"></script>
			<link rel="stylesheet" type="text/css" href="css/default.css"/>
			<link rel="stylesheet" type="text/css" href="css/changping-box.css">
			<link rel="stylesheet" type="text/css" href="css/moblie-deta-bio.css">
            <link rel="stylesheet" type="text/css" href="css/mobile-detial-bio-add.css">
            <link rel="stylesheet" type="text/css" href="css/commentstar.css">
			<link rel="stylesheet" type="text/css" href="css/bootstrap/3.3.6/bootstrap.css"/>
			<script src="js/bootstrap/3.3.6/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
            <script type="text/javascript" src="./js/js/mobile_detial_bio.js"></script>
	       

	<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/bootstrap-3.3.4.css">
	<link rel="stylesheet" href="css/style.css">
   <style type="text/css">
   	.mdb-introduce-star {
    margin-top: -42px;
}
.mdb-box-link {
    height: 530px;
    width: 100%;
}
.mdbbp5-img img {
    top: 45%;
}
   </style>
     <script type="text/javascript">
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
                  $("#goods_img").attr("src",'../../home/view/images/goods/'+data[0].goods_img);
                  $("#goods_img_comment").attr("src",'../../home/view/images/goods/'+data[0].goods_img);
                  $("#goods_name_comment").text(data[0].goods_name);    
                  $(".mdb-box-picture").html(data[0].goods_content);     
                  var tab='<input type="submit" name="mdbbp-ml2" id="mdbbp-ml2" value="一键加入购物袋" class="mdbbp-ml1"  onclick="getGoodsId('+data[0].goods_id+')">';
                  $('.mdb-box-shop').html(tab);
                }
              })
        });
        function getGoodsId($id) {
					var chal = $('#mdbbp-ml2').parent().parent().parent().parent().find("#text_box").val();
					// alert(chal);
					// console.log(chal);
            $.ajax({
                url:"../../home/api/index1.api.php?act=addmore",
                type:"get",
                dataType:"json",
                data:{"id":$id,"num":chal},
                success:function(data){
                   if(data==0){
                    window.location.href="moblie-admin-bio.php";
                    
                   }else{
                     window.location.href="mobile-shoppingcart1.php";
                   }
                }
            })
        }
        //随机获取推荐搭配
		$(document).ready(function(){
			console.log('test');
			$.ajax({
				url:"../../home/api/detail.api.php?act=ajaxRandShow",
				 type:"get",
			     dataType:"json",
			     data:{},
			     success:function(data){

			     	 var tab='<div class="mdbbp5-img"><img src="../../home/view/images/goods/'+data[0].goods_img+'" ><div class="mbb-introduce-name">'+data[0].goods_name+'</div><div class="mdb-introduce-star"><img src="./images/star-red.png"><img src="./images/star-red.png"><img src="./images/star-red.png"><img src="./images/star-red.png"><img src="./images/star-gery.png"></div><div class="mdb-price">¥'+data[0].goods_price+'</div><div class="mdbbp-ml3"><input type="submit" name="mdbbp-ml" value="'+data[0].goods_size+'ml" class="mdbbp-ml"><input type="submit" name="mdbbp-ml1" value="立即购买" class="mdbbp-ml2"></div></div>'

			         var tab1='<div class="mdbbp5-img"><img src="../../home/view/images/goods/'+data[1].goods_img+'"><div class="mbb-introduce-name">'+data[1].goods_name+'</div><div class="mdb-introduce-star"><img src="./images/star-red.png"><img src="./images/star-red.png"><img src="./images/star-red.png"><img src="./images/star-red.png"><img src="./images/star-gery.png"></div><div class="mdb-price">¥'+data[1].goods_price+'</div><div class="mdbbp-ml3"><input type="submit" name="mdbbp-ml" value="'+data[1].goods_size+'ml" class="mdbbp-ml"><input type="submit" name="mdbbp-ml1" value="立即购买" class="mdbbp-ml2" onclick="getGoodsId('+data[1].goods_id+')"></div></div>'
			            
			        var shop= '<input type="submit" name="mdbbp-ml2" value="一键加入购物袋" class="mdbbp-ml9"  onclick="getGoodsId('+data[0].goods_id+')">';

			         $('#suggest_collocation').html(tab);
               $('.mdb-box-pic').html(shop);
			         $('#other_like').html(tab1);
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
                    
                   
                   tab+='<div class="mdb-box-comments-all1"><div class="mdb-box-comments-left">';
                   tab+=' <ul>';
               var str=data[i].com_label;
                  var arr=new Array();
                  arr=str.split(',');//注split可以用字符或字符串分割
                  for(var y=0;y<arr.length;y++)
                    {
                    // alert(arr[i]);
                    tab+='<li>'+arr[y]+'</li>'
                    }

                   tab+='</ul></div><div class="mdb-box-comments-center">';

                  tab+=data[i].com_content+'</div><div class="mdb-box-comments-right">用户';
                  tab+=data[i].user_phone+'<br/>'+data[i].com_time+'</div><div class="mdb-box-comments-right1">';
                  tab+=data[i].com_buyway +'<br/>';
                  var starnum = data[i].com_star;
                        console.log(data[i].com_star);
                            for(var z=0;z<starnum;z++){
                                var com_star='';
                                com_star+='<img src="./images/star-blue.png">';
                                tab+=com_star;
                                }
                    tab+='</div></div>';

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
          <div class="mobile-bottom">
                      <a href="default.v.php">首页</a>
                      <a href="mobile-goods-fiflter.php?searchValue=护肤&searchJudge=second">头部</a>
                      <a href="mobile-goods-fiflter.php?searchValue=牛奶润肤&searchJudge=second">身体</a>
                      <a href="mobile-goods-fiflter.php?searchValue=防晒&searchJudge=second">防晒</a>
                      <a href="mobile-goods-fiflter.php?searchValue=男士产品&searchJudge=man">男士</a>
                    </div>
      	</div>			
      </div>
      
			<div class="mobile-content" style="background: #fff; min-width:320px ;"> 
            
                		<div class="little-nav">
                			<a href="default.v.php">	 首页 </a><span> ></span>
                			<a href="" style="color: #535355;">	 免费试用 </a>
                		</div>
                	<div class="mobile-detail-bio-all">
                			<div class="mdb-zi">
                				<a href="default.v.php">首页</a> >
                				<a href="">碧欧泉男士</a> >
                				<a href="">脸部护理</a> >
                				<a href="">按类型</a> >
                				<a href="">护肤</a> >
                				<a href="" style="color: #141831;"><span id="detailed_body_text_span1">男士水动力保湿乳</span></a>   
                			</div>
                			<div class="mdb-box-name" id="goods_name">
                				男士水动力保湿乳
                			</div>
                			<div class="mdb-box-name1" id="goods_english">
                				AQUAPOWER NORMAL SKIN 
                			</div>
                			<div class="mdb-box-name2" id="right_p3">
                				<img src="images/star-red.png"><img src="images/star-red.png"><img src="images/star-red.png"><img src="images/star-red.png">	
                				<a href="" id="read_num">阅读11条评论</a> |
                				<a href="#comment-location">书写评论</a>

                			</div>
                			<div class="mdb-box-img">
                				<div class="isb-introduce-hot"><img id="left_img1" style="width: 45px;height: 45px;" src="images/2018-09-12_094929.png"></div>
                                
                				<img id="goods_img" src="images/BIO10009_1.png">
                			</div>
                			<div class="mdb-box-price">
                				<div class="mdbbp-name" id="goods_price">￥480</div>
                				<div class="mdbbp-ml3">
                                    <select id="right_selectml" name="addr[]" class="mdbbp-ml">
                                        <option value="75ml中性" id="goods_size">75ml中性</option>
                                    </select>
                					<!-- <input type="text" name="mdbbp-ml" value="75ml中性" class="mdbbp-ml"> -->
                					<!-- <input type="text" name="mdbbp-ml1" value="数量：1" class="mdbbp-ml2"> -->
													<!-- <select id="right_selectml" name="addr[]" class="mdbbp-ml">
															<option value="1" id="goods_size">1</option>
															<option value="2" id="goods_size">2</option>
													</select> -->
																		<!-- <select id="right_selectnum" name="addr1[]" class="mdbbp-ml">
																				<option value="1">1</option>
																				<option value="2">2</option>
																				<option value="3">3</option>
																				<option value="4">4</option>
																				<option value="5">5</option>
																		</select> -->
                                  <!-- <select id="right_selectnum" name="addr1[]" class="mdbbp-ml2">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
																	</select> -->

                                <td class="cart-table-content-td4" >
																		<input value="-" onclick="del()" id="del" type="button" style="height: 45px;">
																		<input class="text_box" id="text_box" value="1" type="text" style="width: 20%;height: 45px;">
																		<input value="+" onclick="add()" id="add" type="button"  style="height: 45px;">
                                </td>
                				</div>
                			</div>
                			<div class="mdb-box-shop">
                				<input type="submit" name="mdbbp-ml2" value="加入购物袋" class="mdbbp-ml1">
                			</div>
                			<div class="mdbbp-ml3">
                				<span>有库存</span>
                				<div class="mdbbp-love"></div>
                			</div>
                			<div class="mdb-box-detial" id="goods_detail">
                				男士水动力保湿乳(中性) <br>
                				蕴含矿物温泉精粹，卓效保湿，适合中性及混合性皮肤。<br>
                				一抹即刻释放活泉动力，肌肤倍感舒适清爽，摆脱干燥困扰，散发健康光泽。<br>		
                				男士水动力保湿乳(干性) <br>
                				蕴含矿物温泉精粹，卓效保湿，适合干性皮肤。<br>
                				清爽啫喱质地，紧锁肌肤水分，为肌肤提供全天候滋润舒适<br>		
                			</div>
                			<div class="mdb-box-subject">
                				建议搭配
                			</div>
                <!-- 			<div class="mdb-bai"></div>
                			<div class="mdb-bai"></div> -->
                			<div class="mdb-box-link">
                				<div class="mdb-box-pic">
                					<input type="submit" name="mdbbp-ml2" value="一键加入购物袋" class="mdbbp-ml9" >
                				</div>
                				<div class="mdbbp-ml5" id="suggest_collocation">
                					<div class="mdbbp5-img">
                						<img src="../../home/view/images/goods/">
                					</div>
                					<div class="mbb-introduce-name">
                						男士水动力保湿乳七夕定制礼盒
                					</div>
                					<div class="mdb-introduce-star">
                						<img src="./images/star-gery.png">
                						<img src="./images/star-gery.png">
                						<img src="./images/star-gery.png">
                						<img src="./images/star-gery.png">
                						<img src="./images/star-gery.png">
                					</div>
                					<div class="mdb-price">¥390</div>
                					<div class="mdbbp-ml3">
                						<input type="submit" name="mdbbp-ml" value="礼盒" class="mdbbp-ml">
                						<input type="submit" name="mdbbp-ml1" value="立即购买" class="mdbbp-ml2">
                				</div>
                				</div>
                			</div>
                			<div class="mdb-box-subject" id="goods-content">
                				产品详情
                			</div>
                			<div class="mdb-box-picture">
                			
                				</div>
                			<!-- <div class="mdb-bai"></div>
                			<div class="mdb-bai"></div>
                			<div class="mdb-bai"></div> -->
                			<div id="comment-location" class="mdb-box-subject">
                				用户评论
                			</div>
                			<div class="mdb-box-comments-all">
                				<div class="mdb-com">
                					<img src="./images/detail-bio1.png" id="goods_img_comment">
                				</div>
                				<div class="mdb-pinlun">
                					总评价
                					<img src="images/star-red.png"><!--
                				--><img src="images/star-red.png"><!--
                				--><img src="images/star-red.png"><!--
                				--><img src="images/star-red.png"><!--
                				--><img src="images/star-red.png">
                				<br>	
                					<span id="comment_num">阅读3条评论</span>	<br>

                                    <?php
                                        if(isset($_SESSION['logname'])){
                                            echo '<a href="#comment-add" onclick="show()"><div class="dbbc-box">添加你的评论</div></a>';
                                        }else {
                                            echo '<a href="moblie-admin-bio.php"><div class="dbbc-box">
                                            添加你的评论</div></a>';
                                        }
                                    ?>
                					
                				</div>
                			</div>
                            <div id="comments_content_div" style="width: 90%;margin: 10px auto;">
                    			<div class="mdb-box-comments-all1" style="border-top: 1px solid #cbcbcc;">
                    				<div class="mdb-box-comments-left">
                    					<ul>
                    						<li>效果好</li>
                    						<li>包装完好</li>
                    						<li>物流快捷</li>
                    					</ul>
                    				</div>
                    				<div class="mdb-box-comments-center">东西不错，但是被骗了，包装箱里只有买的几样，没有该有的赠品</div>
                    				<div class="mdb-box-comments-right"> 
                    					18217515819<br>
                    					2018-01-27 10:01:00 
                    				</div>
                    				<div class="mdb-box-comments-right1"> 
                    					线上官网购买<br>
                    					<img src="images/star-red.png"><!--
                    				--><img src="images/star-red.png"><!--
                    				--><img src="images/star-red.png"><!--
                    				--><img src="images/star-red.png"><!--
                    				--><img src="images/star-red.png"> 
                    				</div>
                    			</div>
                    			<div class="mdb-box-comments-all1">
                    				<div class="mdb-box-comments-left">
                    					<ul>
                    						<li>效果好</li>
                    						<li>包装完好</li>
                    						<li>物流快捷</li>
                    					</ul>
                    				</div>
                    				<div class="mdb-box-comments-center">东西不错，但是被骗了，包装箱里只有买的几样，没有该有的赠品</div>
                    				<div class="mdb-box-comments-right"> 
                    					18217515819<br>
                    					2018-01-27 10:01:00 
                    				</div>
                    				<div class="mdb-box-comments-right1"> 
                    					线上官网购买<br>
                    					<img src="images/star-red.png"><!--
                    				--><img src="images/star-red.png"><!--
                    				--><img src="images/star-red.png"><!--
                    				--><img src="images/star-red.png"><!--
                    				--><img src="images/star-red.png"> 
                    				</div>
                    			</div>
                    			<div class="mdb-box-comments-all1">
                    				<div class="mdb-box-comments-left">
                    					<ul>
                    						<li>效果好</li>
                    						<li>包装完好</li>
                    						<li>物流快捷</li>
                    					</ul>
                    				</div>
                    				<div class="mdb-box-comments-center">东西不错，但是被骗了，包装箱里只有买的几样，没有该有的赠品</div>
                    				<div class="mdb-box-comments-right"> 
                    					18217515819<br>
                    					2018-01-27 10:01:00 
                    				</div>
                    				<div class="mdb-box-comments-right1"> 
                    					线上官网购买<br>
                    					<img src="images/star-red.png"><!--
                    				--><img src="images/star-red.png"><!--
                    				--><img src="images/star-red.png"><!--
                    				--><img src="images/star-red.png"><!--
                    				--><img src="images/star-red.png"> 
                    				</div>
                    			</div>
                            </div>
                            <div id="comment-add" class="detail-bio-comment-add hidden">
                                <div class="comment-add-min">
                                    <form id="addComment" method="post" action="../api/detail.api.php?act=ajaxAddComment">
                                        <div class="comment-add-title">发表评论</div>
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
                                                        <option class="comment-buyWay-select" disabled="selected">选择一个购买途径</option>
                                                        <option class="comment-buyWay-select" value="线上官网购买">线上官网购买</option>
                                                        <option class="comment-buyWay-select" value="线下店铺购买">线下店铺购买</option>
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
                                               
                                                   <input type="number" readonly class="form-control rating-value" id="com_star" name="com_star" style="display: none;">

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
                                                <div class="tips-star"></div>
                                            </div>
                                            <div class="comment-text">
                                                <div class="comment-tags-label">
                                                    <span class="font-red">*</span><span>评价：</span>
                                                </div>
                                                <div class="comment-input-box">
                                                    <textarea id="textContent" name="com_content" class="comment-text-content font-grey" maxlength="170" onkeyup="checkStrLengths()" onblur="checkTextContent()"></textarea><br/>
                                                    <div style=" position: relative;color: #f00;font-size: 12px;" class="tips-textContent"></div>
                                                    <span id="textNum" class="font-size-min">您还可以输入170个字</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-add-secondary">
                                            <!-- <div class="comment-tags">
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
                                            <div class="comment-add-sumbit-box">
                                                <div class="comment-add-tips">
                                                    <!-- <span class="font-grey font-size-min">请上传大于300×300的.jpeg或者.png等格式图片</span><br/> -->
                                                    <span class="font-red font-size-min">*为必填</span>
                                                </div>
                                                <div class="comment-add-sumbit">
                                                    <input type="submit" name="" id="comment_submit" class="comment-inputSub" value="提交您的评论" onclick="return checkInfo()">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                			<div class="mdb-bai"></div>
                			<div class="mdb-bai"></div>
                			<div class="mdb-box-subject">
                				其他用户还喜欢
                			</div>
                			<div class="mdbbp-ml6" id="other_like">
                					<div class="mdbbp5-img">
                						<img src="./images/index-single-box2.png">
                					</div>
                					<div class="mbb-introduce-name">
                						男士水动力保湿乳七夕定制礼盒
                					</div>
                					<div class="mdb-box-name1">
                						50ml
                					</div>
                					<div class="mdb-introduce-star">
                						<img src="./images/star-red.png">
                						<img src="./images/star-red.png">
                						<img src="./images/star-red.png">
                						<img src="./images/star-red.png">
                						<img src="./images/star-red.png">
                					</div>
                					<div class="mdb-price">¥390</div>
                					<input type="submit" name="mdbbp-ml1" value="立即购买" class="mdbbp-ml1">
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
		function del(){
			var num =  $('#del').parent().find($('#text_box')).val();
			var nu = Number(num);
			if(nu==1){
				var sum = 1;
			}
			else{
				var sum = nu-1
			};
			$('#text_box').val(sum);
		}
		function add(){
			var num =  $('#add').parent().find($('#text_box')).val();
			var nu = Number(num);
			var sum = nu+1;
			$('#text_box').val(sum);
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
	</script>
</body>
</html>
    <script src="./js/js/popper.min.js"></script>
    <script src="./css/bootstrap/3.3.6/bootstrap.min.js"></script>

    <script src="./js/js/jquery.rating-stars.min.js"></script>
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
        
        function searchBoxSubmit(){
    var searchValue = $("#searchBox").val();
    var searchUrl =encodeURI('mobile-goods-fiflter.php?searchValue=' + searchValue+'&searchJudge=search');
    window.location.href =searchUrl;}
    </script>