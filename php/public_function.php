<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * 分页链接生成函数
 * @param type $page
 * @param type $max_page
 */
function makePageHtml($page, $max_page){
    //保存Get参数数组，并删除page元素
    $params = $_GET;
    unset($params['page']);
    //将数组转换为GET参数字符串
    $params = http_build_query($params);
    if($params){
        $params .= '&';
    }
    //计算下一页
    $next_page = $page + 1;
    //判断下一页的页码是否大雨最大页码值，如果大于则把最大页码值赋值给它
    if($next_page > $max_page) {
        $next_page = $max_page;
    }
    //计算上一页
    $prev_page = $page - 1;
    //判断上一页的页码是否小于1，如果小于则把1赋值给它
    if($next_page < 1) {
        $prev_page = 1;
    }
    //重新拼接分页链接单html代码
    $page_html = '<a href="?'.$params.'page=1">首页</a>';
    $page_html = '<a href="?'.$params.'page='.$prev_page.'">上一页</a>';
    $page_html = '<a href="?'.$params.'page='.$next_page.'">下一页</a>';
    $page_html = '<a href="?'.$params.'page='.$max_page.'"></a>';
    //返回分页链接
    return $page_html;
}

/**
 * 初始化数据库连接
 */
function dbInit(){
    $link = mysql_connect('localhost', 'root', '123456');
    //判读数据库连接是否成功，如果不成功则显示错误信息并终止脚本继续执行；
    if(!$link){
        die('连接数据库失败！'.mysql_error());
    }
    //设置字符集，选择数据库
    mysql_query('set names utf8');
    mysql_query('use phpbook');
    return $link;
}

/**
 * 封装执行SQL语句函数
 */
function query($sql){
    if($result = mysql_query($sql)){
        //执行成功
        return $result;
    } else {
        //执行失败，显示错误信息以便与调试程序
        echo 'SQL执行失败：<br/>';
        echo '错误的SQL为：', $sql, '<br/>';
        echo '错误的代码为：', mysql_errno(), '<br/>';
        echo '错误的信息为：', mysql_error(), '<br/>';
        die;
    }
}

/**
 * 处理结果集中有多少条数据的函数
 */
function fetchAll($sql){
    //执行query()函数
    if($result = query($sql)){
        //执行成功
        //遍历结果集
        $rows = array();
        while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
            $rows = $row;
        }
        //释放结果集资源
        mysql_free_result($result);
        return $rows;
    } else {
        //执行失败
        return false;
    }
}

/**
 * 处理结果集中只有一条数据的函数
 */
function fetchRow($sql) {
    //执行query()函数
    if($result = query($sql)){
        //从结果集取得一次数据即可
        $row = mysql_fetch_array($result, MYSQL_ASSOC);
        return $row;
    } else {
        return false;
    }
}

/**
 * 对数据进行安全处理
 */
function safeHandle($data){
    //过滤字符串中的HTML特殊字符
    $data = htmlspecialchars($data);
    //转义字符串中的SQL语句特殊字符
    $data = mysql_real_escape_string($data);
    //返回处理后的数据
    return $data;
}

/**
 * 表单控件生成
 */
function make_radio($name, $value, $checked){
    $html = ''; //$html 保存拼接的HTML
    foreach ($value as $v){
        if($checked == $v){
            $html .= "<input type=\"radio\" name=\"$name\" value=\"$v\" checked/>$v";
        } else {
            $html .= "<input type=\"radio\" name=\"$name\" value=\"$v\"/>$v";
        }
    }
    return $html;
}
