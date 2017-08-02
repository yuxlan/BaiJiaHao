<?php

class userAction extends Action{
    public function main(){
        switch ($_GET['action']){
            case 'register':
                $this->register();
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

    private function register(){
        $this->smarty->display('home/register.html');
        if ($_POST['send']){
            $array = array(
                'user'=>$_POST['username'],
                'pwd'=>$_POST['pwd'],
                'phonenum'=>$_POST['phonenum'],
                'date'=>date('Y-m-d H:i:s')
            );
            $result = $this->model->registerUser($array);
            $result1 = $this->model->verifyUser($_POST['username'],$_POST['pwd']);
            if ($result){
                $_SESSION['user'] = $result1;
                $array = array(
                    'last_ip'=>$_SESSION['REMOTE_ADDR'],
                    'last_time'=>date('Y-m-d H:i:s'),
                    'login_num'=>++$result1[0]['login_num']
                );
                $this->model->updateUser($array,"where user='".$_POST['username']."'");
                Tool::progress("注册成功","?c=index",1,2);
            } else{
                Tool::progress("注册失败","?c=user&action=register",0,2);
            }
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
//            var_dump($_POST);
            $result = $this->model->verifyUser($_POST['username'],$_POST['pwd']);
//            var_dump($result);
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