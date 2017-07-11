<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//声明文件解析的编码格式
header('content-type:text/html;charset=utf-8');
//引入功能函数文件
require './public_function.php';
//获取数据库连接
dbInit();
//获取要编辑员工的ID,  intval()将员工ID强制转换为整数
$e_id = isset($_GET['e_id']) ? intval($_GET['e_id']) : 0;
//判断是否有POST数据提交
if(!empty($_POST)){
    //定义变量$update,用来保存处理后的员工数据
    $update = array();
    //定义合法字段数组
    $fields = array('e_name','e_dept','date_of_birth','date_of_entry');
    //遍历$_Post，获取更新员工数据的键和值
    foreach ($fields as $v){
        $data = isset($_POST[$v]) ? $_POST[$v] : '';
        echo '====:'.$v.':=========='.$data;
        if($data == '') die ($v.'字段不能为空');
        //值就是该字段保存的数据，对其进行安全处理
        $data = safeHandle($data);
        //把键和值按照SQL更新语句中的语法要求连接，并存入到$update数组中
        $update[] = "`$v`='$data'";
    }
    //把$update数组元素使用逗号连接，赋值给$update_str
    $update_str = implode(',', $update);
    //组合SQL语句
    $sql = "update `emp_info` set $update_str where `e_id`=$e_id ";
    if($res = query($sql)){
        header("Location:./connectmysql.php");
        //停止脚本
        die;
    } else {
        die('员工信息修改失败');
    }
} else {
    //当没有表单提交时，查询当前要编辑的员工信息，展示到页面中
    //编写SQL语句，查询响应ID的员工数据
    $sql = "select * from `emp_info` where `e_id`=$e_id ";
    //调用fetchRow()函数，执行SQL语句，并处理结果
    $emp_info = fetchRow($sql);
    //显示员工修改页面
    define('App', 'phpbook');
    require '../html/update_html.php';
}
