<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends MY_Controller {
	
	public function __construct()
    {
        parent::__construct();
		
          
		$this->load->library('oauth/weixin'); 
		
		
		
		
    }

	public function index(){
		if($this->isLogin){
			//未登陆
			echo "已登陆~";
		}else{
			//echo "未登陆~";
			$this->login();	
		}
		
	}
	
	public function login(){
		/* 如果是第一次请求，设置$state */
		$state=$this->input->cookie("state");
		
		if(!$state){
			$state = md5("alextu".Alexdate());
			$this->input->set_cookie("state",$state,60*60);
		}
		$login_url=$this->weixin->get_login_url($state);   //登陆地址


		$access_token =$this->input->cookie("access_token");
		$openid       =$this->input->cookie("access_token");
		$refresh_token=$this->input->cookie("access_token");
		$userData=false;
		if($access_token!="" && $openid!=""){ 
			//已经登录
			$d=$this->weixin->getUserInfo($access_token,$openid); 
			$userData=$this->userm->addWeixin($d);
		}else{
			//access_token 失效， 但是已请求过
			if($refresh_token!=""){

				$result= $this->weixin->get_refresh_data($refresh_token); 
				
				if(isset($result["access_token"])){ 
					$this->weixin->iniTokenData($result);
					$d=$this->weixin->getUserInfo($result['access_token'],$result['openid']); 
					$userData=$this->userm->addWeixin($d);
				}else{
					echo "参数错误1~";exit;
				}

			}else{

				$state=$this->input->get('state');
				$code=$this->input->get('code');
				
				if($code){ 
					//高级的话要判断是否与系统 state 相等
					
					if($state!=$this->input->cookie("state")){
						echo $state."::".$this->input->cookie("state");
						echo "参数错误2~";exit;
					}else{
						$result= $this->weixin->get_access_token($code);
						if(isset($result["access_token"])){ 
							
							$this->weixin->iniTokenData($result);
							$d=$this->weixin->getUserInfo($result['access_token'],$result['openid']); 
							$userData=$this->userm->addWeixin($d);
							//获取用户信息
						}else{
							//分析错误原因
							echo "参数错误3~";exit;
						}
					}
						  
				} else{
					 header("Location: $login_url");  exit;
				}
			}
		}
		print_r($userData);
	}
	
	
	
	
	
	public function infoUpdate(){
		if(!$this->isLogin){
			
			header("Location: ".$this->base_url."user/login"); 
		}else{
			
			$this->smarty->view('info.update.html');
		}
	}
	public function infoUpdateSave(){
		$callback=$this->input->get("callback");
		if($this->isLogin){
			$data=array();
			$data["Mobile"]=$this->input->get("mobile");
			$data["Email"]=$this->input->get("email");
			$data["RealName"]=$this->input->get("realname");
			$data["QQ"]=$this->input->get("qq");
			$data["Weixin"]=$this->input->get("weichat");
	
			if($this->userm->editSave($data)){
				echo $callback.'({"flag":1,"msg":"更新成功~"})';
			}else{
				echo $callback.'({"flag":0,"msg":"更新失败"})';
			}
		}else{
			echo $callback.'({"flag":0,"msg":"还没有登录哦"})';
		}

	}
	
	

	
	
	
}

