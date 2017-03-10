$(function(){

	$(document).on('click','.answer-collection-btn',function(){
		$('.collection').show();
		$('.mark').show();
		var  mythis=$(this);
		//获取隐藏answer_id
		var  answer_id=mythis.closest('span').closest('.index_my_left_category').find('.hide_answer_id').val();
		$('.hide-current-collection-answer-id').val(answer_id);
		$.ajax({
			type:'post',
			dataType:'json',
			url:MODULE+'/Index/getCollectionInfo',
			data:{'aid':answer_id},
			beforeSend:function(){
				//显示正在加载
				//layer.load(1);
				//$(this).next('div').html('<img src="__HOME_IMAGES__/loading.gif" class="loading_image"/><span>加载中...</span>');
			  $('.collection-content').html('<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
				
			},
			success:function(data){

				//关闭正在加载
				/*setTimeout(function(){
					  layer.closeAll('loading');
				}, 1000);*/
				
				if(data.status==1){
					//状态为1，代表话题话题信息已获取到，将信息填充到模板中
					
				    var x;
				    $('.collection-content').html('');
					
                    for(x in data.content){
                    	var res="<div class='collection-info'><input type='hidden' class='hide-collection-id' value='"+data.content[x].id+"'/><span class='collection-name'>"+data.content[x].collection_name+"</span><br><span class='collection-index'>"+data.content[x].collection_num+"条内容 · 0人关注</span> " ;
                    	if(data.content[x].acid!=null){
                    		res+="<img src='"+HOME_IMAGES+"/right.png' class='hide-right-image'/></div>";
                    	}else{
                    		res+="</div>";
                    	}
                    
                    	
                    	$('.collection-content').append(res);
                    }
					
					
				}else{
					layer.msg(AJAX_ERROR, {icon: 2,time:1000});
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