<?php
//phpģ����
function Widget_Mothed($php_view_url,$mothed){
    //�ж��ļ�
    if(!file_exists($php_view_url)){
        echo "$php_view_url error";
    }
    require_once $php_view_url;
    $m = substr(stristr($php_view_url, "/"), 1,-4)."Class";
    $w = new $m(); 
    return $w->$mothed();
}