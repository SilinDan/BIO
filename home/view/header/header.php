<?php 
            if (isset($_SESSION['logname'])) {
                echo '<div id="login" class="bg">';
                echo '</div>';
        
            }
            else{
                echo '
        
                    <div id="login" class="bg">
                        <div class="log-bg">
                            <div class="log-left">
                                <div class="log-left-content">
                                    <div class="login-content-header">用户登录</div>
                                    <div class="login-content-left">
                                        <form action="../api/index.api.php?act=login" method="post">
                                            <input type="text" placeholder="您的邮箱/手机*" name="logname" value="" class="input-id" onblur="verificationUser()"><br/>
                                            <div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-user"></div>
                                            <input type="password" placeholder="您的密码*" name="logpwd" value="" class="input-pwd" onblur="verificationPwd()">                                           <div style=" position: absolute;color: #f00;font-size: 12px;" class="tips-pwd"></div>
                                            <br/>
                                            <div class="autolog-div">
                                                <a href="#" class="a-forgetpwd" onclick="">忘记密码？</a>
                                                <input type="checkbox" name="" value="" class="input-autolog"><span class="span-remember">记住用户名</span>
                                                <br/>
                                            </div>
                                            <div >
                                                <input type="submit" name="bio_denglu" value="登录" class="login-div" >
                                                <!-- <a href="#" class="log-in">登录</a> -->
                                            </div>
                                        </form>
                                    </div>
        
                                    <div class="login-content-center">
                                        <div class="split-line-div">
                                            <div class="split-line"></div>
                                            <div class="split-line-text">或</div>
                                            <div class="split-line"></div>
                                        </div>
                                    </div>
        
                                    <div class="login-content-right">
                                        <div class="other-log">
                                            使用合作网站账号登陆
                                        </div>
                                        <div class="other-log-way">                     
                                            <a href="#" class="login-way"><img src="./images/login-icon-wechat.png">微信</a>
                                            <a href="#" class="login-way"><img src="./images/login-icon-qq.png">QQ</a>
                                            <a href="#" class="login-way"><img src="./images/login-icon-weibo.png">微博</a>
                                            <a href="#" class="login-way"><img src="./images/login-icon-alipay.png">支付宝</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="log-right">
                                <div class="log-right-content">
                                    <div class="dialog-close">
                                        <a href="#" onclick="document.getElementById(';echo "'login'";echo ').style.display=';echo "'none'";echo '><span class="close-dialog">×</span></a>
                                    </div>
                                    <div class="new-user-content">
                                        <div class="new-user-title">新用户注册</div>
                                        <p class="p-explain">注册成为碧欧泉官方会员，第一时间获取官网最新资讯与特惠礼遇，查看物流信息，共享线上线下积分。</p>
                                        <div class="register-div">
                                            <a href="bio-register.php" class="user-register">立即注册</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
        
                 ';
            }
        
         ?>

        <div class="subscribe">
            <button class="subscribe_close">×</button>
            <div class="subscribe_ok">订阅成功，感谢您的订阅</div>
            <div class="subscribe_href"><a href="index.v.php">继续购物</a></div>
            <span>还没有账号？</span>
            <div class="subscribe_href"><a href="bio-register.php">立即注册</a></div>
        </div>
        <div class="body_box"></div>
        <div class="E_zine">
            <div class="E_zine_main">
                <button class="close_E-zine" >×</button>
                <div class="E_Zine_cnt">
                    <div class="title" style="text-align: left;">
                        <span >订阅电子杂志</span><br />
                        <span style="font-size: 14px;">提交您的邮箱地址，获取法国碧欧泉最新资讯、官方特惠礼遇！</span>
                    </div>
                    <div class="cnt_Email">
                        <span class="user_email">您的邮箱 </span>
                        <input id="user_email" type="text" placeholder="请输入邮箱"/>
                        <button class="sub" type="submit"></button>

                    </div>
                    <span class="tips_email"></span><br />
                    <div class="E_zine_btm">

                        <div class="choose_box"><input type="checkbox"  class="choose" name="NO" /></div>
                        <div class="choose_box">
                            <span>我同意依照本<a href="http://policy.lorealchina.com/termsofusewebsite">使用条款</a>和<a href="http://policy.lorealchina.com/privacypolicy">隐私政策</a>对我的个人信息进行收集和使用；我已阅读并确认被给予充</span><br />
                            <span>分机会理解该<a href="http://policy.lorealchina.com/termsofusewebsite">使用条款</a>和<a href="http://policy.lorealchina.com/privacypolicy">隐私政策</a>的内容。</span><br />
                            <span class="tips_choos"></span>
                        </div>
                        
                    </div>
                </div>  
            </div>
        </div>

         <div class="header">
                            <div class="content">
                              <div class="content_left">
                                           <a href="index.v.php"><img src="./images/header_logo.png" title="Biotherm碧欧泉官方网上商城"></a>
                              </div>
                              <div class="content_right">
                                         <div class="invagation_list">
                                    
                                        <?php 
                                                if (isset($_SESSION['logname'])) {
                                                    echo '
                                                                <div class="shopaddress"><a href="ttt.php" style="padding-right:15px;">注销 </a><a href="bio-shopadd.php">专柜地址</a> </div>
                                                                <div class="service"><a href="bio-service.php">客服中心</a></div>
                                                                <div class="e-magzine"><a id="e-magzine" href="#">订阅电子杂志</a> </div>
                                                    ';
                                                    echo '<div class="login-regis" style="color:#fff;font-size:13px;" id="login-regis"><a href="bio-account.php">';
                                                    echo "{$_SESSION['logname']}";
                                                    echo '</a></div>';
                                                }
                                                else{
                                                    echo '
                                                                <div class="shopaddress"><a href="bio-shopadd.php">专柜地址</a> </div>
                                                                <div class="service"><a href="bio-service.php">客服中心</a></div>
                                                                <div class="e-magzine"><a id="e-magzine" href="#">订阅电子杂志</a> </div>
                                                    ';
                                                    echo '<div class="login-regis" id="login-regis"><a href="#">登陆与注册</a></div>';
                                                }
        
                                             ?>
                                                
                                                    <div class="shopping-bag" id="shopping-bag"><a href="bio-shoppingcart.php">购物袋</a>
                                                   <?php
                                                if(isset($_SESSION['logname'])) {
                                                $user_phone = $_SESSION['logname'];
                                                $ikum = $shop->checkUserName($user_phone);//获取整条用户的信息
                                                $id = $ikum[0]['id'];
                                                $ikum = $shop->checkShop($id);//获取整条购物车的信息
                                                $shop_sum = sizeof($ikum);
                                    
                                                if($shop_sum!=0){
                                                        echo '<div class="shopping-bag-box" id="shopping-bag-box" >
                                                                        <div class="shopping-bag-box1">
                                                                            <div class="box1"><span class="box1-text" ><strong>您的购物袋有<span id="box1-text1" class="box1-text1">';
                                                        echo    $shop_sum;
                                                        echo '</span>件产品</strong></span></div>';
                                                        
                                                        for ($i=0; $i < $shop_sum; $i++) {
                                                                $id = $ikum[$i]['goods_id'];
                                                                $roy = $shop->checkGood($id);
                                                                
                                                                echo  '<div class="box2">
                                                                                <div class="box2-img"><a href="detail-bio.php?id=';
                                                                echo  $roy[0]['goods_id'];
                                                                echo '"><img src="./images/goods/';
                                                                echo  $roy[0]['goods_img'];
                                                                echo '"></a></div>
                                                                                <div class="box2-text">
                                                                                    <div class="box2-text1">
                                                                                        <span class="span1">
                                                                            ';
                                                                echo  $roy[0]['goods_name'];
                                                                echo  '</span><span class="span2">规格 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                                                echo  $roy[0]['goods_size'];
                                                                echo  'ml中性 <span style="float:right;" id="qianqian'; 
                                                                echo    $ikum[$i]['shop_id'];
                                                                echo '">'; 
                                                                echo  $roy[0]['goods_price'];
                                                                echo '</span><span style="float:right;"><span style="display:none;" id="how">'; 
                                                                echo $i;
                                                                echo '</span>￥</span></span></div>
                                                                                <div class="box2-text2">
                                                                                                                        <input type="button" id="del';
                                                                                echo    $ikum[$i]['shop_id'];
                                                                                echo '" value="-" onclick="del(';
                                                                                echo    $ikum[$i]['shop_id'];
                                                                                echo                                ')"/>
                                                                                                                        <input type="text" style="width:40px;" id="text_box';
                                                                                echo    $ikum[$i]['shop_id'];
                                                                                echo '" class="text_box" value="'; 
                                                                                echo $ikum[$i]['shop_num'];
                                                                                echo '" />
                                                                                                                        <input type="button" value="+" id="add';
                                                                                echo    $ikum[$i]['shop_id'];
                                                                                echo '" onclick="add(';
                                                                                echo    $ikum[$i]['shop_id'];
                                                                                echo                    ')"/>
                                                                                
                                                                                            <strong><span class="box2-span">￥<span id="box2-span';
                                                                                echo    $i;
                                                                                echo '">';
                                                                echo  $roy[0]['goods_price']*$ikum[$i]['shop_num'];
                                                                echo  '</span></span></strong></div>
                                                                            </div>
                                                                        </div>';
                                                    }
                                                        echo    '<div class="box3">
                                                                    <div class="box3-text">
                                                                        <strong><span class="box3-text1">总计：</span>
                                                                        <span class="box3-text2">￥<span id="box3-text2">';
                                                        $sum =0;
                                                        for($i=0; $i < $shop_sum; $i++){
                                                            $id = $ikum[$i]['goods_id'];
                                                            $roy = $shop->checkGood($id);//获取整条商品的信息
                                                            $single_sum = $roy[0]['goods_price']*$ikum[$i]['shop_num'];
                                                            $sum += $single_sum;
                                                        }
                                                        echo $sum;
                                                        echo '</span></span></strong>
                                                                    </div>
                                                                    <div class="box3-input">
                                                                        <button class="input" type="button" onclick="window.location.href=';
                                                        echo  "'bio-shoppingcart.php'";
                                                        echo    '" name="jiesuan" value="立即结算">立即结算</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>';
                                                }
                                                        else{
                                                    echo '<div class="shopping-bag-box" style="height:200px;" id="shopping-bag-box" >
                                                                    <div class="shopping-bag-box1" style="height:150px;">
                                                                        <div class="box1"><span class="box1-text"><strong>
                                                                                您的购物袋有<span class="box1-text1">0</span>件产品
                                                                        </strong></span></div>
                                                                        <div>您的购物袋中没有任何商品</div>
                                                                    </div>
                                                                </div>';
                                                }
                                            }
                                                        else{
                                                echo '<div class="shopping-bag-box" style="height:200px;" id="shopping-bag-box" >
                                                                <div class="shopping-bag-box1" style="height:150px;">
                                                                    <div class="box1"><span class="box1-text"><strong>
                                                                            您的购物袋有<span class="box1-text1">0</span>件产品
                                                                    </strong></span></div>
                                                                    <div>您的购物袋中没有任何商品</div>
                                                                </div>
                                                            </div>';
                                            }
                                                    ?>
                                                     </div>
                                 </div>
                                         <div class="weixin-weibo-all">
                                            <img  class="header_weibo" src="./images/weibo.png">
                                            <img  class="header_weixin" src="./images/weixin.png">
        
                                            <a href="searchGoodsList.php?searchValue=查看所有分类&searchJudge=all">全部产品</a>
                                             <input type="text" class="search_box" id="searchBox" name="search"   value="绿活泉" onfocus="if (value =='绿活泉'){value =''}"onblur="if (value ==''){value='绿活泉'}"/>
                                             <div class="search_box_submit" onclick="searchBoxSubmit()"></div>
                                           </div>  
                                           <div>
                                           
                                          </div>
                              </div>
                            </div>              
        </div>
        
        <div style="width: 1176px;margin: 0 auto;">
            <div style="margin-bottom: -5px;">
                <img src="./images/wpb201808301.jpg">
            </div>
        </div>

        <?php
$sContent = "<script type='text/javascript'>
    function searchBoxSubmit(){
        var searchValue = $('#searchBox').val();
        var searchUrl =encodeURI('searchGoodsList.php?searchValue=' + searchValue+'&searchJudge=search');
        window.location.href =searchUrl;
        // location.href='searchGoodsList.php?searchValue=' + searchValue;
    }
</script>";
echo $sContent;
?>