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
                验证码：<input type="text" name="captcha"/><img id="code_img" src="../php/code.php"/>
                <a href="#" id="m_change">看不清，换一张</a><br/>
                <input type="checkbox" name="auto_login" value="on">下次自动登录<br/>
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
        
        
        
         <script>
            var mChange = document.getElementById("m_change");
            var img = document.getElementById("code_img");
           
            mChange.onclick = function(){
                //增加一个随机参数，防止图片缓存
                img.src = "../php/code.php?t=" + new Date();
                return false; //阻止超链接的跳转动作
            }
        </script>
    </body>
</html>
