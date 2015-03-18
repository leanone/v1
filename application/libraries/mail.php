<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
 

class mail
{
  
    var $settings          =  array();
    function __construct($server, $port, $auth, $auth_username, $auth_password, $from='webmaster@alextu.com')
    {

	   $this->settings = array(
								'server'   => $server,   // SMTP 服务器
								'port'     => $port,     // SMTP 端口, 默认不需修改
								'auth'     => $auth,     // 是否需要 AUTH LOGIN 验证, 1=是, 0=否
								'auth_username'   => $auth_username, // 发信人地址 (如果需要验证,必须为本服务器地址)
								'auth_password'  => $auth_password,  // 验证用户名
								'from' => $from
								);

    }

	function send($email_to,$email_subject,$email_message,$textType="text/html"){

		$mailcfg   = $this ->settings;	
		print_r($mailcfg);
	
	
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
		fputs($fp, "To: $email_to\r\nFrom: $mailcfg[from]\r\nContent-type:$textType;charset=UTF-8\r\nSubject: $email_subject\r\n\r\n$email_message\r\n.\r\n"); 
		
	}
  
}

?>