<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header('Content-type:text/html;charset=utf-8');
try {
    //连接数据库
    $pdo = new PDO('mysql:host=localhost;dbname=itcast;charset=utf8', 'root','123456');
    //预处理的sql语句
    $stmt = $pdo->prepare('insert into `books` (`book_name`, `book_author`) values(?,?)');
    
    //为占位符绑定变量
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $author);
    
    //准备数据
    $data = array(
        array('PHP第一本教材', '船只博客高端研发部1001室'),
        array('PHP第二本教材', '船只博客高端研发部1002室'),
        array('PHP第三本教材', '船只博客高端研发部1003室'),
        array('PHP第四本教材', '船只博客高端研发部1004室'),
        array('PHP第五本教材', '船只博客高端研发部1005室'),
        array('PHP第六本教材', '船只博客高端研发部1006室'),
        array('PHP第七本教材', '船只博客高端研发部1007室'),
        array('PHP第八本教材', '船只博客高端研发部1008室'),
        array('PHP第九本教材', '船只博客高端研发部1009室'),
    );
    foreach ($data as $row) {
        //为绑定的变量赋值
        $name = $row[0];
        $author = $row[1];
        //执行与处理语句
        $stmt->execute();
    }
    
} catch (Exception $exc) {
    //输出异常信息
    echo $exc->getTraceAsString();
}


