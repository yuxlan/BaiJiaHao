<?php
/* Smarty version 3.1.30, created on 2017-08-03 20:04:12
  from "D:\php\wamp\www\BaiJia\application\views\admin\message.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5983113cef12b9_80635885',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f9b30a1457a4c50499d7ddca24c59d99689d66ac' => 
    array (
      0 => 'D:\\php\\wamp\\www\\BaiJia\\application\\views\\admin\\message.html',
      1 => 1501761850,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5983113cef12b9_80635885 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>消息</title>
</head>
<body style="overflow-x: hidden;">
<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
<div class="row" style="display: inline-block; margin-bottom: 30px;">
    <div class="col-md-12">
        <ol class="breadcrumb" style="background: #FFFFFF; border-bottom: 1px solid #dfdfdf; border-radius: 0;">
            <li><a href="?c=admin">后台首页</a></li>
            <li><a href="?c=message&action=show">系统消息管理</a></li>
            <li class="active">所有系统消息</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <form action="" method="post">
            <table class="table table-bordered" style="width: 90%; margin: auto;">
                <tr>
                    <th>系统消息</th>
                    <th>操作</th>
                    <th>
                        <label for="allAd">全选 </label>
                        <input type="checkbox" id="allAd">
                    </th>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allMessage']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value[0];?>
</td>
                    <td>
                        <a href="?c=article&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
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
                    $(document).on('click','#allAd',function () {
                        $(".choose").prop("checked",$(this).prop("checked"));
                    });
                <?php echo '</script'; ?>
>
                <tr>
                    <td colspan="2">
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

<?php if ($_smarty_tpl->tpl_vars['send']->value) {?>
<div class="row" style="display: inline-block; margin-bottom: 30px;">
    <div class="col-md-12">
        <ol class="breadcrumb" style="background: #FFFFFF; border-bottom: 1px solid #dfdfdf; border-radius: 0;">
            <li><a href="?c=admin">后台首页</a></li>
            <li><a href="?c=message&action=show">系统消息管理</a></li>
            <li class="active">所有系统消息</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-10">
    <form class="register-form" action="?c=message&action=send" method="post">
        <table class="table table-bordered" style=" margin: auto;">
            <tr>
                <td class="text-center">消息内容</td>
                <td><textarea value="" name="message" id="message" type="text" class="form-control" style="height: 200px;"></textarea></td>
            </tr>
            <tr><td><br></td></tr>
            <tr>
                <td colspan="2" class="text-center">
                    <input type="submit" value="发送" name="send" class="btn btn-success">
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
