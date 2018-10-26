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
            <img style="width:100%;height:150px;" src="./images/KV2018092601-2.jpg">
        </div>
        <div style="font-size: 15px;height:20px;line-height:15px;background: #2B626F; color: #fff;"><center><?php echo $_GET['info'] ?></center></div>
    </body>
</html>