<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * 定义商品类，使用abstract声明为抽象类
 * 该类提供基础属性$name, $price，构造方法
 */
abstract class goods {
    public $name; //商品名称
    public $price; //商品价格
    //构造方法，初始化对象的$name和$price属性
    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
    //限制非抽象子类都要实现getName的方法，但是可以不同
    abstract protected function getName();
    //要求每个子类都必须要有相同的返回原始价格的方法
    final public function getPrice() {
        return $this->price;
    }
}
