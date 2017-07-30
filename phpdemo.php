<?php

/**
 * trim()函数，去除字符串左右两端的空白字符，包括空格，换行和制表符
 */
echo trim('  测试  ')."<br/>"; //输出结果：测试
echo trim('   测  试   ')."<br/>";
echo trim('\n\t 测  试 ')."<br/>";

/**
 * intval()函数 将字符串转换为整数型
 */
echo intval('123abc')."<br/>";
echo intval(' 123 abc')."<br/>";
echo intval('abc123')."<br/>";

/**
 * trip_tags()函数, 去除字符串中的"< >"标签
 */
echo strip_tags('<b>测试</b>')."<br/>";
echo strip_tags('<传智>博客')."<br/>";

/**
 * htmlspecialchars()函数,将之付出中的HTML特殊字符转位HTML实体字符
 */
echo htmlspecialchars('<测试>')."<br/>";
echo htmlspecialchars('<b>测试</b>')."<br/>";


/**
 * 保存数据到cookie
 */
setcookie('city', '北京市');
setcookie('city', '北京市', time()+1800);
setcookie('city', '北京市', time() + 60*60*24);
setcookie('city', '', time() - 1);

/**
 * session简单使用
 */
session_start(); //开启session
$_SESSION['username'] = '小明'; //向session添加数据（字符串）
$_SESSION['info'] = array(1,2,3); //向session添加数据（数组）
if(isset($_SESSION['test'])){ //判断session中是否存在test
    $test = $_SESSION['test'];
}
unset($_SESSION['username']); //删除单个数据
$_SESSION = array(); //删除所有数据
session_destroy(); //结束当前会话

/**
 * 自定义header()响应消息头
 */
//设定编码格式
header('Content-Type:text/html;charset=utf-8');
//页面跳转
header('Location: login.php');

