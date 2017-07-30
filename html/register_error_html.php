<?php ?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>注册验证信息失败页</title>
    </head>
    <body>
        <div class="error-box">
            注册失败，错误信息如下：
            <ul>
                <?php foreach ($error as $v) echo "<li>$v</li>"; ?>
            </ul>
        </div>
    </body>
</html>

