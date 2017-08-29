<?php 
  class Sdept extends Zend_Db_Table{
  	protected $_name="sdept";	
  	public function addsdept($name,$dis){	
  		$data=array(
  			'name'=>$name,
  			'dis'=>$dis,
  		);
  		$this->insert($data);
  	}
  	public function getsdepts(){
  		$array=$this->fetchAll()->toArray();
  		return $array;	
  	}
  }
?>