<?php
echo "Hello World !!!"."<br/>";
//定义为图片输出的格式，并且是jpeg图片
//	header('Content-type:image/jpeg');
//	//1,得到原图的长和高
//	list($width, $height) = getimagesize("./image/23456.jpeg");
//	//2,将原图缩放百分之40
//	$_width = $width * 0.4;
//	$_height = $height * 0.4;
//	//创建一个新图
//	$im = imagecreatetruecolor($_width, $_height);
//	//载入原图
//	$image = imagecreatefromjpeg("./image/23456.jpeg");
//	//将原图采样，拷贝到新图上
//	imagecopyresampled($im, $image, 0, 0, 0, 0, $_width, $_height, $width, $height);
//	//将新图输出
//	imagejpeg($im);
//	
//	//清除所有资源
//	imagedestroy($im);
//	imagedestroy($image);

if(!function_exists('gd_info')){
    echo '不支持gd'."<br/>";
} else {
    echo '支持gd'."<br/>";
}

echo date('Y-m-d H:i:s');;

echo phpinfo();

?>