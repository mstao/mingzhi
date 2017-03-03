$(function(){
	//评论  回答
	$(document).on('click','.replay-other-btn',function(){
		var aid=$(this).attr('data-answer-id');
		var content=$(this).parent().parent().prev().find('.mycomment_input').text();
		var mythis=$(this);
		if(content.replace(/(^\s*)|(\s*$)/g,"")==""){
			layer.msg('评论内容不能为空');
		}else{
			//调用ajax向后台传送数据
			$.ajax({
				type:'post',
				dataType:'json',
				url:MODULE+'/Index/commentAnswer',
				data:{'aid':aid,'content':content},
				beforeSend:function(){
					//显示正在加载
					//layer.load(1);
				},
				success:function(data){

					//关闭正在加载
					/*setTimeout(function(){
						  layer.closeAll('loading');
					}, 1000);*/
					
					if(data.status==1){
						layer.msg('评论成功');
						var mythis2=mythis;
						var aid2=aid;
						
						/***加载评论***/
						
						 //加载评论
						 $.ajax({
								type:'post',
								dataType:'html',
								url:MODULE+'/Index/commentAjax',
								data:{'aid':aid2,'p':0},
								beforeSend:function(){
									//显示正在加载
				                   
								   mythis2.parent().parent().parent().next('.othercomment_info').html("<img src='"+HOME_IMAGES+"/loading_blue.gif' class='loading_image'/><span class='loading-span'>加载评论中...</span>"); 
									
								},
								success:function(html){

								
									 //写入dom内容
									 mythis2.parent().parent().parent().next('.othercomment_info').html(html);
								},
								error:function(){

								
									layer.msg(AJAX_ERROR, {icon: 2,time:2000});
								}
							});
					
						
						/***加载评论***/
						
						
					}else{
						layer.msg(data.content, {icon: 2,time:1000});
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
});