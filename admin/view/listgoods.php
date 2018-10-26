<?php 
  header("content-type:text/html; charset=utf-8;");
  // error_reporting(E_ALL ^ E_NOTICE);
  include("../model/Db.class.php");
  include("../controller/goods.class.php");
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
    <!-- <script type="text/javascript" src="./js/jquery-3.3.1.js"></script> -->
    <script src="js/pintuer.js"></script>
	<script src="js/ling_bio.js"></script>
    <style type="text/css">
      .button{
        line-height: 14px;
      }
    </style>
    <script type="text/javascript">
    
      //模糊搜索商品名
     $(document).ready(function(){
      $("#searchBtn").click(function(){
        var goods_name=$("#searchName").val();
        var goods_id=$("#searchID").val();
        if (goods_name=="" && goods_id=="") {
          alert("值为空！不可搜索！");
        }else{
          // alert($("#searchName").val()+'yyy'+'data');
          $.ajax({
            url:"../api/goods.api.php?act=ajaxSearchBtn",
            type:"get",
            dataType:"json",
            data:{goods_name:$("#searchName").val(),goods_id:$("#searchID").val()},
            success:function(data){
             // alert('yyy'+data);
                // alert(data[0].goods_name);
                // alert(data[0].goods_english);
                // var tab="";
              //   $.each(data,function(i){
              //  tab+=data[i].goods_id+data[i].goods_name+data[i].goods_english+data[i].goods_price+data[i].goods_remain+data[i].goods_size+data[i].goods_detail+'<br>'
              //  })
              // alert(tab);
              
              var tab='<tr> <td colspan="8" style="text-align: left;padding-left: 34px;"> <input type="checkbox" id="checkall" name="nameall" value="" />全选 <button type="button" class="button border-red" onclick="DelSelect()"><span class="icon-trash-o"></span> 批量删除</button>  <a class="button border-main icon-plus-square-o" href="addgoods.html"> 添加商品</a> </tr> <tr style="background: #fafafa;">  <th width="100px;">★</th>  <th width="100px;">商品名称</th>         <th width="100px;">英文名称</th> <th width="100px;">图片</th> <th width="100px;">商品价格</th>  <th width="100px;">商品库存</th>  <th width="100px;">商品规格</th>  <th width="300px;">描述</th>  <th width="70px;">操作</th>     </tr>';
              // alert(tab);

              $.each(data,function(i){
               tab+='<tr id="hang" onclick="checkhang(this)">  <td><input type="checkbox" name="list[]" value="1" />'+data[i].goods_id+'</td>  <td>'+data[i].goods_name+'</td> <td style="text-align: left;">'+data[i].goods_english+'</td>  <td><img width="100px;" height="100px;" src="../../home/view/images/goods/'+data[i].goods_img+'"</td>  <td>'+data[i].goods_price+'</td> <td style="text-align: left;">'+data[i].goods_remain+'</td>  <td>'+data[i].goods_size+'</td> <td>'+data[i].goods_detail+'</td>';
               tab+='<td><p onclick="delete_goods('+data[i].goods_id+', this)" class="icon-trash-o">删除</p> <p onclick="checkhang1('+data[i].goods_id+')">修改</p></td></tr>';
               })
              // alert(tab);
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
    <div class="panel-head"><strong class="icon-reorder"> 商品管理</strong></div>
    <div class="panel-prompt">
      <div class="panel-prompt-title"><img src="./images/2018-09-20_201558.png"><span class="span-prompt-title">操作提示</span></div>
      <p class="p-prompt-text"><span style="color: #F1B7CA;">.</span> 管理员对商品信息进行查看</p>
      <p class="p-prompt-text"><span style="color: #F1B7CA;">.</span> 管理员对商品信息进行修改</p>
    </div>
    <div class="appraise-list-title">
      <span class="span-appraise-list-title">商品列表</span><span class="span-appraise-record">（共300条记录）</span>
      <div class="appraise-search">
        <input type="text" name="" placeholder="搜索商品名" class="input-imformation" id="searchName">
        <input style="width: 100px;" type="text" name="" placeholder="搜索商品ID" class="input-imformation" id="searchID">
        <input style="width: 50px;" type="button" name="" value="搜索" class="button-size" id="searchBtn">
      </div>
    </div>
   
    <table class="table table-hover text-center" id="selCommentList">
        <tr>
          <td colspan="8" style="text-align: left;padding-left: 34px;">
            <input type="checkbox" id="checkall" name="nameall" value="" />全选
            <button type="button" class="button border-red" onclick="DelSelect()"><span class="icon-trash-o"></span> 批量删除</button>
            <a class="button border-main icon-plus-square-o" href="addgoods.html"> 添加商品</a>
        </tr>
      <tr style="background: #fafafa;">
        <th width="100px;">★</th>
        <th width="100px;">商品名称</th>       
        <th width="100px;">英文名称</th>
        <th width="100px;">图片</th>
        <th width="100px;">商品价格</th>
        <th width="100px;">商品库存</th>
        <th width="100px;">商品规格</th>
        <th width="300px;">描述</th>
        <th width="70px;">操作</th>     
      </tr>  
    <?php

        $page = $_GET['page'];
        $frontPage = $page -1 ;
        $nextPage = $page +1;
        $size = $_GET['size'];
        $begin = ($page-1)*$size;
        $rs = $user->sumGoodsId($page,$size); //当前页记录数
        $length  = sizeof($rs);
        $allPage =ceil($user->sumGoodsSize($size)) ;
             

      for ($i=0; $i < $length; $i++) {
          echo '<tr id="hang" onclick="checkhang(this)" cellspacing="0" cellpadding="0">
                <td  style="text-align:left; padding-left:20px;"><input id="'.$rs[$i]["goods_id"].'" type="checkbox" name="list[]" value="';
          echo $i;
          echo '" />';
          echo $rs[$i]["goods_id"];
          echo '</td><td>';
          echo $rs[$i]["goods_name"];
          echo '</td><td>';
          echo $rs[$i]["goods_english"];
          echo '</td><td><img width="100px;" height="100px;" src="../../home/view/images/goods/';
          echo $rs[$i]["goods_img"];
          echo '"></td><td>';
          echo $rs[$i]["goods_price"];
          echo '</td><td>';
          echo $rs[$i]["goods_remain"];
          echo '</td><td>';
          echo $rs[$i]["goods_size"];
          echo '</td><td>';
          echo $rs[$i]["goods_detail"];
          echo '</td><td><p onclick="delete_goods('.$rs[$i]["goods_id"].', this)" class="icon-trash-o">删除</p>
          <p onclick="checkhang1('.$rs[$i]["goods_id"].')">修改</p></td></tr>';
        }
    ?>
        
      <tr>
        <td colspan="9"><div class="pagelist"> 
        <?php 
          if ($frontPage>0) {
           echo '<a href="listgoods.php?page=';
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
            echo '<a  href="listgoods.php?page=1';
            echo '&size=';
            echo $size;
            echo '"><span class="current">1</span></a>';
          
            echo '<a href="listgoods.php?page=2';
            echo '&size=';
            echo $size;
            echo '">2</a>';
         
            echo '<a href="listgoods.php?page=3';
            echo '&size=';
            echo $size;
            echo '">3</a>';


            echo '<a href="listgoods.php?page=4';
            echo '&size=';
            echo $size;
            echo '">4</a>';


            echo '<a href="listgoods.php?page=5';
            echo '&size=';
            echo $size;
            echo '">5</a>';
         }else if($page == 2){
            echo '<a  href="listgoods.php?page=1';
            echo '&size=';
            echo $size;
            echo '">1</a>';
          
            echo '<a href="listgoods.php?page=2';
            echo '&size=';
            echo $size;
            echo '"><span class="current">2</span></a>';
         
            echo '<a href="listgoods.php?page=3';
            echo '&size=';
            echo $size;
            echo '">3</a>';

            echo '<a href="listgoods.php?page=4';
            echo '&size=';
            echo $size;
            echo '">4</a>';


            echo '<a href="listgoods.php?page=5';
            echo '&size=';
            echo $size;
            echo '">5</a>';
         }else if($page == 3){
            echo '<a  href="listgoods.php?page=1';
            echo '&size=';
            echo $size;
            echo '">1</a>';
          
            echo '<a href="listgoods.php?page=2';
            echo '&size=';
            echo $size;
            echo '">2</a>';
         
            echo '<a href="listgoods.php?page=3';
            echo '&size=';
            echo $size;
            echo '"><span class="current">3</span></a>';


            echo '<a href="listgoods.php?page=4';
            echo '&size=';
            echo $size;
            echo '">4</a>';


            echo '<a href="listgoods.php?page=5';
            echo '&size=';
            echo $size;
            echo '">5</a>';
         } else if($page == 4){
            echo '<a  href="listgoods.php?page=1';
            echo '&size=';
            echo $size;
            echo '">1</a>';
          
            echo '<a href="listgoods.php?page=2';
            echo '&size=';
            echo $size;
            echo '">2</a>';
         
            echo '<a href="listgoods.php?page=3';
            echo '&size=';
            echo $size;
            echo '">3</a>';

             echo '<a href="listgoods.php?page=4';
            echo '&size=';
            echo $size;
            echo '"><span class="current">4</span></a>';

            echo '<a href="listgoods.php?page=5';
            echo '&size=';
            echo $size;
            echo '">5</a>';
         } else if($page == 5){
            echo '<a  href="listgoods.php?page=1';
            echo '&size=';
            echo $size;
            echo '">1</a>';
          
            echo '<a href="listgoods.php?page=2';
            echo '&size=';
            echo $size;
            echo '">2</a>';
         
            echo '<a href="listgoods.php?page=3';
            echo '&size=';
            echo $size;
            echo '">3</a>';

             echo '<a href="listgoods.php?page=4';
            echo '&size=';
            echo $size;
            echo '">4</a>';

             echo '<a href="listgoods.php?page=5';
            echo '&size=';
            echo $size;
            echo '"><span class="current">5</span></a>';
         }
          
         ?>

        <?php 
         if ($page < $allPage) {
          echo '<a href="listgoods.php?page=';
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
  <script src="js/ling_bio.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">

function checkpage(e) {
      $(e).addClass("current");
      alert("你好");
}
function checkhang1(id) {
  location = `altergoods.html?id=${id}`;
}
function delete_goods(id, e){
    // alert("删除");
    if (confirm("您确定要删除吗?")) {
     $(e).parent().parent().remove();
        $.ajax({
              url:"../api/goods.api.php?goods=ajaxDeleteGoods",
              type:'post',
              dataType:'json',
              data: {
                  id: id
              },
              success:function(res) {
                   alert("删除成功！");

              }
            })
    }
    else{
          
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
      location.href = 'listgoods.php?page=1&size=5';}

  }
}

function delete_all(id, e){
  $.ajax({
    url:"../api/goods.api.php?goods=ajaxDeleteGoods",
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


// function del(id){
// 	if(confirm("您确定要删除吗?")){
		
// 	}
// }

// $("#checkall").click(function(){ 
//   $("input[name='id[]']").each(function(){
// 	  if (this.checked) {
// 		  this.checked = false;
// 	  }
// 	  else {
// 		  this.checked = true;
// 	  }
//   });
// })
// function DelSelect(){
  // var Checkbox=false;
  //  $("input[name='list[]']").each(function(){
  //   if (this.checked==true) {   
  //   Checkbox=true;  
  //   }
  // });
  // if (Checkbox){
  //   var t=confirm("您确认要删除选中的内容吗？");
  //   if (t==true){
  //       $("input[name='list[]']").parent().remove();
  //     }
  //   else{
  //     alert("删除失败");
  //     return false;
  //   }
  //   } 
  //   else{
  //   alert("请选择您要删除的内容!");
  //   return false;
  // }
  
//            var list=$(':checkbox:checked');
//            var ids="";
//             list.each(function(){
//                 ids += $(this).val()+',';
//             });
//             if(ids.length==0){
//                 alert('请选择要删除的商品');
//             }else{
//                 //截取最后一个
//                 ids=ids.substr(0,ids.length-1);
//                 list.parent().parent().remove();
//             }
         
// };
</script>
</body></html>