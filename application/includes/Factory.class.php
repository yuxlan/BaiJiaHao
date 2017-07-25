<?php

//   工厂类

class Factory{
    public static $obj = null;

    public static function get(){
        if (!empty($_GET['c'])){
            return $_GET['c'];
        }
        return 'index';
    }

//    实例化 控制器类
    public static function setAction(){
        $a = self::get();
        if (file_exists(ROOT_PATH.'/application/controllers/'.$a.'Action.class.php')){
            eval('self::$obj = new '.$a.'Action();');
            return self::$obj;
        } else {
            exit($a.'Action控制器不存在');
        }
    }

//    实例化 模型类
    public static function setModel(){
        $a = self::get();
        if (file_exists(ROOT_PATH.'/application/models/'.$a.'Model.class.php')){
            eval('self::$obj = new '.$a.'Model();');
            return self::$obj;
        } else {
            exit($a.'Model控制器不存在');
        }
    }

}