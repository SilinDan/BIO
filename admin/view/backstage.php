<?php
    session_start();
    header('Content-type:text/html;charset=utf-8');
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理</title>
    <meta name="keywords" content="简单,实用,网站后台,后台管理,管理系统,网站模板" />
    <meta name="description" content="简单实用网站后台管理系统网站模板下载。" /> 
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>   
		<style>
			.head-l{
				float: right;
				margin-top: 25px;
				margin-left: 15px;
				margin-right: 15px;
			}
			
		</style>
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <?php 
                          if (isset($_SESSION['admin_name'])) {
                            echo '<div class="logo margin-big-left fadein-top">
                               <h1></h1>';
                            echo "管理员：{$_SESSION['admin_name']}";
                            echo '</div>';
                          }
                          else{
                            echo ' <div class="logo margin-big-left fadein-top">
                       <h1><img src="images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
                        </div>';
                          }
      
                      ?>
 
  <div class="head-l">


    <a  href="outjump.php">
   <span class="icon-power-off"></span>退出登录</a> </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>基本设置</h2>
  <ul style="display:block">
    <li><a href="listadmin.php?page=1&size=5" target="right"><span class="icon-caret-right"></span>查看管理员</a></li>
    <li><a href="changepwd.html" target="right"><span class="icon-caret-right"></span>修改密码</a></li>
   
  </ul>   
  <h2><span class="icon-pencil-square-o"></span>栏目管理</h2>
  <ul>
  	 <li><a href="listcomment.php?page=1&size=5" target="right"><span class="icon-caret-right"></span>商品评价管理</a></li>     
    <li><a href="listgoods.php?page=1&size=20" target="right"><span class="icon-caret-right"></span>查看商品详情</a></li>
    <li><a href="listorder.php?page=1&size=5" target="right"><span class="icon-caret-right"></span>查看订单详情</a></li>
    <li><a href="listuser.php?page=1&size=5" target="right"><span class="icon-caret-right"></span>查看用户信息</a></li>
    <li><a href="category.html" target="right"><span class="icon-caret-right"></span>分级管理</a></li>   
  </ul>  
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>

<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="listuser.php?page=1&size=5" name="right" width="100%" height="100%"></iframe>
</div>
</body>
</html>