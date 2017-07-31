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

//        主导航栏
        $navData = $this->model->getNav();
        $array = [];
        foreach ($navData as $k=>$v){
            if ($k == 0){
                $array[] = 'active';
            } else {
                $array[] = '';
            }
        }
        $this->smarty->assign('array',$array);
        $this->smarty->assign('navData',$navData);

        $adData = $this->model->getAd();
        $this->smarty->assign('adData',$adData);
//        var_dump($adData);
//        var_dump($navData);
    }

    private function page(){
        $this->smarty->assign('page',true);
        $this->common();
    }

    private function common(){
        $navData = $this->model->getNav();
        $array = [];

        if (empty($_GET['nid'])){
            foreach ($navData as $k=>$v){
                if ($k==0){
                    $array[] = 'active';
                } else {
                    $array[] = '';
                }
            }
        } else{
            foreach ($navData as $k=>$v){
                if ($v['id'] == $_GET['nid']){
                    $array[] = 'active';
                } else {
                    $array[] = '';
                }
            }
        }

        $this->smarty->assign('array',$array);
        $this->smarty->assign('navData',$navData);
    }
}

?>