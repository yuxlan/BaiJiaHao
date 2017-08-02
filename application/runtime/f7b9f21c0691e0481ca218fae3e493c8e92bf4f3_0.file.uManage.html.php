<?php
/* Smarty version 3.1.30, created on 2017-08-02 19:35:14
  from "D:\php\wamp\www\BaiJia\application\views\admin\uManage.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5981b8f25ff6e2_53445240',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7b9f21c0691e0481ca218fae3e493c8e92bf4f3' => 
    array (
      0 => 'D:\\php\\wamp\\www\\BaiJia\\application\\views\\admin\\uManage.html',
      1 => 1501673708,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5981b8f25ff6e2_53445240 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>uManage</title>
    </head>
    <body style="overflow-x: hidden;">
        <?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
            <div class="row" style="display: inline-block; margin-bottom: 30px;">
                <div class="col-md-12">
                    <ol class="breadcrumb" style="background: #FFFFFF; border-bottom: 1px solid #dfdfdf; border-radius: 0;">
                        <li><a href="?c=admin">后台首页</a></li>
                        <li><a href="?c=nav&action=show">用户管理</a></li>
                        <li class="active">所有用户</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post">
                        <table class="table table-bordered" style="width: 90%; margin: auto;">
                            <tr>
                                <th>用户名</th>
                                <th>用户权限</th>
                                <th>上次登录</th>
                                <th>登录次数</th>
                                <th>登录IP</th>
                                <th>状态</th>
                                <th>操作</th>
                                <th>
                                    <label for="allUser">全选 </label>
                                    <input type="checkbox" id="allUser">
                                </th>
                            </tr>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['userData']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['value']->value['user'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['value']->value['level_id'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['value']->value['last_time'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['value']->value['login_num'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['value']->value['last_ip'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['value']->value['state'];?>
</td>
                                <td>
                                    <a onclick="item.editItem(this)" style="cursor: pointer">修改</a>
                                    <a href="?c=uManage&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">删除</a>
                                </td>
                                <td>
                                    <label for="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="choose" name="checked[]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">
                                </td>
                            </tr>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                            <?php echo '<script'; ?>
 src="public/js/common.js"><?php echo '</script'; ?>
>
                            <?php echo '<script'; ?>
 type="text/javascript">
                                //                                on：对将来有脚本生成的元素的js有效果
                                $(document).on('click','#allUser',function () {
                                    $(".choose").prop("checked",$(this).prop("checked"));
                                });
                            <?php echo '</script'; ?>
>
                            <tr>
                                <td colspan="7">
                                    <?php echo $_smarty_tpl->tpl_vars['allPage']->value;?>

                                </td>
                                <td style="vertical-align: middle">
                                    <input type="submit" name="delete" value="删除" class="btn btn-danger">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        <!--<?php }?>-->
        <!--<?php if ($_smarty_tpl->tpl_vars['update']->value) {?>-->

        <!--<div class="row" style="display: inline-block; margin-bottom: 30px;">-->
            <!--<div class="col-md-12">-->
                <!--<ol class="breadcrumb" style="background: #FFFFFF; border-bottom: 1px solid #dfdfdf; border-radius: 0;">-->
                    <!--<li><a href="?c=admin">后台首页</a></li>-->
                    <!--<li><a href="?c=nav&action=show">用户管理</a></li>-->
                    <!--<li class="active">所有用户</li>-->
                <!--</ol>-->
            <!--</div>-->
        <!--</div>-->
        <!--<div class="row">-->
            <!--<div class="col-md-12">-->
                <!--<form action="" method="post" enctype="multipart/form-data">-->
                    <!--<table class="table table-bordered" style="width: 30%; margin: auto;">-->
                        <!--<tr>-->
                            <!--<td class="text-center" width="120">用户权限</td>-->
                            <!--<td><input type="text" class="form-control" name="levelId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['name'];?>
"></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                            <!--<td colspan="2" class="text-center">-->
                                <!--<input type="submit" value="提交" name="send" class="btn btn-success">-->
                            <!--</td>-->
                        <!--</tr>-->
                    <!--</table>-->
                <!--</form>-->
            <!--</div>-->
        <!--</div>-->
        <!--<?php }?>-->
    </body>
</html><?php }
}
