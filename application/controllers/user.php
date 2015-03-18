<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->language(array('site')); 
		$this->smarty->assign( 'language',$this->lang->language);

        $this->load->model('userm');
        $this->load->helper('url'); 
         
		 
		 
        $this->load->library('tencent/oauth','oauth'); 
		$this->load->library('sina/oauth','sinaOauth'); 
		
		
		$this->baseUrl=$this->config->item("base_url");
		$this->Uid=$this->getUid();              //登陆用户ID
		$this->Cid=$this->input->cookie("cid");  //未登陆用户CID
		
		
		$this->smarty->assign( 'base_url',$this->baseUrl);
		
		$this->smarty->assign( 'uid',$this->getUid());
		$this->smarty->assign( 'cid',$this->Cid);
		$this->smarty->assign( 'uname',$this->input->cookie("uname"));
		
		
		
		
		$this->Logined=$this->input->cookie("logined")==true?true:false;
		$this->smarty->assign( 'userLogined',$this->Logined);
		if($this->Logined){
			$this->smarty->assign( 'user',$this->userm->getInfo($this->Uid));
		}
		
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
				echo $callback.'({"flag":1,"msg":"登陆成功~","hasHuabu":'.$user->hasHuabu.'})';
			}else{
				echo $callback.'({"flag":0,"msg":"用户名或者密码有误~"})';
			}
		}else{
			echo $callback.'({"flag":0,"msg":"该账号不存在~"})';
		}
	}
	public function logout(){
		$this->userm->logout();
		 header("Location: ".$this->baseUrl); 
	}
	public function getLogout(){
		$this->userm->logout();
		echo '{"flag":1,"msg":"注销登陆成功~"}';
	}
	
	
	
	public function infoUpdate(){
		if(!$this->Logined){
			
			header("Location: ".$this->baseUrl."user/login"); 
		}else{
			
			$this->smarty->view('info.update.html');
		}
	}
	public function infoUpdateSave(){
		$callback=$this->input->get("callback");
		if($this->Logined){
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
	
	
	public function qqLoginTest(){
		$this->smarty->view('test/qq.html');
	}
	//QQ用户登陆反馈
	public function qqLogin(){
		 
		$appid= '101191923';
        $appkey= 'c8b402d2b0481724f9f707b38f8deba1';
        $callback= 'http://leanone.cn/user/qqLogin/';
		
		$qq_state=isset($_SESSION['qq_state'])?$_SESSION['qq_state']:''; 
		
		 //验证是登陆还是回调
		 if($_GET['code'] &&  $_GET['code']!=""){
              
            
             //-------请求参数列表
            $keysArr = array(
                 "grant_type" => "authorization_code",
                 "client_id" => $appid,
                 "redirect_uri" =>  $callback,
                 "client_secret" =>  $appkey,
                 "code" => $_GET['code']
             );
			 
             //------构造请求access_token的url
             $token_url = $this->oauth->combineURL(GET_ACCESS_TOKEN_URL, $keysArr);
			 echo $token_url;
             $response =$this->oauth->get_contents($token_url);
			 
             
             $params = array();
             parse_str($response, $params);

        
             
             $access_token = $params["access_token"];
             $openid= $this->oauth->get_openid(  $access_token);
            
			
             //进入主页
            //获取用户信息
            $_data = $this->oauth->get_user_info($access_token,$openid,$appid);
			$_data = json_decode($_data);
			
			
		
			// var_dump($_data); 
			 
			// var_dump($_data);
			/*
			    "ret": 0,
    "msg": "",
    "is_lost":0,
    "nickname": "Alex.TU",
    "gender": "鐢�",
    "province": "涓婃捣",
    "city": "娴︿笢鏂板尯",
    "year": "1982",
    "figureurl": "http:\/\/qzapp.qlogo.cn\/qzapp\/101191923\/AA618F70B1EE7BCF5DD5E487810A7B54\/30",
    "figureurl_1": "http:\/\/qzapp.qlogo.cn\/qzapp\/101191923\/AA618F70B1EE7BCF5DD5E487810A7B54\/50",
    "figureurl_2": "http:\/\/qzapp.qlogo.cn\/qzapp\/101191923\/AA618F70B1EE7BCF5DD5E487810A7B54\/100",
    "figureurl_qq_1": "http:\/\/q.qlogo.cn\/qqapp\/101191923\/AA618F70B1EE7BCF5DD5E487810A7B54\/40",
    "figureurl_qq_2": "http:\/\/q.qlogo.cn\/qqapp\/101191923\/AA618F70B1EE7BCF5DD5E487810A7B54\/100",
    "is_yellow_vip": "0",
    "vip": "0",
    "yellow_vip_level": "0",
    "level": "0",
    "is_yellow_year_vip": "0"
			*/
	
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
			$this->smarty->view('test/loginEnd.html');
			
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
	public function weiboLogin(){
	
		$sina_k='3910900256'; //新浪微博应用App Key 
		$sina_s='5c0bdcf37ad43838250fdc44b3a6f619'; //新浪微博应用App Secret 
		$callback_url='http://leanone.cn/user/weiboLogin'; //授权回调网址 

		
		$sina_t=isset($_SESSION['sina_t'])?$_SESSION['sina_t']:''; 


  
//检查是否已登录 

 if($sina_t!=''){ 

     $sina=new sinaPHP($sina_k, $sina_s, $sina_t); 

  

     //获取登录用户id 

     $sina_uid=$sina->get_uid(); 

     $uid=$sina_uid['uid']; 

   

     //获取登录用户信息 

     $result=$sina->show_user_by_id($uid); 

     var_dump($result); 

 /** 

28     //发布微博 
29     $content='微博内容'; 
30     $img='http://www.baidu.com/img/baidu_sylogo1.gif'; 
31     $img_a=getimgp($img); 
32     if($img_a[2]!=''){ 
33         $result=$sina->update($content, $img_a); 
34         //发布带图片微博 
35     }else{ 
36         $result=$sina->update($content); 
37         //发布纯文字微博 
38     } 
39     var_dump($result); 
43     //微博列表 
44     $result=$sina->user_timeline($uid); 
45     var_dump($result); 
46     **/ 

 }else{ 

     //生成登录链接 


     $sina=new sinaPHP($sina_k, $sina_s); 

     $login_url=$sina->login_url($callback_url); 

    
	 
	 	if(isset($_GET['code']) && $_GET['code']!=''){ 

			 $o=new sinaPHP($sina_k, $sina_s); 
	
		 $result=$o->access_token($callback_url, $_GET['code']); 
		
	
	 } 

		 if(isset($result['access_token']) && $result['access_token']!=''){ 
				 $_SESSION['sina_t']=$result['access_token'];
   				//echo '授权完成，请记录<br/>access token：<input size="50" value="',$result['access_token'],'">';
				$sina=new sinaPHP($sina_k, $sina_s, $_SESSION['sina_t']); 

  

			 //获取登录用户id 
		
			 $sina_uid=$sina->get_uid(); 
		
			 $uid=$sina_uid['uid']; 
		
		   
		
			 //获取登录用户信息 
		
			 $result=$sina->show_user_by_id($uid); 
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
			
			 $rs=$this->userm->addWeibo($result);
			 if($rs==1){
				//已注册，已完善基本账号
				 
			 }else{
				//第一次注册	 
			 }
			// echo  $result["id"];
			//	var_dump($result);  
			$this->smarty->view('test/loginEnd.html');

		}else{
			  header("Location: $login_url"); 
			
		}
		
		 
 }

	}
}

