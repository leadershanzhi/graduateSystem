<!DOCTYPE HTML>
<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>
<?php
session_start();
require_once APPLICATION_PATH.'/models/School.php';
require_once APPLICATION_PATH.'/models/Student.php';
require_once APPLICATION_PATH.'/models/Sdept.php';
require_once APPLICATION_PATH.'/models/News.php';
require_once APPLICATION_PATH.'/models/Scsdept.php';
require_once APPLICATION_PATH.'/util/Dic.php';
require_once 'BaseController.php';
class SchoolController extends BaseController
{
	public function adduploadAction(){
		  $model=new School();
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
				echo "Invalid file";
			}
			
			
			
			$content=$this->getRequest()->getParam('editor1');
			$scname=$this->getRequest()->getParam('scname');
			$sctype=$this->getRequest()->getParam('sctype');
			$email=$this->getRequest()->getParam('email');
			$phone=$this->getRequest()->getParam('phone');
			$scid=$_SESSION['loginman']['scid'];
			
			$scsde=new Scsdept();
			$majors=$_REQUEST['majors'];
			for($i=0;$i<count($majors);$i++){
				$sdeptid= $majors[$i];
				$scsde->addScsdept($sdeptid, $scid);
			}
			
			$model->addothers($scid, $scname, $sctype, $email, $phone, $pic, $content);
			$this->view->hint="初始化成功";
	        $this->view->url="/school/right";
	        $this->_forward('hint','global');
	}
	public function updateuploadAction(){
		$model=new School();
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
			
		$content=$this->getRequest()->getParam('article-body');
		$scname=$this->getRequest()->getParam('scname');
		$sctype=$this->getRequest()->getParam('sctype');
		$email=$this->getRequest()->getParam('email');
		$phone=$this->getRequest()->getParam('phone');
		$scid=$_SESSION['loginman']['scid'];
		$model->addothers($scid, $scname, $sctype, $email, $phone, $pic, $content);
		
		$scsde=new Scsdept();
		$majors=$_REQUEST['majors'];
		for($i=0;$i<count($majors);$i++){
			$sdeptid= $majors[$i];
			$scsde->addScsdept($sdeptid, $scid);
		}
		
		$this->view->hint="修改信息成功";
	    $this->view->url="/school/right";
	    $this->_forward('hint','global');
	}
	public function addmessAction(){
		$se=new Sdept();
		$this->view->sdepts=$se->getsdepts();
	}
	public function rightAction(){
		$mod=new News();
    	$this->view->news=$mod->getAllNews();
	}
	public function addsdeptpAction(){
		
	}
	public function addsdeptAction(){
		$name=$this->getRequest()->getParam('sdename');
		$dis=$this->getRequest()->getParam('dis');
		$sd=new Sdept();
		$sd->addsdept($name,$dis);
	    $this->_forward('right','school');
		
	}
	public function stuselectAction(){
		$model=new School();
		$stu=new Student();
		
		$tmresult=$stu->getApplySchoolName();
		$this->view->tmresult=$tmresult;
		$res=$model->getAllSchool();
		$this->view->scs=$res;
		
	}
	public function updatemessAction(){
		$scid=$_SESSION['loginman']['scid'];
		$model=new School();
		$res=$model->getone($scid);
		$this->view->res=$res;
		
		$scsde=new Scsdept();
		$this->view->sdepts=$scsde->getremainsdepts($scid);
		$this->view->xuansdepts=$scsde->getscsdepts($scid);
	}
	
	
	public function getscsdeptAction(){
		$q=trim($_GET["q"]);
		$model=new School();
		$db=$model->getAdapter();
		$res=$db->query("select * from school where scname='".$q."'")->fetchAll();
		foreach ($res as $row){
			$scid=$row['scid'];
		}
			
		$scsde=new Scsdept();
		$xuansdepts=$scsde->getscsdepts($scid);
	
		echo "<option>___请选择院系___</option>";
		foreach ($xuansdepts as $row){
			$na=$row['na'];	    
			$id=$row['sdeptid'];	    
			echo "<option value=$id>$na</option>";
		}

		exit();
	}
	public function checksdeptAction(){
		$q=trim($_GET["q"]);
		$model=new Sdept();
		$db=$model->getAdapter();
		$res=$db->query("select * from sdept where name='$q'")->fetchAll();
		$count=count($res);
		 
		if($count==0){
			$response="新增推免院系合法";
			
		}else{
			$response="已存在此院系，非法";
		}
		echo $response;
		exit();
	}
	public function showschoolsAction(){
		$model=new School();
		$res=$model->getAllSchool();
		$this->view->scs=$res;
	}
	public function showoneAction(){
		$id=$this->getRequest()->getParam('id');
		$model=new School();
		$this->view->res=$model->getOneSchool($id);
	}
	
	public function getscsAction(){
		$sdeptid=trim($_GET["q"]);
		$sde=new Scsdept();
		$array=$sde->getscbysdept($sdeptid);
		echo "<option>___请选择学校___</option>";
		foreach ($array as $row){
		
			$scname=$row['scname'];
			echo "<option>$scname</option>";
		}
		exit();
	}
	
    public function testscoreAction(){
    	$sc=trim($_GET["q"]);
    	
    	$zy=$_SESSION['loginuser']['zyscore'];
		$dy=$_SESSION['loginuser']['dyscore'];
		$sum=$zy+$dy;
		$model=new School();
		$db=$model->getAdapter();
		$ress=$db->query("select * from school where scname='".$sc."'")->fetchAll();
		$tag=count($ress);
		if($tag=='0'){
			$this->view->test='请选择你想推免的学校';
			echo "请选择你想推免的学校";
		}else{
			foreach ($ress as $row){
				$zyr=$row['zyscore'];
				$dyr=$row['dyscore'];
				$sumr=$row['sumscore'];
				
			}
		
		}
		$res=$db->query("select * from school where scname='".$sc."'")->fetchAll();
		foreach ($res as $row){
			$zyr=$row['zyscore'];
			$dyr=$row['dyscore'];
			$sumr=$row['sumscore'];
			if($sumr<=$sum){
			   if($zyr<=$zy){
			   	  if($dyr<=$dy){
			   	  	echo "您各项成绩符合推免要求";
			   	  }else{
			   	  	echo "<font color=red>要求分数::</font>";
			   	  	echo "德育:_".$zyr.";  智育:_".$dyr.";  总分:_".$sumr;
			   	  	echo "<br/><font color=red>分析结果::</font>";
			   	  	echo "德育成绩不够".$dyr.",不能推免.";   	  	
			   	  }
			   }else{
			   	  echo "<font color=red>要求分数::</font>";
			   	  echo "德育:_".$zyr.";  智育:_".$dyr.";  总分:_".$sumr;
			   	  echo "<br/><font color=red>分析结果::</font>";
			   	  echo "智育成绩不够".$zyr.",不能推免.";
               }
			}else{
                echo "<font color=red>要求分数::</font>";
                echo "德育:_".$zyr.";  智育:_".$dyr.";  总分:_".$sumr;
                echo "<br/><font color=red>分析结果::</font>";
				echo "总分不够".$sumr.",不能推免.";
			}
		}
		exit();
    }
}

