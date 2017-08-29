<?php
session_start();
require_once APPLICATION_PATH.'/models/School.php';
require_once APPLICATION_PATH.'/models/News.php';
require_once APPLICATION_PATH.'/models/Student.php';
require_once APPLICATION_PATH.'/models/Sdept.php';
require_once 'BaseController.php';
class IndexController extends BaseController
{
    public function indexAction()
    {
    	$model=new School();
    	$this->view->scs=$model->getExcelSchool();
    	$res=$model->getAllSchool();
    	$this->view->scss=$res;
    	
    	$mod=new News();
    	$this->view->news=$mod->getAllNews();
    	
    	$stu=new Student();
    	$this->view->stus=$stu->getsucess();
    	
    	$se=new Sdept();
    	$this->view->sdepts=$se->getsdepts();
    }
    public function footAction(){
    	
    }


}

