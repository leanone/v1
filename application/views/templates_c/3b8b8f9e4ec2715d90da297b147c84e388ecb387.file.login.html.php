<?php /* Smarty version Smarty-3.1.15, created on 2015-03-17 08:22:46
         compiled from "application\views\templates\test\login.html" */ ?>
<?php /*%%SmartyHeaderCode:309625507d6464470a0-61798760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b8b8f9e4ec2715d90da297b147c84e388ecb387' => 
    array (
      0 => 'application\\views\\templates\\test\\login.html',
      1 => 1425263687,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '309625507d6464470a0-61798760',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_url' => 0,
    'uid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5507d64646a593_06635840',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5507d64646a593_06635840')) {function content_5507d64646a593_06635840($_smarty_tpl) {?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<script src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
<script>
var baseUrl="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
",Uid="<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
"
</script>
<script src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/js/comm.js"></script>

</head>

<body>


邮箱<input type="text" name="username" value="" >
<br>
密码<input type="text" name="password" value="" >

<br>
<a href="javascript:;" class="btn">登陆</a>

 
<script>
Cid=getCid()  //cookie用户ID

var data={}

$(".btn").click(function(){
	data.cid=Cid
	data.username=$("input[name=username]").val()
	data.password=$("input[name=password]").val()

 
  	
	if(data.username=="" || data.password=="" || data.repassowrd==""){
		alert("请填写全部信息哦，亲~")
		return;
	}
	
	
	
	//电话监测

	$.get(baseUrl+"user/regSave",data,function(d){
		alert(d.flag)
	},"json")
})




</script>
 
</body>
</html>
<?php }} ?>
