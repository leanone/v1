// JavaScript Document

var box
var btn
$( function (){

	$('.comment-face').hide();
	$('.trigger').live("click",function (){
		var _xy=$(this).offset()
	
		 box=$(this).parent().parent().parent().children(".bd").children(".editor").children(".inner").children(".box")
		 
		 btn= $(this).parent().parent().parent().children(".ft").children(".btn")
		
		
	
		$('.comment-face').css({'top':_xy.top+20,'left':_xy.left}).fadeIn();
			
		
	})
	
	$(".comment-face a").each(function(i){
			$(this).click(function(){
			
				box.val(box.val()+$(this).data("text"));
				$('.comment-face').hide();	
				
				btn.removeClass("btn-disabled")
				
						
			})	
	}) 
	$(".comment-face").hover(function(){},function(){
		$(this).hide()	
	})
	$(".box").live("change",function(){
		 box=$(this).parent().parent().parent().parent()
		 btn= box.children(".ft").children(".btn")
	
		 if($(this).html()!=""){
			 btn.removeClass("btn-disabled")
			
		 }else{
		
			btn.addClass("btn-disabled") 
		}
	})
	
	/*显示回复*/
	$('.reply').live("click",function (){
		t=$(this).parent().parent();
		rid=t.data("rid")
		pid=t.data("pid")
		id=t.data("id")
		
		vreply=t.parent().children(".reply-form-wrap")
		if(vreply.length>0){
		
			vreply.toggle()
			replyForm=vreply.children(".reply-form")
		}else{
			d=$('<div class="reply-form-wrap" >'+$(".reply-form-wrap").html()+"</div>")
			t.after(d)
			replyForm=d.children(".reply-form")
			if(rid>0){
				replyForm.attr("data-rid",rid)
			}else{
				replyForm.attr("data-rid",pid)
			}
			replyForm.attr("data-pid",id)
		}	
	})

	
})
	
	
$(".vote").live("click",function (){
	
	if($(this).data("click")){return;}
	em=$(this).children("span").children("em")
	v=em.html()
	data={}
	data.m=$(this).parent().parent().data("id")
	

	$.get(baseUrl+"huabu/vote",data,function(d){
			if(d.flag){}else{
				alert(d.msg)
			}
			
	},"jsonp")
	em.html(Math.floor(v)+1)
	$(this).attr("data-click",true)
})

//回复
$(".btn").live("click",function (){
	
	p=$(this).parent().parent()
	rid = p.data("rid")
	pid = p.data("pid")
	id  = p.data("id")
	av=""
	if(rid>0){
		if(rid==pid){
			//二级评论
			pp=p.parent().parent().parent().children(".sitemList")
		}else{
			//三级评论
			pp=p.parent().parent().parent().parent()
			ppp=p.parent().parent()
			ppname=ppp.children(".info").children(".name").html()
			pptxt=ppp.children(".txt").html()
			pptxt=pptxt.split("//<a")
			
			av='//<a href="javascript:;">@'+ppname+'</a>：'+pptxt[0]
			
		}
	}else{
		//一级评论
		pp=p
		
	}
	
	box=p.children(".bd").children(".editor").children(".inner").children(".box")
	v=box.val()
	
	

	if(Uid=="0"){
		reg()
		return;
	}
	if(($("input[name=Huid]").val()==Uid || $("input[name=Hcid]").val()==Cid) && rid==0){
		
		alert("不能对自己评论哦，亲~")	
		return;
	}
	

	t=new Date();
	data={}
	data.m=$("input[name=Hmid]").val()
	data.r=rid
	data.p=pid

	content =v.replace(/\n/g,""); 
	//content = content.replace(/\n/g,"<br/>");

	if(content==""|| content=="请输入评论"){
		alert("请先留点评论吧~")
		box.focus()
	}else{
		data.v=v.replace(/\n/g,"<br/>"); 
		
		$.get(baseUrl+"huabu/comment",data,function(d){
			if(d.flag){}else{
				alert(d.msg)
			}
			
		},"jsonp")
		$(".itemNo").hide()
		userUrl=""
		userFace="http://tp1.sinaimg.cn/2700977324/50/1"

		if(rid>0){
			vitem="sitem"
		}else{
			vitem="item"
		}
		d='<div class="'+vitem+' clearfix"><div class="head"><img src="'+userFace+'"></div>'
		d+='<div class="cont"><div class="info"><span class="name">'+Uname+'</span><span class="time">1秒前</span></div>'
		d+='<div class="txt">'+iniFaceHtml(data.v)+av+'</div>'
		//<div class="action"><span class="btns"><a class="vote" title="赞"  href="javascript:;"><span>赞<em>0</em></span></a><a class="reply" href="javascript:;" hidefocus="">回复</a></span</div>>'
	
		d+='</div></div>'
		box.val("")
		if(rid>0){
			
			pp.prepend(d)
			
			p.parent().hide()
		}else{
			
			$(".list").prepend(d)
		}
		
		v=$(".count em").html()
		v=Math.floor(v)+1
		$(".count em").html(v)
		
		
		
	}

		
		
})
function iniFaceHtml(d){

_g={"[国旗]":"flag","[走你]":"zouni","[笑哈哈]":"lxhwahaha","[江南style]":"gangnamstyle","[吐血]":"lxhtuxue","[好激动]":"lxhjidong","[lt切克闹]":"ltqiekenao","[moc转发]":"moczhuanfa","[ala蹦]":"alabeng","[gst耐你]":"gstnaini","[xb压力]":"xbyali","[din推撞]":"dintuizhuang","[草泥马]":"shenshou","[神马]":"horse2","[浮云]":"fuyun","[给力]":"geili","[围观]":"wg","[威武]":"vw","[熊猫]":"panda","[兔子]":"rabbit","[奥特曼]":"otm","[囧]":"j","[互粉]":"hufen","[礼物]":"liwu","[呵呵]":"smilea","[嘻嘻]":"tootha","[哈哈]":"laugh","[可爱]":"tza","[可怜]":"kl","[挖鼻屎]":"kbsa","[吃惊]":"cj","[害羞]":"shamea","[挤眼]":"zy","[闭嘴]":"bz","[鄙视]":"bs2","[爱你]":"lovea","[泪]":"sada","[偷笑]":"heia","[亲亲]":"qq","[生病]":"sb","[太开心]":"mb","[懒得理你]":"ldln","[右哼哼]":"yhh","[左哼哼]":"zhh","[嘘]":"x","[衰]":"cry","[委屈]":"wq","[吐]":"t","[打哈欠]":"k","[抱抱]":"bba","[怒]":"angrya","[疑问]":"yw","[馋嘴]":"cza","[拜拜]":"88","[思考]":"sk","[汗]":"sweata","[困]":"sleepya","[睡觉]":"sleepa","[钱]":"money","[失望]":"sw","[酷]":"cool","[花心]":"hsa","[哼]":"hatea","[鼓掌]":"gza","[晕]":"dizzya","[悲伤]":"bs","[抓狂]":"crazya","[黑线]":"h","[阴险]":"yx","[怒骂]":"nm","[心]":"hearta","[伤心]":"unheart","[猪头]":"pig","[ok]":"ok","[耶]":"ye","[good]":"good","[不要]":"no","[赞]":"z2","[来]":"come","[弱]":"sad","[蜡烛]":"lazu","[蛋糕]":"cake","[钟]":"clock","[话筒]":"m"}


	d = d.replace(/\[.+?\]/g,function(a,b){
		
		 return '<img src="'+baseUrl+'public/face/'+_g[a]+'_thumb.gif" title="'+a.replace("[","").replace("]","")+'"/>';  
	}); 
	return d
	
}

$(document).ready(function(e) {

    $(".txt").each(function(i){
	
		$(this).html(iniFaceHtml($(this).html()))
	
	})
});



		
		
