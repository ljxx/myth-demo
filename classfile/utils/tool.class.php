<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 常用工具类
 */
class tool {
    
    /**
     * JavaScript 弹窗并跳转
     * @param type $info 跳转信息
     * @param type $url 跳转地址
     * @return string 返回能够执行跳转的JavaScript代码
     */
    public static function alertGo($info, $url){
        //弹出一个对话框，提示$info中的信息，然后location跳转到$_url指定的页面
        echo "<script>alert('$info'); location.href='$url';</script>";
        exit();
    }
    
    /**
     * JavaScript 弹窗返回
     * @param type $info 跳转信息
     * @return string 返回能够执行跳转的JavaScript代码
     */
    //该方法在某个操作执行失败时使用
    public static function alertBack($info){
        //弹出对话框，提示$info变量中的信息，然后返回上一个返回的页面
        echo "<script>alert('$info'); history.back();</script>";
        exit();
    }
        
}
