/*问题发起js*/

$(function(){
	$('.publish_submit_btn_just').bind('click',function(){
		var question_title= $(".openModal-question-content").val();
		var question_desc= $(".openModal-question-desc").text();
	    var t=document.getElementsByName("aks");
		var question_topic = "";
        for (var i = 0; i < t.length; i++) {
            if (t[i].checked) {
            	question_topic +=t[i].value+',';
            }
        }
		//alert(question_title+question_desc+ question_topic);
        if(question_desc==default_question_desc){
        	question_desc="";
        }
        if(question_title!="" && question_desc!="" && question_topic!=""){
        	
        	
        	$.ajax({
    			type:'post',
    			dataType:'json',
    			url:MODULE+'/Index/openModal',
    			data:'qn='+question_title+'&qd='+question_desc+'&qt='+question_topic,
    			beforeSend:function(){
    				//显示正在加载
    				layer.load(1);
    			},
    			success:function(data){

    				//关闭正在加载
    				setTimeout(function(){
    					  layer.closeAll('loading');
    				}, 1000);
    				
    				if(data.status==1){
    					layer.msg('发起问题成功', {icon: 1,time:1000});    					
    				    $('.question-close').trigger('click');
    					window.location.href=MODULE+'/Question/qindex/qid/'+data.content;
    				}else{
    					layer.msg(data.content, {icon: 2,time:2000});
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
        	
        	
        }else{        	
        	layer.msg("请输入完整问题内容哦", {icon: 2,time:1000});
        }
	});
});

