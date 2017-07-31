<?php
/* Smarty version 3.1.30, created on 2017-07-31 20:22:42
  from "D:\php\wamp\www\BaiJiaHao\application\views\admin\ad.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597f21129a3528_58611003',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad5c52d1ed461eee72867e027983721df99b9eb2' => 
    array (
      0 => 'D:\\php\\wamp\\www\\BaiJiaHao\\application\\views\\admin\\ad.html',
      1 => 1501490120,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597f21129a3528_58611003 (Smarty_Internal_Template $_smarty_tpl) {
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

        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <table class="table table-bordered" style="width: 98%; margin: auto;">
                        <tr>
                            <th>广告标题</th>
                            <th>广告链接</th>
                            <th>广告配图</th>
                            <th>广告描述</th>
                            <th>添加时间</th>
                            <th>状态</th>
                            <th>操作</th>
                            <th>
                                <label for="allAd">全选 </label>
                                <input type="checkbox" id="allAd">
                            </th>
                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['adData']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
                        <tr>
                            <td><?php echo substr($_smarty_tpl->tpl_vars['value']->value['title'],0,12);?>
……</td>
                            <td><?php echo substr($_smarty_tpl->tpl_vars['value']->value['link'],0,12);?>
……</td>
                            <td><img src="public/uploads/ad/<?php echo $_smarty_tpl->tpl_vars['value']->value['pic'];?>
" style="width: 70px; height: 70px; line-height: 100px;" class="img-circle"></td>
                            <td><?php echo substr($_smarty_tpl->tpl_vars['value']->value['decs'],0,12);?>
……</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['date'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['state'];?>
</td>
                            <td>
                                <a href="?c=ad&action=update&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">修改</a>
                                <a href="?c=ad&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
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
                            $(document).on('click','#allAd',function () {
                                $(".choose").prop("checked",$(this).prop("checked"));
                            });
                        <?php echo '</script'; ?>
>
                        <tr>
                            <td colspan="6">
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

        <?php if ($_smarty_tpl->tpl_vars['update']->value) {?>
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb" style="background: #FFFFFF; border-bottom: 1px solid #dfdfdf; border-radius: 0;">
                    <li><a href="?c=admin">后台首页</a></li>
                    <li><a href="?c=ad&action=show">广告管理</a></li>
                    <li class="active">修改广告</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="table table-bordered" style="width: 98%; margin: auto;">
                        <tr>
                            <td class="text-center" width="120">广告标题</td>
                            <td><input type="text" class="form-control" name="adName" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['title'];?>
"></td>
                        </tr>
                        <tr>
                            <td class="text-center" width="120">广告链接</td>
                            <td><input type="text" class="form-control" name="adLink" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['link'];?>
"></td>
                        </tr>
                        <tr>
                            <td class="text-center" width="120">广告描述</td>
                            <td><input type="text" class="form-control" name="adDecs" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['decs'];?>
"></td>
                        </tr>
                        <tr>
                            <td class="text-center" width="120">广告图片</td>
                            <td>
                                <label for="file1" style="cursor: pointer; font-size: 14px; color: #9d9d9d;">上传文件</label>
                                <input type="file" class="hide fileInput1" id="file1" name="adPicUpdate">
                                <img src="public/uploads/ad/<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['pic'];?>
" alt="预览图片" class="img-circle fileImg1" width="100" height="100" style="line-height: 100px; text-align: center">
                            </td>
                        </tr>
                        <?php echo '<script'; ?>
 type="text/javascript">
                            var fileInput = document.getElementsByClassName('fileInput1')[0];
                            fileInput.onchange = function () {
                                var fr = new FileReader();
                                fr.readAsDataURL(this.files[0]);
                                fr.onload = function () {
                                    document.getElementsByClassName('fileImg1')[0].src = this.result;
                                }
                            };
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

    </body>
</html><?php }
}
