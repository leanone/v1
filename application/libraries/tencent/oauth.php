<?php

     
     class Oauth
     {
          /**
         * combineURL
         * 拼接url
         * @param string $baseURL   基于的url
         * @param array  $keysArr   参数列表数组
        * @return string           返回拼接的url
         */
         
         private $APIMap;
         
         public function __construct() {
             /*以下部分为获取第三方qq登陆资料*/
         //初始化APIMap
         /*
          * 加#表示非必须，无则不传入url(url中不会出现该参数)， "key" => "val" 表示key如果没有定义则使用默认值val
          * 规则 array( baseUrl, argListArr, method)
          */
		
         $this->APIMap = array(
         
             
             /*                       qzone                    */
             "add_blog" => array(
                 "https://graph.qq.com/blog/add_one_blog",
                 array("title", "format" => "json", "content" => null),
                 "POST"
             ),
             "add_topic" => array(
                 "https://graph.qq.com/shuoshuo/add_topic",
                 array("richtype","richval","con","#lbs_nm","#lbs_x","#lbs_y","format" => "json", "#third_source"),
                 "POST"
             ),
             "get_user_info" => array(
                 "https://graph.qq.com/user/get_user_info",
                 array("format" => "json"),
                 "GET"
             ),
             "add_one_blog" => array(
                 "https://graph.qq.com/blog/add_one_blog",
                 array("title", "content", "format" => "json"),
                 "GET"
             ),
             "add_album" => array(
                 "https://graph.qq.com/photo/add_album",
                 array("albumname", "#albumdesc", "#priv", "format" => "json"),
                 "POST"
             ),
             "upload_pic" => array(
                 "https://graph.qq.com/photo/upload_pic",
                 array("picture", "#photodesc", "#title", "#albumid", "#mobile", "#x", "#y", "#needfeed", "#successnum", "#picnum", "format" => "json"),
                 "POST"
             ),
             "list_album" => array(
                 "https://graph.qq.com/photo/list_album",
                 array("format" => "json")
             ),
             "add_share" => array(
                 "https://graph.qq.com/share/add_share",
                 array("title", "url", "#comment","#summary","#images","format" => "json","#type","#playurl","#nswb","site","fromurl"),
                 "POST"
             ),
             "check_page_fans" => array(
                 "https://graph.qq.com/user/check_page_fans",
                 array("page_id" => "314416946","format" => "json")
             ),
             /*                    wblog                             */

             "add_t" => array(
                 "https://graph.qq.com/t/add_t",
                 array("format" => "json", "content","#clientip","#longitude","#compatibleflag"),
                 "POST"
             ),
             "add_pic_t" => array(
                 "https://graph.qq.com/t/add_pic_t",
                 array("content", "pic", "format" => "json", "#clientip", "#longitude", "#latitude", "#syncflag", "#compatiblefalg"),
                 "POST"
             ),
             "del_t" => array(
                 "https://graph.qq.com/t/del_t",
                 array("id", "format" => "json"),
                 "POST"
             ),
             "get_repost_list" => array(
                 "https://graph.qq.com/t/get_repost_list",
                 array("flag", "rootid", "pageflag", "pagetime", "reqnum", "twitterid", "format" => "json")
             ),
             "get_info" => array(
                 "https://graph.qq.com/user/get_info",
                 array("format" => "json")
             ),
             "get_other_info" => array(
                 "https://graph.qq.com/user/get_other_info",
                 array("format" => "json", "#name", "fopenid")
             ),
             "get_fanslist" => array(
                 "https://graph.qq.com/relation/get_fanslist",
                 array("format" => "json", "reqnum", "startindex", "#mode", "#install", "#sex")
             ),
             "get_idollist" => array(
                 "https://graph.qq.com/relation/get_idollist",
                 array("format" => "json", "reqnum", "startindex", "#mode", "#install")
             ),
             "add_idol" => array(
                 "https://graph.qq.com/relation/add_idol",
                 array("format" => "json", "#name-1", "#fopenids-1"),
                 "POST"
             ),
             "del_idol" => array(
                 "https://graph.qq.com/relation/del_idol",
                 array("format" => "json", "#name-1", "#fopenid-1"),
                 "POST"
             ),
             /*                           pay                          */

             "get_tenpay_addr" => array(
                 "https://graph.qq.com/cft_info/get_tenpay_addr",
                 array("ver" => 1,"limit" => 5,"offset" => 0,"format" => "json")
             )
         );
         
         }

         //登陆
         public function check_login()
          {
			  echo $_GET['state'];
			  echo $_SESSION['qq_state'];
              if(isset($_SESSION['qq_state']) && $_GET['state'] && ($_SESSION['qq_state'] == $_GET['state']))
              {
                  return 'true';
              }
              else
              {
                  return 'false';
              }
          }

          
          public function qq_login()
         {
             $CI = &get_instance();
             $CI->config->load('isetting/qq_setting');
             $setting = $CI->config->item('inc_info');
             $appid = $setting[0]['appid'];
             $callback = $setting[0]['callback'];
             $scope = '';
             foreach ($setting[1] as $key=>$val)
             {
                 if($val === '1')
                 {
                     $scope .= $key . ',';
                 }
             }
             $scope = trim(rtrim($scope,',')); 

             //-------生成唯一随机串防CSRF攻击
            $state = md5(uniqid(rand(), TRUE));
             $_SESSION['qq_state'] = $state;

             //-------构造请求参数列表
            $keysArr = array(
                 "response_type" => "code",
                 "client_id" => $appid,
                 "redirect_uri" => $callback,
                 "state" => $state,
                 "scope" => $scope
             );
            // $login_url =  $this->combineURL(GET_AUTH_CODE_URL, $keysArr);
			 
			  $login_url="https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=".$appid;
			  $login_url.="&redirect_uri=".$callback."?state=".$state."&scope=get_user_info";
			 echo $login_url;
			 exit;
			  header("Location:$login_url");
         }
         
         //callback回调方法
        public function qq_callback()
         {
             $CI = &get_instance();
             $CI->config->load('isetting/qq_setting');
             $setting = $CI->config->item('inc_info');
             $state = $_SESSION['qq_state'];
             //--------验证state防止CSRF攻击
            if($_GET['state'] != $state){
                 echo "<script>alert('QQ第三方登陆失败');</script>";
                // redirect('/login','location',301);
             }

             //-------请求参数列表
            $keysArr = array(
                 "grant_type" => "authorization_code",
                 "client_id" => $setting[0]['appid'],
                 "redirect_uri" => $setting[0]['callback'],
                 "client_secret" => $setting[0]['appkey'],
                 "code" => $_GET['code']
             );
			 
             //------构造请求access_token的url
             $token_url = $this->combineURL(GET_ACCESS_TOKEN_URL, $keysArr);
			 
             $response = $this->get_contents($token_url);
			 
             
             $params = array();
             parse_str($response, $params);

             $_SESSION['qq']['access_token'] = $params["access_token"];
             
             $access_token = $params["access_token"];
             $openid= $this->get_openid();
            
			
             //进入主页
            //获取用户信息
            $_data = $this->get_user_info($access_token,$openid,$setting[0]['appid']);
             print_r($_data);
            // redirect('/','location',301);
         }
		 public function get_user_info($access_token,$openid,$appid){
			  $keysArr = array(
                 "access_token" => $access_token,
                 "openid" => $openid,
                 "oauth_consumer_key" => $appid
             );

			  $token_url = $this->combineURL("https://graph.qq.com/user/get_user_info", $keysArr);
			
             $response = $this->get_contents($token_url);
			 return $response;
		 }
     
         //注销
        public function qq_logout()
         {
             
         }
         
         
         public function combineURL($baseURL,$keysArr){
             $combined = $baseURL."?";
             $valueArr = array();

             foreach($keysArr as $key => $val){
                 $valueArr[] = "$key=$val";
             }

             $keyStr = implode("&",$valueArr);
             $combined .= ($keyStr);

             return $combined;
         }
         
         /**
          * get_contents
          * 服务器通过get请求获得内容
         * @param string $url       请求的url,拼接后的
         * @return string           请求返回的内容
         */
           public function get_contents($url)
           {
             if (ini_get("allow_url_fopen") == "1") {
                 $response = file_get_contents($url);
             }else{
                 $ch = curl_init();
                 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                 curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                 curl_setopt($ch, CURLOPT_URL, $url);
                 $response =  curl_exec($ch);
                 curl_close($ch);
             }

             //-------请求为空
            if(empty($response)){
                 echo "<script>alert('QQ第三方登陆失败');</script>";
                 redirect('/login','location',301);
             }
             return $response;
         }
         
         public function get_openid($tooken)
         {

             //-------请求参数列表
            $keysArr = array(
                 "access_token" => $tooken
             );

             $graph_url = $this->combineURL(GET_OPENID_URL, $keysArr);
             $response = $this->get_contents($graph_url);

             //----检测错误是否发生
            if(strpos($response, "callback") !== false)
             {

                 $lpos = strpos($response, "(");
                 $rpos = strrpos($response, ")");
                 $response = substr($response, $lpos + 1, $rpos - $lpos -1);
             }

             $user = json_decode($response);
             //------记录openid
             $_SESSION['qq']['openid'] = $user->openid;
             return $user->openid;
         }
         
         
         
         
         
         /**
         * _call
         * 魔术方法，做api调用转发
        * @param string $name    调用的方法名称
        * @param array $arg      参数列表数组
        * @since 5.0
         * @return array          返加调用结果数组
        */
         public function __call($name,$arg){
         //如果APIMap不存在相应的api
         if(empty($this->APIMap[$name])){
             echo "<script>alert('获取资料出错');</script>";
             redirect('/login','location',301);
         }

         //从APIMap获取api相应参数
        $baseUrl = $this->APIMap[$name][0];
         $argsList = $this->APIMap[$name][1];
         $method = isset($this->APIMap[$name][2]) ? $this->APIMap[$name][2] : "GET";

         if(empty($arg)){
             $arg[0] = null;
         }

         //对于get_tenpay_addr，特殊处理，php json_decode对\xA312此类字符支持不好
        if($name != "get_tenpay_addr"){
             $response = json_decode($this->_applyAPI($arg[0], $argsList, $baseUrl, $method));
             $responseArr = $this->objToArr($response);
         }else{
             $responseArr = $this->simple_json_parser($this->_applyAPI($arg[0], $argsList, $baseUrl, $method));
         }


         //检查返回ret判断api是否成功调用
        if($responseArr['ret'] == 0){
             return $responseArr;
         }else{
             echo "<script>alert('第三方登陆失败')</script>";
             redirect('/','location',301);
         }

     }
     
     //调用相应api
     private function _applyAPI($arr, $argsList, $baseUrl, $method){
         $pre = "#";
         $keysArr = $this->keysArr;

         $optionArgList = array();//一些多项选填参数必选一的情形
        foreach($argsList as $key => $val){
             $tmpKey = $key;
             $tmpVal = $val;

             if(!is_string($key)){
                 $tmpKey = $val;

                 if(strpos($val,$pre) === 0){
                     $tmpVal = $pre;
                     $tmpKey = substr($tmpKey,1);
                     if(preg_match("/-(\d$)/", $tmpKey, $res)){
                         $tmpKey = str_replace($res[0], "", $tmpKey);
                         $optionArgList[$res[1]][] = $tmpKey;
                     }
                 }else{
                     $tmpVal = null;
                 }
             }

             //-----如果没有设置相应的参数
            if(!isset($arr[$tmpKey]) || $arr[$tmpKey] === ""){

                 if($tmpVal == $pre){//则使用默认的值
                    continue;
                 }else if($tmpVal){
                     $arr[$tmpKey] = $tmpVal;
                 }else{
                     if($v = $_FILES[$tmpKey]){

                         $filename = dirname($v['tmp_name'])."/".$v['name'];
                         move_uploaded_file($v['tmp_name'], $filename);
                         $arr[$tmpKey] = "@$filename";

                     }else{
                         $this->error->showError("api调用参数错误","未传入参数$tmpKey");
                     }
                 }
             }

             $keysArr[$tmpKey] = $arr[$tmpKey];
         }
         //检查选填参数必填一的情形
        foreach($optionArgList as $val){
             $n = 0;
             foreach($val as $v){
                 if(in_array($v, array_keys($keysArr))){
                     $n ++;
                 }
             }

             if(! $n){
                 $str = implode(",",$val);
                 $this->error->showError("api调用参数错误",$str."必填一个");
             }
         }

         if($method == "POST"){
             if($baseUrl == "https://graph.qq.com/blog/add_one_blog") $response = $this->urlUtils->post($baseUrl, $keysArr, 1);
             else $response = $this->urlUtils->post($baseUrl, $keysArr, 0);
         }else if($method == "GET"){
             $response = $this->urlUtils->get($baseUrl, $keysArr);
         }

         return $response;

     }
     
     //php 对象到数组转换
    private function objToArr($obj){
         if(!is_object($obj) && !is_array($obj)) {
             return $obj;
         }
         $arr = array();
         foreach($obj as $k => $v){
             $arr[$k] = $this->objToArr($v);
         }
         return $arr;
     }
     
     //简单实现json到php数组转换功能
    private function simple_json_parser($json){
         $json = str_replace("{","",str_replace("}","", $json));
         $jsonValue = explode(",", $json);
         $arr = array();
         foreach($jsonValue as $v){
             $jValue = explode(":", $v);
             $arr[str_replace('"',"", $jValue[0])] = (str_replace('"', "", $jValue[1]));
         }
         return $arr;
     }

     }

