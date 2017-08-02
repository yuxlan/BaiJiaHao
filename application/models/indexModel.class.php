<?php

class indexModel extends Model {
//    获取导航
    public function getNav(){
        return parent::get('nav','where state=1 order by sort asc','limit 0,6');
    }

    //    获取文章作者
    public function getAuthor($a_id){
        return parent::get('user','where id='.$a_id);
    }

    //    获取不重复的文章作者
    public function getAuthorNo($where,$limit){
        return parent::getno('author_id','article',$where,$limit);
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


    public function getNavForArt(){
        return parent::get('nav');
    }

    //    添加文章
    public function addArt($array){
        return parent::add('article',$array);
    }
}


?>