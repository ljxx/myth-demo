<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//设定字符集
header('Content-Type:text/html;charset=utf-8');
require './public_function.php';
//获取注册用户的信息
echo '<h2>接受到新用户注册！</h2>';
echo '<p>用户名：'.$_POST['username'].'</p>';
echo '<p>密码：'.$_POST['password'].'</p>';
echo '<p>邮箱：'.$_POST['email'].'</p>';
echo '<p>IP地址：'.$_SERVER['REMOTE_ADDR'].'</p>';
echo '<p>浏览器环境：'.$_SERVER['HTTP_USER_AGENT'].'</p>';
echo '<p>请求来源：'.$_SERVER['HTTP_REFERER'].'</p>';

//接收表单数据
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
//连接数据库，设置字符集
dbInit();
//过滤用户输入数据，防止SQL注入
$username = mysql_real_escape_string($username);
$email = mysql_real_escape_string($email);
//判断用户是否已经存在
$sql = "select `id` from `user` where `username` = '$username'";
$rst = mysql_query($sql);
if(mysql_fetch_row($rst)){
    //用户名存在，不允许注册，程序停止执行
    die('用户名已存在，请换个用户名。');
}
//用户名不存在，可以注册
//使用MD5增强密码安全性
//$password = md5($password);

//生成密码盐
$salt = md5(uniqid(microtime()));
//提升密码安全
$password = md5($salt.md5($password));

//拼接插入数据的SQL语句
$sql = "insert into `user` (`username`,`password`, `salt`, `email`) values ('$username', '$password', '$salt', '$email')";
echo $sql;
//执行SQL语句，$rst保存执行结果
$rst = mysql_query($sql);

//判断是否通过post请求
//if(!empty($_POST))
//查看所有通过表单来提交的数据，可以使用$var_dump();
//获取字段的值，$_POST['username']
//需要判断接收的数据是否存在username时，使用if(!isset($_POST['username']))
//当判断标定中username字段是否填写时，可使用if(empty($_POST['username']))

