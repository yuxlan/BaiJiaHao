<?php

class indexModel extends Model {
//    获取导航
    public function getNav(){
        return parent::get('nav','where state=1 order by sort asc','limit 0,6');
    }
}


?>