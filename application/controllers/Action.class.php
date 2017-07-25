<?php

// 所有控制器的父类
class Action{
    protected $smarty = null;
    protected $model = null;

    public function __construct(){
        $this->smarty = Template::getInstance();
        $this->model = Factory::setModel();
    }

    public function run(){
        $method = (!empty($_GET['m']))?$_GET['m']:'main';
        method_exists($this,$method)?eval('$this->'.$method.'();'):$this->main();
    }
}












?>