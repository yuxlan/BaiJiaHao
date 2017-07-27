<?php

class navModel extends Model{
//    获取所有导航数据
    public function getNav($limit){
        return parent::get('nav','order by sort asc',$limit);
    }

    public function getAll(){
        return parent::total('nav');
    }

//    获取一条导航数据
    public function getOne($id){
        return parent::get('nav','where id='.$id);
    }

//    添加导航
    public function addNav($array){
        return parent::add('nav',$array);
    }

//    更新数据
    public function updateNav($array,$id){
        return parent::update('nav',$array,'where id='.$id);
    }

//    获取下一个id
    public function getNextId(){
        return parent::nextId('nav');
    }

//    删除数据
    public function deleteNav($id){
        return parent::delete('nav','where id in ('.$id.')');
    }

//    排序方法
    public function setSort($sorts){
        return parent::sort('nav',$sorts);
    }
}












?>