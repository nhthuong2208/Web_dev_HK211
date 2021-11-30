<?php
class App{
//Home/Function/para/para
    protected $controller="Home";
    protected $action="Home_page";
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
        $this->params = [];
        // Params
        if(isset($_SESSION["user"]))array_push($this->params,$_SESSION["user"]); //member / manager
        else{ $_SESSION["user"] = "customer"; array_push($this->params, "customer");}
        if(!empty($arr)) array_push($this->params,$arr);
        call_user_func_array([$this->controller, $this->action], $this->params);

    }
    function UrlProcess(){
        if( isset($_GET["url"]) ){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
?>