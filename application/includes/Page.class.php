<?php

//   生成分页类

class Page{
    public $limit;
    private $currentPage; // 当前页
    private $total; // 数据总数
    private $pageNum; // 总页数
    private $listRows; // 每页数目
    private $num;

    public function __construct($total,$listRows=5,$num=3){
        $this->currentPage = empty($_POST['page'])?1:$_POST['page'];
        $this->total = $total;
        $this->listRows=$listRows;
        $this->num=$num;
//        ceil():上舍 向上取整
        $this->pageNum = ceil($this->total/$this->listRows);
        $this->limit = "limit ".($this->currentPage-1)*$this->listRows.",$this->listRows";

    }

    public function allPages($url){
        $str='<ul class="pagination">';
        $str.="<li ><a href=javascript:show(1,'".$url."')>&laquo;</a></li>";
        for($i=1;$i<=$this->pageNum;$i++){
            if($i==$this->currentPage){
                $str.="<li class='active'><a href=javascript:show($i,'".$url."')>第 $i 页</a></li>";
            }else if($this->currentPage-$this->num < $i&&$i < $this->currentPage+$this->num){
                $str.="<li><a href=javascript:show($i,'".$url."')>第 $i 页</a></li>";
            }else if($this->currentPage-$this->num == $i||$i == $this->currentPage+$this->num){
                $str.="<li><a href=javascript:show($i,'".$url."')>...</a></li>";
            }else{
                continue;
            }
        }
        $str.="<li><a href=javascript:show($this->pageNum,'".$url."')>&raquo;</a></li>";
        $str.='</ul>';
        $js='<script type="text/javascript">';
        $js.="function show(page,url) { var xhr=null; try{ xhr=new XMLHttpRequest(); }catch (e){ /*兼容ie5，ie6浏览器*/ xhr=new ActiveXObject('Microsoft.XHLHTTP'); } xhr.open('post', url); xhr.setRequestHeader(\"content-type\", \"application/x-www-form-urlencoded,charset=UTF-8\"); xhr.send('page=' + page); xhr.onreadystatechange = function () { if (xhr.readyState == 4 && xhr.status == 200) { document.querySelector('html').innerHTML=xhr.responseText; } } }";
        $js.='</script>';
        return $str.$js;
    }
}










?>