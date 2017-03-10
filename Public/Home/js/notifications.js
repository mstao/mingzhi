$(function(){
	
	function stopPropagation(e) {
        var ev = e || window.event;
        if (ev.stopPropagation) {
            ev.stopPropagation();
        }
        else if (window.event) {
            window.event.cancelBubble = true;//兼容IE
        }
    }
	 /**
	  * 获取所有通知信息
	  */
	 $(document).on('click','.notifications',function(){
		 
		 
		 $.ajax({
				type:'post',
				dataType:'html',
				url:MODULE+'/Notifications/index',
				beforeSend:function(){
					//显示正在加载
					$('#s').html('<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
					
				},
				success:function(data){

					if(data.replace(/(^\s*)|(\s*$)/g,"")=="<ul></ul>"){
						$('#s').html('<div class="no-notifications"><img src="'+HOME_IMAGES+'/notifications.png"/><br><span>没有更多消息</span>   </div>');
					}else{
						$('#s').html(data);
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
		 
		 
		 $(".notificationsbox").css({"margin-top":"-10px"});
		 $(".notificationsbox").slowMove(
				{"speed":15,"tween":"Bounce","ease":"easeOut"},
				{"opacity":1,"margin-top":"0px"}
		 );
		 $(".notificationsbox").toggle();
         stopPropagation(e);
	 });
	
	 /**
	  * 赞同通知
	  */
	 $('#fb').bind('click',function(){
		 $.ajax({
				type:'post',
				dataType:'html',
				url:MODULE+'/Notifications/upvote',
				beforeSend:function(){
					//显示正在加载
					$('#f').html('<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
					
				},
				success:function(data){

					if(data.replace(/(^\s*)|(\s*$)/g,"")=="<ul></ul>"){
						$('#f').html('<div class="no-notifications"><img src="'+HOME_IMAGES+'/notifications.png"/><br><span>没有更多消息</span>   </div>');
					}else{
						$('#f').html(data);
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
	 
	 /**
	  * 关注我通知
	  */
	 $('#gb').bind('click',function(){
		 $.ajax({
				type:'post',
				dataType:'html',
				url:MODULE+'/Notifications/focus',
				beforeSend:function(){
					//显示正在加载
					$('#g').html('<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
					
				},
				success:function(data){

					if(data.replace(/(^\s*)|(\s*$)/g,"")=="<ul></ul>"){
						$('#g').html('<div class="no-notifications"><img src="'+HOME_IMAGES+'/notifications.png"/><br><span>没有更多消息</span>   </div>');
					}else{
						$('#g').html(data);
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
});