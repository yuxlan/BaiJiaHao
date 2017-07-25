<?php


class indexAction extends Action {
//    链接路径

    public function main(){
        $this->smarty->display('home/index.html');
    }

    public function keJi(){
        $this->smarty->display('home/vicepage.html');
    }

    public function register(){
        $this->smarty->display('home/register.html');
    }
}





?>