<?php
/* Smarty version 3.1.30, created on 2017-08-02 16:08:21
  from "D:\php\wamp\www\BaiJia\application\views\admin\nav.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5981887556b0d5_22784315',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b250adf7fcfdf28961697d0c0e5eb70ff76e23a7' => 
    array (
      0 => 'D:\\php\\wamp\\www\\BaiJia\\application\\views\\admin\\nav.html',
      1 => 1501655738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5981887556b0d5_22784315 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>nav</title>
    </head>
    <body style="overflow-x: hidden;">

    <!-- 显示管理 -->
        <?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
            <div class="row" style="display: inline-block; margin-bottom: 30px;">
                <div class="col-md-12">
                    <ol class="breadcrumb" style="background: #FFFFFF; border-bottom: 1px solid #dfdfdf; border-radius: 0;">
                        <li><a href="?c=admin">后台首页</a></li>
                        <li><a href="?c=nav&action=show">导航管理</a></li>
                        <li class="active">所有导航</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post">
                        <table class="table table-bordered" style="width: 90%; margin: auto;">
                            <tr>
                                <th>导航名</th>
                                <th>描述</th>
                                <th>状态</th>
                                <th>操作</th>
                                <th>排序</th>
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
                                <td><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['value']->value['decs'];?>
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
                                    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['sort'];?>
" name="sorts[<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
]" class="form-control text-center" style="width: 50px">
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
                                <td colspan="4">
                                    <?php echo $_smarty_tpl->tpl_vars['allPage']->value;?>

                                </td>
                                <td style="vertical-align: middle">
                                    <input type="submit" name="sort" value="排序" class="btn btn-primary">
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

    <!-- 添加导航 -->
        <?php if ($_smarty_tpl->tpl_vars['add']->value) {?>
            <div class="row" style="display: inline-block; margin-bottom: 30px;">
                <div class="col-md-12">
                    <ol class="breadcrumb" style="background: #FFFFFF; border-bottom: 1px solid #dfdfdf; border-radius: 0;">
                        <li><a href="?c=admin">后台首页</a></li>
                        <li><a href="?c=nav&action=show">导航管理</a></li>
                        <li class="active">添加导航</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="table table-bordered" style="width: 90%; margin: auto;">
                            <tr>
                                <td class="text-center" width="120">导航名称</td>
                                <td><input type="text" class="form-control" name="navName"></td>
                            </tr>
                            <tr>
                                <td class="text-center" width="120">导航描述</td>
                                <td><input type="text" class="form-control" name="navDecs"></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <input type="submit" value="提交" name="send" class="btn btn-success">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        <?php }?>

    <!-- 更新导航 -->
        <?php if ($_smarty_tpl->tpl_vars['update']->value) {?>
            <div class="row" style="display: inline-block; margin-bottom: 30px;">
                    <div class="col-md-12">
                        <ol class="breadcrumb" style="background: #FFFFFF; border-bottom: 1px solid #dfdfdf; border-radius: 0;">
                            <li><a href="?c=admin">后台首页</a></li>
                            <li><a href="?c=nav&action=show">导航管理</a></li>
                            <li class="active">修改导航</li>
                        </ol>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="table table-bordered" style="width: 98%; margin: auto;">
                            <tr>
                                <td class="text-center" width="120">导航名称</td>
                                <td><input type="text" class="form-control" name="navName" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['name'];?>
"></td>
                            </tr>
                            <tr>
                                <td class="text-center" width="120">导航描述</td>
                                <td><input type="text" class="form-control" name="navDecs" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['decs'];?>
"></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <input type="submit" value="提交" name="send" class="btn btn-success">
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
