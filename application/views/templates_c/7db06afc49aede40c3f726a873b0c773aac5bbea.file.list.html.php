<?php /* Smarty version Smarty-3.1.15, created on 2015-03-17 03:59:37
         compiled from "application\views\templates\list.html" */ ?>
<?php /*%%SmartyHeaderCode:2427854f6b7cf7ba1b8-40158230%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7db06afc49aede40c3f726a873b0c773aac5bbea' => 
    array (
      0 => 'application\\views\\templates\\list.html',
      1 => 1426493454,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2427854f6b7cf7ba1b8-40158230',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_54f6b7cf7f4f82_16712028',
  'variables' => 
  array (
    'language' => 0,
    'base_url' => 0,
    'mID' => 0,
    'listData' => 0,
    'listItem' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f6b7cf7f4f82_16712028')) {function content_54f6b7cf7f4f82_16712028($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<title><?php echo $_smarty_tpl->tpl_vars['language']->value['site_title'];?>
</title>
<?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/css/zhaunshi.css" media="screen" />
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate ("navB.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="navSelect"> 
    <div>
    <a href="javascript:;" class="ico_6"><span></span><em class="up"></em></a>
    <a href="javascript:;" class="ico_5"><span></span><em class="up"></em></a>
    <a href="javascript:;" class="ico_4"><span></span><em class="up"></em></a>
    <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
huabu/add" class="creat">+ 创建画布</a>
    </div>
</div>
<script>
	var mID="<?php echo $_smarty_tpl->tpl_vars['mID']->value;?>
"
</script>

<script>




	var visitNum  ="asc"
	var favorNum  ="asc"
	var commentNum="asc"
	objV={"visitNum":visitNum,"favorNum":favorNum,"commentNum":commentNum}
	
	function iniUpDown(v,obj){
		if(objV[v]=="asc"){
			objV[v]="desc"
			obj.removeClass("up").addClass("down")
		}else{
			objV[v]="asc"
			obj.removeClass("down").addClass("up")
		}
		
		loadData(objV["visitNum"],objV["favorNum"],objV["commentNum"],v)
	}

	//按照阅读排序
	$(".navSelect .ico_6").click(function(){
		iniUpDown("visitNum",$(this).children("em"))
		
	})
	//按照点赞排序
	$(".navSelect .ico_5").click(function(){
		iniUpDown("favorNum",$(this).children("em"))
		
	})
	//按照评论排序
	$(".navSelect .ico_4").click(function(){
		iniUpDown("commentNum",$(this).children("em"))
		
	})
	
	function loadData(v1,v2,v3,v){
		//显示loading
		
		$.get(baseUrl+"huabu/getList?v1="+v1+"&v2="+v2+"&v3="+v3+"&v="+v,{},function(d){
			$(".z_main div ul").html("")
			for(i=0;i<d.length;i++){
				str='<li id="'+d[i].mID+'">';
				str+='<div class="z_main_onetop">';
				str+='<h4>'+d[i].Subject+'</h4>';
				str+='<p>'+d[i].shareWord+'</p>';
				str+='</div>';
				str+='<div class="z_main_onebottom">';
				str+='<h4>'+d[i].Subject+'</h4>';
				str+='<div class="z_dl"><a href="'+baseUrl+'huabu/show/'+d[i].mID+'.html" target="_blank" class="ico_1">';
				str+='<em></em><span>查看('+d[i].visitNum+')</span></a>';
				str+='<a href="'+baseUrl+'huabu/show/'+d[i].mID+'.html#pl" target="_blank" class="ico_2">';
				str+='<em></em><span>评论('+d[i].commentNum+')</span>';
				str+='</a><a href="javascript:zan('
				str+="'"+d[i].mID+"'"
				str+=');" class="ico_3"><em></em><span>赞('+d[i].favorNum+')</span></a></div></div>';
				str+='<img src="'+d[i].sharePic+'" width="400" height="360" alt=""/></li>';
				//alert(str)
				$(".z_main div ul").append(str)
				
			}
		
			
		},"jsonp")
		
	}

</script>

<div class="z_main" style="padding-top:20px;">
    	<div>
        <ul>
 <?php if ($_smarty_tpl->tpl_vars['listData']->value) {?>
    <?php  $_smarty_tpl->tpl_vars['listItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['listItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['listItem']->key => $_smarty_tpl->tpl_vars['listItem']->value) {
$_smarty_tpl->tpl_vars['listItem']->_loop = true;
?>
    
      	<li id="<?php echo $_smarty_tpl->tpl_vars['listItem']->value['mID'];?>
">
            <div class="z_main_onetop">
                <h4><?php echo $_smarty_tpl->tpl_vars['listItem']->value['Subject'];?>
</h4>
                <p><?php echo $_smarty_tpl->tpl_vars['listItem']->value['shareWord'];?>
</p>
                
            </div>
            <div class="z_main_onebottom">
                <h4><?php echo $_smarty_tpl->tpl_vars['listItem']->value['Subject'];?>
</h4>
                <div class="z_dl">
                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
huabu/show/<?php echo $_smarty_tpl->tpl_vars['listItem']->value['mID'];?>
.html" target="_blank" class="ico_1">
                    <em></em><span>查看(<?php echo $_smarty_tpl->tpl_vars['listItem']->value['visitNum'];?>
)</span>
                </a>
              
               
                
                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
huabu/show/<?php echo $_smarty_tpl->tpl_vars['listItem']->value['mID'];?>
.html#pl" target="_blank" class="ico_2">
                    <em></em><span>评论(<?php echo $_smarty_tpl->tpl_vars['listItem']->value['commentNum'];?>
)</span>
                </a>
                 <a href="javascript:zan('<?php echo $_smarty_tpl->tpl_vars['listItem']->value['mID'];?>
');" class="ico_3">
                    <em></em><span>赞(<?php echo $_smarty_tpl->tpl_vars['listItem']->value['favorNum'];?>
)</span>
                </a>
               </div> 
            </div>
         	<img src="<?php echo $_smarty_tpl->tpl_vars['listItem']->value['sharePic'];?>
" width="400" height="360" alt=""/> 
      	</li>
                
    <?php } ?>
<?php } else { ?>
 	没有数据
<?php }?>        
        </ul>
    	</div>
</div>

<script>
	var isZan=false
	function zan(mID){
		if(!isZan){
		$.get(baseUrl+"huabu/zan",{"mID":mID},function(d){
	
			v=$("#"+mID+" .ico_3 span").html()
			v=v.replace("赞(","")
			v=v.replace(")","")
			v=Math.floor(v)+1
			$("#"+mID+" .ico_3 span").html("赞("+v+")")
			 
		},"jsonp")
		isZan=true
		}
	}
	
	
	$(".z_main li").each(function(){
		$(this).hover(function(){
			$(this).children(".z_main_onetop").animate({"top":0},200)
			//alert($(this).children(".z_main_onetop").html())
			$(this).children(".z_main_onebottom").children("h4").fadeOut()
		},function(){
			var z_main_onetop=$(this).children(".z_main_onetop")
			var h4=$(this).children(".z_main_onebottom").children("h4")
			setTimeout(function(){
				z_main_onetop.animate({"top":-300},200)
				h4.fadeIn()
			},200)
			
		})	
	})

</script>     

    
<?php echo $_smarty_tpl->getSubTemplate ("copyright.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    

</body>
</html><?php }} ?>
