<?php /* Smarty version Smarty-3.1.15, created on 2015-03-17 10:12:33
         compiled from "application\views\templates\user.reglogin.html" */ ?>
<?php /*%%SmartyHeaderCode:201355507d9734c5511-56806726%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2ee9c5d130309f03e909b4b8045d100860d8f33' => 
    array (
      0 => 'application\\views\\templates\\user.reglogin.html',
      1 => 1426583552,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201355507d9734c5511-56806726',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5507d97355ded1_69691628',
  'variables' => 
  array (
    'language' => 0,
    'base_url' => 0,
    'userLogined' => 0,
    'user' => 0,
    'act' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5507d97355ded1_69691628')) {function content_5507d97355ded1_69691628($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<title><?php echo $_smarty_tpl->tpl_vars['language']->value['site_title'];?>
</title>
<?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<script src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/js/user.js"></script>
</head>
<body>
<div class="navB">

    <a href="http://leanone.cn/" class="logo"></a>
    <div class="fl">
        <a href="http://leanone.cn/wp/?page_id=49" target="_blank"><?php echo $_smarty_tpl->tpl_vars['language']->value['nav_1'];?>
</a>
        <a href="http://leanone.cn/wp/" target="_blank"><?php echo $_smarty_tpl->tpl_vars['language']->value['nav_2'];?>
</a>
        <a href="http://leanone.cn/download/"  target="_blank"><?php echo $_smarty_tpl->tpl_vars['language']->value['nav_3'];?>
</a>
        <a href="http://leanone.cn/wp/?page_id=187" target="_blank"><?php echo $_smarty_tpl->tpl_vars['language']->value['nav_4'];?>
</a>
    </div>
    <div class="fr">
        <?php if ($_smarty_tpl->tpl_vars['userLogined']->value) {?>
             <a>欢迎您,<?php echo $_smarty_tpl->tpl_vars['user']->value['NickName'];?>
</a> <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
huabu/my">我的画布</a><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
user/logout"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_logout'];?>
</a>
        <?php } else { ?>
            <a href="javascript:reg();" ><?php echo $_smarty_tpl->tpl_vars['language']->value['user_reg'];?>
</a>
            <a href="javascript:login();"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_login'];?>
</a>
        <?php }?>
    </div>

</div>

   
    <div class="main" >
        <div class="m_left">
           
            <div class="regL"> 
                <ul class="reg"  <?php if ($_smarty_tpl->tpl_vars['act']->value=="login") {?>style="display:none;"<?php }?>>
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
                 <ul class="login"  <?php if ($_smarty_tpl->tpl_vars['act']->value=="reg") {?>style="display:none;"<?php }?>>
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
');;" class="weixin"></a>
                    <div class="fr toLogin"><span>已有账号，</span><a href="javascript:login();">直接登录</a></div>
     				<div class="fr toReg" style="display:none"><span>没有账号，</span><a href="javascript:reg();">马上注册</a></div>
     
                </div>
            </div>
                
                
                
        </div>
        
        <div class="m_right">
            <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/images/erweima_07.jpg" style="margin-top:30px;" />
            <div>扫一扫<br/>
           关注我们</div>
        </div>
        <div class="clear"></div>
      <div class="copyright">
        
        	@2014-2015 LeanOneAcademy，All Right Reserved. 京ICP备14056568号.


        </div>
    
      
    </div>

    

</body>
</html><?php }} ?>
