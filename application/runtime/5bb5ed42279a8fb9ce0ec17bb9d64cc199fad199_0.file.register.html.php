<?php
/* Smarty version 3.1.30, created on 2017-08-03 16:49:29
  from "D:\php\wamp\www\BaiJia\application\views\home\register.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5982e399ed4ed0_39552337',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5bb5ed42279a8fb9ce0ec17bb9d64cc199fad199' => 
    array (
      0 => 'D:\\php\\wamp\\www\\BaiJia\\application\\views\\home\\register.html',
      1 => 1501750149,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/login.html' => 1,
  ),
),false)) {
function content_5982e399ed4ed0_39552337 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>注册账号</title>

		<!-- 首页自定义样式 -->
		<link rel="stylesheet" href="public/css/register.css" type="text/css" />
	</head>
	<body>

		<!-- 顶部 -->
		<nav>
			<div class="container">
				<div>
					<img src="public/imgs/logos/baidu.gif" />
					<img src="public/imgs/logos/regtext.png" />
				</div>
				<p>我已注册，现在就&nbsp;&nbsp;<button class="btn btn-default" id="btn">登录</button></p>
				<img src="public/imgs/icons/reg_hr.png" class="nav-hr" />
			</div>
		</nav>
		
		<!-- 登录表单 -->

		<?php $_smarty_tpl->_subTemplateRender("file:home/login.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



		<!-- 注册表单 -->
		<div class="container">
			<form class="register-form">
				<label>用户名</label>
				<input value="" name="username" id="regusername" type="text" placeholder="  请设置用户名" />
				<div style="color: #ff0000;text-align: center;" id="info1"></div>

				<label>手机号</label>
				<input value="" name="phonenum" id="regphonenum" type="text" placeholder="  可用于登录和找回密码" />
				<div style="color: #ff0000;text-align: center;" id="info2"></div>

				<label>验证码</label>
				<input value="" name="captcha" id="regcaptcha" type="text" placeholder="  请输入验证码" style="width: 57%;" />
				<img src="application/configs/captcha.php" id="regcodes">
				<div style="color: #ff0000;text-align: center;" id="info3"></div>

				<label>密&nbsp;&nbsp; 码</label>
				<input value="" name="pwd" id="regpwd" type="password" placeholder="  请设置登录密码" />
				<div style="color: #ff0000;text-align: center;" id="info4"></div>

				<input type="checkbox" checked="checked" id="read"/><p>阅读并接受<a href="javascript:;">《百度用户协议》</a></p>
				<input type="button" value="注册" id="regsubmit" class="btn btn-primary" name="send" />
			</form>

			<?php echo '<script'; ?>
 src="public/js/tools.js" type="text/javascript"><?php echo '</script'; ?>
>

			<?php echo '<script'; ?>
>
                //  点击刷新验证码
                $('#regcodes').click(function () {
                    this.src='application/configs/captcha.php?num='+Math.random();
                });

                var lev1=0,lev2=0,lev3=0,lev4=0;
                var t = new Tools();

                $("#regusername").blur(function () {
                    if ($(this).val().length < 3 || $(this).val().length > 6){
                        $("#info1").html("用户名不可使用，长度应在3至6之间");
                        lev1 = 0;
                    } else if ($(this).val().length >= 3 && $(this).val().length <= 6){
                        var xhr=new XMLHttpRequest();
                        xhr.open('post', '?c=register&action=verifyUser');
                        xhr.setRequestHeader("content-type","application/x-www-form-urlencoded,charset=UTF-8");
                        xhr.send('username='+$('#regusername').val());
                        xhr.onreadystatechange=function () {
                            if(xhr.readyState==4&&xhr.status==200){
                                if(xhr.responseText.substr(xhr.responseText.length-2)=='no'){
                                    $("#info1").html("用户名已存在");
                                    lev1 = 0;
                                }else {
                                    $("#info1").html("用户名可用");
                                    lev1 = 1
                                }
                            }
                        }
                    } else {
                        $("info").innerHTML = "用户名可用";
                    }
                });

                $("#regphonenum").blur(function () {
					if (!t.valid_tel($(this).val())){
                        $("#info2").html("不是正确的手机号格式");
                        lev2 = 0;
                    } else {
                        $("#info2").html("正确");
                        lev2 = 1;
                    }
                });


                $('#regcaptcha').blur(function () {
                    var xhr=new XMLHttpRequest();
                    xhr.open('post', '?c=register&action=code');
                    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded,charset=UTF-8");
                    xhr.send('code='+$('#regcaptcha').val());
                    xhr.onreadystatechange=function () {
                        if(xhr.readyState==4&&xhr.status==200){
                            if(xhr.responseText.substr(xhr.responseText.length-2)=='ok'){
                                $("#info3").html("验证码正确");
                                lev3 = 1;
                            }else {
                                $("#info3").html("验证码错误");
                                lev3 = 0;
                            }
                        }
                    }
                });

                //            验证密码的强弱
                $("#regpwd").blur(function () {
                    if ($(this).val().length < 6 || $(this).val().length > 15){
                        $("#info4").html("密码长度在6-15之间");
                        lev4 = 0;
                    } else{
                        var n = t.pwd_test($(this).val());

                        switch (n){
                            case 1:
                                $("#info4").html("密码强度弱");
                                lev4 = 1;
                                break;
                            case 2:
                                $("#info4").html("密码强度中等");
                                lev4 = 1;
                                break;
                            case 3:
                                $("#info4").html("密码强度较强");
                                lev4 = 1;
                                break;
                            case 4:
                                $("#info4").html("密码强度强");
                                lev4 = 1;
                                break;
                        }
                    }
                });

                $('#regsubmit').click(function () {
                    var lev = lev1 + lev2 + lev3 + lev4;
                    if (lev == 4){
                        var xhr=new XMLHttpRequest();
                        xhr.open('post', '?c=register&action=registerSuc');
                        xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded,charset=UTF-8");
                        xhr.send('username='+$('#regusername').val()+'&phone='+$('#regphonenum').val()+'&pwd='+$("#regpwd").val());
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                if (xhr.responseText.substr(xhr.responseText.length-2)=='ok') {
                                    alert("注册成功");
                                    location.href="?c=index";
                                }else{
                                    alert("注册失败");
                                }
                            }
                        }
                    }
                })
			<?php echo '</script'; ?>
>
			
			<div class="alert alert-info">
				<h5 class="alert-h"><img src="public/imgs/icons/phone.png" /><strong>&nbsp;&nbsp;手机快速注册</strong></h5>
				<hr />
				<p class="alert-p1">请使用中国大陆手机号，编辑短信：</p>
				<p class="alert-p2"><strong>6-14位字符（支持数字/字母/符号）</strong></p>
				<br />
				<p class="alert-p1">作为登录密码，发送至：</p>
				<p class="alert-p2"><strong>1069 0691 036590</strong></p>
				<p class="alert-p1">即可注册成功，手机号即为登录帐号。</p>
			</div>
			
			<div class="footer-text">
				<p>2017@</p>
			</div>
		</div>

		<!-- 自定义操作 -->
		<?php echo '<script'; ?>
 src="public/js/operation.js"><?php echo '</script'; ?>
>
	</body>
</html>
<?php }
}
