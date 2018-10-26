<?php
    session_start();
    header('Content-type:text/html;charset=utf-8');   
    if(isset($_SESSION['logname']) && $_SESSION['logname']==='13537151142'){
        header('location:text.php?url=tes.php&info=您已经登入了，请不要重新登入!1秒后跳转到首面');
    }

    if(isset($_POST['submit'])){
        if(isset($_POST['logname']) && isset($_POST['logpwd']) && $_POST['logname']=='13537151142' && $_POST['logpwd']=='123456' ){
                $_SESSION['logname']=$_POST['logname'];
                header('location:text.php?url=tes.php&info=登入成功！1秒后跳转到首面');
            
        }  else {
            header('location:text.php?url=tes.php&info=对不起，用户名活密码填写错误！1秒后跳转到登入页面');
        }
    }
?>
<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <title>请登入</title>
    </head>
    <body>
        <form method="post" action="">
            姓名：<input type="text" name="logname" />
            密码：<input type="logpwd" name="logpwd"/>
            <input type="submit" name="submit" value="登入"/>
        </form>
    </body>
</html>