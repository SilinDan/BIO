<?php
    session_start();
    header('Content-type:text/html;charset=utf-8');    
    if(isset($_SESSION['admin_name'])){
    	 header('location:backstage.php');
        // echo "您好！{$_SESSION['logname']},欢迎回来！";
        // echo "<a href='ttt.php'>注销</a>";
    }  else {
        header('location:backstage.php');
    }
?>