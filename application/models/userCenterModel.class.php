<?php

class userCenterModel extends Model{
    public function getArticle($where,$limit=null){
        return parent::get('article',$where,$limit);
    }

    public function getNav(){
        return parent::get('nav');
    }

    //    获取文章
    public function getArt($limit){
        return parent::get('article','order by id desc',$limit);
    }

    public function totalArt(){
        return parent::total('article');
    }

    //    获取文章
    public function getOneArt($id){
        return parent::get('article','where id='.$id);
    }

    //    获取
    public function getUser($id){
        return parent::get('user','where id='.$id);
    }

    //    获取一条导航数据
    public function getOne($id){
        return parent::get('nav','where id='.$id);
    }

//    删除数据
    public function deleteArt($id){
        return parent::delete('article','where id in ('.$id.')');
    }

    //    添加文章
    public function addArt($array){
        return parent::add('article',$array);
    }

    //    更新数据
    public function updateArt($array,$id){
        return parent::update('article',$array,'where id='.$id);
    }

    //    更新数据
    public function updateUser($array,$id){
        return parent::update('user',$array,'where id='.$id);
    }
}






?>