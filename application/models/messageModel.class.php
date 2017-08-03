<?php

class messageModel extends Model{
    //    获取
    public function getUser($id){
        return parent::get('user','where id='.$id);
    }

    //    更新数据
    public function updateUser($array,$id){
        return parent::add('user',$array);
    }
}




?>