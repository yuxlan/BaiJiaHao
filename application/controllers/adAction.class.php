<?php

class adAction extends Action{
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
        $this->smarty->display('admin/ad.html');
    }

//    添加广告
    private function add(){
        $this->smarty->assign('add',true);
        if ($_POST['send']){
//            var_dump($_POST);
//            var_dump($_FILES);
            $upload = new UpLoads(array('path'=>'public/uploads/ad','fileName'=>'adPic'));
            if ($upload->upload()){
                $array = array(
                    'title'=>$_POST['adName'],
                    'link'=>$_POST['adLink'],
                    'pic'=>$upload->getName(),
                    'decs'=>$_POST['adDecs'],
                    'state'=>1,
                    'date'=>date('Y-m-d H:i:s')
                );
                $result = $this->model->addAd($array);
                if ($result){
                    Tool::progress('添加成功','?c=ad&action=show',1,1);
                } else{
                    Tool::progress('添加失败','?c=ad&action=add',0,1);
                }
            } else{
                Tool::progress($upload->getErrorMsg(),'?c=ad&action=add',0,1);
            }
        }
    }

//    显示广告
    private function show(){
        $this->smarty->assign('show',true);
    }

//    修改广告
    private function update(){
        $this->smarty->assign('update',true);
    }

//    删除广告
    private function delete(){

    }

//    状态
    private function state(){

    }
}











?>