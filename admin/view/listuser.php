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
<script src="js/ling_bio.js"></script>
<style type="text/css">
	th{
		background: #fafafa;
	}
  .icon-plus-square-o{
    line-height: 14px;
  }
</style>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 用户管理</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
  <div class="panel-prompt1">
      <div class="panel-prompt-title"><img src="./images/2018-09-20_201558.png"><span class="span-prompt-title">操作提示</span></div>
      <p class="p-prompt-text"><span style="color: #F1B7CA;">.</span>管理员列表管理，可修改后台管理员登录密码和所属角色</p>
      
    </div>
 <div class="appraise-list-title">
      <span class="span-appraise-list-title"> 用户管理列表</span>
      <span class="span-appraise-record">（共7条记录）</span>
     </div>
  <table class="table table-hover text-center">
    <tr>
          <td colspan="8" style="text-align: left;padding-left: 20px;">
            <button type="button" class="button border-red" onclick="DelSelect()"><span class="icon-trash-o"></span> 批量删除</button>
            
          </td>
    </tr>
    <tr>
      <th width="5%"><input type="checkbox" id="checkall" name="nameall" value="" />ID</th>
      <th width="10%">用户账号</th>
      <th width="8%">用户名</th>
      <th width="10%">密码</th>
      <th width="8%">性别</th>
      <th width="10%">邮箱</th>
      <th width="15%">注册时间</th>
      <th width="10%" colspan="2">操作</th>
    </tr>
    
    <?php
        $page = $_GET['page'];
        $frontPage = $page -1 ;
        $nextPage = $page +1;
        $size = $_GET['size'];
        $begin = ($page-1)*$size;
        $rs = $user->sumUserId($page,$size); //当前页记录
        $length  = sizeof($rs);
        $allPage =ceil($user->sumUserSize($size)) ;

        for ($i=0; $i < $length; $i++) {
          $id = $rs[$i]["id"];
          $rs1 = $user->sumInfoId($id);
          $lengthInfo = sizeof($rs1);
            // if ($lengthInfo>0) {
               // for ($j=0; $j < $lengthInfo; $j++) { 
                   date_default_timezone_set("UTC");
                  $user_id = $rs[$i]["id"];
                  // $roy = $user->findUserId($user_id);
                  $time1 = $rs[$i]["reg_time"];
                  $time = date("Y-m-d H:i:s",$time1);
              //$sqln = date("Y-m-d",$n);
                    echo '<tr id="hang" onclick="checkhang(this)">
                          <td><input type="checkbox" name="list[]" value="';
                    echo $i+1;
                    echo '" />'; 
                    echo $rs[$i]["id"];//ID
                    echo '</td><td>';
                    echo $rs[$i]["user_phone"];//用户账号
                    echo '</td><td>';
                    if($rs){echo $rs[$i]["name"];}//收货人
                    echo '</td><td>';
                    echo $rs[$i]["pwd"];
                    echo '</td><td>';
                    echo $rs[$i]["sex"];
                    echo '</td><td>';
                    if($rs){ echo $rs[$i]["qqcom"];}
                    echo '</td>';
                    echo '<td>';
                    echo $time;
                    echo '</td><td onclick="lookMore(';
										echo $rs[$i]["id"];
										echo ')">查看</td><td onclick="delete_admin('.$rs[$i]["id"].', this)" class="icon-trash-o"> 删除</td>';
                  }
            // }
//            else { 
//            date_default_timezone_set("UTC");
//             $user_id = $rs[$i]["id"];
//             $roy = $user->findUserId($user_id);
//             $time1 = $rs[$i]["reg_time"];
//             $time = date("Y-m-d H:i:s",$time1);
//              //$sqln = date("Y-m-d",$n);
//              echo '<tr id="hang" onclick="checkhang(this)">
//                     <td><input id="'.$rs[$i]["id"].'" type="checkbox" name="list[]" value="';
//               echo $i;
//               echo '" />'; 
//               echo $rs[$i]["id"];
//               echo '</td><td>';
//               echo $rs[$i]["user_phone"];
//               echo '</td><td>';
//               if($roy){echo $roy[$j]["user_name"];}
//               echo '</td><td>';
//               echo $rs[$i]["pwd"];
//               echo '</td><td>';
//               echo $rs[$i]["sex"];
//               echo '</td><td>';
//               if($roy){ echo $roy[$j]["user_phone"];}
//               echo '</td><td>';
//               if($roy){
//                  echo $roy[$j]["province3"].$roy[$j]["city3"].$roy[$j]["area3"].$roy[$j]["detailed_add"];
//               }
//               echo '</td><td>';
//               echo $time;
//               echo '</td><td onclick="delete_admin('.$rs[$i]["id"].', this)" class="icon-trash-o"> 删除</td>';
//             }
//        
				// }
    ?>
      
      <tr>
        <td colspan="9"><div class="pagelist"> 
        <?php 
          if ($frontPage>0) {
           echo '<a href="listuser.php?page=';
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
            echo '<a  href="listuser.php?page=1';
            echo '&size=';
            echo $size;
            echo '"><span class="current">1</span></a>';
          
            echo '<a href="listuser.php?page=2';
            echo '&size=';
            echo $size;
            echo '">2</a>';
         
            echo '<a href="listuser.php?page=3';
            echo '&size=';
            echo $size;
            echo '">3</a>';
         }else if($page == 2){
            echo '<a  href="listuser.php?page=1';
            echo '&size=';
            echo $size;
            echo '">1</a>';
          
            echo '<a href="listuser.php?page=2';
            echo '&size=';
            echo $size;
            echo '"><span class="current">2</span></a>';
         
            echo '<a href="listuser.php?page=3';
            echo '&size=';
            echo $size;
            echo '">3</a>';
         }else if($page == 3){
            echo '<a  href="listuser.php?page=1';
            echo '&size=';
            echo $size;
            echo '">1</a>';
          
            echo '<a href="listuser.php?page=2';
            echo '&size=';
            echo $size;
            echo '">2</a>';
         
            echo '<a href="listuser.php?page=3';
            echo '&size=';
            echo $size;
            echo '"><span class="current">3</span></a>';
         }
          
         ?>

        <?php 
         if ($page < $allPage) {
          echo '<a href="listuser.php?page=';
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
<script type="text/javascript">
function lookMore(id){
	location = `lookuser.php?id=${id}`;
}
function delete_admin(id, e){
   if( confirm("是否删除")){
  $.ajax({
              url:"../api/information.api.php?information=informationDelete",
              type:'post',
              dataType:'json',
              data: {
                  id: id
              },
              success:function(res) {
                if(res){
                  alert("删除成功！");
                  location.href = 'listuser.php?page=1&size=5';
                  $(e).parent().parent().remove();
                }
                else{
                  alert("删除失败！")
                }
              }
            })
  }
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
      location.href = 'listuser.php?page=1&size=5';

  }
}
}
function delete_all(id, e){
  $.ajax({
    url:"../api/information.api.php?information=informationDelete",
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

</script>
</body></html>