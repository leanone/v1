<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->baseUrl=$this->config->item("base_url");
	    $this->smarty->assign( 'base_url',$this->baseUrl);
		$this->load->model("projectm");
		$this->load->model("huabum");
		$this->load->model("userm");
	
	 }	
	 public function checkLogin(){
		if(!$this->input->cookie("AdminLogined")){ 
			$this->smarty->view('admin/login.html');
			exit;
		}
		
	}
	public function index()
	{
		//$this->load->view('welcome_message');
		//查询有没有登录
		if($this->input->cookie("AdminLogined")){
			$this->project();
		}else{
			$this->smarty->view('admin/login.html');
		}
	}
	public function huabu(){
		
		$this->checkLogin();
		$this->smarty->assign('huabuList',$this->huabum->getList(0,0,999,0));
		
		
		$this->smarty->assign('num1',$this->huabum->getNum("all"));
		$this->smarty->assign('num2',$this->huabum->getNum("today"));
		$this->smarty->assign('nav',0);
		$this->smarty->view('admin/huabu.html');
		
	}
	
	public function login(){
		$callback=$this->input->get("callback");
		//print_r($_POST);
		//Array ( [log] => test [pwd] => test [rememberme] => forever [wp-submit] => 登录 [redirect_to] => http://localhost/wwwroot/v1/admin/ [testcookie] => 1 )
		$userName=$this->input->get("log"); 
		$uPass=$this->input->get("pwd"); 
		$rememberme=$this->input->post("rememberme"); 
		$redirect_to=$this->input->post("redirect_to"); 
		//查询数据库
		if($userName=="admin" && $uPass=="test" ){
			if($rememberme=="forever"){
				$this->input->set_cookie("AdminLogined",true,7*24*60*60);  	
			}else{
				$this->input->set_cookie("AdminLogined",true,3*60*60);  
			}
			echo $callback.'({"flag":1})';
			//header("Location:$redirect_to");
		}else{
			echo $callback.'({"flag":0,"msg":"用户名或者密码错误"})';	
		}
			
	}
	public function logout(){
		$this->input->set_cookie("AdminLogined",false,0);
		header("Location: ".$this->baseUrl."admin/"); 
	}
  	public function edit(){
		$this->smarty->view('admin/edit.html');
	}
	public function post(){
		$this->smarty->view('admin/post.html');
	}
	
	
	//获取用户信息
	function getUserInfo(){
		$openid=$this->input->get("u");
		$token=$this->input->get("t");
		$g=$this->weixinM->get_userInfo($token,$openid);
		echo $g;
		
	}
	
	public function project(){
	
		$this->checkLogin();
		$this->smarty->assign('projectList',$this->projectm->getList());
		
		$this->smarty->assign('num1',$this->projectm->getNum("all"));
		$this->smarty->assign('num2',$this->projectm->getNum("today"));
		$this->smarty->assign('nav',1);
		$this->smarty->view('admin/index.html');
		
	}
	//会员相关
	public function member(){
		$this->checkLogin();
		$this->smarty->assign('userList',$this->userm->getList());
		
		$this->smarty->assign('num1',$this->userm->getNum("all"));
		$this->smarty->assign('num2',$this->userm->getNum("today"));
		$this->smarty->assign('nav',2);
		$this->smarty->view('admin/member.html');
		
	}

	public function visit(){
		
		$this->checkLogin();
		$this->load->database();
		$query=$this->db->query("select count(*) as a from db_cookie_user ");
		$allV=$query->row_array();
		$allV=$allV["a"];
		
	
		$query=$this->db->query("select count(*) as a from db_cookie_user where utm_source='baidu' ");
	
		$baiduV=$query->row_array();
		$baiduV=$baiduV["a"];
		
		$query=$this->db->query("select count(*) as a from db_project ");
		
		$allR=$query->row_array();
		$allR=$allR["a"];
		$query=$this->db->query("select count(*) as a from db_project where utm_source='baidu'  ");

		$baiduR=$query->row_array();
		$baiduR=$baiduR["a"];
		$d= "唯一访问量：$allV";
		$d.= "<br>";
		$d.= "唯一百度访问量：$baiduV";
		$d.= "<br>";
		$d.= "总注册量：$allR";
		$d.= "<br>";
		$d.= "百度注册量：$baiduR";
		$d.= "<br>";
		if($baiduV==0){
			$d.= "百度转化率:--%";
		}else{
			$d.= "百度转化率：".$baiduR*100/$baiduV."%";
		}
		if($allV==0){
			$d.= "总转化率：--%";
		}else{
			$d.= "总转化率：".$allR*100/$allV."%";
		}
		
		
		$this->smarty->assign('nav',3);
		$this->smarty->assign('data',$d);
		$this->smarty->view('admin/visit.html');
	}
	
}
