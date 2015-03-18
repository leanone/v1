<?php /* Smarty version Smarty-3.1.15, created on 2015-03-17 07:43:55
         compiled from "application\views\templates\project.add.html" */ ?>
<?php /*%%SmartyHeaderCode:37605507cd2bef9709-54976854%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2b2c566e8e4173c3d3d7ddcb4ee1c987a14e58f' => 
    array (
      0 => 'application\\views\\templates\\project.add.html',
      1 => 1426494723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37605507cd2bef9709-54976854',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'language' => 0,
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5507cd2bf3a7d4_96876514',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5507cd2bf3a7d4_96876514')) {function content_5507cd2bf3a7d4_96876514($_smarty_tpl) {?><!DOCTYPE html>
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
          <div class="djBox">
            
              
              <div class="box">
                  <div class="box_1" >
                 
                          <div class="t1"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_apply'];?>
</div>
                          <ul>
                              <ol>
                                  <li class="w120"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_realname'];?>
<span>*</span></li>
                                  <li><input type="text" class="i" name="realname" /></li>
                              </ol>
                              <ol>
                                  <li class="w120"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_weichat'];?>
<span>*</span></li>
                                  <li><input type="text" class="i" name="weichat" /></li>
                              </ol>
                               <ol>
                                  <li class="w120"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_iswork'];?>
<span>*</span></li>
                                  <li><input type="radio"  name="isquan"  value="1" />&nbsp;是&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="isquan" value="0" checked />&nbsp;否</li>
                              </ol>
                               <ol>
                                  <li class="w120"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_teamNum'];?>
<span>*</span></li>
                                  <li><input type="text" class="i" name="rnum" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"/></li>
                              </ol>
                              <ol>
                                  <li class="w120"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_projectName'];?>
<span>*</span></li>
                                  <li><input type="text" class="i" name="subject"/></li>
                              </ol>
                              <ol>
                                  <li class="w120"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_telName'];?>
<span>*</span></li>
                                  <li><input type="tel" class="i" name="tel"/></li>
                              </ol>
                              <ol>
                                  <li class="w120"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_email'];?>
<span>*</span></li>
                                  <li><input type="text" class="i" name="email"/></li>
                              </ol>
                           </ul>
                           <p class="clear"></p>
                           <div class="sbtn mt10">
                              
                              <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['language']->value['txt_submit'];?>
" class="subBtn"/>
                           </div>
                          
                       
                  </div>
                  
               
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
