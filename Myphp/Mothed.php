<?php
//php模版插件
function Widget_Mothed($php_view_url,$mothed){
    //判断文件
    if(!file_exists($php_view_url)){
        echo "$php_view_url error";
    }
    require_once $php_view_url;
    $m = substr(stristr($php_view_url, "/"), 1,-4)."Class";
    $w = new $m(); 
    return $w->$mothed();
}