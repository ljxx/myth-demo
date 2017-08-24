<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header('Content-type:text/html;charset=utf-8');

//初始化数据库操作
require './init.php';
//载入分页类
require './page.class.php';
//获取当前页码
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
//拼接查询条件
//
//获取要查询的分类ID，0表示全部
$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
//获取查询列表条件
$where = '';
if($cid) $where = "where `cid` = $cid";

//获取总记录数
$sql = "select count(*) as total from `cms_article` $where";
$results = $db->fetchRoww($sql);
$total = $results['total'];
//实例化分页类
$Page = new Page($total, 2, $page); //Page(总页数，每页显示条数，当前页)
$limit = $Page->getLimit(); //获取分页链接条件
$page_html = $Page->showPage(); //获取分页HTML链接

//分页获取文章列表
$sql = "select `id`, `title`, `content`, `author`, `addtime`, `cid` from `cms_article` $where order by `addtime` desc limit $limit";
$articles = $db->fetchAlll($sql);
//通过mbstring扩展截取文章内容作为摘要
foreach ($articles as $k=>$v){
    //mb_substr（内容，开始位置，截取长度，字符集）
    $articles[$k]['content'] = mb_substr(trim(strip_tags($v['content'])), 0, 150, 'utf-8').'...... ......';
}

define('App', 'itcast');
require '../view/index_html.php';
