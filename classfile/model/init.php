<?php

/* 
 * 该文件涌来提供数据库连接的相关信息以及实现类的自动加载
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//声明文件解析的编码格式
header('content-type:text/html;charset=utf-8');
//数据库配置
$dbConfig = array(
    'user' => 'root',
    'pwd' => '123456',
    'dbname' => 'itcast'
);

//使用__autoload()启动自动加载
function __autoload($className) {
    require "./library/{$className}.class.php";
}

//定义model函数涌来实例化模版类
function model($tableName) {
    $model = $tableName . 'Model';
    return new $Model($tableName);
}


