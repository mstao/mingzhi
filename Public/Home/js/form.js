//登录和注册页面切换
$(function(){
	
	$('#switch_qlogin').click(function(){
		$('#switch_login').removeClass("switch_btn_focus").addClass('switch_btn');
		$('#switch_qlogin').removeClass("switch_btn").addClass('switch_btn_focus');
		$('#switch_bottom').animate({left:'0px',width:'70px'});
		$('#qlogin').css('display','none');
		$('#web_qr_login').css('display','block');
		
		});
	$('#switch_login').click(function(){
		
		$('#switch_login').removeClass("switch_btn").addClass('switch_btn_focus');
		$('#switch_qlogin').removeClass("switch_btn_focus").addClass('switch_btn');
		$('#switch_bottom').animate({left:'154px',width:'70px'});
		
		$('#qlogin').css('display','block');
		$('#web_qr_login').css('display','none');
	});

        
   
});




/*
 * 登录校验，并用Ajax实现登录功能
 * 
 */

$(function(){
	var oknamel=false;
	var okpassl=false;
	var okverifyl=false;
	
	//对用户名校验
	
	$('#loginusername').bind('blur',function(){
		var filter=/^[a-zA-Z\u4e00-\u9fa5]{1}[a-zA-Z0-9_\u4e00-\u9fa5]{1,8}$/;
	
		if( $(this).val() =="" || $(this).val==null ){
			$('.err_username_login').css("display","block").css("border-color","red");
			$('.err_username_login').addClass('error').text('* 用户名不能为空 !');
			$(this).focus();
			
		}
		if($(this).val()!=""){
			
			var str = $(this).val();
			str = str.replace(/\s/g , '');//输入空格时自动忽略，\s表示空格
			if(filter.test( $(this).val() )){
				oknamel=true;			
				$('.err_username_login').css("display","none");						
				
			}else if( !filter.test( $(this).val() )){
				$('.err_username_login').addClass('error').text('* 用户名为2-9字符,首字不为数字,无特殊字符 !');
				$(this).focus();
				$('.err_username_login').css("display","block").css("border-color","red");
			}
		}
	});
	
	//密码校验
	$('#loginpassword').bind('blur',function(){
		var filter=/^[a-zA-Z0-9_]{5,18}$/;
		
		if( $(this).val() =="" || $(this).val==null ){
			$('.err_password_login').addClass('error').text('* 密码不能为空 !');
			$(this).focus();
			$('.err_password_login').css("display","block");
		}
		if($(this).val()!=""){
			var str = $(this).val();
			str = str.replace(/\s/g , '');//输入空格时自动忽略，\s表示空格
			if(filter.test( $(this).val() )){
				okpassl=true;
				$('.err_password_login').css("display","none");
			}else if( !filter.test( $(this).val() ) ){
				$('.err_password_login').addClass('error').text('* 密码5-18字符 ,不能有特殊字符!');
				$(this).focus();
				$('.err_password_login').css("display","block");
			}
		}
	});
	
	//验证码验证
	$('#loginverify').bind('keyup',function(){
		if( $(this).val() == "" || $(this).val==null ){
			$('.err_verify_login').css("display","block");
			$('.err_verify_login').addClass('error').text('* 验证码不能为空 !');
			$(this).focus();
			
		}else{
			$('.err_verify_login').css("display","none");
			okverifyl=true;
		}
	});
	
	
	//AJAX实现登录
	$('form').eq(0).bind('submit',function(e){
		
		if(oknamel && okpassl && okverifyl){
			layer.msg('正在登录',{offset: 0,time:2000});
			//收集表单信息
			var um=$('#loginusername').val();
			var pw=$('#loginpassword').val();
			var vf=$('#loginverify').val();
			
			var info="username="+um+"&password="+pw+"&verify="+vf;
			//1.创建Ajax对象
			var xhr =new XMLHttpRequest();

			//给Ajax设置事件
			xhr.onreadystatechange=function()
			{
			if (xhr.readyState==4 && xhr.status==200)
			  {
				//将字符串转化为对象
				eval("var js_info="+xhr.responseText);
				
				//根据返回的信息判断是否登录成功
				if(js_info.status==1){
					layer.msg(js_info.content, {icon: 1});
					window.location.href=MODULE+"/Index/index";
					/*$('#regErr').css("display","block").css("border-color","green");
					$('#regErr').addClass('error').html(js_info.content);*/
				}else if(js_info.status==0){
					layer.msg(js_info.content, {icon: 2});
				}else if(js_info.status==2){
					layer.msg(js_info.content, {icon: 2});
				}
				
			  }
			}

			//2.创建新的http请求，并设置新的请求地址
			xhr.open("post",MODULE+"/User/Login");
			
			xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			//3.发送请求
			xhr.send(info);
			
			
			
		}else{
			 layer.msg('请填写完整或校验通过',{time:2000});
		}
		e.preventDefault();
		
	});
	
});



/* 注册校验
 * 并通过AJAX进行注册 
 */

$(function(){
	var okname=false;
	var okpass=false;
	var okemail=false;
	var okverify=false;
	
	//用户名验证
	$('#zhuusername').bind('blur',function(){
		var filter=/^[a-zA-Z\u4e00-\u9fa5]{1}[a-zA-Z0-9_\u4e00-\u9fa5]{1,8}$/;
		
		if( $(this).val() ==""|| $(this).val==null ){
			$('.err_username').css("display","block").css("border-color","red");
			$('.err_username').addClass('error').text('* 用户名不能为空 !');
			$(this).focus();
			
		}
		if($(this).val()!=""){
			
			var str = $(this).val();
			str = str.replace(/\s/g , '');//输入空格时自动忽略，\s表示空格
			if(filter.test( $(this).val() )){
				
				
				$('.err_username').css("display","none");
			
			    //Ajax 校验用户名是否被占用
				
				//1.创建Ajax对象
				var xhr =new XMLHttpRequest();

				//给Ajax设置事件
				xhr.onreadystatechange=function()
				{
				if (xhr.readyState==4 && xhr.status==200)
				  {
					//将字符串转化为对象
					eval("var js_info="+xhr.responseText);
					
				    //根据返回的信息判断用户名是否可用，1为可用，0为不可用
					if(js_info.status){
						$('.err_username').css("display","block").css("border-color","green");
						$('.err_username').addClass('error').html(js_info.content);
						okname=true;
					}else{
						$('.err_username').css("display","block").css("border-color","red");
						$('.err_username').addClass('error').html(js_info.content);
					}
					
				  
				  }
				}

				//2.创建新的http请求，并设置新的请求地址
				xhr.open("get",MODULE+"/User/checkNm/name/"+$(this).val());
				 
				//3.发送请求
				xhr.send(null);
				
				
				
				
			}else if( !filter.test( $(this).val() )){
				$('.err_username').addClass('error').text('* 用户名为2-9字符,首字不为数字,无特殊字符 !');
				$(this).focus();
				$('.err_username').css("display","block").css("border-color","red");
			}
		}
	});
	
	//密码验证
	$('#zhupassword').bind('blur',function(){
		var filter=/^[a-zA-Z0-9_]{5,18}$/;
		
		if( $(this).val() =="" || $(this).val==null ){
			$('.err_password').addClass('error').text('* 密码不能为空 !');
			$(this).focus();
			$('.err_password').css("display","block");
		}
		if($(this).val()!=""){
			var str = $(this).val();
			str = str.replace(/\s/g , '');//输入空格时自动忽略，\s表示空格
			if(filter.test( $(this).val() )){
				okpass=true;
				$('.err_password').css("display","none");
			}else if( !filter.test( $(this).val() ) ){
				$('.err_password').addClass('error').text('* 密码5-18字符 ,不能有特殊字符!');
				$(this).focus();
				$('.err_password').css("display","block");
			}
		}
	});
	
	//邮箱验证
	$('#zhuemail').bind('blur',function(){
		var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
		if( $(this).val() == "" || $(this).val==null ){
			$('.err_email').addClass('error').text('* 邮箱不能为空 !');
			$(this).focus();
			$('.err_email').css("display","block");
		}
		if($(this).val()!=""){
			var str = $(this).val();
			str = str.replace(/\s/g , '');//输入空格时自动忽略，\s表示空格
			if( filter.test($(this).val())){
				okemail=true;
				$('.err_email').css("display","none");
				var email=encodeURIComponent($(this).val());
                 //Ajax 校验邮箱是否被占用
				
				//1.创建Ajax对象
				var xhr =new XMLHttpRequest();

				//给Ajax设置事件
				xhr.onreadystatechange=function()
				{
				if (xhr.readyState==4 && xhr.status==200)
				  {
					//将字符串转化为对象
					eval("var js_info="+xhr.responseText);
					
					//根据返回的信息判断邮箱是否可用，1为可用，0为不可用
					if(js_info.status){
						$('.err_email').css("display","block").css("border-color","green");
						$('.err_email').addClass('error').html(js_info.content);
					}else{
						$('.err_email').css("display","block").css("border-color","red");
						$('.err_email').addClass('error').html(js_info.content);
					}
					
				
				  
				  }
				}

				//2.创建新的http请求，并设置新的请求地址
				xhr.open("get",MODULE+"/User/CheckEmail/email/"+email);


				 
				//3.发送请求
				xhr.send(null);
				
				
			}else if( !filter.test($(this).val())){
				$('.err_email').addClass('error').text('* 邮箱格式不正确 !');
				$(this).focus();
				$('.err_email').css("display","block");
				
			 }
			
		}
		
	});
	
	
	
	//验证码验证
	$('#regverify').bind('blur',function(){
		if( $(this).val() == "" || $(this).val==null ){
			$('.err_verify_r').css("display","block");
			$('.err_verify_r').addClass('error').text('* 验证码不能为空 !');
			$(this).focus();
			
		}else{
			$('.err_verify_r').css("display","none");
			okverify=true;
		}
	});
	
	//禁止表单提交
	/*
	 * AJAX注册用户
	 */
	$('form').eq(1).bind('submit',function(e){
		
		if(okname && okpass && okemail && okverify){
			layer.msg('正在注册',{offset: 0,time:2000});
			//收集表单信息
			var um=$('#zhuusername').val();
			var pw=$('#zhupassword').val();
			var em=$('#zhuemail').val();
			var vf=$('#regverify').val();
			var info="username="+um+"&password="+pw+"&email="+em+"&verify="+vf;
			//1.创建Ajax对象
			var xhr =new XMLHttpRequest();

			//给Ajax设置事件
			xhr.onreadystatechange=function()
			{
			if (xhr.readyState==4 && xhr.status==200)
			  {
				//将字符串转化为对象
				eval("var js_info="+xhr.responseText);
				
				//根据返回的信息判断是否注册成功
				if(js_info.status==1){
					layer.msg(js_info.content, {icon: 1});
					/*$('#regErr').css("display","block").css("border-color","green");
					$('#regErr').addClass('error').html(js_info.content);*/
				}else if(js_info.status==0){
					layer.msg(js_info.content, {icon: 2});
				}else if(js_info.status==2){
					$('#regErr').css("display","block").css("border-color","red");
					$('#regErr').addClass('error').text(js_info.content);
					$('#regErr').focus();
				}
				
			  }
			}

			//2.创建新的http请求，并设置新的请求地址
			xhr.open("post",MODULE+"/User/register");
			
			xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			//3.发送请求
			xhr.send(info);
			
			
			
		}else{
			 layer.msg('请填写完整或校验通过',{time:2000});
		}
		e.preventDefault();
		
		
	});
	
	
	
});






        
        
        
        
        
        
        
        
        
        
        
        
        
        