<?php if(!defined('App')) die ('error!') ?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>修改员工信息</title>
    </head>
    <body>
        <h1 style="text-align: center;">修改员工信息</h1>
        <form method="post">
            <table style="margin: auto;">
                <tr>
                    <th>姓名：</th>
                    <td>
                        <input type="text" name="e_name" value="<?php echo $emp_info['e_name']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <th>所属部门：</th>
                    <td>
                        <input type="text" name="e_dept" value="<?php echo $emp_info['e_dept']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <th>出生年月：</th>
                    <td>
                        <input id="date_of_birth" type="text" name="date_of_birth" value="<?php echo $emp_info['date_of_birth']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <th>入职时间：</th>
                    <td>
                        <input id="data_of_entry" type="text" name="date_of_entry" value="<?php echo $emp_info['date_of_entry']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="td-btn">
                        <input type="submit" value="保存资料" class="button" />
                        <input type="reset" value="重新填写" class="button" />
                    </td>
                </tr>
            </table>
            
        </form>
        
    </body>
    
</html>

