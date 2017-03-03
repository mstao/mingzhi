$(function(){
	/*****举报处理*****/
	
	//举报问题
	$(document).on('click','.report-question-btn',function(){
		//获得问题id
		var qid=$(this).closest('span').closest('.index_my_left_category').find('.hide_question_id').val();
		var mythis=$(this);
		$.ajax({
			type:'post',
			dataType:'json',
			url:MODULE+'/Index/reportQuestion',
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
	
	//举报回答
	$(document).on('click','.report-answer-btn',function(){
		//获得回答id
		var aid=$(this).closest('span').closest('.index_my_left_category').find('.hide_answer_id').val();
		var mythis=$(this);
		$.ajax({
			type:'post',
			dataType:'json',
			url:MODULE+'/Index/reportAnswer',
			data:'aid='+aid,
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
					layer.msg('你已经举报此回答,系统会为你处理 :)');
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