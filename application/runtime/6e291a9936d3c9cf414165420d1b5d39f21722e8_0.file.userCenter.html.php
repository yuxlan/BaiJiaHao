<?php
/* Smarty version 3.1.30, created on 2017-08-03 20:12:08
  from "D:\php\wamp\www\BaiJia\application\views\home\userCenter.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59831318522306_33339322',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e291a9936d3c9cf414165420d1b5d39f21722e8' => 
    array (
      0 => 'D:\\php\\wamp\\www\\BaiJia\\application\\views\\home\\userCenter.html',
      1 => 1501762274,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59831318522306_33339322 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\php\\wamp\\www\\BaiJia\\libs\\smarty-3.1.30\\libs\\plugins\\modifier.truncate.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>用户中心</title>

        <link rel="stylesheet" href="public/css/style.css" type="text/css" />
    </head>
    <body style="background: #FFFFFF;">
        <nav class="navbar navbar-default" style="background: #FFFFFF;">
            <div class="container">

                <div class="navbar-header">
                    <a href="index.php?c=index&m=userCenter" class="navbar-brand">
                        <img src="public/imgs/logos/ibd-logo2.png" />
                    </a>
                </div>

                <ul class="nav nav-pills" style="float: right;">
                    <li>
                        <a href="?c=index">百度首页</a>
                    </li>
                    <li>
                        <a href="?m=main" class="dropdown-toggle" data-toggle="dropdown">消息</a>
                        <div class="dropdown-menu" role="menu" style="width: 300px; height: 200px;">
                            <p style="margin: 15px 0 0 10px;"><?php echo $_SESSION['user'][0]['message'];?>
</p>
                            <hr>
                        </div>
                    </li>
                    <li>
                        <a href="?m=main" class="dropdown-toggle" data-toggle="dropdown">设置</a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="?c=userCenter&action=userupdate">账号设置</a>
                            </li>
                            <li>
                                <a href="?c=userCenter&action=userupdate">详细设置</a>
                            </li>
                        </ul>
                    </li>
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
                </ul>

            </div>
        </nav>

        <?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
        <section>
            <div class="container" style="background: #FFFFFF; border: 1px solid #dfdfdf; padding: 20px;">
                <div class="row">
                    <div class="col-lg-1 col-md-1">
                        <img src="public/uploads/author/<?php echo $_SESSION['user'][0]['pic'];?>
" alt="上传头像" style="width: 100px; height: 100px;">
                        <a href="?c=index&m=authorArticle" style="font-size: 16px; display: block;color: #000000; text-align: center;width: 100px;margin-top: 10px;"><?php echo $_SESSION['user'][0]['user'];?>
</a>
                    </div>
                    <div class="col-lg-1 col-md-1">
                    </div>
                    <div class="col-lg-10 col-md-10">
                        <table style="width: 100%; margin-top: 40px; font-size: 14px;">
                            <tr>
                                <td><strong>导语：</strong><?php echo $_SESSION['user'][0]['lead'];?>
</td>
                                <td><strong>年龄：</strong><?php echo $_SESSION['user'][0]['age'];?>
</td>
                                <td><strong>性别：</strong><?php echo $_SESSION['user'][0]['sex'];?>
</td>
                                <td><strong>工作：</strong><?php echo $_SESSION['user'][0]['work'];?>
</td>
                                <td><strong>手机号：</strong><?php echo $_SESSION['user'][0]['phonenum'];?>
</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="container" style="background: #FFFFFF; border: 1px solid #dfdfdf; padding: 20px;">
                <p><a style="font-size: 14px;color: #000000;"><strong>个人简介：</strong></a><?php echo $_SESSION['user'][0]['decs'];?>
</p>
            </div>
            <div class="container" style="background: #FFFFFF; border: 1px solid #dfdfdf; padding: 20px;">
                <p><a style="font-size: 14px;color: #000000;"><strong>我的文章：</strong></a></p>
                <?php if (count($_smarty_tpl->tpl_vars['authorArticle']->value) != 0) {?>
                <form action="" method="post">
                    <table class="table table-bordered" style="width: 90%; margin: auto;">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['authorArticle']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                        <tr>
                            <td>
                                <label for="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="choose" name="checked[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
                            </td>
                            <td><a href="?c=index&p=one&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&nid=<?php echo $_smarty_tpl->tpl_vars['v']->value['nid'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['title'],11,'……');?>
</a></td>
                            <td>
                                <a href="?c=userCenter&action=update&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">修改</a>
                                <a href="?c=userCenter&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">删除</a>
                            </td>
                        </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        <tr>
                            <td>
                                <label for="allAd">全选 </label>
                                <input type="checkbox" id="allAd">
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle" colspan="2">
                                <input type="submit" name="delete" value="删除" class="btn btn-danger">
                            </td>
                        </tr>
                        <?php echo '<script'; ?>
 type="text/javascript">
                            $(document).on('click','#allAd',function () {
                                $(".choose").prop("checked",$(this).prop("checked"));
                            });
                        <?php echo '</script'; ?>
>
                    </table>
                </form>
                <?php }?>
            </div>
        </section>
        <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['update']->value) {?>
        <div class="container-fluid">
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
                                    <select name="articleNid" id="" class="form-control">
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
                                <td class="text-center">文章来源</td>
                                <td><input type="text" class="form-control" name="articleSource" value="<?php echo $_smarty_tpl->tpl_vars['oneArt']->value[0]['source'];?>
"></td>
                            </tr>
                            <tr>
                                <td class="text-center">文章详情</td>
                                <td width="90%"><textarea id="content" name="content" style="height: 400px"><?php echo $_smarty_tpl->tpl_vars['oneArt']->value[0]['content'];?>
</textarea></td>
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
                                    <div class="col-md-3">
                                        <label for="aimg1" style="cursor: pointer; font-size: 14px; color: #9d9d9d;">上传文件</label>
                                        <input type="file" class="hide fileInput1" id="aimg[$k]" name="articlePic1">
                                        <img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" alt="预览图片" class="fileImage1" width="100" height="100" style="line-height: 100px; text-align: center">
                                    </div>
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
                                    <input type="submit" value="修改" name="send" class="btn btn-success">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['userupdate']->value) {?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="table table-bordered" style="width: 98%; margin: auto;">
                            <tr>
                                <td class="text-center">用 户 名</td>
                                <td><input type="text" class="form-control" name="userName" value="<?php echo $_smarty_tpl->tpl_vars['userMessage']->value[0]['user'];?>
"></td>
                            </tr>
                            <tr>
                                <td class="text-center">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码</td>
                                <td><input type="text" class="form-control" name="userPwd" value="<?php echo $_smarty_tpl->tpl_vars['userMessage']->value[0]['pwd'];?>
"></td>
                            </tr>
                            <tr>
                                <td class="text-center">手 机 号</td>
                                <td><input type="text" class="form-control" name="userPhone" value="<?php echo $_smarty_tpl->tpl_vars['userMessage']->value[0]['phonenum'];?>
"></td>
                            </tr>
                            <tr>
                                <td class="text-center">导&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;语</td>
                                <td><input type="text" class="form-control" name="userLead" value="<?php echo $_smarty_tpl->tpl_vars['userMessage']->value[0]['lead'];?>
"></td>
                            </tr>
                            <tr>
                                <td class="text-center">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别</td>
                                <td><input type="text" class="form-control" name="userSex" value="<?php echo $_smarty_tpl->tpl_vars['userMessage']->value[0]['sex'];?>
"></td>
                            </tr>
                            <tr>
                                <td class="text-center">年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄</td>
                                <td><input type="text" class="form-control" name="userAge" value="<?php echo $_smarty_tpl->tpl_vars['userMessage']->value[0]['age'];?>
"></td>
                            </tr>
                            <tr>
                                <td class="text-center">工&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;作</td>
                                <td><input type="text" class="form-control" name="userWork" value="<?php echo $_smarty_tpl->tpl_vars['userMessage']->value[0]['work'];?>
"></td>
                            </tr>
                            <tr>
                                <td class="text-center">个人简介</td>
                                <td><textarea type="text" class="form-control" style="height: 200px;" name="userDecs"><?php echo $_smarty_tpl->tpl_vars['userMessage']->value[0]['decs'];?>
</textarea></td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <p>头&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;像</p>
                                </td>
                                <td class="row">
                                    <div class="col-md-3">
                                        <label for="aimg1" style="cursor: pointer; font-size: 14px; color: #9d9d9d;">上传头像</label>
                                        <input type="file" class="hide fileInput1" id="aimg1" name="userPic1">
                                        <img src="public/uploads/author/<?php echo $_smarty_tpl->tpl_vars['userMessage']->value[0]['pic'];?>
" alt="预览图片" class="fileImage1" width="100" height="100" style="line-height: 100px; text-align: center">
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
                            <tr>
                                <td colspan="2" class="text-center">
                                    <input type="submit" value="修改" name="send" class="btn btn-success">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <?php }?>
    </body>
</html><?php }
}
