<!DOCTYPE HTML>
<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>
<?php
session_start();
require_once APPLICATION_PATH.'/models/News.php';
require_once APPLICATION_PATH.'/models/Review.php';
require_once APPLICATION_PATH.'/util/Dic.php';
require_once 'BaseController.php';
class ReviewController extends BaseController
{
	public function addreviewAction(){
		
		$new=new News();
		$newid=$this->getRequest()->getParam('newid');
		$new->changecount($newid);
		$ques=$this->getRequest()->getParam('ques');
		$content=$this->getRequest()->getParam('content');
		$model=new Review();
		$tag=$model->addone($newid, $ques, $content);
		if($tag){
			$this->view->hint="评论成功";
            $this->view->url="/news/stushowone?id=$newid";
            $this->_forward('hint','global');
		}
	}	
}

