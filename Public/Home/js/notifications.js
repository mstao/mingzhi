$(function(){
	
	/**
	 * 消息的处理 递归调用
	 */
	 (function longPolling() {  
        // alert(Date.parse(new Date())/1000);  
         $.ajax({  
             url: MODULE+"/Notifications/longPoll",  
             data: {"timed": Date.parse(new Date())/1000},  
             dataType: "json",  
             timeout: 70000,//10秒超时，可自定义设置  
             error: function (XMLHttpRequest, textStatus, errorThrown) {  
                 
                //layer.msg("[state: " + textStatus + ", error: " + errorThrown + " ]");
            	 if (textStatus == "timeout") { // 请求超时  
                     longPolling(); // 递归调用  
                 } else { // 其他错误，如网络错误等  
                     longPolling();  
                 }  
             },  
             success: function (data, textStatus) {  
                 //此时已有消息过来了，将消息数量显示
                 $('.nav-counter').text(data.result);
                 if (textStatus == "success") { // 请求成功  
                    
                    setTimeout("longPolling()",5000);
                 }  
             }  
         });  

     })(); 
	 
	 /**
	  * 获取所有通知信息
	  */
	 $(document).on('click','.notifications',function(){
		 
		 
		 $.ajax({
				type:'post',
				dataType:'json',
				url:MODULE+'/Notifications/',
				data:{'aid':answer_id},
				beforeSend:function(){
					//显示正在加载
					$('#s').html('<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
					
				},
				success:function(data){

					//关闭正在加载
					/*setTimeout(function(){
						  layer.closeAll('loading');
					}, 1000);*/
					
					
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