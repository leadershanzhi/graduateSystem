<?php 
  require_once APPLICATION_PATH.'/models/School.php';
  require_once APPLICATION_PATH.'/models/Student.php';
  require_once APPLICATION_PATH.'/util/Dic.php';
  class Apply extends Zend_Db_Table{
  	protected $_name="apply";		
  	public function addapply($stuid,$scname,$time,$bz,$sdeptid){
  		
  		if($this->applyunique($stuid, $scname)==0){
  			$data=array(
  					'stuid'=>$stuid,
  					'scname'=>$scname,
  					'bz'=>$bz,
  					'sdeptid'=>$sdeptid,
  					'time'=>$time
  			);
  			if($this->insert($data)>0){
  				return "1";
  			}else{
  				return "0";
  			}
  		}else{
  			return "2";
  		}
  		
  	}
    public function applyunique($stuid,$scname){
    	$db=$this->getAdapter();
    	$res=$db->query("select * from apply where stuid='".$stuid."' and scname='".$scname."'")->fetchAll();
    	return count($res);
    }
  	public function showapply($stuid){
  		$db=$this->getAdapter();
  		//$res=$db->query("select * from apply where stuid='".$stuid."'")->fetchAll();
  		$res=$db->query("SELECT a.id,scname,sd.name AS sdename,bscore,mscore,TIME AS ti,tag,bz FROM apply a,sdept sd WHERE stuid='$stuid' AND sdeptid=sd.id")->fetchAll();
  		return $res;
  	}
  	public function changestate($id,$tag){
  		$set=array('tag'=>$tag);
  		$where="id='$id'";
  		$this->update($set, $where);
  		return true;
  	}
  	public function changeapplybz($id,$bz){
  		$set=array('bz'=>$bz);
  		$where="id='$id'";
  		$this->update($set, $where);
  		
  	}
  	
  	public function getapplybz($id){
  		$res=$this->find(array($id))->toArray();
  		return $res[0]['bz'];
  	}
  	public function changestustate($scname){
  		$dic=new Dic();
  		$stuid=$dic->getSTUID();
  		$set=array('tmresult'=>$scname);
  		$where="id='$stuid'";
  		$stu=new Student();
  		$stu->update($set, $where);
  	}
  	public function getapply($scname){
  		$db=$this->getAdapter();
  		$res=$db->query("SELECT a.id AS applyid,stuid,scname,s.name AS stuname,sd.name AS sdename,dyscore,zyscore,bscore,mscore,(dyscore+zyscore+bscore+mscore) AS sumscore,tag FROM apply a,student s,sdept sd WHERE scname='$scname' AND s.id=stuid AND a.sdeptid=sd.id ORDER BY sumscore desc")->fetchAll();
  		return $res;
  	}
  	public function addscore($id,$bs,$ms){
  		$set=array('bscore'=>$bs,'mscore'=>$ms);
  		$where="id='$id'";
  		$this->update($set, $where);
  	}
  	
  	public function comparescore($bscore,$mscore,$allscore,$bs,$ms,$sumscore){
  		if($bs<$bscore || $ms<$mscore || $sumscore<$allscore){
  			return false;
  		}else{
  			return true;
  		}
  	}
  	
  	public function getSchoolName($id){
  		$res=$this->find(array($id))->toArray();
  		return $res[0]['scname'];
  	}
  	
  	public function sendattend($apply,$scid){
  		$sc=new School();
  		$it=$sc->getOneSchool($scid);
  		$bscore=$it['bscore'];
  		$mscore=$it['mscore'];
  		$allscore=$it['allscore'];
  		
  		foreach ($apply as $item){
  			$id=$item['applyid'];
  			$sumscore=$item['sumscore'];
  			$stuid=$item['stuid'];
  			$bs=$item['bscore'];
  			$ms=$item['mscore'];
  			if($this->comparescore($bscore, $mscore, $allscore, $bs, $ms, $sumscore)){
  				if($this->getapplybz($id)==0){
  					$this->changestate($id, "3");
  				}	
  			}else{
  				$this->changestate($id, "2");			
  			}
  			
  		}
  	}
  	
  }
?>