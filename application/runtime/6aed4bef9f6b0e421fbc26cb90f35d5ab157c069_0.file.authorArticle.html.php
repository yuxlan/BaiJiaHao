<?php
/* Smarty version 3.1.30, created on 2017-08-03 17:46:36
  from "D:\php\wamp\www\BaiJia\application\views\home\authorArticle.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5982f0fcbdb370_64594884',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6aed4bef9f6b0e421fbc26cb90f35d5ab157c069' => 
    array (
      0 => 'D:\\php\\wamp\\www\\BaiJia\\application\\views\\home\\authorArticle.html',
      1 => 1501731641,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5982f0fcbdb370_64594884 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\php\\wamp\\www\\BaiJia\\libs\\smarty-3.1.30\\libs\\plugins\\modifier.truncate.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>作者文章</title>

        <link rel="stylesheet" href="public/css/style.css" type="text/css" />
    </head>
    <body>
    <nav class="navbar" style="border-bottom: 1px solid #dfdfdf; height: 70px; background: #FFFFFF;">
        <div class="container">

            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">
                    <img src="public/imgs/logos/baidu.gif" class="navbar-logo" />
                </a>
            </div>

            <ul class="nav nav-pills" style="float: right;">
                <li>
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['admin'][0]['user'];
echo $_SESSION['user'][0]['user'];?>
<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="?c=userCenter&action=show">个人中心</a>
                        </li>
                        <li>
                            <a href="?c=user&action=userlogout">退出</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="?c=index">百度首页</a>
                </li>
            </ul>

        </div>
    </nav>

    <div class="container">
    <ul class="media-side media-list">
        <li class="media" style="padding: 20px;background: #fbfbfb;border-bottom: 1px solid #F2F2F2;">
            <div class="media-body">
                <div class="row">
                    <div class="col-lg-1 col-md-1">
                        <img src="public/uploads/author/<?php echo $_smarty_tpl->tpl_vars['artAuthorPicView']->value[0];?>
" style="width: 100px; height: 100px;">
                    </div>
                    <div class="col-lg-1 col-md-1">
                    </div>
                    <div class="col-lg-10 col-md-10">
                        <table style="width: 100%; font-size: 14px;">
                            <tr><br></tr>
                            <tr>
                                <a href="?c=index&m=authorArticle&id=<?php echo $_smarty_tpl->tpl_vars['artAuthorIdView']->value[0];?>
" style="font-size: 16px;color: #000000;"><?php echo $_smarty_tpl->tpl_vars['artAuthorNameView']->value[0];?>
</a>
                            </tr>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['artAuthorLeadView']->value[0];?>
</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </li>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['authorArticle']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
        <li class="media-side-ul-li media">
            <div class="media-body">
                <p><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</p>
                <h4 class="media-heading">
                    <a href="?c=index&p=one&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&nid=<?php echo $_smarty_tpl->tpl_vars['v']->value['nid'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['title'],11,'……');?>
</a>
                </h4>
            </div>
        </li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </ul>
    </div>
    </body>
</html><?php }
}
