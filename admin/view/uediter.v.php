<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>完整demo</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <script type="text/javascript" charset="utf-8" src="../../public/ueditor/jquery-3.2.1.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="../../public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../../public/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="../../public/ueditor/lang/zh-cn/zh-cn.js"></script>

    <style type="text/css">
        div{
            width:100%;
        }
    </style>
</head>
<body>
<div>
    <form action="#" method="post">
    <p> 
        <span>文章标题：</span>
        <input type="text"  id="title"  name="title">
    </p>
    <p> 
        <span>文章作者：</span>
        <input type="text"  id="auther"  name="auther"  value="admin">
    </p>
    <p> 
        <span>文章分类：</span>
            <select name="category" id="category">
                <option value="0">热门活动</option>
                <option value="1">最新动态</option>
                <option value="2">行业新闻</option>
                <option value="3">红酒知识</option>
            </select>
    </p>
     <p> 
        <span>文章内容：</span>
         <textarea id="editor" type="text/plain" style="width:900px;height:600px;">
                    gdgdgdg
                    gdgd
         </textarea>
    </p>
        <input  type="submit" value="form提交文章"></button>
    </form>
    <?php 
        print_r($_POST);
        echo  htmlspecialchars($_POST['editorValue'], ENT_QUOTES);
    ?>

  <!--   <script id="editor" type="text/plain" style="width:600px;height:300px;"></script> -->
</div>
<button onclick="getCnt()">发表文章</button>

<script type="text/javascript">
    //实例化编辑器
    var ue = UE.getEditor('editor');
</script>

<script>
function getCnt(){
    var str=UE.getEditor('editor').getContent();//
   alert(str)

}
</script>

 <form method="post" action="">
        <input name="aaa" type="text" id="img1" size="45" /><input type="button" value=" 上传图片 " onClick="upImage1();" />
        <textarea name="ccc" id="content1a" style="width:100%; height:150px;"></textarea>
    </form>
图片上传开始
<script type="text/plain" id="input_editor1" style="display:none;"></script>
<script type="text/javascript">
//弹出图片上传的对话框
   // var url='{:url('index/upfile')}';
    //alert(url);//用于自定义接收图片的url
    //实例化编辑器
    var upload_editor1 = UE.getEditor('input_editor1',{
        //serverUrl :url
    });
    function upImage1(){
        upload_editor1.ready(function(){
            upload_editor1.hide();//隐藏编辑器
            //监听图片上传
            upload_editor1.addListener('beforeInsertImage', function (t,arg){
               //var src= document.getElementById("img1").value;
               console.log(arg)
               var src='';
                for(var i in arg){
                         src+=arg[i].src+';';
                }
                document.getElementById("img1").value=src;
            });
        });
        //弹出图片上传的对话框
        var myImage1 = upload_editor1.getDialog("insertimage");
        myImage1.open();
    }
</script>
<!--图片上传结束-->
</body>
</html>