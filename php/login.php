<?php

//设定字符集
header('Content-Type:text/html;charset=utf-8');
require './public_function.php';
//连接数据库，设置字符集，选择数据库
dbInit();

$error = array(); //保存错误信息
//当前表单提交时
if(!empty($_POST)){
    //接收用户登录信息
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    //再入表单验证函数库，验证用户名和密码格式
    require './check_form.php';
   
    if(($result = checkUserName002($username)) !== true){
        
        $error[] = $result;
    }
    
    if(($result = checkPassword($password)) !== true){
        $error[] = $result;
    }
    
       //表单验证通过，再到数据库中验证
    if(empty($error)){
        //处理用户名和密码
        $username = mysql_real_escape_string($username); //SQL转义
        //根据用户名去除用户信息
        $sql = "select `id`, `password`, `salt` from `user` where `username`='$username'";
        //根据用户名获取该用户信息
        if($rst = mysql_query($sql)){ //执行SQL，获得结果集
            $row = mysql_fetch_assoc($rst); //处理结果集
            //数据库密码加密
//            $password = md5($password); //处理密码的MD5
            $password = md5($row['salt'].md5($password));
            //判断密码是否正确
            if($password == $row['password']){ 
                //判断用户是否勾选了记住密码
                if(isset($_POST['auto_login']) && $_POST['auto_login'] == 'on'){
                    //将用户名和密码保存到cookie，并对密码加密
                    $ua = isset($_SERVER['HTML_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
                    $password_cookie = md5($row['password'].md5($ua. $row['salt']));
                    $cookie_expire = time() + 2592000; //保存1个月（60*60*24*30）
                    setcookie('username', $username, $cookie_expire); //保存用户名
                    //最后一个参数表示只能http协议访问，禁止javascript访问
                    setcookie('password', $password_cookie, $cookie_expire, null, null, null, true); //保存密码,
                }
                //登录成功，保存用户会话
                session_start(); //启动Session
                $_SESSION['userinfo'] = array(
                    'id' => $row['id'], //将用户ID保存到session
                    'username' => $username //将用户名保存到session
                );
                //跳转到会员中心
                header('Location: user.php');
                //终止脚本继续执行
//                die('欢迎登录！');
                die;
            }
        }
        $error[] = '用户名不存在或密码错误。';
    }
}

//当cookie中存在登录状态时
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
    //取出用户名和密码
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];
    //对不安全的输入进行SQL转义
    $username = mysql_real_escape_string($username);
    //根据用户名取出用户信息
    $sql = "select `id`, `password`, `salt` from `user` where `username`='$username'";
    
    if($rst = mysql_query($sql)){ //执行SQL，获得结果集
        $row = mysql_fetch_assoc($rst); //处理结果集
        //处理cookie密码
        $ua = isset($_SERVER['HTML_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
        $password_cookie = md5($row['password'].md5($ua. $row['salt']));
        echo "===cookie=".$password."===计算出来的==".$password_cookie."========="."<br/>";
        //验证cookie密码
        if($password == $password_cookie){
            echo "======成功了======="."<br/>";
            //登录成功，保存用户会话
                session_start(); //启动Session
                $_SESSION['userinfo'] = array(
                    'id' => $row['id'], //将用户ID保存到session
                    'username' => $username //将用户名保存到session
                );
                //跳转到会员中心
                header('Location: user.php');
                //终止脚本继续执行
//                die('欢迎登录！');
                die;
        }
    }
}

//加载HMTL模版文件
require '../html/login_html.php';

