<?php

class indexModel extends Model {
//    获取导航
    public function getNav(){
        return parent::get('nav','where state=1 order by sort asc','limit 0,6');
    }

    public function getAd(){
        return parent::get('ad','where state=1 order by id desc','limit 0,6');
    }

    public function getArticle($where,$limit=null){
        return parent::get('article',$where,$limit);
    }

    public function totalArticle($where=null){
        return parent::total('article',$where);
    }

    public function updateView($array,$where){
        return parent::update('article',$array,$where);
    }
}


?>