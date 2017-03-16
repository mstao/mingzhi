/**
 * 
 *  各种搜索提示 
 */

$(function(){
	
	/**
	 *导航栏搜索结果提示 
	 */
	
	$(document).on('input propertychange focus','.searchinput',function(){
		//获取当前输入框输入内容
		var search_input=$(this).val();
		var mythis=$(this);
		//判断输入内容是否为空
		if(search_input.replace(/(^\s*)|(\s*$)/g,"")==""){
			mythis.parent().parent().next().fadeOut('normal');
		}else{
			mythis.parent().parent().next().fadeIn("normal");;
			
			$.ajax({
				type:'post',
				dataType:'json',
				url:MODULE+'/Suggest/searchAutoComplete',
				data:{'token':search_input},
				beforeSend:function(){
					//显示正在加载
					//layer.load(2);
					mythis.parent().parent().next().html('<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
				},
				success:function(data){

					//关闭正在加载
					/*setTimeout(function(){
						  layer.closeAll('loading');
					});*/
					
			
					if(data.status==1){
					  //layer.msg('获取信息');
					  var inHtml=""; 
					  var x;

					 if(data.content.question.length!=0 ){
			  
						  inHtml+="<div class='search-content'><p>问题</p><div class='search-content-t'><ul>";
						  
						  for(x in data.content.question){
							  inHtml+="<li><a href='"+DEFAULT_QUESTION_URL+""+data.content.question[x].id+"'>"+data.content.question[x].question_name+"<span>"+data.content.question[x].answer_count+"个回答</span></a></li>";
						  }
						  inHtml+="</ul></div></div>";
 
					  }
					  if(data.content.topic.length!=0){
						  inHtml+="<div class='search-topic'><p>话题</p><div class='search-topic-o'><ul>";
						  for(x in data.content.topic){
							  inHtml+="<li><a href='"+DEFAULT_TOPIC_URL+""+data.content.topic[x].id+"/sel/trends'><span>"+data.content.topic[x].topic_name+"</span>&nbsp;"+data.content.topic[x].question_count+"个问题</a></li>";
						  }
						  inHtml+="</ul></div></div>";
					  }
					  if(data.content.user.length!=0){
						  inHtml+="<div class='search-user'><p>用户</p><div class='search-user-t'><ul>";
					      for(x in data.content.user){
					    	  inHtml+="<li><a href='"+DEFAULT_USER_URL+""+data.content.user[x].id+"'>"+data.content.user[x].username+"<span>"+data.content.user[x].tag+"</span></a></li>";
					      }
					      inHtml+="</ul></div></div>";
					  }

					  if(data.content.question.length!=0 || data.content.topic.length!=0 || data.content.user.length!=0){
						  inHtml+="<div class='search-look-all-result'><a href='#'>查看全部搜索结果</a></div>";
					  }else{
						  inHtml+="<div class='search-look-all-result'><a href='javascript:void(0);'>暂无搜索结果</a></div>";
					  }
					  
					  mythis.parent().parent().next().html(inHtml);
					  
					
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
	
	
	/**
	 * 提问页面问题 自动提示
	 */
	$(document).on('input propertychange focus','.openModal-question-content',function(){
		var search_input=$(this).val();
		var mythis=$(this);
		//判断输入内容是否为空
		if(search_input.replace(/(^\s*)|(\s*$)/g,"")==""){
			mythis.next().fadeOut('normal');
		}else{
			
			$.ajax({
				type:'post',
				dataType:'json',
				url:MODULE+'/Suggest/questionAutoComplete',
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

					 if(data.content.question.length!=0 ){
						 mythis.next().fadeIn('normal');
						  inHtml+="<ul>";
						  
						  for(x in data.content.question){
							  inHtml+="<li><a href='"+DEFAULT_QUESTION_URL+""+data.content.question[x].id+"'>"+data.content.question[x].question_name+"<span>"+data.content.question[x].answer_count+"个回答</span></a></li>";
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
	
	
	/**
	 * 点击搜索按钮
	 */
	$(document).on('click','.search_btn',function(){
		//获取要搜索的内容
		var token=$(this).prev().val();
		if(token.replace(/(^\s*)|(\s*$)/g,"")==""){
			layer.msg('请输入搜索内容哦(*^_^*)');
		}else{
			window.location.href=MODULE+"/Search/search?token="+token;
		}
	});
});