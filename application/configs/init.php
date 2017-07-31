<!-- title logo -->
<link rel="shortcut icon" href="public/imgs/logos/favicon.png" />

<!-- bootstrap -->
<link rel="stylesheet"  href="libs/bootstrap-3.3.7-dist/css/bootstrap.css" type="text/css"/>

<!-- fontaewsome -->
<link rel="stylesheet" href="libs/font-awesome-4.7.0/css/font-awesome.css" type="text/css" />


<script src="libs/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js" type="text/javascript"></script>

<!-- bootstrap -->
<script src="libs/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>

<?php

// 配置文件

// 错误级别
error_reporting(E_ALL^E_WARNING^E_NOTICE);

// 开启session
session_start();

// 设置字符集
header('Content-Type:text/html;charset=utf-8');

// 设置时区
date_default_timezone_set('PRC');

// 设置根目录，定义常量，存储根目录
define('ROOT_PATH',substr(__FILE__,0,-28));

// 自动加载类
spl_autoload_register('autoClass');
function autoClass($_className){
    if (substr($_className,-6)=='Action'){
        include_once ROOT_PATH.'application/controllers/'.$_className.'.class.php';
    } else if (substr($_className,-5)=='Model'){
        include_once ROOT_PATH.'application/models/'.$_className.'.class.php';
    } else{
        include_once ROOT_PATH.'application/includes/'.$_className.'.class.php';
    }
}

// 数据库配置
include ROOT_PATH.'application/configs/configDb.php';

// 引入smarty
include ROOT_PATH.'libs/smarty-3.1.30/libs/Smarty.class.php';

Factory::setAction()->run();

?>