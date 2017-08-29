<!DOCTYPE HTML>
<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>
<?php
session_start();
require_once APPLICATION_PATH.'/models/Response.php';
require_once 'BaseController.php';
class ResponseController extends BaseController
{
	public function addAction(){
		$re=new Response();
        $rvid=$this->getRequest()->getParam('rvid');
        $newid=$this->getRequest()->getParam('newid');
        $content=$this->getRequest()->getParam('con');
        if($re->addResponse($rvid, $content)){
            $this->view->hint="回复成功";
	        $this->view->url="/news/showone?tag=1&id=$newid";
	        $this->_forward('hint','global');
        }	
	}
	public function delAction(){
		$re=new Response();
        $id=$this->getRequest()->getParam('id');      
        $newid=$this->getRequest()->getParam('newid');
        $re->delOneResponse($id);
        $this->view->tag='1';
        $this->view->hint="删除成功";
        $this->view->url="/news/showone?tag=1&id=$newid";
        $this->_forward('hint','global');
	}
}

