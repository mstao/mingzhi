$(function(){
	$(document).on('mouseenter','.enter-topicname',function(){
		//获取当前topic id
		var topic_id=$(this).attr('data-topic-id');
		
		var mythis=$('+div>div',this);
		
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
			  mythis.html('<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
				
			},
			success:function(data){

				//关闭正在加载
				/*setTimeout(function(){
					  layer.closeAll('loading');
				}, 1000);*/
				
				if(data.status==1){
					//状态为1，代表话题话题信息已获取到，将信息填充到模板中
				    
					//先填充话题信息
					
					
                    var vhtml="<div class='topicinfo'><div class='topicinfomytouxiang'><a href='#'>" ;
                    if(data.content.topic_pic == null){
                    	vhtml+="<img src='"+HOME_IMAGES+"/default-topic.png' />" ;
                    }else{
                    	vhtml+="<img src='"+data.content.topic_pic+"' width='40' height='40'/>" ;
                    }	
                    
                    
                    vhtml+="</a></div><div class='topicinforightcontent'><div class='topicinfoname'><a href='"+MODULE+"/Topic/index/tid/"+data.content.topic_id+"/sel/trends'>"+data.content.topic_name+"</a></div><div class='topicinfonameanswer'>"+data.content.topic_desc+"</div></div></div>";
					vhtml+="<div class='topicopinfooperation'>问题：<a href='javascript:void(0);' class='topic-question-count'>"+data.content.question_count+"</a> &nbsp;&nbsp;热点：<a href='javascript:void(0);' class='topic-hot-question-count'>"+data.content.hot_question_count+"</a>&nbsp;&nbsp;关注者:<a href='javascript:void(0);' class='topic-foucs-person-count'>"+data.content.topic_focus_count+"</a><a href='javascript:void(0);' class='topicinfoquxiao topic-focus-btn' data-topic-id='"+data.content.topic_id+"'>";
					
					//根据当前用户对该话题的关注状态进行渲染
					if(data.content.focus_status==0){
						vhtml+="<img src='"+HOME_IMAGES+"/add.png' style='position:relative;top:3px;'/>关注";

					}else if(data.content.focus_status==1){
						vhtml+="取消关注";
						
					}
					vhtml+="</a></div>";
					mythis.html(vhtml);
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