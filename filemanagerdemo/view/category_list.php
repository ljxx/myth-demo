<?php if(!defined('APP')) die('error!') ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>文章分类</title>
    </head>
    <body>
        <form action="?a=category_add" method="post">
            分类名称：<input type="text" name="catetory_name" />
            <input type="submit" value="添加" />
        </form>
    </body>
</html>
