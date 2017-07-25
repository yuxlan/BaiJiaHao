/*
 * Written By YuXLan
 */


var mouseStartPoint = {"left":0,"top":  0};
var mouseEndPoint = {"left":0,"top":  0};
var mouseDragDown = false;
var oldP = {"left":0,"top":  0};
var moveTartet ;

$(function(){
	
//  登录注册弹出遮罩层
	$("#btn").click(function(){
		$("#myModal").modal("show");
	});
	$("#myModal").modal({
		show:false,
		backdrop:true,   // 控制背景
		keyboard:true   // 键盘，点击退出可隐藏
		// remote:"login.html"  // 远程获取内容，填充到modal-content容器中
	});


//  模态框拖动
    $(document).on("mouseover",function () {
        $(".modal-header").css("cursor","move");
    });
    $(document).on("mousedown",".modal-header",function(e){
        if($(e.target).hasClass("close"))//点关闭按钮不能移动对话框
            return;
        mouseDragDown = true;
        moveTartet = $(this).parent();
        mouseStartPoint = {"left":e.clientX,"top":  e.clientY};
        oldP = moveTartet.offset();
        $(".modal-header").css("cursor","move");
    });
    $(document).on("mouseup",function(e){
        mouseDragDown = false;
        moveTartet = undefined;
        mouseStartPoint = {"left":0,"top":  0};
        oldP = {"left":0,"top":  0};
    });
    $(document).on("mousemove",function(e){
        if(!mouseDragDown || moveTartet == undefined)return;
        var mousX = e.clientX;
        var mousY = e.clientY;
        if(mousX < 0)mousX = 0;
        if(mousY < 0)mousY = 25;
        mouseEndPoint = {"left":mousX,"top": mousY};
        var width = moveTartet.width();
        var height = moveTartet.height();
        mouseEndPoint.left = mouseEndPoint.left - (mouseStartPoint.left - oldP.left);//移动修正，更平滑
        mouseEndPoint.top = mouseEndPoint.top - (mouseStartPoint.top - oldP.top);
        moveTartet.offset(mouseEndPoint);
    });


// 	图片轮播
	$("#myLb").carousel({
		interval:3500
	});
	var lh = $(".carousel-inner img").height();
	$(".carousel-control").css("line-height",lh+"px");
	$(window).resize(function(){
		var $height = $(".carousel-inner img").eq(0).height();
		$(".carousel-control").css("line-height",'$height+"px"');
	});

//	周榜日榜切换
    $("#dayclick").click(function () {
        $("#day").css("display","block");
        $("#week").css("display","none");
        $("#dayclick").addClass("active");
        $("#weekclick").removeClass("active");
    });
    $("#weekclick").click(function () {
        $("#day").css("display","none");
        $("#week").css("display","block");
        $("#dayclick").removeClass("active");
        $("#weekclick").addClass("active");
    });

//	返回顶部
	$(window).scroll(function(){
		var sc=$(window).scrollTop();
		var rwidth=$(window).width();
		if(sc>0){
			$("#scrolltop").css("display","block");
		}else{
			$("#scrolltop").css("display","none");
		}
	});
	$("#scrolltop").click(function(){
		var sc=$(window).scrollTop();
		$('body,html').animate({scrollTop:0},500);
	});

//	显示下载二维码
	$("#showerweima").mouseover(function () {
		$(".download-qrcode").css("display","block");
    });
    $("#showerweima").mousedown(function () {
        $(".download-qrcode").css("display","block");
    });
    $("#showerweima").mouseleave(function () {
        $(".download-qrcode").css("display","none");
    });

//    登陆方式切换
	$(".modal-logo-erweima").click(function () {
		$(".zhanghao-login").css("display","none");
		$(".erweima-login").css("display","block");
    });
    $(".modal-logo-zhanghao").click(function () {
        $(".zhanghao-login").css("display","block");
        $(".erweima-login").css("display","none");
    });

});