<?php  ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>保存浏览信息到cookie</title>
    </head>
    <body>
        <div class="content">
            <?php echo $data[0]; ?>
            <?php echo $data[1]; ?>
        </div>
        <div class="page">
            <a href="?id=<?php echo $id_prev; ?>">上一篇</a>
            <a href="?id=<?php echo $id_next; ?>">下一篇</a>
        </div>
        <div class="history">
            浏览历史：(<a href="?action=clear">清除历史</a>)
            <ul>
                <?php 
                    foreach ($data_history as $k => $v){
                        echo "<li><a href=\"?id=$k\">$v</a></li>";
                    }
                ?>
            </ul>
        </div>
    </body>
</html>

