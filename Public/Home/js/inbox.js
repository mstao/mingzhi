$(function(){
	$(document).on('input propertychange focus','.openModal-sixin-content',function(){
		var search_input=$(this).val();
		var mythis=$(this);
		//判断输入内容是否为空
		if(search_input.replace(/(^\s*)|(\s*$)/g,"")==""){
			mythis.next().fadeOut('normal');
		}else{
			
			$.ajax({
				type:'post',
				dataType:'json',
				url:MODULE+'/Inbox/getUserInfo',
				data:{'token':search_input},
				beforeSend:function(){
					//显示正在加载
					 mythis.next().html('<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
				},
				success:function(data){

					//关闭正在加载
				/*	setTimeout(function(){
						  layer.closeAll('loading');
					});
					*/
			
					if(data.status==1){
					  //layer.msg('获取信息');
					  var inHtml=""; 
					  var x;

					 if(data.content.length!=0 ){
						 mythis.next().fadeIn('normal');
						  inHtml+="<ul>";
						  
						  for(x in data.content){
							  inHtml+="<li><a href='javascript:void(0);' class='inbox-list'><span class='inbox-list-name' data-uid='"+data.content[x].id+"'>"+data.content[x].username+"</span><span>"+data.content[x].tag+"</span></a></li>";
						  }
						  inHtml+="</ul>";
						  
					  }else{
						  mythis.next().fadeOut('normal');
					  }
					  

					 mythis.next().html(inHtml);
					  
					 
					  
					
					}else{
						layer.msg(AJAX_ERROR, {icon: 2,time:2000});
					}
					
					
					
				},
				error:function(){

					//关闭正在加载
					/*setTimeout(function(){
					  layer.closeAll('loading');
					}, 1000);*/
					layer.msg(AJAX_ERROR, {icon: 2,time:2000});
			    }
			});
			
		}
	});
	
	$(document).on('click','.inbox-list',function(){
		mythis=$(this);
		var name=mythis.find('.inbox-list-name').text();
		var uid=mythis.find('.inbox-list-name').attr('data-uid');
		name=name;
		$('.openModal-sixin-content').val(name);
	});
	
	$(document).on('keydown','.openModal-sixin-content',function(event){
		var e = event || window.event || arguments.callee.caller.arguments[0];
          if((e && e.keyCode==8) || (e && e.keyCode==46)){ // 按back 或者del
              //要做的事情
        	  $(this).val('');
            }
         
	});
	
	$(document).on('click','.letter_submit',function(){
		var  username=$('.openModal-sixin-content').val();
		var  content=$('.openModal-sixin-desc').val();
		if(username.replace(/(^\s*)|(\s*$)/g,"")=="" || content.replace(/(^\s*)|(\s*$)/g,"")==""){
			layer.msg('用户名和私信内容不能为空');
		}else{
			$.ajax({
				type:'post',
				dataType:'json',
				url:MODULE+'/Inbox/writeInbox',
				data:{'um':username,'con':content},
				beforeSend:function(){
					//显示正在加载
					layer.load(2); 
				},
				success:function(data){

					//关闭正在加载
					setTimeout(function(){
						  layer.closeAll('loading');
					});
					
					if(data.status==1){
						layer.msg('私信发送成功！');
					}else if(data.status==0){
						layer.msg('私信发送失败！请重新发布');
					}else if(data.status==2){
						layer.msg('用户名不存在,请重新填写用户名');
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
		}	
	});
	
	
	/**
	 * 删除私信
	 */
	$(document).on('click','.delbtn',function(){
		var iid=$(this).attr('data-inbox-id');
		$.ajax({
			type:'post',
			dataType:'json',
			url:MODULE+'/Inbox/delInbox',
			data:{'iid':iid},
			beforeSend:function(){
				//显示正在加载
				layer.load(2); 
			},
			success:function(data){

				//关闭正在加载
				setTimeout(function(){
					  layer.closeAll('loading');
				});
				
				if(data.status==1){
					layer.msg('私信删除成功！');
					window.location.href=SELF;
					
				}else{
					layer.msg('私信发送失败！请重新删除');
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
	
	
});