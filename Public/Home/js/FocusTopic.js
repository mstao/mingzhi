/**
 * 关注话题与取消关注
 */

$(function(){
	$(document).on('click','.topic-focus-btn',function(){
		
		//获取当前话题的id
		var topic_id=$(this).attr('data-topic-id');
		var mythis=$(this);
		$.ajax({
			type:'post',
			dataType:'json',
			url:MODULE+'/Index/focusOrNoTopic',
			data:'tid='+topic_id,
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
					//状态为1，代表话题已关注，做取消关注操作
					if(data.content==1){
						mythis.text('取消关注');
						if(mythis.hasClass("topic-button")){
							mythis.css('backgroundColor','#EEEEEE').css('color','#666666');
							
						}
						

					}else if(data.content==0){
						if(mythis.hasClass("topic-button")){
							mythis.text('关注');
							mythis.css('backgroundColor','#0F88EB').css('color','#FFFFFF');
						}else{
							mythis.html("<img src='"+HOME_IMAGES+"/add.png'>关注");
						}
					}
					
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
		
		
		
	});

});