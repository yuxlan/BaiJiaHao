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
//        获取所有数据
        $_total = $this->model->totalAd();
//        分页类
        $page = new Page($_total,6);
//        获取广告数据
        $adData = $this->model->getAd($page->limit);

//        var_dump($adData);

        foreach ($adData as $k=>$v) {
            switch ($v['state']) {
                case 1:
                    $adData[$k]['state'] = "<span style='color: green;'>[显示]</span><a href='?c=ad&action=state&flag=hide&id=" . $v['id'] . "' style='color: red'>[隐藏]</a>";
                    break;
                case 0:
                    $adData[$k]['state'] = "<span style='color: red;'>[隐藏]</span><a href='?c=ad&action=state&flag=show&id=" . $v['id'] . "' style='color: green'>[显示]</a>";
                    break;
            }
        }
//        赋值变量
        $this->smarty->assign('adData',$adData);
//        分页显示
        $allPage = $page->allPages('?c=ad&action=show');
//        赋值
        $this->smarty->assign('allPage',$allPage);
//        多条删除
        if ($_POST['delete']){
//            var_dump($_POST);
            if (count($_POST['checked']) > 0){
                $ids = implode(',',$_POST['checked']);
//                var_dump($ids);
                $result = $this->model->deleteAd($ids);
                if ($result > 0){
                    Tool::progress('删除成功','?c=ad&action=show',1,1);
                } else {
                    Tool::progress('删除失败','?c=ad&action=show',0,1);
                }
            }
        }
    }

//    修改广告
    private function update(){
        $this->smarty->assign('update',true);
        $data = $this->model->getOneAd($_GET['id']);
        $this->smarty->assign('data',$data);

        if ($_POST['send']){
                if($_FILES['adPicUpdate']['error']==4){
                    $picName = $data[0]['pic'];
                } else{
                    $upload = new UpLoads(array('path'=>'public/uploads/ad','fileName'=>'adPicUpdate'));
                    if ($upload->upload()){
                        $picName = $upload->getName();
                    }
                }
                $array = array(
                    'title'=>$_POST['adName'],
                    'link'=>$_POST['adLink'],
                    'pic'=>$picName,
                    'decs'=>$_POST['adDecs'],
                    'state'=>1,
                    'date'=>date('Y-m-d H:i:s')
                );
            $result = $this->model->updateAd($array,$_GET['id']);
            if ($result){
                Tool::progress("修改成功",'?c=ad&action=show',1,2);
            } else{
                Tool::progress("修改失败",'?c=ad&action=show',0,2);
            }
        }
    }

//    删除广告
    private function delete(){
        $this->smarty->assign('delete',true);
//        var_dump($_GET['id']);
        $result = $this->model->deleteAd($_GET['id']);
        if ($result){
            Tool::progress("删除成功",'?c=ad&action=show',1,1);
        }  else{
            Tool::progress("删除失败",'?c=ad&action=show',0,1);
        }
    }

//    状态
    private function state(){
//        var_dump($_GET);
        if ($_GET['flag'] == 'show'){
            $state = 1;
        }
        if ($_GET['flag'] == 'hide'){
            $state = 0;
        }
        $array = array('state'=>$state);
        $result = $this->model->updateAd($array,$_GET['id']);
        if ($result){
            Tool::progress("状态改变成功",'?c=ad&action=show',1,1);
        }  else{
            Tool::progress("状态改变失败",'?c=ad&action=show',0,1);
        }
    }
}











?>