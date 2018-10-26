<?php
    session_start();
    header('Content-type:text/html;charset=utf-8');include("../model/Db.class.php");include("../controller/shop.class.php");$shop = new Shop();
    if(isset($_SESSION['logname'])){
            session_unset();//free all session variable
            session_destroy();//销毁一个会话中的全部数据
            setcookie(session_name(),'',time()-3600);//销毁与客户端的卡号
            header('location:text.php?url=index.v.php&info=注销成功，正在跳转！');
        }else{
            header('location:text.php?url=tes.php&info=注销失败，请稍后重试！');
        }
?>