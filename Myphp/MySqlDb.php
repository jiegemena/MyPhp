<?php
//namespace Myphp;
class MySqlDb{
    public $server   = "localhost";
    public $username = "root";
    public $password = "jie";
    public $database = "Myphp";
    public $table = "";
    
    public $mysqli;
    
    private $query = "";
    
    /*只能用utf8 字符集*/
    function __construct($table){
        $this->table = $table;
        $this->mysqli = new mysqli($this->server,$this->username,$this->password,$this->database) or die("conn error");
        $this->mysqli->query("set names utf8");
    }
    
    //返回第一条
    function find_key($value,$column ="id"){
        $query = "select * from {$this->table} where {$column} = {$value} limit 1";
        echo $query."<br/>";
        $result =  $this->mysqli->query($query);
        $row =$result->fetch_array();
        return $row;
    }
    
    //返回一个记录数组
    function mySelect_all($value,$column ="id") {
        $query = "select * from {$this->table} where {$column} = {$value}";
        $this->query = $query;
        return  $this->mysqli->query($query);
    }
    
    //返回一个记录数组
    function mySelect() {
        $query = "select * from {$this->table}";
        $this->query = $query;
        return  $this->mysqli->query($query);
    }
    
    /*
     * */
    function mySelectPage($page = 1,$row = 10) {
        $page = ($page-1) * $row;
        $query = "select * from {$this->table} limit $page,$row";
        $this->query = $query;
        return  $this->mysqli->query($query);
    }
    
    //返回查询总数
    function myGetCount(){
        return $this->myQuery("SELECT FOUND_ROWS()")->fetch_array()['0'];
    }
    
    function myQuery($query){
       return $this->mysqli->query($query);
    }
    
    /*
     * 把记录集转化成成数组*/
    function myToArray($result) {
     $column = 0;
        while(($row = $result->fetch_array()) != null){
           $val[$column++] = $row;
        }
        return $val;
    }
    
    
    function myInsert($value,$column) {
        ;
    }
    
    function myUpdate($value,$column,$id) {
        ;
    }
} 