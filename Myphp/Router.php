<?php
//namespace Myphp;
//router����
/*
 * cΪ������
 * mΪ���������淽��*/
 
if(is_array($_GET)&&count($_GET)>0)//�ж��Ƿ���Get����
{
    // �п���������
    if(isset($_GET["c"])){
        $control = $_GET["c"];
        $url = "control/".$control.".php";
        if(file_exists($url)){
            include  $url;
            $view = new $control();
            //ѡ���ĸ�����
            if(isset($_GET["m"])){
                $method = $_GET["m"];
                    $view->$method();
            }else
            $view->index();
        }else{
            echo "file not found!";
        }
    }else{//û�п���������
       include 'control/Home.php';
        $view = new Home();
        $view->index();
    }
}else{
    include 'control/Home.php';
        $view = new Home();
        $view->index();
}

