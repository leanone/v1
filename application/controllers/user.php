<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends MY_Controller {
	
	public function __construct()
    {
        parent::__construct();
		
	
        $this->load->helper('url'); 
         
		 
        $this->load->library('oauth/qq'); 
		$this->load->library('oauth/sina'); 
		$this->load->library('oauth/weixin'); 
		
		
		
		
    }
	public function index(){
		if($this->getUid()>0){
			//未登陆
			echo "已登陆~";
		}else{
			//echo "未登陆~";
			$this->login();	
		}
		
	}
	//获取用户ID
	private function getUid(){
		if($this->input->cookie("uid")){
			return $this->input->cookie("uid");	
		}else{
			return 0;	
		}	
	}
	public function getCid(){
		$cid=$this->input->cookie("cid");
		if($cid==""){
			$cid=time().".".rand();
			$this->input->set_cookie("cid",$cid,365*24*60*60);  
			
			
		}
		
		$d=array();	
		$d["CookieID"]=$cid;
		$d["utm_source"]=$this->input->get("utm_source");
		$d["AddTime"]=now();
		$d["AddIP"]=ip();
		$this->userm->addCid($d);
		echo '{"cid":"'.$cid.'"}';
	}
	public function changeCid(){
		$cid=time().".".rand();
		$this->input->set_cookie("cid",$cid,365*24*60*60);  
		$this->getCid();
	}
	
	
	
	public function addCid(){
		$d=array();
		$d["CookieID"]=$this->input->get("cid");
		$d["utm_source"] =$this->input->get("utm_source");
		$d["AddTime"]=now();
		$d["AddIP"]=ip();
		
		
		$this->userm->addCid($d);
		
	}
	public function checkUname(){
		
		$callback=$this->input->get("callback");
		$username=$this->input->get("uanme");
		if($this->userm->hasUname($username)){
			echo $callback.'({"flag":1,"msg":"该用户名已被注册~"})';
		}else{
			
			echo $callback.'({"flag":0,"msg":"可以注册"})';
		};
		
		
		
	}
	public function reg(){
	
	
		$this->smarty->assign('act',"reg");
		$this->smarty->view('user.reglogin.html');
	}
	public function regSave(){
		$callback=$this->input->get("callback");
		$data=array();

		$data["userName"]=$this->input->get("uname");
	    $data["userPass"]=md5(md5($this->input->get("upass")));
		$data["utm_source"] =$this->input->get("utm_source");
		$data["utm_content"] =$this->input->get("utm_content");
		$data["CookieID"]=$this->input->cookie("cid");
		$data["regIP"]=ip();
		if($this->userm->hasUname($data["userName"])){
			echo $callback.'({"flag":0,"msg":"该用户名已被注册~"})';
		}else{
		
			if($this->userm->regSave($data)){
				echo $callback.'({"flag":1,"msg":"注册成功~"})';
			}else{
				echo $callback.'({"flag":0,"msg":"注册失败，请联系网站管理员~"})';
			};
			
		};
		
	}
	public function login(){
		$this->smarty->assign('act',"login");
		$this->smarty->view('user.reglogin.html');
	}
	public function getLogin(){
		$callback=$this->input->get("callback");
		$userName=$this->input->get("uname");
	    $userPass=$this->input->get("upass");
		$userAuto=$this->input->get("auto");
		if($this->userm->hasUname($userName)){
			$user=$this->userm->checkLogin($userName,$userPass,$userAuto);
			if($user){
				echo $callback.'({"flag":1,"msg":"登陆成功~","Email":"'.$user["Email"].'","Mobile":"'.$user["Mobile"].'","hasHuabu":'.$user["hasHuabu"].'})';
			}else{
				echo $callback.'({"flag":0,"msg":"用户名或者密码有误~"})';
			}
		}else{
			echo $callback.'({"flag":0,"msg":"该账号不存在~"})';
		}
	}
	/*
	登陆后跳转
	*/
	public function logined(){
		
	
		if(!$this->isLogin){
			header("Location: ".$this->base_url."user/login"); 
		}else{
			$user=$this->user;
			
			if($user["Email"]==""||$user["Mobile"]==""){
				header("Location: ".$this->base_url."user/infoUpdate"); 
			}else{
				header("Location: ".$this->base_url.""); 
			}
			
		}
	}
	public function logout(){
		$this->userm->logout();
	
		header("Location: ".$this->base_url); 
	}
	public function getLogout(){
		$this->userm->logout();
		echo '{"flag":1,"msg":"注销登陆成功~"}';
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
	
	

	//QQ用户登陆反馈
	public function qqLogin(){
		 
		$appid= '101191923';
        $appkey= 'c8b402d2b0481724f9f707b38f8deba1';
        $callback= 'http://leanone.cn/user/qqLogin/';
		
		$qq_state=isset($_SESSION['qq_state'])?$_SESSION['qq_state']:''; 
		
		 //验证是登陆还是回调
		 $code=$this->input->get('code');
		 if($code &&  $code!=""){
              
            
             //-------请求参数列表
            $keysArr = array(
                 "grant_type" => "authorization_code",
                 "client_id" => $appid,
                 "redirect_uri" =>  $callback,
                 "client_secret" =>  $appkey,
                 "code" => $_GET['code']
             );
			 
             //------构造请求access_token的url
             $token_url = $this->qq->combineURL(GET_ACCESS_TOKEN_URL, $keysArr);
	
             $response =$this->qq->get_contents($token_url);
			 
             
            $params = array();
            parse_str($response, $params);

        
             
            $access_token = $params["access_token"];
            $openid= $this->qq->get_openid(  $access_token);
            
			
             //进入主页
            //获取用户信息
            $_data = $this->qq->get_user_info($access_token,$openid,$appid);
			$_data = json_decode($_data);
			
			// var_dump($_data); 

			//exit;
			$data=array();
			$data["openid"]= $openid;
			$data["nickname"]= $_data->nickname;
			$data["figureurl"]= $_data->figureurl_1;
			
             $rs=$this->userm->addQQ($data);
			 if($rs==1){
				//已注册，已完善基本账号
				 
			 }else{
				//第一次注册	 
			 }
			// echo  $result["id"];
			//	var_dump($result);  
			$this->smarty->view('user.otherLoginEnd.html');
			
          }else {
            
         
             //-------生成唯一随机串防CSRF攻击
            $state = md5(uniqid(rand(), TRUE));
             $_SESSION['qq_state'] = $state;
			/*
             //-------构造请求参数列表
            $keysArr = array(
                 "response_type" => "code",
                 "client_id" => $appid,
                 "redirect_uri" => $callback,
                 "state" => $state,
                 "scope" => $scope
             );
            // $login_url =  $this->combineURL(GET_AUTH_CODE_URL, $keysArr);
			 */
			  $login_url="https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=".$appid;
			  $login_url.="&redirect_uri=".$callback."?state=".$state."&scope=get_user_info";
			
			  header("Location:$login_url");
         }
			  
			  
        
		
	}
	/*微信企业号开发*/
	public function weixincorp(){
		
		if(isset($_GET['code']) && $_GET['code']!=''){ 
			$code=$_GET['code'];
			
			$d=$this->weixin->http("https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=wxbd987cad15be45ff&corpsecret=qLDPfRxqCribxhbElFEZ0JxX9kO_qXQBrM-PFTTLKuHpj-INSZ9EhPk3C4xXEEDQ"); 
			$ACCESS_TOKEN=$d["access_token"];
			$d=$this->weixin->http("https://qyapi.weixin.qq.com/cgi-bin/user/getuserinfo?access_token=$ACCESS_TOKEN&code=$code&agentid=2"); 
			print_r($d);
			/*
			{
   "UserId":"USERID",
   "DeviceId":"DEVICEID"
}
			*/
	
			

		}else{
			 header("Location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxbd987cad15be45ff&redirect_uri=http://leanone.cn/user/weixincorp&response_type=code&scope=SCOPE&state=alextu#wechat_redirect");
		}
	
	}
	public function weiboLogin(){
	
		$callback_url='http://leanone.cn/user/weiboLogin'; //授权回调网址 
		
		$sina_t=isset($_SESSION['sina_t'])?$_SESSION['sina_t']:''; 


  
		//检查是否已登录 
		if($sina_t!=''){ 
		
			 $this->sina->iniToken($sina_t);
			 $sina_uid=$this->sina->get_uid(); 
			 $uid=$sina_uid['uid']; 
		
			 //获取登录用户信息 
		
			 $result=$sina->show_user_by_id($uid); 
			 var_dump($result); 
		
		 }else{ 
		
		
				$login_url=$this->sina->login_url($callback_url); 
		
				if(isset($_GET['code']) && $_GET['code']!=''){ 
		
				
					 $result=$this->sina->access_token($callback_url, $_GET['code']); 
				} 
		
				 if(isset($result['access_token']) && $result['access_token']!=''){ 
					 $_SESSION['sina_t']=$result['access_token'];
					//echo '授权完成，请记录<br/>access token：<input size="50" value="',$result['access_token'],'">';
					
					 $this->sina->iniToken($_SESSION['sina_t']);
					 //获取登录用户id 
					 $sina_uid=$this->sina->get_uid(); 
					 $uid=$sina_uid['uid']; 
				
					 //获取登录用户信息 
					 $result=$this->sina->show_user_by_id($uid); 
					 $rs=$this->userm->addWeibo($result);
					 if($rs==1){
						//已注册，已完善基本账号
						 
					 }else{
						//第一次注册	 
					 }
					// echo  $result["id"];
					//	var_dump($result);  
					$this->smarty->view('user.otherLoginEnd.html');
		
				}else{
					  header("Location: $login_url"); 
					
				} 
		 }

	}
	
	private function weixinIni(){
		 $this->input->set_cookie("access_token","",0);
		 $this->input->set_cookie("openid","",0);
		 $this->input->set_cookie("refresh_token","",0);
		 $this->input->set_cookie("state","",0);
		
	}
	private function weixinLogined($access_token,$openid,$msg){
		$d=$this->weixin->getUserInfo($access_token,$openid); 
		if(!isset($d["openid"])){
			echo "授权失败，请稍后重试,$msg";
			echo "<br/>";
			
			print_r($d);
			
			$this->weixinIni();
			exit;
		}else{
			$userData=$this->userm->addWeixin($d);
			if(!$userData){ 
				echo "登陆失败，请稍后重试,$msg";
				exit;
			}	
		}
	}
	public function weixinLogin(){
	
		/* 如果是第一次请求，设置$state */
		$state = md5("alextu");
		$login_url=$this->weixin->get_login_url($state);   //登陆地址


		$access_token =$this->input->cookie("access_token");
		$openid       =$this->input->cookie("openid");
		$refresh_token=$this->input->cookie("refresh_token");
		if($access_token!="" && $openid!=""){ 
			//已经登录
			$this->weixinLogined($access_token,$openid,1); 
			
		}else{
			//access_token 失效， 但是已请求过
			if($refresh_token!=""){

				$result= $this->weixin->get_refresh_data($refresh_token); 
				
				if(isset($result["access_token"])){ 
					$this->weixin->iniTokenData($result);
					$this->weixinLogined($result['access_token'],$result['openid'],2); 
				}else{
					$this->weixinIni();
					header("Location: $login_url");exit;
				}

			}else{

				$stateG=$this->input->get('state');
				$code=$this->input->get('code');
				
				if($code){ 
					if($stateG!=$state){
						echo "参数错误2~"; exit;
					}else{
						$result= $this->weixin->get_access_token($code);
						if(isset($result["access_token"])){ 
							
							$this->weixin->saveUserData($result);
							$this->weixinLogined($result['access_token'],$result['openid'],3); 
							//获取用户信息
						}else{
							//分析错误原因
							echo "授权失败，请稍后重试4";exit;
						}
					}
						  
				} else{
					 header("Location: $login_url"); 
					 exit;
				}
			}
		}
		
		
		$this->smarty->view('user.otherLoginEnd.html');
		
	}
	
	
}

