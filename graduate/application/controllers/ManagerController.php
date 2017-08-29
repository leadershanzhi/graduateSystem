<!DOCTYPE HTML>
<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>
<?php
session_start();
require_once APPLICATION_PATH.'/models/Manager.php';
require_once APPLICATION_PATH.'/models/School.php';
require_once 'BaseController.php';
class ManagerController extends BaseController
{
	public function addmanAction(){ 	
       $scid=$this->getRequest()->getParam('scid');
       $pw=$this->getRequest()->getParam('pw');
       $point=$this->getRequest()->getParam('point');
       $model=new Manager();
       $mo=new School();
       $tag=$model->addman($scid, $pw,$point);
       if($tag){
       	  $mo->insertid($scid);
       	  $this->view->hint="注册成功";
          $this->view->url="/login/manlogin";
          $this->_forward('hint','global');
       }
    }
    public function loginjudgeAction(){  	
        $model=new Manager();
        $db=$model->getAdapter();
        $scid=$this->getRequest()->getParam("scid","");
        $pw=$this->getRequest()->getParam("pw","");
        $where=$db->quoteInto("scid=?", $scid)
        .$db->quoteInto("AND pw=?", md5($pw));
        $loginman=$model->fetchAll($where)->toArray();
        ini_set('display_errors', 'Off');
        session_start();
        $_SESSION['loginman']=$loginman[0];
        if((strtoupper($_POST["code"])) == strtoupper(($_SESSION["VerifyCode"]))){
	        if(count($loginman)==1){
	           $this->view->hint="登录成功,现在前往管理页面";
	           $this->view->url="../php/main.php";
	           $this->_forward('hint','global');
	        }else{
	            $this->view->hint="用户名不匹配密码";
	            $this->view->url="/login/manlogin";
	            $this->_forward('hint','global');
	        }
        }else{
        	$this->view->hint="您输入的验证码有误";
            $this->view->url="/login/manlogin";
            $this->_forward('hint','global');
        }
        
    }
    public function origialpwAction(){
    	$con = mysql_connect("localhost","root","");
    	mysql_select_db("graduate", $con);
    	$q=md5($_REQUEST["q"]);
    	$scid=$_SESSION['loginman']['scid'];
    	$result = mysql_query("select * from manager where scid='$scid' and pw='$q'");
    	$count=mysql_num_rows($result);
    	
    	if($count==1){
    		$response="原密码正确";
    	}else{
    		$response="原密码错误";
    	}
    	echo $response;
    	exit();
    }
    public function alterpwxAction(){
    	
    	$id=$_SESSION['loginman']['id'];
    	$pw=md5($this->getRequest()->getParam('pw'));
    	$model=new Manager();
    	$model->alterpwx($id,$pw);	
    	$this->view->hint="密码更改成功";
	    $this->view->url="/school/right";
	    $this->_forward('hint','global');
    	
    }
    
    public function registerAction(){
    	
    }
    public function mainAction(){
    	
    }
    public function alterpwAction(){
    	
    }
    
}

