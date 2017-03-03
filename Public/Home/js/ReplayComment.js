$(function(){

	/**
	 * 评论中 用户回复评论
	 */
	
	$(document).on('click','.replay-person-btn',function(){
		
		//获取回答id
		var answer_id=$(this).attr('data-answer-id');
		//获取将要回复人的uid
		var replay_uid=$(this).attr('data-replay-suid');
		//获取回复的评论id
		var comment_id=$(this).attr('data-comment-id');
		//获取回复评论的内容
		var replay_content=$(this).parent().parent().prev().find('.replay-other-input').text();
		
		var mythis=$(this);
		
		if(replay_content.replace(/(^\s*)|(\s*$)/g,"")==""){
			layer.msg('回复内容不能为空');
		}else{
			//调用ajax向后台传送数据
			$.ajax({
				type:'post',
				dataType:'json',
				url:MODULE+'/Index/replayComment',
				data:{'aid':answer_id,'ruid':replay_uid,'content':replay_content,'comment_id':comment_id},
				beforeSend:function(){
					//显示正在加载
					//layer.load(1);
				},
				success:function(data){
					if(data.status==1){
						layer.msg('回复成功');
						var mythis2=mythis;
						var aid2=answer_id;
						
						/****加载评论***/
						 //加载评论
						 $.ajax({
								type:'post',
								dataType:'html',
								url:MODULE+'/Index/commentAjax',
								data:{'aid':aid2,'p':0},
								beforeSend:function(){
									//显示正在加载
				                   
								   mythis2.parent().parent().parent().parent().parent().parent().html("<img src='"+HOME_IMAGES+"/loading_blue.gif' class='loading_image'/><span class='loading-span'>加载评论中...</span>"); 
									
								},
								success:function(html){

									mythis2.parent().parent().parent().parent().parent().parent().html(html);
							     
								},
								error:function(){

								
									layer.msg(AJAX_ERROR, {icon: 2,time:2000});
								}
							});
					
						
						/***加载评论***/
					}
				}
			});
		}
	});
	
});
