<?php /* Smarty version Smarty-3.1.15, created on 2015-03-17 11:17:23
         compiled from "application\views\templates\info.update.html" */ ?>
<?php /*%%SmartyHeaderCode:43935507d057135e18-03826910%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed53e757ea2ce88791be01c19d385fd303c23e18' => 
    array (
      0 => 'application\\views\\templates\\info.update.html',
      1 => 1426587442,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43935507d057135e18-03826910',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5507d0571742e5_32149265',
  'variables' => 
  array (
    'language' => 0,
    'user' => 0,
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5507d0571742e5_32149265')) {function content_5507d0571742e5_32149265($_smarty_tpl) {?><!DOCTYPE html>
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
                  <div class="box_1 pb20" class="update">
                 
                          <div class="t1"><?php echo $_smarty_tpl->tpl_vars['language']->value['txt_liu'];?>
</div>
                          <ul>
                              <ol>
                                  <li class="w120"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_telName'];?>
<span>*</span></li>
                                  <li><input type="tel" class="i" name="tel" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['Mobile'];?>
"/><p></p></li>
                              </ol>
                              <ol>
                                  <li class="w120"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_email'];?>
<span>*</span></li>
                                  <li><input type="text" class="i" name="email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['Email'];?>
"/><p></p></li>
                              </ol>
                              <ol>
                                  <li class="w120"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_realname'];?>
<span></span></li>
                                  <li><input type="text" class="i" name="realname"  value="<?php echo $_smarty_tpl->tpl_vars['user']->value['RealName'];?>
"/></li>
                              </ol>
                              <ol>
                                  <li class="w120"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_qq'];?>
<span></span></li>
                                  <li><input type="text" class="i" name="qq"  value="<?php echo $_smarty_tpl->tpl_vars['user']->value['QQ'];?>
"/></li>
                              </ol>
                              <ol>
                                  <li class="w120"><?php echo $_smarty_tpl->tpl_vars['language']->value['user_weichat'];?>
<span></span></li>
                                  <li><input type="text" class="i" name="weichat"   value="<?php echo $_smarty_tpl->tpl_vars['user']->value['RealName'];?>
"/></li>
                              </ol>
                          
                             

                           </ul>
                           <p class="clear"></p>
                           <div class="sbtn mt10">
                              
                              <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['language']->value['txt_update'];?>
" class="subBtn"/><br/><br/>
                              <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['language']->value['txt_giveup'];?>
" class="btn"/><br/><br/>
                           </div>
                           <div class="san2">
                			为方便我们联系您，请至少留下联系电话和邮箱哦，亲
     
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


<script>

	$("input[name=tel]").on("change",function(){
		$(this).next("p").html("")
	})
	$("input[name=email]").on("change",function(){
		$(this).next("p").html("")
	})
	

	$(".subBtn").click(function(){
		
		mobile  =$("input[name=tel]").val()
		email   =$("input[name=email]").val()
		realname=$("input[name=realname]").val()
		qq      =$("input[name=qq]").val()
		weichat =$("input[name=weichat]").val()
		isErr=false
		if(!isPhoneOrMobile(mobile)){
			$("input[name=tel]").next("p").html("联系电话格式有误!")	
			isErr=true
		}
		if(!isEmail(email)){
			$("input[name=email]").next("p").html("邮箱格式有误!")	
			isErr=true
		}
		if(isErr){
	
			return;
		}
		$.get(baseUrl+"user/infoUpdateSave",{"mobile":mobile,"email":email,"realname":realname,"qq":qq,"weichat":weichat},function(d){
				 if(d.flag){
					location.href=baseUrl+"huabu/my"
				 }else{
					alert(d.msg)	 
				 }
		},"jsonp")	                      
                           
	})
	
	$(".btn").click(function(){
		location.href=baseUrl+"huabu/my"
	})
	

</script>   

</body>
</html><?php }} ?>
