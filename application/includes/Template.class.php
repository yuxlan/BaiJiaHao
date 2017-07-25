<?php

class Template extends Smarty {
    private static $instance;

//    单例模式  实例化自身  self
    public static function getInstance(){
        if (!self::$instance instanceof self){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct(){
        parent::__construct();
        $this->setConfig();
    }

    private function setConfig(){
//        设置模板目录
        $this->template_dir = ROOT_PATH.'application/views';
//        设置编译目录
        $this->compile_dir = ROOT_PATH.'application/runtime';
    }
}















?>