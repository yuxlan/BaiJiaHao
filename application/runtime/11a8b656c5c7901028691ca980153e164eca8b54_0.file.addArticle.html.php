<?php
/* Smarty version 3.1.30, created on 2017-08-03 18:34:17
  from "D:\php\wamp\www\BaiJia\application\views\home\addArticle.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5982fc29a53295_51814121',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11a8b656c5c7901028691ca980153e164eca8b54' => 
    array (
      0 => 'D:\\php\\wamp\\www\\BaiJia\\application\\views\\home\\addArticle.html',
      1 => 1501754189,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5982fc29a53295_51814121 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>发布文章</title>
    </head>
    <body>

    <!-- 导航栏 -->
    <nav class="navbar" style="border-bottom: 1px solid #dfdfdf; height: 70px;">
        <div class="container">

            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">
                    <img src="public/imgs/logos/ibd-logo2.png" class="navbar-logo" />
                </a>
            </div>

            <ul class="nav nav-pills" style="float: right;">
                <li>
                    <?php if (empty($_SESSION['admin'][0]['user'])) {?>
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user'][0]['user'];?>
<span class="caret"></span></a>
                    <?php } else { ?>
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['admin'][0]['user'];?>
<span class="caret"></span></a>
                    <?php }?>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="?c=userCenter&action=show">个人中心</a>
                        </li>
                        <li>
                            <?php if (empty($_SESSION['admin'][0]['user'])) {?>
                            <a href="?c=user&action=userlogout">退出</a>
                            <?php } else { ?>
                            <a href="??c=user&action=logout">退出</a>
                            <?php }?>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="?c=index">百度首页</a>
                </li>
            </ul>

        </div>
    </nav>

    <div class="container-fluid">
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
                                <label for="aimg0" style="cursor: pointer; font-size: 14px; color: #9d9d9d;">上传文件</label>
                                <input type="file" class="hide fileInput1" id="aimg0" name="articlePic0">
                                <img src="" alt="预览图片" class="fileImage1" width="100" height="100" style="line-height: 100px; text-align: center">
                            </div>
                            <div class="col-md-3 hide filebox">
                                <label for="aimg1" style="cursor: pointer; font-size: 14px; color: #9d9d9d;">上传文件</label>
                                <input type="file" class="hide fileInput1" id="aimg1" name="articlePic1">
                                <img src="" alt="预览图片" class="fileImage1" width="100" height="100" style="line-height: 100px; text-align: center">
                            </div>
                            <div class="col-md-3 hide filebox">
                                <label for="aimg2" style="cursor: pointer; font-size: 14px; color: #9d9d9d;">上传文件</label>
                                <input type="file" class="hide fileInput1" id="aimg2" name="articlePic2">
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
                            <input type="submit" value="发布" name="send" class="btn btn-success">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    </div>
    </body>
</html><?php }
}
