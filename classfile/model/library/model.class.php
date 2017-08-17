<?php

/* 
 * 基础模型类
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class model {
    
    //表名
    protected $tableName; 
    
    protected $data = array(); //数据数组（添加，修改用）

    //成员属性$db，用来保存数据库操作类的实例
    protected $db;
    //构造方法，用来获取数据库连接资源
    public function __construct($tableName) {
        //实例化数据库
        $this->db = MySQLDB::getInstance($GLOBALS['dbConfig']);
        //获取表名
        $this->tableName = $tableName;
    }
    
    protected $fields; //查询字段信息（查询用）
    //指定待查询的字段
    public function field($fields) {
        $this->fields = $fields;
        return $this;
    }
    
    //解析字段（查询用）
    //将$this->fields 转换为逗号拼接的SQL字段部分
    private function parseFields() {
        //is_string()判断属性值是否是字符串,如果是字符串，则把该字符串使用"逗号"分隔成数组。
        if(is_string($this->fields)){
            $this->fields = explode(',', $this->fields);
        }
        //将数组信息按照select语句中查询字段的语法格式进行重新组合，最后在第10航代码把字段数组使用"逗号"连接成字符串病返回
        foreach ($this->fields as $k => $v) {
            $this->fields[$k] = "`$v`";
        }
        return implode(',', $this->fields);
    }
    
    //查询数据
    //如果没有指定$this->fields，则查询所有字段
    public function select() {
        //拼接SQL语句
        if(empty($this->fields)) {
            $sql = "select * from $this->tableName";
        } else {
            $fields = $this->parseFields();
            $sql = "select $fields from $this->tableName";
            //清除本次的字段
            $this->fields = null;
        }
        return $this->db->fetchAll($sql);
    }
    
    //设置模型中的数据
    public function __set($name, $value) {
        $this->data[$name] = $value;
    }
    
    //获取模型中的数据
    public function __get($name) {
        return isset($this->data[$name]) ? $this->data[$name] : null;
    }
    
    //解析数据（添加用）
    private function parseData() {
        $field = $value = array();
        foreach ($this->data as $k=>$v){
            $field[] = "`$k`";
            $value[] = "'".$this->db->escapeString($v)."'";
        }
        return array(
            'field' => implode(',', $field),
            'value' => implode(',', $value),
        );
    }
    
    //添加数据，如果传递$data参数，则覆盖模型本身的数据
    public function add($add = array()) {
        //合并数组
        $this->data = array_merge($this->data,$data);
        //解析$data属性中的数据
        $data = $this->parseData();
        //清除模型中的数据
        $this->data = array();
        //拼接SQL
        $sql = "insert into $this->tableName ({$data['field']}) values ({$data['value']})";
        //返回执行结果
        if($this->db->query($sql)) {
            //当添加成功时，返回最后被添加的数据id
            return $this->db->lastInsertId();
        }
        return false;
    }
    
    
   
}

