<!DOCTYPE HTML>
<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>
<?php 
require_once APPLICATION_PATH.'/models/Student.php';
require_once APPLICATION_PATH.'/models/Apply.php';
require_once APPLICATION_PATH.'/util/Dic.php';
require_once 'BaseController.php';
class StudentController extends BaseController
{
	public function addstuAction(){ 	
       $id=$this->getRequest()->getParam('id');
       $pw=$this->getRequest()->getParam('pw');
       $name=$this->getRequest()->getParam('name');
       $phone=$this->getRequest()->getParam('phone');
       $mail=$this->getRequest()->getParam('mail');
       $dyscore=$this->getRequest()->getParam('dyscore');
       $zyscore=$this->getRequest()->getParam('zyscore');
       $scid=$this->getRequest()->getParam('scid');
       $model=new Student();
       $model->initstu($id, $pw, $name, $phone, $dyscore, $zyscore, $scid,$mail);
       if($model->add()){
       	  $this->view->hint="注册成功";
          $this->view->url="/login/login";
          $this->_forward('hint','global');
       }
    }
    
    public function sturegisterAction(){
    	
    }
    
    public function stualterpwAction(){
    	$stu=new Student();
    	$info=$stu->getStuInfo();
    	$this->view->name=$info[0]['name'];
    	$id=$info[0]['id'];
    	$this->view->id=$id;
    	
    	$pw=$_REQUEST['pw'];
    	if(!empty($pw)){
    		$stu->alterPw($id, $pw);
    		$this->view->hint="修改成功";
    		$this->view->url="/student/stuenter";
    		$this->_forward('hint','global');
    	}
    }
    
    public function pworigialAction(){
    	$con = mysql_connect("localhost","root","");
    	mysql_select_db("graduate", $con);
    	$pw=md5($_REQUEST["pw"]);
    	$dic=new Dic();
    	$id=$dic->getSTUID();
    	$sql="select * from student where id='$id' and pw='$pw'";
    	$result = mysql_query($sql);
    	$count=mysql_num_rows($result);
    	 
    	if($count==1){
    		$response="原密码正确";
    	}else{
    		$response="原密码错误";
    	}
    	echo $response;
    	exit();
    }
    public function backpwAction(){
    	$this->view->tag='0';
    	$id=$_REQUEST['id'];
    	$mail=$_REQUEST['mail'];
    	$this->view->tipid=$id;
    	if(!empty($id)){	
    		$stu=new Student();
    		if($stu->isExist($id)==0){
    			$this->view->tag='1';
    		}else{
    			$this->view->tag='2';
    			$this->view->ta='0';
    			if(!empty($mail)){	
    				if($stu->judgeTwoEmail($id, $mail)==1){
    					$this->view->mail=$mail;
    					$this->view->id=$id;
    					$pw=rand(100000, 900000);
    					$this->view->pw=$pw;
    					$stu->alterPw($id, $pw);
    					$this->_forward('sendemail','student');
    				}else{
    					$this->view->ta='2';
    				}
    			}
    		}
    	}
    }
    public function sendemailAction(){
    	
    }
    public function stuenterAction(){
    	$model=new Apply();
    	$mo=new Dic();$stuid=$mo->getSTUID();
    	$this->view->res=$model->showapply($stuid);
    }
    public function stuscoreAction(){
    	
    }
    public function applyscAction(){
    	$scname=$this->getRequest()->getParam('se');
    	$bz=$this->getRequest()->getParam('bz');
    	$sdeptid=$this->getRequest()->getParam('ttt');
    	$dic=new Dic();
    	$stu=new Student();
    	
    	$stuid=$dic->getSTUID();
    	$time=$dic->getTimeL();
    	
    	$tmresult=$stu->getApplySchoolName();
    	if($tmresult=="0"){
    		$model=new Apply();
    		$tag=$model->addapply($stuid, $scname, $time,$bz,$sdeptid);
    		if($tag=="1"){
    			$this->view->hint="申请成功";
    			$this->view->url="/student/stuenter";
    			$this->_forward('hint','global');
    		}else if($tag=="2"){
    			$this->view->hint="不得重复申请同一个学校";
    			$this->view->url="/school/stuselect";
    			$this->_forward('hint','global');
    		}
    	}else{
    		$this->view->hint="您已被录取，没有权限再次参加推免";
    		$this->view->url="/student/stuenter";
    		$this->_forward('hint','global');
    	}
	    	
    	
    }
    public function stualterAction(){
    	$stu=new Student();
    	$info=$stu->getStuInfo();
    	$this->view->info=$info[0];
    }
    public function alterstumessAction(){
    	
    	$model=new Student();
    if ((($_FILES["file"]["type"] == "image/gif")
				|| ($_FILES["file"]["type"] == "image/jpeg")
				|| ($_FILES["file"]["type"] == "image/pjpeg"))
				&& ($_FILES["file"]["size"] < 80000000))
		{
			if ($_FILES["file"]["error"] > 0)
			{
				echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
			}
			else
			{
				//echo "Upload: " . $_FILES["file"]["name"] . "<br />";
				$time=time();
				$_FILES["file"]["name"]=$time.$_FILES["file"]["name"];
				move_uploaded_file($_FILES["file"]["tmp_name"],
				"upload/" . $_FILES["file"]["name"]);
				$pic=$_FILES["file"]["name"];
				//echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
			}
		}
		else
		{
			$pic=$this->getRequest()->getParam('pic');
		}

    	$name=$this->getRequest()->getParam('name');
    	$mail=$this->getRequest()->getParam('mail');
    	$phone=$this->getRequest()->getParam('phone');
        
    	
    	
    	$model->alterstumess($pic, $name, $phone, $mail);
    	$this->view->hint="基本信息修改成功";
    	$this->view->url="/student/stuenter";
    	$this->_forward('hint','global');
    }
    public function checkuniqueAction(){
    	$con = mysql_connect("localhost","root","");
		mysql_select_db("graduate", $con);
		$q=$_REQUEST["q"];
		$result = mysql_query("select * from student where id='$q'");
		$count=mysql_num_rows($result);
		
		if($count==1){
			$response="已被注册";
		}else{
			$response="可用";
		}
		echo $response;
		exit();
    }   
}
?>
