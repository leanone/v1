



// JavaScript Document

function isPhoneOrMobile(s){
	patrn=/(^[0-9]{3,4}\-[0-9]{7,8}$)|(^\([0-9]{3,4}\)[0-9]{3,8}$)|(^0{0,1}13[0-9]{9}$)|(13\d{9}$)|(14[5-7]\d{8}$)|(15\d{9}$)|(17[6-8]\d{8}$)|(18\d{9}$)/
	if(!patrn.exec(s)) return false ;
	return true 
}
function isMobile(s){
	patrn=/(^0{0,1}13[0-9]{9}$)|(13\d{9}$)|(14[5-7]\d{8}$)|(15\d{9}$)|(17[6-8]\d{8}$)|(18\d{9}$)/
	if(!patrn.exec(s)) return false ;
	return true 
}
function isEmail(s){

  var patrn=/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
  if(!patrn.exec(s))  return false ;
  return true 
}
function isQQ(s){
 var patrn=/^[1-9][0-9]{4,10}$/;
  if(!patrn.exec(s))  return false ;
  return true 
}
function GetCookie(cookiename) 
{ 
  var thebigcookie = document.cookie;
  var firstchar = thebigcookie.indexOf(cookiename);

 
  if (firstchar != -1) {
	  firstchar += cookiename.length + 1; 
	  lastchar = thebigcookie.indexOf(";", firstchar);
	  if (lastchar == -1) lastchar = thebigcookie.length;
	  return unescape(thebigcookie.substring(firstchar, lastchar));
  } 
  return ""; 

} 

function SetCookie(cookiename, cookievalue, cookieexpdate,path)
{ 
   
	document.cookie = cookiename + '=' + escape(cookievalue)
	+ (cookieexpdate ? '; expires=' + cookieexpdate.toGMTString() : '')
	+ (path ? '; path=' + path : '/')
   
}

function getCid(){

 
	  $.get(baseUrl+"user/getCid",{"utm_source":utm_source},function(d){
		  Cid=d.cid
		
	  },"json")

  
}

function request(sProp){  
  var re = new RegExp("[&,?]"+sProp + "=([^//&]*)", "i");  
  var a = re.exec(document.location.search);  
  if (a == null){return "";  }
  return a[1];
} 


