<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

header('content-type:text/html;charset=utf-8');
//载入interface.php文件
require './interface.php';
//使用implements关键字实现usb接口
class mp3 implements usb {
    
    public function connect() {
        echo '开始链接<br/>';
    }

    public function disconnect() {
        echo '断开<br>';
    }

    public function transfer() {
        echo '开始传输...传输结束<br/>';
    }
}

//实例化mp3对象
$mp3 = new mp3();
//调用接口方法connect();
$mp3->connect();
