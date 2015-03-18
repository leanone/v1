<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class download extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	
		$this->smarty->assign( 'file',"/download/huabu");
		$this->smarty->view('download.html');
	}
	public function huabu(){
		
		$filename = 'huabu-v0.6.xls'; 
		//文件的类型 
		header('Content-type: application/vnd.ms-excel;charset=UTF-8'); 
		//下载显示的名字 
		$downName=urlencode('好点子画布-v0.6.xls');
		
		header('Content-Disposition: attachment; filename="'.$downName.'"'); 
		readfile("$filename"); 
		exit();
		
		
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */