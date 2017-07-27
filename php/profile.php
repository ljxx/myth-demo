<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header('Content-Type:text/html;charset=utf-8');
require './public_function.php';
//连接数据库，设置字符集，选择数据库
dbInit();
//定义数组$city保存预设的城市下拉列表
$city = array('北京','上海','广州','其他');
//定义数组$skill[]保存预设的语言技能复选框
$skill = array('HTML','JavaScript','PHP','C++');
//假设当前登录用户的ID为1
$id = 1;
//根据指定ID查询用户信息
$sql = "select `nickname`, `gender`, `email`, `qq`, `url`, `city`, `skill`, `description` from `userinfo` where `id` = $id";
$rst = mysql_query($sql);
//$data保存查询到的用户信息
$data = mysql_fetch_assoc($rst);
//将kill字段通过","分隔符转为数组
$data['skill'] = explode(',', $data['skill']);
//加载html模版文件
require '../html/profile_html.php';

if(!empty($_POST)){
    //当有表单提交时，收集表单数据，保存到数据库中
    $fields = array('nickname','gender','email','qq','url','city','skill','description'); //指定需要接收的表单字段
    foreach ($fields as $v){
        //$save_data保存$_POST中的指定字段数据，不存在的字段填充空字符串
        $save_data[$v] = isset($_POST[$v]) ? $_POST[$v] : '';
    }
    
    //单选框处理
    if($save_data['gender'] != '男' && $save_data['gender'] != '女'){
//        echo $sava_data['gender']."===="+($sava_data['gender'] != '男')."<br/>";
//        echo $sava_data['gender']."====".($sava_data['gender'] != '女');
        die('保存失败，未选择性别。');
    }
    //下拉菜单处理
    if($save_data['city'] != '未选择' && !in_array($save_data['city'], $city)){
        die('保存失败，您填写的城市不在允许的城市列表中。');
    }
//    echo var_dump($save_data['skill'])."====";
    //复选框处理
    if(is_array($save_data['skill'])){
        //只取出合法的数组元素
        $sava_data['skill'] = array_intersect($skill, $sava_data['skill']);
        //将数组转换为用逗号分隔的字符串
        $sava_data['skill'] = implode(',', $sava_data['skill']);
    } else {
        $sava_data['skill'] = '';
    }
    
    
    //描述
//    $text = $_POST['text']; //将收来自文本域提交的数据
//    $text = nl2br($text);
//    echo "<div>$text</div>";
    
    //通过循环数组，自动拼接SQL语句，保存到数据库中
    $sql = "update `userinfo` set ";
    foreach ($sava_data as $k => $v){
        $sql .= "`$k`='".mysql_real_escape_string($v)."',";
    }
    $sql = rtrim($sql,',')." where id=$id"; //rtrim($sql,',')用于去除$sql中的最后一个逗号
    $rst = mysql_query($sql);
    //输出执行结果和调试信息
    echo $rst ? "保存成功：$sql" : "保存失败：$sql<br>".mysql_error();
    
}


    //生成一组单选按钮
    $fruit12 = array("苹果", "香蕉", "橘子", "番茄");
    echo make_radio('fruit', $fruit12, '香蕉');

