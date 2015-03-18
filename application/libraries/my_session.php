<?php  
/** 
 * 因为 CI框架库自身对Session支持的问题,使得 服务器端Session存储竟然 
 * 依赖 客户端浏览器 ,无语... 个人对CI开发者无语... 
 *  
 * 不知道其具体是怎么想的.. 
 *  
 * @author 色色 vb2005xu.iteye.com 
 * 
 */  
class MY_Session extends CI_Session{  
  
    private static $key_userdata = '#userdata+-';  
    private static $key_flashmem = '#flashmem+-';  
     
    function __construct(){  
        if (!headers_sent()){ session_start();}  
    }  
      
    function __destruct(){  
        // 析构函数,删除 flashmem  
        if (isset($_SESSION[self::$key_flashmem])){  
            unset($_SESSION[self::$key_flashmem]);  
        }  
    }  
     
    function userdata($item){  
       $D = isset($_SESSION[self::$key_userdata]) ? $_SESSION[self::$key_userdata] : FALSE;  
        return $D && is_array($D) && isset($D[$item]) ? $D[$item] : FALSE;  
    }  
     
    private function init_userdata(){  
       if (isset($_SESSION[self::$key_userdata]) && is_array($_SESSION[self::$key_userdata]))  
            return true;  
       $_SESSION[self::$key_userdata] = array();  
    }  
      
   function set_userdata($newdata = array(), $newval = ''){  
          
       $this->init_userdata();  
          
       if (is_string($newdata))  
       {  
            $newdata = array($newdata => $newval);  
        }  
  
        if (count($newdata) > 0)  
       {  
            foreach ($newdata as $key => $val)  
           {  
               $_SESSION[self::$key_userdata][$key] = $val;  
           }  
        }  
    }  
      
    function unset_userdata($newdata = array())  
    {  
          
       $this->init_userdata();  
          
       if (is_string($newdata))  
        {  
            $newdata = array($newdata => '');  
        }  
  
       if (count($newdata) > 0)  
        {  
            foreach ($newdata as $key => $val)  
            {  
                unset($_SESSION[self::$key_userdata][$key]);  
            }  
        }  
    }  
      
    function all_userdata()  
    {  
        return isset($_SESSION[self::$key_userdata]) ? $_SESSION[self::$key_userdata]:FALSE;  
    }  
      
    function sess_destroy(){  
//      THROW NEW EXCEPTION('D');  
        session_destroy();  
    }     
  
    private function init_flashdata(){  
        if (isset($_SESSION[self::$key_flashmem]) && is_array($_SESSION[self::$key_flashmem]))  
            return true;  
        $_SESSION[self::$key_flashmem] = array();  
    }  
      
    function set_flashdata($newdata = array(), $newval = '')  
    {  
        $this->init_flashdata();  
          
        if (is_string($newdata))  
        {  
            $newdata = array($newdata => $newval);  
        }  
  
        if (count($newdata) > 0)  
        {  
            foreach ($newdata as $key => $val)  
           {  
                $_SESSION[self::$key_flashmem][$key] = $val;  
            }  
        }  
    }  
      
    function flashdata($item)  
   {  
        $D = isset($_SESSION[self::$key_flashmem]) ? $_SESSION[self::$key_flashmem] : FALSE;  
        return $D && is_array($D) && isset($D[$item]) ? $D[$item] : FALSE;  
    }  
}  
