<?php /* Smarty version Smarty-3.1.15, created on 2015-03-18 07:13:24
         compiled from "application\views\templates\huabu.show.html" */ ?>
<?php /*%%SmartyHeaderCode:296154f6cb186f1dd2-65662827%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f3a4481239c970e01463b464d32209d7909e6a6' => 
    array (
      0 => 'application\\views\\templates\\huabu.show.html',
      1 => 1426659203,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '296154f6cb186f1dd2-65662827',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_54f6cb1876d8c8_31097147',
  'variables' => 
  array (
    'data' => 0,
    'language' => 0,
    'base_url' => 0,
    'pinglunNum' => 0,
    'user' => 0,
    'pinglunList' => 0,
    'pinglun' => 0,
    'uid' => 0,
    'pinglunChild' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f6cb1876d8c8_31097147')) {function content_54f6cb1876d8c8_31097147($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<title><?php echo $_smarty_tpl->tpl_vars['data']->value['shareWord'];?>
</title>
<?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</head>
<body>

<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['sharePic'];?>
" width="400" height="360" alt="" id="sharePic"  style="display:none"/>

<?php echo $_smarty_tpl->getSubTemplate ("navB.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="h_main">

	<h1><?php if ($_smarty_tpl->tpl_vars['data']->value['Subject']) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['Subject'];?>
<?php } else { ?>好点子画布<?php }?></h1>
	

    <div class="clear"></div>
<div style=" float:left; margin-left:400px; padding:20px 0 50px 0;">
<div class="bshare-custom icon-medium-plus">
<a title="分享到QQ空间" class="bshare-qzone"></a>
<a title="分享到新浪微博" class="bshare-sinaminiblog"></a>
<!--
<a title="分享到人人网" class="bshare-renren"></a>
<a title="分享到腾讯微博" class="bshare-qqmb"></a>
<a title="分享到朋友网" class="bshare-qqxiaoyou"></a>
<a title="分享到豆瓣网" class="bshare-douban"></a>
-->
<a title="分享到微信" class="bshare-weixin"></a>
<a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a></div><script src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=2c9fb966-ed24-4cd7-aba5-55671695e3b4&amp;pophcol=1&amp;lang=zh" type="text/javascript" charset="utf-8"></script><script src="http://static.bshare.cn/b/bshareC0.js" type="text/javascript" charset="utf-8"></script> 


	
</div>	
       <div class="clear"></div> 
    <div class="h_box">
    	<div class="h_img"></div>
        <div class="h_img1"></div>
        <div class="h_img2"></div>
        <div class="h_img3"></div>
        <div class="h_img4"></div>
     
   		 <a name="step1"></a>
          <div class="lit h_one fl">
              <h5 class="on"><span>1</span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step1'];?>
</h5>
              <div class="textarea">
                  <?php echo $_smarty_tpl->tpl_vars['data']->value['h_one'];?>

              </div>
              
              <div class="h_p1q">
                 <?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step1_txt1'];?>
<div class="input"><?php echo $_smarty_tpl->tpl_vars['data']->value['h_one_text'];?>
</div><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step1_txt2'];?>

              </div>
          </div>
          
         <a name="step2"></a>
          <div class="lit h_two fl">
              <h5 class="on"><span>2</span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step2'];?>
</h5>
              <div class="textarea"><?php echo $_smarty_tpl->tpl_vars['data']->value['h_two'];?>
</div>
          
          </div>
 		  <div class="clear h55"></div>
     	 <a name="step4"></a>
          <div class="lit h_four fl">
              <h5 class="on"><span>4</span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step4'];?>
</h5>
     		  <div class="textarea"><?php echo $_smarty_tpl->tpl_vars['data']->value['h_four'];?>
</div>
            
   
          </div>
          
      	 <a name="step3"></a>
          <div class="lit h_three fl">
              <h5 class="on"><span>3</span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step3'];?>
</h5>
             <div class="textarea">
              <?php echo $_smarty_tpl->tpl_vars['data']->value['h_three_one'];?>



              </div>
              <div class="textarea">
              
                <?php echo $_smarty_tpl->tpl_vars['data']->value['h_three_two'];?>



              </div>
          
          </div>
          
          
          <div class="clear h85"></div>
          <a name="step5"></a>
           <div class="lit h_five fl">
              <h5 class="on"><span>5</span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step5'];?>
</h5>
              <a href="http://leanone.cn/guquan/" target="_blank" class="gqtz"><?php echo $_smarty_tpl->tpl_vars['language']->value['txt_guquan'];?>
</a>
              <div  class="h_m_box">
         
                  <table  border="0" cellpadding="1" cellspacing="1">
                        <tr>
                          <td width="142" class="bg1"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step5_txt1'];?>
</td>
                          <td width="62"  ><?php if ($_smarty_tpl->tpl_vars['data']->value['h_five_one']=='0') {?>否<?php } else { ?>是<?php }?></td>
                          <td width="75"  class="bg1"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step5_txt2'];?>
</td>
                          <td width="68"><?php echo $_smarty_tpl->tpl_vars['data']->value['h_five_two'];?>
</td>
                        </tr>
                        <tr>
                          <td class="bg1"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step5_txt3'];?>
</td>
                          <td colspan="3"><?php echo $_smarty_tpl->tpl_vars['data']->value['h_five_three'];?>
</td>
                        </tr>
                        <tr>
                          <td  class="bg1"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step5_txt4'];?>
</td>
                          <td colspan="3"><?php echo $_smarty_tpl->tpl_vars['data']->value['h_five_four'];?>
</td>
                        </tr>
                        <tr>
                          <td height="175" colspan="4" valign="top">
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['h_five_five'];?>

                          </td>
                        </tr>
                   </table>
             </div>
              

          </div>
          
          <a name="step6"></a>
          <div class="lit h_six fl">
              <h5 class="on"><span>6</span><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step6'];?>
</h5>
              <div class="h_6box">
                  <table  border="0" cellpadding="0" cellspacing="1" width="370">
                        <tr>
                          <td width="11%" class="bg1"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step6_txt3'];?>
</td>
                          <td width="89%"  height="125" valign="top"><?php echo $_smarty_tpl->tpl_vars['data']->value['h_six_one'];?>
</td>
                        </tr>
                        <tr>
                          <td  class="bg1"><?php echo $_smarty_tpl->tpl_vars['language']->value['huabu_step6_txt4'];?>
</td>
                          <td  height="125" valign="top"><?php echo $_smarty_tpl->tpl_vars['data']->value['h_six_two'];?>
</td>
                        </tr>
                   </table>
              </div>
          
          </div>

    

    <div class="clear h55"></div>

<div style=" float:left; margin-left:320px; padding:50px 0 10px 0;">
<div class="bshare-custom icon-medium-plus">
<a title="分享到QQ空间" class="bshare-qzone"></a>
<a title="分享到新浪微博" class="bshare-sinaminiblog"></a>
<!--
<a title="分享到人人网" class="bshare-renren"></a>
<a title="分享到腾讯微博" class="bshare-qqmb"></a>
<a title="分享到朋友网" class="bshare-qqxiaoyou"></a>
<a title="分享到豆瓣网" class="bshare-douban"></a>
-->
<a title="分享到微信" class="bshare-weixin"></a>
<a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a></div><script src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=2c9fb966-ed24-4cd7-aba5-55671695e3b4&amp;pophcol=1&amp;lang=zh" type="text/javascript" charset="utf-8"></script><script src="http://static.bshare.cn/b/bshareC0.js" type="text/javascript" charset="utf-8"></script> 
</div>	
    <div class="clear h55"></div>   
    
    
    
    
    
    
    
<!---------------画布开始----------------->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/css/commnet.css" media="screen" />
<div  class="p_Box">
	<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['mID'];?>
" name="Hmid">
    <input type="hidden" name="Huid" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['Uid'];?>
">
    <input type="hidden" name="Hcid" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['CookieID'];?>
">
    


<div class="clearfix comment-wrap" id="wrapOuter">


    
		
        <div class="comment-form"  data-rid="0" data-pid="0" data-id="0">
        
                <div class="hd clearfix">
                    <span href="#url" class="count"><em><?php echo $_smarty_tpl->tpl_vars['pinglunNum']->value;?>
</em>条评论</span>
                    <span class="tip">我有话说</span>
           			<!--
                    <?php if ($_smarty_tpl->tpl_vars['user']->value&&$_smarty_tpl->tpl_vars['user']->value['Email']=='') {?>
                    <div class="tip-bd">
                        <span class="msg">赶快去<a href="javascript:;" >绑定邮箱</a>吧，绑定后即可通过邮箱收到评论动态消息哦</span>
                        <span class="tobd" style="display:none">
                        	  <input type="text" value="" name="email" placeholder="请输入要接收消息的邮箱" size="32" />
                              <input type="button" value="绑定" class="btn1">
                              <input type="button" value="放弃" class="btn2"></span>
                    </div>
                    <?php }?>
                    -->
                    
                </div>
                <div class="bd">
                    <div class="editor">
                        <div class="inner"><textarea  class="box" autocomplete="off" placeholder="请输入评论" value=""></textarea></div>
                        <span class="arrow"></span>
                    </div>
                    <div class="user">
                        <div class="form-head">
                            <a href="javascript:;"  title=""><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/male_180.png" alt=""></a>
                        </div>
                    </div>
                  
                </div>
                <div class="ft clearfix">
                    <div class="face"><a href="javascript:;" class="trigger" action-type="face-toggle">表情</a></div>
                    <a  href="javascript:;" action-type="tip-toggle" class="btn btn-red btn-disabled">发布</a>
                    <div class="login"></div>
                </div>
                
        </div>
        
        <script>
        	$(".tip-bd .msg a").click(function(){
				$(".tip-bd .msg").hide()
				$(".tip-bd .tobd").show()	
			})
			
			$(".tip-bd .btn1").click(function(){
				v=$("input[name=email]").val()
				if(isEmail(v)){
					//提交绑定
					$.get("user/bindEmail",{"email":v})
				}
			})
			$(".tip-bd .btn2").click(function(){
				$(".tip-bd .msg").show()
				$(".tip-bd .tobd").hide()
			})
        </script>   
         
        <div class="comment-list">
   
      
            <div class="hot-loading loading"><a href="javascript:;"></a></div>
            <div class="list">

            
    
            
<?php if ($_smarty_tpl->tpl_vars['pinglunList']->value) {?>
<?php  $_smarty_tpl->tpl_vars['pinglun'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pinglun']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pinglunList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pinglun']->key => $_smarty_tpl->tpl_vars['pinglun']->value) {
$_smarty_tpl->tpl_vars['pinglun']->_loop = true;
?>

   
      <div class="item clearfix">
       <!-- 头像 start -->
       		<div class="head"><img src="<?php echo $_smarty_tpl->tpl_vars['pinglun']->value['FaceUrl'];?>
"></div> 
       <!-- 头像 end -->
       <!-- 内容 start -->
            <div class="cont">
                <div class="info">
                    <span class="name"><?php echo $_smarty_tpl->tpl_vars['pinglun']->value['pubName'];?>
</span>
                    <span class="time">[<?php echo $_smarty_tpl->tpl_vars['pinglun']->value['sAddTime'];?>
]</span>
                </div>
                <div class="txt">
                	<?php echo $_smarty_tpl->tpl_vars['pinglun']->value['Content'];?>

                    
                </div>
               <?php if ($_smarty_tpl->tpl_vars['pinglun']->value['Uid']==$_smarty_tpl->tpl_vars['uid']->value) {?><?php } else { ?>
                <div class="action"  data-rid="0"  data-pid="<?php echo $_smarty_tpl->tpl_vars['pinglun']->value['ID'];?>
"  data-id="<?php echo $_smarty_tpl->tpl_vars['pinglun']->value['ID'];?>
">
                    <span class="btns">
                        <a class="vote"  title="赞"  href="javascript:;"><span>赞<em><?php echo $_smarty_tpl->tpl_vars['pinglun']->value['favorNum'];?>
</em></span></a>
                        <a class="reply" href="javascript:;" hidefocus="">回复</a>
                    </span>
                </div>
                <?php }?>
                
            </div>
        <!-- 内容 end -->   
      	    <div class="sitemList">
        <?php if ($_smarty_tpl->tpl_vars['pinglun']->value['ChildList']) {?>
        	
        	<?php  $_smarty_tpl->tpl_vars['pinglunChild'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pinglunChild']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pinglun']->value['ChildList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pinglunChild']->key => $_smarty_tpl->tpl_vars['pinglunChild']->value) {
$_smarty_tpl->tpl_vars['pinglunChild']->_loop = true;
?>
             <div class="sitem clearfix">
                <div class="head"><img src="<?php echo $_smarty_tpl->tpl_vars['pinglunChild']->value['FaceUrl'];?>
"></div> 
                <div class="cont">
                    <div class="info">
                        <span class="name"><?php echo $_smarty_tpl->tpl_vars['pinglunChild']->value['pubName'];?>
</span>
                        <span class="time">[<?php echo $_smarty_tpl->tpl_vars['pinglunChild']->value['sAddTime'];?>
]</span>
                    </div>
                    <div class="txt">
                    <?php echo $_smarty_tpl->tpl_vars['pinglunChild']->value['Content'];?>

                    <?php if ($_smarty_tpl->tpl_vars['pinglunChild']->value['Pid']>0&&$_smarty_tpl->tpl_vars['pinglunChild']->value['Prid']>0) {?>
                   		//<a href="javascript:;">@<?php echo $_smarty_tpl->tpl_vars['pinglunChild']->value['Puname'];?>
</a>：<?php echo $_smarty_tpl->tpl_vars['pinglunChild']->value['Ptxt'];?>

                    <?php }?>
              	   
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['pinglunChild']->value['Uid']==$_smarty_tpl->tpl_vars['uid']->value) {?><?php } else { ?>
                    <div class="action"  data-rid="<?php echo $_smarty_tpl->tpl_vars['pinglun']->value['ID'];?>
"  data-pid="<?php echo $_smarty_tpl->tpl_vars['pinglun']->value['ID'];?>
"  data-id="<?php echo $_smarty_tpl->tpl_vars['pinglunChild']->value['ID'];?>
">
                        <span class="btns">
                            <a class="vote" title="赞"  href="javascript:;"><span>赞<em><?php echo $_smarty_tpl->tpl_vars['pinglunChild']->value['favorNum'];?>
</em></span></a>
                            <a class="reply"  href="javascript:;" hidefocus="">回复</a>
                        </span>
                    </div>
                    <?php }?>
                    
                </div>  
            </div>
            <?php } ?>
        <?php }?>   
             </div>
            
            
        </div>

        
        
        
<?php } ?>
 <?php } else { ?>
   <div class="item itemNo">
       暂无评论，抢沙发
    </div>
 <?php }?>           

        
       
            </div>
        </div>









</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/js/comment.js"></script>

<div style="display:none" id="content">   
        <div class="reply-form-wrap" >
         
              <div class="reply-form-top"><em>◆</em><span>◆</span></div>
              <div class="comment-form reply-form" data-rid="0" data-pid="0" data-id="0">
              
                    <div class="hd"></div>
                    <div class="bd">
                        <div class="editor">
                             <div class="inner"><textarea  class="box" autocomplete="off" placeholder="" value="" style="height: 60px; overflow: auto;"></textarea></div>
                        </div>
                    </div>
                    <div class="ft clearfix" >
                        <div class="face"><a href="javascript:;" class="trigger">表情</a></div>
                        <a href="javascript:;"  class="btn btn-red btn-disabled">发布</a>
                    </div>
            
              </div>
        </div>

</div>  
<!---------------画布结束----------------->
</div>

</div>
</div>


    
<?php echo $_smarty_tpl->getSubTemplate ("copyright.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="comment-face">
    <ul>
       	  <li><A title="国旗" href="javascript:void(0)" data-text="[国旗]"><img  src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/flag_thumb.gif"></A></li>
          <li><A title="走你" href="javascript:void(0)" data-text="[走你]"><img  src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/zouni_thumb.gif"></A></li>
          <li><A title="笑哈哈" href="javascript:void(0)" data-text="[笑哈哈]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/lxhwahaha_thumb.gif"></A></li>
          <li><A title="江南style" href="javascript:void(0)" data-text="[江南style]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/gangnamstyle_thumb.gif"></A></li>
          <li><A title="吐血" href="javascript:void(0)" data-text="[吐血]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/lxhtuxue_thumb.gif"></A></li>
          <li><A title="好激动" href="javascript:void(0)" data-text="[好激动]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/lxhjidong_thumb.gif"></A></li>
          <li><A title="lt切克闹" href="javascript:void(0)" data-text="[lt切克闹]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/ltqiekenao_thumb.gif"></A></li>
          <li><A title="moc转发" href="javascript:void(0)" data-text="[moc转发]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/moczhuanfa_thumb.gif"></A></li>
          <li><A title="ala蹦" href="javascript:void(0)" data-text="[ala蹦]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/alabeng_thumb.gif"></A></li>
          <li><A title="gst耐你" href="javascript:void(0)" data-text="[gst耐你]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/gstnaini_thumb.gif"></A></li>
          <li><A title="xb压力" href="javascript:void(0)" data-text="[xb压力]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/xbyali_thumb.gif"></A></li>
          <li><A title="din推撞" href="javascript:void(0)" data-text="[din推撞]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/dintuizhuang_thumb.gif"></A></li>
          <li><A title="草泥马" href="javascript:void(0)" data-text="[草泥马]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/shenshou_thumb.gif"></A></li>
          <li><A title="神马" href="javascript:void(0)" data-text="[神马]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/horse2_thumb.gif"></A></li>
          <li><A title="浮云" href="javascript:void(0)" data-text="[浮云]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/fuyun_thumb.gif"></A></li>
          <li><A title="给力" href="javascript:void(0)" data-text="[给力]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/geili_thumb.gif"></A></li>
          <li><A title="围观" href="javascript:void(0)" data-text="[围观]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/wg_thumb.gif"></A></li>
          <li><A title="威武" href="javascript:void(0)" data-text="[威武]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/vw_thumb.gif"></A></li>
          <li><A title="熊猫" href="javascript:void(0)" data-text="[熊猫]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/panda_thumb.gif"></A></li>
          <li><A title="兔子" href="javascript:void(0)" data-text="[兔子]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/rabbit_thumb.gif"></A></li>
          <li><A title="奥特曼" href="javascript:void(0)" data-text="[奥特曼]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/otm_thumb.gif"></A></li>
          <li><A title="囧" href="javascript:void(0)" data-text="[囧]"><img  src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/j_thumb.gif"></A></li>
          <li><A title="互粉" href="javascript:void(0)" data-text="[互粉]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/hufen_thumb.gif"></A></li>
          <li><A title="礼物" href="javascript:void(0)" data-text="[礼物]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/liwu_thumb.gif"></A></li>
          <li><A title="呵呵" href="javascript:void(0)" data-text="[呵呵]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/smilea_thumb.gif"></A></li>
          <li><A title="嘻嘻" href="javascript:void(0)" data-text="[嘻嘻]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/tootha_thumb.gif"></A></li>
          <li><A title="哈哈" href="javascript:void(0)" data-text="[哈哈]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/laugh_thumb.gif"></A></li>
          <li><A title="可爱" href="javascript:void(0)" data-text="[可爱]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/tza_thumb.gif"></A></li>
          <li><A title="可怜" href="javascript:void(0)" data-text="[可怜]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/kl_thumb.gif"></A></li>
          <li><A title="挖鼻屎" href="javascript:void(0)" data-text="[挖鼻屎]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/kbsa_thumb.gif"></A></li>
          <li><A title="吃惊" href="javascript:void(0)" data-text="[吃惊]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/cj_thumb.gif"></A></li>
          <li><A title="害羞" href="javascript:void(0)" data-text="[害羞]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/shamea_thumb.gif"></A></li>
          <li><A title="挤眼" href="javascript:void(0)" data-text="[挤眼]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/zy_thumb.gif"></A></li>
          <li><A title="闭嘴" href="javascript:void(0)" data-text="[闭嘴]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/bz_thumb.gif"></A></li>
          <li><A title="鄙视" href="javascript:void(0)" data-text="[鄙视]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/bs2_thumb.gif"></A></li>
          <li><A title="爱你" href="javascript:void(0)" data-text="[爱你]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/lovea_thumb.gif"></A></li>
          <li><A title="泪" href="javascript:void(0)" data-text="[泪]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/sada_thumb.gif"></A></li>
          <li><A title="偷笑" href="javascript:void(0)" data-text="[偷笑]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/heia_thumb.gif"></A></li>
          <li><A title="亲亲" href="javascript:void(0)" data-text="[亲亲]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/qq_thumb.gif"></A></li>
          <li><A title="生病" href="javascript:void(0)" data-text="[生病]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/sb_thumb.gif"></A></li>
          <li><A title="太开心" href="javascript:void(0)" data-text="[太开心]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/mb_thumb.gif"></A></li>
          <li><A title="懒得理你" href="javascript:void(0)" data-text="[懒得理你]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/ldln_thumb.gif"></A></li>
          <li><A title="右哼哼" href="javascript:void(0)" data-text="[右哼哼]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/yhh_thumb.gif"></A></li>
          <li><A title="左哼哼" href="javascript:void(0)" data-text="[左哼哼]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/zhh_thumb.gif"></A></li>
          <li><A title="嘘" href="javascript:void(0)" data-text="[嘘]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/x_thumb.gif"></A></li>
          <li><A title="衰" href="javascript:void(0)" data-text="[衰]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/cry_thumb.gif"></A></li>
          <li><A title="委屈" href="javascript:void(0)" data-text="[委屈]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/wq_thumb.gif"></A></li>
          <li><A title="吐" href="javascript:void(0)" data-text="[吐]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/t_thumb.gif"></A></li>
          <li><A title="打哈欠" href="javascript:void(0)" data-text="[打哈欠]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/k_thumb.gif"></A></li>
          <li><A title="抱抱" href="javascript:void(0)" data-text="[抱抱]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/bba_thumb.gif"></A></li>
          <li><A title="怒" href="javascript:void(0)" data-text="[怒]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/angrya_thumb.gif"></A></li>
          <li><A title="疑问" href="javascript:void(0)" data-text="[疑问]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/yw_thumb.gif"></A></li>
          <li><A title="馋嘴" href="javascript:void(0)" data-text="[馋嘴]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/cza_thumb.gif"></A></li>
          <li><A title="拜拜" href="javascript:void(0)" data-text="[拜拜]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/88_thumb.gif"></A></li>
          <li><A title="思考" href="javascript:void(0)" data-text="[思考]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/sk_thumb.gif"></A></li>
          <li><A title="汗" href="javascript:void(0)" data-text="[汗]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/sweata_thumb.gif"></A></li>
          <li><A title="困" href="javascript:void(0)" data-text="[困]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/sleepya_thumb.gif"></A></li>
          <li><A title="睡觉" href="javascript:void(0)" data-text="[睡觉]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/sleepa_thumb.gif"></A></li>
          <li><A title="钱" href="javascript:void(0)" data-text="[钱]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/money_thumb.gif"></A></li>
          <li><A title="失望" href="javascript:void(0)" data-text="[失望]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/sw_thumb.gif"></A></li>
          <li><A title="酷" href="javascript:void(0)" data-text="[酷]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/cool_thumb.gif"></A></li>
          <li><A title="花心" href="javascript:void(0)" data-text="[花心]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/hsa_thumb.gif"></A></li>
          <li><A title="哼" href="javascript:void(0)" data-text="[哼]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/hatea_thumb.gif"></A></li>
          <li><A title="鼓掌" href="javascript:void(0)" data-text="[鼓掌]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/gza_thumb.gif"></A></li>
          <li><A title="晕" href="javascript:void(0)" data-text="[晕]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/dizzya_thumb.gif"></A></li>
          <li><A title="悲伤" href="javascript:void(0)" data-text="[悲伤]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/bs_thumb.gif"></A></li>
          <li><A title="抓狂" href="javascript:void(0)" data-text="[抓狂]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/crazya_thumb.gif"></A></li>
          <li><A title="黑线" href="javascript:void(0)" data-text="[黑线]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/h_thumb.gif"></A></li>
          <li><A title="阴险" href="javascript:void(0)" data-text="[阴险]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/yx_thumb.gif"></A></li>
          <li><A title="怒骂" href="javascript:void(0)" data-text="[怒骂]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/nm_thumb.gif"></A></li>
          <li><A title="心" href="javascript:void(0)" data-text="[心]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/hearta_thumb.gif"></A></li>
          <li><A title="伤心" href="javascript:void(0)" data-text="[伤心]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/unheart_thumb.gif"></A></li>
          <li><A title="猪头" href="javascript:void(0)" data-text="[猪头]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/pig_thumb.gif"></A></li>
          <li><A title="ok" href="javascript:void(0)" data-text="[ok]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/ok_thumb.gif"></A></li>
          <li><A title="耶" href="javascript:void(0)" data-text="[耶]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/ye_thumb.gif"></A></li>
          <li><A title="good" href="javascript:void(0)" data-text="[good]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/good_thumb.gif"></A></li>
          <li><A title="不要" href="javascript:void(0)" data-text="[不要]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/no_thumb.gif"></A></li>
          <li><A title="赞" href="javascript:void(0)" data-text="[赞]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/z2_thumb.gif"></A></li>
          <li><A title="来" href="javascript:void(0)" data-text="[来]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/come_thumb.gif"></A></li>
          <li><A title="弱" href="javascript:void(0)" data-text="[弱]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/sad_thumb.gif"></A></li>
          <li><A title="蜡烛" href="javascript:void(0)" data-text="[蜡烛]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/lazu_thumb.gif"></A></li>
          <li><A title="蛋糕" href="javascript:void(0)" data-text="[蛋糕]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/cake_thumb.gif"></A></li>
          <li><A title="钟" href="javascript:void(0)" data-text="[钟]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/clock_thumb.gif"></A></li>
          <li><A title="话筒" href="javascript:void(0)" data-text="[话筒]"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/face/m_thumb.gif"></A></li>
    </ul>
</div>
</body>
</html><?php }} ?>
