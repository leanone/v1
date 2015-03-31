<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class download extends CI_Controller {

	public function index()
	{
	
		$this->smarty->assign( 'downfile',"/download/huabu");
		$this->smarty->view('download.html');
	}
	public function huabu(){
		
		$filename = str_replace("/system/","",BASEPATH).'/public/download/huabu-v0.6.xls'; 
		
		//文件的类型 
		header('Content-type: application/vnd.ms-excel;charset=UTF-8'); 
		//下载显示的名字 
		$downName=urlencode('好点子画布-v0.6.xls');
		
		header('Content-Disposition: attachment; filename="'.$downName.'"'); 
		readfile("$filename"); 
	
	
	}

	
}
