<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header('Content-type:text/html;charset=utf-8');
//数据库服务器类型是MySql
$dbms = 'mysql';
//数据库服务器主机名、端口号、选择的数据库
$host = 'localhost';
$port = '3306';
$dbname = 'itcast';
//设定字符集
$charset = 'utf8';
//用户名和密码
$user = 'root';
$pwd = '123456';
$dsn = "$dbms:host=$host;port=$port;dbname=$dbname;charset=$charset";

//pdo连接数据库
try {
    //连接数据库、选择数据库、设定字符集
    $pdo = new PDO($dsn, $user, $pwd);
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}

//执行SQL语句
$sql = 'select * from `books`';
$result = $pdo->query($sql);

//处理结果集
$book_info = array();
//遍历结果集，获取书籍的详细信息
while ($row = $result->fetch()){
    $book_info[] = $row;
}

//加载html模版文件
define('APP', 'itcast');
require './book_html.php';




