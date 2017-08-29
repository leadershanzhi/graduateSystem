<?php
  require_once APPLICATION_PATH.'/util/Dic.php'; 
  class Student extends Zend_Db_Table{
  	protected $_name="student";
  	public $id;
  	public $pw;
  	public $name;
  	public $phone;
  	public $dyscore;
  	public $zyscore;
  	public $scid;
  	public $mail;
    
  	public function initstu($id,$pw,$name,$phone,$dyscore,$zyscore,$scid,$mail){
  		$this->id=$id;
  		$this->pw=md5($pw);
  		$this->name=$name;
  		$this->phone=$phone;
  		$this->dyscore=$dyscore;
  		$this->zyscore=$zyscore;
  		$this->scid=$scid;
  		$this->mail=$mail;
  	}
  	public function alterPw($id,$pw){
  		$set=array('pw'=>md5($pw));
  		$where="id='$id'";
  		$this->update($set, $where);
  	}
  	public function getApplySchoolName(){
  		$dic=new Dic();
  		$id=$dic->getStuKey();
  		$res=$this->find(array($id))->toArray();
  		return $res[0]['tmresult'];
  	}
  	public function add(){
  		$data=array(
        	'id'=>$this->id,
         	'pw'=>$this->pw,
  			'name'=>$this->name,
  			'phone'=>$this->phone,
  			'dyscore'=>$this->dyscore,
  			'zyscore'=>$this->zyscore,
  			'mail'=>$this->mail,
  			'scid'=>$this->scid  		
        );
  		if($this->insert($data)>0){
  			return true;
  		}else{
  			return false;
  		}
  	}
  	
  	public function getsucess(){
  		$db=$this->getAdapter();
  		$array=$db->query("SELECT * FROM student WHERE tmresult!='0'")->fetchAll();
  		return $array;
  	}
  	
  	public function isExist($id){
  		$db=$this->getAdapter();
  		$array=$db->query("SELECT * FROM student WHERE id='$id'")->fetchAll();
  		return count($array);
  	}
  	
  	public function getStuInfo(){
  		$dic=new Dic();
  		$id=$dic->getStuKey();
  		$res=$this->find(array($id))->toArray();
  		return $res;
  	}
  	
  	public function alterstumess($pic,$name,$phone,$mail){
  		$dic=new Dic();
  		$id=$dic->getStuKey();
  	
  		$set=array('pic'=>$pic,'name'=>$name,'phone'=>$phone,'mail'=>$mail);
  		$where="zzid='$id'";
  		$this->update($set, $where);
  	}
  	public function judgeTwoEmail($id,$mail){
        $db=$this->getAdapter();
  		$array=$db->query("SELECT mail FROM student WHERE id='$id'")->fetchAll();
  		foreach ($array as $item){
  			$ma=$item['mail'];
  		}
  		if($ma==$mail){
  			return 1;
  		}else{
  			return 0;
  		}
  	}
  	
  }

?>