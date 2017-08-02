<?php
/* Smarty version 3.1.30, created on 2017-08-02 16:02:46
  from "D:\php\wamp\www\BaiJia\application\views\admin\article.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59818726094122_54388357',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff5d774f483936564f34b5655fac7831e208513b' => 
    array (
      0 => 'D:\\php\\wamp\\www\\BaiJia\\application\\views\\admin\\article.html',
      1 => 1501660962,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59818726094122_54388357 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\php\\wamp\\www\\BaiJia\\libs\\smarty-3.1.30\\libs\\plugins\\modifier.truncate.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>article</title>

    </head>
    <body style="overflow-x: hidden;">

        <?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
        <div class="row" style="display: inline-block; margin-bottom: 30px;">
            <div class="col-md-12">
                <ol class="breadcrumb" style="background: #FFFFFF; border-bottom: 1px solid #dfdfdf; border-radius: 0;">
                    <li><a href="?c=admin">后台首页</a></li>
                    <li><a href="?c=ad&action=show">文章管理</a></li>
                    <li class="active">所有文章</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <table class="table table-bordered" style="width: 90%; margin: auto;">
                        <tr>
                            <th>文章标题</th>
                            <th>文章类型</th>
                            <th>文章作者</th>
                            <th>文章来源</th>
                            <th>文章内容</th>
                            <th>文章配图</th>
                            <th>创作时间</th>
                            <th>状态</th>
                            <th>操作</th>
                            <th>
                                <label for="allAd">全选 </label>
                                <input type="checkbox" id="allAd">
                            </th>
                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['artData']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
                        <tr>
                            <td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value['title'],6);?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['adType']->value[$_smarty_tpl->tpl_vars['key']->value];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['artAuthorName']->value[$_smarty_tpl->tpl_vars['key']->value];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['source'];?>
</td>
                            <td><?php echo smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['value']->value['content']),10);?>
</td>
                            <td>
                                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < count($_smarty_tpl->tpl_vars['artPic']->value[$_smarty_tpl->tpl_vars['key']->value])) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < count($_smarty_tpl->tpl_vars['artPic']->value[$_smarty_tpl->tpl_vars['key']->value]); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                <img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['artPic']->value[$_smarty_tpl->tpl_vars['key']->value][$_smarty_tpl->tpl_vars['i']->value];?>
" style="width: 50px;">
                                <?php }
}
?>

                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['date'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['state'];?>
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
                            <td colspan="9">
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
