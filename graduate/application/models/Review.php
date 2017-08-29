<?php
  require_once 'PageBean.php';
  session_start();
  require_once APPLICATION_PATH.'/util/Dic.php';
  class Review extends Zend_Db_Table{
  	protected $_name="review";
  	protected $pagebean;

  	public function getPagebean() {
  		return $this->pagebean;
  	}		
  	public function addone($newid,$ques,$content){
  		$dic=new Dic();
  		$time=$dic->getTimeL();
  		$stuid=$dic->getSTUID();
  		$data=array('newid'=>$newid,'stuid'=>$stuid,'content'=>$content,'time'=>$time,'ques'=>$ques);
  		if($this->insert($data)>0){
  			return true;
  		}else{
  			return false;
  		}
  	}
  	public function showlist($newid,$pnow){
  		$this->pagebean=new PageBean();
  		$db=$this->getAdapter();
  		$size=5;
  		$this->pagebean->setPsize($size);
  		$this->pagebean->setPnow($pnow);
  		$psize=$this->pagebean->getPsize();
  		$res=$db->query("SELECT r.id AS rvid,s.name AS stuname,ques,content,TIME as t FROM review r,student s WHERE s.id=stuid AND newid='$newid'")->fetchAll();	
  		$rcount=count($res);	
  		$this->pagebean->setRcount($rcount);
  		$this->pagebean->setPcount(ceil($rcount/$psize)); 
  		$sql= "SELECT r.id AS rvid,s.name AS stuname,ques,content,TIME as t FROM 
  				review r,student s WHERE s.id=stuid AND newid='$newid' limit "
      			.($pnow-1)*$size.",".$size;		
  		$array=$db->query($sql)->fetchAll();		
  		return $array;
  	}
  	
  	public function manshowlist($id){
  		$sql="SELECT r.id,stuid,s.pic,s.name ,ques,content,TIME AS t FROM review r,student s WHERE s.id=stuid AND newid='$id'";
  		$db=$this->getAdapter();
  		$array=$db->query($sql)->fetchAll();
  		return $array;
  	}
  	
  }
?>