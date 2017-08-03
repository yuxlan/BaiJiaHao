<?php

class userAction extends Action{
    public function main(){
        switch ($_GET['action']){
            case 'beAuthor':
                $this-> beAuthor();
                break;
            case 'warning':
                $this-> warning();
                break;
            case 'login':
                $this->login();
                break;
            case 'logout':
                $this->logout();
                break;
            case 'userlogout':
                $this->userlogout();
                break;
            case 'userlogin':
                $this->userlogin();
                break;
        }
    }

    private function beAuthor(){
        $array = array(
            'level_id'=>2
        );
        $this->model->updateUser($array,"where user='".$_SESSION['user'][0]['user']."'");
        Tool::progress('申请成功','?c=index',1,1);
    }

    private function login(){
        if ($_POST['send']){
//            var_dump($_POST);
            $result = $this->model->verifyUser($_POST['admin'],$_POST['pwd']);
//            var_dump($result);
            if ($result){
                $_SESSION['admin'] = $result;
                $array = array(
                    'last_ip'=>$_SESSION['REMOTE_ADDR'],
                    'last_time'=>date('Y-m-d H:i:s'),
                    'login_num'=>++$result[0]['login_num']
                );
                $this->model->updateUser($array,"where user='".$_POST['admin']."'");
                Tool::progress('登录成功','?c=admin',1,1);
            } else {
                Tool::progress('登录失败','?c=admin',0,1);
            }
        }
        $this->smarty->display('admin/user.html');
    }


    private function warning(){
        $this->smarty->display('admin/warning.html');
    }

    private function userlogin(){
        if ($_POST['send']){
            $result = $this->model->verifyUser($_POST['username'],$_POST['pwd']);
            $result1 = $this->model->getUser($_POST['username']);
            if ($result1[0]['state'] == 0){
                Tool::progress('不好意思，此号被封','?c=index',0,4);
            } else{
                if ($result){
                    $_SESSION['user'] = $result;
                    $array = array(
                        'last_ip'=>$_SESSION['REMOTE_ADDR'],
                        'last_time'=>date('Y-m-d H:i:s'),
                        'login_num'=>++$result[0]['login_num']
                    );
                    $this->model->updateUser($array,"where user='".$_POST['username']."'");
                    Tool::progress('登录成功','?c=index',1,1);
                } else {
                    Tool::progress('登录失败','?c=index',0,1);
                }
            }
        }
        $this->smarty->display('home/login.html');
    }

//    注销
    private function userlogout(){
        unset($_SESSION['user']);
        header('location:?c=index');
    }

//    注销
    private function logout(){
        unset($_SESSION['admin']);
        header('location:?c=user&action=login');
    }
}










?>