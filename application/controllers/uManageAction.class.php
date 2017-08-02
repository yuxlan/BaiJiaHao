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
            case 'update':
                $this->update();
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
//        获取数据
        $userData = $this->model->getUser($page->limit);

        foreach ($userData as $k=>$v){
            switch ($v['state']){
                case 1:
                    $userData[$k]['state'] = "<span style='color: green;'>[解禁]</span><a href='?c=uManage&action=state&flag=hide&id=".$v['id']."' style='color: red'>[封号]</a>";
                    break;
                case 0:
                    $userData[$k]['state'] = "<span style='color: red;'>[封号]</span><a href='?c=uManage&action=state&flag=show&id=".$v['id']."' style='color: green'>[解禁]</a>";
                    break;
            }
        }
//        赋值变量
        $this->smarty->assign('userData',$userData);
//        分页显示
        $allPage = $page->allPages('?c=uManage&action=show');
//        赋值
        $this->smarty->assign('allPage',$allPage);
//        多条删除
        if ($_POST['delete']){
//            var_dump($_POST);
            if (count($_POST['checked']) > 0){
                $ids = implode(',',$_POST['checked']);

                $result = $this->model->deleteUser($ids);
                $result1 = $this->model->deleteArticle($ids);
                if ($result > 0 && $result1 > 0){
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
        $result1 = $this->model->deleteArticle($_GET['id']);
        if ($result && $result1){
            Tool::progress("删除成功",'?c=uManage&action=show',1,1);
        }  else{
            Tool::progress("删除失败",'?c=uManage&action=show',0,1);
        }
    }

//    状态改变
    private function state(){
        if ($_GET['flag'] == 'show'){
            $state = 1;
        }
        if ($_GET['flag'] == 'hide'){
            $state = 0;
        }
        $array = array('state'=>$state);
        $result = $this->model->updateUser($array,$_GET['id']);
        $result1 = $this->model->updateArticle($array,$_GET['id']);
        if ($result && $result1){
            Tool::progress("状态改变成功",'?c=uManage&action=show',1,1);
        }  else{
            Tool::progress("状态改变失败",'?c=uManage&action=show',0,1);
        }
    }

    private function update(){
        $this->smarty->assign('update',true);
        $data = $this->model->getOne($_GET['id']);
        $this->smarty->assign('data',$data);

        if ($_POST['send']){
            $array = array(
                'level_id'=>$_POST['levelId']
            );
            $result = $this->model->updateUser($array,$_GET['id']);
            if ($result == 1){
                Tool::progress("修改成功",'?c=uManage&action=show',1,1);
            } else if ($result == 0){
                Tool::progress("没有修改",'?c=uManage&action=show',1,1);
            } else{
                Tool::progress("修改失败",'?c=uManage&action=show',0,1);
            }
        }
    }
}




?>