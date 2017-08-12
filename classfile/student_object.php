<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//引入student类文件
require './student.class.php';
//实例化对象
$student = new student;
$student->age=25;
$student->name='张三丰';
$student->student_id='xh1001001';
$student->introduce();
$student->study();

$student02 = new student();
$student02->name="杨过";
$student02->student_id="xh1001002";
$student02->age=27;
$student02->introduce();
$student02->study(time());

//让但因结果格式化输出，方便查看
echo '<pre>';
//使用var_dump()函数打印$student变量信息
var_dump($student, $student02);
