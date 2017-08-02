<?php

// 文章管理控制器

class articleAction extends Action{
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
        $this->smarty->display('admin/article.html');
    }

//    显示文章
    private function show(){
        $this->smarty->assign('show',true);

//        获取所有数据
        $_total = $this->model->totalArt();
//        分页类
        $page = new Page($_total,6);

//        获取数据
        $artData = $this->model->getArt($page->limit);
        foreach ($artData as $k=>$v){
            $artNid = $this->model->getOne($v['nid']);
            $adType[]=$artNid[0]['name'];
            $artAuthor = $this->model->getAuthor($v['author_id']);
            $artAuthorName[] = $artAuthor[0]['user'];
            $artPic[] = explode(';',$v['pic']);
        }
        $this->smarty->assign('adType',$adType); // 文章类型
        $this->smarty->assign('artAuthorName',$artAuthorName);  // 文章作者
        $this->smarty->assign('artPic',$artPic); // 文章配图


        foreach ($artData as $k=>$v){
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

//        多条删除
        if ($_POST['delete']){
            if (count($_POST['checked']) > 0){
                $ids = implode(',',$_POST['checked']);
                $result = $this->model->deleteArt($ids);
                if ($result > 0){
                    Tool::progress('删除成功','?c=article&action=show',1,1);
                } else {
                    Tool::progress('删除失败','?c=article&action=show',0,1);
                }
            }
        }
    }

//    删除文章
    private function delete(){
        $this->smarty->assign('delete',true);

        $result = $this->model->deleteArt($_GET['id']);
        if ($result){
            Tool::progress("删除成功",'?c=article&action=show',1,1);
        }  else{
            Tool::progress("删除失败",'?c=article&action=show',0,1);
        }
    }

//    文章状态改变
    private function state(){
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