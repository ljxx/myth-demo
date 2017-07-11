<?php if(!defined('App')) die('error!'); ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>添加员工</title>
    </head>
    <body style="text-align: center;">
        <h1>添加员工</h1>
        <form action="../php/empAdd.php" method="post">
            <table style="margin: auto;">
                <tr>
                    <th>姓名：</th>
                    <td>
                        <input type="text" name="e_name" />
                    </td>
                </tr>
                <tr>
                    <th>所属部门：</th>
                    <td>
                        <input type="text" name="e_dept"/>
                    </td>
                </tr>
                <tr>
                    <th>出生年月：</th>
                    <td>
                        <input type="text" name="date_of_birth"/>
                    </td>
                </tr>
                <tr>
                    <th>入职日期：</th>
                    <td>
                        <input type="text" name="date_of_entry"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="保存资料"/>
                        <input type="reset" value="重新填写"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>