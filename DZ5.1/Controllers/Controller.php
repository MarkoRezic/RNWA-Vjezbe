<?php

class Controller extends Database {

    public static function CreateView($viewName, $data = null){
        require_once "./Views/".$viewName.".php";
//        run functions from here
//        static::doSomething();
    }
}