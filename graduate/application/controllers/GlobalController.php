<!DOCTYPE HTML>
<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>
<?php
require_once 'BaseController.php';
class GlobalController extends BaseController
{
    public function hintAction(){
        
    }
    public function exitAction(){
       session_destroy();
       $this->forward('index','index');
    }
    
}

