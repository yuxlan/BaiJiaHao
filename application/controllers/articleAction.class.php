<?php

class articleAction extends Action{
    public function main(){
        switch ($_GET['action']){
            case 'add':
                $this->add();
                break;
            case 'show':
                $this->show();
                break;
            case 'update':
                $this->update();
                break;
            case 'delete':
                $this->delete();
                break;
            case 'state':
                $this->state();
                break;
        }
        $this->smarty->display('admin/article.html');
    }

//    添加文章
    private function add(){
        $this->smarty->assign('add',true);
//        获取到导航的数据
        $nav = $this->model->getNav();
        $this->smarty->assign('navData',$nav);
//        var_dump($_POST);
//        var_dump($_FILES);
    }

//    显示文章
    private function show(){
        $this->smarty->assign('show',true);
    }

//    修改文章
    private function update(){
        $this->smarty->assign('update',true);
    }

//    删除文章
    private function delete(){

    }

//    状态
    private function state(){

    }
}








?>