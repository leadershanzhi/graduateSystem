<!DOCTYPE HTML>
<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>
<?php
session_start();
require_once APPLICATION_PATH.'/models/News.php';
require_once APPLICATION_PATH.'/models/School.php';
require_once APPLICATION_PATH.'/models/Review.php';
require_once APPLICATION_PATH.'/util/Dic.php';
require_once 'BaseController.php';
class NewsController extends BaseController
{
	
	public function writeAction(){
		$dic=new Dic();$mo=new School();
	    $scid=$dic->getSCID();
	    $this->view->sc=$mo->getOneSchool($scid);
	}
	public function newsmainAction(){
		
	}
	
	public function stushowAction(){
		$model=new News();
		if(!empty($_REQUEST['now'])){
			$pnow=$_REQUEST['now'];
		}else{
			$pnow=1;
		}
		if(!empty($_REQUEST['kw'])){
			$sc=$this->getRequest()->getParam('kw');
			$this->view->news=$model->getStuPagel($pnow, $sc);
			$this->view->kw=$sc;
		}else{
			$this->view->news=$model->getStuPage($pnow);
		}
		$this->view->pagebean=$model->getPagebean();	
	}
	
	public function stushowoneAction(){
		$id=$this->getRequest()->getParam('id');
  		$mo=new Review();
 		if(!empty($_REQUEST['now'])){
 			$pnow=$_REQUEST['now'];
 		}else{
 			$pnow=1;
 		}
  		$review=$mo->showlist($id, $pnow);
 		$this->view->review=$review;
  		$this->view->pagebean=$mo->getPagebean();
 		
		$model=new News();
		$this->view->new=$model->getOneNews($id);	
	}
	
	public function delAction(){
		$id=$this->getRequest()->getParam('id');
		$model=new News();
		$model->delOneNews($id);
		$this->view->hint="删除成功";
		$this->view->url="/news/show";
		$this->_forward('hint','global');
	}
	public function showAction(){
		$model=new News();
		if(!empty($_REQUEST['now'])){
			$pnow=$_REQUEST['now'];
		}else{
			$pnow=1;
		}
		if(!empty($_REQUEST['title'])||!empty($_REQUEST['content'])){
			$title=$this->getRequest()->getParam('title');
			$content=$this->getRequest()->getParam('content');
			$this->view->news=$model->getPagel($pnow,$title,$content);
		}else{
			$this->view->news=$model->getPage($pnow);
		}	
		
		$this->view->pagebean=$model->getPagebean();
	    $this->render('show');
	}
	public function showoneAction(){
		$id=$this->getRequest()->getParam('id');
		$mo=new Review();
		$model=new News();	
		$sc=new School();
		$reviews=$mo->manshowlist($id);
		$res=$model->getOneNews($id);
		
		$dic=new Dic();
		
		$tag=$_REQUEST['tag'];
		if(!empty($tag)){
			$scid=$dic->getSCID();
		}else{
			$scid=$this->getRequest()->getParam('scid');
			$this->view->tag='1';
		}
	
		$school=$sc->getOneSchool($scid);
		$this->view->scpic=$school['pic'];
		$this->view->scname=$school['scname'];
		$this->view->scid=$scid;
		$this->view->reviews=$reviews;
		$this->view->res=$res;
		
	}

	public function issueAction(){
		$new=new News();
        $dic=new Dic();
        $sc=new School();
        $dyscore=$this->getRequest()->getParam('dyscore');
        $zyscore=$this->getRequest()->getParam('zyscore');
        $sumscore=$this->getRequest()->getParam('sumscore');    
        $bs=$this->getRequest()->getParam('bs');    
        $ms=$this->getRequest()->getParam('ms');    
        $allscore=$this->getRequest()->getParam('allscore');    
        $scid=$dic->getSCID();
        $issuer=$sc->getSchoolName($scid)."研招办";
        if(!($dyscore==60 && $zyscore==60 && $sumscore==120)){
        	$sc->alterScore($scid, $dyscore, $zyscore,$sumscore);
        }
        if($allscore!=""){
        	$sc->attendScore($scid, $bs, $ms, $allscore);
        }
		$time=$dic->getTimeL();
		$title=$this->getRequest()->getParam('title');
		$content=$this->getRequest()->getParam("editor1");
		$new->addNews($scid, $title, $content, $time, $issuer);
		$this->view->hint="发表成功";
		$this->view->url="/school/right";
		$this->_forward('hint','global');
	}
	
}

