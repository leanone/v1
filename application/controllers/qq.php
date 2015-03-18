<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
     
     /*
      * @ qq登陆 注销 消息获取等
     * @author
      */
     class QQ extends CI_Controller
     {
        
         public function __construct() {
             parent::__construct();
             session_start();
             $this->load->helper('url'); 
             //error_reporting(0);
             /*qq登陆*/
            $this->load->library('tencent/oauth','oauth'); 
         }
         
         public function index()
         {   
             //验证是登陆还是回调
            if($this->oauth->check_login() === 'false')
             {
                 $this->oauth->qq_login();
             }
             else
             {
                 $this->oauth->qq_callback();
             }
                 
         }     
     }

