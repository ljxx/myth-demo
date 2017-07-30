<?php

//准备测试数据
$all_data = array(
    //文字ID => array(文章标题，文字内容);
    1 => array('学PHP，冲击月新1万+你也可以！','......'),
    2 => array('蓝姬星讯PHP项目答辩，群雄逐鹿！'),
    3 => array('夏季激情，活力试射'),
    4 => array('学PHP编程，不做孬种程序员！')
);

//获取当前文章ID
$id = isset($_GET['id']) ? intval($_GET['id']) : 1;
//计算上一篇文章的ID
$id_prev = $id - 1;
//计算下一篇文章的Id
$id_next = $id + 1;
//防止ID越界。
if($id < 1) $id = 1;
if($id > 4) $id = 4;
if($id_prev < 1) $id_prev = 1;
if($id_next > 4) $id_next = 4;

//判断Cookie中是否存在history记录
//if(isset($_COOKIE['history'])){
//    //存在时，通过$cookie_arr接收赏赐访问过的文章ID
//    $cookie_arr = intval($_COOKIE['history']);
//} else {
//    //不存在时，向COOKIE中保存history记录
//    setcookie('hsitory', $id); //将当前文章ID保存到cookie中
//}

if(isset($_COOKIE['history'])){
    //获取cookie，保存到数组中，限制数组最多只能有4个元素
    $cookie_arr = explode(',', $_COOKIE['history'],4);
    //遍历数组
    foreach ($cookie_arr as $k => $v){
        //将数组中的每个元素转换为整数
        $cookie_arr[$k] = intval($cookie_arr[$k]);
        //如果当前文章ID在数组中已经存在，则删除
        if($v == $id) unset ($cookie_arr[$k]);
    }
    //当数组元素达到4个时，删除第一个元素
    if(count($_COOKIE['history']) > 3) {
        array_shift($cookie_arr);
    }
    //将当前访问的文章ID添加到数组末尾
    $cookie_arr[] = $id;
    //将数组转换为字符串，重新保存到cookie中国年
    setcookie('history', implode(',', $cookie_arr));
    
} else {
    $cookie_arr = array($id); //通过数组保存浏览历史ID
    setcookie('hsitory', $id); //将当前文章ID保存到cookie中
}

//$data保存当前页对应的文章数据
$data = $all_data[$id];
//$data_history 保存cookie中的历史记录
$data_history = array();
foreach ($data_history as $v){
    if(isset($all_data[$v])){
        //$data_histroy[文章ID] = 文章标题
        $data_history[$v] = $all_data[$v][0];
    }
}

//清除历史记录
if(isset($_GET['action'])){
    if($_GET['action'] == 'clear'){
        $cookie_arr = array(); //清除历史记录数组
        setcookie('history','',time()-1); //清除cookie
    }
}




//加载HTML模版文件
require '../html/article_html.php';