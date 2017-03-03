$(function(){
	/**
	 * 对回复评论的一些操作  包括 
	 * 赞 , 举报
	 */
	
	//对 举报处理
	$(document).on('click','.comment-report-btn',function(){
		//获取评论id
		var comment_id=$(this).closest().find('.hide-comment-id').val();
		
		var mythis=$(this);
		$.ajax({
			type:'post',
			dataType:'json',
			url:MODULE+'/Index/reportComment',
			data:'comment_id='+comment_id,
			beforeSend:function(){
				//显示正在加载
				/*layer.load(1);*/
			},
			success:function(data){

				//关闭正在加载
				/*setTimeout(function(){
					  layer.closeAll('loading');
				}, 1000);*/
				
				if(data.content==0){
					layer.msg('你已经举报过了,系统会为你处理 :)');
				}else{
					//更改显示
					mythis.html("<img src='"+HOME_IMAGES+"/report_blue.png'/><font style='color:#0F88EB;'>已举报</font>");
					layer.msg('你已经举报此问题,系统会为你处理 :)');
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
	});
	
	
	//对点赞处理
	$(document).on('click','.vote-comment-btn',function(){
		var mythis=$(this);
		//获取评论id
		var comment_id=mythis.parent().find('.hide-comment-id').val();
		
		
		$.ajax({
			type:'post',
			dataType:'json',
			url:MODULE+'/Index/upvoteComment',
			data:'comment_id='+comment_id,
			beforeSend:function(){
				//显示正在加载
				/*layer.load(1);*/
			},
			success:function(data){

				//关闭正在加载
				/*setTimeout(function(){
					  layer.closeAll('loading');
				}, 1000);*/
				
				var vote_count_link=mythis.parent().next('.replay-upvote-num').find('i');
				var vote_count=vote_count_link.text();
				
				//content为0 取消赞 点击链接执行的是取消赞操作
				if(data.content==0){
					mythis.html("<img src='"+HOME_IMAGES+"/upvote.png'/> 赞");
					
					vote_count_link.text(parseInt(vote_count)-1);
				}else if(data.content==1){
				//content为1 为点赞 点击链接执行的是点赞操作
					//更改显示
					mythis.html("<img src='"+HOME_IMAGES+"/zan_blue.png'/><font style='color:#0F88EB;'>取消赞</font>");
					vote_count_link.text(parseInt(vote_count)+1);
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
		
		
	});
	
	
});