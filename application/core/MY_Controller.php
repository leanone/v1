<?php
class MY_Controller extends CI_Controller{


	public function __construct(){
		parent::__construct();
		
		$this->load->database();
		
		$this->base_url= $this->config->item("base_url");
		$this->Uid     = intval($this->input->cookie("uid"));
		$this->Uname   = $this->input->cookie("uname");
		$this->Cid     = $this->input->cookie("cid");
		$this->Logined = $this->input->cookie("logined")==true?true:false;
		
		$this->smarty->assign( 'language',$this->lang->language);
	    $this->smarty->assign( 'base_url',$this->base_url);
		
		$this->smarty->assign( 'uid',$this->Uid);
		$this->smarty->assign( 'cid',$this->Cid);
		$this->smarty->assign( 'uname',$this->Uname);
		$this->smarty->assign( 'userLogined',$this->Logined);
		
		$user=$this->userm->getInfo($this->Uid);
		if($this->Logined){
			
			$arr=array();
			$arr["Uid"]=$user["Uid"];
			$arr["mID"]=$user["mID"];
			$arr["CookieID"]=$user["CookieID"];
			$arr["NickName"]=$user["NickName"];
			$arr["FaceUrl"] =$user["FaceUrl"];
			$arr["hasHuabu"]=$user["hasHuabu"];
		
			$this->smarty->assign('userData',json_encode($arr));
		}else{
			$this->smarty->assign('userData','{}');
		}
		$this->smarty->assign('user',$user);
		
		
		
	}

}
?>