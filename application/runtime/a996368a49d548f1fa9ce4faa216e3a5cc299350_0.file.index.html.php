<?php
/* Smarty version 3.1.30, created on 2017-08-03 10:58:33
  from "D:\php\wamp\www\BaiJia\application\views\home\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59829159e23d47_55485300',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a996368a49d548f1fa9ce4faa216e3a5cc299350' => 
    array (
      0 => 'D:\\php\\wamp\\www\\BaiJia\\application\\views\\home\\index.html',
      1 => 1501728974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/header.html' => 1,
    'file:home/login.html' => 1,
    'file:home/footer.html' => 1,
  ),
),false)) {
function content_59829159e23d47_55485300 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\php\\wamp\\www\\BaiJia\\libs\\smarty-3.1.30\\libs\\plugins\\modifier.truncate.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<?php if ($_smarty_tpl->tpl_vars['index']->value) {?>
		<title>首页-百家号</title>
		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['page']->value) {?>
		<title>频道列表-百家号</title>
		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['one']->value) {?>
		<title>文章详情</title>
		<?php }?>
	
		<!-- 首页自定义样式 -->
		<link rel="stylesheet" href="public/css/style.css" type="text/css" />
	</head>
	
	<body>

		<!-- 导航栏 -->
		<?php $_smarty_tpl->_subTemplateRender("file:home/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		
		<!-- 登录表单 -->
		<?php $_smarty_tpl->_subTemplateRender("file:home/login.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


		<!-- 首页中间 -->
		<?php if ($_smarty_tpl->tpl_vars['index']->value) {?>
			<!-- 主图轮播以及侧边图片 -->
			<section class="carousel-container">
				<div class="container">
					<div class="row">

						<!-- 轮播图 -->
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

							<div id="myLb" class="carousel slide">

								<!-- 轮播游标 -->
								<ol class="carousel-indicators">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articleLb']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
										<?php if ($_smarty_tpl->tpl_vars['k']->value == 0) {?>
										<li data-target = "#myLb" data-slide-to = "<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="active"></li>
										<?php } else { ?>
										<li data-target = "#myLb" data-slide-to = "<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"></li>
										<?php }?>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

								</ol>

								<!-- 轮播内容 -->
								<div class="carousel-inner">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articleLb']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
										<?php if ($_smarty_tpl->tpl_vars['k']->value == 0) {?>
										<div class="item active">
											<p class="carousel-p">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</p>
											<a href="?c=index&p=one&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&nid=<?php echo $_smarty_tpl->tpl_vars['v']->value['nid'];?>
"><img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['v']->value['pic'][0];?>
" alt="" style="width: 795px; height: 340px;"/></a>
										</div>
										<?php } else { ?>
										<div class="item">
											<p class="carousel-p">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</p>
											<a href="?c=index&p=one&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&nid=<?php echo $_smarty_tpl->tpl_vars['v']->value['nid'];?>
"><img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['v']->value['pic'][0];?>
" alt="" style="width: 795px; height: 340px;"/></a>
										</div>
										<?php }?>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

								</div>

								<!-- 轮播控制杆 -->
								<a href="#myLb" data-slide="prev" class="carousel-control left">&lsaquo;</a>
								<a href="#myLb" data-slide="next" class="carousel-control right">&rsaquo;</a>

							</div>
						</div>

						<!-- 侧边图片 -->
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

							<div class="carousel-side-div">

								<a href="javascript:;">往期专辑&nbsp;></a>
								<div class="carousel-logo-img"> </div>
								<h3>王者荣耀是毒药？</h3>

								<div class="carousel-side-text">
									<p class="carousel-p0"><em>VS</em></p>
									<p class="carousel-p1">75%</p>
									<p class="carousel-p2">严肃整治</p>
									<p class="carousel-p3">25%</p>
									<p class="carousel-p4">不应苛责</p>

									<div class="progress">
										<div class="progress-bar progress-bar-danger" style="width: 75%;"></div>
										<div class="progress-bar" style="width: 25%;"></div>
									</div>

								</div>

							</div>

							<img src="public/imgs/temps/side-1.jpg" alt=""/>

						</div>

					</div>
				</div>
			</section>

			<!--  主体新闻部分  -->
			<section class="media-part">
				<div class="container">
					<div class="row">

						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
							<ul class="media-list">

								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['article']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
									<?php if (count($_smarty_tpl->tpl_vars['v']->value['pic']) == 1) {?>
										<li class="media">
									<div class="media-div">
										<div class="media-body">

											<div class="media-img row">
												<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
													<img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['v']->value['pic'][0];?>
" style="width: 179px; height: 120px;" />
												</div>

												<div class="media-text-part col-lg-10 col-md-10 col-sm-10 col-xs-10">
													<a class="media-heading" href="?c=index&p=one&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&nid=<?php echo $_smarty_tpl->tpl_vars['v']->value['nid'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['title'],20,'……');?>
</a>
													<div class="media-text">
														<a href="?c=index&m=authorArticle&id=<?php echo $_smarty_tpl->tpl_vars['artAuthorId']->value[$_smarty_tpl->tpl_vars['k']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['artAuthorName']->value[$_smarty_tpl->tpl_vars['k']->value];?>
</a>
														<p><?php echo substr($_smarty_tpl->tpl_vars['v']->value['date'],11,5);?>
</p>
														<p>阅读（<?php echo $_smarty_tpl->tpl_vars['v']->value['pageview'];?>
）</p>
														<p>
															<i class="fa fa-share-alt"></i>
															&nbsp;分享&nbsp;
															<i class="fa fa-qq fa-style"></i>
															<i class="fa fa-weibo fa-style"></i>
															<i class="fa fa-weixin fa-style"></i>
														</p>
													</div>
												</div>
											</div>

										</div>
									</div>

									<hr>

								</li>
									<?php } else { ?>
										<li class="media">
									<div class="media-div">
										<div class="media-body">
											<a class="media-heading" href="?c=index&p=one&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&nid=<?php echo $_smarty_tpl->tpl_vars['v']->value['nid'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['title'],20,'……');?>
</a>

											<div class="media-img row">

												<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < count($_smarty_tpl->tpl_vars['v']->value['pic'])) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < count($_smarty_tpl->tpl_vars['v']->value['pic']); $_smarty_tpl->tpl_vars['i']->value++) {
?>

												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
													<img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['v']->value['pic'][$_smarty_tpl->tpl_vars['i']->value];?>
" style="width: 179px; height: 120px;" />
												</div>

												<?php }
}
?>


												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
													<img src="public/imgs/temps/news-1.jpg" />
												</div>

											</div>

											<div class="media-text">

												<a href="?c=index&m=authorArticle&id=<?php echo $_smarty_tpl->tpl_vars['artAuthorId']->value[$_smarty_tpl->tpl_vars['k']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['artAuthorName']->value[$_smarty_tpl->tpl_vars['k']->value];?>
</a>
												<p><?php echo substr($_smarty_tpl->tpl_vars['v']->value['date'],11,5);?>
</p>
												<p>阅读（<?php echo $_smarty_tpl->tpl_vars['v']->value['pageview'];?>
）</p>

												<p>
													<i class="fa fa-share-alt"></i>
													&nbsp;分享&nbsp;
													<i class="fa fa-qq fa-style"></i>
													<i class="fa fa-weibo fa-style"></i>
													<i class="fa fa-weixin fa-style"></i>
												</p>

											</div>
										</div>
									</div>

									<hr>

								</li>
									<?php }?>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


								<li class="main-part-last-li text-center">
									<?php echo $_smarty_tpl->tpl_vars['allPage']->value;?>

								</li>

							</ul>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
							<ul class="media-side media-list">

								<li class="media">
									<div class="media-body">
										<h4 class="meida-side-heading media-heading">热点文章</h4>
									</div>
								</li>

								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articleByView']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
								<?php if ($_smarty_tpl->tpl_vars['k']->value == 0) {?>
								<li class="media-side-li-3 media">
									<div class="media-body">
										<p><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</p>
										<h4 class="media-heading">
											<a href="?c=index&p=one&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&nid=<?php echo $_smarty_tpl->tpl_vars['v']->value['nid'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['title'],28,'……');?>
</a>
										</h4>
									</div>
								</li>
								<?php } else { ?>
								<li class="media-side-ul-li media">
									<div class="media-body">
										<p><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</p>
										<h4 class="media-heading">
											<a href="?c=index&p=one&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&nid=<?php echo $_smarty_tpl->tpl_vars['v']->value['nid'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['title'],11,'……');?>
</a>
										</h4>
										<a class="media-side-author" href="javascript:;"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['author'],6);?>
</a>
									</div>
								</li>
								<?php }?>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


							</ul>
						</div>

					</div>
				</div>
			</section>
		<?php }?>

		<!-- 其它页面中间 -->
		<?php if ($_smarty_tpl->tpl_vars['page']->value) {?>

			<!--  主体新闻部分  -->
			<section class="media-part">
				<div class="container">
					<div class="row">

						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
							<ul class="media-list">

								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articleByType']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
								<?php if (count($_smarty_tpl->tpl_vars['v']->value['pic']) == 1) {?>
								<li class="media">
									<div class="media-div">
										<div class="media-body">

											<div class="media-img row">
												<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
													<img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['v']->value['pic'][0];?>
" style="width: 179px; height: 120px;" />
												</div>

												<div class="media-text-part col-lg-10 col-md-10 col-sm-10 col-xs-10">
													<a class="media-heading" href="?c=index&p=one&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&nid=<?php echo $_smarty_tpl->tpl_vars['v']->value['nid'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['title'],20,'……');?>
</a>
													<div class="media-text">
														<a href="?c=index&m=authorArticle&id=<?php echo $_smarty_tpl->tpl_vars['artAuthorId']->value[$_smarty_tpl->tpl_vars['k']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['artAuthorName']->value[$_smarty_tpl->tpl_vars['k']->value];?>
</a>
														<p><?php echo substr($_smarty_tpl->tpl_vars['v']->value['date'],11,5);?>
</p>
														<p>阅读（<?php echo $_smarty_tpl->tpl_vars['v']->value['pageview'];?>
）</p>
														<p>
															<i class="fa fa-share-alt"></i>
															&nbsp;分享&nbsp;
															<i class="fa fa-qq fa-style"></i>
															<i class="fa fa-weibo fa-style"></i>
															<i class="fa fa-weixin fa-style"></i>
														</p>
													</div>
												</div>
											</div>

										</div>
									</div>

									<hr>

								</li>
								<?php } else { ?>
								<li class="media">
									<div class="media-div">
										<div class="media-body">
											<a class="media-heading" href="?c=index&p=one&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&nid=<?php echo $_smarty_tpl->tpl_vars['v']->value['nid'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['title'],20,'……');?>
</a>

											<div class="media-img row">

												<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < count($_smarty_tpl->tpl_vars['v']->value['pic'])) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < count($_smarty_tpl->tpl_vars['v']->value['pic']); $_smarty_tpl->tpl_vars['i']->value++) {
?>

												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
													<img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['v']->value['pic'][$_smarty_tpl->tpl_vars['i']->value];?>
" style="width: 179px; height: 120px;" />
												</div>

												<?php }
}
?>


												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
													<img src="public/imgs/temps/news-1.jpg" />
												</div>

											</div>

											<div class="media-text">

												<a href="?c=index&m=authorArticle&id=<?php echo $_smarty_tpl->tpl_vars['artAuthorId']->value[$_smarty_tpl->tpl_vars['k']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['artAuthorName']->value[$_smarty_tpl->tpl_vars['k']->value];?>
</a>
												<p><?php echo substr($_smarty_tpl->tpl_vars['v']->value['date'],11,5);?>
</p>
												<p>阅读（<?php echo $_smarty_tpl->tpl_vars['v']->value['pageview'];?>
）</p>

												<p>
													<i class="fa fa-share-alt"></i>
													&nbsp;分享&nbsp;
													<i class="fa fa-qq fa-style"></i>
													<i class="fa fa-weibo fa-style"></i>
													<i class="fa fa-weixin fa-style"></i>
												</p>

											</div>
										</div>
									</div>

									<hr>

								</li>
								<?php }?>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


								<li class="main-part-last-li text-center">
									<?php echo $_smarty_tpl->tpl_vars['allPage']->value;?>

								</li>

							</ul>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

							<ul class="media-side media-list">

								<li class="media">
									<div class="media-body">
										<h4 class="meida-side-heading media-heading">相关作家</h4>
									</div>
								</li>

								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articleByTypeViewOnce']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
								<li class="media">
									<div class="row">
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
											<img src="public/uploads/author/<?php echo $_smarty_tpl->tpl_vars['artAuthorPicView']->value[$_smarty_tpl->tpl_vars['k']->value];?>
" class="img-circle" style="height: 99px;width: 99px; padding: 12px;">
										</div>

										<div class="media-author-part col-lg-10 col-md-10 col-sm-10 col-xs-10">
											<a href="?c=index&m=authorArticle&id=<?php echo $_smarty_tpl->tpl_vars['artAuthorIdView']->value[$_smarty_tpl->tpl_vars['k']->value];?>
" class="media-author-part-a1" ><?php echo $_smarty_tpl->tpl_vars['artAuthorNameView']->value[$_smarty_tpl->tpl_vars['k']->value];?>
 </a>
											<a href="?c=index&m=authorArticle&id=<?php echo $_smarty_tpl->tpl_vars['artAuthorIdView']->value[$_smarty_tpl->tpl_vars['k']->value];?>
" class="media-author-part-a2" ><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['artAuthorLeadView']->value[$_smarty_tpl->tpl_vars['k']->value],10);?>
</a>
											<a href="?c=index&m=authorArticle&id=<?php echo $_smarty_tpl->tpl_vars['artAuthorIdView']->value[$_smarty_tpl->tpl_vars['k']->value];?>
" class="media-author-part-a3" ><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['title'],20);?>
</a>
										</div>
									</div>
								</li>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


							</ul>


							<ul class="media-side media-list">

								<li class="media">
									<div class="media-body">
										<h4 class="meida-side-heading media-heading">热点文章</h4>
									</div>
								</li>

								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articleByTypeView']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
								<?php if ($_smarty_tpl->tpl_vars['k']->value == 0) {?>
								<li class="media-side-li-3 media">
									<div class="media-body">
										<p><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</p>
										<h4 class="media-heading">
											<a href="?c=index&p=one&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&nid=<?php echo $_smarty_tpl->tpl_vars['v']->value['nid'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['title'],28,'……');?>
</a>
										</h4>
									</div>
								</li>
								<?php } else { ?>
								<li class="media-side-ul-li media">
									<div class="media-body">
										<p><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</p>
										<h4 class="media-heading">
											<a href="?c=index&p=one&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&nid=<?php echo $_smarty_tpl->tpl_vars['v']->value['nid'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['title'],11,'……');?>
</a>
										</h4>
										<a class="media-side-author" href="javascript:;"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['author'],6);?>
</a>
									</div>
								</li>
								<?php }?>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


							</ul>

						</div>

					</div>
				</div>
			</section>

		<?php }?>

		<!-- 文章详情 -->
		<?php if ($_smarty_tpl->tpl_vars['one']->value) {?>
		<section class="media-part">
			<div class="container">
				<div class="row">

					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
						<ul class="media-list">

							<li class="media">
								<div class="media-div">
									<div class="media-body">
										<h3 style="margin-bottom: 30px"><?php echo $_smarty_tpl->tpl_vars['oneArticle']->value[0]['title'];?>
</h3>
										<table style="width: 50%; text-align: center;margin-bottom: 30px">
											<tr>
												<td style="border-right: 1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['artAuthorNameView']->value[0];?>
</td>
												<td style="color: #9d9d9d;border-right: 1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['oneArticle']->value[0]['date'];?>
</td>
												<td style="color: #9d9d9d">阅读：<?php echo $_smarty_tpl->tpl_vars['oneArticle']->value[0]['pageview'];?>
</td>
											</tr>
										</table>
										<hr style="margin-bottom: 30px">
										<div style="margin-bottom: 60px;"><?php echo $_smarty_tpl->tpl_vars['oneArticle']->value[0]['content'];?>
</div>
										<div style="margin-left: 25px;margin-bottom: 30px;">
											<p style="font-size: 18px;">版权声明</p>
											<br>
											<p>本文仅代表作者观点，不代表百度立场。</p>
											<p style="margin-bottom: 60px;">本文系作者授权百度百家发表，未经许可，不得转载。</p>
											<p style="font-size: 18px; display: inline-block;">阅读量：<a style="color: #ff0000"><?php echo $_smarty_tpl->tpl_vars['oneArticle']->value[0]['pageview'];?>
</a></p>
											<table style="width:14%;text-align: center;float:right;display: inline-block;font-size: 18px;color: #9d9d9d">
												<tr>
													<?php echo $_smarty_tpl->tpl_vars['likeArticle']->value;?>

												</tr>
											</table>
										</div>
										<?php echo '<script'; ?>
 type="text/javascript">
											$('#oup').click(function () {
												$('#oupi').removeClass('fa-thumbs-o-up');
												$('#oupi').addClass('fa-thumbs-up');
                                            });
                                            $('#odown').click(function () {
                                                $('#odowni').removeClass('fa-thumbs-o-down');
                                                $('#odowni').addClass('fa-thumbs-down');
                                            });
										<?php echo '</script'; ?>
>
										<hr style="margin-bottom: 30px">
										<div style="margin-left: 25px;margin-bottom: 60px;">
											&nbsp;<p style="font-size: 18px;">分享</p>
											<i class="fa fa-qq" style="font-size: 24px; color: #00b7ee; border: 1px solid #00b7ee;border-radius: 50%;padding: 10px;"></i>
											<i class="fa fa-weibo" style="font-size: 24px; color: #ff0000; border: 1px solid #ff0000;border-radius: 50%;padding: 10px;"></i>
											<i class="fa fa-weixin" style="font-size: 24px; color: #228b22; border: 1px solid #228b22;border-radius: 50%;padding: 10px;"></i>
										</div>
									</div>
								</div>
							</li>

						</ul>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<ul class="media-side media-list">
							<li class="media">
								<div class="media-body">
									<div class="row" style="background: #fbfbfb;border-bottom: 1px solid #F2F2F2;">
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
											<img src="public/uploads/author/<?php echo $_smarty_tpl->tpl_vars['artAuthorPicView']->value[0];?>
" class="img-circle" style="height: 90px;width: 90px; padding: 12px;">
										</div>

										<div class="media-author-part-1 col-lg-10 col-md-10 col-sm-10 col-xs-10">
											<a href="?c=index&m=authorArticle&id=<?php echo $_smarty_tpl->tpl_vars['artAuthorIdView']->value[0];?>
" class="media-author-part-a1" ><?php echo $_smarty_tpl->tpl_vars['artAuthorNameView']->value[0];?>
 </a>
											<a href="?c=index&m=authorArticle&id=<?php echo $_smarty_tpl->tpl_vars['artAuthorIdView']->value[0];?>
" class="media-author-part-a2" ><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['artAuthorLeadView']->value[0],10);?>
</a>
										</div>
									</div>
								</div>
							</li>

							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['authorArticle']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
							<li class="media-side-ul-li media">
								<div class="media-body">
									<p><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</p>
									<h4 class="media-heading">
										<a href="?c=index&p=one&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&nid=<?php echo $_smarty_tpl->tpl_vars['v']->value['nid'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['title'],11,'……');?>
</a>
									</h4>
								</div>
							</li>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</ul>

						<ul class="media-side media-list">

							<li class="media">
								<div class="media-body">
									<h4 class="meida-side-heading media-heading">热点文章</h4>
								</div>
							</li>

							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articleByTypeView']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
							<?php if ($_smarty_tpl->tpl_vars['k']->value == 0) {?>
							<li class="media-side-li-3 media">
								<div class="media-body">
									<p><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</p>
									<h4 class="media-heading">
										<a href="?c=index&p=one&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&nid=<?php echo $_smarty_tpl->tpl_vars['v']->value['nid'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['title'],28,'……');?>
</a>
									</h4>
								</div>
							</li>
							<?php } else { ?>
							<li class="media-side-ul-li media">
								<div class="media-body">
									<p><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</p>
									<h4 class="media-heading">
										<a href="?c=index&p=one&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&nid=<?php echo $_smarty_tpl->tpl_vars['v']->value['nid'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['title'],11,'……');?>
</a>
									</h4>
									<a class="media-side-author" href="javascript:;"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['author'],6);?>
</a>
								</div>
							</li>
							<?php }?>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


						</ul>
					</div>

				</div>
			</div>
		</section>
		<?php }?>


		<!-- 固定二维码返回顶部 -->
		<ul class="erweima">
			<li id="showerweima"></li>
			<li id="scrolltop"></li>
		</ul>
		<div class="download-qrcode">
			<div class="qrcode-img">
				<img src="public/imgs/logos/news-qrcode_8fe3c4d.png">
			</div>
			<div class="qrcode-slogan">
				<h3>百度新闻客户端</h3>
				<ul>
					<li>扫描二维码下载</li>
					<li>订阅“百家”频道</li>
					<li>观看更多百家精彩新闻</li>
				</ul>
			</div>
		</div>

		<!--  页尾部分   -->
		<?php $_smarty_tpl->_subTemplateRender("file:home/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		
		<!-- 自定义操作 -->
		<?php echo '<script'; ?>
 src="public/js/operation.js"><?php echo '</script'; ?>
>


		
	</body>
</html><?php }
}
