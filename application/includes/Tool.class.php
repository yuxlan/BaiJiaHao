<?php

//final:这样的类不能被继承
final class Tool{
    //一个滚动条方法
    public static function progress($_msg,$_url,$_flag,$_t){
        $css="<style type='text/css'>";
        $css.=".progressBox{ width: 30%; height: 30px; position: absolute; top:0; bottom:0; left:0; right:0; margin: auto; }";
        $css.="</style>";
        $str="<div class='progressBox'><div class='progress progress-striped'><div class='progress-bar' 
                data-msg='$_msg' data-url='$_url' 
                data-flag='$_flag' data-t='$_t'></div></div></div>";
        $js="<script type='text/javascript'>";
        $js.="var progress_bar=$('.progress-bar'); var data=progress_bar[0].dataset; var color; if(data.flag==1){ color='progress-bar-success'; }else if(data.flag==0){ color='progress-bar-danger'; } var progressI=0; function autoProgress() { progress_bar.css('width',progressI+'%').html(data.msg) .addClass(color); if(progressI==100){ setTimeout(function () { location.href=data.url; },500) } if(progressI<100){ setTimeout(autoProgress,data.t*10); } progressI++; } autoProgress();";
        $js.="</script>";
        echo $css.$str.$js;
    }
}



?>