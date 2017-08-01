<?php
/* Smarty version 3.1.30, created on 2017-08-01 20:35:38
  from "D:\php\wamp\www\BaiJiaHao\application\views\admin\uManage.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5980759a1f8495_47352213',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56813c4983187580e4bf43387348632ccc316e70' => 
    array (
      0 => 'D:\\php\\wamp\\www\\BaiJiaHao\\application\\views\\admin\\uManage.html',
      1 => 1501590933,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5980759a1f8495_47352213 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>uManage</title>
    </head>
    <body>
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
                                <th>用户类别</th>
                                <th>上次登录</th>
                                <th>登录次数</th>
                                <th>登录IP</th>
                                <th>状态</th>
                                <th>操作</th>
                                <th>
                                    <label for="allNav">全选 </label>
                                    <input type="checkbox" id="allNav">
                                </th>
                            </tr>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['navData']->value, 'value', false, 'key');
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
                                    <a href="?c=nav&action=update&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">修改</a>
                                    <a href="?c=nav&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
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
 type="text/javascript">
                                //                                on：对将来有脚本生成的元素的js有效果
                                $(document).on('click','#allNav',function () {
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
        <?php }?>
    </body>
</html><?php }
}
