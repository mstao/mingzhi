/*$(function(){
	//导航信息内容显示与隐藏
	$(".notifications").click(function(){
		 $(".notificationsbox").css({"height":"0px","margin-top":"-10px"});
		 $(".notificationsbox").slowMove(
				{"speed":15,"tween":"Bounce","ease":"easeOut"},
				{"height":"105px","opacity":1,"margin-top":"0px"}
		 );
		 $(".notificationsbox").toggle();
	});
	
	
	//模拟placeholder  弹出框   导航 弹出问问题
	$(".openModal-question-content").text(default_question_name);
	$(".openModal-question-content").focus(function(){
		if($(".openModal-question-content").text()==default_question_name){
			$(".openModal-question-content").text("");
		}		
	});
	$(".openModal-question-content").blur(function(){
		if($(".openModal-question-content").text()==""){
			$(".openModal-question-content").text(default_question_name);
		}	
	});
	
	
	
	$(".openModal-question-desc").text(default_question_desc);
	$(".openModal-question-desc").focus(function(){
		if($(".openModal-question-desc").text()==default_question_desc){
			$(".openModal-question-desc").text("");
		}		
	});
	$(".openModal-question-desc").blur(function(){
		if($(".openModal-question-desc").text()==""){
			$(".openModal-question-desc").text(default_question_desc);
		}	
	});
	
	
	
	$(".openModal-question-topic").text(default_question_topic);
	$(".openModal-question-topic").focus(function(){
		if($(".openModal-question-topic").text()==default_question_topic){
			$(".openModal-question-topic").text("");
		}		
	});
	$(".openModal-question-topic").blur(function(){
		if($(".openModal-question-topic").text()==""){
			$(".openModal-question-topic").text(default_question_topic);
		}	
	});
	
	
	//监听话题div输入框，当用户点击enter换行时，强制不换行，并且把内容添加到div中
	$(".openModal-question-topic").bind("keypress",function(event){
		if(event.keyCode==13){
			return false;
		}else{
			//暂无代码
		}
	});
   
});*/