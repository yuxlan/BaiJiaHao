<?php

//  验证码匹配


session_start();

//echo $_SESSION['code'];
//strtolower(); 小写转换
//strtoupper(); 大写转换

if (strtolower($_POST['code']) == strtolower($_SESSION['code'])) {
    echo 'ok';
} else {
    echo 'no';
}



?>
