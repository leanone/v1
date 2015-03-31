<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class userm extends CI_Model {

     var $title   = '';
     var $content = '';
     var $date    = '';
/*
ID,mID,userName,userPass,Flag,regTime,regIP,LastLoginTime,LastLoginIP,NickName


CookieID 
  
NickName
FaceUrl
QQ 
Weibo 
Weixin

utm_source 
utm_content

LastLoginTime
LastLoginIP

*/
     function __construct()
     {
         parent::__construct();
		 $this->load->database();
     }
	 
	 function addCid($d){
		 
		$query=$this->db->query("select * from db_cookie_user where CookieID='". $d["CookieID"]."'");
	
		if($query->num_rows()){
			$this->db->query("update   db_cookie_user set visitNum=visitNum+1 where CookieID='". $d["CookieID"]."'");
		}else{
			
			$this->db->set($d);
			$this->db->insert("db_cookie_user");
		}
			
			
		
		
		//$ID=$this->db->insert_id();
	 }
	 function hasUname($uname){
		 $query=$this->db->query("select * from db_user where userName='$uname'");
		 if($query->num_rows()){
			 return true;
		 }else{
			 return false;
		 }
	 }
	 function getCookieInfo($CookieID){
		 if($CookieID!=""){
			$query=$this->db->query("select * from db_project where Cid=$CookieID");
			if($query->num_rows()){
				$row = $query->row_array();
				return $row;
			}
		 }
		 return false;	
		
	 }
	 
	 function getUidByMid($mID){
		$query=$this->db->query("select * from db_user where mID='$mID'");
		if($query->num_rows()){
			$row = $query->row_array();
			return $row["Uid"];
		}else{
			return false;	
		}
		 
	}
 
     function getInfo($ID)
     {
        $query=$this->db->query("select * from db_user where Uid=$ID");
		if($query->num_rows()){
			$row = $query->row_array();
		
			
			
			return $this->iniUserData($row);
		}else{
			return false;	
		}
     }
	 function checkUserName($uname){
		$query = $this->db->query("SELECT * FROM db_user where UserName='$uname'");
		return $query->num_rows();
	 }
	 /*根据$data update session*/
	 function updateUserSession($row,$userAuto=false){

		if($userAuto){
			$t=7*24*60*60;
		}else{
			$t=3*60*60;  	
		}
	
		$this->input->set_cookie("logined",true,$t);
		$this->input->set_cookie("uid",$row["Uid"],$t); 
		$this->input->set_cookie("uname",$row["NickName"],$t); 
		
		$sql="update db_user set LastLoginTime='".now()."',LastLoginIP='".ip()."',LoginTimes=LoginTimes+1 ";
		if($row["Uid"]==""){
			$sql.=",mID='".substr(md5($row["Uid"]),8,16)."'";
		}
		$sql.="where Uid=".$row["Uid"];
		$this->db->query($sql);
		
		//登陆后更新CookieID、HuabuID
		$cid=$this->input->cookie("cid");
		$this->updateCookieUid($cid,$row["Uid"]);
		$this->updateHuabuUid($cid,$row["Uid"]);
	 }
	 function getLogin($uid){
		$data=array();
		$data["Uid"]=$uid;
		$this->db->where($data);
		$this->db->limit(1);
		$query = $this->db->get("db_user");
		
		if($query->num_rows()){
			
			
			$row = $query->row_array();
			$this->updateUserSession($row);
			return $row;
		}else{
			return false;
		}
	 }
	 function checkLogin($uname,$upass,$userAuto){
		$data=array();
		$data["UserName"]=$uname;
		$data["UserPass"]=md5(md5($upass));
		$this->db->where($data);
		$this->db->limit(1);
		$query = $this->db->get("db_user");
		if($query->num_rows()){
			
			$row = $this->iniUserData($query->row_array());
		
			$this->updateUserSession($row,$userAuto);
			return $row;
		}else{
			return false;
		}
		
	 }
	
	 function logout(){

		//$this->session->sess_destroy();
		$this->input->set_cookie("logined",false,0);
		$this->input->set_cookie("uid",0,0); 
		$this->input->set_cookie("uname","",0); 
	 }
	 function checkPass($oldPass){
		$Uid=$this->input->cookie("uid");
		if($Uid==0){return false;}
		$query = $this->db->query("SELECT * FROM db_user where Uid=$Uid and UserPass='".md5(md5($oldPass))."'");
		return $query->num_rows();
	 }
	 function updatePass($newPss){
		$Uid=$this->input->cookie("uid");
		$d=array("UserPass"=>md5(md5($newPss))); 
		$s=$this->db->update_string("db_user",$d,"Uid=$Uid");
		return $this->db->query($s);
	 }
	 
	 
	 
	 
	 function regSave($data){
		$this->db->set($data);
		$this->db->insert("db_user");
		$ID=$this->db->insert_id();

		$d=array("mID"=>substr(md5($ID),8,16)); 
		$s=$this->db->update_string("db_user",$d,"Uid=$ID");
		$this->db->query($s);
		
		$cid=$this->input->cookie("cid");
		$this->updateCookieUid($cid,$ID);
		$this->updateHuabuUid($cid,$ID);
	
		
		
		return $this->getLogin($ID);
	 }
	 function editSave($data){
		 $Uid=$this->input->cookie("uid");
		 $s=$this->db->update_string("db_user",$data,"Uid=$Uid");
		 $ss=$this->db->query($s);
		 return $ss;
	 }
	
	 function checkRegCode($regCode){
		if($this->session->userdata("randcode")==$regCode){
			return 1;
		}else{
			return 0;
		}
	}
	
	function updateCookieUid($cid,$uid){
		$s=$this->db->update_string("db_cookie_user",array("Uid"=>$uid),"CookieID='$cid' and Uid=''");
		$this->db->query($s);
		
		$s=$this->db->update_string("db_user",array("CookieID"=>$cid),"Uid='$uid'");
		$this->db->query($s);
	}
	
	function updateHuabuUid($cid,$uid){
		$s=$this->db->update_string("db_huabu",array("Uid"=>$uid),"CookieID='$cid' and Uid=''");
		$this->db->query($s);
		
	}


/*微博账号相关*/
	function addWeibo($data){
 
		$query=$this->db->query("select * from db_user where WeiboID='".$data["id"]."'");
		if($query->num_rows()){
			$row = $query->row_array();
			$this->updateUserSession($row);
			return $row;
		}else{
			$d["NickName"]=$data["screen_name"];
			$d["FaceUrl"] =$data["profile_image_url"];
			$d["WeiboID"] =$data["id"];
			$d["regIP"]=ip();
			return $this->regSave($d);
		
		}
		 
	}
/*QQ账号相关*/	
	function addQQ($data){
		$query=$this->db->query("select * from db_user where QQopenID='".$data["openid"]."'");
		if($query->num_rows()){
			$row = $query->row_array();
			$this->updateUserSession($row);
			return $row;
		}else{
			$d["NickName"]=$data["nickname"];
			$d["FaceUrl"]=$data["figureurl_1"];
			$d["qqOpenID"]=$data["openid"];
			$d["regIP"]=ip();
			return $this->regSave($d);	
		}
		
	}
/*微信账号相关*/	
	function addWeixin($data){
		$query=$this->db->query("select * from db_user where WeixinID='".$data["openid"]."'");
		if($query->num_rows()){
			$row = $query->row_array();
			$this->updateUserSession($row);
			return $row;
		}else{
			$d["NickName"]=$data["nickname"];
			$d["FaceUrl"] =$data["headimgurl"];
			$d["WeixinID"]=$data["openid"];
			$d["regIP"]=ip();
			return $this->regSave($d);
		}
		
	}
	
	
	//获取列表
	 function getList($num=9999){
		$d=array();
		$i=0;
		$query=$this->db->query("select * from db_user order by Uid desc");
		foreach ($query->result_array() as $row){
			if($i<$num){
				
				
				
				
				$d[]=	$this->iniUserData($row); 
			}
			$i++;	  
		}
		return  $d; 
	 }
	 
	  function getNum($t="all"){
		 //AddTime
		 $sql="select * from db_user";
		 if($t=="today"){$sql="select * from db_user where RegTime>'".date("Y-m-d",time())." 00:00:00'";}
		 $query=$this->db->query($sql);
		 return $query->num_rows();
		 
	 }
	 /*
	 用户数据初始化
	 */
	 function iniUserData($row){
		 
		if($row["Flag"]==2){
			$row["typeName"]	="教练";
		}elseif($row["Flag"]==1){
			$row["typeName"]	="VIP用户";
		}else{
			$row["typeName"]	="普通用户";
		}
		if($row["NickName"]==""){
			$row["NickName"]=$row["userName"];
		}
			
		$row["LoginTimes"]=$row["LoginTimes"]+1;
		$row["comeFrom"]="注册";
		if($row["QQopenID"]!=""){$row["comeFrom"]="QQ";}
		if($row["WeiboID"]!=""){$row["comeFrom"]="微博";}
		if($row["WeixinID"]!=""){$row["comeFrom"]="微信";}
		if($row["Email"]=="" && isEmail($row["userName"])){
			$row["Email"]=$row["userName"];
		}
		if($row["Mobile"]=="" && isMobile($row["userName"])){
			$row["Mobile"]=$row["userName"];
		}
				
		return $row;
	
 
	 }
			
    

 }