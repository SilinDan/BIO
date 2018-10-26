 
<?php 
  header("content-type:text/html; charset=utf-8;");
  // error_reporting(E_ALL ^ E_NOTICE);
  include("../model/Db.class.php");
  include("../controller/information.class.php");
  $user = new User();
 ?>
<!DOCTYPE html> 
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>  
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/conment.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
		<script src="js/ling_bio.js" type="text/javascript" charset="utf-8"></script>
    
</head>
<body>

  <div class="panel admin-panel">
    <div class="panel-head"><i class="fa fa-address-book-o"></i><strong> 订单-编辑订单 </strong> 网站系统订单资料</div>
    <div class="body-content">
    	<form method="post" class="form-x">
				<?php
					$id = $_GET['id'] ;
					$rs = $user->findId($id);
					$rs1 = $user->sumInfoId($id);
					$lengthInfo = sizeof($rs1);
					$time1 = $rs[0]["reg_time"];
					$time = date("Y-m-d H:i:s",$time1);
					echo '
						<div class="form-group">
							<div class="label">
								<label for="sitename">用户id：</label>
							</div>
							<div class="field">
									<span  id="user" name="order_num" style="line-height: 30px;">';
									echo $rs[0]["id"];//ID
									echo '</span> 
							</div>
						</div> 
						<div class="form-group">
							<div class="label">
									<label for="sitename">用户名:</label>
							</div>
							<div class="field">
									<span  id="order_name" name="order_name" style="line-height: 30px;">';
									if($rs){echo $rs[0]["name"];}//收货人
									echo '</span>     
							</div>
						</div>   
						<div class="form-group">
							<div class="label">
								<label for="sitename">用户账号：</label>
							</div>
							<div class="field">
										<span  id="sum_price" name="sum_price" style="line-height: 30px;">';
                    echo $rs[0]["user_phone"];//用户账号
                    echo '</span>          
							</div>
						</div>
						<div class="form-group">
								<div class="label">
									<label>密码：</label>
								</div>
								<div class="field">
										<span  id="order_state" name="order_state" style="line-height: 30px;">';
                    echo $rs[0]["pwd"];
                    echo '</span>          
								</div>
						</div>
						<div class="form-group">
							<div class="label">
								<label>性别：</label>
							</div>
							<div class="field">
										<span  id="pay_state" name="pay_state" style="line-height: 30px;">';
                    echo $rs[0]["sex"];
                    echo '</span>          
							</div>
						</div>
						<div class="form-group">
							<div class="label">
								<label>邮箱：</label>
							</div>
							<div class="field">
										<span  id="send_state" name="send_state" style="line-height: 30px;">';
                    if($rs){ echo $rs[0]["qqcom"];}
                    echo '</span> 
							</div>
						</div>
						<div class="form-group">
								<div class="label">
									<label>注册时间：</label>
								</div>
								<div class="field">
										<span  id="pay_way" name="pay_way" style="line-height: 30px;">';
                    echo $time;
                    echo '</span> 
								</div>
						</div>	
					';
					for ($j=0; $j < $lengthInfo; $j++) {
						date_default_timezone_set("UTC");
						$ti1 = $rs1[$j]["in_time"];
						$ti = date("Y-m-d H:i:s",$ti1);
						echo '
							<div class="form-group">
									<div class="label">
										<label>收货地址';
										echo $j+1;
										echo '：</label>
									</div>
									<div class="field">
											<span  id="send_way" name="send_way" style="line-height: 30px;">';
											echo $rs1[$j]["user_name"];
											echo '<br>';
											echo $rs1[$j]["user_phone"];
											echo '<br>';
											if($rs1){echo $rs1[$j]["user_post"];}
											echo '<br>';
											if($rs1){echo $rs1[$j]["user_tel"];}
											echo '<br>';
											echo $rs1[$j]["province3"].' '.$rs1[$j]["city3"].' '.$rs1[$j]["area3"];
											echo '<br>';
											echo $rs1[$j]["detailed_add"];
											echo '<br>';
											echo $ti;
											echo '</span> 
									</div>
							</div>	
						';
					}
				?>
    					     
    					   
    					
    					
    						
    						
    					
    						
                            
    					<div class="form-group">
    						<div class="label">
    							<label></label>
    						</div>
    						<div class="field">
                                <div id="alter" style="float: left; margin-right: 50px;">
                                </div>
                                
                                <a href="listuser.php?page=1&size=5">
                                <input type="button" name="" class="button bg-main icon-check-square-o" value="返回">
    						</div>
    					</div>      
    	</form>
    </div>
</div>
<script type="text/javascript">
	
//          $.ajax({
//               url:"../api/user.api.php?user=look",
//               type:'post',
//               dataType:"json",
//               data: {
//                 id: location.search.split('=')[1], 
//               },
//               success:function(res) {
//                 $('#user').html(res.id);
//                 $('#sum_price').html(res.sum_price);
// 				$('#order_name').html(res.user.user_name);
//                 $('#order_state').html(res.order_state);
//                 $('#pay_state').html(res.pay_state);
//                 $('#send_state').html(res.send_state);
//                 $('#pay_way').html(res.pay_way);
//                 $('#send_way').html(res.send_way);
//                 var tab='<a href="alterorder.html?id='+res.order_id+'"><input type="button" name="" class="button bg-main icon-check-square-o" value="修改" ></a>'
// 				$('#alter').html(tab);		
//                 $('#message').html(res.message);
//                  $('#invoice').html(res.invoice);   		
//                 
//               }
//           })

    </script>
    <script type="text/javascript">
        
    </script>
</body></html>