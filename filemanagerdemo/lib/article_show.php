<?php

//初始化数据库操作类
require './init.php';
//获取文章分类
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
//取出文章分类
$sql = 'select `id`, `name` from `cms_category` order by `sort` limit 10';
$category = $db->fetchAlll($sql);
if($id) {
    //根据ID查询该文章
    $sql = "select `title`, `content`, `author`, `addtime`, `cid` from `cms_article` where `id` = $id";
    $rst = $db->fetchRoww($sql);
    //获取分类名称
    $sql = 'select `name` from `cms_category` where `id` = '.$rst['cid'];
    $cname = $db->fetchRoww($sql);
    $rst['cname'] = $cname['name'];
    //加载Html模版文件
    define('App', 'itcast');
    require '../view/article_show.php';
}


