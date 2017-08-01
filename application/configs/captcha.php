<?php


session_start();

include '../includes/Captchas.class.php';

$c = new Captchas(['level'=>5]);
$c->showImage();

$_SESSION['code'] = $c->getCaptcha();



?>