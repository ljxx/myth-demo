<?php if(!defined('APP')) die('error!') ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>文章分类</title>
    </head>
    <body style="text-align: center;">
        
        <!--错误信息-->
        <?php if(!empty($error)): ?>
        <div>
            <ul>
                <?php foreach ($error as $v): ?>
                <li><?php echo $v; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
        
        <!--添加文字分类表单-->
        <form action="?a=category_add" method="post">
            分类名称：<input type="text" name="catetory_name" />
            <input type="submit" value="添加" />
        </form>
        
        <!--展示文字分类信息-->
        <form method="post" style="border:1px solid blue;" action="?a=category_sort">
            <table style="width: 50%;">
                <tr>
                    <td>排序</td>
                    <td>分类名称</td>
                    <td>操作</td>
                </tr>
                <?php foreach ($category as $v): ?>
                <tr>
                    <td>
                        <input type="text" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['sort']; ?>">
                    </td>
                    <td>
                        <?php echo $v['name']; ?>
                    </td>
                    <td>
                        <a href="?id=<?php echo $v['id']; ?>&a=category_del" onclick="return confirm('确定要删除该文章分类吗？')">删除</a> | 编辑
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <div>
                <input type="submit" value="保存排序"/>
            </div>
        </form>
    </body>
</html>
