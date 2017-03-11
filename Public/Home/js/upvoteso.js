/**对回答的一些操作，赞同  反对等**/
$(function(){

	//点赞
	$(document).on('click','.answer-upvote',function(){
		//获取回答的id
		 var hide_answer_id=$(this).closest('.index_my_left_category').find('.hide_answer_id').val();
		 var mythis=$(this);
		 $.ajax({
				type:'post',
				dataType:'json',
				url:MODULE+'/Index/Upvote',
				data:'aid='+hide_answer_id,
				beforeSend:function(){
					//显示正在加载
					/*layer.load(1);*/
				},
				success:function(data){

					//关闭正在加载
					/*setTimeout(function(){
						  layer.closeAll('loading');
					}, 1000);*/
					
					//代表执行赞同操作
					if(data.content==1){
						mythis.find('a').css('color','#666');
						mythis.find('i').css('color','#666');
						mythis.find('a ').text('已赞');
						var upvote_count=mythis.find('i').text();
						mythis.find('i').text( parseInt(upvote_count)+1);

					}else if(data.content==0){
					//代表执行取消赞操作
						mythis.find('a').css('color','#0769CB');
						mythis.find('i').css('color','#0769CB');
						mythis.find('a').text('赞同');
						var upvote_count=mythis.find('i').text();
						mythis.find('i').text( parseInt(upvote_count)-1);
						
					}
					
					
					/*if(data.status==1){
						
					}else{
						layer.msg(data.content, {icon: 2,time:2000});
					}*/
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