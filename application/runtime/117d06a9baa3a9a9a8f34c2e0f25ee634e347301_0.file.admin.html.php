<?php
/* Smarty version 3.1.30, created on 2017-07-28 17:43:48
  from "D:\php\wamp\www\php\BaiJiaHao\application\views\admin\admin.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597b0754abda37_93077212',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '117d06a9baa3a9a9a8f34c2e0f25ee634e347301' => 
    array (
      0 => 'D:\\php\\wamp\\www\\php\\BaiJiaHao\\application\\views\\admin\\admin.html',
      1 => 1501234617,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597b0754abda37_93077212 (Smarty_Internal_Template $_smarty_tpl) {
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
            <img src="public/imgs/logos/baidu.gif" title="400*114" id="logo">
        </div>
        <div class="col-md-1">
            <span class="fa fa-navicon" id="list" style="color: #9d9d9d; font-size: 16px; float: right; margin-top: 21.5px" title="隐藏菜单栏"></span>
        </div>
        <div class="col-md-9 topRight">
            <a href="?c=admin">后台首页</a>
            <a href="?c=index" target="_blank">百家首页</a>
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    用户名：<?php echo $_SESSION['admin'][0]['user'];?>

                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="?c=user&action=logout">注销账户</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">登陆次数:<?php echo $_SESSION['admin'][0]['login_num'];?>
</a>
                    </li>
                    <li>
                        <a href="#">上次登陆时间:<?php echo $_SESSION['admin'][0]['last_time'];?>
</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row middle">
        <div class="col-md-2 middleLeft" style=" width: 16.6%;">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <!--导航-->
                <div class="panel">
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
                <!--广告-->
                <div class="panel">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                               aria-expanded="false" aria-controls="collapseTwo">
                                广告设置
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li><a href="?c=ad&action=show" target="main">管理广告</a></li>
                                <li><a href="?c=ad&action=add" target="main">添加广告</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--文章-->
                <div class="panel">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                               aria-expanded="false" aria-controls="collapseThree">
                                文章设置
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="headingThree">
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li><a href="?c=article&action=show" target="main">管理文章</a></li>
                                <li><a href="?c=article&action=add" target="main">添加文章</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10 middleRight">
            <iframe name="main" src="?c=admin&m=welcome" frameborder="0">
            </iframe>
        </div>
    </div>

</div>
</body>
</html><?php }
}
