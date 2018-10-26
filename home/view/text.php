<?php
    if(!isset($_GET['url']) || !isset($_GET['info'])){
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="1,URL=<?php echo $_GET['url'] ?>"/>
        <title>正在跳转中...</title>
    </head>
    <body>
        <div>
            <img src="./images/KV2018092601-2.jpg">
        </div>
        <div style="font-size: 20px;height:50px;line-height:50px;background: #2B626F; color: #fff;"><center><?php echo $_GET['info'] ?></center></div>
    </body>
</html>