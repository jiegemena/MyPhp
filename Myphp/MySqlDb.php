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
    
    /*ֻ����utf8 �ַ���*/
    function __construct($table){
        $this->table = $table;
        $this->mysqli = new mysqli($this->server,$this->username,$this->password,$this->database) or die("conn error");
        $this->mysqli->query("set names utf8");
    }
    
    //���ص�һ��
    function find_key($value,$column ="id"){
        $query = "select * from {$this->table} where {$column} = {$value} limit 1";
        echo $query."<br/>";
        $result =  $this->mysqli->query($query);
        $row =$result->fetch_array();
        return $row;
    }
    
    //����һ����¼����
    function mySelect_all($value,$column ="id") {
        $query = "select * from {$this->table} where {$column} = {$value}";
        $this->query = $query;
        return  $this->mysqli->query($query);
    }
    
    //����һ����¼����
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
    
    //���ز�ѯ����
    function myGetCount(){
        return $this->myQuery("SELECT FOUND_ROWS()")->fetch_array()['0'];
    }
    
    function myQuery($query){
       return $this->mysqli->query($query);
    }
    
    /*
     * �Ѽ�¼��ת���ɳ�����*/
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