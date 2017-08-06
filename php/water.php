<?php
/**
 * 添加水印功能
 * $source 原图
 * $water 水印图
 * $position添加水印位置，1 表示左上角
 * $path 水印图片存放路径，默认为空，表示当前目录
 */
function wateramrk($source, $water, $postion = 1, $path = ''){
    //设置水印图片名称前缀
    $waterPrefix = 'water_';
    //图片类型和对应创建画布资源的函数名
    $from = array(
        'image/gif' => 'imagecreatefromgif',
        'image/png' => 'imagecreatefrompng',
        'image/jpeg' => 'imagecreatefromjpeg'
    );
    //图片类型和对应生成图片等函数名
    $to = array(
        'image/gif' => 'imagegif',
        'image/png' => 'imagepng',
        'image/jpeg' => 'imagejpeg'
    );
    //获取原图和水印图片信息数组
    $src_info = getimagesize($source);
    $water_info = getimagesize($water);
    //从数组中获取原图和水印图片的宽和高
    list($src_w, $src_h, $src_mime) = $src_info;
    list($wat_w, $wat_h, $wat_mime) = $wat_info;
    //获取各个图片对应的创建画布函数名
    $src_create_fname = $from[$src_info['mime']];
    $wat_create_fname = $from[$wat_info['mime']];
    //使用可变函数来创建画布资源
    $src_img = $src_create_fname($source);
    $wat_img = $wat_create_fname($water);
    
    //设置水印位置
    switch ($postion){
        case 1: //左上
            $src_x = 0;
            $src_y = 0;
            break;
        case 2: //右上
            $src_x = $src_w - $wat_w;
            $src_y = 0;
            break;
        case 3: //中间
            $src_x = ($src_w - $wat_w) / 2;
            $wat_x = ($src_h - $wat_h) / 2;
            break;
        case 4: //左下
            $src_x = 0;
            $src_y = $src_h - $wat_h;
            break;
        default : //右下
            $src_x = $src_w - $wat_w;
            $wat_y = $src_h - $wat_h;
            break;
    }
    //将水印图片添加到目标图标上
    /**
     * 1、原图像资源
     * 2、水印图像资源
     * 3、水印图片在原图像中横坐标
     * 4、水印图片在原图像中的纵坐标
     * 5、0，0 水印图片的横坐标和纵坐标
     * 6、水印图片的宽
     * 7、水印图片等高
     */
//    imagecopy($src_img, $wat_image, $src_x, $src_y, 0, 0, $wat_w, $wat_h);
    //设置水印透明度
    imagecopymerge($src_img, $wat_img, src_x, $src_y, 0, 0, $wat_w, $wat_h, 50);
    
    //生成带水印的图片路径
    $waterfile = $path.$waterPrefix.$source;
    //获取输出图片格式的函数名
    $generate_fname = $to[$src_info['mime']];
    //判断将添加水印后的图片输出到指定目录是否正确
    if($generate_fname($src_img, $waterfile)){
        //有条理地输出原图像与加水印后的图像
        echo "<table><tr><th>为图片添加水印</th></tr><tr><td>原 图 像：</td><td><img src='".$source."'/></td></tr>"
                . "<tr><td>加水印后：</td><td><img src='".$waterfile."' /></td></tr></table>";
    } else {
        echo '输出水印图片到指定目录出错！';
        return false;
    }
}

//使用变量保存原图片与水印图片路径
$source = '../image/23456.jpeg';
$water = 'http://www.itcast.cn/images/logo.gif';
//调用函数，显示原图与添加水印后的图片
wateramrk($source, $water);

////设置字体样式
//$font_style = '..Fonts/simsun.ttc';
//
///**
// * 1、图像资源
// * 2、所需要掩饰的红色成分
// * 3、所需掩饰的绿色成分
// * 4、所需掩饰的蓝色成分
// */
//$color = imagecolorallocate($src_img, 0xff, 0x00, 0xff);
//
//imagefttext($src_img, 30, 0, 0, 35, $color, $font_style, '快乐学习php');


