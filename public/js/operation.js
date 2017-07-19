/*
 * Written By YuXLan
 */


$(function(){
	
//  登录注册弹出遮罩层
	$("#btn").click(function(){
		$("#myModal").modal("show");
	});
	$("#myModal").modal({
		show:false,
		backdrop:true,   // 控制背景
		keyboard:true,   // 键盘，点击退出可隐藏
		remote:"login.html"  // 远程获取内容，填充到modal-content容器中
	})
	
	
// 	图片轮播
	$("#myLb").carousel({
		interval:2000
	})	
	var lh = $(".carousel-inner img").height();
	$(".carousel-control").css("line-height",lh+"px");
	$(window).resize(function(){
		var $height = $(".carousel-inner img").eq(0).height();
		$(".carousel-control").css("line-height",'$height+"px"');
	})
	
})