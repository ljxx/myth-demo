<?php if(!defined('App')) die ('发生错误了'); ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>员工信息列表</title>
    </head>
    <body>
        <div style="text-align: center">员工信息列表</div>
        <form action="../phpbasedemo/connectmysql.php" method="GET" style="text-align: center;margin: 10px;">
            <div>
                快速查询：
                <input type="text" name="keyword"/>
                <input type="submit" value="查询"/>
            </div>
        </form>
        <table style="margin: auto;text-align: center">
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>
                    <a href="../php/connectmysql.php?order=e_dept&sort=<?php echo ($order=='e_dept') ? $sort : 'desc'; ?>">所属部门</a>
                </th>
                <th>出生日期</th>
                <th>
                    <a href="../php/connectmysql.php?order=date_of_entry&sort=<?php echo ($order=='date_of_entry') ? $sort : 'desc'; ?>">入职时间</a>
                </th>
               
                <th>相关操作</th>
            </tr>
            <?php if(!empty($emp_info)) { ?>
            <?php foreach ($emp_info as $row) { ?>
            <tr>
                <td><?php echo $row['e_id']; ?></td>
                <td><?php echo $row['e_name']; ?></td>
                <td><?php echo $row['e_dept']; ?></td>
                <td><?php echo $row['date_of_birth']; ?></td>
                <td><?php echo $row['date_of_entry']; ?></td>
                <td>
                    <div>
                        <a href="<?php echo '../php/empUpdate.php?e_id='.$row['e_id']; ?>">编辑</a>&nbsp;&nbsp;<span>删除</span>
                    </div>
                </td>
            </tr>
            <?php } ?>
            <?php } else { ?>
            <tr>
                <td colspan="6">暂无员工信息！</td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="6" style="text-align: right;padding-right: 20px;">
                    <a href="../php/empAdd.php">添加员工</a>
                </td>
            </tr>
        </table>
        <div style="text-align: center;padding: 10px;">
            <?php if($page > 1): ?>
                <a href="../php/connectmysql.php?page=1">首页</a>
                <a href="../php/connectmysql.php?page=<?php echo ($page - 1) > 0 ? ($page - 1) : 1; ?>">上一页</a>
            <?php endif; ?>
                
                <?php if($page <= 1): ?>
                <?php endif; ?>
           
            <?php if($page < $max_page): ?>
                <a href="../php/connectmysql.php?page=<?php echo ($page + 1) < $max_page ? ($page + 1) : $max_page; ?>">下一页</a>
                <a href="../php/connectmysql.php?page=<?php echo $max_page; ?>">尾页</a>
            <?php endif; ?>
                <span>当前是第<?php echo $page; ?>页，共 <?php echo $max_page; ?> 页</span>
        </div>
        <br/>
        <?php
        $isFree = mysql_free_result($result); //清除结果集
        $isClose = mysql_close($link); //关闭mysql连接
//        echo "isFree=" + $isFree + "isClose=" + $isClose; 
        ?>
        <?php phpinfo(); ?>
    </body>
</html>
