<?php ?>
<!doctype html>
<html>
    <meta charset="utf-8"/>
    <title>文章系统头部信息</title>
    <body>
        <!--错误信息-->
        <?php if(!empty($error)): ?>
            <div>
                <ul>
                    <?php foreach ($error as $v): ?>
                        <li>
                            <?php echo $v; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </body>
</html>
