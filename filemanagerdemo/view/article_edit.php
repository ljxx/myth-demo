<?php if(!defined('App')) die('Error!') ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>文章编辑页</title>
        <link href="../lib/umeditor/themes/default/css/umeditor.min.css" rel="stylesheet"/>
        <script src="../lib/umeditor/third-party/jquery.min.js"></script>
        <script src="../lib/umeditor/third-party/template.min.js"></script>
        <script src="../lib/umeditor/umeditor.config.js"></script>
        <script src="../lib/umeditor/umeditor.min.js"></script>
        <script src="../lib/umeditor/lang/zh-cn/zh-cn.js"></script>
        <script>
            $(function(){
               UM.getEditor('myEditor'); 
            });
        </script>
    </head>
    <body>
        <form method="post">
            文章分类：<select name="category">
                <?php foreach ($category as $v): 
                    if($v['id'] == $rst['cid']): ?>
                        <option value="<?php echo $v['id']; ?>" selected=""><?php echo $v['name']; ?></option>
                <?php else: ?>
                        <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                <?php endif; endforeach; ?>
            </select>
            <a href="../lib/category.php">分类管理</a>
            标题：<input type="text" name="title" value="<?php echo $rst['title']; ?>"/>
            作者：<input type="text" name="author" value="<?php echo $rst['author']; ?>"/>
            <!--UEditor在线编辑器载入代码（将文章原有内容显示在编辑器中）-->
            <!--style给定宽度可以影响编辑器的最终宽度-->
        <script name="content" type="text/plain" id="myEditor" style="width:1000px;height:240px;">
            <p><?php echo $rst['content']; ?></p>
        </script>
        <input type="submit" value="提交"/>
        <input type="button" value="取消" onclick="{if(confirm('确定要取消添加文章吗？')) { window.location.href='index.php'; } return false;}"/>
        </form>
    </body>
</html>