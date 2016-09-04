<?php
//require_once '';
class topClass extends Contorl{
    function index(){
        
        return $this->View('login.html');
    }
    
    function top(){
        return "<p>top top</p>";
    }
}
