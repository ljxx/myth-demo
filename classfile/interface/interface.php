<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//定义usb接口
interface usb {
    public function connect(); //连接
    public function transfer(); //传输数据
    public function disconnect(); //断开链接
}
