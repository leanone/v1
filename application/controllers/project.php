<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class project extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
		$this->load->language(array('site')); 
		$this->smarty->assign( 'language',$this->lang->language);
		
		
		$this->load->database();
		$this->load->model("projectm");
		$this->load->model("userm");
		$this->load->model("huabum");
	   

		$this->base_url=$this->config->item("base_url");
		$this->Cid=$this->input->cookie("cid");
		$this->Uid=$this->input->cookie("uid");
		
		$this->smarty->assign( 'base_url',$this->base_url);
		$this->smarty->assign( 'uid',$this->Uid);
		$this->smarty->assign( 'cid',$this->Cid);
		$this->smarty->assign( 'uname',$this->input->cookie("uname"));
		
		$this->Logined=$this->input->cookie("logined")==true?true:false;
		$this->smarty->assign( 'userLogined',$this->Logined);
		if($this->Logined){
			$this->smarty->assign( 'user',$this->userm->getInfo($this->Uid));
		}
	
		
	}
	public function index(){
		echo $this->Cid;
	
			$cInof=$this->projectm->getCookieInfo($this->Cid);
			$this->smarty->assign( 'cInof',$cInof);
		
		$this->smarty->view('project.add.html');
	}
	public function add(){
		$this->smarty->assign('cInof',false);
		$this->smarty->view('project.add.html');
		
	}
	public function addSave(){
		$callback=$this->input->get("callback");
		$data=array();
	
		$data["Uid"]=$this->Uid;
		$data["Hid"]=$this->input->get("Hid");
		$data["CookieID"]=$this->Cid;
	    $data["realName"]=$this->input->get("realname");
	    $data["weiChat"] =$this->input->get("weichat");
		$data["isQuan"]  =$this->input->get("isquan");
		$data["rNum"]    =$this->input->get("rnum");
		$data["Subject"] =$this->input->get("subject");
		$data["utm_source"] =$this->input->get("utm_source");
		$data["utm_content"] =$this->input->get("utm_content");
		$data["Tel"]     =$this->input->get("tel");
		$data["Email"]   =$this->input->get("email");
		$data["AddTime"] =now();
		$data["AddIp"]   =ip();
		if($this->input->get("mID")!=""){
			$end=$this->projectm->modSave($data,$this->input->get("mID"));
		}else{
			$end=$this->projectm->addSave($data);
		}
		if($end){
			echo $callback.'({"flag":1,"msg":"suc"})';
		}else{
			echo $callback.'({"flag":0,"msg":"fail"})';
		};
		exit();
	
	}
	
	public function my($pmid){
		
		$hid=$this->huabum->getHidByMid($pmid);  //根据mid获取Hid
		$data=array();
		if($hid){
			$data=$this->projectm->getInfoByHid($hid);
		}else{
			
			$data=$this->projectm->getCookieInfo($this->Cid);
		}
		if(!$data){
				
		}
		//$data["Hid"]=$hid;
		
		$this->smarty->assign( 'Hid',$hid);
		$this->smarty->assign( 'data',$data);
		
		$this->smarty->view('project.my.html');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */