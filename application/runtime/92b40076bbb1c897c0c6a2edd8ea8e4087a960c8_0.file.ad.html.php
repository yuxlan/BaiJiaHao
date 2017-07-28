<?php
/* Smarty version 3.1.30, created on 2017-07-28 17:54:30
  from "D:\php\wamp\www\php\BaiJiaHao\application\views\admin\ad.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597b09d64c9058_45009768',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '92b40076bbb1c897c0c6a2edd8ea8e4087a960c8' => 
    array (
      0 => 'D:\\php\\wamp\\www\\php\\BaiJiaHao\\application\\views\\admin\\ad.html',
      1 => 1501235657,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597b09d64c9058_45009768 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ad</title>
    </head>
    <body style="overflow-x: hidden;">

        <?php if ($_smarty_tpl->tpl_vars['add']->value) {?>
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb" style="background: #FFFFFF; border-bottom: 1px solid #dfdfdf; border-radius: 0;">
                        <li><a href="?c=admin">后台首页</a></li>
                        <li><a href="?c=ad&action=show">广告管理</a></li>
                        <li class="active">添加广告</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="table table-bordered" style="width: 98%; margin: auto;">
                            <tr>
                                <td class="text-center" width="120">广告标题</td>
                                <td><input type="text" class="form-control" name="adName"></td>
                            </tr>
                            <tr>
                                <td class="text-center" width="120">广告链接</td>
                                <td><input type="text" class="form-control" name="adLink"></td>
                            </tr>
                            <tr>
                                <td class="text-center" width="120">广告描述</td>
                                <td><input type="text" class="form-control" name="adDecs"></td>
                            </tr>
                            <tr>
                                <td class="text-center" width="120">广告图片</td>
                                <td>
                                    <label for="file" style="cursor: pointer; font-size: 14px; color: #9d9d9d;">上传文件</label>
                                    <input type="file" class="hide fileInput" id="file" name="adPic">
                                    <img src="" alt="预览图片" class="img-circle fileImg" width="100" height="100" style="line-height: 100px; text-align: center">
                                </td>
                            </tr>
                            <?php echo '<script'; ?>
 type="text/javascript">
                                var fileInput = document.getElementsByClassName('fileInput')[0];
                                fileInput.onchange = function () {
                                    var fr = new FileReader();
                                    fr.readAsDataURL(this.files[0]);
                                    fr.onload = function () {
                                        document.getElementsByClassName('fileImg')[0].src = this.result;
                                    }
                                }
                            <?php echo '</script'; ?>
>
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

        <?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb" style="background: #FFFFFF; border-bottom: 1px solid #dfdfdf; border-radius: 0;">
                    <li><a href="?c=admin">后台首页</a></li>
                    <li><a href="?c=ad&action=show">广告管理</a></li>
                    <li class="active">所有广告</li>
                </ol>
            </div>
        </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['update']->value) {?>
        <?php }?>

    </body>
</html><?php }
}
