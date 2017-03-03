$(function(){

	$(document).on('click','.collection-info',function(){
		var answer_id=$('.hide-current-collection-answer-id').val();
		var hide_collection_id=$(this).find('.hide-collection-id').val();
		
		var mythis=$(this);
		$.ajax({
				type:'post',
				dataType:'json',
				url:MODULE+'/Index/addAnswerCollect',
				data:{'aid':answer_id,'cid':hide_collection_id},
				beforeSend:function(){
					//显示正在加载
					layer.load(2);
				},
				success:function(data){

					//关闭正在加载
					setTimeout(function(){
						  layer.closeAll('loading');
					});
					
			
					if(data.content==1){
						mythis.append("<img src='"+HOME_IMAGES+"/right.png' class='hide-right-image'/>");
					}else if(data.content==0){
					    mythis.find('.hide-right-image').remove();
					}
					
					
					
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
	
	$(document).on('click','.create-collection-btn',function(){
		
		//获取收藏夹名称
		var collection_name=$(this).parent().find('.collection-name').val();
		//获取收藏夹描述
		var collection_desc=$(this).parent().find('.collection-desc').val();
		
		var mythis=$(this);
		if(collection_name.replace(/(^s*)|(s*$)/g, "").length ==0 || collection_desc.replace(/(^s*)|(s*$)/g, "").length ==0){
			layer.msg('请将收藏夹的信息填写完整');
		}else{
			$.ajax({
				type:'post',
				dataType:'json',
				url:MODULE+'/Index/addCollectionInfo',
				data:{'cn':collection_name,'cd':collection_desc},
				beforeSend:function(){
					//显示正在加载
					layer.load(2);
				},
				success:function(data){

					//关闭正在加载
					setTimeout(function(){
						  layer.closeAll('loading');
					});
					
			
					if(data.content==1){
						layer.msg('添加收藏夹成功');
					}else if(data.content==0){
						layer.msg('收藏夹已存在，请不要重复添加');
						mythis.parent().find('.collection-name').val('');
						mythis.parent().find('.collection-desc').val('');
					}
					
					
					
				},
				error:function(){

					//关闭正在加载
					setTimeout(function(){
					  layer.closeAll('loading');
					}, 1000);
					layer.msg(AJAX_ERROR, {icon: 2,time:2000});
			}
			});
		}
	});
	
});