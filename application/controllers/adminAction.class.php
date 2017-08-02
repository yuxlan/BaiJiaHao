<?php

class adminAction extends Action{
    public function main(){
        if(!isset($_SESSION['admin']) && isset($_SESSION['user'])){
            header('location:?c=user&action=warning');
        }else if  (!isset($_SESSION['admin'])){
            header('location:?c=user&action=login');
        }
        $this->smarty->display('admin/admin.html');
    }

    public function welcome(){
        $this->smarty->display('admin/welcome.html');
    }
}







?>