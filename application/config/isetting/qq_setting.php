<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

     /**
      * @qq互联配置信息
     * 默认开启get_user_info模块
     * **/

     $config['inc_info'] = array(
         array (
                 'appid' => '101191923',
                 'appkey' => 'c8b402d2b0481724f9f707b38f8deba1',
                 'callback' => 'http://leanone.cn/user/qqLogin/'
               ),
         array (
                 'get_user_info' => '1',
                 'add_topic' => '0',
                 'add_one_blog' => '0',
                 'add_album' => '0',
                 'upload_pic' => '0',
                 'list_album' => '0',
                 'add_share' => '0',
                 'check_page_fans' => '0',
                 'add_t' => '0',
                 'add_pic_t' => '0',
                 'del_t' => '0',
                 'get_repost_list' => '0',
                 'get_info' => '0',
                 'get_other_info' => '0',
                 'get_fanslist' => '0',
                 'get_idollist' => '0',
                 'add_idol' => '0',
                 'del_idol' => '0',
                 'get_tenpay_addr' => '0',
               )
     );