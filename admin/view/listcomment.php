<?php 
  header("content-type:text/html; charset=utf-8;");
  // error_reporting(E_ALL ^ E_NOTICE);
  include("../model/Db.class.php");
  include("../controller/comment.class.php");
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

    <script type="text/javascript">
      function delete_shopbox(e){
     $('.button-group')
     $(e).parent().parent().parent().parent().parent().remove();
}


      //模糊搜索商品名
     $(document).ready(function(){ 
      $("#searchBtn").click(function(){

        var com_user=$("#com_user").val();
        var com_goods=$("#com_goods").val();
        if (com_user=="" && com_goods=="") {
          alert("值为空！不可搜索！");
        }else{
          $.ajax({
            url:"../api/comment.api.php?act=ajaxSearchBtn",
            type:"get",
            dataType:"json",
            data:{
              com_user:$("#com_user").val(), com_goods:$("#com_goods").val()},
            success:function(data){
                var tab='<tr> <td colspan="8" style="text-align: left;padding-left: 34px;"> <input type="checkbox" id="checkall" name="nameall" value="" />全选 <button type="button" class="button border-red" onclick="DelSelect()"><span class="icon-trash-o"></span> 批量删除</button> </tr> <tr style="background: #fafafa;">  <th width="100px;">★</th> <th>用户</th>  <th width="30%">评论内容</th><th>商品</th><th>评论时间</th><th>操作</th>  </tr> </tr>';

              $.each(data,function(i){
               tab+='<tr id="hang" onclick="checkhang(this)">  <td><input type="checkbox" name="list[]" value="1" />'+data[i].com_id+'</td> <td>'+data[i].com_user+'</td>  <td>'+data[i].com_content+'"</td>  <td>'+data[i].com_goods+'</td> <td >'+data[i].com_time+'</td> ';
               tab+='</td><td onclick="delete_comment('+data[i].com_id+', this)" class="icon-trash-o"> 删除</td></tr>';
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
<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 评价管理</strong></div>
    <div class="panel-prompt">
      <div class="panel-prompt-title"><img src="./images/2018-09-20_201558.png"><span class="span-prompt-title">操作提示</span></div>
      <p class="p-prompt-text"><span style="color: #F1B7CA;">.</span> 用户对购买的商品进行评价</p>
      <p class="p-prompt-text"><span style="color: #F1B7CA;">.</span> 显示栏可控制某条评论是否显示或隐藏</p>
    </div>
    <div class="appraise-list-title">
      <span class="span-appraise-list-title">商品评价列表</span><span class="span-appraise-record">（共300条记录）</span>
      <div class="appraise-search">
        <input type="text" name="" placeholder="评论用户" class="input-imformation" id="com_user">
        <input type="text" name="" placeholder="搜索评价商品" class="input-imformation" id="com_goods">
        <input type="button" name="" value="搜索" class="button-size"  id="searchBtn">
      </div>
    </div>
   
    <table class="table table-hover text-center" id="selCommentList">
        <tr>
          <td colspan="8" style="text-align: left;padding-left: 34px;">
            <input type="checkbox" id="checkall" name="nameall" value="" />全选
            <button type="button" class="button border-red" onclick="DelSelect()"><span class="icon-trash-o"></span> 批量删除</button>
        </tr>
      <tr style="background: #fafafa;">
        <th width="100px;">★</th>
        <th>用户</th>       
        <th width="30%">评论内容</th>
        <th>商品</th>
        <th>评论时间</th>
        <th>操作</th>      
      </tr>  
        
        <?php
            $page = $_GET['page'];
            $frontPage = $page -1 ;
            $nextPage = $page +1;
            $size = $_GET['size'];
            $begin = ($page-1)*$size;
            $rs = $user->sumCommentId($page,$size); //当前页记录数
            $length  = sizeof($rs);
            $allPage =ceil($user->sumCommentSize($size)) ;

            for ($i=0; $i < $length; $i++) {
            date_default_timezone_set("UTC");
            $time1 = $rs[$i]["com_time"];
            // $time = date("Y-m-d H:i:s",$time1);
        //$sqln = date("Y-m-d",$n);
             echo '<tr id="hang" onclick="checkhang(this)">
                    <td><input id="'.$rs[$i]["com_id"].'" type="checkbox" name="list[]" value="';
              echo $i;
              echo '" />'; 
              echo $rs[$i]["com_id"];
              echo '</td><td>';
              echo $rs[$i]["com_user"];
              echo '</td><td>';
              echo $rs[$i]["com_content"];
              echo '</td><td>';
              echo $rs[$i]["com_goods"];
              echo '</td><td>';
              echo $rs[$i]["com_time"];
              echo '</td><td>';
              echo $time1;
              echo '</td><td onclick="delete_comment('.$rs[$i]["com_id"].', this)" class="icon-trash-o"> 删除</td>';
            }
        ?>


        <tr>
        <td colspan="8"><div class="pagelist"> 
        <?php 
          if ($frontPage>0) {
           echo '<a href="listcomment.php?page=';
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
            echo '<a  href="listcomment.php?page=1';
            echo '&size=';
            echo $size;
            echo '"><span class="current">1</span></a>';
          
            echo '<a href="listcomment.php?page=2';
            echo '&size=';
            echo $size;
            echo '">2</a>';
         
            echo '<a href="listcomment.php?page=3';
            echo '&size=';
            echo $size;
            echo '">3</a>';
         }else if($page == 2){
            echo '<a  href="listcomment.php?page=1';
            echo '&size=';
            echo $size;
            echo '">1</a>';
          
            echo '<a href="listcomment.php?page=2';
            echo '&size=';
            echo $size;
            echo '"><span class="current">2</span></a>';
         
            echo '<a href="listcomment.php?page=3';
            echo '&size=';
            echo $size;
            echo '">3</a>';
         }else if($page == 3){
            echo '<a  href="listcomment.php?page=1';
            echo '&size=';
            echo $size;
            echo '">1</a>';
          
            echo '<a href="listcomment.php?page=2';
            echo '&size=';
            echo $size;
            echo '">2</a>';
         
            echo '<a href="listcomment.php?page=3';
            echo '&size=';
            echo $size;
            echo '"><span class="current">3</span></a>';
         }
          
         ?>

        <?php 
         if ($page < $allPage) {
          echo '<a href="listcomment.php?page=';
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
function delete_comment(id, e){
   if( confirm("是否删除")){
  
  $.ajax({
              url:"../api/comment.api.php?comment=commentDelete",
              type:'post',
              dataType:'json',
              data: {
                  id: id
              },
              success:function(res) {
                if(res){
                  alert("删除成功！");
                  location.href = 'listcomment.php?page=1&size=5';
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
      location.href = 'listcomment.php?page=1&size=5';}

  }
}

function delete_all(id, e){
  $.ajax({
    url:"../api/comment.api.php?comment=commentDelete",
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