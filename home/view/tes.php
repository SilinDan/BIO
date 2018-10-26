<?php
    session_start();
    header('Content-type:text/html;charset=utf-8');include("../model/Db.class.php");include("../controller/shop.class.php");$shop = new Shop();    
    if(isset($_SESSION['logname'])){
    	 header('location:index.v.php');
        // echo "您好！{$_SESSION['logname']},欢迎回来！";
        // echo "<a href='ttt.php'>注销</a>";
    }  else {
        header('location:index.v.php');
    }
?>