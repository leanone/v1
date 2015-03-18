<?php /* Smarty version Smarty-3.1.15, created on 2015-03-17 10:12:53
         compiled from "application\views\templates\copyright.html" */ ?>
<?php /*%%SmartyHeaderCode:2126954f6b73823bc35-10332463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80a4e78fbe35c34d5a66028c0330508c63153fd4' => 
    array (
      0 => 'application\\views\\templates\\copyright.html',
      1 => 1426583125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2126954f6b73823bc35-10332463',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_54f6b738243c48_17018976',
  'variables' => 
  array (
    'language' => 0,
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f6b738243c48_17018976')) {function content_54f6b738243c48_17018976($_smarty_tpl) {?><div class="clear"></div>
<div class="copyright">

   <div class="wrap"> <?php echo $_smarty_tpl->tpl_vars['language']->value['site_copyright'];?>
 </div>


</div>

<div class="h_box_big">
          
</div>     
<div class="h_main1">
	  <div class="regL"> 
                <ul class="reg">
                    <ol><li class="t"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_reg'];?>
</li></ol>
                    <ol>
                    	<li class="w120"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_name'];?>
</li>
                        <li><input type="text"  name="username" class="i" placeholder="<?php echo $_smarty_tpl->tpl_vars['language']->value['user_name_require'];?>
" onChange="checkUname(this.value)" value="" /><p><?php echo $_smarty_tpl->tpl_vars['language']->value['user_name_err'];?>
</p></li>
                    </ol>
                    <ol>
                    	<li class="w120"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_pass'];?>
</li>
                        <li> <input type="password" name="userpass"  class="i" placeholder="<?php echo $_smarty_tpl->tpl_vars['language']->value['user_pass_require'];?>
"/><p><?php echo $_smarty_tpl->tpl_vars['language']->value['user_pass_err'];?>
</p></li>
                    </ol>
                    <ol>
                    	<li class="w120"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_repass'];?>
</li>
                        <li><input type="password" name="reuserpass"  class="i"><p><?php echo $_smarty_tpl->tpl_vars['language']->value['user_repass_err'];?>
</p></li>
                    </ol>
                    <ol>
                    	<li class="sbtn"><input type="button" value="<?php echo $_smarty_tpl->tpl_vars['language']->value['user_creat'];?>
" class="subBtn"/></li>
                    </ol> 
                 </ul>
                 <ul class="login" style="display:none">
                    <ol><li class="t"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_login'];?>
</li></ol>
                 	<ol>
                    	<li class="w120"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_name'];?>
</li>
                        <li><input type="text" name="username" class="i"/><p><?php echo $_smarty_tpl->tpl_vars['language']->value['user_name_err'];?>
</p></li>
                    </ol>
                    <ol>
                    	<li class="w120"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_pass'];?>
</li>
                        <li> <input type="password" name="userpass" class="i"/><p><?php echo $_smarty_tpl->tpl_vars['language']->value['user_pass_err'];?>
</p></li>
                    </ol>
                  
                    <ol class="s">
                    	<li class="w130"></li><li class="pt5"><input type="checkbox" name="auto"/></li><li> 一周内自动登录</li>
                        <li class="pl120"><a href="javascript:alert('<?php echo $_smarty_tpl->tpl_vars['language']->value['coming'];?>
');"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_forgot'];?>
</a></li>
                    </ol>
                     <ol>
                    	<li class="sbtn"><input type="button" value="<?php echo $_smarty_tpl->tpl_vars['language']->value['btn_sureLogin'];?>
" class="subBtn"/></li>
                    </ol>
                </ul>
                <div class="san">
                	<span>社交账号登录:</span> 
                    <a href="javascript:;" class="qq"></a>
                    <a href="javascript:;" class="sina"></a>
                    <a href="javascript:alert('<?php echo $_smarty_tpl->tpl_vars['language']->value['coming'];?>
');" class="weixin"></a>
                    <div class="fr toLogin"><span>已有账号，</span><a href="javascript:login();">直接登录</a></div>
     				<div class="fr toReg" style="display:none"><span>没有账号，</span><a href="javascript:reg();">马上注册</a></div>
                </div>
            </div>
            
            <div class="regE" style="display:none">
            	 <div class="t">恭喜您，登陆成功</div>
                 <div class="loginEnd">
                 		您现在，可以<br/><br/>
                        
                        <a class="sbtn" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
huabu/add">上传画布</a> <br/><br/>
                        <a class="sbtn" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
project/add">申请创业基金</a> 
                 
                 </div>
            </div>
      <a id="close">X</a>
</div>
<script src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/js/user.js"></script>
<?php }} ?>
