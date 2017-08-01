<?php

class indexAction extends Action {

//    链接路径
    public function main(){
        switch ($_GET['p']){
            case 'page':
                $this->page();
                break;
            case 'one':
                $this->one();
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

        $page = new Page($this->model->totalArticle(),10);
        $article = $this->model->getArticle('where state=1 order by id desc');
        foreach ($article as $k=>$v){
            $article[$k]['pic']=explode(';',$v['pic']);
        }
        $this->smarty->assign('article',$article);
        $this->smarty->assign('allPage',$page->allPages('?c=index'));

//        按阅读量排行
        $articleByView = $this->model->getArticle('where state=1 order by pageview desc','limit 0,6');
        $this->smarty->assign('articleByView',$articleByView);
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

        $page = new Page($this->model->totalArticle('where nid='.$_GET['nid'].' and state=1 order by id desc'),10);
        $articleByType = $this->model->getArticle('where nid='.$_GET['nid'].' and state=1 order by id desc');
        $articleByTypeView = $this->model->getArticle('where nid='.$_GET['nid'].' and state=1 order by pageview desc','limit 0,6');
        foreach ($articleByType as $k=>$v){
            $articleByType[$k]['pic']=explode(';',$v['pic']);
        }
        foreach ($articleByTypeView as $k=>$v){
            $articleByTypeView[$k]['pic']=explode(';',$v['pic']);
        }
        $this->smarty->assign('articleByType',$articleByType);
        $this->smarty->assign('articleByTypeView',$articleByTypeView);
        $this->smarty->assign('allPage',$page->allPages('?c=index&p=page&nid='.$_GET['nid']));
    }

//    文章详情
    private function one(){
        $this->smarty->assign('one',true);
        $this->common();
        $oneArticle = $this->model->getArticle('where id='.$_GET['id']);
        $author = $oneArticle[0]['author'];
        $authorArticle = $this->model->getArticle("where author='".$author."'");
        foreach ($oneArticle as $k=>$v){
            $oneArticle[$k]['pic']=explode(';',$v['pic']);
        }

//        修改阅读量
        $array = array(
            'pageview'=>++$oneArticle[0]['pageview']
        );
        $this->model->updateView($array,'where id='.$_GET['id']);

        $this->smarty->assign('oneArticle',$oneArticle);
        $this->smarty->assign('authorArticle',$authorArticle);
    }
}

?>