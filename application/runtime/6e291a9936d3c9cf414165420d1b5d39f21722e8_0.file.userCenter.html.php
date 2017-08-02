<?php
/* Smarty version 3.1.30, created on 2017-08-02 19:30:37
  from "D:\php\wamp\www\BaiJia\application\views\home\userCenter.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5981b7dd655fc5_87159257',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e291a9936d3c9cf414165420d1b5d39f21722e8' => 
    array (
      0 => 'D:\\php\\wamp\\www\\BaiJia\\application\\views\\home\\userCenter.html',
      1 => 1501653062,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5981b7dd655fc5_87159257 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>用户中心</title>
    </head>
    <body style="background: rgb(242, 242, 242);">
        <nav class="navbar navbar-default" style="background: #FFFFFF">
            <div class="container">

                <div class="navbar-header">
                    <a href="index.php?c=index&m=userCenter" class="navbar-brand">
                        <img src="public/imgs/logos/ibd-logo2.png" />
                    </a>
                </div>

                <ul class="nav nav-pills" style="float: right;">
                    <li>
                        <a href="?c=index">百度首页</a>
                    </li>
                    <li>
                        <a href="?m=main" class="dropdown-toggle" data-toggle="dropdown">消息</a>
                        <div class="dropdown-menu" role="menu" style="width: 300px; height: 200px;">
                            <p style="margin: 15px 0 0 10px;">消息</p>
                            <hr>
                        </div>
                    </li>
                    <li>
                        <a href="?m=main" class="dropdown-toggle" data-toggle="dropdown">设置</a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#">账号设置</a>
                            </li>
                            <li>
                                <a href="#">详细设置</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user'][0]['user'];?>
</a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="?c=index&m=userCenter">个人中心</a>
                            </li>
                            <li>
                                <a href="?c=user&action=userlogout">退出</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>
        <section>
            <div class="container" style="background: #FFFFFF; border: 1px solid #dfdfdf;">
                <h3><?php echo $_SESSION['user'][0]['user'];?>
</h3>
            </div>
        </section>
    </body>
</html><?php }
}
