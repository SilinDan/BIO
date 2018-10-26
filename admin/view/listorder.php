<?php 
  header("content-type:text/html; charset=utf-8;");
  // error_reporting(E_ALL ^ E_NOTICE);
  include("../model/Db.class.php");
  include("../controller/user.class.php");
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
<link rel="stylesheet" type="text/css" href="css/bootstrap/3.3.6/bootstrap.min.css">
<script src="js/jquery.js"></script>
<script src="js/ling_bio.js"></script>
<script src="js/pintuer.js"></script>


<style type="text/css">
  .panel-tis{
    height: 40px;
    width: 100%;
    background: #E7F8FC;
    color: #7A9497;
    font-size: 0.9em;
    line-height: 18px;
  }
  .panel-head input{
    height: 25px;
    width: 120px;
    color: #949494;
    margin-left: 10px;
    float: right;
  }
  .panel-head select{
    height: 25px;
    width: 70px;
    float: right;
    margin-left: 10px;
  }
  .icon-plus-square-o{
    height: 30px;
    line-height: 0px;
  }
  .text-center tr{
    height: 20px;
  }
  .text-center td{
    border-left: 1px solid #F8F0F1; 
    /*border-right: 1px solid #F8F0F1;  */
  }
.border-red{
  margin-top: 1px;
  height: 30px;
  line-height: 0px;
}
</style>
<script type="text/javascript">
    
      //模糊搜索商品名
     $(document).ready(function(){
      $("#searchBtn").click(function(){
        var send_state=$("#send_state").val();
        var order_state=$("#order_state").val();
        if (send_state=="" && order_state=="") {
          alert("值为空！不可搜索！");
        }else{
          $.ajax({
            url:"../api/user.api.php?act=ajaxSearchBtn",
            type:"get",
            dataType:"json",
            data:{send_state:$("#send_state").val(),order_state:$("#order_state").val()},
            success:function(data){ 
            var tab='<tr style="background: #F5F5F5;"> <td width="80px" style="text-align:left; padding-left:20px;"> <input type="checkbox" id="checkall" value="" /></td>  <th width="80px" style="text-align:left; padding-left:20px;">订单编号</th> <th width="10%">收货人</th><th width="60px">总金额</th><th>订单状态</th><th>支付状态</th> <th width="10%">发货状态</th> <th width="100px">支付方式</th><th>配送方法</th>  <th>下单时间</th><th></th><th>操作</th> <th></th></tr>';
         

              $.each(data,function(i){
               tab+='<tr id="hang" onclick="checkhang(this)" cellspacing="0" cellpadding="0">   <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="list[]" value="" />'+data[i].order_id+'</td>  <td>'+data[i].order_num+'</td> </td><td width="15%">'+data[i].user_name+':'+data[i].user_phone+'</td> <td>'+data[i].sum_price+'</td> <td>'+data[i].order_state+'</td> <td >'+data[i].pay_state+'</td>  <td>'+data[i].send_state+'</td> <td>'+data[i].pay_way+'</td> <td>'+data[i].send_way+'</td> <td>'+data[i].order_time+'</td>';
               tab+='</td><td onclick="lookInfo('+data[i].order_id+')">查看</td> </td><td onclick="checkhang1('+data[i].order_id+')">修改</td>  <td onclick="delete_admin('+data[i].order_id+', this)" class="icon-trash-o">删除</td></tr>';
               })
            
               $("#selCommentList").html(tab);
             
              }


          })
        }
      })
    });

    </script>
</head>
<body>
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head">
        <strong > 商品订单 </strong>
        <span style="font-size: 0.9em;padding-left: 10px;color: #949494;"> 
            商城实物商品交易订单查询及管理
        </span>  
        <a href="" style="float:right; display:none;">添加字段</a>
    </div>
    <div class="panel-tis">
      <ul>
        <li><span style="color: #F0B7D1;">. </span>未支付的订单可以取消</li>
        <li><span style="color: #F0B7D1;">. </span>用户收货后，如果没有点击“确认收货”、系统自动根据设置的时间自动收货</li>
      </ul>
    </div>
    <div class="panel-head" style="border: none;">
        <strong > 订单列表 </strong>
        <span style="font-size: 0.9em;color: #949494;"> 
            （共1393条记录）
        </span>
        <!-- <span class="glyphicon glyphicon-refresh"></span>   -->
     <!--    <input type="submit" name="" value="搜索" style="height: 25px;width: 40px;font-size: 0.9em;text-align: center;line-height: 25px;"id="searchBtn"> -->
      <input style="width: 50px;" type="button" name="" value="搜索" class="button-size" id="searchBtn">
         <select  placeholder="发货状态" name="send_state" id="send_state" style="width: 10%">
          <option value="" selected="selected">发货状态</option>
          <option>待发货</option>
          <option>未发货</option>
          <option>已发货</option>
        </select>
        <select  placeholder="订单状态" name="order_state" id="order_state" style="width: 10%">
          <option value="" selected="selected">订单状态</option>
          <option>已取消</option>
          <option>待确认</option>
          <option>已收货</option>
        </select>
    </div>

    <div class="padding border-bottom" >
      <ul class="search" style="padding-left:10px;height: 35px;margin-bottom: 0px;">
        <button type="button" class="button border-red" onclick="DelSelect()"><span class="icon-trash-o"></span> 批量删除</button>
        <li> <a class="button border-main icon-plus-square-o" style="" href="addorder.html"> 添加订单</a> </li>
      </ul>
    </div>

    <table class="table table-hover text-center" id="selCommentList">
      <tr style="background: #F5F5F5;">
        <td width="80px" style="text-align:left; padding-left:20px;"><input type="checkbox" id="checkall" value="" />
           </td>
        <th width="80px" style="text-align:left; padding-left:20px;">订单编号</th>
        <th width="10%">收货人</th>
        <th width="60px">总金额</th>
        <th>支付状态</th>
        <th>订单状态</th>
        <th width="10%">发货状态</th>
        <th width="100px">支付方式</th>
        <th>配送方法</th>
        <th>下单时间</th>
        <th></th>
        <th>操作</th>
        <th></th
      </tr>
      <volist name="list" id="vo">

    <?php
        $page = $_GET['page'];
        $frontPage = $page -1 ;
        $nextPage = $page +1;
        $size = $_GET['size'];
        $begin = ($page-1)*$size;
        $rs = $user->sumOrderId($page,$size); //当前页记录数
        $length  = sizeof($rs);
        $allPage =ceil($user->sumOrderSize($size)) ;

       for ($i=0; $i < $length; $i++) {
        date_default_timezone_set("UTC");
        $user_id = $rs[$i]["user_id"];//order
        $roy = $user->findUserId($user_id);//information
        $time1 = $rs[$i]["order_time"];
        $time = date("Y-m-d H:i:s",$time1);
        
           echo '<tr id="hang" onclick="checkhang(this)" cellspacing="0" cellpadding="0">
                <td style="text-align:left; padding-left:20px;"><input id="'.$rs[$i]["order_id"].'" type="checkbox" name="list[]" value="';
          echo $i;
          echo '" />';
          echo $rs[$i]["order_id"];
          echo '</td><td>';
          echo $rs[$i]["order_num"];
          echo '</td><td width="15%">';
          echo $roy[0]["user_name"].':'.$roy[0]["user_phone"];
          echo '</td><td>';
          echo $rs[$i]["sum_price"];
          echo '</td><td>';
          echo $rs[$i]["pay_state"];
          echo '</td><td>';
          echo $rs[$i]["order_state"];
          echo '</td><td>';
          echo $rs[$i]["send_state"];
          echo '</td><td>';
          echo $rs[$i]["pay_way"];
          echo '</td><td>';
          echo $rs[$i]["send_way"];
          echo '</td><td>';
          echo $time;
          echo '</td><td onclick="lookInfo('.$rs[$i]["order_id"].')">查看</td>
          </td><td onclick="checkhang1('.$rs[$i]["order_id"].')">修改</td>
          <td onclick="delete_admin('.$rs[$i]["order_id"].', this)" class="icon-trash-o">删除</td></tr>';
        }
    ?>
   		 <tr>
        <td colspan="12"><div class="pagelist"> 
        <?php 
          if ($frontPage>0) {
           echo '<a href="listorder.php?page=';
           echo $frontPage;
           echo '&size=';
           echo $size;
           echo '">上一页</a>';
          }
          else{

          }
          
         ?>
        
       
         <?php 
         if ($page == 1) {
            echo '<a  href="listorder.php?page=1';
            echo '&size=';
            echo $size;
            echo '"><span class="current">1</span></a>';
          
            echo '<a href="listorder.php?page=2';
            echo '&size=';
            echo $size;
            echo '">2</a>';
         
            echo '<a href="listorder.php?page=3';
            echo '&size=';
            echo $size;
            echo '">3</a>';
         }else if($page == 2){
            echo '<a  href="listorder.php?page=1';
            echo '&size=';
            echo $size;
            echo '">1</a>';
          
            echo '<a href="listorder.php?page=2';
            echo '&size=';
            echo $size;
            echo '"><span class="current">2</span></a>';
         
            echo '<a href="listorder.php?page=3';
            echo '&size=';
            echo $size;
            echo '">3</a>';
         }else if($page == 3){
            echo '<a  href="listorder.php?page=1';
            echo '&size=';
            echo $size;
            echo '">1</a>';
          
            echo '<a href="listorder.php?page=2';
            echo '&size=';
            echo $size;
            echo '">2</a>';
         
            echo '<a href="listorder.php?page=3';
            echo '&size=';
            echo $size;
            echo '"><span class="current">3</span></a>';
         }
          
         ?>

        <?php 
         if ($page < $allPage) {
          echo '<a href="listorder.php?page=';
          echo $nextPage;
          echo '&size=';
          echo $size;
          echo '">下一页</a>';
         }
         else{
         }
        ?>
        </div>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

  function delete_admin(id, e){
   if( confirm("是否删除")){
  
  $.ajax({
              url:"../api/user.api.php?order=orderDelete",
              type:'post',
              dataType:'json',
              data: {
                  id: id
              },
              success:function(res) {
                if(res){
                  alert("删除成功！");
                  location.href = 'listorder.php?page=1&size=5';
                  $(e).parent().parent().remove();
                }
                else{
                  alert("删除失败！")
                }
              }
            })
  }
}
function checkhang1(id) {
  location = `alterorder.html?id=${id}`;
}
function lookInfo(id) {
  location = `lookorder.html?id=${id}`;
}
function DelSelect(){
  var list=$(':checkbox:checked').not("#checkall");
  var ids="";
  list.each(function(){
      ids += $(this).val()+',';
  });
  if(ids.length==0){
      alert('请选择要删除的选项');
  }
  else{
    var arr=new Array();
    $("input[checked='checked'").each(function(){
      arr.push($(this).attr("id"));//
      var id=($(this).attr("id"));
    });
    
    if( confirm("是否删除")){
    for(var key in arr){
      delete_all(arr[key], this);
    }
    alert("删除成功！");
       location.href = 'listorder.php?page=1&size=5';}

  }
}

function delete_all(id, e){
  $.ajax({
    url:"../api/user.api.php?order=orderDelete",
    type:'post',
    dataType:'json',
    data: {
        id: id
    },
    success:function(res) {
      if(res){
         // alert("删除成功！");
        // location.href = 'listadmin.php?page=1&size=5';
        $(e).parent().parent().remove();
      }
      else{
        alert("删除失败！")
      }

    }
  }) 
}

//搜索
function changesearch(){	
		
}

//单个删除
function del(id,mid,iscid){
	if(confirm("您确定要删除吗?")){
		
	}
}
         
//全选
$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

//批量删除
// function DelSelect(){
// 	var Checkbox=false;
// 	 $("input[name='id[]']").each(function(){
// 	  if (this.checked==true) {		
// 		Checkbox=true;	
// 	  }
// 	});
// 	if (Checkbox){
// 		var t=confirm("您确认要删除选中的内容吗？");
// 		if (t==false) return false;		
// 		$("#listform").submit();		
// 	}
// 	else{
// 		alert("请选择您要删除的内容!");
// 		return false;
// 	}
// }

//批量排序
function sorts(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		return false;
	}
}


//批量首页显示
function changeishome(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}

//批量推荐
function changeisvouch(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");	
		
		return false;
	}
}

//批量置顶
function changeistop(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}


//批量移动
function changecate(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		
		return false;
	}
}

//批量复制
function changecopy(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		var i = 0;
	    $("input[name='id[]']").each(function(){
	  		if (this.checked==true) {
				i++;
			}		
	    });
		if(i>1){ 
	    	alert("只能选择一条信息!");
			$(o).find("option:first").prop("selected","selected");
		}else{
		
			$("#listform").submit();		
		}	
	}
	else{
		alert("请选择要复制的内容!");
		$(o).find("option:first").prop("selected","selected");
		return false;
	}
}

</script>
</body>
</html>