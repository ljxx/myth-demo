<?php  ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>登录成功页-会员中心</title>
    </head>
    <body>
        <?php if($isLogin): ?>
        <div>
            <?php echo $userinfo['username']; ?>您好，欢迎回到会员中心。
            <a href="?action=logout">退出</a>
        </div>
        <!--此处编写会员中心其他内容-->
        <?php else: ?>
        <div>
            您还未登录，请先<a href="login.php">登录</a>或
            <a href="../html/register.html">注册新用户</a>
        </div>
        <?php endif; ?>
    </body>
</html>

