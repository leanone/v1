<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class huabum extends CI_Model {

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
        $query=$this->db->query("select * from db_huabu where Hid=$ID");
		if($query->num_rows()){
			$row = $query->row_array();
			
			
			
			return $row;
		}else{
			return false;	
		}
     }
	 function getMy($uid){
		$data=array();
		$data["Uid"]=$uid;
		$this->db->where($data);
		$this->db->order_by("Hid", "desc");
		$this->db->limit(1);
		$query = $this->db->get("db_huabu");
		if($query->num_rows()){
			$row = $query->row();
		
			return $row->Hid;
		}else{
			return false;
		}
	 }
	 
	 function getSaveNum($uid){
		$query=$this->db->query("select * from db_huabu where Uid=$uid");
		return $query->num_rows();
	 }
	 
	 //获取所有画布列表
	 function getList($uid=0,$startNum=0,$endNum=9999,$isPublic=1,$orderVisit="",$orderFavor="",$orderComment="",$firstType="visitNum"){
		 //$uid,0,24,$v1,$v2,$v3       
		$d=array();
		$i=0;
		$sql ="select * from db_huabu";
		if($uid>0){
			$sql.=" where Uid= $uid";	
		}else{
			if($isPublic){
				$sql.=" where isPublic=$isPublic";	
			}
		};
		//echo $orderVisit.":".$orderFavor.":".$orderComment;
		if($orderVisit==""||$orderFavor==""||$orderComment==""){
			$sql.=" order by  Hid desc";
		}else{
			switch($firstType){
				case "favorNum":$sql.=" order by  favorNum $orderFavor,visitNum $orderVisit,commentNum $orderComment";break;
				case "visitNum":$sql.=" order by  visitNum $orderVisit,favorNum $orderFavor,commentNum $orderComment";break;
				case "commentNum":$sql.=" order by  commentNum $orderComment,favorNum $orderFavor,visitNum $orderVisit";break;
				default:$sql.=" order by  favorNum $orderFavor,visitNum $orderVisit,commentNum $orderComment";break;
			}
			
		}
		//echo $sql;
		$query=$this->db->query($sql);

		foreach ($query->result_array() as $row){
					$row=$this->iniHuabuData($row);
			if($i>=$startNum && $i<=$endNum){
				if($row["Uid"]==0){
					$row["Uname"]="匿名用户";	
				}else{
					$query=$this->db->query("select * from db_user where Uid=".$row["Uid"]);
					$row2=$query->result_array();
					if($row2[0]["userName"]==""){
						$row["Uname"]=$row2[0]["NickName"];	
					}else{
						$row["Uname"]=$row2[0]["userName"];	
					}
					
				}
				$d[]=	$row; 
			}
			$i++;	  
		}
	
		return  $d; 
	 }
	
	 
	 function addSave($data){
		 
		 //判断用户有没有添加过
		$this->db->set($data);
		$this->db->insert("db_huabu");
		$ID=$this->db->insert_id();
		$mID=substr(md5($ID),8,16);
		
		$cid=$this->input->cookie("cid");
		$uid=intval($this->input->cookie("uid"));
		
		$d=array("mID"=>$mID,"Uid"=>$uid,"CookieID"=>$cid); 
		$s=$this->db->update_string("db_huabu",$d,"Hid=$ID");
		$this->db->query($s);

		$this->db->query("update db_user  set hasHuabu=hasHuabu+1  where Uid=$uid");
		
	
		return $mID;
		
	
	 }
	 function modSave($data,$mID){
		 
		$s=$this->db->update_string("db_huabu",$data,"mID='$mID'");
		
		
		return $this->db->query($s);;
	 }
	 
	 function isExitMid($mid){
		$query=$this->db->query("select * from db_huabu where Mid='$mid'");
		if($query->num_rows()){
			$row = $query->row_array();
			//echo $row["h_four"];
			
			return $this->iniHuabuData($row);
		}else{
			return false;	
		}
	 }
	
	 function getHidByMid($mid){
		$query=$this->db->query("select * from db_huabu where Mid='$mid'");
		if($query->num_rows()){
			
			$row = $query->row_array();
		
			return $row["Hid"];
		}else{
			return false;	
		}
		 
	 }
	 
	 function getNum($t="all"){
		 //AddTime
		 $sql="select * from db_huabu";
		 if($t=="today"){$sql="select * from db_huabu where AddTime>'".date("Y-m-d",time())." 00:00:00'";}
		 $query=$this->db->query($sql);
		 return $query->num_rows();
		 
	 }
	 function iniHuabuData($arr){
		 if($arr["shareWord"]==""){
			 if($arr["h_four"]==""){
				 $arr["shareWord"]="【好点子画布：".$arr["Subject"]."】，精一学社 | 精益创业的实践平台，早期创业者的“摇篮”,国内首家以精益创业方法为主线的线上线下结合的孵化器，针对-0.5到0.5岁的早期创业者，快速对接精益投资基金，帮助创业者的idea落地生根，降低失败成本。";
			 }else{
				 $arr["shareWord"]="【好点子画布：".$arr["Subject"]."】，".$arr["h_four"].""; 
			 }
		 }
		 if($arr["sharePic"]==""){
			 $arr["sharePic"]= $this->base_url."public/images/huabuLogo.png";
		 }
		 return $arr;
	 }
	 
	 /* 增加访问量 */
	 function addVisit($mid){
		 $query=$this->db->query("update db_huabu set visitNum=visitNum+1 where Mid='$mid'");
	 }
	
	 function addInt($type,$mid,$isCheck=true){
		 	$isAdd=$type."_".$mid;
			if($isCheck){
				if(!$this->input->cookie($isAdd)){
				
					$rs=$this->db->query("update db_huabu set $type=$type+1 where Mid='$mid'");
					$this->input->set_cookie($isAdd,true,24*60*60);  
					return $rs;
				}
			}else{
				$this->db->query("update db_huabu set $type=$type+1 where Mid='$mid'");
				
			}
			return false;
			
	 }
	 
	
	
	
			
    

 }