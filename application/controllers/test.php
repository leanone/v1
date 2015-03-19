<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class test extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		
    }
	public function index()
	{
		define('CI_VERSION', '2.1.4');
		echo "CI_VERSION:".CI_VERSION;
		
	}
	
}
