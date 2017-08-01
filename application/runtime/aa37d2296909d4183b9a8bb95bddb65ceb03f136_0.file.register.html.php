<?php
/* Smarty version 3.1.30, created on 2017-08-01 20:08:55
  from "D:\php\wamp\www\BaiJiaHao\application\views\home\register.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59806f57a7d525_89500500',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa37d2296909d4183b9a8bb95bddb65ceb03f136' => 
    array (
      0 => 'D:\\php\\wamp\\www\\BaiJiaHao\\application\\views\\home\\register.html',
      1 => 1501589333,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/login.html' => 1,
  ),
),false)) {
function content_59806f57a7d525_89500500 (Smarty_Internal_Template $_smarty_tpl) {
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
			<form class="register-form" action="?c=user&action=register" method="post">
				<label>用户名</label>
				<input value="" name="username" id="username" type="text" placeholder="  请设置用户名" />
				<div id="info1"></div>

				<label>手机号</label>
				<input value="" name="phonenum" id="phonenum" type="text" placeholder="  可用于登录和找回密码" />
				<div id="info2"></div>

				<label>验证码</label>
				<input value="" name="captcha" id="captcha" type="text" placeholder="  请输入验证码" style="width: 57%;" />
				<img src="application/configs/captcha.php" id="codes">
				<div id="info3"></div>

				<label>密&nbsp;&nbsp; 码</label>
				<input value="" name="pwd" id="pwd" type="password" placeholder="  请设置登录密码" />
				<div id="info4"></div>

				<input type="checkbox" checked="checked" id="read"/><p>阅读并接受<a href="javascript:;">《百度用户协议》</a></p>
				<input type="submit" value="注册" id="submit" class="btn btn-primary" name="send" />
			</form>

			<?php echo '<script'; ?>
>
                //  点击刷新验证码
                document.getElementById('codes').onclick=function () {
                    this.src='application/configs/captcha.php?num='+Math.random();
                };
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
