<?php

class userCenterAction extends Action{
    public function main(){
        switch ($_GET['action']){
            case 'show':
                $this->show();
                break;
            case 'update':
                $this->update();
                break;
            case 'userupdate':
                $this->userupdate();
                break;
            case 'delete':
                $this->delete();
                break;
        }
        $this->smarty->display('home/userCenter.html');
    }

    private function show()
    {
        $this->smarty->assign('show', true);
        $authorArticle = $this->model->getArticle("where author_id='".$_SESSION['user'][0]['id']."'");
        $this->smarty->assign('authorArticle',$authorArticle);
    }

    private function update(){
        $this->smarty->assign('update', true);
        /*获取的导航数据*/
        $navData = $this->model->getNav();
        $this->smarty->assign('navData', $navData);

        /*获取默认数据*/
        $oneArt = $this->model->getOneArt($_GET['id']);
        /*图片字符串 转换 为数组*/
        $oneArt[0]['pic'] = explode(';', $oneArt[0]['pic']);

        $this->smarty->assign('oneArt', $oneArt);
        /*提交按钮*/
        if ($_POST['send']) {
            /*原先图片名字*/
            $name = $oneArt[0]['pic'];
            /*有图片修改*/
            for ($i = 0; $i < count($_FILES); $i++) {
                $upload = new UpLoads(['path' => 'public/uploads/article', 'fileName' => 'articlePic' . $i]);
                /*修改成功*/
                if ($upload->upload()) {//上传成功
                    /*对应的图片名修改*/
                    $name[$i] = $upload->getName();
                }
            }
            /*修改数据*/
            $array = array(
                'title' => $_POST['articleName'],
                'nid' => $_POST['articleNid'],
                'author' => $_SESSION['user'][0]['id'],
                'source' => $_POST['articleSource'],
                'pic' => implode(';', $name),
                'content' => $_POST['content'],
                'date'=>date('Y-m-d H:i:s')
            );

            $result = $this->model->updateArt($array, $_GET['id']);
            if ($result) {
                Tool::progress('修改成功', '?c=userCenter&action=show', 1, 1);
            } else {
                Tool::progress('修改失败', '?c=userCenter&action=update$id=' . $_GET['id'], 0, 1);
            }
        }
    }

    private function userupdate(){
        $this->smarty->assign('userupdate', true);

        /*获取默认数据*/
        $userMessage = $this->model->getUser($_SESSION['user'][0]['id']);
        $this->smarty->assign('userMessage', $userMessage );

        if ($_POST['send']) {
            /*原先图片名字*/
            $name = $userMessage [0]['pic'];
            /*有图片修改*/
            for ($i = 0; $i < count($_FILES); $i++) {
                $upload = new UpLoads(['path' => 'public/uploads/author', 'fileName' => 'userPic1']);
                /*修改成功*/
                if ($upload->upload()) {//上传成功
                    /*对应的图片名修改*/
                    $name[$i] = $upload->getName();
                }
            }
            /*修改数据*/
            $array = array(
                'user' => $_POST['userName'],
                'pwd' => $_POST['userPwd'],
                'phonenum' => $_POST['userPhone'],
                'lead' => $_POST['userLead'],
                'pic' => implode(';', $name),
                'sex' => $_POST['userSex'],
                'age' => $_POST['userAge'],
                'work' => $_POST['userWork'],
                'decs' => $_POST['userDecs']
            );

            $result = $this->model->updateUser($array, $_SESSION['user'][0]['id']);
            if ($result) {
                $user = $this->model->getUser($_SESSION['user'][0]['id']);
                $_SESSION['user'] = $user;
                Tool::progress('修改成功', '?c=userCenter&action=show', 1, 1);
            } else {
                Tool::progress('修改失败', '?c=userCenter&action=userupdate', 0, 1);
            }
        }
    }

    private function delete()
    {
        $result = $this->model->deleteArt($_GET['id']);
        if ($result) {
            Tool::progress('删除成功', '?c=userCenter&action=show', 1, 1);
        } else {
            Tool::progress('删除失败', '?c=userCenter&action=show', 0, 1);
        }
    }

}






?>