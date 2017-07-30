<?php
session_start(); //启动session
//判断session中是否存在用户信息
if(isset($_SESSION['userinfo'])){
    //用户信息存在，说明用户已经登录
    $isLogin = true; //保存用户登录状态
    $userinfo = $_SESSION['userinfo']; //保存用户信息
} else {
    //用户信息不存在，说明用户没有登录
    $isLogin = false;
}

/**
 * 退出登录
 */
if(isset($_GET['action']) && $_GET['action'] == 'logout'){
    //清除cookie数据
    setcookie('username','', time()-1);
    setcookie('password','', time()-1);
    
    //清除session数据
    unset($_SESSION['userinfo']); //清除SESSION数据
    //如果SESSION中没有其他数据，则销毁SESSION
    if(empty($_SESSION)){
        session_destroy();
    }
    header('Location: login.php'); //跳转到登录页面
    die; //终止脚本
}

//加载HTML模版文件
require '../html/user_html.php';

