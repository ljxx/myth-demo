<?php ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>用户登录页面</title>
    </head>
    <body>
        <div class="content">
            <form method="post">
                用户名：<input type="text" name="username"/><br/>
                密 码：<input type="password" name="password"/><br/>
                <input type="submit" value="登录">
                <input type="reset" value="重新填写"/>
            </form>
        </div>
        
        <?php if(!empty($error)): ?>
        <div class="error-box">
            登录失败，错误信息如下：
            <ul>
                <?php foreach ($error as $v) echo "<li>$v</li>"; ?>
            </ul>
        </div>
        <?php endif; ?>
    </body>
</html>
