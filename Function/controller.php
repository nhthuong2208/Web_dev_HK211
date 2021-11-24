<?php
class Controller{

    public function model($model){
        require_once "./Model/". $model .".php";
        return new $model;
    }

    public function view($view, $data=[]){
        require_once "./Views/". $view . "/index.php";
    }
}
?>