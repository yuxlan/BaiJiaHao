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
            case 'delete':
                $this->delete();
                break;
            case 'state':
                $this->state();
                break;
        }
        $this->smarty->display('admin/nav.html');
    }

    private function show(){
        $this->smarty->assign('show',true);
//        获取所有数据
        $_total = $this->model->getAll();
//        分页类
        $page = new Page($_total,6);
//        获取导航数据
        $navData = $this->model->getNav($page->limit);

        foreach ($navData as $k=>$v){
            switch ($v['state']){
                case 1:
                    $navData[$k]['state'] = "<span style='color: green;'>[显示]</span><a href='?c=nav&action=state&flag=hide&id=".$v['id']."' style='color: red'>[隐藏]</a>";
                    break;
                case 0:
                    $navData[$k]['state'] = "<span style='color: red;'>[隐藏]</span><a href='?c=nav&action=state&flag=show&id=".$v['id']."' style='color: green'>[显示]</a>";
                    break;
            }
        }
//        赋值变量
        $this->smarty->assign('navData',$navData);
//        分页显示
        $allPage = $page->allPages('?c=nav&action=show');
//        赋值
        $this->smarty->assign('allPage',$allPage);
//        排序
        if ($_POST['sort']){
            $num = $this->model->setSort($_POST['sort']);
            if ($num > 0){
                Tool::progress('排序成功','?c=nav&action=show',1,1);
            } else if ($num == 0) {
                Tool::progress('没有排序','?c=nav&action=show',1,1);
            } else {
                Tool::progress('排序失败','?c=nav&action=show',0,1);
            }
        }
//        var_dump($_POST);
//        多条删除
        if ($_POST['delete']){
//            var_dump($_POST);
            if (count($_POST['checked']) > 0){
                $ids = implode(',',$_POST['checked']);
//                var_dump($ids);
                $result = $this->model->deleteNav($ids);
                if ($result > 0){
                    Tool::progress('删除成功','?c=nav&action=show',1,1);
                } else {
                    Tool::progress('删除失败','?c=nav&action=show',0,1);
                }
            }
        }
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

    private function delete(){
        $this->smarty->assign('delete',true);
//        var_dump($_GET['id']);
        $result = $this->model->deleteNav($_GET['id']);
        if ($result){
            Tool::progress("删除成功",'?c=nav&action=show',1,1);
        }  else{
            Tool::progress("删除失败",'?c=nav&action=show',0,1);
        }
    }

//    导航状态改变
    private function state(){
//        var_dump($_GET);
        if ($_GET['flag'] == 'show'){
            $state = 1;
        }
        if ($_GET['flag'] == 'hide'){
            $state = 0;
        }
        $array = array('state'=>$state);
        $result = $this->model->updateNav($array,$_GET['id']);
        if ($result){
            Tool::progress("状态改变成功",'?c=nav&action=show',1,1);
        }  else{
            Tool::progress("状态改变失败",'?c=nav&action=show',0,1);
        }
    }
}

?>