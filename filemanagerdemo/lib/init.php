<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header('Content-type:text/html;charset=utf-8');
//载入数据库操作文件
require './MySQLPDO.php';
//配置数据库连接信息（需要根据自身情况修改配置）
$dbConfig = array(
    'user' => 'root',
    'pass' => '123456',
    'dbname' => 'itcast'
);

//实例化MySQLPDO类
$db = MySQLPDO::getInstance($dbConfig);

//保存错误信息
$error = array();

