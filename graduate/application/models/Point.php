<?php 
  require_once APPLICATION_PATH.'/util/Dic.php';
  class Point extends Zend_Db_Table{
  	protected $_name="point";		
  	public function handlepoint(){
  		$dic=new Dic();
  		$hour=$dic->getHour();
  		if($hour<=3){
  			$this->changepoint('t1');
  		}else if($hour<=6){
  			$this->changepoint('t2');
  		}else if($hour<=9){
  			$this->changepoint('t3');
  		}else if($hour<=12){
  			$this->changepoint('t4');
  		}else if($hour<=15){
  			$this->changepoint('t5');
  		}else if($hour<=18){
  			$this->changepoint('t6');
  		}else if($hour<=21){
  			$this->changepoint('t7');
  		}else if($hour<=24){
  			$this->changepoint('t8');
  		}
  	}
  	public function changepoint($t){
  		$res=$this->find(array(1))->toArray();
  		$count= $res[0][$t];
  		$count=$count+50;
  		$set=array($t=>$count);
  		$where="id='1'";
  		$this->update($set, $where);
  	}
  }
?>