<?php
class Contorl{
    var $url_control = "";
    function __construct($url_contorl){
        $this->url_control = $url_contorl;
    }
    
    public function display($_url=""){
        if($_url == ""){
            $_url=$this->url_control;
        }
        
        //拼装url
        $url = "view/".$_url;
        //判断文件
        if(!file_exists($url)){
            echo "模版不存在";
        }
        
        $myfile = fopen($url, "r") or die("Unable to open file!");
        echo fread($myfile,filesize("view/index.html"));
        fclose($myfile);
    }
}