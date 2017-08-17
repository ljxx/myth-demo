<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//设置字符集
header('Content-type:text/html;charset=utf-8');
try {
    //连接数据库
    $pdo = new PDO('mysql:host=localhost; dbname=itcast; charset=utf8', 'root', '123456');
    //设置错误处理
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //预处理sql语句
    $stmt = $pdo->prepare('select * from `article`');
    //执行预处理语句
    $stmt->execute();
    echo '来船只学习。。。';
    //获取错误码
    $code = $stmt->errorCode();
    //判断执行错误，输出相关信息
    if(!empty($code)){
        echo "<br>$code</br>";
        print_r($stmt->errorInfo());
    }
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}


