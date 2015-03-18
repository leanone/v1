// JavaScript Document

	function login(){
	
		$(".regL .reg").hide()
		$(".regL .login").show()
		
		$(".san .toLogin").hide()
		$(".san .toReg").show()
		$(".h_main1").show()
		$(".h_box_big").css({"width":$(document).width(),"height":$(document).height()+47})
		$(".h_box_big").show()
	}
	function reg(){
		$(".regL .reg").show()
		$(".regL .login").hide()
		
		$(".san .toLogin").show()
		$(".san .toReg").hide()
		$(".h_main1").show()
		$(".h_box_big").css({"width":$(document).width(),"height":$(document).height()+47})
		$(".h_box_big").show()
	}
	function hideReg(){
		$(".h_box_big").hide()
		$(".h_main1").hide()
	}
	$("#close").click(function(){
		hideReg()
	})
	
	function logout(){
	  $.get(baseUrl+"user/logOut",{"utm_source":utm_source},function(d){
		  Cid=d.cid
		
	  },"json")
	}

	
	
	var utm_source


$(function() {
  //自适应

	utm_source=request("utm_source")
	utm_content=request("utm_content")
	if(Cid==""){
		getCid()  //cookie用户ID
	}

	var data={}
	var isSubmit=false

	var err=false
	var isRegClick=false
	$(".reg .subBtn").click(function(){
		if(isRegClick){
			
			
			return;	
		}
		checkI=[".reg input[name=username]",".reg input[name=userpass]",".reg input[name=reuserpass]"]
		uname=$(checkI[0]).val()
		upass=$(checkI[1]).val()
		reupass=$(checkI[2]).val()
		err=false
		checkUname(uname)
		
		if(upass==""){
			$(checkI[1]).parent().addClass("err")
			$(checkI[1]).next("p").html("密码不能为空")
			err=true
		}
		if(upass.length<6||upass.length>18){
			$(checkI[1]).parent().addClass("err")
			$(checkI[1]).next("p").html("密码格式不正确")
			err=true
		}else{
			$(checkI[1]).parent().removeClass("err")
		}
		
		if(upass!="" && reupass!=upass){
			$(checkI[2]).parent().addClass("err")
			err=true
		}else{
			$(checkI[2]).parent().removeClass("err")	
		}
		if(err){return;}
		data={}
		data.uname=uname
		data.upass=upass
		data.utm_source=utm_source
		data.utm_content=decodeURI(utm_content)
		if(uname!="" && upass!=""){
			$.get(baseUrl+"user/regSave?t"+Math.random(),data,function(d){
				if(d.flag){
					//alert("注册成功，赶紧去提交画布吧")
					alert("注册成功啦，留点个人资料呗，亲")
					location.href=baseUrl+"huabu/my"
					
				}else{
					alert(d.msg)
				}
				
				hideReg()
			},"jsonp")	
		}
		isRegClick=true;
		setTimeout(function(){
			isRegClick=false;	
		},5000)
		
	})
	
	$(".login .subBtn").click(function(){
		checkI=[".login input[name=username]",".login input[name=userpass]"]
		uname=$(checkI[0]).val()
		upass=$(checkI[1]).val()
		isauto=$("input[name=auto]").is(":checked")
	
		if(uname==""){
			$(checkI[0]).parent().addClass("err")
			$(checkI[0]).next("p").html("用户名不能为空")
		}
		if(upass==""){
			$(checkI[1]).parent().addClass("err")
			$(checkI[1]).next("p").html("密码不能为空")
		}
		if(uname!="" && upass!=""){
			$.get(baseUrl+"user/getLogin",{"uname":uname,"upass":upass,"auto":isauto},function(d){
				 if(d.flag){
					 $(".navB  .fr").addClass("logined")
					 $(".navB  .fr").html("<a>欢迎您,"+uname+"</a> <a href='"+baseUrl+"huabu/my')\">我的画布</a><a href='"+baseUrl+"user/logout'>退出登陆</a>")
					 //a href='{$base_url}project/my'>我的项目</a ><a href="{$base_url}huabu/my">我的画布</a><a href="{$base_url}user/logout
					 location.href=baseUrl+"huabu/my"
					
					
				 }else{
					alert(d.msg)	 
				 }
				 hideReg()
			},"jsonp")	
		}
		
	})

	t=$(document).height()*0.5-230
	l=$(document).width()*0.5-360
	$(".san .qq").click(function(){
		
		window.open (baseUrl+'user/qqLogin','newwindow','height=460,width=720,top='+t+',left='+l+',toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no') 
	})  
    $(".san .sina").click(function(){
		window.open (baseUrl+'user/weiboLogin','newwindow','height=460,width=720,top='+t+',left='+l+',toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no') 
	})    
		
	
});
function checkUname(v){
	
	userInput=".reg input[name=username]"
	if(v==""){
		$(userInput).parent().addClass("err")
		$(userInput).next("p").html("用户名不能为空")
		err=true
	}else if(!isMobile(v) && !isEmail(v) && !isQQ(v)){
		
	    $(userInput).parent().addClass("err")
		$(userInput).next("p").html("用户名格式不正确，手机号或者邮箱哦")
		err=true
	}else{
		$.get(baseUrl+"user/checkUname",{uanme:v},function(d){
			if(d.flag){
				$(userInput).parent().addClass("err")
				$(userInput).next("p").html("该用户名已被注册")
				err=true
			}else{
				$(userInput).parent().removeClass("err")
			}
		},"jsonp")
	}
	
}


