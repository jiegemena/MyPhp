<?php
//namespace Contorl;
//use Myphp;
//use Myphp\Contorl;
require_once 'Myphp/Control.php';
class Home extends Contorl{
    
    public function index(){
        if(isset($_GET["id"])){
             $id = $_GET["id"];
        }
        
        $name['id'] = 45;
        $name["pass"] = "jiege";
        
      //  $this->assign("name",widget_php("view/top.php", "index"));
      $i = 1;
      if(1 == $i){
          
          $this->assign("w1",Widget_Mothed("WidGet/top.php", "index"));
      }else{
         
      }
       $this->assign("w2",Widget_Mothed("WidGet/top.php", "top"));
      
       $this->assign("name1","eeeeee");
       $this->assign("name",$name);
      //  var_dump($this->getAssign()) ;
       $id = 1;
       
        
        $this->display("index.html");
    }
    
    public function login(){
        $this->display("login.html");
    }
}