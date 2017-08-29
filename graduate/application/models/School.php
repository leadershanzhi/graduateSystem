<?php 
  class School extends Zend_Db_Table{
  	protected $_name="school";	
  	protected $_primary="scid";	
  	public function insertid($scid){
  		$data=array(
  			'scid'=>$scid,
  		);
  		$this->insert($data);
  	}
  	public function addothers($scid,$scname,$sctype,$email,$phone,$pic,$content){
  		$set=array('scname'=>$scname,'sctype'=>$sctype,'email'=>$email,'phone'=>$phone,'pic'=>$pic,'content'=>$content);
  		$where="scid='$scid'";
  		$this->update($set, $where);
  		
  	}
  	public function getone($scid){
  		$res=$this->find($scid);
  		return $res;
  	}
  	public function getOneSchool($id){
  		$this->addClick($id);
  		$res=$this->find(array($id))->toArray();
  		return $res[0];
  	}
  	public function getSchoolName($scid){
  		$res=$this->find(array($scid))->toArray();
  		return $res[0]['scname'];
  	}
  	
  	
  	public function getSchoolScidByName($scname){
  		
  	}
  	public function getAllSchool(){
  		$db=$this->getAdapter();
  		$array=$db->query("SELECT * FROM school ORDER BY clip desc")->fetchAll();
  		return $array; 	
  	}
  	public function getExcelSchool(){
  		$db=$this->getAdapter();
  		$array=$db->query("SELECT * FROM school ORDER BY clip desc limit 0,4")->fetchAll();
  		return $array;
  	}
  	public function alterScore($scid,$dyscore,$zyscore,$sumscore){
  		$set=array('dyscore'=>$dyscore,'zyscore'=>$zyscore,'sumscore'=>$sumscore);
  		$where="scid='$scid'";
  		$this->update($set, $where);
  	}
  	public function attendScore($scid,$bs,$ms,$allscore){
  		$set=array('bscore'=>$bs,'mscore'=>$ms,'allscore'=>$allscore);
  		$where="scid='$scid'";
  		$this->update($set, $where);
  	}
  	public function addClick($scid){
  		$res=$this->find(array($scid))->toArray();
  		$clip=$res[0]['clip'];
  		$clip=$clip+1;
  		$set=array('clip'=>$clip);
  		$where="scid='$scid'";
  		$this->update($set, $where);
  	}
  	public function judgeattend($scid){
  		$res=$this->find(array($scid))->toArray();
  		if($res[0]['allscore']==0){
  			return "0";
  		}else{
  			return "1";
  		}
  	}
  }
?>