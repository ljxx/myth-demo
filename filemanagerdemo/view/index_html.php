<?php if(!defined('App')) die('Error!') ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>文章列表页</title>
    </head>
    <body>
        <ul>
            <?php foreach ($articles as $row): ?>
            <li>
                <span><a href="article_show.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></span>
                <span>
                    <a href="article_edit.php?id=<?php echo $row['id']; ?>">编辑</a>&nbsp;
                    <a href="article_del.php?id=<?php echo $row['id']; ?>" onclick="return confirm('确定要删除该文章吗？')">删除</a>
                </span>
                <p><?php echo $row['content']; ?></p>
                <p><a href="article_show.php?id=<?php echo $row['id']; ?>">单击查看全文&gt;&gt;</a></p>
                <p>
                    发表时间：<span><?php echo $row['addtime']; ?></span>
                    作者：<span><?php echo $row['author']; ?></span>
                </p>
            </li>
            <?php endforeach; ?>
            
        </ul>
        <div><?php echo $page_html; ?></div>
    </body>
</html>