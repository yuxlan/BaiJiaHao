<?php
/* Smarty version 3.1.30, created on 2017-08-01 09:10:49
  from "D:\php\wamp\www\BaiJiaHao\application\views\admin\user.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597fd519cc61e9_25037780',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '773056a4ccba739e50b602d8e910c25ed17401b7' => 
    array (
      0 => 'D:\\php\\wamp\\www\\BaiJiaHao\\application\\views\\admin\\user.html',
      1 => 1501237092,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597fd519cc61e9_25037780 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>user</title>

        <style>
            body{
                background: url("public/imgs/temps/background-1.jpeg") no-repeat;
            }

            .login{
                width: 300px;
                height: 320px;
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                border: 1px solid #dfdfdf;
            }

            .form-control,.input-group-addon{
                border-radius: 0;
            }
        </style>
    </head>
    <body>
        <div class="login">
            <div class="row">
                <div class="col-md-12 text-center">
                    <br>
                    <h4>后台登录</h4>
                    <hr>
                </div>
            </div><br>
            <form action="?c=user&action=login" method="post">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <div class="input-group">
                        <span class="input-group-addon" style="background: none; border: 1px solid #dfdfdf">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                                <input type="text" class="form-control" name="admin" style="background: none; border: 1px solid #dfdfdf">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                        <span class="input-group-addon" style="background: none; border: 1px solid #dfdfdf">
                            <i class="glyphicon glyphicon-lock"></i>
                        </span>
                                <input type="password" class="form-control" name="pwd" style="background: none; border: 1px solid #dfdfdf">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-control btn" style="background: none; border: 1px solid #dfdfdf" name="send">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html><?php }
}
