/**
 * 
 *  我的主页Ajax 
 */
$(document).ready(function() {  
	
	/***上传头像**/
	var progress = $(".progress"); 
	var progress_bar = $(".progress-bar");
	var percent = $('.percent');
	$('.add_button_avatar').bind('click',function(){
		 $("#myupload").ajaxSubmit({ 
			    type: 'post',
		  		dataType:  'json', //数据格式为json 
		  		url:MODULE+'/User/UploadAvatar',
		  		beforeSend: function() { //开始上传 
		  			progress.show();
		  			var percentVal = '0%';
		  			progress_bar.width(percentVal);
		  			percent.html(percentVal);
		  		}, 
		  		uploadProgress: function(event, position, total, percentComplete) { 
		  			var percentVal = percentComplete + '%'; //获得进度 
		  			progress_bar.width(percentVal); //上传进度条宽度变宽 
		  			percent.html(percentVal); //显示上传进度百分比 
		  		}, 
		  		success: function(data) {		  		
					if(data.status == 1){
						layer.msg('头像上传成功', {icon: 1,time:2000});
						var imgurl=data.content;
						$('.mytouxiangimg').attr('src',imgurl);
						$('.myright_avatar_reset').trigger('click');
					}else{
						layer.msg(data.content, {icon: 2,time:2000});
					}
		  			progress.hide();
		  			//$('.mark,.checkimage-dialog').hide();
		  		}, 
		  		error:function(xhr){ //上传失败 
		  		    layer.msg(AJAX_ERROR, {icon: 2,time:2000}); 
		  		    progress.hide(); 
		  		} 
		  	}); 
	});
	
	
	/***修改用户名**/
	$('.add_button_name').bind('click',function(){
		var name=$('.myname_tag_hidd_edit').text();
		name=name.replace(/\s/g, "");
		if(name==$('.myname_con').text()){
			layer.msg('用户名不变,无法更改', {icon: 2,time:2000});
			return false;
		}
		$.ajax({
			type:'post',
			dataType:'json',
			url:MODULE+'/User/UpdateUserName',
			data:'name='+name,
			beforeSend:function(){
				//显示正在加载
				layer.load(1);
			},
			success:function(data){

				//关闭正在加载
				setTimeout(function(){
					  layer.closeAll('loading');
				}, 1000);
				
				if(data.status==1){
					layer.msg('更改成功', {icon: 1,time:1000});
					$('.myname_con').text(data.content);
					$('.myname_header').text(data.content);
					$('.myname_tag_reset').trigger('click');
				}else{
					layer.msg(data.content, {icon: 2,time:1000});
				}
			},
			error:function(){

				//关闭正在加载
				setTimeout(function(){
					  layer.closeAll('loading');
				}, 1000);
				layer.msg(AJAX_ERROR, {icon: 2,time:2000});
			}
		});
	});
	
	/**修改一句话介绍自己**/
	
	$('.add_button_biaoqian').bind('click',function(){
		var biaoqian=$('.mybiaoqian_tag_hidd_edit').text();
		biaoqian=biaoqian.replace(/\s/g, "");
		if(biaoqian==$('.biaoqian_con').text()){
			layer.msg('一句话介绍内容不变,无法更改', {icon: 2,time:2000});
			return false;
		}
		$.ajax({
			type:'post',
			dataType:'json',
			url:MODULE+'/User/UpdateIntroduction',
			data:'tag='+biaoqian,
			beforeSend:function(){
				//显示正在加载
				layer.load(1);
			},
			success:function(data){

				//关闭正在加载
				setTimeout(function(){
					  layer.closeAll('loading');
				}, 1000);
				
				if(data.status==1){
					layer.msg('更改成功', {icon: 1,time:1000});
					$('.biaoqian_con').text(data.content);	
					//在具体编辑我的信息时  给  编辑我的一句话介绍  注册取消点击事件
				    $('.myright_tag_reset').trigger('click');
				    //在我的主页   给  编辑我的一句话介绍  注册取消点击事件
				    $('.mybiaoqian_tag_reset').trigger('click');
				}else{
					layer.msg(data.content, {icon: 2,time:2000});
				}
			},
			error:function(){

				//关闭正在加载
				setTimeout(function(){
					  layer.closeAll('loading');
				}, 1000);
				layer.msg(AJAX_ERROR, {icon: 2,time:2000});
			}
		});
	});
	
	/**修改性别信息**/
	$('.add_button_sex').bind('click',function(){
		var sex=$("input[name='sex']:checked").next("label").text();
		$.ajax({
			type:'post',
			dataType:'json',
			url:MODULE+'/User/UpdateSex',
			data:'sex='+sex,
			beforeSend:function(){
				//显示正在加载
				layer.load(1);
			},
			success:function(data){

				//关闭正在加载
				setTimeout(function(){
					  layer.closeAll('loading');
				}, 1000);
				
				if(data.status==1){
					layer.msg('更改成功', {icon: 1,time:1000});
					$('.info_sex').text(data.content);	
				    $('.myright_sex_reset').trigger('click');
				}else{
					layer.msg(data.content, {icon: 2,time:2000});
				}
			},
			error:function(){

				//关闭正在加载
				setTimeout(function(){
					  layer.closeAll('loading');
				}, 1000);
				layer.msg(AJAX_ERROR, {icon: 2,time:2000});
			}
		});
	});
	
	/**Ajax 描述一下自己**/
	$('.add_button_desc').bind('click',function(){
		var desc=$('.myright_desc_hidd_edit').text();
		$.ajax({
			type:'post',
			dataType:'json',
			url:MODULE+'/User/UpdateDesc',
			data:'desc='+desc,
			beforeSend:function(){
				//显示正在加载
				layer.load(1);
			},
			success:function(data){

				//关闭正在加载
				setTimeout(function(){
					  layer.closeAll('loading');
				}, 1000);
				
				if(data.status==1){
					layer.msg('更改成功', {icon: 1,time:1000});
					$('.info_desc').text(data.content);	
				    $('.myright_desc_reset').trigger('click');
				}else{
					layer.msg(data.content, {icon: 2,time:2000});
				}
			},
			error:function(){

				//关闭正在加载
				setTimeout(function(){
					  layer.closeAll('loading');
				}, 1000);
				layer.msg(AJAX_ERROR, {icon: 2,time:2000});
			}
		});
	});
	
	
	/**Ajax 选择职业**/
	
	$('.add_button_profession').bind('click',function(){
		var job=$('.myprofession_check option:selected').val();
		$.ajax({
			type:'post',
			dataType:'json',
			url:MODULE+'/User/UpdateJob',
			data:'job='+job,
			beforeSend:function(){
				//显示正在加载
				layer.load(1);
			},
			success:function(data){

				//关闭正在加载
				setTimeout(function(){
					  layer.closeAll('loading');
				}, 1000);
				
				if(data.status==1){
					layer.msg('更改成功', {icon: 1,time:1000});
					$('.info_profession').text(data.content);	
				    $('.myright_profession_reset').trigger('click');
				}else{
					layer.msg(data.content, {icon: 2,time:2000});
				}
			},
			error:function(){

				//关闭正在加载
				setTimeout(function(){
					  layer.closeAll('loading');
				}, 1000);
				layer.msg(AJAX_ERROR, {icon: 2,time:2000});
			}
		});
	});
	
	
	//AJAX获取用户行为记录
	var track_click =0;  //点击加载更多 track_click+1  初始为0
    
	//总的行为记录
	$('.js-load-more-index').bind('click',function(){		
		track_click++;
		if(track_click < r_p){
			$.ajax({
				type:'get',
				dataType:'html',
				url: MODULE+'/Profile/index',
				data:'p='+track_click+'&u='+u,
				beforeSend:function(){
					//显示正在加载
					$('.loading_image').css('visibility','visible');
					$('.loading_span').css('display','none');
				},
				success:function(data){
					$('.loading_image').css('visibility','hidden');
					$('.loading_span').css('display','inline-block');
					//将通过ajax获取的数据追加到页面中
					$('.mytrends_content').append(data);
					
					//加载js渲染页面
					$.getScript(PUBLIC_PATH+"Home/js/js.js");
				},
				error:function(){

					layer.msg(AJAX_ERROR, {icon: 2,time:2000});
				}
			});
			}else{
				$('.loading_span').text('已经没有数据了哦');
			}
	});
	
	//用户提出问题
	$('.js-load-more-question').bind('click',function(){		
		track_click++;
		if(track_click < r_p){
			$.ajax({
				type:'get',
				dataType:'html',
				url: MODULE+'/Profile/index',
				data:'p='+track_click+'&u='+u+'&sel=question',
				beforeSend:function(){
					//显示正在加载
					$('.loading_image').css('visibility','visible');
					$('.loading_span').css('display','none');
				},
				success:function(data){
					$('.loading_image').css('visibility','hidden');
					$('.loading_span').css('display','inline-block');
					//将通过ajax获取的数据追加到页面中
					$('.mytrends_content').append(data);

				},
				error:function(){

					layer.msg(AJAX_ERROR, {icon: 2,time:2000});
				}
			});
			}else{
				$('.loading_span').text('已经没有数据了哦');
			}
	});
	
	//用户的回答
	$('.js-load-more-answer').bind('click',function(){		
		track_click++;
		if(track_click < r_p){
			$.ajax({
				type:'get',
				dataType:'html',
				url: MODULE+'/Profile/index',
				data:'p='+track_click+'&u='+u+'&sel=answer',
				beforeSend:function(){
					//显示正在加载
					$('.loading_image').css('visibility','visible');
					$('.loading_span').css('display','none');
				},
				success:function(data){
					$('.loading_image').css('visibility','hidden');
					$('.loading_span').css('display','inline-block');
					//将通过ajax获取的数据追加到页面中
					$('.mytrends_content').append(data);

				},
				error:function(){

					layer.msg(AJAX_ERROR, {icon: 2,time:2000});
				}
			});
			}else{
				$('.loading_span').text('已经没有数据了哦');
			}
	});
	
	//赞同了回答
	$('.js-load-more-upvote').bind('click',function(){		
		track_click++;
		if(track_click < r_p){
			$.ajax({
				type:'get',
				dataType:'html',
				url: MODULE+'/Profile/index',
				data:'p='+track_click+'&u='+u+'&sel=upvote',
				beforeSend:function(){
					//显示正在加载
					$('.loading_image').css('visibility','visible');
					$('.loading_span').css('display','none');
				},
				success:function(data){
					$('.loading_image').css('visibility','hidden');
					$('.loading_span').css('display','inline-block');
					//将通过ajax获取的数据追加到页面中
					$('.mytrends_content').append(data);

				},
				error:function(){

					layer.msg(AJAX_ERROR, {icon: 2,time:2000});
				}
			});
			}else{
				$('.loading_span').text('已经没有数据了哦');
			}
	});
	
});




/*$(function(){
	
	//创建ajax对象函数
	function createAjax(){
		if(window.ActiveXObject){
			var newRequest = new ActiveXObject("Microsoft.XMLHTTP");
		}else{
			var newRequest = new XMLHttpRequest();
		}
		return newRequest;
	}
	
	//点击上传图片 
	
	$('.add_button_avatar').bind('click',function(){
		
		//显示正在加载
		layer.load(1);
		var fileObj=$('.checkmyavatar').files[0];
		var form = new FormData();
	    form.append("myavatar", fileObj);
	    xhr = createAjax();
	    xhr.onreadystatechange = handleStateChange;
        xhr.open("post", MODULE+"/User/UploadAvatar", true);
        xhr.send(form);
		
	});
	function handleStateChange(){
		if (xhr.readyState==4 && xhr.status==200){
	         //关闭正在加载
			setTimeout(function(){
			layer.closeAll('loading');
			}, 1000);
			//将字符串转化为对象
			eval("var js_info="+xhr.responseText);
			//根据返回的信息判断是否发起问题成功
			if(js_info.status==1){
				layer.msg(js_info.content, {icon: 1,time:2000});					
			}else if(js_info.status==2){
				layer.msg(js_info.content, {icon: 2});
			}else if(js_info.status==3){
				layer.msg(js_info.content, {icon: 2});
		    }
	      }
	}
	        
	
});*/