<?php
//namespace Myphp;
//router定义
/*
 * c为控制器
 * m为控制器里面方法*/
 
if(is_array($_GET)&&count($_GET)>0)//判断是否有Get参数
{
    // 有控制器方法
    if(isset($_GET["c"])){
        $control = $_GET["c"];
        $url = "control/".$control.".php";
        if(file_exists($url)){
            include  $url;
            $view = new $control();
            //选择哪个方法
            if(isset($_GET["m"])){
                $method = $_GET["m"];
                    $view->$method();
            }else
            $view->index();
        }else{
            echo "file not found!";
        }
    }else{//没有控制器方法
       include 'control/Home.php';
        $view = new Home();
        $view->index();
    }
}else{
    include 'control/Home.php';
        $view = new Home();
        $view->index();
}

