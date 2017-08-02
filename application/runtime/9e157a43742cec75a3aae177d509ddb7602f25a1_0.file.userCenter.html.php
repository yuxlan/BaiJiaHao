<?php
/* Smarty version 3.1.30, created on 2017-08-03 00:58:18
  from "D:\wamp\www\BaiJiaHao\application\views\home\userCenter.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_598204aa6d0ed2_43984524',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e157a43742cec75a3aae177d509ddb7602f25a1' => 
    array (
      0 => 'D:\\wamp\\www\\BaiJiaHao\\application\\views\\home\\userCenter.html',
      1 => 1501693090,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598204aa6d0ed2_43984524 (Smarty_Internal_Template $_smarty_tpl) {
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
            <div class="container" style="background: #FFFFFF; border: 1px solid #dfdfdf; padding: 20px;">
                <div class="row">
                    <div class="col-lg-1 col-md-1">
                        <img src="public/uploads/author/<?php echo $_SESSION['user'][0]['pic'];?>
" style="width: 100px; height: 100px;">
                        <a href="?c=index&m=authorArticle" style="font-size: 16px; display: block;color: #000000; text-align: center;width: 100px;margin-top: 10px;"><?php echo $_SESSION['user'][0]['user'];?>
</a>
                    </div>
                    <div class="col-lg-1 col-md-1">
                    </div>
                    <div class="col-lg-10 col-md-10">
                        <table style="width: 100%; margin-top: 40px; font-size: 14px;">
                            <tr>
                                <td><strong>导语：</strong><?php echo $_SESSION['user'][0]['lead'];?>
</td>
                                <td><strong>年龄：</strong><?php echo $_SESSION['user'][0]['age'];?>
</td>
                                <td><strong>性别：</strong><?php echo $_SESSION['user'][0]['sex'];?>
</td>
                                <td><strong>工作：</strong><?php echo $_SESSION['user'][0]['work'];?>
</td>
                                <td><strong>手机号：</strong><?php echo $_SESSION['user'][0]['phonenum'];?>
</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="container" style="background: #FFFFFF; border: 1px solid #dfdfdf; padding: 20px;">
                <p><a style="font-size: 14px;color: #000000;"><strong>个人简介：</strong></a><?php echo $_SESSION['user'][0]['decs'];?>
</p>
            </div>
        </section>
    </body>
</html><?php }
}
