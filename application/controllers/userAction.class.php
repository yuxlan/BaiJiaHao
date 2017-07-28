<?php

class userAction extends Action{
    public function main(){
        switch ($_GET['action']){
            case 'login':
                $this->login();
                break;
            case 'logout':
                $this->logout();
                break;
        }
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
                $this->model->updateUser($array);
                Tool::progress('登录成功','?c=admin',1,1);
            } else {
                Tool::progress('登录失败','?c=admin',0,1);
            }
        }
        $this->smarty->display('admin/user.html');
    }

//    注销
    private function logout(){
        unset($_SESSION['admin']);
        header('location:?c=user&action=login');
    }
}










?>