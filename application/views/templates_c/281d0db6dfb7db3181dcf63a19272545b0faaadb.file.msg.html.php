<?php /* Smarty version Smarty-3.1.15, created on 2015-03-04 08:54:54
         compiled from "application\views\templates\msg.html" */ ?>
<?php /*%%SmartyHeaderCode:2656354f6ba4e354323-68551030%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '281d0db6dfb7db3181dcf63a19272545b0faaadb' => 
    array (
      0 => 'application\\views\\templates\\msg.html',
      1 => 1425263686,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2656354f6ba4e354323-68551030',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_54f6ba4e3e0de6_43185539',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f6ba4e3e0de6_43185539')) {function content_54f6ba4e3e0de6_43185539($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<title>精一学社 | 精益创业的实践平台，早期创业者的“摇篮”</title>
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
