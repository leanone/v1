<?php /* Smarty version Smarty-3.1.15, created on 2015-03-18 07:12:44
         compiled from "application\views\templates\header.html" */ ?>
<?php /*%%SmartyHeaderCode:1612754f6b73820baf6-66798259%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a5f9deec3798ea8a3fbea023432833d979ddf6d' => 
    array (
      0 => 'application\\views\\templates\\header.html',
      1 => 1426659008,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1612754f6b73820baf6-66798259',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_54f6b73821dd19_74326319',
  'variables' => 
  array (
    'language' => 0,
    'base_url' => 0,
    'cid' => 0,
    'uid' => 0,
    'uname' => 0,
    'userData' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f6b73821dd19_74326319')) {function content_54f6b73821dd19_74326319($_smarty_tpl) {?><meta http-equiv="Cache-Control" content="no-siteapp">
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


<script src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
<script>
var baseUrl="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
"

var Cid="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
"
var Uid="<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
"
var Uname="<?php echo $_smarty_tpl->tpl_vars['uname']->value;?>
"
//用户资料
var user=<?php echo $_smarty_tpl->tpl_vars['userData']->value;?>
;

</script>
<script src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/js/comm.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/js/kindeditor-min.js"></script>
<script>
  var _hmt = _hmt || [];
  (function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?453b663606940a9d2afd3e60c225ef1a";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
  })();  
</script><?php }} ?>
