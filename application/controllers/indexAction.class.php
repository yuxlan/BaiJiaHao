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
            case 'like':
                $this->like();
                break;
            default:
                $this->index();
                break;
        }
        $this->smarty->display('home/index.html');
    }

    public function beAuthor(){
        $this->smarty->display('home/beAuthor.html');
    }

    public function authorArticle(){
        $authorArticle = $this->model->getArticle("where author_id='".$_GET['id']."'");
        $this->smarty->assign('authorArticle',$authorArticle);

        $artAuthorView = $this->model->getAuthor($_GET['id']);
        $artAuthorIdView[] = $artAuthorView[0]['id'];
        $artAuthorNameView[] = $artAuthorView[0]['user'];
        $artAuthorLeadView[] = $artAuthorView[0]['lead'];
        $artAuthorPicView[] = $artAuthorView[0]['pic'];
        $this->smarty->assign('artAuthorIdView',$artAuthorIdView);  // 文章作者
        $this->smarty->assign('artAuthorNameView',$artAuthorNameView);  // 文章作者
        $this->smarty->assign('artAuthorLeadView',$artAuthorLeadView);  // 作者导语
        $this->smarty->assign('artAuthorPicView',$artAuthorPicView);  // 作者头像

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
                        'author_id'=>$_SESSION['user'][0]['id'],
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
            $artAuthorId[] = $artAuthor[0]['id'];
            $artAuthorName[] = $artAuthor[0]['user'];
        }
        foreach ($articleLb as $k=>$v){
            $articleLb[$k]['pic']=explode(';',$v['pic']);
        }
        $this->smarty->assign('article',$article);
        $this->smarty->assign('artAuthorId',$artAuthorId);  // 文章作者
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
            $artAuthorIdView[] = $artAuthorView[0]['id'];
            $artAuthorNameView[] = $artAuthorView[0]['user'];
            $artAuthorLeadView[] = $artAuthorView[0]['lead'];
            $artAuthorPicView[] = $artAuthorView[0]['pic'];
        }
        foreach ($articleByType as $k=>$v){
            $articleByType[$k]['pic']=explode(';',$v['pic']);
            $artAuthor = $this->model->getAuthor($v['author_id']);
            $artAuthorId[] = $artAuthor[0]['id'];
            $artAuthorName[] = $artAuthor[0]['user'];
        }
        foreach ($articleByTypeView as $k=>$v){
            $articleByTypeView[$k]['pic']=explode(';',$v['pic']);
        }

        $this->smarty->assign('articleByTypeViewOnce',$articleByTypeViewOnce);
        $this->smarty->assign('articleByType',$articleByType);
        $this->smarty->assign('artAuthorId',$artAuthorId);  // 文章作者
        $this->smarty->assign('artAuthorName',$artAuthorName);  // 文章作者
        $this->smarty->assign('artAuthorIdView',$artAuthorIdView);  // 文章作者
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
            $artAuthorIdView[] = $artAuthorView[0]['id'];
            $artAuthorNameView[] = $artAuthorView[0]['user'];
            $artAuthorLeadView[] = $artAuthorView[0]['lead'];
            $artAuthorPicView[] = $artAuthorView[0]['pic'];
        }
        $this->smarty->assign('artAuthorIdView',$artAuthorIdView);  // 文章作者
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


//        点赞部分
        $userLike[] = explode(';',$_SESSION['user'][0]['u_like_a']);
        $userUnLike[] = explode(';',$_SESSION['user'][0]['u_unlike_a']);
        if (in_array($_GET['id'],$userLike[0])){
            $likeArticle = "<td><a href='?c=index&action=like&flag=cancelLike&id=".$_GET['id']."' id=\"oup\" style=\"color: #9d9d9d; cursor: pointer;\"><i id=\"oupi\" class=\"fa fa-thumbs-up\"></i></a>&nbsp;&nbsp;{$oneArticle[0]['alike']}</td><td>&nbsp;&nbsp;|&nbsp;&nbsp;</td><td><a id=\"odown\" style=\"color: #9d9d9d; cursor: pointer;\"><i id=\"oudowni\" class=\"fa fa-thumbs-o-down\"></i></a>&nbsp;&nbsp;{$oneArticle[0]['aunlike']}</td>";
        } else if (in_array($_GET['id'],$userUnLike[0])){
            $likeArticle = "<td><a href='?c=index&action=like&flag=cancelUnLike&id=".$_GET['id']."' id=\"oup\" style=\"color: #9d9d9d; cursor: pointer;\"><i id=\"oupi\" class=\"fa fa-thumbs-o-up\"></i></a>&nbsp;&nbsp;{$oneArticle[0]['alike']}</td><td>&nbsp;&nbsp;|&nbsp;&nbsp;</td><td><a id=\"odown\" style=\"color: #9d9d9d; cursor: pointer;\"><i id=\"oudowni\" class=\"fa fa-thumbs-down\"></i></a>&nbsp;&nbsp;{$oneArticle[0]['aunlike']}</td>";
        } else{
            $likeArticle = "<td><a href='?c=index&action=like&flag=Like&id=".$_GET['id']."' id=\"oup\" style=\"color: #9d9d9d; cursor: pointer;\"><i id=\"oupi\" class=\"fa fa-thumbs-o-up\"></i></a>&nbsp;&nbsp;{$oneArticle[0]['alike']}</td><td>&nbsp;&nbsp;|&nbsp;&nbsp;</td><td><a href='?c=index&action=like&flag=unLike&id=".$_GET['id']."' id=\"odown\" style=\"color: #9d9d9d; cursor: pointer;\"><i id=\"oudowni\" class=\"fa fa-thumbs-o-down\"></i></a>&nbsp;&nbsp;{$oneArticle[0]['aunlike']}</td>";
        }
        $this->smarty->assign('likeArticle',$likeArticle);
    }

    //    点赞
    private function like(){
        $oneArticle = $this->model->getArticle('where id='.$_GET['id']);
        $userLike[] = explode(';',$_SESSION['user'][0]['u_like_a']);
        $userUnLike[] = explode(';',$_SESSION['user'][0]['u_unlike_a']);

        if ($_GET['flag'] == 'cancelLike'){
            $likeArray = array(
                'alike'=>--$oneArticle[0]['alike']
            );
            foreach($userLike[0] as $k=>$v){
                if($v == $_GET['id']){
                    unset($userLike[0][$k]);
                }
            }
        }

        if ($_GET['flag'] == 'cancelUnLike'){
            $unLikeArray = array(
                'aunlike'=>--$oneArticle[0]['aunlike']
            );
            foreach($userUnLike[0] as $k=>$v){
                if($v == $_GET['id']){
                    unset($userUnLike[0][$k]);
                }
            }
        }

        if ($_GET['flag'] == 'Like'){
            $likeArray = array(
                'alike'=>++$oneArticle[0]['alike']
            );
            array_push($userLike[0], $_GET['id']);
        }

        if ($_GET['flag'] == 'unLike'){
            $unLikeArray = array(
                'aunlike'=>++$oneArticle[0]['aunlike']
            );
            array_push($userUnLike[0], $_GET['id']);
        }

        $userLArt = implode(';',$userLike[0]);
        $userULArt = implode(';',$userUnLike[0]);

        $result = $this->model->updateView($likeArray,'where id='.$_GET['id']);
        $result1 = $this->model->updateView($unLikeArray,'where id='.$_GET['id']);
        $result2 = $this->model->updateUser($userLArt,'where id='.$_SESSION['user'][0]['id']);
        $result3 = $this->model->updateUser($userULArt,'where id='.$_SESSION['user'][0]['id']);

        if (($result || $result1) && ($result2 || $result3)){
            $userLike1[] = explode(';',$_SESSION['user'][0]['u_like_a']);
            $userUnLike1[] = explode(';',$_SESSION['user'][0]['u_unlike_a']);
            if (in_array($_GET['id'],$userLike1[0])){
                $likeArticle = "<td><a href='?c=index&action=like&flag=cancelLike&id=".$_GET['id']."' id=\"oup\" style=\"color: #9d9d9d; cursor: pointer;\"><i id=\"oupi\" class=\"fa fa-thumbs-up\"></i></a>&nbsp;&nbsp;{$oneArticle[0]['alike']}</td><td>&nbsp;&nbsp;|&nbsp;&nbsp;</td><td><a id=\"odown\" style=\"color: #9d9d9d; cursor: pointer;\"><i id=\"oudowni\" class=\"fa fa-thumbs-o-down\"></i></a>&nbsp;&nbsp;{$oneArticle[0]['aunlike']}</td>";
            } else if (in_array($_GET['id'],$userUnLike1[0])){
                $likeArticle = "<td><a href='?c=index&action=like&flag=cancelUnLike&id=".$_GET['id']."' id=\"oup\" style=\"color: #9d9d9d; cursor: pointer;\"><i id=\"oupi\" class=\"fa fa-thumbs-o-up\"></i></a>&nbsp;&nbsp;{$oneArticle[0]['alike']}</td><td>&nbsp;&nbsp;|&nbsp;&nbsp;</td><td><a id=\"odown\" style=\"color: #9d9d9d; cursor: pointer;\"><i id=\"oudowni\" class=\"fa fa-thumbs-down\"></i></a>&nbsp;&nbsp;{$oneArticle[0]['aunlike']}</td>";
            } else{
                $likeArticle = "<td><a href='?c=index&action=like&flag=Like&id=".$_GET['id']."' id=\"oup\" style=\"color: #9d9d9d; cursor: pointer;\"><i id=\"oupi\" class=\"fa fa-thumbs-o-up\"></i></a>&nbsp;&nbsp;{$oneArticle[0]['alike']}</td><td>&nbsp;&nbsp;|&nbsp;&nbsp;</td><td><a href='?c=index&action=like&flag=unLike&id=".$_GET['id']."' id=\"odown\" style=\"color: #9d9d9d; cursor: pointer;\"><i id=\"oudowni\" class=\"fa fa-thumbs-o-down\"></i></a>&nbsp;&nbsp;{$oneArticle[0]['aunlike']}</td>";
            }
            $this->smarty->assign('likeArticle',$likeArticle);
        }
    }
}

?>