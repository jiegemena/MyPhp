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
        
        //ƴװurl
        $url = "view/".$_url;
        //�ж��ļ�
        if(!file_exists($url)){
            echo "ģ�治����";
        }
        
        $myfile = fopen($url, "r") or die("Unable to open file!");
        echo fread($myfile,filesize("view/index.html"));
        fclose($myfile);
    }
}