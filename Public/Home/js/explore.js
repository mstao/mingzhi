
	$(function(){
		var track_click=0;
		$('.js-load-more').bind('click',function(){
			track_click++;
			if(track_click < r_p){
				$.ajax({
					type:'get',
					dataType:'html',
					url: MODULE+'/Explore/index',
					data:'p='+track_click,
					beforeSend:function(){
						//显示正在加载
						$('.loading_image').css('visibility','visible');
						$('.loading_span').css('display','none');
					},
					success:function(data){
						$('.loading_image').css('visibility','hidden');
						$('.loading_span').css('display','inline-block');
						//将通过ajax获取的数据追加到页面中
						$('.exp-answer-content').append(data);

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
