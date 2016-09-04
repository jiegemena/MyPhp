<?php
//require_once '';
class topClass extends Contorl{
    function index(){
        
        return $this->View('WidGet/login.html').Widget_Mothed('WidGet/top2.php', 'index');
    }
    
    function top(){
        return "<p>top top</p>";
    }
}
