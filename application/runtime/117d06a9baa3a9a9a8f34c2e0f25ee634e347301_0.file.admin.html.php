<?php
/* Smarty version 3.1.30, created on 2017-07-26 10:20:07
  from "D:\php\wamp\www\php\BaiJiaHao\application\views\admin\admin.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5977fc5798e077_01965724',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '117d06a9baa3a9a9a8f34c2e0f25ee634e347301' => 
    array (
      0 => 'D:\\php\\wamp\\www\\php\\BaiJiaHao\\application\\views\\admin\\admin.html',
      1 => 1501035370,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/footer.html' => 1,
  ),
),false)) {
function content_5977fc5798e077_01965724 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台首页</title>
    <link rel="stylesheet" href="public/css/admin/admin.css">
    <link rel="shortcut icon" href="public/imgs/logos/favicon.png"/>
</head>
<body>
<div class="container-fluid admin">
    <div class="row top">
        <div class="col-md-2 text-center">
            <span class="glyphicon glyphicon-th-list" id="list" title="隐藏菜单栏"></span>
        </div>
        <div class="col-md-2 text-center">
            <img src="public/imgs/logos/logo.png" title="400*114" height="50" id="logo">
        </div>
        <div class="col-md-8 text-center topRight">
            <a href="?c=admin">后台首页</a>
            <a href="?c=index" target="_blank">商城首页</a>
        </div>
    </div>
    <div class="row middle">
        <div class="col-md-2 middleLeft" style=" width: 16.6%;">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <!--导航-->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                               aria-expanded="false" aria-controls="collapseOne">
                                导航设置
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                         aria-labelledby="headingOne">
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li><a href="?c=nav&action=show" target="main">管理导航</a></li>
                                <li><a href="?c=nav&action=add" target="main">添加导航</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10 middleRight">
            <iframe name="main" src="?a=admin&m=welcome"></iframe>
        </div>
    </div>
    <div class="row bottom">
        <?php $_smarty_tpl->_subTemplateRender("file:home/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    </div>

</div>
</body>
</html><?php }
}
