<?php
require_once 'Myphp/Control.php';
class Test extends Contorl{
    public function  index(){
            $this->display("home.html");
    }
}