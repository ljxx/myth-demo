<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header('Content-type:text/html;charset=utf-8');

//初始化数据库操作
require './init.php';

//获取操作标识
$a = isset($_GET['a']) ? $_GET['a'] : '';

if($a == 'category_add') {
    //对取得的分类名称进行安全过滤
    
    $data['name'] = trim(htmlspecialchars($_POST['catetory_name']));
   
    //判断分类名称是否为空
    if($data['name'] === ''){
        $error[] = '文章分类名称不能为空!';
    } else {
        //判断数据库中是否有同名的分类名称
        $sql = "select `id` from `cms_category` where `name` = :name";
        if($db->dataa($data)->fetchRoww($sql)){
            $error[] = '该文章分类名称已存在！';
        } else {
            //插入到数据库
            $sql = "insert into `cms_category` (`name`) values (:name)";
            $db->dataa($data)->queryy($sql);
        }
    }
}

define('APP', 'itcast');
require '../view/category_list.php';


