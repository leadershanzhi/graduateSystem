<?php 
  require_once APPLICATION_PATH.'/util/Dic.php';
  class Response extends Zend_Db_Table{
  	protected $_name="response";		
  	
  	public function getResponse($rvid){
  		$db=$this->getAdapter();
  		$res=$db->query("select * from response where rvid='".$rvid."'")->fetchAll();
  		return $res;
  	}
  	public function addResponse($rvid,$content){
  		$dic=new Dic();
  		$time=$dic->getTimeL();
  		$data=array('rvid'=>$rvid,'content'=>$content,'time'=>$time);
  		if($this->insert($data)>0){
  			return true;
  		}else{
  			return false;
  		}
  	}
  	public function delOneResponse($id){
  		$this->delete("id='$id'");
  	}
  }
?>