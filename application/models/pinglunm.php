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
	 //所有评论
	 function getAllList(){
		$d=array();
		$i=0;
		$sql="select A.*,B.userName,B.NickName,B.FaceUrl,C.Subject as HuabuSubject from db_comment A inner join db_user B on A.Uid=B.Uid inner join db_huabu C on C.Hid=A.Hid  order by A.ID desc";
		$query=$this->db->query($sql);
			
		foreach ($query->result_array() as $row){
			
			$i++;	  
		}
		return  $d; 
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
	 //时间格式化
	 function tranTime($stime) { 

	  
		$rtime = date("m-d H:i",$stime); 
		$htime = date("H:i",$stime); 
		$time = time() - $stime; 
		if ($time < 60) { 
			$str = '刚刚'; 
		}elseif ($time < 60 * 60) { 
			$min = floor($time/60); 
			$str = $min.'分钟前'; 
		} elseif ($time < 60 * 60 * 24) { 
			$h = floor($time/(60*60)); 
			$str = $h.'小时前 '.$htime; 
		} elseif ($time < 60 * 60 * 24 * 3) { 
			$d = floor($time/(60*60*24)); 
			if($d==1) {
				$str = '昨天 '.$rtime; 
			}else{ 
				$str = '前天 '.$rtime; 
			}
		} else { 
			$str = date("Y-m-d H:i:s",$stime); 
		} 
		return $str; 
	} 
	 /*
	 初始化评论数据
	 */
	 function iniPinlun($row){
		  $stime=strtotime($row["AddTime"]);
		
		
		  
		  $row["sAddTime"]=$this->tranTime($stime);
		
		  
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
		  
		  $row["Content"]= RemoveXSS($row["Content"]);
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