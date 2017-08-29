<!DOCTYPE HTML>
<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>
<?php
session_start();
require_once APPLICATION_PATH.'/models/Apply.php';
require_once APPLICATION_PATH.'/models/School.php';
require_once APPLICATION_PATH.'/util/Dic.php';
require_once 'BaseController.php';
class ApplyController extends BaseController
{
	
	public function changestateAction(){
        $id=$this->getRequest()->getParam('id');
        $tag=$this->getRequest()->getParam('tag');
        $model=new Apply();
        if($model->changestate($id, $tag)){
			$this->view->hint="你已确定参加此高校复试，请按时参加复试！详情参考此高校发布的通知";
			$this->view->url="/student/stuenter";
			$this->_forward('hint','global');
        }
	}
	public function handleAction(){
		$model=new Apply();
		$dic=new Dic();
		$mo=new School();
		$scid=$dic->getSCID();
		$scname=$mo->getSchoolName($scid);
		$this->view->attendtag=$mo->judgeattend($scid);
		$this->view->pscname=$scname;
		$this->view->apply=$model->getapply($scname);
	}
	
	public function addscoreAction(){
		$ids=$this->getRequest()->getParam('ids');
		$bss=$this->getRequest()->getParam('bss');
		$mss=$this->getRequest()->getParam('mss');
		$mo=new Apply();
		for($i=0;$i<count($ids);$i++){
            $mo->addscore($ids[$i], $bss[$i], $mss[$i]);
		}
		$this->view->hint="录入成绩成功";
		$this->view->url="/apply/handle";
		$this->_forward('hint','global');
	}
	public function printAction(){
		$mo=new Apply();
		$mo->printapply();
	}
	public function sendAction(){
		$model=new Apply();
		$dic=new Dic();
        $mo=new School();
        $scid=$dic->getSCID();
        $scname=$mo->getSchoolName($scid);
        $apply=$model->getapply($scname);
        $model->sendattend($apply,$scid);
        $this->view->hint="已成功发放录取通知！";
        $this->view->url="/apply/handle";
        $this->_forward('hint','global');
	}
	public function sureAction(){
        $id=$_REQUEST['id'];
		$mo=new Apply();
		$mo->changeapplybz($id, "1");
		$scname=$mo->getSchoolName($id);
		$mo->changestate($id, "4");
		$mo->changestustate($scname);
		$this->forward('stuenter','student');
	}
	public function denyAction(){
		$id=$_REQUEST['id'];
		$mo=new Apply();
		$mo->changestate($id, "5");
		$mo->changeapplybz($id, "1");
		$this->forward('stuenter','student');
	}

}

