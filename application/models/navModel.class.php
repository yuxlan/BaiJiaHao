<?php

class navModel extends Model{
//    获取所有导航数据
    public function getNav($limit){
        return parent::get('nav','order by sort asc',$limit);
    }

//    获取一条导航数据
    public function getOne($id){
        return parent::get('nav','where id='.$id);
    }

//    添加导航
    public function addNav($array){
        return parent::add('nav',$array);
    }

    public function updateNav($array,$id){
        return parent::update('nav',$array,'where id='.$id);
    }

//    获取下一个id
    public function getNextId(){
        return parent::nextId('nav');
    }
}












?>