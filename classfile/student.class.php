<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//定义student类
class student{
    //成员属性
    public $name; //姓名
    public $student_id; //学号
    public $age; //年龄
    
    /**
     * 声明自我介绍的方法
     */
    public function introduce(){
        echo "大家好，我是{$this->name}, 今年{$this->age}岁。<br/>我的学号是{$this->student_id}, 很高兴认识大家"."<p/>";
    }
    
    /**
     * 学生学习的方法
     */
    public function study($time){
        date_default_timezone_set("Asia/Shanghai"); 
        $time = date("Y年m月d日 H:i:s", $time);
//        $time = date("Y:m:d H:i:s", $time);
        echo "当前时间为{$time}, 学习中，请勿打扰..."."<p/>";
    }
}