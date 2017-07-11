<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//设定字符集
header('Content-type:text/html;charset=utf-8');
//定义一个常量，保存所有商品的折扣
const DISCOUNT = 0.8;
//定义变量，保存所有商品的名称
$fruit1 = '香蕉';
$fruit2 = '苹果';
$fruit3 = '橘子';
//对应商品的购买数量（斤）
$fruit1_num = 2;
$fruit2_num = 1;
$fruit3_num = 3;
//对应商品的价格（元/斤）
$fruit1_price = 7.99;
$fruit2_price = 6.89;
$fruit3_price = 3.99;

//依次计算每件商品的总价格
$fruit1_total = $fruit1_num * $fruit1_price;
$fruit2_total = $fruit2_num * $fruit2_price;
$fruit3_total = $fruit3_num * $fruit3_price;

//计算所有商品总价格
//计算公司： 所有商品价格 = （香蕉总价格 + 苹果总价格 + 橘子总价格）
$total = ($fruit1_total + $fruit2_total + $fruit3_total) * DISCOUNT;

//拼接商品信息的HTML页面
$str = "<table>";
$str .= "<tr><td>商品名称</td><td>$fruit1</td><td>$fruit1_price</td></tr>";
$str .= "<tr><td>$fruit2</td><td>$fruit2_num</td><td>$fruit2_price</td></tr>";
$str .= "<tr><td>$fruit3</td><td>$fruit3_num</td><td>$fruit3_price</td></tr>";
$str .= "<tr><td colspan='3'>商品折扣：<span>".DISCOUNT."</span></td></tr>";
$str .= "<tr><td colspan='3'>打折后购买商品总价格：{$total}元</td></tr>";
$str .= "</table>";
//输出商品信息
echo $str;

define('CON', 'itcast', true);
echo CON;
echo constant('CON')."<br/>";

const pai = 3.14;
echo pai;
