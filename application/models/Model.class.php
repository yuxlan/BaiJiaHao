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
//        var_dump($data);
        return $data;
    }

//    获取数据总数
    protected function total($_table,$where=null){
        $sql = "select * from ".$_table." ".$where;
//        rowCount()  获取总数
        $result = $this->db->query($sql)->rowCount();
        return $result;
    }

//    添加数据
    protected function add($_table,$array){
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
    protected function update($_table,$array,$_where=null){
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

//    删除数据
    protected function delete($_table,$_where=null){
        $sql = "delete from ".$_table." ".$_where;
//        var_dump($sql);
        $result = $this->db->exec($sql);
//        var_dump($result);
        return $result;
    }

//    排序方法
    protected function sort($_table,$_sorts){
        $num = 0;
        foreach ($_sorts as $k=>$v){
            $sql = "update $_table set sort=$v where id=$k";
            $this->db->exec($sql);
        }
        return $num;
    }
}



















?>