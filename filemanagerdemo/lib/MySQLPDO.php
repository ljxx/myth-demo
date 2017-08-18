<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MySQLPDO{
    //数据库默认连接信息
    private $dbConfig = array(
        'db' => 'mysql', //数据库类型
        'host' => 'localhost', //服务器地址
        'port' => '3306', //端口
        'user' => 'root', //用户名
        'pass' => '', //密码
        'charset' => 'utf8', //字符集
        'dbname' => '', //默认数据库
    );
    private static $instance; //单例模式 本累对象引用
    private $db; //保存PDO实例
    private $data = array(); //操作数据
    
    /**
     * 是有构造方法
     * 数据库连接信息
     */
    private function __construct($params) {
        $this->dbConfig = array_merge($this->dbConfig, $params); //初始化属性
        $this->connect(); //连接数据库
    }
    
    /**
     * 获得单例对象
     * @param type $params 数据库连接信息
     * @return type 单例的对象
     */
    public static function getInstance($params = array()){
        if(!self::$instance instanceof self) {
            self::$instance = new self($params);
        }
        return self::$instance; //返回对象
    }
    
    //私有克隆
    private function __clone() {
        ;
    }
    
    //连接目标服务器
    private function connect(){
        //连接信息
        $dsn = "{$this->dbConfig['db']}:host={$this->dbConfig['host']};"
        . "port={$this->dbConfig['port']};dbname={$this->dbConfig['dbname']};"
        . "charset={$this->dbConfig['charset']}";
        try {
            //实例化PDO
            $this->db = new PDO($dsn, $this->dbConfig['user'], $this->dbConfig['pass']);
        } catch (Exception $exc) {
            die("数据库连接失败"); //连接失败
            echo $exc->getTraceAsString()."--cuowu";
        }
    }
    
    //通过预处理方式执行sql（$batch表示是否批量处理）
    public function queryy($sql, $batch=false){
        //取出成员属性中的数据并清空
        $data = $batch ? $this->data : array($this->data);
//                echo 'hello world == ' . var_dump($data);
        $this->data = array();
        //通过预处理方式执行SQL
        $stmt = $this->db->prepare($sql);
        foreach ($data as $v) {
            if($stmt->execute($v) === false) {
                die("数据库操作失败");
            }
        }
        return $stmt;
    }
    //保存操作数据（如果使用SQL模版则通过此方法传递数据）
    public function dataa($data) {
        $this->data = $data;
        return $this; //返回对象自身用语连贯操作
    }
    
    //取得一行结果
    public function fetchRoww($sql) {
        return $this->queryy($sql)->fetch(PDO::FETCH_ASSOC);
    }
    
    //取得所有结果
    public function fetchAlll($sql) {
        return $this->queryy($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
