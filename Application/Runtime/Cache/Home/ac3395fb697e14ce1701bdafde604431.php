<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="keywords" content="<?php echo (C("WEB_KEYWORDS")); ?>" />
<meta name="description" content="<?php echo (C("WEB_DESC")); ?>" />

	<title><?php echo (session('username')); ?>-<?php echo (C("WEB_NAME")); ?></title>
	<script type="text/javascript">
	var MODULE="/mytest/mingzhi/Home";
	var HOME_IMAGES='/mytest/mingzhi/Public/Home/images';
	var PUBLIC_PATH='<?php echo C("PUBLIC_PATH");?>';
	var default_question_desc="<?php echo (C("DEFAULT_QUESTION_DESC")); ?>";
	var DEFAULT_QUESTION_URL=MODULE+"/Question/qindex/qid/";
    var DEFAULT_QUESTION_URL=MODULE+'/Question/qindex/qid/';
    var DEFAULT_TOPIC_URL=MODULE+'/Topic/index/tid/';
    var DEFAULT_USER_URL=MODULE+'/Profile/index/u/';
	</script>
<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/indexheader.css" />
<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/topic.css" />
<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/footer.css" />
<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/fenye.css" />
<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/common.css" />
<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/static/wangEditor/dist/css/wangEditor.min.css" />
	<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/jQuery.tween.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/static/layer-2.4/layer.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/publish/publish.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/js.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/Suggest.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/notifications.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/publish/publish.js"></script>
<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/FocusTopic.js"></script>
<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/FocusQuestion.js"></script>
</head>
<body> 

<!--导航栏开始-->

   <script type="text/javascript">
	function check(val,obj){
		    
			if(val=='f'){
					f.style.display='block';
					s.style.display='none';
					g.style.display='none';
					sb.style.backgroundColor="white";
					gb.style.backgroundColor="white";
					$('#fb').find('img').attr('src',HOME_IMAGES+'/like-blue-no.png');
					$('#sb').find('img').attr('src',HOME_IMAGES+'/all-gray-no.png');
					$('#gb').find('img').attr('src',HOME_IMAGES+'/user-gray-no.png');
		    }else if(val=='s'){
		 	        s.style.display='block';
					f.style.display='none';
					g.style.display='none';
					fb.style.backgroundColor="white";
					gb.style.backgroundColor="white";
					$('#fb').find('img').attr('src',HOME_IMAGES+'/like-gray-no.png');
					$('#sb').find('img').attr('src',HOME_IMAGES+'/all-blue-no.png');
					$('#gb').find('img').attr('src',HOME_IMAGES+'/user-gray-no.png');
		    }else if(val=='g'){
		    	g.style.display='block';
		    	f.style.display='none';
		    	s.style.display='none';
		    	fb.style.backgroundColor="white";
		    	sb.style.backgroundColor="white";
		    	$('#fb').find('img').attr('src',HOME_IMAGES+'/like-gray-no.png');
				$('#sb').find('img').attr('src',HOME_IMAGES+'/all-gray-no.png');
				$('#gb').find('img').attr('src',HOME_IMAGES+'/user-blue-no.png');
		    }
	}
	
	
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
	                    
	                    longPolling();
	                 }  
	             }  
	         });  

	     })(); 
		
		  
				
	});

	</script>   
          
	<div class="header">

			<div class="page-menu-wrapper clearfix" >
				<ul class="menu-function">
					<li>
						<a href="/mytest/mingzhi/Home/Index/index" title="" class="home" ><font  size="6"><?php echo (C("WEB_NAME")); ?></font></a>                                    
					</li>
					<li id="search-hidden">
						<input type="text" name="" class="searchinput" placeholder="搜索话题,人物或问题"><a href="javascript:void(0);" class="search_btn" title=""><img  src="/mytest/mingzhi/Public/Home/images/search_s.png"></a>
					</li>
					
				</ul>
				<!-- S SEARCH-RESULT -->	
					
				<div class="search-container"></div>
				<!-- E SEARCH-RESULT -->
				
				
				<ul class="menu-share">
                 <li><a href="<?php echo U('Home/Explore/index');?>">发现</a></li>
                <li><a href="/mytest/mingzhi/Home/Topic/index">话题</a></li>
                  <li><a href="javascript:void(0);" class="notifications">消息<span class="nav-counter nav-counter-blue"><?php echo ($headerinfo["no_count"]); ?></span></a>
                  </li>
                   
                  <div class="notificationsbox">
						<div class="notifications-arrow-range">
							<b class="notifications-arrow-outer"></b>
							<b class="notifications-arrow-inner"></b>				
						</div>					
						<div class="notificationscon">
							<!-- <div class="notifications-go-all"><a href="/mytest/mingzhi/Home/notifications/index">查看全部消息 </a></div>						 			
						    <div class="notifications-info">
						      <div class="notifications-info-no">
						      <img src="/mytest/mingzhi/Public/Home/images/notifications.png"/><br>
						      <span>没有更多消息</span>         
						      </div>
						    </div>  -->
						    
						  <div class="check-zone">
									<div class="check-btn">
										<ul>
											<li ><a href="javascript:void(0);" onclick="check('s',this)" id="sb"><img src="/mytest/mingzhi/Public/Home/images/all-blue-no.png"></a></li>
											<li ><a href="javascript:void(0);" onclick="check('f',this)" id="fb"><img src="/mytest/mingzhi/Public/Home/images/like-gray-no.png"></a></li>
											<li ><a href="javascript:void(0);" onclick="check('g',this)" id="gb"><img src="/mytest/mingzhi/Public/Home/images/user-gray-no.png"></a></li>
										</ul>
									</div>
									<!--clear-->
									<div class="clear"></div>
									<!--clear-->
									<div class="tab_1 tab_all" id="s" >
									    <!-- <div class="no-notifications">
										<img src="/mytest/mingzhi/Public/Home/images/notifications.png"/><br>
										<span>没有更多消息</span>   
										</div> -->
										<!-- <div class="spinner">
										  <div class="bounce1"></div>
										  <div class="bounce2"></div>
										  <div class="bounce3"></div>
										</div> -->
										<!-- 引入模板 -->
										<ul>
										
<?php if(is_array($notification_content)): $i = 0; $__LIST__ = $notification_content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no_content): $mod = ($i % 2 );++$i; if($no_content['flag'] == 'za'): if(is_array($no_content['content'])): $i = 0; $__LIST__ = $no_content['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i;?><li class="no-list-li">
<?php if(is_array($no['u_info'])): $i = 0; $__LIST__ = $no['u_info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u_info): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Profile/index',array('u'=>$u_info['id']));?>"><?php echo ($u_info["username"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
赞同了<a href="javascript:void(0);"><?php echo (msubstr(getTextUnits($no["answer_content"]),0,20)); ?></a>
</li><?php endforeach; endif; else: echo "" ;endif; ?>

<?php elseif($no_content['flag'] == 'aq'): ?>

<?php if(is_array($no_content['content'])): $i = 0; $__LIST__ = $no_content['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i;?><li class="no-list-li">
<?php if(is_array($no['u_info'])): $i = 0; $__LIST__ = $no['u_info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u_info): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Profile/index',array('u'=>$u_info['id']));?>"><?php echo ($u_info["username"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
回答了<a href="<?php echo U('Home/Question/qindex',array('qid' =>$no['id']));?>"><?php echo ($no["question_name"]); ?></a>
</li><?php endforeach; endif; else: echo "" ;endif; ?>

<?php elseif($no_content['flag'] == 'rq'): ?>

<?php if(is_array($no_content['content'])): $i = 0; $__LIST__ = $no_content['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i;?><li class="no-list-li">
<?php if(is_array($no['u_info'])): $i = 0; $__LIST__ = $no['u_info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u_info): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Profile/index',array('u'=>$u_info['id']));?>"><?php echo ($u_info["username"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
举报了问题<a href="<?php echo U('Home/Question/qindex',array('qid' =>$no['id']));?>"><?php echo ($no["question_name"]); ?></a>
</li><?php endforeach; endif; else: echo "" ;endif; ?>

<?php elseif($no_content['flag'] == 'ra'): ?>

<?php if(is_array($no_content['content'])): $i = 0; $__LIST__ = $no_content['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i;?><li class="no-list-li">
<?php if(is_array($no['u_info'])): $i = 0; $__LIST__ = $no['u_info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u_info): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Profile/index',array('u'=>$u_info['id']));?>"><?php echo ($u_info["username"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
举报了回答<a href="javascript:void(0);"><?php echo (msubstr(getTextUnits($no["answer_content"]),0,20)); ?></a>
</li><?php endforeach; endif; else: echo "" ;endif; ?>

<?php elseif($no_content['flag'] == 'pa'): ?>

<?php if(is_array($no_content['content'])): $i = 0; $__LIST__ = $no_content['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i;?><li class="no-list-li">
<?php if(is_array($no['u_info'])): $i = 0; $__LIST__ = $no['u_info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u_info): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Profile/index',array('u'=>$u_info['id']));?>"><?php echo ($u_info["username"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
评论了<a href="javascript:void(0);"><?php echo (msubstr(getTextUnits($no["answer_content"]),0,20)); ?></a>
</li><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>


										</ul>
									</div>
									<div class="tab_2 tab_all" id="f" style=" display: none;">
									<!-- <span class="no-message">你收到的赞同会在这里显示</span> -->
									<ul>
									
<?php if(is_array($notification_content)): $i = 0; $__LIST__ = $notification_content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i;?><li class="no-list-li"><a href="<?php echo U('Home/Profile/index',array('u'=>$no['sender_uid']));?>"><?php echo ($no["username"]); ?></a>赞同了<a href="javascript:void(0);"><?php echo (msubstr(getTextUnits($no["answer_content"]))); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									</ul>
									</div>
									<div class="tab_3 tab_all" id="g" style=" display: none;"> 
									<!-- <span class="no-message">有人关注你时会显示在这里</span> -->
									<ul>
									
<?php if(is_array($notification_content)): $i = 0; $__LIST__ = $notification_content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no_content): $mod = ($i % 2 );++$i; if($no_content['flag'] == 'za'): if(is_array($no_content['content'])): $i = 0; $__LIST__ = $no_content['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i;?><li class="no-list-li">
<?php if(is_array($no['u_info'])): $i = 0; $__LIST__ = $no['u_info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u_info): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Profile/index',array('u'=>$u_info['id']));?>"><?php echo ($u_info["username"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
赞同了<a href="javascript:void(0);"><?php echo (msubstr(getTextUnits($no["answer_content"]),0,20)); ?></a>
</li><?php endforeach; endif; else: echo "" ;endif; ?>

<?php elseif($no_content['flag'] == 'aq'): ?>

<?php if(is_array($no_content['content'])): $i = 0; $__LIST__ = $no_content['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i;?><li class="no-list-li">
<?php if(is_array($no['u_info'])): $i = 0; $__LIST__ = $no['u_info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u_info): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Profile/index',array('u'=>$u_info['id']));?>"><?php echo ($u_info["username"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
回答了<a href="<?php echo U('Home/Question/qindex',array('qid' =>$no['id']));?>"><?php echo ($no["question_name"]); ?></a>
</li><?php endforeach; endif; else: echo "" ;endif; ?>

<?php elseif($no_content['flag'] == 'rq'): ?>

<?php if(is_array($no_content['content'])): $i = 0; $__LIST__ = $no_content['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i;?><li class="no-list-li">
<?php if(is_array($no['u_info'])): $i = 0; $__LIST__ = $no['u_info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u_info): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Profile/index',array('u'=>$u_info['id']));?>"><?php echo ($u_info["username"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
举报了问题<a href="<?php echo U('Home/Question/qindex',array('qid' =>$no['id']));?>"><?php echo ($no["question_name"]); ?></a>
</li><?php endforeach; endif; else: echo "" ;endif; ?>

<?php elseif($no_content['flag'] == 'ra'): ?>

<?php if(is_array($no_content['content'])): $i = 0; $__LIST__ = $no_content['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i;?><li class="no-list-li">
<?php if(is_array($no['u_info'])): $i = 0; $__LIST__ = $no['u_info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u_info): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Profile/index',array('u'=>$u_info['id']));?>"><?php echo ($u_info["username"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
举报了回答<a href="javascript:void(0);"><?php echo (msubstr(getTextUnits($no["answer_content"]),0,20)); ?></a>
</li><?php endforeach; endif; else: echo "" ;endif; ?>

<?php elseif($no_content['flag'] == 'pa'): ?>

<?php if(is_array($no_content['content'])): $i = 0; $__LIST__ = $no_content['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i;?><li class="no-list-li">
<?php if(is_array($no['u_info'])): $i = 0; $__LIST__ = $no['u_info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u_info): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Profile/index',array('u'=>$u_info['id']));?>"><?php echo ($u_info["username"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
评论了<a href="javascript:void(0);"><?php echo (msubstr(getTextUnits($no["answer_content"]),0,20)); ?></a>
</li><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>


									</ul>
									</div>
							 <div class="no-footer">
							 <p title="设置"><a href="javascript:void(0);"><img src="/mytest/mingzhi/Public/Home/images/settings-no.png"></a></p>
							<span><a href="<?php echo U('Home/Notifications/index');?>">查看全部>></a></span>
							<br><br>
							</div>
							</div>
													    
						    
						</div>
                   </div> 
                   
                  
					<li class="myname_li">
						<a href="/mytest/mingzhi/Home/Profile/index/u/<?php echo (session('uid')); ?>" title="" class="mymainname"><img src="<?php echo ($headerinfo["avatar_file"]); ?>" class="mytouxiangimg"><span class="myname_header"><?php echo ($headerinfo["username"]); ?></span></a>
						<ul class="dropdown-menu follow">
							<li><a href="/mytest/mingzhi/Home/Profile/index/u/<?php echo (session('uid')); ?>" >我的主页</a></li>
							<li><a href="/mytest/mingzhi/Home/Inbox/index" >私信<img src="/mytest/mingzhi/Public/Home/images/yuandian.png"/></a></li>
							<li><a href="" >设置</a></li>
							<li><a href="/mytest/mingzhi/Home/Index/exitsys">退出</a></li>
							
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);"  class="publish_btn_open">提问</a>
					</li>
				</ul>	
				
			</div>
	
	<p id="back-to-top" style="display: block;"><a href="#top"><span></span></a></p>
</div>
   
<!--导航栏结束  -->                      

<!--主体内容开始-->

<div id="topicmain">                 

<!-- 左边内容开始 -->
<div id="topicleftcontent">
<div  class="topic_detail_info">
<img src="<?php echo ($topic_info["topic_pic"]); ?>" /> 
<span class="topic_detail_info_name"><?php echo ($topic_info["topic_name"]); ?></span>
</div>

<div class="topic_detail_info_operate">
  <a href="<?php echo U('Home/Topic/index',array('tid'=>$topic_info['topic_id'],'sel'=>'trends'));?>" class="operate_info_span ">动态</a>
  <a href="<?php echo U('Home/Topic/index',array('tid'=>$topic_info['topic_id'],'sel'=>'hot'));?>" class="operate_info_span">热门问题</a>&nbsp;
  <a href="javascript:void(0);" class="operate_info_span"  id="topic_unanswered_link" >等待回答</a>
</div>

<?php if(is_array($unanswer_question)): $i = 0; $__LIST__ = $unanswer_question;if( count($__LIST__)==0 ) : echo "还没问题怎么办，快去提问吧" ;else: foreach($__LIST__ as $key=>$unanswer_qinfo): $mod = ($i % 2 );++$i;?><div class="unanswered_question_div">
<div class="unanswered_question_from">
来自 · <span><a href="<?php echo U('Home/Topic/index',array('tid'=>$topic_info['topic_id'],'sel'=>'trends'));?>"><?php echo ($topic_info["topic_name"]); ?></a></span> · <?php echo (time2Units($unanswer_qinfo["create_time"])); ?>
</div>
                          
<div class="unanswered_question_content">
<div class="unanswered_question_name">
<a href="<?php echo U('Home/Question/qindex',array('qid'=>$unanswer_qinfo['id']));?>"><?php echo ($unanswer_qinfo["question_name"]); ?></a>
</div>
<div class="unanswered_question_count">
<span><?php echo ($unanswer_qinfo["answer_count"]); ?>个回答</span>&nbsp; <span><?php echo ($unanswer_qinfo["focus_count"]); ?>次关注</span>
</div>
</div>

<div class="index_my_left_category">
<input type="hidden" class="hide_question_name" value="<?php echo ($unanswer_qinfo["question_name"]); ?>">
<input type="hidden" class="hide_question_id" value="<?php echo ($unanswer_qinfo["id"]); ?>"> 
<span class="answer-toquestion upvote "><a href="javascript:void(0);"><img src="/mytest/mingzhi/Public/Home/images/answerquestion.png">&nbsp;回答  &nbsp;</a> </span>
<a href="javascript:void(0);" class="focus-question-btn">
<?php if($unanswer_qinfo['focus_id'] == ''): ?><img src="/mytest/mingzhi/Public/Home/images/add.png"/>关注问题
<?php else: ?>
<img src="/mytest/mingzhi/Public/Home/images/nofocus.png"/>取消关注<?php endif; ?>
</a>
<a href="javascript:void(0)" class="pass">不感兴趣</a>
<span class="shadow_border">
<a href="javascript:void(0);">
<?php if($unanswer_qinfo['report_id'] == ''): ?><img src="/mytest/mingzhi/Public/Home/images/report.png"/> 举报
<?php else: ?>
<img src="/mytest/mingzhi/Public/Home/images/report_blue.png" /><font style="color:#0F88EB;">已举报</font><?php endif; ?>
</a>
</span>

</div>

</div><?php endforeach; endif; else: echo "还没问题怎么办，快去提问吧" ;endif; ?>

<br>
<div class="pagelist"><?php echo ($page); ?></div> 
<br><br>

</div>
<!-- 左边内容结束 -->


<!-- 右边部分开始 -->
<div id="topicmainright">
<div class="focus_topic_button_div">
  <a href="javascript:void(0)" class="topic-focus-btn  only-topic-focus-btn" data-topic-id="<?php echo ($tid); ?>"> 
  <?php if($focus_status == 1): ?>取消关注
  <?php elseif($focus_status == 0): ?>
  关注话题<?php endif; ?>
  </a><br>
</div>

<div class="focus_topic_desc_div">
<span class="focus_topic_desc_tag">话题描述</span>
<div class="focus_topic_desc_content">
<?php echo ($topic_info["topic_desc"]); ?>
</div>
<br>
<span class="focus_topic_desc_tag">话题统计</span>
<br><br>
<span class="focus_topic_count">话题关注人数:<b><?php echo ($topic_info["topic_focus_count"]); ?></b></span><br>
<span class="focus_topic_count">话题问题数量:<b><?php echo ($topic_info["question_count"]); ?></b></span><br>
<span class="focus_topic_count">话题浏览数量:<b><?php echo ($topic_info["view_count"]); ?></b></span>
</div>


<!--S 底部信息  -->
<div class="copyright">
<a href="#"><?php echo (C("WEB_COPYRIGHT")); ?></a><a href="#"><?php echo (C("WEB_FOOTER_DECLARE")); ?></a><a href="<?php echo U('Home/Terms/index');?>"><?php echo (C("WEB_FOOTER_AGREEMENT")); ?></a><a href="#"><?php echo (C("WEB_FOOTER_CONNECT")); ?></a>
</div>
<!--E 底部信息  -->
</div>


<!-- 右边部分结束 -->



</div>
<!-- 主体内容结束 -->



<!--S 回答  弹出-->
<div class="mark"></div>
  <div class="writeanswer-dialog dialog">
             
                <div class="writeanswer-close dialog-close" onclick="$('.mark,.writeanswer-dialog').hide();"></div> 
                <div class="writeanswer-dialog-title dialog-title">
                                                撰写回答
                </div> 
                <div class="writeanswer-dialog-cont dialog-content"> 
                      <div class="writeanswer-question-content">
                      <input type="hidden" class="writeanswer-dialog_default_question_id" value="">
                      <a href="" class="writeanswer-dialog_default_question_name">DEFAULT_NAME</a>
                      </div>
                       <!--S 回答者信息  --> 
                      <div class="writeanswer-user">
                       <img src="<?php echo ($headerinfo["avatar_file"]); ?>"/> <span><em><?php echo ($headerinfo["username"]); ?></em>&nbsp; , <?php echo ($headerinfo["tag"]); ?></span>
                      </div>    
                      <!--E 回答者信息  -->
                      
                      <!--S 编辑器 -->              
                      <div id="editor-container" class="answercontainer"><div id="editor-trigger"></div></div>
                      <!--E 编辑器  -->
                      <input type="checkbox" name="isHaveName" id="isHaveName" > <label for="isHaveName">匿名</label>
                      <div class="writeranswer-function">
                      <input type="button" class="add_button_answer" value="提交回答"/>&nbsp;<a href="javascript:void(0)" class="answer_reset"  onclick="$('.mark,.writeanswer-dialog').hide();">取消</a>
                      
                      </div>
                      
                   
                </div>
</div> 
<!--E 回答  弹出-->

<!--弹窗开始-->
<!--弹窗-->
<div class="modalDialog">
	<div>
		<a href="javascript:void(0);" title="关闭" class="close question-close" >X</a>
		<span class="openModal-title">提问页面</span>
        <div class="openModal-question">
             <input type="text" class="openModal-question-content" placeholder="写下你的问题" value="">
             <!-- <div class="openModal-question-content" contenteditable="true"></div> -->
             <!-- S 搜素问题结果 -->
             <div class="question-searchresult-div">
             </div>
             <!-- S 搜素问题结果 -->
             <div class="openModal-question-desc" contenteditable="true"></div> 
             
             <!--S 动态生成标签div  -->
             <div class="question-topicresult-div"> 
             </div>
             <!--E 动态生成标签div  -->
             
             <!-- <div class="openModal-question-topic" contenteditable="true"></div> -->
             <input type="text" class="openModal-question-topic" placeholder="添加或搜索话题(回车添加)">
        </div>       
		<div class="openModal-operate">
		    <span><a href="/mytest/mingzhi/Home/Publish/index">高级模式</a></span>
			<div class="openModal-submit">
				
				   <input type="button" value="发起" class="publish_submit_btn_just">
				
			</div>
		</div>
	</div>
</div>
<!--弹窗结束  -->

</body>
</html>

<script type="text/javascript" src="/mytest/mingzhi/Public/static/wangEditor/dist/js/wangEditor.js"></script>	
<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/Editor.js"></script>