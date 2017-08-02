<?php

class uManageModel extends Model{
//    获取所有数据
    public function getUser($limit){
        return parent::get('user','order by id desc',$limit);
    }

//    获取总的条数
    public function getAll(){
        return parent::total('user');
    }

//    获取一条数据
    public function getOne($id){
        return parent::get('user','where id='.$id);
    }


//    更新用户状态
    public function updateUser($array,$id){
        return parent::update('user',$array,'where id='.$id);
    }


//    更新文章状态
    public function updateArticle($array,$id){
        return parent::update('article',$array,'where author_id='.$id);
    }

//    获取下一个id
    public function getNextId(){
        return parent::nextId('user');
    }

//    删除数据
    public function deleteUser($id){
        return parent::delete('user','where id in ('.$id.')');
    }

//    删除数据
    public function deleteArticle($id){
        return parent::delete('article','where author_id in ('.$id.')');
    }

}



?>