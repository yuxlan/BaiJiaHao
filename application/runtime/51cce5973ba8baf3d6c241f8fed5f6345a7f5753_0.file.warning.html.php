<?php
/* Smarty version 3.1.30, created on 2017-08-03 10:42:26
  from "D:\php\wamp\www\BaiJia\application\views\admin\warning.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59828d92adabb4_96041221',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51cce5973ba8baf3d6c241f8fed5f6345a7f5753' => 
    array (
      0 => 'D:\\php\\wamp\\www\\BaiJia\\application\\views\\admin\\warning.html',
      1 => 1501691896,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59828d92adabb4_96041221 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>警告</title>
</head>
<body>


<div class="alert alert-warning">没有管理员权限</div>

    <div class="container" style="width: 100%">
        <ul class="nav nav-pills" style="width:30%; margin: auto;">
            <li>
                <a style="color: #000000">请选择</a>
            </li>
            <li>
                <a href="?c=user&action=login" >管理员账号登录</a>
            </li>
            <li>
                <a style="color: #000000">或者</a>
            </li>
            <li>
                <a href="?c=index">返回百家号首页</a>
            </li>
        </ul>
    </div>

</body>
</html><?php }
}
