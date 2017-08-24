<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header('Content-type:text/html;charset=utf-8');
//初始化数据库操作类
require ('./init.php');

if(!empty($_POST)){
//    echo '==表单提交==='.var_dump($_POST)."<br/>";
    //获取文章分类
    $data['cid'] = isset($_POST['category']) ? abs(intval($_POST['category'])) : 0;
    //获取文章标题
    $data['title'] = isset($_POST['title']) ? trim(htmlspecialchars($_POST['title'])) : '';
    $data['author'] = isset($_POST['author']) ? trim(htmlspecialchars($_POST['author'])) : '';
    //获取文章内容
    $data['content'] = isset($_POST['content']) ? trim($_POST['content']) : '';
    
    if(empty($data['cid']) || empty($data['title']) || empty($data['author'])){
       $error[] = '文章分类、标题、作者不能为空！';
//       echo '====='.$data['cid'].'===='.$data['title'].'====='.$data['content']."====". var_dump($error);
    } else {
        $sql = 'insert into `cms_article` (`title`,`content`,`author`,`addtime`,`cid`) values (:title,:content,:author,now(),:cid)';
//        echo "<p/>".'===data== ' . var_dump($data)."<p/>";
        $db->dataa($data)->queryy($sql);
        //跳转到首页
        header("location:../../index.php");
    }
}

//取出文章分类
$sql = 'select `id`,`name` from `cms_category` order by `sort`';
$category = $db->fetchAlll($sql);


//载入HTML模版文件
define('App', 'itcast');
require '../view/article_add.php';
