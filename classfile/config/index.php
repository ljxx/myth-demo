<?php

/* 
 * 测试，自动加载类
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//载入init.php文件
require './init.php';
//实例化student对象
$student = new student;

echo '<br>';

//实例化school对象
$school = new school();
