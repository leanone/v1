<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-26 10:35:37
         compiled from "application\views\templates\huabu.my.html" */ ?>
<?php /*%%SmartyHeaderCode:256715513d2e9b27360-69521596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c985361353097a7c2a98edf999b5e36e9b0dd6d' => 
    array (
      0 => 'application\\views\\templates\\huabu.my.html',
      1 => 1427362516,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '256715513d2e9b27360-69521596',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'language' => 0,
    'base_url' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5513d2e9c1fe16_37855424',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5513d2e9c1fe16_37855424')) {function content_5513d2e9c1fe16_37855424($_smarty_tpl) {?><!DOCTYPE html>
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
	<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
project/my/<?php echo $_smarty_tpl->tpl_vars['data']->value['mID'];?>
" class="btnAplay" >申请创业基金</a>
	<h1>我的好点子画布</h1>
	
    <div class="h_nav">
    <!--
    	<ul class="t">
        	<li <?php if ($_smarty_tpl->tpl_vars['data']->value['h_one']&&$_smarty_tpl->tpl_vars['data']->value['h_one_text']) {?>class="on"<?php }?>><span>1</span><p>痛点的场景描述<br/>+痛苦程度</p></li>
            <li <?php if ($_smarty_tpl->tpl_vars['data']->value['h_two']) {?>class="on"<?php }?>><span>2</span><p>这个痛点和你<br />有什么联系？</p></li>
            <li <?php if ($_smarty_tpl->tpl_vars['data']->value['h_three_one']&&$_smarty_tpl->tpl_vars['data']->value['h_three_two']) {?>class="on"<?php }?>><span>3</span><p>用户细分<br />+市场规模估算</p></li>
            <li <?php if ($_smarty_tpl->tpl_vars['data']->value['h_four']) {?>class="on"<?php }?>><span>4</span><p>产品独特定位</p></li>
            <li <?php if ($_smarty_tpl->tpl_vars['data']->value['h_five_one']&&$_smarty_tpl->tpl_vars['data']->value['h_five_two']&&$_smarty_tpl->tpl_vars['data']->value['h_five_three']&&$_smarty_tpl->tpl_vars['data']->value['h_five_four']&&$_smarty_tpl->tpl_vars['data']->value['h_five_five']) {?>class="on"<?php }?>><span>5</span><p>你的团队</p></li>
            <li  <?php if ($_smarty_tpl->tpl_vars['data']->value['h_six_one']&&$_smarty_tpl->tpl_vars['data']->value['h_six_two']) {?>class="on end"<?php } else { ?> class="end"<?php }?>><span>6</span><p>如何垄断<br/>或建立门槛</p></li>
        </ul>
        <div class="l"></div>
    -->
    	 <div class="tt">
        	好点子画布是一个高效的工具，帮你梳理你的创业想法，赶快去完善你的画布呗<br/>
			查看参考：
            <a href="http://leanone.cn/huabu/show/ceea167a5a36dedd.html" target="_blank">范例一</a>、
            <a href="http://leanone.cn/huabu/show/8e8850243be8079a.html" target="_blank">范例二</a>、
            <a href="http://leanone.cn/huabu/show/e0327ad868d138f2.html" target="_blank">范例三</a>
		</div>
    </div>
    
    
    <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
huabu/modSave"  method="post">
    <div class="hSubject">
    	<span>项目名称：</span>
        <input type="text" name="h_subject" maxlength="32" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['Subject'];?>
">
        <div class="errMsg">项目名称不能为空！</div>
    </div>
    <div class="clear"></div>

    
    <div class="pr pb50">
    	<div class="h_img"></div>
        <div class="h_img1"></div>
        <div class="h_img2"></div>
        <div class="h_img3"></div>
        <div class="h_img4"></div>
     	
        <div class="pl75">
    	  <input type="hidden" name="mID" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['mID'];?>
">
          <div class="lit h_one fl">
              <h5 <?php if ($_smarty_tpl->tpl_vars['data']->value['h_one']&&$_smarty_tpl->tpl_vars['data']->value['h_one_text']) {?>class="on"<?php }?>><span>1</span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step1'];?>
</h5>
              <div >
                  <textarea name="h_one" cols=49 rows=10 ><?php echo $_smarty_tpl->tpl_vars['data']->value['h_one'];?>
</textarea>
              </div>
              
              <div class="h_p1q">
                  <p><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step1_txt1'];?>
<input type="text" name="h_one_text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['h_one_text'];?>
" /> <?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step1_txt2'];?>
</p>
              </div>
          </div>
          
         
          <div class="lit h_two fl">
              <h5 <?php if ($_smarty_tpl->tpl_vars['data']->value['h_two']) {?>class="on"<?php }?>><span>2</span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step2'];?>
</h5>
              <textarea name="h_two" cols=47 rows=13 ><?php echo $_smarty_tpl->tpl_vars['data']->value['h_two'];?>
</textarea>
          
          </div>
 		  <div class="clear h55"></div>
      
          <div class="lit h_four fl">
              <h5 <?php if ($_smarty_tpl->tpl_vars['data']->value['h_four']) {?>class="on"<?php }?>><span>4</span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step4'];?>
</h5>
     		 <textarea name="h_four" cols=49 rows=13 ><?php echo $_smarty_tpl->tpl_vars['data']->value['h_four'];?>
</textarea>
            
   
          </div>
          
      
          <div class="lit h_three fl">
              <h5 <?php if ($_smarty_tpl->tpl_vars['data']->value['h_three_one']&&$_smarty_tpl->tpl_vars['data']->value['h_three_two']) {?>class="on"<?php }?>><span>3</span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step3'];?>
</h5>
              <div>
              
                <textarea name="h_three_one"  rows=7  class="h_tewen"><?php echo $_smarty_tpl->tpl_vars['data']->value['h_three_one'];?>
</textarea>


              </div>
              <div>
              
                <textarea name="h_three_two"  rows=7  class="h_tewen" ><?php echo $_smarty_tpl->tpl_vars['data']->value['h_three_two'];?>
</textarea>


              </div>
          
          </div>
          
          
          <div class="clear h85"></div>
          
         
          <div class="lit h_five fl">
              <h5 <?php if ($_smarty_tpl->tpl_vars['data']->value['h_five_one']&&$_smarty_tpl->tpl_vars['data']->value['h_five_two']&&$_smarty_tpl->tpl_vars['data']->value['h_five_three']&&$_smarty_tpl->tpl_vars['data']->value['h_five_four']&&$_smarty_tpl->tpl_vars['data']->value['h_five_five']) {?>class="on"<?php }?>><span>5</span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step5'];?>
</h5>
              <a href="http://leanone.cn/guquan/" target="_blank" class="gqtz"><?php echo $_smarty_tpl->tpl_vars['language']->value['txt_guquan'];?>
</a>
              <div  class="h_m_box">
         
                  <table  border="0" cellpadding="1" cellspacing="1">
                        <tr>
                          <td width="142" class="bg1"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step5_txt1'];?>
</td>
                          <td width="62"  >
                          <select  name="h_five_one">
                          <option value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['h_five_one']=='1') {?> selected<?php }?>>是</option>
                          <option value="0" <?php if ($_smarty_tpl->tpl_vars['data']->value['h_five_one']=='0') {?> selected<?php }?>>否</option>
                          </select></td>
                          <td width="85"  class="bg1"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step5_txt2'];?>
</td>
                          <td width="58"><input type="text"  name="h_five_two" class="i1" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['h_five_two'];?>
"/></td>
                        </tr>
                        <tr>
                          <td class="bg1"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step5_txt3'];?>
</td>
                          <td colspan="3"><input type="text" name='h_five_three'  class="i2" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['h_five_three'];?>
"/></td>
                        </tr>
                        <tr>
                          <td  class="bg1"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step5_txt4'];?>
</td>
                          <td colspan="3"><input type="text"  name="h_five_four"  class="i2" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['h_five_four'];?>
"/></td>
                        </tr>
                        <tr>
                          <td colspan="4">
                            <textarea name="h_five_five"  rows=8><?php echo $_smarty_tpl->tpl_vars['data']->value['h_five_five'];?>
</textarea>
                          </td>
                        </tr>
                   </table>
             </div>
              

          </div>
          
        
          <div class="lit h_six fl">
              <h5 <?php if ($_smarty_tpl->tpl_vars['data']->value['h_six_one']&&$_smarty_tpl->tpl_vars['data']->value['h_six_two']) {?>class="on"<?php }?>><span>6</span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step6'];?>
</h5>
              <div class="h_6box">
                  <table  border="0" cellpadding="0" cellspacing="1">
                        <tr>
                          <td width="11%" class="bg1"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step6_txt3'];?>
</td>
                          <td width="89%" ><textarea name="h_six_one" rows=8 ><?php echo $_smarty_tpl->tpl_vars['data']->value['h_six_one'];?>
</textarea></td>
                        </tr>
                        <tr>
                          <td height="145" class="bg1"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step6_txt4'];?>
</td>
                          <td height="145" valign="top"><textarea  name="h_six_two" rows=15 ><?php echo $_smarty_tpl->tpl_vars['data']->value['h_six_two'];?>
</textarea></td>
                        </tr>
                   </table>
              </div>
          
          </div>
            
 		</div>
    
    
	<div class="clear h55"></div>
	
    <div class="tac">
    	<input type="submit" value="更新画布" id="h_btn" class="ibtn" />&nbsp;&nbsp;&nbsp;&nbsp;
    	<input type="button" value="设置分享" id="s_btn" class="ibtn" />&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" value="预览画布" id="btn_share" class="ibtn" />
    </div>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/themes/default/default.css" />
    <?php echo '<script'; ?>
 charset="utf-8" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/js/kindeditor-min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 charset="utf-8" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/js/lang/zh_CN.js"><?php echo '</script'; ?>
>
    <div class="shareItem" style="display:none">
    	
    	<div class="fl w400 mr20">
        	<span>分享图片：</span>
          <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['sharePic'];?>
" width="400" height="360" alt="" id="sharePic"/>
            <div id="insertfile"> <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/images/pic.gif" width="14" height="14" alt=""/>请选择你要上传的图片，尺寸400X360像素</div>
      
          	<!--  <input type="file" />-->
        </div>
        <div class="fl">
        	<span>分享文案：</span>
        	<textarea name="shareWord" cols=49 rows=13 ><?php echo $_smarty_tpl->tpl_vars['data']->value['shareWord'];?>
</textarea>
            <div style=" padding-top:10px;"><b>是否公开：</b>
            <input type="radio" value="1" name="isPublic" <?php if ($_smarty_tpl->tpl_vars['data']->value['isPublic']=='1') {?>checked<?php }?>>&nbsp;是&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" value="0" name="isPublic" <?php if ($_smarty_tpl->tpl_vars['data']->value['isPublic']=='0') {?>checked<?php }?>>&nbsp;否</div>
           
        </div>
        <div class="clear h25"></div>
        <div class="tac" style=" padding-right:60px;">
        	<input type="hidden"  name="sharePic" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['sharePic'];?>
"/>
            <input type="submit" value="保存设置" id="h_btn" class="ibtn" />
           
        </div>
    </div>
    <div class="clear h55"></div>
	<?php echo '<script'; ?>
>

			KindEditor.ready(function(K) {
				var editor = K.editor({
					allowFileManager : true
				});
				K('#insertfile').click(function() {
					editor.loadPlugin('insertfile', function() {
						editor.plugin.fileDialog({
							fileUrl : K('#url').val(),
							fileType: "image",
							fileUid: Uid,
							imgWidth:400,
							imgHeight:360,
							clickFn : function(url, title) {
								$("#sharePic").attr("src",url)
								K('input[name=sharePic]').val(url);
								editor.hideDialog();
							}
						});
					});
				});
			});
	<?php echo '</script'; ?>
>


    
    </div>
    
    </form> 
</div>

<?php echo $_smarty_tpl->getSubTemplate ("copyright.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
   


<?php echo '<script'; ?>
>
	$("#s_btn").click(function(){
		$(".shareItem").show()
		
	})
	
	

	$("#btn_share").click(function(){
		v=location.href
		v=v.replace("edit","show")
	
		window.open(v)
	})
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
	/*
	    textarea  h_one
    input h_one_text    
 textarea   h_two   
textarea  h_four      
  textarea h_three_one  
textarea  h_three_two   
input h_five_one    
input h_five_two  
input h_five_three  
input h_five_four
input h_five_five
textarea h_six
textarea h_six_one
	
	*/
           
          
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
	
$(document).scroll(function(){
	$(".btnAplay").animate({"top":$(document).scrollTop()+200},200)	
})
	


if(Uid=="0"){
	reg()
}

<?php echo '</script'; ?>
>

</body>
</html><?php }} ?>
