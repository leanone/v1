<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class pinglunm extends CI_Model {

     var $title   = '';
     var $content = '';
     var $date    = '';

     function __construct()
     {
         parent::__construct();
		 $this->load->database();
		 $this->base_url=$this->config->item("base_url");
     }
	 

	 
 
     function getInfo($ID)
     {
        $query=$this->db->query("select * from db_comment where ID=$ID");
		if($query->num_rows()){
			$row = $query->row_array();
		
			return $row;
		}else{
			return false;	
		}
     }
	 
	
	  //获取最新10条数据
	 function getList($Hid,$endNum=9999, $startNum=0){
		
		$d=array();
		$i=0;
		$query=$this->db->query("select A.*,B.userName,B.NickName,B.FaceUrl from db_comment A inner join db_user B on A.Uid=B.Uid where A.Hid=$Hid  and A.Rid=0 order by A.ID desc");
			
		foreach ($query->result_array() as $row){
			if($i<=$endNum && $i>=$startNum){
				$row["ChildList"]=$this->getChildList($row["ID"]);
				$d[]=$this->iniPinlun($row); 
			}
			$i++;	  
		}
		return  $d; 
	 }
	 /*
	 获取评论的回复
	 */
	 function getChildList($Pid){
		$d=array();
		
		$query=$this->db->query("select A.*,B.userName,B.NickName,B.FaceUrl from db_comment A inner join db_user B on A.Uid=B.Uid where  A.Rid=$Pid order by A.ID desc");
			
		foreach ($query->result_array() as $row){
			$d[]=$this->iniPinlun($row); 
		}
		return  $d; 
	 }
	 /*
	 初始化评论数据
	 */
	 function iniPinlun($row){
		 $stime=strtotime($row["AddTime"]);
		  $time=strtotime(now());
		  
		  if($time-$stime>24*60*60){
			  $row["sAddTime"]=$row["AddTime"];
		  }elseif($time-$stime>60*60){
			  $row["sAddTime"]="今天".date("H:i", $stime);
		  }elseif($time-$stime>60){
			  $row["sAddTime"]=floor(($time-$stime)/60)."分钟前";
		  }else{
			  $row["sAddTime"]=floor(($time-$stime))."秒前";
		  }
		  if($row["NickName"]!=""){
			  $row["pubName"]=$row["NickName"];
		  }else{
			  $row["pubName"]=$row["userName"];
		  }
		  if($row["FaceUrl"]!=""){
			  $row["FaceUrl"]=$row["FaceUrl"];
		  }else{
			  $row["FaceUrl"]=$this->base_url."public/face/unkown.gif";
		  }
		  if($row["Pid"]>0){
			  	$row["Puname"]="";
				$row["Ptxt"]="";
				$query=$this->db->query("select A.*,B.userName,B.NickName from db_comment A inner join db_user B on A.Uid=B.Uid  where A.ID=".$row["Pid"]);
				if($query->num_rows()){
					
					$row2 = $query->row_array();
					if($row2["NickName"]!=""){
					   $row["Puname"]=$row2["NickName"];
					}else{
					   $row["Puname"]=$row2["userName"];
					}
					
					$row["Ptxt"]=$row2["Content"];
					$row["Prid"]=$row2["Rid"];
					
				}
			  
		  }
		  return  $row;
	 }
	 
	 function getComment($Hid){
		 
	 }
	 
	 
	 function addSave($data){

		$this->db->set($data);
		$this->db->insert("db_comment");
		$ID=$this->db->insert_id();
	
		$query=$this->db->query("update  db_huabu set commentNum =commentNum +1 where Hid=".$data["Hid"]);

		//$this->db->query("update db_user  set hasHuabu=hasHuabu+1  where Uid=$uid");
		
	
		return $ID;
		
	
	 }
	 /*
	 点赞
	 */
	 public function vote($ID){
		  $query=$this->db->query("update  db_comment set favorNum=favorNum+1 where ID=$ID");
		  return  $query;
	}
	
	 
			
    

 }