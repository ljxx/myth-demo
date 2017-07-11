<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

header('Content-type:text/html;charset=utf-8');
$name = '小明';
$score = 78;
if(is_int($score) || is_float($socoe)){
    if($score >= 90 && $score <= 100) {
        $str = 'A级';
    } elseif($socoe >= 80 && $socoe < 90) {
        $str = 'B级';
    } elseif ($score >= 70 && $score < 80) {
        $str = 'C级';
    } elseif ($score >= 60 && $score < 70) {
        $str = 'D级';
    } elseif ($score >= 0 && $score < 60 ) {
        $str = 'E级';
    } else {
        $str = '学生成绩范围必须在0~100!';
    }
} else {
    $str = '输入的学生成绩不是数值!';
}
echo $str."<br/>";

$year = 2008;
$strr = "<br/>";
if($year % 4 == 0 && $year % 100 != 0 || $year%400 == 0){
    echo $year.'年是闰年'.$strr;
} else {
    echo $year.'年不是闰年'.$strr;
}

var_dump($year);