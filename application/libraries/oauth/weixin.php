 <?php 


 class weixin 

 { 

     function __construct(){ 
		
         $this->AppID    ='wx6d8f3ceeb4627ffd';
         $this->AppSecret="9b36fd9377295f8603bc8e4f82b81804";
		 $this->loginUrl ="https://open.weixin.qq.com/connect/qrconnect";
		 $this->refreshUrl="https://api.weixin.qq.com/sns/oauth2/refresh_token";
		 $this->tokenUrl ="https://api.weixin.qq.com/sns/oauth2/access_token";
		 $this->callbackUrl ="http://leanone.cn/user/weixinLogin";
		 $this->infoUrl     ="https://api.weixin.qq.com/sns/userinfo";
         $this->access_token=""; 
		 

     } 
	
	


     function get_login_url($state){ 

         $params=array( 	
             'appid'=> $this->AppID, 
             'redirect_uri'=>$this->callbackUrl, 
             'response_type'=>"code" , 
             'scope'=>"snsapi_login" , 
             'state'=>$state 
         ); 
		 return $this->combineURL($this->loginUrl,$params); 

     } 
	 /* 获得刷新后的 数据*/
	  function get_refresh_data($refresh_token){ 

         $params=array( 	
             'appid'=> $this->AppID, 
             'grant_type'=> "refresh_token",
             'refresh_token'=>$refresh_token 
         ); 
		 return $this->http($this->combineURL($this->refreshUrl,$params)); 

     } 
	 
	 function saveUserData($result){
		 $CI = &get_instance();
		 
		 $CI->input->set_cookie("access_token",$result['access_token'],$result['expires_in']);
		 $CI->input->set_cookie("openid",$result['openid'],$result['expires_in']);
		 $CI->input->set_cookie("refresh_token",$result['refresh_token'],30*24*60*60);
	 }
	 
	 function getUserInfo($access_token,$openid){
		 
		 $params=array("access_token"=>$access_token,"openid"=>$openid);		
		 return $this->http($this->combineURL($this->infoUrl,$params)); 
		 
	 }
   
	/*
		根据code 获得返回数据 access_token
	*/
     function get_access_token($code){ 
		 $d=array(
		 	"appid"=>$this->AppID,
			"secret"=>$this->AppSecret,
			"code"=>$code,
			"grant_type"=>"authorization_code"
		 ); 
         return $this->http($this->combineURL($this->tokenUrl,$d)); 
		
     } 
	 
	 /*
	 	获取用户数据
	 */
	 
	 
	 
	 /*
	 	将数组合成访问网址，$baseURL为？前地址
		与http_build_query( 有什么区别呀
	 */
	 public function combineURL($baseURL,$keysArr){
		 
		 return $baseURL."?".http_build_query($keysArr);
     }
  
	 /*
	 	请求网址并获取返回Json数据
	 */
     function http($url, $postfields='', $method='GET', $headers=array()){ 

         $ci=curl_init(); 
         curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, FALSE); 
         curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1); 
         curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 30); 
         curl_setopt($ci, CURLOPT_TIMEOUT, 30); 

         if($method=='POST'){ 

             curl_setopt($ci, CURLOPT_POST, TRUE); 
             if($postfields!='')curl_setopt($ci, CURLOPT_POSTFIELDS, $postfields); 

         } 

         $headers[]="User-Agent: sinaPHP(piscdong.com)"; 
         curl_setopt($ci, CURLOPT_HTTPHEADER, $headers); 
         curl_setopt($ci, CURLOPT_URL, $url); 

         $response=curl_exec($ci); 

         curl_close($ci); 
         $json_r=array(); 
         if($response!='')$json_r=json_decode($response, true); 
         return $json_r; 

     } 

 } 

