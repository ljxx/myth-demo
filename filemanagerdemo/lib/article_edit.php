<?php

//初始化数据库操作类
require './init.php';
//获取文章ID
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
//取出文章分类
$sql = 'select `id`, `name` from `cms_category` order by `sort` limit 10';
$category = $db->fetchAlll($sql);
if($id) {
    echo '====id===='.$id;
    //根据ID查询该文章原有数据
    $sql = "select `title`,`content`,`author`,`cid` from `cms_article` where `id`=$id";
     echo '====id===='.$sql;
    $rst = $db->fetchRoww($sql);
    //加载html模版文件
    define('App', 'itcast');
    require '../view/article_edit.php';
}

//处理表单
if(!empty($_POST)) {
    //获取文章分类
    $data['cid'] = isset($_POST['category']) ? abs(intval($_POST['category'])) : 0;
    //获取文章标题
    $data['title'] = isset($_POST['title']) ? trim(htmlspecialchars($_POST['title'])) : '';
    //获取作者
    $data['author'] = isset($_POST['author']) ? trim(htmlspecialchars($_POST['author'])) : '';
    //获取文章内容
    $data['content'] = isset($_POST['content']) ? trim($_POST['content']) : '';
    if(empty($data['cid']) || empty($data['title']) || empty($data['author'])){
        $error[] = '文章分类、标题、作者不能为空！';
    } else {
        $sql = "update `cms_article` set `title`=:title, `content`=:content,`author`=:author,`cid`=:cid where `id`=$id";
        $db->dataa($data)->queryy($sql);
        //跳转首页
        header("location:index.php");
    }
}
