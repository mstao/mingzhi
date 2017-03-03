/**
 * 问题的关注和取消关注
 */
$(function(){
	$(document).on('click','.focus-question-btn',function(){
		//获取当前问题id
		var qid=$(this).prev('.hide_question_id').val();
		var mythis = $(this);
		$.ajax({
				type:'post',
				dataType:'json',
				url:MODULE+'/Index/focusOrNoQuestion',
				data:'qid='+qid,
				beforeSend:function(){
					//显示正在加载
					/*layer.load(1);*/
				},
				success:function(data){

					//关闭正在加载
					/*setTimeout(function(){
						  layer.closeAll('loading');
					}, 1000);*/
					
					if(data.status==1){
						//判断用户关注问题状态
						if(data.content.status==1){
							
							//此时用户已关注问题，渲染为取消关注
							mythis.html("取消关注");
						   
						}else if(data.content.status==0){
							//此时用户已取消关注问题，渲染为关注问题
							mythis.html("关注问题");
							
						}
					}else{
						layer.msg(data.content, {icon: 2,time:2000});
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