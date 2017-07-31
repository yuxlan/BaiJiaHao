<?php

class adModel extends Model{
//    添加数据
    public function addAd($array){
        return parent::add('ad',$array);
    }

    public function totalAd(){
        return parent::total('ad');
    }

    public function getAd(){
        return parent::get('ad');
    }
//    获取一条数据
    public function getOneAd($id){
        return parent::get('ad','where id='.$id);
    }

    //    删除数据
    public function deleteAd($id){
        return parent::delete('ad','where id in ('.$id.')');
    }

    //    更新数据
    public function updateAd($array,$id){
        return parent::update('ad',$array,'where id='.$id);
    }
}








?>