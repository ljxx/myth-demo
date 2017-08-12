<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 文件上传类
 */
class upload{
    //允许上传的文件类型数组
    private $allow_types = array('image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png', 'image/gif');
    //允许上传的文件最大尺寸，1048576 表示为1M
    private $max_size = 1048576;
    //上传文件保存在服务器中的目录位置
    private $upload_path = './';
    //上传文件时产生的错误
    private $error='';
    
    /**
     * 
     * 上传文件的函数
     * @param type $file 包含文件的5歌信息的数据
     * @param type $prefix 前缀
     * @return boolean 目标文件名
     */
    public function up($file, $prefix=''){
        //第一步，判断文件信息是否有错误
        if($file['error'] != 0){
            $upload_errors = array(
                1 => '文件过大，超过了php配置的限制',
                2 => '文件过大，超过了form表单中的限制',
                3 => '文件美哟上传完毕',
                4 => '文件没有上传',
                6 => '没有找到临时上传目录',
                7 => '临时文件写入失败',
            );
            $this->error = isset($upload_errors[$file['error']]) ? $upload_errors[$file['error']] : '未知错误';
            
            return false;
        }
        //第二部，判断文件类型是否存在于$allow_type中
        if(!in_array($file['type'], $this->allow_types)){
            //如果不存在，则更新属性$error，把祥光错误信息赋值给该属性，最后返回false
            $this->error = '该类型不能上传，允许的类型为：'. implode('|', $this->allow_types);
            
            return false;
        }
        
        //第三部，判断文件大小，是否超过了$max_size规定的值
        if($file['size'] > $this->max_size){
            //如果超过了，则更新属性$error，把相关错误信息赋值给该属性，最后返回false
            $this->error = '文件不能超过'. $this->max_size . '字节';
            
            return false;
        }
        
        //确定新文件名，生成唯一的文件名称，同时保持原有的文件扩展名
        $new_file = uniqid($prefix) . strrchr($file['name'], '.');
        //确定当前的子目录
        $sub_path = date('YmdH');
        //确定上传文件的全路径
        $upload_path = $this->upload_path . $sub_path;
        //判断这个目录是否存在
        if(!is_dir($upload_path)){
            //不存在，则创建
            mkdir($upload_path);
        }
        //移动文件
        if(move_uploaded_file($file['tmp_name'], $upload_path . '/' . $new_file)){
            //成功则返回这个文件的目录地址
            
            return $sub_path . '/' . $new_file;
        } else {
            //失败则更新属性$error,把相关错误信息赋值给该属性，最后返回false
            $this->error = '移动失败';
            echo '===上传失败地址====:' . $upload_path . '/' . $new_file."<p/>";
            return false;
        }  
    }
    
    public function getError(){
        //获取私有属性$error
        return $this->error;
    }
    
}
