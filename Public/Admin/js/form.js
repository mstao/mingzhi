$(function(){
	var oknamel=false;
	var okpassl=false;
	
	//对用户名和密码进行校验
    //对用户名校验
	
	$('#loginusername').bind('blur',function(){
		var filter=/^[a-zA-Z\u4e00-\u9fa5]{1}[a-zA-Z0-9_\u4e00-\u9fa5]{1,8}$/;
	
		if( $(this).val() =="" || $(this).val==null ){
			
			layer.msg('* 用户名不能为空 !');
			$(this).focus();
			
		}
		if($(this).val()!=""){
			
			var str = $(this).val();
			str = str.replace(/\s/g , '');//输入空格时自动忽略，\s表示空格
			if(filter.test( $(this).val() )){
				oknamel=true;			
									
				
			}else if( !filter.test( $(this).val() )){
				layer.msg('* 用户名为2-9字符,首字不为数字,无特殊字符 !');
				$(this).focus();
			}
		}
	});
	
	//密码校验
	$('#loginpassword').bind('blur',function(){
		var filter=/^[a-zA-Z0-9_]{5,18}$/;
		
		if( $(this).val() =="" || $(this).val==null ){
			layer.msg('* 密码不能为空 !');
			$(this).focus();
			
		}
		if($(this).val()!=""){
			var str = $(this).val();
			str = str.replace(/\s/g , '');//输入空格时自动忽略，\s表示空格
			if(filter.test( $(this).val() )){
				okpassl=true;
				
			}else if( !filter.test( $(this).val() ) ){
				layer.msg('* 密码5-18字符 ,不能有特殊字符!');
				$(this).focus();
				
			}
		}
	});
	
	$('.btn').bind('click',function(){
		var filter=/^[a-zA-Z\u4e00-\u9fa5]{1}[a-zA-Z0-9_\u4e00-\u9fa5]{1,8}$/;
		var usrname_link=$('#loginusername');
		if( usrname_link.val() =="" ||usrname_link.val==null ){
			
			layer.msg('* 用户名不能为空 !');
			usrname_link.focus();
			
		}
		if(usrname_link.val()!=""){
			
			var str = usrname_link.val();
			str = str.replace(/\s/g , '');//输入空格时自动忽略，\s表示空格
			if(filter.test( usrname_link.val() )){
				oknamel=true;			
									
				
			}else if( !filter.test( $(this).val() )){
				layer.msg('* 用户名为2-9字符,首字不为数字,无特殊字符 !');
				usrname_link.focus();
			}
		}
		
		
        var filter=/^[a-zA-Z0-9_]{5,18}$/;
		var pwd_link=$('#loginpassword');
		if( pwd_link.val() =="" || pwd_link.val==null ){
			layer.msg('* 密码不能为空 !');
			pwd_link.focus();
			
		}
		if(pwd_link.val()!=""){
			var str = pwd_link.val();
			str = str.replace(/\s/g , '');//输入空格时自动忽略，\s表示空格
			if(filter.test( pwd_link.val() )){
				okpassl=true;
				
			}else if( !filter.test(pwd_link.val() ) ){
				layer.msg('* 密码5-18字符 ,不能有特殊字符!');
				pwd_link.focus();
				
			}
		}
		
	});
	
	
	//AJAX实现登录
	$('form').eq(0).bind('submit',function(e){
		if(oknamel && okpassl){
			layer.msg('正在登录',{offset: 0,time:2000});
			
			//收集表单信息
			var um=$('#loginusername').val();
			var pw=$('#loginpassword').val();
			$.ajax({
				type:'post',
				dataType:'json',
				url:MODULE+'/AdminUser/Login',
				data:{'um':um,'pw':pw},
				beforeSend:function(){
					//显示正在加载
					/*layer.load(2);*/
				},
				success:function(data){

					//关闭正在加载
					/*setTimeout(function(){
						  layer.closeAll('loading');
					}, 1000);*/
					layer.msg(data.content, {icon: 1});
					window.location.href=MODULE+"/Index/index";
				},
				error:function(){

					//关闭正在加载
					/*setTimeout(function(){
					  layer.closeAll('loading');
					}, 1000);*/
					layer.msg(AJAX_ERROR, {icon: 2,time:2000});
			    }
			});
		}else{
			layer.msg('请将登录信息填写完整或校验通过');
		}
		
	});
	
});