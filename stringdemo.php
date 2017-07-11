<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$path = 'c:\images\apple.jpg';
$ext_pos = strrpos($path, ".") + 1;
$ext = substr($path, $ext_pos);
echo $ext."<br/>";

function getFileExt($path){
    $ext2 = substr($path, strrpos($path, ".")+1);
    return $ext2;
}

echo getFileExt($path) . "<br/>";

function sum($a, $b){
    $result = $a + $b;
    return$result;
}

echo sum(3, 5)."<br/>";

//strlen()获取字符串的长度
echo strlen('abcdefg')."<br/>";
echo strlen('itcast')."<br/>";
echo strlen('P h P')."<br/>";

//strrpos()指定字符在字符串最后一次出现的位置
echo strrpos('itcast', 'a')."<br/>";
echo strrpos('itcast', 's')."<br/>";
echo strrpos('itcast', 'c')."<br/>";

//substr() 获取字符串中的子串
echo substr('itcast', 2)."<br/>";
echo substr('itcast', 0, 2)."<br/>";
echo substr('itcast', 3, -1)."<br/>";
echo substr('itcast', -4, -1)."<br/>";

//str_replace() 字符串中某些字符进行替换
echo str_replace('e', 'E', 'welcome', $count);
echo $count."<br/>";

//explode()使用一个字符串分割另一个字符串

//implode()指定的连接符将数组拼接成一个字符串
$arr = array(1,2,3);
echo implode(',', $arr);
