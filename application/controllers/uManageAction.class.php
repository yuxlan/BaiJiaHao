<?php

class uManageAction extends Action{
    public function main(){
        switch ($_GET['action']){
            case 'show':
                $this->show();
                break;
            case 'delete':
                $this->delete();
                break;
            case 'state':
                $this->state();
                break;
        }
        $this->smarty->display('admin/uManage.html');
    }

    private function show(){
        $this->smarty->assign('show',true);
//        获取所有数据
        $_total = $this->model->getAll();
//        分页类
        $page = new Page($_total,6);
//        获取导航数据
        $navData = $this->model->getUser($page->limit);

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
        $allPage = $page->allPages('?c=uManage&action=show');
//        赋值
        $this->smarty->assign('allPage',$allPage);
//        var_dump($_POST);
//        多条删除
        if ($_POST['delete']){
//            var_dump($_POST);
            if (count($_POST['checked']) > 0){
                $ids = implode(',',$_POST['checked']);
//                var_dump($ids);
                $result = $this->model->deleteUser($ids);
                if ($result > 0){
                    Tool::progress('删除成功','?c=uManage&action=show',1,1);
                } else {
                    Tool::progress('删除失败','?c=uManage&action=show',0,1);
                }
            }
        }
    }

    private function delete(){
        $this->smarty->assign('delete',true);
//        var_dump($_GET['id']);
        $result = $this->model->deleteUser($_GET['id']);
        if ($result){
            Tool::progress("删除成功",'?c=uManage&action=show',1,1);
        }  else{
            Tool::progress("删除失败",'?c=uManage&action=show',0,1);
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