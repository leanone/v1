<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class historym extends CI_Model {

     var $title   = '';
     var $content = '';
     var $date    = '';
/*

ID  
Hid 
Uid 
Subject
StartTime
EndTime
ContentA
ContentB
ContentC 
Flag 
AddTime 
AddIP

*/
     function __construct()
     {
         parent::__construct();
		 $this->load->database();
		 $this->db="db_creat_history";
     }
	
     function getInfo($ID)
     {
        $query=$this->db->query("select * from ".$this->db." where Uid=$ID");
		if($query->num_rows()){
			$row = $query->row_array();
		
			return $this->iniData($row);
		}else{
			return false;	
		}
     }

	 
	 function publish($data){
		$this->db->set($data);
		$this->db->insert($this->db);
		$ID=$this->db->insert_id();

		$d=array("mID"=>substr(md5($ID),8,16)); 
		$s=$this->db->update_string($this->db,$d,"ID=$ID");
		$this->db->query($s);

		return $this->getInfo($ID);
	 }





	 /*
	 用户数据初始化
	 */
	 function iniData($row){
		 
		$flagArr=array("计划中","验证中","完成","放弃");
		$row["FlagName"]	=$flagArr[$row["Flag"]];
		$row["YMD"]=date("Y-m-d",strtotime($row["StartTime"]));
			
	
				
		return $row;
	
 
	 }
			
    

 }