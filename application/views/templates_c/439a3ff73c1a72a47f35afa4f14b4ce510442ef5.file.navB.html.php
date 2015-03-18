<?php /* Smarty version Smarty-3.1.15, created on 2015-03-17 11:16:45
         compiled from "application\views\templates\navB.html" */ ?>
<?php /*%%SmartyHeaderCode:1351654f6b7382249f4-26499920%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '439a3ff73c1a72a47f35afa4f14b4ce510442ef5' => 
    array (
      0 => 'application\\views\\templates\\navB.html',
      1 => 1426587399,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1351654f6b7382249f4-26499920',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_54f6b738232a39_30715326',
  'variables' => 
  array (
    'userLogined' => 0,
    'user' => 0,
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f6b738232a39_30715326')) {function content_54f6b738232a39_30715326($_smarty_tpl) {?><div class="navB">

    <a href="http://leanone.cn/" class="logo"></a>
    <div class="fl">
        <a href="http://leanone.cn/wp/?page_id=49" target="_blank">关于学社</a>
        <a href="http://leanone.cn/wp/" target="_blank">精益学习</a>
        <a href="http://leanone.cn/download/"  target="_blank">画布下载</a>
        <a href="http://leanone.cn/wp/?page_id=187" target="_blank">精益创想计划</a>
    </div>
    <div class="fr <?php if ($_smarty_tpl->tpl_vars['userLogined']->value) {?>logined<?php }?>">
    	<?php if ($_smarty_tpl->tpl_vars['userLogined']->value) {?>
       		 <a>欢迎您,<?php echo $_smarty_tpl->tpl_vars['user']->value['NickName'];?>
</a> <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
huabu/my">我的画布</a> <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
user/infoUpdate">更新资料</a> <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
user/logout">退出登陆</a>
        <?php } else { ?>
        	<a href="javascript:reg();" >注册</a>
        	<a href="javascript:login();">登录</a>
        <?php }?>
    </div>
	
</div><?php }} ?>
