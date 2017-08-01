<?php
/* Smarty version 3.1.30, created on 2017-08-01 17:22:50
  from "D:\php\wamp\www\BaiJiaHao\application\views\home\header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5980486a63f752_19953486',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4534d6b528dee303b93276ca9e70e326f3869c0' => 
    array (
      0 => 'D:\\php\\wamp\\www\\BaiJiaHao\\application\\views\\home\\header.html',
      1 => 1501579367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5980486a63f752_19953486 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>header</title>

        <link rel="stylesheet" href="public/css/header.css">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">

                <div class="navbar-header">
                    <a href="application/views/home/index.html" class="navbar-brand">
                        <img src="public/imgs/logos/logo.png" class="navbar-logo" />
                    </a>
                </div>

                <ul class="nav nav-pills">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['navData']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                        <?php if ($_smarty_tpl->tpl_vars['k']->value == 0) {?>
                            <li class="<?php echo $_smarty_tpl->tpl_vars['array']->value[$_smarty_tpl->tpl_vars['k']->value];?>
">
                                <a href="index.php?nid=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a>
                            </li>
                        <?php } else { ?>
                            <li class="<?php echo $_smarty_tpl->tpl_vars['array']->value[$_smarty_tpl->tpl_vars['k']->value];?>
">
                                <a href="index.php?p=page&nid=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a>
                            </li>
                        <?php }?>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </ul>

                <ul class="nav nav-tabs">
                    <li>
                        <a href="?m=main">成为百家号作者</a>
                    </li>
                    <?php if (empty($_SESSION['user'][0]['user'])) {?>
                    <li>
                        <a href="javascript:;" id="btn">登录</a>
                    </li>
                    <?php } else { ?>
                    <li>
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user'][0]['user'];?>
<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#">个人中心</a>
                            </li>
                            <li>
                                <a href="?c=user&action=userlogout">退出</a>
                            </li>
                        </ul>
                    </li>
                    <?php }?>
                    <li>
                        <a href="?c=index">百度首页</a>
                    </li>
                </ul>

            </div>
        </nav>
    </body>
</html><?php }
}
