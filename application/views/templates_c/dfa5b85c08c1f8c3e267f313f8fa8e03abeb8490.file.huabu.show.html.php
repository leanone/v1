<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-26 10:38:27
         compiled from "application\views\templates\mobile\huabu.show.html" */ ?>
<?php /*%%SmartyHeaderCode:103605513b6af0d5503-50487567%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfa5b85c08c1f8c3e267f313f8fa8e03abeb8490' => 
    array (
      0 => 'application\\views\\templates\\mobile\\huabu.show.html',
      1 => 1427362621,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103605513b6af0d5503-50487567',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5513b6af1467a7_90653970',
  'variables' => 
  array (
    'base_url' => 0,
    'data' => 0,
    'language' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5513b6af1467a7_90653970')) {function content_5513b6af1467a7_90653970($_smarty_tpl) {?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>好点子画布</title>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/js/jquery.min.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/css/mobile.css">
<?php echo '<script'; ?>
>

var phoneWidth = parseInt(window.screen.width);
var phoneHeight = parseInt(window.screen.height);
var phoneScale = phoneWidth/640;

var ua = navigator.userAgent;
if (/Android (\d+\.\d+)/.test(ua)){
	var version = parseFloat(RegExp.$1);
	// andriod 2.3
	if(version>2.3){
		document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">');
	// andriod 2.3以上
	}else{
		document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
	}
	// 其他系统
} else {
	document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
}

<?php echo '</script'; ?>
>
</head>

<body>

    <div class="heard">
        <p class="tac"><?php if ($_smarty_tpl->tpl_vars['data']->value['Subject']) {
echo $_smarty_tpl->tpl_vars['data']->value['Subject'];
} else { ?>好点子画布<?php }?></p>
    </div>

    <div class="wrap">
    
        <div class="z_top">
             <span>1</span><p><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step1'];?>
</p>
        </div>
        <div class="z_one">
            <?php echo $_smarty_tpl->tpl_vars['data']->value['h_one'];?>

        </div>
        <div class="z_msg"> 
           <span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step1_txt1'];?>
</span><?php echo $_smarty_tpl->tpl_vars['data']->value['h_one_text'];?>

           <span class="t">(<?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step1_txt2'];?>
)</span>
        </div>
    </div>
    
    <div class="wrap">
    
        <div class="z_top">
            <span>2</span><p><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step2'];?>
</p>
        
        </div>
        <div class="z_one">
             <?php echo $_smarty_tpl->tpl_vars['data']->value['h_two'];?>

        </div>
               
    </div>
    
    
    
    <div class="wrap">
    
        <div class="z_top">
            <span>3</span><p><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step3'];?>
</p>
        </div>
        <div class="z_two z_two1">
             <p><?php echo $_smarty_tpl->tpl_vars['data']->value['h_three_one'];?>
</p>
        </div>
        <div class="z_two z_two2" >
             <p><?php echo $_smarty_tpl->tpl_vars['data']->value['h_three_two'];?>
</p>
        </div>
                 
    </div>
    
    
    <div class="wrap">
    
        <div class="z_top">
             <span>4</span><p><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step4'];?>
</p>
        </div>

        <div class="z_one">
             <?php echo $_smarty_tpl->tpl_vars['data']->value['h_four'];?>

        </div>
               
               
    </div>
    
    
    <div class="wrap">
        <div class="z_top">
           <span>5</span> <p><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step5'];?>
</p>
        </div>
            
        <div class="z_four">
              <ul>
                <li class="tar"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step5_txt1'];?>
</li>
                <li><?php if ($_smarty_tpl->tpl_vars['data']->value['h_five_one']=='0') {?>否<?php } else { ?>是<?php }?></li>
              </ul>
              <ul>
                <li  class="tar"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step5_txt2'];?>
</li>
                <li><?php echo $_smarty_tpl->tpl_vars['data']->value['h_five_two'];?>
</li>
              </ul>
       
            <ul>
                <li class="tar"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step5_txt3'];?>
</li>
                <li><?php echo $_smarty_tpl->tpl_vars['data']->value['h_five_three'];?>
</li>
              </ul>
       
             <ul>
                <li class="tar"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step5_txt4'];?>
</li>
                <li><?php echo $_smarty_tpl->tpl_vars['data']->value['h_five_four'];?>
</li>
              </ul>
        </div>
        <div class="z_four2 "><?php echo $_smarty_tpl->tpl_vars['data']->value['h_five_five'];?>
</div>
                
                
               
    </div>
    
    <div class="wrap">
        <div class="z_top">
           <span>6</span> <p><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step6'];?>
</p>
        </div>
        
        <div class="z_m5">
            <p><span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step6_txt3'];?>
</span><b><?php echo $_smarty_tpl->tpl_vars['data']->value['h_six_one'];?>
</b></p>
        </div>
         <div class="z_m5 z_m51">
            <p><span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step6_txt4'];?>
</span><b><?php echo $_smarty_tpl->tpl_vars['data']->value['h_six_two'];?>
</b></p>
        </div>
                
               
    </div>

    <div class="h50"></div>
   
       

</body>



</html>
<?php }} ?>
