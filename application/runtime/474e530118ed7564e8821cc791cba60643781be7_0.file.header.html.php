<?php
/* Smarty version 3.1.30, created on 2017-08-03 00:15:02
  from "D:\wamp\www\BaiJiaHao\application\views\home\header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5981fa86e45f30_51484519',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '474e530118ed7564e8821cc791cba60643781be7' => 
    array (
      0 => 'D:\\wamp\\www\\BaiJiaHao\\application\\views\\home\\header.html',
      1 => 1501690498,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5981fa86e45f30_51484519 (Smarty_Internal_Template $_smarty_tpl) {
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
                    <a href="index.php" class="navbar-brand">
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
                    <?php if (empty($_SESSION['admin'][0]['user']) && empty($_SESSION['user'][0]['user'])) {?>
                        <li>
                            <a href="?m=main">成为百家号作者</a>
                        </li>
                    <?php } else { ?>
                        <?php if ($_SESSION['user'][0]['level_id'] == 1) {?>
                            <li>
                                <a href="?c=index&m=beAuthor">成为百家号作者</a>
                            </li>
                        <?php } elseif ($_SESSION['user'][0]['level_id'] == 2) {?>
                        <li>
                            <a href="?c=index&m=addArticle">写文章</a>
                        </li>
                        <?php } else { ?>
                        <li>
                            <a href="?c=admin">后台首页</a>
                        </li>
                        <?php }?>
                    <?php }?>

                    <?php if (empty($_SESSION['admin'][0]['user']) && empty($_SESSION['user'][0]['user'])) {?>
                    <li>
                        <a href="javascript:;" id="btn">登录</a>
                    </li>
                    <?php } else { ?>
                    <li>
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user'][0]['user'];
echo $_SESSION['admin'][0]['user'];?>
<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="?c=index&m=userCenter">个人中心</a>
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
