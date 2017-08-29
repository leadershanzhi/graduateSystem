<?php 
  require_once APPLICATION_PATH.'/util/Dic.php';
  class Scsdept extends Zend_Db_Table{
  	protected $_name="scsdept";	
  	public function addScsdept($id,$scid){	
  		$data=array(
  			'sdeptid'=>$id,
  			'scid'=>$scid,
  		);
  		$this->insert($data);
  	}
  	public function getscsdepts($scid){
  		$db=$this->getAdapter();
  		$array=$db->query("SELECT sdeptid,NAME AS na FROM scsdept,sdept sde WHERE scid='$scid' AND sdeptid=sde.id")->fetchAll();
  		return $array;
  	}
  	
  	public function getscbysdept($sdeptid){
  		$db=$this->getAdapter();
  		$array=$db->query("SELECT scname FROM scsdept sd,school sc WHERE sd.scid=sc.scid AND sdeptid='$sdeptid'")->fetchAll();
  		return $array;
  	}
  	public function getremainsdepts($scid){
  		$db=$this->getAdapter();
  		$array=$db->query("SELECT id,NAME AS na FROM sdept WHERE id NOT IN(SELECT sdeptid FROM scsdept WHERE scid='$scid')")->fetchAll();
  		return $array;
  	}
  }
?>