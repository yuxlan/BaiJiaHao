<?php

class articleModel extends Model{

    //    获取一条导航数据
    public function getOne($id){
        return parent::get('nav','where id='.$id);
    }

    //    获取文章作者
    public function getAuthor($a_id){
        return parent::get('user','where id='.$a_id);
    }

//    获取文章的总数
    public function totalArt(){
        return parent::total('article');
    }

    //    获取文章
    public function getArt($limit){
        return parent::get('article','order by id desc',$limit);
    }

    //    获取文章
    public function getOneArt($id){
        return parent::get('article','where id='.$id);
    }

//    删除数据
    public function deleteArt($id){
        return parent::delete('article','where id in ('.$id.')');
    }

    //    更新数据
    public function updateArt($array,$id){
        return parent::update('article',$array,'where id='.$id);
    }
}














?>