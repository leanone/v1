<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class projectm extends CI_Model {

     var $title   = '';
     var $content = '';
     var $date    = '';

     function __construct()
     {
         parent::__construct();
		 $this->load->database();
     }
	 function getCookieInfo($CookieID){
		 if($CookieID!=""){
			$query=$this->db->query("select * from db_project where CookieID=$CookieID");
			if($query->num_rows()){
				$row = $query->row_array();
				return $row;
			}
		 }
		 return false;	
		
	 }
	  function getInfoByHid($hid){
		 
		 if($hid>0){
			$query=$this->db->query("select * from db_project where Hid=$hid");
			if($query->num_rows()){
				$row = $query->row_array();
				return $row;
			}
		 }
		 return false;	
		
	 }
 
     function addSave($data)
     {
		//ID,mID,Uid,realName,weiChat,isQuan,Project,rNum,Tel,Email
		
	
		$this->db->set($data);
		$this->db->insert("db_project");
		$ID=$this->db->insert_id();
		
		

		$d=array("mID"=>substr(md5($ID),8,16)); 
		$s=$this->db->update_string("db_project",$d,"ID=$ID");
		$this->db->query($s);
		/**/
		//echo substr(md5($ID),8,16).":"."Uid=$ID";
		
	
		
		return true;
	 }
	 
	  function modSave($data,$mID)
     {
		
		$s=$this->db->update_string("db_project",$data,"mID='$mID'");
	
		return $this->db->query($s);
	 }
	
	
	  function getInfo($id){
		 $query=$this->db->query("select * from db_project where ID=$id");
		 if($query->num_rows()){
			$row=$query->row_array();
			//$row["StartTime"]=date("Y-m-d", strtotime($row["AddTime"]));
			return $row;
		 }else{
			return false;	
		 }
	 }
	 //获取最新10条数据
	 function getList($num=9999){
		$d=array();
		$i=0;
		$query=$this->db->query("select * from db_project order by ID desc");
		foreach ($query->result_array() as $row){
			if($i<$num){
				$d[]=	$row; 
			}
			$i++;	  
		}
		return  $d; 
	 }
	  function getNum($t="all"){
		 //AddTime
		 $sql="select * from db_project";
		 if($t=="today"){$sql="select * from db_project where AddTime>'".date("Y-m-d",time())." 00:00:00'";}
		 $query=$this->db->query($sql);
		 return $query->num_rows();
		 
	 }
	 

 }