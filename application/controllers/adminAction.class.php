<?php

class adminAction extends Action{
    public function main(){
        $this->smarty->display('admin/admin.html');
    }

    public function welcome(){
        $this->smarty->display('admin/welcome.html');
    }
}







?>