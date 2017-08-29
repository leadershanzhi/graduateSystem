<?php 
  require_once 'PageBean.php';
  session_start();
  require_once APPLICATION_PATH.'/util/Dic.php';
  class News extends Zend_Db_Table{
  	protected $_name="news";
  	protected $pagebean;
  	
  	/**
	 * @return the $pagebean
	 */
	public function getPagebean() {
		return $this->pagebean;
	}
    
	public function getAllNews(){
		$db=$this->getAdapter();
		$array=$db->query("SELECT * FROM news ORDER BY time desc")->fetchAll();
		return $array;
		//$array=$this->fetchAll()->toArray();
		//return $array;
	}
	
	public function changecount($id){
		$res=$this->find(array($id))->toArray();
		$count= $res[0]['rcount'];
		$count=$count+1;
		$set=array('rcount'=>$count);
		$where="id='$id'";
		$this->update($set, $where);
	}
	
	public function getStuPagel($pnow,$sc){
		$this->pagebean=new PageBean();
		$db=$this->getAdapter();
		$this->pagebean->setPsize(6);
		$this->pagebean->setPnow($pnow);
		$psize=$this->pagebean->getPsize();
		$res=$db->query("SELECT * FROM news where issuer like '%$sc%'")->fetchAll();
		//$res=$this->fetchAll()->toArray();
		
		$rcount=count($res);
		
		$this->pagebean->setRcount($rcount);
		$this->pagebean->setPcount(ceil($rcount/$psize));
			
		$model=new Dic();
		$scid=$model->getSCID();
		
		$where=$db->quoteInto("issuer like '%$sc%'");
		$array=$this->fetchAll($where,'time desc',$this->pagebean->getPsize(),($pnow-1)*$psize)->toArray();
		return $array;
	}
	public function getStuPage($pnow){
		$this->pagebean=new PageBean();
		$db=$this->getAdapter();
		$this->pagebean->setPsize(6);
		$this->pagebean->setPnow($pnow);
		$psize=$this->pagebean->getPsize();
		$res=$this->fetchAll()->toArray();
		$rcount=count($res);
		 
		$this->pagebean->setRcount($rcount);
		$this->pagebean->setPcount(ceil($rcount/$psize));
	
		$where=$db->quoteInto("1=?",'1');
	
		$array=$this->fetchAll($where,'time desc',$this->pagebean->getPsize(),($pnow-1)*$psize)->toArray();
		return $array;
	}
	
	public function getPagel($pnow,$title,$content){
		$this->pagebean=new PageBean();
		$db=$this->getAdapter();
		$this->pagebean->setPsize(6);
		$this->pagebean->setPnow($pnow);
		$psize=$this->pagebean->getPsize();
		$model=new Dic();
		$scid=$model->getSCID();
		$res=$db->query("SELECT * FROM news where scid='$scid' and title like '%$title%' and content like '%$content%'")->fetchAll();
		//$res=$this->fetchAll()->toArray();
		$rcount=count($res);
	
		$this->pagebean->setRcount($rcount);
		$this->pagebean->setPcount(ceil($rcount/$psize));

		$where=$db->quoteInto("scid=?",$scid).$db->quoteInto("and title like '%$title%'").$db->quoteInto("and content like '%$content%'");
		$array=$this->fetchAll($where,'time desc',$this->pagebean->getPsize(),($pnow-1)*$psize)->toArray();
		return $array;
	}
	public function getPage($pnow){
  		$this->pagebean=new PageBean();
  		$db=$this->getAdapter();
  		$this->pagebean->setPsize(6);
  		$this->pagebean->setPnow($pnow);
  		$psize=$this->pagebean->getPsize();
  		$model=new Dic();
  		$scid=$model->getSCID();
  		$res=$db->query("SELECT * FROM news where scid='$scid'")->fetchAll();
  		//$res=$this->fetchAll()->toArray();
  		$rcount=count($res);
  	
  		$this->pagebean->setRcount($rcount);
  		$this->pagebean->setPcount(ceil($rcount/$psize));
  	    
  		
  		
  		$where=$db->quoteInto("scid=?",$scid);

  		
  	    $array=$this->fetchAll($where,'id',$this->pagebean->getPsize(),($pnow-1)*$psize)->toArray();
  		return $array;
  	}
  	public function addNews($scid,$title,$content,$time,$issuer){
  		$data=array('scid'=>$scid,'title'=>$title,'content'=>$content,'time'=>$time,'issuer'=>$issuer);
  		$this->insert($data);
  	}
  	public function getOneNews($id){
  		
  		$res=$this->find(array($id))->toArray();
  		return $res[0];
  	}
  	public function delOneNews($id){
  		$this->delete("id='$id'");
  	}
  }

?>