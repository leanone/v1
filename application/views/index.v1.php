<?php
$ua = strtolower($_SERVER['HTTP_USER_AGENT']);

$uachar = "/(nokia|sony|ericsson|mot|samsung|sgh|lg|philips|panasonic|alcatel|lenovo|cldc|midp|mobile)/i";
if( !preg_match("/(ipad)/i", $ua))
{
if(($ua == '' || preg_match($uachar, $ua))&& !strpos(strtolower($_SERVER['REQUEST_URI']),'wap'))
{
   header("Location: http://www.aiweibang.com/m/webapp/10844/element"); 

   

}
}
?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>精一学社 | 精益创业的实践平台，早期创业者的“摇篮”</title>
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta name="Keywords" content="精益创业,精一学社,精益创想计划,TMT,创业" />
<meta name="description" content="国内首家以精益创业方法为主线的线上线下结合的孵化器，针对-0.5到0.5岁的早期创业者，快速对接精益投资基金，帮助创业者的idea落地生根，降低失败成本。" />
<meta property="qc:admins" content="17013444516765636" />
<meta property="wb:webmaster" content="8864b3609dded637" />
<link rel="stylesheet" href="public/style/main.css?v=2015" media="screen" />
<link rel="Bookmark" href="public/images/favicon.ico"  type="image/x-icon" /> 
<link rel="Shortcut Icon" href="public/images/favicon.ico">
<script src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
<script>
var baseUrl="{$base_url}",Uid="{$uid}"
</script>
<script src="{$base_url}public/js/comm.js"></script>
<body>

<div class="box">
	<div class="main">
    	<div class="logo"></div>
        <div class="ewm"></div>
        <div class="phone"></div>
        <div class="btn"></div>
      
       <a href="download/huabu"  target="_blank" class="download">画布下载</a>
    </div>
    <div class="nav">
    	<span>WeChat:LeanOneAcademy</span>
        <ul>
            <li><a href="http://leanone.cn/wp/?page_id=49">关于学社</a></li>

            
            <li><a href="http://leanone.cn/wp/" target="_blank">精益学习</a></li>
            <li><a href="huabu/download"  target="_blank">画布下载</a></li>
            <li><a href="http://leanone.cn/wp/?page_id=187" target="_blank">精益创想计划</a></li>
        </ul>
    </div>
</div>
<script>


function iniPage(){
	$(".box").css({"width":$(window).width(),"height":$(window).height()})
	//document.title=$(window).width()+":"+$(window).height()
	if($(window).height()<640){
		$(".box").css({"padding-top":20})
	}else if($(window).height()<720){
		$(".box").css({"padding-top":100-(720-$(window).height())})
	}else{
		$(".box").css({"padding-top":100})
	}
}
iniPage()
$(window).resize(function(){
	iniPage()

})

</script>

<div style="display:none">
	 <script>
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "//hm.baidu.com/hm.js?453b663606940a9d2afd3e60c225ef1a";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
    </script>
</div>

</body>
</html>