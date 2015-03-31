<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
 

class mail
{
  
    var $settings          =  array();
    function __construct()
    {

/*
	   $this->settings = array(
			'server'   => "smtp.yeah.net",   // SMTP 服务器
			'port'     => "25",     // SMTP 端口, 默认不需修改
			'auth'     => 1,     // 是否需要 AUTH LOGIN 验证, 1=是, 0=否
			'auth_username'   => "leanone@yeah.net", // 发信人地址 (如果需要验证,必须为本服务器地址)
			'auth_password'  => "dekkeyiqrjchomev",  // 验证用户名 dekkeyiqrjchomev
			'from' => 'leanone@yeah.net'
			);
			*/
		 $this->settings = array(
			'server'   => "smtp.sina.cn",   // SMTP 服务器
			'port'     => "25",     // SMTP 端口, 默认不需修改
			'auth'     => 1,     // 是否需要 AUTH LOGIN 验证, 1=是, 0=否
			'auth_username'   => "leanone@sina.cn", // 发信人地址 (如果需要验证,必须为本服务器地址)
			'auth_password'  => "ooo234",  // 验证用户名 dekkeyiqrjchomev
			'from' => 'leanone@sina.cn'
			);		
						

    }

	function send($email_to,$email_subject,$email_message){

		$mailcfg   = $this ->settings;	
		print_r($mailcfg);
		$textType="text/html";
		$textType="text/plain";
	
	
		$email_subject="=?UTF-8?B?".base64_encode(str_replace("\n", ' ', $email_subject))."?=";
		if(!$fp = fsockopen($mailcfg['server'], $mailcfg['port'], $errno, $errstr, 30)) { 
			echo( "($mailcfg[server]:$mailcfg[port]) CONNECT - Unable to connect to the SMTP server.");
		}
		stream_set_blocking($fp, true);
		$lastmessage = fgets($fp, 512);
		if(substr($lastmessage, 0, 3) != '220') { echo( "$mailcfg[server]:$mailcfg[port] CONNECT - $lastmessage");}
		fputs($fp, ($mailcfg['auth'] ? 'EHLO' : 'HELO')." discuz\r\n");
		$lastmessage = fgets($fp, 512);
		if(substr($lastmessage, 0, 3) != 220 && substr($lastmessage, 0, 3) != 250) {echo( "($mailcfg[server]:$mailcfg[port]) HELO/EHLO - $lastmessage");}
		while(1) {
			$lastmessage = fgets($fp, 512);
			if(substr($lastmessage, 3, 1) != '-' || empty($lastmessage)) {break;}
		} 
		if($mailcfg['auth']) {
			fputs($fp, "AUTH LOGIN\r\n");
			$lastmessage = fgets($fp, 512);
			if(substr($lastmessage, 0, 3) != 334) {	echo( "($mailcfg[server]:$mailcfg[port]) AUTH LOGIN - $lastmessage");}
			fputs($fp, base64_encode($mailcfg['auth_username'])."\r\n");
			$lastmessage = fgets($fp, 512);
			if(substr($lastmessage, 0, 3) != 334) {	echo( "($mailcfg[server]:$mailcfg[port]) USERNAME - $lastmessage");}
			fputs($fp, base64_encode($mailcfg['auth_password'])."\r\n");
			$lastmessage = fgets($fp, 512);
			if(substr($lastmessage, 0, 3) != 235) {	echo( "($mailcfg[server]:$mailcfg[port]) PASSWORD - $lastmessage");}
		}
		fputs($fp, "MAIL FROM: ".preg_replace("/.*\<(.+?)\>.*/", "\\1", $mailcfg["from"])."\r\n");
		$lastmessage = fgets($fp, 512);
		if(substr($lastmessage, 0, 3) != 250) {
			fputs($fp, "MAIL FROM: <".preg_replace("/.*\<(.+?)\>.*/", "\\1", $mailcfg["from"]).">\r\n");
			$lastmessage = fgets($fp, 512);
			if(substr($lastmessage, 0, 3) != 250) {	echo( "($mailcfg[server]:$mailcfg[port]) MAIL FROM - $lastmessage");}
		}
		foreach(explode(',', $email_to) as $touser) {
			$touser = trim($touser);
			if($touser) {
				fputs($fp, "RCPT TO: $touser\r\n");
				$lastmessage = fgets($fp, 512);
				//echo $lastmessage.":".substr($lastmessage, 0, 3);
				if(substr($lastmessage, 0, 3) != 250) {
					fputs($fp, "RCPT TO: <$touser>\r\n");
					$lastmessage = fgets($fp, 512);
					//echo( "($mailcfg[server]:$mailcfg[port]) RCPT TO - $lastmessage");
				}
			}
		}
		fputs($fp, "DATA\r\n");
		$lastmessage = fgets($fp, 512);
		if(substr($lastmessage, 0, 3) != 354) { 
			echo( "($mailcfg[server]:$mailcfg[port]) DATA - $lastmessage");
		}
		$headers="";
		$headers.= "To: $email_to\r\n";
		$headers.= "From: $mailcfg[from]\r\n";
		
		$headers .= "Organization: leanone.cn\r\n";  
		$headers .= "MIME-Version: 1.0\r\n";  


		$headers.= "Content-type:$textType;charset=UTF-8\r\n";
		$headers.= "Subject: $email_subject\r\n\r\n$email_message\r\n.\r\n";
		
		fputs($fp, $headers); 
		/*
 $headers .= "Reply-To: The Sender <sender@sender.com>\r\n";   
3.$headers .= "Return-Path: The Sender <sender@sender.com>\r\n";   
4.$headers .= "From: The Sender <senter@sender.com>\r\n";   

5.$headers .= "X-Priority: 3\r\n";  
6.$headers .= "X-Mailer: PHP". phpversion() ."\r\n"  


		
		*/
		//UTF-8
		
	}
  
}

?>