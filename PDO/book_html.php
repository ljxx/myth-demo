<?php if(!defined('APP')) die('error!'); ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>测试链接数据库</title>
    </head>
    <body>
        <h2>书籍信息列表</h2>
        <table style="border: 1px solid blue;">
            <tr style="border: 1px solid blue;">
                <th>书籍名称</th>
                <th>作者</th>
                <th>出版日期</th>
            </tr>
            <?php foreach ($book_info as $row): ?>
            <tr>
                <td><?php echo $row['book_name']; ?><td>
                <td><?php echo $row['book_author']; ?></td>
                <td><?php echo $row['pub_time'];?></td>
            </tr>
            <?php endforeach;?>
        </table>
    </body>
</html>
