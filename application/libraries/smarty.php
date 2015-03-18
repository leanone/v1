<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
 
 /**
  * Smarty Class
  *
    6:  * @package        CodeIgniter
    7:  * @subpackage    Libraries
    8:  * @category    Smarty
    9:  * @author        Kepler Gelotte
   10:  * @link        http://www.coolphptools.com/codeigniter-smarty
   11:  */
 //require_once( BASEPATH.'libs/smarty/libs/Smarty.class.php' );
 require_once( APPPATH.'third_party/smarty/libs/Smarty.class.php' );
  
 class CI_Smarty extends Smarty {
  
     function CI_Smarty()
     {
        parent::Smarty();
 
        log_message('debug', "Smarty Class Initialized");
     }
  
     function __construct()
    {
        parent::__construct();
 
         $this->compile_dir = APPPATH . "views/templates_c";
         $this->template_dir = APPPATH . "views/templates";
         $this->assign( 'APPPATH', APPPATH );
         $this->assign( 'BASEPATH', BASEPATH );
		 
  
         // Assign CodeIgniter object by reference to CI
         if ( method_exists( $this, 'assignByRef') )
        {
            $ci =& get_instance();
             $this->assignByRef("ci", $ci);
         }
  
        log_message('debug', "Smarty Class Initialized");
     }
 
 
     /**
   50:      *  Parse a template using the Smarty engine
   51:      *
   52:      * This is a convenience method that combines assign() and
   53:      * display() into one step. 
   54:      *
   55:      * Values to assign are passed in an associative array of
   56:      * name => value pairs.
   57:      *
   58:      * If the output is to be returned as a string to the caller
   59:      * instead of being output, pass true as the third parameter.
   60:      *
   61:      * @access    public
   62:      * @param    string
   63:      * @param    array
   64:      * @param    bool
   65:      * @return    string
   66:      */
     function view($template, $data = array(), $return = FALSE)
     {
        foreach ($data as $key => $val)
         {
           $this->assign($key, $val);
         }
        
         if ($return == FALSE)
         {
            $CI =& get_instance();
             if (method_exists( $CI->output, 'set_output' ))
             {
                 $CI->output->set_output( $this->fetch($template) );
             }
            else
             {
                 $CI->output->final_output = $this->fetch($template);
           }
           return;
        }
       else
        {
            return $this->fetch($template);
         }
     }
 }
// END Smarty Class

?>