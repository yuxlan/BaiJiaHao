<?php


class indexAction extends Action {
//    链接路径

    public function main(){
        switch ($_GET['p']){
            case 'page':
                $this->page();
                break;
            default:
                $this->index();
                break;
        }
        $this->smarty->display('home/index.html');
    }

    private function index(){
        $this->smarty->assign('index',true);
        $navData = $this->model->getNav();

        $array = [];
        for ($i = 0; $i < count($navData); $i++){
            if ($i == 0){
                $array[] = 'active';
            } else {
                $array[] = '';
            }
        }

        $this->smarty->assign('array',$array);
        $this->smarty->assign('navData',$navData);
//        var_dump($navData);
    }

    private function page(){
        $this->smarty->assign('page',true);
        $navData = $this->model->getNav();

        $array = [];
        for ($i = 0; $i < count($navData); $i++){
            if ($i == $_GET['type']){
                $array[] = 'active';
            } else {
                $array[] = '';
            }
        }

        $this->smarty->assign('array',$array);
        $this->smarty->assign('navData',$navData);
    }

//    public function keJi(){
//        $this->smarty->display('home/vicepage.html');
//    }
//
//    public function register(){
//        $this->smarty->display('home/register.html');
//    }
}





?>