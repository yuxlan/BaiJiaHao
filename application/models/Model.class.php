<?php

class Model{
//    连接数据库
    protected $db;

    public function __construct(){
        try{
            $this->db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'',''.USER.'',''.PASSWORD.'');
        }catch (PDOException $e){
            exit($e->getMessage());
        }finally{
            $this->db->query('set name utf8');
        }
    }
}



















?>