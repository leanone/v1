<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	function getRegcode(){
		$str = "1,2,3,4,5,6,7,8,9,a,b,c,d,e,f,g,h,i,j,k,m,n,p,q,r,s,t,y,z";
		$list = explode(",", $str);
		$cmax = count($list) - 1;
		$verifyCode = '';
		
		for ( $i=0; $i < 5; $i++ ){
			$randnum = mt_rand(0, $cmax);
			//取出字符，组合成验证码字符
			$verifyCode .= $list[$randnum];
		}
		return $verifyCode;
	}
	function showRegcode($verifyCode)
	{
		
		header("Content-type: image/png");
		
		
		$im = imagecreate(58,24);
		
		$black = imagecolorallocate($im, 0,0,0);
		$white = imagecolorallocate($im, 255,255,255);
		$gray = imagecolorallocate($im, 200,200,200);
		$red = imagecolorallocate($im, 255, 0, 0);
		imagefill($im,0,0,$white);
		imagestring($im, 5, 5, 2, $verifyCode, $black);
		for($i=0;$i<50;$i++){
			$randcolor = ImageColorallocate($im,rand(0,255),rand(0,255),rand(0,255)); 
		   imagesetpixel($im, rand()%70 , rand()%26 , $randcolor); 
		}
		imagepng($im);
		imagedestroy($im);	
	
	}
