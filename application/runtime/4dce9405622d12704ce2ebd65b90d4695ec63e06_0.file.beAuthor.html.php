<?php
/* Smarty version 3.1.30, created on 2017-08-03 00:23:14
  from "D:\wamp\www\BaiJiaHao\application\views\home\beAuthor.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5981fc72ee04a5_95110938',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4dce9405622d12704ce2ebd65b90d4695ec63e06' => 
    array (
      0 => 'D:\\wamp\\www\\BaiJiaHao\\application\\views\\home\\beAuthor.html',
      1 => 1501690991,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5981fc72ee04a5_95110938 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>申请成为作者</title>

    <!-- 首页自定义样式 -->
    <link rel="stylesheet" href="public/css/register.css" type="text/css" />
</head>
<body>

<!-- 顶部 -->
<nav>
    <div class="container">
        <div>
            <img src="public/imgs/logos/ibd-logo2.png" />
        </div>
        <p style="color: #ff0000;">放弃&nbsp;&nbsp;<a href="?c=index">返回首页</a></p>
        <img src="public/imgs/icons/reg_hr.png" class="nav-hr" />
    </div>
</nav>


<!-- 注册表单 -->
<div class="container">
    <form class="register-form" action="?c=user&action=register" method="post" style="margin-left: 350px;">
        <label>身份证</label>
        <input value="" name="verNum" id="verNum" type="text" placeholder="  请填写正确的身份证号" />
        <div id="info1"></div>

        <input type="checkbox" checked="checked" id="read"/><p>阅读并接受<a href="javascript:;">《百度用户协议》</a></p>
        <input type="submit" value="确认申请" id="submit" class="btn btn-primary" name="send" />
    </form>

    <?php echo '<script'; ?>
>
        //  点击刷新验证码
        document.getElementById('codes').onclick=function () {
            this.src='application/configs/captcha.php?num='+Math.random();
        };
    <?php echo '</script'; ?>
>


    <div class="footer-text">
        <p>2017@</p>
    </div>
</div>

<!-- 自定义操作 -->
<?php echo '<script'; ?>
 src="public/js/operation.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
