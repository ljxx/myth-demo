<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <tr>
                <th colspan="2">服务器信息展示</th>
            </tr>
            <tr>
                <td>当前PHP版本号：</td>
                <td><?php echo PHP_VERSION; ?></td>
            </tr>
            <tr>
                <td>操作系统的类型：</td>
                <td><?php echo PHP_OS; ?></td>
            </tr>
            <tr>
                <td>当前服务器时间：</td>
                <td><?php echo date('Y-m-d H:i:s') ?></td>
            </tr>
        </table>
        <br/>
        
        <?php echo 'Hello'."World"; ?><br/>
        <?php echo time(); ?>
        <!--格式化时间-->
        <?php echo date('Y-m-d H:i:s', time()); ?>
    </body>
</html>
