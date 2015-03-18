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
			$this->db->query("update   db_cookie_user set VisitNum=VisitNum+1 where CookieID='". $d["CookieID"]."'");
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
			return $row;
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
		 /*
	    $d=array();
		$d["logined"]=true;
		$d["Uid"]=$row->Uid;
	    $d["uname"]=$row->userName;
		
	    $this->session->set_userdata($d);
		*/
		if($userAuto){
			$t=7*24*60*60;
		}else{
			$t=3*60*60;  	
		}
		$this->input->set_cookie("logined",true,$t);
		$this->input->set_cookie("uid",$row->Uid,$t); 
		$this->input->set_cookie("uname",$row->NickName,$t); 
		
		//登陆后更新CookieID、HuabuID
		$cid=$this->input->cookie("cid");
		$this->updateCookieUid($cid,$row->Uid);
		$this->updateHuabuUid($cid,$row->Uid);
	 }
	 function getLogin($uid){
		$data=array();
		$data["Uid"]=$uid;
		$this->db->where($data);
		$this->db->limit(1);
		$query = $this->db->get("db_user");
		
		if($query->num_rows()){
			
			
			$row = $query->row();
			$this->updateUserSession($row);
			return true;
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
			
			$row = $query->row();
			$sql="update db_user set LastLoginTime='".now()."',LastLoginIP='".ip()."',LoginTimes=LoginTimes+1 ";
			if($row->mID==""){
				
				$sql.=",mID='".substr(md5($row->Uid),8,16)."'";
			}
			$sql.="where Uid=".$row->Uid;
			$this->db->query($sql);
			
			
			if($row->NickName==""){
				$row->NickName=$row->userName;
			}
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
	
		
		$this->getLogin($ID);
		return true;
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
		/*
		  ["id"]=> int(1442733375)
		  ["screen_name"]=>  string(7) "AlexTUs"
		  ["name"]=> string(7) "AlexTUs"
		  ["province"]=> string(2) "11"
		  ["city"]=> string(1) "8"
		  ["location"]=> string(16) "北京 海淀区"
		  ["description"]=> string(24) "寻找、拥有、创造"
		  ["url"]=> string(27) "http://www.alextu.com/blog/"
		  ["profile_image_url"]=> string(49) "http://tp4.sinaimg.cn/1442733375/50/40006208139/1"
		  ["profile_url"]=> string(9) "523416278"
		  ["domain"]=>  string(7) "alextus"
		  ["weihao"]=>  string(9) "523416278"
		  ["gender"]=> string(1) "m"
		  ["followers_count"]=> int(68)
		  ["friends_count"]=> int(24)
		  ["avatar_large"]=>  string(50) "http://tp4.sinaimg.cn/1442733375/180/40006208139/1"
		  ["avatar_hd"]=>  string(50) "http://tp4.sinaimg.cn/1442733375/180/40006208139/1"
		 */	 
		$query=$this->db->query("select * from db_user where WeiboID='".$data["id"]."'");
		if($query->num_rows()){
			//已存在
			$row = $query->row();
			$this->getLogin($row->Uid);
			if($row->userName!=""&&$row->userPass!=""){
				return 1;	
			}else{
				return 0;	
			}
		}else{
			//添加个
			$d["NickName"]=$data["screen_name"];
			$d["FaceUrl"]=$data["profile_image_url"];
			$d["WeiboID"]=$data["id"];
			$this->regSave($d);
			return 0;	
		}
		 
	}
	
	function addQQ($data){
		$query=$this->db->query("select * from db_user where QQopenID='".$data["openid"]."'");
		if($query->num_rows()){
			//已存在
			$row = $query->row();
			$this->getLogin($row->Uid);
			if($row->userName!=""&&$row->userPass!=""){
				return 1;	
			}else{
				return 0;	
			}
		}else{
			//添加个
			$d["NickName"]=$data["nickname"];
			$d["FaceUrl"]=$data["figureurl_1"];
			$d["qqOpenID"]=$data["openid"];
			
			$this->regSave($d);
			return 0;	
		}
		
	}
	
	
	//获取列表
	 function getList($num=9999){
		$d=array();
		$i=0;
		$query=$this->db->query("select * from db_user order by Uid desc");
		foreach ($query->result_array() as $row){
			if($i<$num){
				$row["LoginTimes"]=$row["LoginTimes"]+1;
				$d[]=	$row; 
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
			
    

 }