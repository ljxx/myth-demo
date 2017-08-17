<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

header('content_type:text/html;charset:utf-8');
//载入init.php文件
require './init.php';
//调用model()函数，传入要操作的数据表名以获取对应模型类对象
$student = model('student');

/**
 * 第一个实例
 */
//通过$student对象调用field()方法指定查询的字段，调用select()方法执行查询
$data = $student->field('name, birthday')->select();
//输出查询的数据结果
var_dump($data);

/**
 * 第二个实例
 */
//以下演示两种创建数据的方式
$student -> name = '小红'; //通过对象属性保存学生数据
$studentData = array( //通过传递数组保存学生数据
    'gender' => '女',
    'birthday' => '1990-08-21'
);
//调用add()方法，并接受方法返回值
if($studentId = $student->add($studentData)) {
    //如果返回了新添加的学生ID，则根据Id获取学生信息
    $studentInfo = $student->getById($studentId);
    echo '<pre>';
    //打印输出学生信息
    var_demp($studentInfo);
}

