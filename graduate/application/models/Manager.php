<?php 
  class Manager extends Zend_Db_Table{
  	protected $_name="manager";		
  	public function addman($scid,$pw,$point){
  		$data=array(
  				'scid'=>$scid,
  				'point'=>$point,
  				'pw'=>md5($pw),		
  		);
  		if($this->insert($data)>0){
  			return true;
  		}else{
  			return false;
  		}
  	}
  	public function alterpwx($id,$pw){
  		$set=array('pw'=>$pw);
  		$where="id='$id'";	
  		$this->update($set, $where); 			
  	}
  }
?>