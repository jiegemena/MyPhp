<?php
//namespace Myphp;
header("Content-Type: text/html; charset=UTF-8");
class Contorl{
    private  $boundaries_b = "{";
    private  $boundaries_e = "}";
    public $assignStr = "";
    public $url_control = "";
    
    function __construct(){
        
    }
    
    public function assign($value,$string){
        $this->assignStr[$value] = $string;
    }
    
    public function getAssign(){
        return $this->assignStr;
    }
    
    public function display($_url=""){
        //ƴװurl
        $url = "view/".$_url; 
        //�ж��ļ�
        if(!file_exists($url)){
            echo "view error";
        }
        
        $er = strstr($url, ".");
        if($er == ".php"){
           include_once $url;
        }else if($er == ".html"){
            $myfile = fopen($url, "r") or die("Unable to open file!");
            $file = fread($myfile,filesize($url));
            header("Content-Type: text/html; charset=UTF-8");
            echo $this->explain($file);
            fclose($myfile);
            $this->end();
        }
    }
    
    
    public function View($_url=""){
        //ƴװurl
        $url = "View/".$_url;
        //�ж��ļ�
        if(!file_exists($url)){
            echo "view error";
        }

//         $er = strstr($url, ".");
//         if($er == ".html"){
            $myfile = fopen($url, "r") or die("Unable to open model file!");
            $file = fread($myfile,filesize($url));
            header("Content-Type: text/html; charset=UTF-8");
            return $this->explain($file);
//         }
    }
    
    //ƴ��ģ��
    public function  explain($tmp){
        if($tmp == null){
            exit();
        }
        
        $begin_i = 0;
        $end_i = 0;
        $tmp_b = "";
        $tmp_value = "";
        $tmp_e = "";
           
        while(($end_i = strpos($tmp,$this->boundaries_b,$begin_i)) != ""){
            $tmp_b = substr($tmp,$begin_i,$end_i-$begin_i);
            $tmp_value.=$tmp_b;
            $begin_i = $end_i+1;
            $end_i = strpos($tmp,$this->boundaries_e,$begin_i);
            $tmp_e = substr($tmp,$begin_i,$end_i-$begin_i);
            $tmp_value.=$this->isArray_($tmp_e);
            $begin_i = $end_i+1;
        }
        return $tmp_value.substr($tmp,$begin_i);     
       }
       
       
       //ȥ��string ��������� [id] -> id
       function deleteW($tmp){
           return substr($tmp,1,-1);
       }
       
       //�ж������黹�Ǳ��������������±�����
       function isArray_($tmp_e){

           $begin_z = 0;
           $end_z = 0;
           $tmp_array_b = "";
           $tmp_array_e = "";
           
           if( ($end_z = strpos($tmp_e,"[",$begin_z)) != ""){
               $tmp_array_b = substr($tmp_e, $begin_z,$end_z-$begin_z);
               $begin_z = $end_z + 1;
               $end_z = strpos($tmp_e,"]",$begin_z);
               $tmp_array_e = substr($tmp_e,$begin_z,$end_z-$begin_z);
               if(strpos($tmp_array_e, "\"",0) == 0){
                   $tmp_array_e = $this->deleteW($tmp_array_e);
               }else if(strpos($tmp_array_e, "\'",0) == 0){
                   $tmp_array_e = $this->deleteW($tmp_array_e);
               }
               //�����ģ��
               if(isset($this->assignStr[$tmp_array_b][$tmp_array_e])){
                  return $this->assignStr[$tmp_array_b][$tmp_array_e];
               }else{
                   return "";
               }
            }
            //�����ģ��
            if(isset($this->assignStr["$tmp_e"])){
               return $this->assignStr["$tmp_e"];
           }else{
               return "";
           }
       }
       
       
       //�ͷ�
       function end(){
           exit();
       }
}