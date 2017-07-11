 <?php
 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//声明http消息头的文档编码格式
header('content-type:text/html;charset=utf-8');
//引入功能函数文件
require './public_function.php';

//连接数据库
$link = dbInit();

$fields = array('e_dept', 'date_of_entry');
$sql_order = '';
//定义变量，用来保存查询条件，初始化赋值空字符串
$where = '';

$order = isset($_GET['order']) ? $_GET['order'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
//定义变量，用来保存查询条件，初始化赋值空字符串
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

//
////保存当前用户访问的页码
//$page = 1; //假设当前用户访问的页码是1
////拼接查询语句并执行，获取查询数据
//$lim = ($page - 1) * 2;
//$sql = "select * from `emp_info` limit $lim,2";
//

/**
 * 排序 判断$order是否存在于合法字段列表$fields中
 */
if(in_array($order, $fields)){
    //判断$_GET['order']是否存在并且值是否为'desc'
    if($sort == 'desc'){
        //条件成立，组合order字句，order by 字段desc
        $sql_order = "order by $order desc";
        //更新$sort为'asc'
        $sort = 'asc';
    } else {
        //条件不成立，组合order字句， order by 字段 asc
        $sql_order = "order by $order asc";
        //更新$sort为'desc'
        $sort = 'desc';
    }
}

/**
 * 模糊查询
 */
if(!empty($keyword)){
    //对用户输入数据进行SQL转义
    $keyword = mysql_real_escape_string($keyword);
    //将转义后的关键字拼接到where条件查询中，并且使用like进行模糊查询
    $where = "where e_name like '%$keyword%'";
}


//定义每页显示的记录行数
$page_size = 2;
//查询所有记录的行数；
$res_count = mysql_query("select count(*) from `emp_info`");
$count = mysql_fetch_row($res_count);
//获取查询结果中的第一列的值
$count = $count[0];
//计算最大页码值
$max_page = ceil($count / $page_size); //ceil()向上取最大的整数
//获取当前访问的页码，并做容错处理
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$page = $page > $max_page ? $max_page : $page;
$page = $page < 1 ? 1 : $page;
$lim = ($page - 1) * $page_size;

//准备sql语句
$sql = "select * from `emp_info` limit $lim,$page_size $sql_order $where";

echo $sql."<br/>";
echo $count."====".$page."=====".$max_page;

//执行sql语句，获取结果集
$result = mysql_query($sql, $link);

//定义员工数组，用以保存员工信息
$emp_info = array();

//遍历结果集，获取每位员工的详细数据
while ($row = mysql_fetch_assoc($result)){
    $emp_info[] = $row;
}

//设置常量，用以判断视图页面是否由此页面加载
define('App', 'phpbook');

//加载视图页面，显示数据
require '../html/list_html.php';

