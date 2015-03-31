<?php /* Smarty version Smarty-3.1.15, created on 2015-03-20 05:05:21
         compiled from "application\views\templates\indexNew.html" */ ?>
<?php /*%%SmartyHeaderCode:2345954f6c09ee63603-69618603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e13ebc41d3f45ce3b29e9c868b86d39924fcb52' => 
    array (
      0 => 'application\\views\\templates\\indexNew.html',
      1 => 1426822745,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2345954f6c09ee63603-69618603',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_54f6c09eef97b7_46994817',
  'variables' => 
  array (
    'language' => 0,
    'base_url' => 0,
    'userData' => 0,
    'userLogined' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f6c09eef97b7_46994817')) {function content_54f6c09eef97b7_46994817($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<title><?php echo $_smarty_tpl->tpl_vars['language']->value['site_title'];?>
</title>
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta name="Keywords" content="<?php echo $_smarty_tpl->tpl_vars['language']->value['site_keywords'];?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['language']->value['site_description'];?>
" />
<meta property="qc:admins" content="17013444516765636" />
<meta property="wb:webmaster" content="8864b3609dded637" />

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/css/index.css?v=2015" media="screen" />
<link rel="Bookmark" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/favicon.ico"  type="image/x-icon" /> 
<link rel="Shortcut Icon" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/favicon.ico">

<script src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
<script>
var baseUrl="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
"
var userData=<?php echo $_smarty_tpl->tpl_vars['userData']->value;?>
;
var Uid=userData.Uid
var Cid=userData.CookieID
var Uname=userData.NickName
</script>
<script src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/js/comm.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/js/user.js?v=20150320"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/js/index1.js"></script>

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
<div class="iBox">
<div class="pr">
    <div class="kvBox">
        <ul id="kv">
            <li class="kv kv0"><a id="btn_kv" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
huabu/add" target="_blank"> </a></li>
         
        </ul>
        
       <div class="nav">
    
            <span>WeChat:LeanOneAcademy</span>
            <div class="fl">
                <a href="http://leanone.cn/wp/?page_id=49"  target="_blank"><?php echo $_smarty_tpl->tpl_vars['language']->value['nav_1'];?>
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
huabu/my"><?php echo $_smarty_tpl->tpl_vars['language']->value['nav_my'];?>
</a><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
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
         
        
    </div>
    <div class="main" >
        <div class="m_left">
        	<div class="djBox">
                <ul class="m_nav">
                    <li class="on">方式一丶在线报名</li>
                    <li>方式二丶微信报名</li>
                </ul>
                
                <div class="box">
                    <div class="box_1 pb70" >
                            <div class="t1"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_step1'];?>
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
                                
                                <input type="button" value="提交" class="subBtn"/>
                             </div>
                            
                         
                    </div>
                    
                    <div class="box_2" style="display:none;">
                            <p>Step1. 扫描右方订阅号,关注精一学社<br/ >
                               Step2. 点击报名孵化参与报名</p>
                               <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/images/pc_10.jpg" style=" float:right;" />
                            <p class="clear"></p>
                    </div>
                </div>
             </div>   
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
                 <ul class="login">
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

    
</div>
</div>
</body>
</html><?php }} ?>
