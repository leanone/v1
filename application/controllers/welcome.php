<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->language(array('site')); 
		$this->smarty->assign( 'language',$this->lang->language);
		
        $this->load->model('userm');

        $this->load->helper('url'); 
         
		$this->baseUrl=$this->config->item("base_url");
		$this->smarty->assign( 'base_url',$this->baseUrl);
		
		$this->Uid=intval($this->input->cookie("uid"));
		$this->Cid=$this->input->cookie("cid");
		
		$this->smarty->assign( 'cid',$this->Cid);
		$this->smarty->assign( 'uid',$this->Uid);
		$this->smarty->assign( 'uname',$this->input->cookie("uname"));
		
		$this->Logined=$this->input->cookie("logined")==true?true:false;
		$this->smarty->assign( 'userLogined',$this->Logined);
		if($this->Logined){
			$this->smarty->assign( 'user',$this->userm->getInfo($this->Uid));
		}
		
    }
	public function index()
	{
		$ua = strtolower($_SERVER['HTTP_USER_AGENT']);

		$uachar = "/(nokia|sony|ericsson|mot|samsung|sgh|lg|philips|panasonic|alcatel|lenovo|cldc|midp|mobile)/i";
		if( !preg_match("/(ipad)/i", $ua))
		{
		if(($ua == '' || preg_match($uachar, $ua))&& !strpos(strtolower($_SERVER['REQUEST_URI']),'wap'))
		{
		   header("Location: http://www.aiweibang.com/m/webapp/10844/element"); 
		
		   
		
		}
		}
	
		
		
		//$this->load->view('index');
		$this->smarty->view('indexNew.html');
	}
	public function indexv0(){
		$this->smarty->view('index.html');
	}
	
	public function indexv1(){
		$this->smarty->view('main.html');
	}
	public function mobile(){
		 echo $_SERVER['HTTP_HOST'];
		// header("Location: http://www.aiweibang.com/m/webapp/10844/element"); 
	}
	public function test(){
		header("Content-type: text/html; charset=utf-8"); 
		$d=array("北京创业","创业","北京孵化器","精一学社","种子投资","孵化器","精益创业");
		for($i=0;$i<sizeof($d);$i++){
			echo $d[$i];
			echo "<br>";
			echo 'http://www.leanone.cn/?utm_source=baidu&utm_content='.urlencode($d[$i]);	
			echo "<hr>";
		}
		
	}
	public function test2(){
		header("Content-type: text/html; charset=utf-8"); 
		//加载方式一，加载时不需要传入_lang 
		$this->load->language(array('site')); 
		print_r($this->lang->language);
		echo $this->lang->line('menu_system_title'); 
		//echo $this->lang->;
			
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */