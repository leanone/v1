<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class huabu extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->model("pinglunm");
	
		
	}

	//画布展示
	public function show($mid=0){
		//$this->smarty->assign('msg',"对不起，你还没有登录哦~");
		
		
		$d=$this->huabum->isExitMid($mid);
		
		if($d){
			
			$this->huabum->addInt("visitNum",$mid);
			
			
			//数据需要特殊化转化
			$c=$this->pinglunm->getList($d["Hid"]);
		
			$this->smarty->assign('pinglunNum',sizeof($c));
			$this->smarty->assign('pinglunList',$c);
			$this->smarty->assign('data',$d);
			$this->smarty->view('mobile/huabu.show.html');
		}else{
			
			$this->smarty->assign('msg',"对不起，该值不存在~");
			$this->smarty->view('msg.html');
		}
	}

	

	
	
}

