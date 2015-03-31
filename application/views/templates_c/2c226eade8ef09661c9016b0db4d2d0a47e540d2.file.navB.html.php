<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-26 05:18:56
         compiled from "application\views\templates\navB.html" */ ?>
<?php /*%%SmartyHeaderCode:320885510d606766b33-21829116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c226eade8ef09661c9016b0db4d2d0a47e540d2' => 
    array (
      0 => 'application\\views\\templates\\navB.html',
      1 => 1427341844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '320885510d606766b33-21829116',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5510d6067b76c1_03007500',
  'variables' => 
  array (
    'nav_id' => 0,
    'language' => 0,
    'userLogined' => 0,
    'user' => 0,
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5510d6067b76c1_03007500')) {function content_5510d6067b76c1_03007500($_smarty_tpl) {?><div class="navB">

    <a href="http://leanone.cn/" class="logo"></a>
    <div class="fl">
        <a href="http://leanone.cn/wp/?page_id=49" target="_blank" <?php if ($_smarty_tpl->tpl_vars['nav_id']->value==1) {?> class="on"<?php }?>><?php echo $_smarty_tpl->tpl_vars['language']->value['nav_1'];?>
</a>
        <a href="http://leanone.cn/wp/" target="_blank"  <?php if ($_smarty_tpl->tpl_vars['nav_id']->value==2) {?> class="on"<?php }?>><?php echo $_smarty_tpl->tpl_vars['language']->value['nav_2'];?>
</a>
        <a href="http://leanone.cn/huabu/lists"  target="_blank"  <?php if ($_smarty_tpl->tpl_vars['nav_id']->value==3) {?> class="on"<?php }?>><?php echo $_smarty_tpl->tpl_vars['language']->value['nav_3'];?>
</a>
        <a href="http://leanone.cn/wp/?page_id=187" target="_blank"  <?php if ($_smarty_tpl->tpl_vars['nav_id']->value==4) {?> class="on"<?php }?>><?php echo $_smarty_tpl->tpl_vars['language']->value['nav_4'];?>
</a>
    </div>
    <div class="fr <?php if ($_smarty_tpl->tpl_vars['userLogined']->value) {?>logined<?php }?>">
    	<?php if ($_smarty_tpl->tpl_vars['userLogined']->value) {?>
       		 <a>欢迎您,<?php echo $_smarty_tpl->tpl_vars['user']->value['NickName'];?>
</a> 
             <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
huabu/my" <?php if ($_smarty_tpl->tpl_vars['nav_id']->value==5) {?> class="on"<?php }?>><?php if ($_smarty_tpl->tpl_vars['user']->value['hasHuabu']) {?>我的画布<?php } else { ?>创建画布<?php }?></a> 
             <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
user/infoUpdate" <?php if ($_smarty_tpl->tpl_vars['nav_id']->value==6) {?> class="on"<?php }?>>更新资料</a> 
             <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
user/logout">退出登陆</a>
        <?php } else { ?>
        	<a href="javascript:reg();" >注册</a>
        	<a href="javascript:login();">登录</a>
        <?php }?>
    </div>
	
</div><?php }} ?>
