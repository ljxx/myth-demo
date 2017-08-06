<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$img_w = 70; //初始化验证码图片的宽
$img_h = 22; //初始化验证码图片的高
$char_len = 5; //初始化验证码值的长度
$font = 5; //初始化验证码值的字体大小

//生成码值数组，不需要0，避免与字母o冲突
$char = array_merge(range('A', 'Z'), range('a', 'z'), range(1, 9));
//随机获取$char_len个码值的键
$rand_keys = array_rand($char, $char_len);
//判断当码值长度为1时，将其放入数组中
if($char_len == 1){
    $rand_keys = array($rand_keys);
}
//打乱随机获取的码值键的数组
shuffle($rand_keys);
//根据键获取对应的码值，并拼接成字符串
$code = '';
foreach ($rand_keys as $key){
    $code .= $char[$key];
}
//将获取的码值字符串保存到Session中
@session_start();
$_SESSION['captchar_code'] = $code;

//生成画布
$img = imagecreatetruecolor($img_w, $img_h);
//为画布分配颜色
$bg_color = imagecolorallocate($img, 0xcc, 0xcc, 0xcc);
//设置画布背景色
imagefill($img, 0, 0, $bg_color);
//继续为验证码图片生成多个干扰点
for($i = 0; $i <= 300; ++$i){
    //随机为画布分配颜色
    $color = imagecolorallocate($img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    //在$img图像上随机绘制一个点
    imagesetpixel($img, mt_rand(0, $img_w), mt_rand(0, $img_h), $color);
}

//为验证码边框分配颜色
$rect_color = imagecolorallocate($img, 0xff, 0xff, 0xff);
//绘制验证码图片边框
imagerectangle($img, 0, 0, $img_w-1, $img_h-1, $rect_color);

//设定字符串颜色
$str_color = imagecolorallocate($img, mt_rand(0, 100), mt_rand(0, 100), mt_rand(0, 100));
//根据设定的字体获取单个字符的宽和高
$font_w = imagefontwidth($font);
$font_h = imagefontheight($font);
//验证码的码值总宽度 = 单个字符宽度 X 字符个数
$str_w = $font_w * $char_len;
//将码值写入到验证码图片中
imagestring($img, $font, ($img_w-$str_w) / 2, ($img_h-$font_h) / 2, $code, $str_color);

//设置输出验证码图片的格式
header('Content-Type: image/png');
//输出验证码
imagepng($img);
//销毁画布
imagedestroy($img);