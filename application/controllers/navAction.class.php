<?php

class navAction extends Action{
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
        }
        $this->smarty->display('admin/nav.html');
    }

    private function show(){
        $this->smarty->assign('show',true);
//        分页类
        $page = new Page(6);
//        获取导航数据
        $navData = $this->model->getNav($page->limit);
//        赋值变量
        $this->smarty->assign('navData',$navData);
//        分页显示
        $allPage = $page->allPages('?c=nav&action=show');
//        赋值
        $this->smarty->assign('allPage',$allPage);
    }

    private function add(){
        $this->smarty->assign('add',true);

        if ($_POST['send']){
            $array = array(
                'name'=>$_POST['navName'],
                'decs'=>$_POST['navDecs'],
                'state'=>1,
                'sort'=>$this->model->getNextId(),
                'date'=>date('Y-m-d H:i:s')
            );
            $result = $this->model->addNav($array);
            if ($result){
                Tool::progress("添加成功","?c=nav&action=show",1,2);
            } else{
                Tool::progress("添加失败","",0,2);
            }
        }
    }

    private function update(){
        $this->smarty->assign('update',true);
        $data = $this->model->getOne($_GET['id']);
        $this->smarty->assign('data',$data);

        if ($_POST['send']){
            $array = array(
                'name'=>$_POST['navName'],
                'decs'=>$_POST['navDecs']
            );
            $result = $this->model->updateNav($array,$_GET['id']);
            if ($result == 1){
                Tool::progress("修改成功",$_SERVER['HTTP_REFERER'],1,2);
            } else if ($result == 0){
                Tool::progress("没有修改",$_SERVER['HTTP_REFERER'],1,2);
            } else{
                Tool::progress("修改失败",$_SERVER['HTTP_REFERER'],0,2);
            }
        }
    }
}














?>