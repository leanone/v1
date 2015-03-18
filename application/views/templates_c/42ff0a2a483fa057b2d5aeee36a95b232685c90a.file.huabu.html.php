<?php /* Smarty version Smarty-3.1.15, created on 2015-03-17 03:59:29
         compiled from "application\views\templates\huabu.html" */ ?>
<?php /*%%SmartyHeaderCode:2490354f6c1df288455-18626401%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42ff0a2a483fa057b2d5aeee36a95b232685c90a' => 
    array (
      0 => 'application\\views\\templates\\huabu.html',
      1 => 1426495280,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2490354f6c1df288455-18626401',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_54f6c1df2b32e2_22073012',
  'variables' => 
  array (
    'language' => 0,
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f6c1df2b32e2_22073012')) {function content_54f6c1df2b32e2_22073012($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<title><?php echo $_smarty_tpl->tpl_vars['language']->value['site_title'];?>
</title>
<?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate ("navB.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="h_main">

	<h1>好点子画布</h1>
	
    <div class="h_nav">
    	
        <div class="tt">
        	好点子画布是一个高效的工具，帮你梳理你的创业想法，赶快去完善你的画布呗<br/>
			查看参考：
            <a href="http://leanone.cn/huabu/show/ceea167a5a36dedd.html" target="_blank">范例一</a>、
            <a href="http://leanone.cn/huabu/show/8e8850243be8079a.html" target="_blank">范例二</a>、
            <a href="http://leanone.cn/huabu/show/e0327ad868d138f2.html" target="_blank">范例三</a>
		</div>
       
    
    </div>
   
	<form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
huabu/addSave"  method="post" id="myFrom">
    <div  class="hSubject">
    	<span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_title'];?>
：</span>
        <input type="text" name="h_subject" maxlength="32"/>
        <div class="errMsg"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_title_err'];?>
</div>
    </div>
    <div class="clear"></div>
    <div class="h_box">
    	<div class="h_img"></div>
        <div class="h_img1"></div>
        <div class="h_img2"></div>
        <div class="h_img3"></div>
        <div class="h_img4"></div>
     	
    
          <div class="lit h_one fl">
              <h5><span>1</span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step1'];?>
</h5>
              <div >
                  <textarea name="h_one" cols=49 rows=10  placeholder="<?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step1_require'];?>
"></textarea>
              </div>
              
              <div class="h_p1q">
                  <p><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step1_txt1'];?>
<input type="text" name="h_one_text"  /><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step1_txt2'];?>
</p>
              </div>
          </div>
          
         
          <div class="lit h_two fl">
              <h5><span>2</span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step2'];?>
</h5>
              <textarea name="h_two" cols=47 rows=13   placeholder="<?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step2_require'];?>
"></textarea>
          
          </div>
 		  <div class="clear h55"></div>
      
          <div class="lit h_four fl">
              <h5><span>4</span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step4'];?>
</h5>
     		 <textarea name="h_four" cols=49 rows=13  placeholder="<?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step4_require'];?>
"></textarea>
            
   
          </div>
          
      
          <div class="lit h_three fl">
              <h5><span>3</span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step3'];?>
</h5>
              <div>
                <textarea name="h_three_one"  rows=7  class="h_tewen" placeholder="<?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step3_txt1'];?>
"></textarea>
              </div>
              <div>
                <textarea name="h_three_two"  rows=7  class="h_tewen" placeholder="<?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step3_txt2'];?>
"></textarea>
              </div>
          
          </div>
          
          
          <div class="clear h85"></div>
           <div class="lit h_five fl">
              <h5><span>5</span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step5'];?>
</h5>
              <a href="http://leanone.cn/guquan/" target="_blank" class="gqtz"><?php echo $_smarty_tpl->tpl_vars['language']->value['txt_guquan'];?>
</a>
              <div  class="h_m_box">
         
                  <table  border="0" cellpadding="1" cellspacing="1">
                        <tr>
                          <td width="142" class="bg1"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step5_txt1'];?>
</td>
                          <td width="62"  ><select  name="h_five_one"><option value="1">是</option><option value="0">否</option></select></td>
                          <td width="75"  class="bg1"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step5_txt2'];?>
</td>
                          <td width="68"><input type="text"  name="h_five_two" class="i1"/></td>
                        </tr>
                        <tr>
                          <td class="bg1"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step5_txt3'];?>
</td>
                          <td colspan="3"><input type="text" name='h_five_three'  class="i2"/></td>
                        </tr>
                        <tr>
                          <td  class="bg1"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step5_txt4'];?>
</td>
                          <td colspan="3"><input type="text"  name="h_five_four"  class="i2"/></td>
                        </tr>
                        <tr>
                          <td colspan="4">
                            <textarea name="h_five_five"  rows=8  placeholder="<?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step5_require'];?>
"></textarea>
                          </td>
                        </tr>
                   </table>
             </div>
              

          </div>
          
        
          <div class="lit h_six fl">
              <h5><span>6</span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step6'];?>
</h5>
              <div class="h_6box">
                  <table  border="0" cellpadding="0" cellspacing="1">
                        <tr>
                          <td width="11%" class="bg1"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step6_txt3'];?>
</td>
                          <td width="89%" ><textarea name="h_six_one" rows=8   placeholder="<?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step6_txt1'];?>
"></textarea></td>
                        </tr>
                        <tr>
                          <td height="145" class="bg1"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step6_txt4'];?>
</td>
                          <td height="145" valign="top"><textarea  name="h_six_two" rows=15 placeholder="<?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step6_txt2'];?>
"></textarea></td>
                        </tr>
                   </table>
              </div>
          
          </div>
            
 		
    

    <div class="clear h55"></div>
	
    
    
    <div class="sbtn"><input type="button" value="保存画布" id="h_btn" /></div>
  
    </div>
     </form>
</div>


<?php echo $_smarty_tpl->getSubTemplate ("copyright.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<script>

	
	$('.lit').each(function(i){
		$(this).on("focusout",function(){
			
			var index=i;
			if(index==0){
				//alert($("textarea[name=h_one]").val())
				//alert($("input[name=h_one_text]").val())
			}
			if(index==1){
				//alert($("textarea[name=h_two]").val())
			}

            $('.lit span').eq(index).css({background:'#4bc86a'});
			if(index===2){
                index=3;
            }else if(index===3){
                index=2;
            }
			$('.h_nav li span').eq(index).css({background:'#4bc86a'});
			//$('.h_nav li span').eq(index).css({color:'#4bc86a'});
		})
		
	})
	
	$("#h_btn").click(function(){
	
		if($("input[name=h_subject]").val()==""){
			$("input[name=h_subject]").addClass("err").focus()
			$(".errMsg").show()
			$(document).scrollTop(0)
			setTimeout(function(){
				$(".errMsg").fadeOut();
			},3000)
		}else{
			$("#myFrom").submit()
		}

	})
	
	$("input[name=h_subject]").on("change",function(){
		if($(this).val()!=""){
			$(this).removeClass("err")
			$(".errMsg").fadeOut();
		}	
	})
	
 


</script>

</body>
</html><?php }} ?>
