<?php
/* Smarty version 3.1.30, created on 2017-08-03 17:40:21
  from "D:\php\wamp\www\BaiJia\application\views\home\beAuthor.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5982ef850773c5_98798990',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ab3fd55ad8bd90a81d19d86d8c47c120906edce' => 
    array (
      0 => 'D:\\php\\wamp\\www\\BaiJia\\application\\views\\home\\beAuthor.html',
      1 => 1501753218,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5982ef850773c5_98798990 (Smarty_Internal_Template $_smarty_tpl) {
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
    <form class="register-form" action="?c=user&action=beAuthor" method="post" style="margin-left: 350px;">
        <label>实名认证</label>
        <input value="" name="verNum" id="verNum" type="text" placeholder="  请填写正确的身份证号" />
        <div id="info1" style="color: #ff0000;"></div>

        <input type="checkbox" checked="checked" id="read"/><p>阅读并接受<a href="javascript:;">《百度用户协议》</a></p>
        <input type="submit" value="确认申请" id="submit" class="btn btn-primary disabled" name="send" />
    </form>

    <?php echo '<script'; ?>
>
        $("#verNum").blur(function () {
            if ( /^[0-9]*$/.test($(this).val()) && ($(this).val().length==15 || $(this).val().length==18) ){
                $("#info1").html("身份验证通过");
                $("#submit").removeClass('disabled');
            } else {
                $("#info1").html("身份验证未通过");
            }
        });

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
