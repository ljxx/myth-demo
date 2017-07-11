<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header('Content-type:text/html;charset=utf-8');

$a = 1; 
while($a <= 4){
    echo $a.'&nbsp;';
    ++ $a;
}

echo '<br/>';

//金字塔
$line = 1;
while ($line <= 5){
    $empty_pos = $star_pos = 1;
    $empty = 5 - $line;
    $star = 2*$line - 1;
    while($empty_pos <= $empty){
        echo '&nbsp;';
        ++ $empty_pos;
    }
    while($star_pos <= $star){
        echo '*';
        ++ $star_pos;
    }
    echo '<br/>';
    ++ $line;
}

echo '<br/>';

echo '<table border="1">';
for($i = 1; $i < 10; ++$i){
    echo '<tr>';
    for($j = 1; $j <= $i; ++$j){
        echo "<td> {$j}X{$i}=".$j*$i."</td>";
    }
    echo '<tr/>';
}
echo '</table>'."<br/>";

$goods = array(
    array('name' => '主板', 'price' => '297', 'producing' => '广东', 'num' => 3),
    array('name' => '显卡', 'price' => '799', 'producing' => '上海', 'num' => 2),
    array('name' => '硬盘', 'price' => '589', 'producing' => '北京', 'num' => 5)
);

$total = 0;
$str = "<table>";
$str .= "<tr><td>商品名称</td><td>价格（元）</td><td>地产</td>";
$str .= "<td>数量（件）</td><td>总价（元）</td></tr>";
foreach ($goods as $values){
    $str .= '<tr>';
    foreach ($values as $v){
        $str .= '<td>'.$v.'</td>';
    }
    $sum = $values['price']*$values['num'];
    $str .= '<td>'.$sum.'</td>';
    $str .= '</tr>';
    $total += $sum;
}
$str .= "<tr><td>小计".$total."元</td></tr></table>";
echo $str;

