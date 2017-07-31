<?php
/* Smarty version 3.1.30, created on 2017-07-31 20:24:15
  from "D:\php\wamp\www\BaiJiaHao\application\views\admin\article.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597f216f8b25e8_45463640',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3bc2d5104af2902ad9af50b17f3ac5a08c068629' => 
    array (
      0 => 'D:\\php\\wamp\\www\\BaiJiaHao\\application\\views\\admin\\article.html',
      1 => 1501503847,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597f216f8b25e8_45463640 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\php\\wamp\\www\\BaiJiaHao\\libs\\smarty-3.1.30\\libs\\plugins\\modifier.truncate.php';
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

        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <table class="table table-bordered" style="width: 98%; margin: auto;">
                        <tr>
                            <th>文章标题</th>
                            <th>文章类型</th>
                            <th>文章作者</th>
                            <th>作者头像</th>
                            <th>作者导语</th>
                            <th>文章配图</th>
                            <th>文章来源</th>
                            <th>文章内容</th>
                            <th>添加时间</th>
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
                            <td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value['title'],10);?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['nid'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['author'];?>
</td>
                            <td><img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['value']->value['pic'];?>
" style="width: 70px; height: 70px; line-height: 100px;" class="img-circle"></td>
                            <td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value['lead'],10);?>
</td>
                            <td><img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['value']->value['pic'];?>
" style="width: 70px; height: 70px; line-height: 100px;" class="img-circle"></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['source'];?>
</td>
                            <td><?php echo smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['value']->value['content']),20,'……');?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['date'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['state'];?>
</td>
                            <td>
                                <a href="?c=article&action=update&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">修改</a>
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
                            //                                on：对将来有脚本生成的元素的js有效果
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
                                        <?php if ($_smarty_tpl->tpl_vars['k']->value != 0) {?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
                                        <?php }?>
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
                                <label for="aimg0" style="cursor: pointer; font-size: 14px; color: #9d9d9d;">上传头像</label>
                                <input type="file" class="hide fileInput" id="aimg0" name="articlePic0">
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
                            <td class="text-center">
                                <p>文章配图</p>
                                <p>
                                    <input type="button" value="1" class="btn btn-info imginfo">
                                    <input type="button" value="3" class="btn imginfo">
                                    <input type="hidden" name="num" value="1" class="num">
                                </p>
                            </td>
                            <td class="row">
                                <div class="col-md-3">
                                    <label for="aimg1" style="cursor: pointer; font-size: 14px; color: #9d9d9d;">上传文件</label>
                                    <input type="file" class="hide fileInput1" id="aimg1" name="articlePic1">
                                    <img src="" alt="预览图片" class="fileImage1" width="100" height="100" style="line-height: 100px; text-align: center">
                                </div>
                                <div class="col-md-3 hide filebox">
                                    <label for="aimg2" style="cursor: pointer; font-size: 14px; color: #9d9d9d;">上传文件</label>
                                    <input type="file" class="hide fileInput1" id="aimg2" name="articlePic2">
                                    <img src="" alt="预览图片" class="fileImage1" width="100" height="100" style="line-height: 100px; text-align: center">
                                </div>
                                <div class="col-md-3 hide filebox">
                                    <label for="aimg3" style="cursor: pointer; font-size: 14px; color: #9d9d9d;">上传文件</label>
                                    <input type="file" class="hide fileInput1" id="aimg3" name="articlePic3">
                                    <img src="" alt="预览图片" class="fileImage1" width="100" height="100" style="line-height: 100px; text-align: center">
                                </div>
                            </td>
                        </tr>
                        <?php echo '<script'; ?>
>
                            $('.imginfo').each(function (index) {
                                $(this).click(function () {
                                    $('.imginfo').attr('class','btn imginfo');
                                    $(this).attr('class','btn btn-info imginfo');
                                    $('.num').val($(this).val());

                                    if (index==0){
                                        $('.filebox').addClass('hide').removeClass('show');
                                    }else if(index==1){
                                        $('.filebox').addClass('show').removeClass('hide');
                                    }
                                })
                            });
                            $('.fileInput1').each(function (i) {
                                $(this).change(function () {
                                    var fr = new FileReader();
                                    fr.readAsDataURL($('.fileInput1')[i].files[0]);
                                    fr.onload=function () {
                                        $('.fileImage1')[i].src = this.result;
                                    }
                                })
                            })
                        <?php echo '</script'; ?>
>
                        <?php echo '<script'; ?>
 src="libs/ueditor/ueditor.config.js"><?php echo '</script'; ?>
>
                        <?php echo '<script'; ?>
 src="libs/ueditor/ueditor.all.min.js"><?php echo '</script'; ?>
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
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb" style="background: #FFFFFF; border-bottom: 1px solid #dfdfdf; border-radius: 0;">
                    <li><a href="?c=admin">后台首页</a></li>
                    <li><a href="?c=ad&action=show">文章管理</a></li>
                    <li class="active">修改文章</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="table table-bordered" style="width: 98%; margin: auto;">
                        <tr>
                            <td class="text-center">文章标题</td>
                            <td><input type="text" class="form-control" name="articleName" value="<?php echo $_smarty_tpl->tpl_vars['oneArt']->value[0]['title'];?>
"></td>
                        </tr>
                        <tr>
                            <td class="text-center">文章类型</td>
                            <td>
                                <select name="articleNid" class="form-control">
                                    <option value="0">请选择</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['navData']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                                    <?php if ($_smarty_tpl->tpl_vars['k']->value != 0) {?>
                                        <?php if ($_smarty_tpl->tpl_vars['oneArt']->value[0]['nid'] == $_smarty_tpl->tpl_vars['v']->value['id']) {?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
                                        <?php } else { ?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
                                        <?php }?>
                                    <?php }?>
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
                            <td><input type="text" class="form-control" name="articleAuthor" value="<?php echo $_smarty_tpl->tpl_vars['oneArt']->value[0]['author'];?>
"></td>
                        </tr>
                        <tr>
                            <td class="text-center">作者头像</td>
                            <td>
                                <label for="aimg0" style="cursor: pointer; font-size: 14px; color: #9d9d9d;">上传头像</label>
                                <input type="file" class="hide fileInput" id="aimg0" name="articlePic0">
                                <img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['oneArt']->value[0]['pic'][0];?>
" alt="预览图片" class="img-circle fileImg" width="100" height="100" style="line-height: 100px; text-align: center">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">作者导语</td>
                            <td><input type="text" class="form-control" name="authorLead" value="<?php echo $_smarty_tpl->tpl_vars['oneArt']->value[0]['lead'];?>
"></td>
                        </tr>
                        <tr>
                            <td class="text-center">文章来源</td>
                            <td><input type="text" class="form-control" name="articleSource" value="<?php echo $_smarty_tpl->tpl_vars['oneArt']->value[0]['source'];?>
"></td>
                        </tr>
                        <tr>
                            <td class="text-center">文章详情</td>
                            <td width="90%"><textarea id="content1" name="content" style="height: 400px" ><?php echo $_smarty_tpl->tpl_vars['oneArt']->value[0]['content'];?>
</textarea></td>
                        </tr>
                        <tr>
                            <td class="text-center">文章配图</td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <p>文章配图</p>
                            </td>
                            <td class="row">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['oneArt']->value[0]['pic'], 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                                    <?php if ($_smarty_tpl->tpl_vars['k']->value > 0) {?>
                                        <div class="col-md-3">
                                            <label for="aimg1" style="cursor: pointer; font-size: 14px; color: #9d9d9d;">上传文件</label>
                                            <input type="file" class="hide fileInput1" id="aimg[$k]" name="articlePic1">
                                            <img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" alt="预览图片" class="fileImage1" width="100" height="100" style="line-height: 100px; text-align: center">
                                        </div>
                                    <?php }?>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                            </td>
                        </tr>
                        <?php echo '<script'; ?>
>
                            $('.imginfo').each(function (index) {
                                $(this).click(function () {
                                    $('.imginfo').attr('class','btn imginfo');
                                    $(this).attr('class','btn btn-info imginfo');
                                    $('.num').val($(this).val());

                                    if (index==0){
                                        $('.filebox').addClass('hide').removeClass('show');
                                    }else if(index==1){
                                        $('.filebox').addClass('show').removeClass('hide');
                                    }
                                })
                            });
                            $('.fileInput1').each(function (i) {
                                $(this).change(function () {
                                    var fr = new FileReader();
                                    fr.readAsDataURL($('.fileInput1')[i].files[0]);
                                    fr.onload=function () {
                                        $('.fileImage1')[i].src = this.result;
                                    }
                                })
                            })
                        <?php echo '</script'; ?>
>
                        <?php echo '<script'; ?>
 src="libs/ueditor/ueditor.config.js"><?php echo '</script'; ?>
>
                        <?php echo '<script'; ?>
 src="libs/ueditor/ueditor.all.min.js"><?php echo '</script'; ?>
>
                        <?php echo '<script'; ?>
>
                            var ue = UE.getEditor('content1');
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

    </body>
</html><?php }
}
