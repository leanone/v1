var nowKvID=0, pageWidth=0,pageHeight=0,isKvMoving=false
var timer
var toRF=false

$(window).resize(function(){
	
	iniPage()
	$(".kvBox #kv").css({"top":-nowKvID*pageHeight})
	if(toRF){
	$(".iBox").css({"top":-pageHeight})
	}

})

$(function() {
  //自适应
 iniPage()
 $(".main").hide()
	

	
	
	$('.m_nav li').click( function (){
		var j=$(this).index();
		for(i=0;i<2;i++){
			if(i==j){
				$('.m_nav li').eq(i).addClass("on")
				$(".box_"+(i+1)).show()	
			}else{
				$(".box_"+(i+1)).hide()	
				$('.m_nav li').eq(i).removeClass("on")
			}
		}
			
	})
	
		
	
});
var utm_source
function reloadMethod(){
	alert("reloadMethod")	
}


$(function() {
  //自适应

	utm_source=request("utm_source")
	utm_content=request("utm_content")

	getCid()  //cookie用户ID

	var data={}
	var isSubmit=false

	$(".djBox .subBtn").click(function(){
		if(isSubmit){alert("你已提交过了，亲~");return;}
		data={}
		data.cid=Cid
		data.id=Math.floor($("input[name=ID]").val())
		data.utm_source=utm_source
		data.utm_content=decodeURI(utm_content)
		
		data.realname=$("input[name=realname]").val()
		data.weichat=$("input[name=weichat]").val()
		data.isquan=$("input[name=isquan]:checked").val()
		data.rnum=$("input[name=rnum]").val()
		data.subject=$("input[name=subject]").val()
		data.tel=$("input[name=tel]").val()
		
		if(data.realname=="" || data.weichat=="" || data.isquan=="" || data.rnum=="" || data.subject=="" || data.tel==""){
			alert("请填写全部信息哦，亲~")
			return;
		}
		//电话监测
		
		if(!isPhoneOrMobile(data.tel)){
			alert("亲，你的联系电话有误~，请留下手机号或者座机号呗~");	
			$("input[name=tel]").focus()
			return;
		}
		data.email=$("input[name=email]").val()
		//邮箱监测
		if(!isEmail(data.email)){
			alert("亲，您的邮箱格式有误~");	
			$("input[name=email]").focus()
			return;
		}
	
		$.get(baseUrl+"project/addSave",data,function(d){
			if(d.flag){
				
				if(confirm("信息提交成功，等待我们的联系吧，亲")	){
					location.href="http://leanone.cn/wp/"
				}
			}
		},"jsonp")
		isSubmit=true
	})
	
	
});


var nowPageID=1
function goPage(){
	if(nowPageID==2){return;}
	$(".main").show()
	toRF=true
	$(".iBox").animate({"top":-pageHeight},500,function(){
		$(".kvBox ul").hide()
		
	})	
	$(".navB").css({"top":-80}).show().delay(400).animate({"top":0},500,function(){
		$("body,html").css({"overflow-y":"auto"})
		$(".navB").css({"position":"fixed"})
	})
	nowPageID=2
}
function iniPage(){
	pageWidth=$(window).width()
	pageHeight=$(window).height()
	
	$(".kv,.kvBox,.iBox").css({"width":pageWidth,"height":pageHeight})
	

	bl=Math.floor(100*$(window).height()/1080)/100

	sl=(2560*bl-$(window).width())*0.5
	$("#btn_kv").css({"width":456*bl,"height":128*bl,"position":"absolute","top":564*bl,"left":418*bl-sl})
	
}
function iniKv(id){
    
	 kvLen=$(".bir ul li").length
	 if(id<0){id=0}
	 if(id>kvLen-1){id=kvLen-1;}
	// if(id==nowKvID){return;}
	
	 for(i=0;i<kvLen;i++){
		 if(i==id){
			  $(".bir a").eq(i).addClass("pp")
		 }else{
			  $(".bir a").eq(i).removeClass("pp")
		 }
	 }
	 $(".kvBox ul").animate({"top":-id*pageHeight},600,function(){
		// isKvMoving=false
	 })
	 
	 nowKvID=id
	 
}

function reg(){
	$(".djBox").hide()
	$(".reg").show()
	$(".login").hide()
	$(".regL").show()
	$(".san .toLogin").show()
	$(".san .toReg").hide()
	goPage()
}
function login(){
	$(".djBox").hide()
	$(".reg").hide()
	$(".login").show()
	$(".regL").show()
	$(".san .toLogin").hide()
	$(".san .toReg").show()
	goPage()
}

function logout(){
	  $.get(baseUrl+"user/logOut",{"utm_source":utm_source},function(d){
		  Cid=d.cid
		
	  },"jsonp")
}
