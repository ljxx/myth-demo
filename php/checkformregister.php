<?php
header('Content-Type:text/html;charset=utf-8');
//引入表单验证函数
require './check_form.php';
//假设php程序收到了用户注册表单，用$data数组模拟用户输入的数据
$data = array(
    'username' => '小明',
    'password' => '12345',
    'email' => 'xiaoming@123.com',
);

//为每个字段定义不同的验证函数
$validate = array(
    //表单字段名 => 验证函数名
    'username' => 'checkUsername',
    'password' => 'checkPassword',
    'email' => 'checkEmail',
);

//$error数组保存验证后的错误信息
$error = array();
//循环验证每个字段，保存错误信息
foreach ($validate as $k=>$v){
    //运用可变函数，实现不同字段调用不同函数
    $result = $v($data[$k]);
    if($result !== true){ //$result 不为true说明表单验证失败
        $error[] = $result; //保存错误信息
    }
}
//如果$error数组为空，说明没有错误
if(empty($error)){
    //表单验证成功
     echo "表单验证成功";
} else {
    //表单验证是比，显示错误信息
    echo "表单验证失败";
    require '../html/register_error_html.php';
}

