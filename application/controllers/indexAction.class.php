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

    public function userCenter(){
        $this->smarty->display('home/userCenter.html');
    }

    public function beAuthor(){
        $this->smarty->display('home/beAuthor.html');
    }

    public function authorArticle(){
        $this->smarty->display('home/authorArticle.html');
    }

    public function addArticle(){
//        获取到导航的数据
        $nav = $this->model->getNavForArt();
        $this->smarty->assign('navData',$nav);

        if ($_POST['send']){
            if ($_POST['articleNid']!=0){
//                判断文件上传
                $name = [];
                $err = [];
                for ($i = 0; $i < $_POST['num']; $i++){
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
                        'author_id'=>$_SESSION['admin'][0]['id'],
                        'source'=>$_POST['articleSource'],
                        'state'=>1,
                        'pic'=>implode(';',$name),
                        'content'=>$_POST['content'],
                        'date'=>date('Y-m-d H:i:s')
                    );
                    $result = $this->model->addArt($array);

                    if ($result){
                        Tool::progress('添加成功','?c=index',1,1);
                    } else{
                        Tool::progress('添加失败','?c=index&m=addArticle',0,1);
                    }
                } else{
                    Tool::progress(implode(';',$err),'?c=index&m=addArticle',0,1);
                }
            } else {
                Tool::progress('请选择文章类型','?c=index&m=addArticle',0,1);
            }
        }
        $this->smarty->display('home/addArticle.html');
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

        $page = new IndexPage($this->model->totalArticle(),10);
        $this->smarty->assign('allPage',$page->indexAllPages('?c=index'));

        $article = $this->model->getArticle('where state=1 order by id desc',$page->limit);
        $articleLb = $this->model->getArticle('where state=1 order by pageview desc','limit 0,4');
        foreach ($article as $k=>$v){
            $article[$k]['pic']=explode(';',$v['pic']);
            $artAuthor = $this->model->getAuthor($v['author_id']);
            $artAuthorName[] = $artAuthor[0]['user'];
        }
        foreach ($articleLb as $k=>$v){
            $articleLb[$k]['pic']=explode(';',$v['pic']);
        }
        $this->smarty->assign('article',$article);
        $this->smarty->assign('artAuthorName',$artAuthorName);  // 文章作者
        $this->smarty->assign('articleLb',$articleLb);

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

        $page = new IndexPage($this->model->totalArticle('where nid='.$_GET['nid'].' and state=1 order by id desc'),10);
        $articleByType = $this->model->getArticle('where nid='.$_GET['nid'].' and state=1 order by id desc',$page->limit);
        $articleByTypeView = $this->model->getArticle('where nid='.$_GET['nid'].' and state=1 order by pageview desc','limit 0,6');
        $articleByTypeViewOnce = $this->model->getAuthorNo('where nid='.$_GET['nid'].' and state=1 order by pageview desc','limit 0,6');

        foreach ($articleByTypeViewOnce as $k=>$v){
            $artAuthorView = $this->model->getAuthor($v['author_id']);
            $artAuthorNameView[] = $artAuthorView[0]['user'];
            $artAuthorLeadView[] = $artAuthorView[0]['lead'];
            $artAuthorPicView[] = $artAuthorView[0]['pic'];
        }
        foreach ($articleByType as $k=>$v){
            $articleByType[$k]['pic']=explode(';',$v['pic']);
            $artAuthor = $this->model->getAuthor($v['author_id']);
            $artAuthorName[] = $artAuthor[0]['user'];
        }
        foreach ($articleByTypeView as $k=>$v){
            $articleByTypeView[$k]['pic']=explode(';',$v['pic']);
        }

        $this->smarty->assign('articleByTypeViewOnce',$articleByTypeViewOnce);
        $this->smarty->assign('articleByType',$articleByType);
        $this->smarty->assign('artAuthorName',$artAuthorName);  // 文章作者
        $this->smarty->assign('artAuthorNameView',$artAuthorNameView);  // 文章作者
        $this->smarty->assign('artAuthorLeadView',$artAuthorLeadView);  // 作者导语
        $this->smarty->assign('artAuthorPicView',$artAuthorPicView);  // 作者头像
        $this->smarty->assign('articleByTypeView',$articleByTypeView);
        $this->smarty->assign('allPage',$page->indexAllPages('?c=index&p=page&nid='.$_GET['nid']));
    }

//    文章详情
    private function one(){
        $this->smarty->assign('one',true);
        $this->common();
        $oneArticle = $this->model->getArticle('where id='.$_GET['id']);
        $author = $oneArticle[0]['author_id'];
        $authorArticle = $this->model->getArticle("where author_id='".$author."'");
        foreach ($oneArticle as $k=>$v){
            $oneArticle[$k]['pic']=explode(';',$v['pic']);
            $artAuthorView = $this->model->getAuthor($v['author_id']);
            $artAuthorNameView[] = $artAuthorView[0]['user'];
            $artAuthorLeadView[] = $artAuthorView[0]['lead'];
            $artAuthorPicView[] = $artAuthorView[0]['pic'];
        }
        $this->smarty->assign('artAuthorNameView',$artAuthorNameView);  // 文章作者
        $this->smarty->assign('artAuthorLeadView',$artAuthorLeadView);  // 作者导语
        $this->smarty->assign('artAuthorPicView',$artAuthorPicView);  // 作者头像

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