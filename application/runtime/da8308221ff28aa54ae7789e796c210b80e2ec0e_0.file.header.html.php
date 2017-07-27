<?php
/* Smarty version 3.1.30, created on 2017-07-27 16:15:33
  from "D:\php\wamp\www\php\BaiJiaHao\application\views\home\header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5979a1257a99d1_06320046',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da8308221ff28aa54ae7789e796c210b80e2ec0e' => 
    array (
      0 => 'D:\\php\\wamp\\www\\php\\BaiJiaHao\\application\\views\\home\\header.html',
      1 => 1501143330,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5979a1257a99d1_06320046 (Smarty_Internal_Template $_smarty_tpl) {
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
                                <a href="index.php?type=<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
&content=<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a>
                            </li>
                        <?php } else { ?>
                            <li class="<?php echo $_smarty_tpl->tpl_vars['array']->value[$_smarty_tpl->tpl_vars['k']->value];?>
">
                                <a href="index.php?p=page&type=<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
&content=<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
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
                    <li>
                        <a href="javascript:;" id="btn">登录</a>
                    </li>
                    <li>
                        <a href="javascript:;">百度首页</a>
                    </li>
                </ul>

            </div>
        </nav>
    </body>
</html><?php }
}
