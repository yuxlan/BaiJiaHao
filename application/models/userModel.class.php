<?php

class userModel extends Model{
    public function verifyUser($user,$pwd){
        return parent::get('user',"where user='".$user."' and pwd='".$pwd."'");
    }

//    更新用户信息
    public function updateUser($array){
        return parent::update('user',$array);
    }
}












?>