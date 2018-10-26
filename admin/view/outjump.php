<?php
    session_start();
    header('Content-type:text/html;charset=utf-8');
    if(isset($_SESSION['admin_name'])){
            session_unset();//free all session variable
            session_destroy();//销毁一个会话中的全部数据
            setcookie(session_name(),'',time()-1000);//销毁与客户端的卡号
            header('location:text.php?url=index.php&info=退出登录成功，正在跳转，请稍等！');
        }else{
            header('location:text.php?url=tes.php&info=退出登录失败，请稍后重试！');
        }
?>