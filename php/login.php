<?php

//设定字符集
header('Content-Type:text/html;charset=utf-8');
require './public_function.php';

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
        //连接数据库，设置字符集，选择数据库
        dbInit();
 
        //处理用户名和密码
        $username = mysql_real_escape_string($username); //SQL转义
        //根据用户名去除用户信息
        $sql = "select `id`, `password` from `user` where `username`='$username'";
        //根据用户名获取该用户信息
        if($rst = mysql_query($sql)){ //执行SQL，获得结果集
            $row = mysql_fetch_assoc($rst); //处理结果集
            $password = md5($password); //处理密码的MD5
            if($password == $row['password']){ //判断密码是否正确
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
//加载HMTL模版文件
require '../html/login_html.php';

