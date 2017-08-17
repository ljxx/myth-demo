<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//声明文件解析道编码格式
header('content-type:text/html;charset=utf-8');
//引入功能函数文件
require './public_function.php';
//引入tool静态功能类文件
require '../classfile/utils/tool.class.php';

//初始化数据库
dbInit();

//判断是否有表单提交
if(!empty($_POST)){
    //声明变量$fields，用来保存字段信息
    $fields = array('e_name', 'e_dept', 'date_of_birth', 'date_of_entry');
    //声明变量$value,用来保存值信息
    $values = array();
    //遍历$fields,获取输入员工数据的键和值
    foreach ($fields as $k => $v){
        $data = isset($_POST[$v]) ? $_POST[$v] : '';
        if($data == '') die ($v.'字段不能为空');
        //对数据进行安全处理
        $data = safeHandle($data);
        //把字段使用反引号包裹，赋值给$fields数组
        $fields[$k] = "`$v`";
        //把值使用单引号包裹，赋值给$values数组
        $values[] = "'$data'";
    }
    //将fields数组以逗号连接，赋值给$fields,注册insert语句中的字段部分
    $fields = implode(',', $fields);
    //将values数组以逗号连接，赋值给$values,组成insert语句中的值部分
    $values = implode(',', $values);
    //最后把$fields和$values拼接到insert语句中，注意要指定表名
    $sql = "insert into `emp_info` ($fields) values ($values)";
    //执行SQL
    if($res = query($sql,$link)){
        //成功时返回到connectmysql.php
//        header('Location: ./connectmysql.php');
        
        //成功时跳转到showList.php
        tool::alertGo('员工添加成功！', './connectmysql.php');
        
        //停止脚本
        die;
    } else {
        //执行失败
        tool::alertBack('员工添加失败！');
        
//        die('员工添加失败！');
    }
}
//没有表单提交时，显示员工添加页面
define('App', 'phpbook');
require '../html/add_html.php';
