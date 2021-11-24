<?php
class App{
//Home/Show/1/2
    protected $controller="Home"; //""
    protected $action="Home_page";
    protected $user = "customer";
    protected $params=[];

    function __construct(){
 
        $arr = $this->UrlProcess();
        // Controller
        if(!empty($arr) && file_exists("./Controller/" . $arr[0].".php")){
            $this->controller = $arr[0];
            unset($arr[0]);
        }
        require_once ("./Controller/"). $this->controller .".php";
        $this->controller = new $this->controller;

        // Action
        if(isset($arr[1])){
            if( method_exists( $this->controller , $arr[1]) ){
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        // Params
        $this->params = [];
        // Params
        array_push($this->params,$this->user);
        if(!empty($arr)) array_push($this->params,$arr);
        call_user_func_array([$this->controller, $this->action], $this->params);

    }
        // Home/function/parametors
    function UrlProcess(){
        if( isset($_GET["url"]) ){
            //echo $_GET["url"];
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }

}
?>