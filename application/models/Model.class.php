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
            $this->db->query('set names utf8');
        }
    }

//    获取所有数据
    protected function get($_table,$_where=null,$_limit=null){
        $sql = "select * from ".$_table." ".$_where." ".$_limit;
        $result = $this->db->query($sql);
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

//    添加数据
    protected function add($_table,$array){
//        key1=>value1,key2=>value2……
        $_key = null;
        $_value = null;
        foreach ($array as $key=>$value){
            $_key .= $key.',';
            if (is_int($value)){
                $_value .= $value.',';
            } else {
                $_value .= "'".$value."',";
            }
        }
        $_key = rtrim($_key,',');
        $_value = rtrim($_value,',');
        $sql = "insert into ".$_table." ($_key)values($_value)";
        $result = $this->db->exec($sql);
        return $result;
    }

//    修改数据
    protected function update($_table,$array,$_where){
        $str = null;
        foreach ($array as $key=>$value){
            $str .= $key."='".$value."',";
        }
        $str = rtrim($str,',');
        $sql = "update ".$_table." set ".$str." ".$_where;
        $result = $this->db->exec($sql);
        return $result;
    }

//    获取下一个id
    protected function nextId($_table){
        $sql = "show table status like '".$_table."'";
        $result = $this->db->query($sql);
        $data = $result->fetchObject()->Auto_increment;
        return $data;
    }
}



















?>