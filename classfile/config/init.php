<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header('content-type:text/html;charset=utf-8');
/**
 * 自动加载函数
 */
function __autoload($className) {
    require "./$className.class.php";
}

/**
 * 用户自定义加载函数
 */
function user_autoload($className) {
    require "./$className.class.php";
}

spl_autoload_register('user_autoload');

