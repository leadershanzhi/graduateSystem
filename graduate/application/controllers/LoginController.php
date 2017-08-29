<!DOCTYPE HTML>
<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>
<?php
require_once APPLICATION_PATH.'/models/Student.php';
require_once APPLICATION_PATH.'/models/Point.php';
require_once 'BaseController.php';
class LoginController extends BaseController
{
	public function registerAction()
	{
		
	}
	public function testAction(){
		
	}
	public function loginAction(){
		
	}
	public function manloginAction(){
		
	}
	public function loginjudgeAction(){  	
        $model=new Student();
        $db=$model->getAdapter();
        $id=$this->getRequest()->getParam("id","");
        $pw=$this->getRequest()->getParam("pw","");
        $where=$db->quoteInto("id=?", $id)
        .$db->quoteInto("AND pw=?", md5($pw));
        $loginuser=$model->fetchAll($where)->toArray();
        if(count($loginuser)==1){
        	ini_set('display_errors', 'Off');
        	session_start();
        	$_SESSION['loginuser']=$loginuser[0];
        	if((strtoupper($_POST["code"])) == strtoupper(($_SESSION["VerifyCode"]))){
        		$p=new Point();
        		$p->handlepoint();  	
        		$this->_forward('stuenter','student');
        	}else{
        		 $this->view->hint="验证码输入有误";
                 $this->view->url="/login/login";
                 $this->_forward('hint','global');
        	}

       
        }else{
                 $this->view->hint="用户名不匹配密码";
                 $this->view->url="/login/login";
                 $this->_forward('hint','global');
        }
    }
}

