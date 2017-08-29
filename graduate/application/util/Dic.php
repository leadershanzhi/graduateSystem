<?php
  session_start();
  class Dic{
  	public function getTimeL(){
  		return date("Y-m-d H:i:s");
  	}
  	public function getTimeS(){
  		return date("Y-m-d");
  	}
  	public function getSCID(){
  		return $_SESSION["loginman"]["scid"];
  	}
  	public function getSTUID(){
  		return $_SESSION['loginuser']['id'];
  	}
  	
  	public function getStuKey(){
  		return $_SESSION['loginuser']['zzid'];
  	}
  	
  	public function getHour(){
  		return date("H");
  	}

  	public function getPie(){ 
  		$con = mysql_connect("localhost","root","");
  		mysql_select_db("graduate", $con);
  		
  		$scid=$this->getSCID();
        $sql="SELECT scname FROM school WHERE scid='$scid'";
        $result = mysql_query($sql);
      	$row = mysql_fetch_array($result);
      	$scname=$row[0];
      	$sql="SELECT tag,COUNT(*) FROM apply WHERE scname='$scname' apply GROUP BY tag";
      	$res = mysql_query($sql);
      	$row = mysql_fetch_array($res);
      	return $row;
  	}
  } 
?>