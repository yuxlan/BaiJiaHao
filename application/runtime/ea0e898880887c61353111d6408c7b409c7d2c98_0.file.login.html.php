<?php
/* Smarty version 3.1.30, created on 2017-08-02 19:54:24
  from "D:\php\wamp\www\BaiJia\application\views\home\login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5981bd706e1215_11756558',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea0e898880887c61353111d6408c7b409c7d2c98' => 
    array (
      0 => 'D:\\php\\wamp\\www\\BaiJia\\application\\views\\home\\login.html',
      1 => 1501674861,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5981bd706e1215_11756558 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>

    <link rel="stylesheet" href="public/css/login.css" type="text/css" />
</head>
<body>

<div class="modal fade" id="myModal">
    <!--<div id="myModal">-->
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h4>登录</h4>
            </div>
            <div class="zhanghao-login">
                <div class="modal-body">
                    <a href="javascript:;" class="modal-body-login-quikly"><img src="public/imgs/icons/phone.png" class="modal-logo-phone">&nbsp; 短信快捷登录</a>
                    <form action="?c=user&action=userlogin" method="post" id="">
                        <input name="username" type="text" class="form-control form-control-user"  value="" placeholder=" 手机/邮箱/用户名" id="username" />
                        <input name="pwd" type="password" class="form-control form-control-pwd" value="" placeholder=" 密码" id="pwd" />
                        <input type="checkbox" checked="checked" id="checked" />下次自动登录
                        <a href="javascript:;" class="modal-body-a">登录遇到问题</a>
                        <input name="send" type="submit" class="form-control-button btn btn-primary" id="send" value="登录" />
                        <a href="?c=user&action=register" class="modal-body-a" target="_blank">立即注册</a>
                    </form>
                </div>
                <div class="modal-footer">
                    <p>可以使用以下方式登录</p>
                    <img src="public/imgs/icons/weibo-login.png" class="modal-logo-weibo" />
                    <img src="public/imgs/icons/qq-login.png" class="modal-logo-qq" />
                </div>
                <a class="modal-logo-erweima" href="javascript:;">
                    <img src="public/imgs/icons/pass_login_icons_erweima.png">
                </a>
            </div>

            <div class="erweima-login">
                <div class="modal-body">
                    <h1 class="erweima-login-h1"><strong>请使用<a>手机百度APP扫码</a>登录</strong></h1>
                    <img src="public/imgs/icons/qrcode.png" class="erweima-login-img">
                    <p class="erweima-login-p">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;百度技术加密，保障您的隐私安全</p>
                </div>
                <a class="modal-logo-zhanghao" href="javascript:;">
                    <img src="public/imgs/icons/pass_login_icons_zhanghao.png">
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html><?php }
}
