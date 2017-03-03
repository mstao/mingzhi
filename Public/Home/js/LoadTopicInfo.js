$(function(){
	$(document).on('mouseenter','.enter-topicname',function(){
		//获取当前topic id
		var topic_id=$(this).attr('data-topic-id');
		
		var mythis=$('+div>div>div:nth-child(1)',this);
		var mythis2=$('+div>div>div:nth-child(2)',this);
		//根据当前topic_id获取topic信息
		$.ajax({
			type:'post',
			dataType:'json',
			url:MODULE+'/Index/loadTopicInfo',
			data:'tid='+topic_id,
			beforeSend:function(){
				//显示正在加载
				//layer.load(1);
				//$(this).next('div').html('<img src="__HOME_IMAGES__/loading.gif" class="loading_image"/><span>加载中...</span>');
			  mythis.html("<img src='"+HOME_IMAGES+"/loading_blue.gif' class='loading_image'/><span class='loading-span'>加载中...</span>");
				
			},
			success:function(data){

				//关闭正在加载
				/*setTimeout(function(){
					  layer.closeAll('loading');
				}, 1000);*/
				
				if(data.status==1){
					//状态为1，代表话题话题信息已获取到，将信息填充到模板中
				    
					//先填充话题信息
					mythis.html("<div class='topicinfomytouxiang'><a href='#'><img src='"+data.content.topic_pic+"' width='40' height='40'/></a></div><div class='topicinforightcontent'><div class='topicinfoname'><a href='"+MODULE+"/Topic/index/tid/"+data.content.topic_id+"/sel/trends'>"+data.content.topic_name+"</a></div><div class='topicinfonameanswer'>"+data.content.topic_desc+"</div></div>");
                    
					//再填充与话题有关的统计信息
					mythis2.find('.topic-question-count').text(data.content.question_count);
					mythis2.find('.topic-hot-question-count').text(data.content.hot_question_count);
					mythis2.find('.topic-foucs-person-count').text(data.content.topic_focus_count);
					
					//根据当前用户对该话题的关注状态进行渲染
					if(data.content.focus_status==0){
						mythis2.find('.topic-focus-btn').html("<img src='"+HOME_IMAGES+"/add.png' style='position:relative;top:3px;'/>关注");

					}else if(data.content.focus_status==1){
						mythis2.find('.topic-focus-btn').text('取消关注');
						
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