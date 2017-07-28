<?php
/* Smarty version 3.1.30, created on 2017-07-28 17:54:33
  from "D:\php\wamp\www\php\BaiJiaHao\application\views\admin\article.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597b09d9b61495_93245017',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dc4dd1baede261ca9f6da5d8c93d7cd649a35680' => 
    array (
      0 => 'D:\\php\\wamp\\www\\php\\BaiJiaHao\\application\\views\\admin\\article.html',
      1 => 1501235649,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597b09d9b61495_93245017 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>article</title>
    </head>
    <body style="overflow-x: hidden;">

        <?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb" style="background: #FFFFFF; border-bottom: 1px solid #dfdfdf; border-radius: 0;">
                    <li><a href="?c=admin">后台首页</a></li>
                    <li><a href="?c=ad&action=show">文章管理</a></li>
                    <li class="active">所有文章</li>
                </ol>
            </div>
        </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['add']->value) {?>
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb" style="background: #FFFFFF; border-bottom: 1px solid #dfdfdf; border-radius: 0;">
                    <li><a href="?c=admin">后台首页</a></li>
                    <li><a href="?c=ad&action=show">文章管理</a></li>
                    <li class="active">添加文章</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="table table-bordered" style="width: 98%; margin: auto;">
                        <tr>
                            <td class="text-center">文章标题</td>
                            <td><input type="text" class="form-control" name="articleName"></td>
                        </tr>
                        <tr>
                            <td class="text-center">文章类型</td>
                            <td>
                                <select name="articleNid" id="" class="form-control">
                                    <option value="0">请选择</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['navData']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">文章作者</td>
                            <td><input type="text" class="form-control" name="articleAuthor"></td>
                        </tr>
                        <tr>
                            <td class="text-center">作者头像</td>
                            <td>
                                <label for="file" style="cursor: pointer; font-size: 14px; color: #9d9d9d;">上传头像</label>
                                <input type="file" class="hide fileInput" id="apic" name="articlePic">
                                <img src="" alt="预览图片" class="img-circle fileImg" width="100" height="100" style="line-height: 100px; text-align: center">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">作者导语</td>
                            <td><input type="text" class="form-control" name="authorLead"></td>
                        </tr>
                        <tr>
                            <td class="text-center">文章来源</td>
                            <td><input type="text" class="form-control" name="articleSource"></td>
                        </tr>
                        <tr>
                            <td class="text-center">文章详情</td>
                            <td width="90%"><textarea id="content" name="content" style="height: 400px"></textarea></td>
                        </tr>
                        <tr>
                            <td class="text-center">文章配图</td>
                            <td class="row">
                                <div class="col-md-3">
                                    <label for="file" style="cursor: pointer; font-size: 14px; color: #9d9d9d;">上传文件</label>
                                    <input type="file" class="hide fileInput" name="articlePic[]">
                                    <img src="" alt="预览图片" class="fileImage" width="100" height="100" style="line-height: 100px; text-align: center">
                                </div>
                                <div class="col-md-3">
                                    <label for="file" style="cursor: pointer; font-size: 14px; color: #9d9d9d;">上传文件</label>
                                    <input type="file" class="hide fileInput" name="articlePic[]">
                                    <img src="" alt="预览图片" class="fileImage" width="100" height="100" style="line-height: 100px; text-align: center">
                                </div>
                                <div class="col-md-3">
                                    <label for="file" style="cursor: pointer; font-size: 14px; color: #9d9d9d;">上传文件</label>
                                    <input type="file" class="hide fileInput" name="articlePic[]">
                                    <img src="" alt="预览图片" class="fileImage" width="100" height="100" style="line-height: 100px; text-align: center">
                                </div>
                                <div class="col-md-3">
                                    <label for="file" style="cursor: pointer; font-size: 14px; color: #9d9d9d;">上传文件</label>
                                    <input type="file" class="hide fileInput" name="articlePic[]">
                                    <img src="" alt="预览图片" class="fileImage" width="100" height="100" style="line-height: 100px; text-align: center">
                                </div>
                            </td>
                        </tr>
                        <?php echo '<script'; ?>
 src="libs/utf8-php/ueditor.config.js"><?php echo '</script'; ?>
>
                        <?php echo '<script'; ?>
 src="libs/utf8-php/ueditor.all.min.js"><?php echo '</script'; ?>
>
                        <?php echo '<script'; ?>
>
                            var ue = UE.getEditor('content');
                        <?php echo '</script'; ?>
>

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

        <?php if ($_smarty_tpl->tpl_vars['update']->value) {?>
        <?php }?>

    </body>
</html><?php }
}
