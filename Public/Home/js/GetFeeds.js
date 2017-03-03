$(function(){
	var track_click = 0;  //点击加载更多 track_click+1  初始为0
	//$('.maincontent').load($request_url,{'p':track_click},function(){track_click++;})
	
	/*$('.js-load-more').bind('click',function(){		
		track_click++;
		if(track_click<feed_all_page){
		$.ajax({
			type:'post',
			dataType:'html',
			url: MODULE+'/Index/index',
			data:'p='+track_click,
			beforeSend:function(){
				//显示正在加载
				$('.loading_image').css('visibility','visible');
				$('.loading_span').css('display','none');
			},
			success:function(data){
				$('.loading_image').css('visibility','hidden');
				$('.loading_span').css('display','inline-block');
				
			    //分配数据
				 					
			     for(var i=0;i<data.content.length;i++){
					   if(data.content[0].feed_flag =='q'){
						  content="<div class='index-sss'><div class='touxiang'><img src='"+data.content[i].question[0].topic[0].topic_pic+"' width='40' height='40'/></div><div class='index-rightcontent'><div class='where'><ul  class='bubblemenu'><li>来自&nbsp;&nbsp; <a href='"+MODULE+"'+'/Home/Topic/tid/''"+data.content[i].question[0].topic[0].id+"'>'"+data.content[i].question[0].topic[0].topic_name+"'</a><div><div id='topicinformation'><div id='topicinfo'><div class='topicinfomytouxiang'><a href='#'><img src='"+data.content[i].question[0].topic[0].topic_pic+"' width='40' height='40'/></a></div>"<div class='topicinforightcontent'><div class='topicinfoname'><a href="<{:U('Home/Topic/index',array('tid'=>$focus_topic_info['id'],'sel'=>'trends'))}>">'"+data.content[i].question[0].topic[0].topic_name+"'</a></div>"<div class='topicinfonameanswer'>'"+data.content[i].question[0].topic[0].topic_desc+"'</div>"</div></div><div class='topicopinfooperation'>问题：<a href='#'>'"+data.content[i].question[0].topic[0].question_count+"'</a> &nbsp;&nbsp;热点：<a href='#'>16</a>&nbsp;&nbsp;关注者:<a href='#'>'"+data.content[i].question[0].topic[0].topic_focus_count+"'</a><a href='#' class='topicinfoquxiao'>取消关注</a></div></div></div></li></ul></div>"<div class='answer'><a href="<{:U('Home/Question/qindex',array('qid'=>$feeds_info_detail['id']))}>" >'"+data.content[i].question[0].question_name+"'</a></div>"<div class='answer-info'><div class='describe'>'"+data.content[i].question[0].question_desc+"'</div>" <div class='edittime'> <span class='publish_username'><a href='#'>'"+data.content[i].question[0].username+"'</a></span> 发起于 <span>'"+data.content[i].question[0].create_time+"'</span></div></div>"<div class='index_my_left_category'><input type='hidden' class='hide_question_name' value='"+data.content[i].question[0].question_name+"'><input type='hidden' class='hide_question_id' value='"+data.content[i].question[0].id+"'>"<span class='answer-toquestion upvote'><a href='javascript:void(0);'><img src='__HOME_IMAGES__/answerquestion.png'>&nbsp;回答  &nbsp;</a> </span><a href='#'><img src='__HOME_IMAGES__/add.png'/>关注问题</a><a href='javascript:void(0)' class='pass'>不感兴趣</a><span class='shadow_border'><a href='#'><img src='__HOME_IMAGES__/collect.png'/> 收藏</a><a href='#'><img src='__HOME_IMAGES__/report.png'/> 举报</a></span></div></div></div>";
                          
						 
					   }
				   }	 
				$('.maincontent').append(data);
				//调用js进行渲染页面
				$.getScript(PUBLIC_PATH+"Home/js/summary.js");
				
			},
			error:function(){

				layer.msg(AJAX_ERROR, {icon: 2,time:2000});
			}
		});
		}else{
			$('.loading_span').text('已经没有数据了哦');
		}
	});*/
	
	
	$(window).scroll(function(){
		  
	  	　　var scrollTop = $(this).scrollTop();//滚动高度
	  	　　var scrollHeight = $(document).height();//内容高度
	  	　　var windowHeight = $(this).height();//可见高度
	  	　　if(scrollTop + windowHeight == scrollHeight){
	  		track_click++;
			if(track_click<feed_all_page){
			$.ajax({
				type:'post',
				dataType:'html',
				url: MODULE+'/Index/index',
				data:'p='+track_click,
				beforeSend:function(){
					//显示正在加载
					$('.loading_image').css('visibility','visible');
					$('.loading_span').css('display','none');
				},
				success:function(data){
					$('.loading_image').css('visibility','hidden');
					$('.loading_span').css('display','inline-block');
					
				   	 
					$('.maincontent').append(data);
					//调用js进行渲染页面
					$.getScript(PUBLIC_PATH+"Home/js/summary.js");
					
				},
				error:function(){

					layer.msg(AJAX_ERROR, {icon: 2,time:2000});
				}
			});
			}else{
				$('.loading_span').text('已经没有数据了哦');
			}
	  	　}
	});
	
});