<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-26 08:37:19
         compiled from "application\views\templates\msg.html" */ ?>
<?php /*%%SmartyHeaderCode:98715513b72f1d6639-96143857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7bbbc649dd727857effad8ea78934276cc712c3' => 
    array (
      0 => 'application\\views\\templates\\msg.html',
      1 => 1426493473,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '98715513b72f1d6639-96143857',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'language' => 0,
    'msg' => 0,
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5513b72f206b00_14081707',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5513b72f206b00_14081707')) {function content_5513b72f206b00_14081707($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<title><?php echo $_smarty_tpl->tpl_vars['language']->value['site_title'];?>
</title>
<?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate ("navB.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="m_main" >
        <div class="m_left">
        
            
            <div class="regE">
            	 <div class="t"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</div>
                 <div class="loginEnd">
                 			您还可以<br/><br/>
                   
                         <a class="sbtn" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
huabu/add">上传画布</a>   <br/><br/>
                        <a class="sbtn" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
project/add">申请创业基金</a>
                 
                 </div>
            </div>
                
            
                
        </div>
        
        <div class="m_right">
            <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/images/erweima_07.jpg" style="margin-top:30px;" />
            <div>扫一扫<br/>
           关注我们</div>
        </div>

    
    
    

</div>
<?php echo $_smarty_tpl->getSubTemplate ("copyright.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    


</body>
</html><?php }} ?>
