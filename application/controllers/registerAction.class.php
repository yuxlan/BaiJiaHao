<?php

class registerAction extends Action{
    public function main(){
        switch ($_GET['action']){
            case 'register':
                $this->register();
                break;
            case 'registerSuc':
                $this->registerSuc();
                break;
            case 'captcha':
                $this->captcha();
                break;
            case 'code':
                $this->code();
                break;
            case 'verifyUser':
                $this->verifyUser();
                break;
        }
    }

    private function register(){
        $this->smarty->display('home/register.html');
    }

    public function registerSuc(){
            $array = array(
                'user'=>$_POST['username'],
                'pwd'=>$_POST['pwd'],
                'phonenum'=>$_POST['phone'],
                'state'=>1,
                'level_id'=>1,
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
                echo 'ok';
            } else{
                echo 'no';
            }
    }

    public function captcha(){
        $c = new Captchas(['level'=>5]);
        $c->showImage();
        $_SESSION['code'] = $c->getCaptcha();
    }

    public function code(){
        if (strtolower($_POST['code']) == strtolower($_SESSION['code'])) {
            echo 'ok';
        } else {
            echo 'no';
        }
    }

    public function verifyUser(){
        $result = $this->model->getUser($_POST['username']);
        if ($result){
            echo 'no';
        } else {
            echo 'ok';
        }
    }

}



?>