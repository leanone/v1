<?php
class MY_Controller extends CI_Controller{


	public function __construct(){
		parent::__construct();
		
		$this->load->database();
		
		$this->base_url= $this->config->item("base_url");
		$this->Uid     = intval($this->input->cookie("uid"));
		$this->Uname   = $this->input->cookie("uname");
		$this->Cid     = $this->input->cookie("cid");
		$this->isLogin = $this->input->cookie("logined")==true?true:false;
		
		$this->smarty->assign( 'language',$this->lang->language);
	    $this->smarty->assign( 'base_url',$this->base_url);
		$this->smarty->assign( 'userLogined',$this->isLogin);
		
		$this->user=$this->userm->getInfo($this->Uid);
		$arr=array();
		if($this->isLogin){
			
			
			$arr["Uid"]=$this->user["Uid"];
			$arr["mID"]=$this->user["mID"];
			$arr["CookieID"]=$this->user["CookieID"];
			$arr["NickName"]=$this->user["NickName"];
			$arr["FaceUrl"] =$this->user["FaceUrl"];
			$arr["hasHuabu"]=$this->user["hasHuabu"];
		
			
		}else{
			$arr["Uid"]=0;
			$arr["CookieID"]=$this->Cid;
			$arr["NickName"]="";
			
		}
		$this->smarty->assign('userData',json_encode($arr));
		$this->smarty->assign('user',$this->user);
		$this->smarty->assign('nav_id',0);
		
		
	}

}
?>