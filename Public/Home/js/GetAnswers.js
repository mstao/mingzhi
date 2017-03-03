$(function(){
	var track_click = 0;  //点击加载更多 track_click+1  初始为0
	 $(document).on('click','.js-load-more',function(){
		//alert('zzzz'); 
		 track_click++;
		if(track_click<a_all_page){
			$.ajax({
				type:'get',
				dataType:'json',
				url: MODULE+'/Question/qindex',
				data:'p='+track_click+'&qid='+Q,
				beforeSend:function(){
					//显示正在加载
					$('.loading_image').css('visibility','visible');
					$('.loading_span').css('display','none');
				},
				success:function(data){
					$('.loading_image').css('visibility','hidden');
					$('.loading_span').css('display','inline-block');
									
				    //分配数据
					$('.all-answer-info').append(data);
					//$('.commentcon').append(data);、
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
		
		
		
	 });
});