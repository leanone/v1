<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-24 04:12:06
         compiled from "application\views\templates\header.html" */ ?>
<?php /*%%SmartyHeaderCode:251475510d60671c5f3-71318636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd099af44bad2bb788600ef7c4969574469711cc0' => 
    array (
      0 => 'application\\views\\templates\\header.html',
      1 => 1426758718,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '251475510d60671c5f3-71318636',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'language' => 0,
    'base_url' => 0,
    'userData' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5510d60675f052_85272991',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5510d60675f052_85272991')) {function content_5510d60675f052_85272991($_smarty_tpl) {?><meta http-equiv="Cache-Control" content="no-siteapp">
<meta name="Keywords" content="<?php echo $_smarty_tpl->tpl_vars['language']->value['site_keywords'];?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['language']->value['site_description'];?>
" />
<meta property="qc:admins" content="17013444516765636" />
<meta property="wb:webmaster" content="8864b3609dded637" />


<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/css/reset.css" media="screen" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/css/main.css?v=2015" media="screen" />
<link rel="Bookmark" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/favicon.ico"  type="image/x-icon" /> 
<link rel="Shortcut Icon" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/favicon.ico">


<?php echo '<script'; ?>
 src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
var baseUrl="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
"


var userData=<?php echo $_smarty_tpl->tpl_vars['userData']->value;?>
;
var Uid=userData.Uid
var Cid=userData.CookieID
var Uname=userData.NickName
	

<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/js/comm.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/js/kindeditor-min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
  var _hmt = _hmt || [];
  (function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?453b663606940a9d2afd3e60c225ef1a";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
  })();  
<?php echo '</script'; ?>
><?php }} ?>
