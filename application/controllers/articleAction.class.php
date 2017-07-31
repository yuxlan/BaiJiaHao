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
        if ($_POST['send']){
            if ($_POST['articleNid']!=0){
//                判断文件上传
                $name = [];
                $err = [];
                for ($i = 0; $i <= $_POST['num']; $i++){
                    $upload = new UpLoads(array('path'=>'public/uploads/article','fileName'=>'articlePic'.$i));
                    if ($upload->upload()){
                        $name[] = $upload->getName();
                    } else{
                        $err[] = $upload->getErrorMsg();
                    }
                }
//                判断是否错误
                if (count($err) == 0){
                    $array = array(
                        'title'=>$_POST['articleName'],
                        'nid'=>$_POST['articleNid'],
                        'author'=>$_POST['articleAuthor'],
                        'lead'=>$_POST['authorLead'],
                        'source'=>$_POST['articleSource'],
                        'state'=>1,
                        'pic'=>implode(';',$name),
                        'content'=>$_POST['content'],
                        'date'=>date('Y-m-d H:i:s')
                    );
                    $result = $this->model->addArt($array);

                    if ($result){
                        Tool::progress('添加成功','?c=article&action=show',1,1);
                    } else{
                        Tool::progress('添加失败','?c=article&action=add',0,1);
                    }
                } else{
                    Tool::progress(implode(';',$err),'?c=article&action=add',0,1);
                }
            } else {
                Tool::progress('请选择文章类型','?c=article&action=add',0,1);
            }
//            var_dump($_POST);
//            var_dump($_FILES);
        }
//        var_dump($_POST);
//        var_dump($_FILES);
    }

//    显示文章
    private function show(){
        $this->smarty->assign('show',true);
//        获取所有数据
        $_total = $this->model->totalArt();
//        分页类
        $page = new Page($_total,10);
//        获取数据
        $artData = $this->model->getArt($page->limit);

//        $artNid = $this->model->getOne($v['nid']);
////            var_dump($artNid);
//        $this->smarty->assign('artNid',$artNid);



        foreach ($artData as $k=>$v){
//            var_dump($v['pic']);
            switch ($v['state']){
                case 1:
                    $artData[$k]['state'] = "<span style='color: green;'>[显示]</span><a href='?c=article&action=state&flag=hide&id=".$v['id']."' style='color: red'>[隐藏]</a>";
                    break;
                case 0:
                    $artData[$k]['state'] = "<span style='color: red;'>[隐藏]</span><a href='?c=article&action=state&flag=show&id=".$v['id']."' style='color: green'>[显示]</a>";
                    break;
            }
        }
//        赋值变量
        $this->smarty->assign('artData',$artData);
//        分页显示
        $allPage = $page->allPages('?c=article&action=show');
//        赋值
        $this->smarty->assign('allPage',$allPage);
//        var_dump($_POST);
//        多条删除
        if ($_POST['delete']){
//            var_dump($_POST);
            if (count($_POST['checked']) > 0){
                $ids = implode(',',$_POST['checked']);
//                var_dump($ids);
                $result = $this->model->deleteArt($ids);
                if ($result > 0){
                    Tool::progress('删除成功','?c=article&action=show',1,1);
                } else {
                    Tool::progress('删除失败','?c=article&action=show',0,1);
                }
            }
        }
    }

    private function update(){
        $this->smarty->assign('update',true);


        $nav = $this->model->getNav();
        $this->smarty->assign('navData',$nav);

        //        获取默认的数据
        $oneArt = $this->model->getOneArt($_GET['id']);
        $oneArt[0]['pic'] = explode(';',$oneArt[0]['pic']);
        $this->smarty->assign('oneArt',$oneArt);


        if ($_POST['send']){
            $name = $oneArt[0]['pic'];
            $err = [];
            for ($i = 0; $i < $_FILES; $i++) {
                $upload = new UpLoads(array('path' => 'public/uploads/article', 'fileName' => 'articlePic' . $i));
                if ($upload->upload()) {
                    $name[$i] = $upload->getName();
                } else {
                    $err[$i] = $upload->getErrorMsg();
                }
            }
//                判断是否错误
                if (count($err) == 0){
                    $array = array(
                        'title'=>$_POST['articleName'],
                        'nid'=>$_POST['articleNid'],
                        'author'=>$_POST['articleAuthor'],
                        'lead'=>$_POST['authorLead'],
                        'source'=>$_POST['articleSource'],
                        'pic'=>implode(';',$name),
                        'content'=>$_POST['content'],
                        'date'=>date('Y-m-d H:i:s')
                    );
                    $result = $this->model->updateArt($array,$_GET['id']);

                    if ($result){
                        Tool::progress('修改成功','?c=article&action=show',1,1);
                    } else{
                        Tool::progress('修改失败','?c=article&action=add',0,1);
                    }
                } else{
                    Tool::progress(implode(';',$err),'?c=article&action=add',0,1);
                }
    }
}

//    删除文章
    private function delete(){
        $this->smarty->assign('delete',true);
//        var_dump($_GET['id']);
        $result = $this->model->deleteArt($_GET['id']);
        if ($result){
            Tool::progress("删除成功",'?c=article&action=show',1,1);
        }  else{
            Tool::progress("删除失败",'?c=article&action=show',0,1);
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
        $result = $this->model->updateArt($array,$_GET['id']);
        if ($result){
            Tool::progress("状态改变成功",'?c=article&action=show',1,1);
        }  else{
            Tool::progress("状态改变失败",'?c=article&action=show',0,1);
        }
    }
}








?>