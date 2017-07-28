<?php

class adModel extends Model{
//    添加数据
    public function addAd($array){
        return parent::add('ad',$array);
    }
}








?>