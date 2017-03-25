<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
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
	var AJAX_ERROR='<?php echo C("AJAX_ERROR_TIPS");?>';
	var Q=<?php echo ($q); ?>;
	var a_all_page=<?php echo ($all_page); ?>;
	var DEFAULT_QUESTION_URL=MODULE+'/Question/qindex/qid/';
	var DEFAULT_TOPIC_URL=MODULE+'/Topic/index/tid/';
	var DEFAULT_USER_URL=MODULE+'/Profile/index/u/';
	</script>
	<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/indexheader.css" />
	<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/answer_topic_question.css" />
	<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/question.css" />
	<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/footer.css" />
	<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/share.css" />
	<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/static/wangEditor/dist/css/wangEditor.min.css" />
	<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/static/lightBox/css/jquery.lightbox-0.5.css" />
	
		<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/jQuery.tween.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/static/layer-2.4/layer.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/publish/publish.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/js.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/Suggest.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/notifications.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/publish/publish.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/static/lightBox/js/jquery.lightbox-0.5.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/GetAnswers.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/upvoteso.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/share/ZeroClipboard.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/report.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/FocusTopic.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/LoadTopicInfo.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/FocusQuestionMain.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/CommentAnswer.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/LoadAnswerComments.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/ReplayComment.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/CommentOperate.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/LoadCollectionInfo.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/AddCollection.js"></script>
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
						<a href="/mytest/mingzhi/Home/Profile/index/u/<?php echo (session('uid')); ?>" title="" class="mymainname">
						<?php if($headerinfo['avatar_file'] == ''): ?><img src="/mytest/mingzhi/Public/Home/images/default-avatar-small.png" class="mytouxiangimg">
						<?php else: ?>
						<img src="<?php echo ($headerinfo["avatar_file"]); ?>" class="mytouxiangimg"><?php endif; ?>
						
						<span class="myname_header"><?php echo ($headerinfo["username"]); ?></span>
						</a>
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
                  
<!--导航结束  -->


<!--主体内容开始-->

<div id="question">


<!--问题信息开始-->
<div class="questioninfo">
<!--相关话题列表开始-->
<div class="topiclist">

<ul  class="bubblemenu"> 
<?php if(is_array($topicinfo)): $i = 0; $__LIST__ = $topicinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$topicinfo): $mod = ($i % 2 );++$i;?><li>

<a href="<?php echo U('Home/Topic/index',array('tid'=>$topicinfo['id'],'sel'=>'trends'));?>"  class="nav_topicname enter-topicname"  data-topic-id="<?php echo ($topicinfo["id"]); ?>"><?php echo ($topicinfo["topic_name"]); ?></a> 

<div>
<div id="topicinformation">
<div id="topicinfo"></div>
<div class="topicopinfooperation">问题：<a href="javascript:void(0);" class="topic-question-count"></a> &nbsp;&nbsp;热点：<a href="javascript:void(0);" class="topic-hot-question-count"></a>&nbsp;&nbsp;关注者:<a href="javascript:void(0);" class="topic-foucs-person-count"></a>
<a href="javascript:void(0);" class="topicinfoquxiao topic-focus-btn" data-topic-id="<?php echo ($topicinfo["id"]); ?>"><?php if($topicinfo['focus_id'] == ''): ?>关注话题<?php else: ?>取消关注<?php endif; ?></a>

</div>


</div>
             
</div>
</li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>  

<!--相关话题列表结束-->


<!--问题描述开始-->
<div class="questiondesc">
<?php if(is_array($qinfo)): $i = 0; $__LIST__ = $qinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$qinfo): $mod = ($i % 2 );++$i;?><div class="questiontitle">
<?php echo ($qinfo["question_name"]); ?>
</div>
<div class="questioncon">
<div class="questioncontent">
<?php echo ($qinfo["question_desc"]); ?>
</div>
<div class="questionoprea">
<span>提问时间： <?php echo (time2Units($qinfo["create_time"])); ?> </span>&nbsp;&nbsp;
<a href="javascript:void(0)"><img src="/mytest/mingzhi/Public/Home/images/collect.png"/> 收藏</a>
<a href="javascript:void(0)" onclick="$('.mark,.share-dialog').show();"><img src="/mytest/mingzhi/Public/Home/images/share.png"/> 分享</a>
<a href="javascript:void(0)"><img src="/mytest/mingzhi/Public/Home/images/report.png"/> 举报</a>
</div>

<div class="commentnumber"><?php echo ($q_answer_count); ?>个回答</div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<!--问题描述结束-->
<!--评论内容开始-->
<div class="all-answer-info">
	
<?php if(empty($answer_info)): ?><center><div style="margin-top:60px;"><span style="color:#999999;">暂时没有人回答哦，去抢沙发</span></div></center><?php endif; ?>
<!--S 回答循环渲染页面  -->
<?php if(is_array($answer_info)): $i = 0; $__LIST__ = $answer_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$answer_info): $mod = ($i % 2 );++$i;?><!-- 回答问题内容开始 -->
<div class="index-sss">
<div class="touxiang">

<img src="<?php echo ($answer_info['avatar_file']); ?>" width="40" height="40"/>

</div>
<div class="index-rightcontent">


<!-- 回答开始 -->
<div class="answer-info">

<div class="user">
<?php if($answer_info['isname'] == 0): ?><a href="<?php echo U('Home/Profile/index',array('u'=>$answer_info['uid']));?>" ><?php echo ($answer_info["username"]); ?></a> ，<p class="biaoqian"><?php echo ($answer_info["tag"]); ?></p>
<?php else: ?>
<p class="biaoqian">匿名用户</p><?php endif; ?>
</div>

<div class="summary">

<div class="summary_text"></div>
<a href="javascript:void(0);" class="showhide">显示全部</a>
</div> 
<div class="describe  Editor-txt ">

<?php echo ($answer_info["answer_content"]); ?>
</div>
<a href="javascript:void(0);" class="showhide_hide">隐藏</a>
<div class="edittime">发表于 <span><?php echo (time2Units($answer_info["create_time"])); ?></span></div>
</div>
<!-- 回答结束 -->
<div class="index_my_left_category  answer-operate">

<input type="hidden" class="hide_answer_id" value="<?php echo ($answer_info["id"]); ?>">

<span class="upvote answer-upvote">
<?php if($answer_info['vote_value'] == 1 ): ?><a href="javascript:void(0);" style="color:#666666;">已赞 </a> <i class="answer-upvote-count" style="color:#666666"><?php echo ($answer_info["upvote_count"]); ?></i>
<?php else: ?>
<a href="javascript:void(0);" >赞同</a> <i class="answer-upvote-count"><?php echo ($answer_info["upvote_count"]); ?></i><?php endif; ?>

</span>
<a href="javascript:void(0);">反对</a>

<?php if($answer_info['comment_count'] == 0): ?><a href="javascript:void(0);" class="commentbtn"><img src="/mytest/mingzhi/Public/Home/images/comment.png"/>添加评论</a>
<?php else: ?>
<a href="javascript:void(0);" class="commentbtn"><img src="/mytest/mingzhi/Public/Home/images/comment.png"/>评论</a><span class="shoucangnumber"><?php echo ($answer_info["comment_count"]); ?></span><?php endif; ?>

<span class="shadow_border">
<a href="javascript:void(0);" class="answer-collection-btn"><img src="/mytest/mingzhi/Public/Home/images/collect.png"/> 收藏</a>
<a href="javascript:void(0);" class="report-answer-btn">
<?php if($answer_info['report_id'] == ''): ?><img src="/mytest/mingzhi/Public/Home/images/report.png"/> 举报
<?php else: ?>
<img src="/mytest/mingzhi/Public/Home/images/report_blue.png" /><font style="color:#0F88EB;">已举报</font><?php endif; ?>
</a>
</span>

</div>

<!--评论内容 开始 -->
<div class="commentbox">
	<div class="arrow-range answer-range">
		<b class="arrow-outer answer-outer"></b>
		<b class="arrow-inner answer-inner"></b>				
	</div>
		<div class="commentcon">		 
			<!--我的回复开始  -->
				<div class="othercomment_mycomment">
				    <div>
						 <?php if($headerinfo['avatar_file'] == ''): ?><img src="/mytest/mingzhi/Public/Home/images/default-avatar.png" class="mycommen_touxiang" >
				        <?php else: ?>
				        <img src="<?php echo ($headerinfo["avatar_file"]); ?>" class="mycommen_touxiang" ><?php endif; ?>
						<!-- 回复内容 -->
						<div class="mycomment_input" contenteditable="true"></div>
					</div>
					<div >
						<form action="" method="">
						    <div class="replay-other-btn-div">
						    <input type="submit" value="评论" class="replay-other-btn">
						    </div>
						</form>
					</div>
				</div>
				
				<!--我的回复结束  -->
				        <!--其他人评论开始  -->	
				        <div class="othercomment_info">
					      		   
		                   
 
<?php if(is_array($comment_info)): $i = 0; $__LIST__ = $comment_info;if( count($__LIST__)==0 ) : echo "还没有评论哦，赶紧来抢沙发吧:)" ;else: foreach($__LIST__ as $key=>$comment_info): $mod = ($i % 2 );++$i;?><div class="othercomment_info_div">
<div class="othercomment_user_touxiang">
<img src="<?php echo ($comment_info["avatar_file"]); ?>" />
</div>
<div class="replay-rightcontent">
				
<div class="othercomment_info_message">
<?php if($comment_info['ruid'] == ''): ?><a href="#" ><?php echo ($comment_info["s_username"]); ?></a>:<span><?php echo ($comment_info["message"]); ?></span> 
<?php else: ?>
<a href="#" ><?php echo ($comment_info["s_username"]); ?></a> <span>回复</span> <a href="#" ><?php echo ($comment_info["r_username"]); ?></a>:<span><?php echo ($comment_info["message"]); ?></span><?php endif; ?>
</div>
<div class="othercomment_replay_time"><span class="replay_time">·<?php echo (time2Units($comment_info["add_time"])); ?></span> 

<div class="othercomment_replay_operate">
<a href="javascript:void(0)" class="vote-comment-btn">
<?php if($comment_info['vote_id'] == ''): ?><img  src="/mytest/mingzhi/Public/Home/images/upvote.png"> 赞
<?php else: ?>
<img  src="/mytest/mingzhi/Public/Home/images/zan_blue.png"> <font style="color:#0F88EB;">取消赞</font><?php endif; ?>
</a>
<a href="javascript:void(0)" class="othercomment_replay_btn"><img  src="/mytest/mingzhi/Public/Home/images/replay-inner.png"> 回复</a>
<a href="javascript:void(0)" class="comment-report-btn">
<?php if($comment_info['report_id'] == ''): ?><img  src="/mytest/mingzhi/Public/Home/images/report.png"> 举报
<?php else: ?>
<img src="/mytest/mingzhi/Public/Home/images/report_blue.png" /><font style="color:#0F88EB;">已举报</font><?php endif; ?>
</a>
<input type="hidden" class="hide-comment-id" value="<?php echo ($comment_info["id"]); ?>">

</div>


<span class="replay-upvote-num"><i><?php echo ($comment_info["upvote_count"]); ?></i>  赞</span>
</div> 

<div class="replay-other-input-div">
    <div>

		
		<div class="replay-other-input" contenteditable="true" ></div>
	</div>
	<div >
            <div class="replay-other-btn-div">
           
		    <input type="submit" value="回复" class="replay-person-btn"  data-replay-suid="<?php echo ($comment_info["suid"]); ?>"  data-answer-id="<?php echo ($comment_info["answer_id"]); ?>"  data-comment-id="<?php echo ($comment_info["id"]); ?>">
		    
		    </div>
	</div>
</div>	
   
			
</div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>

			            </div>
			    <!--其他人评论结束 -->
			</div>
</div> 
<!--评论内容结束  -->

</div>
</div>
<!-- 回答问题内容结束 --><?php endforeach; endif; else: echo "还没有评论哦，赶紧来抢沙发吧:)" ;endif; ?>
<!--E 回答循环渲染页面  -->   				

	
</div>
<!--评论内容结束-->

<!--S 点击加载更多 -->
<?php if(!empty($answer_info)): ?><div class="js-load-more load-more"><span class="loading_span">加载更多</span><img src="/mytest/mingzhi/Public/Home/images/loading.gif" class="loading_image"/></div><?php endif; ?>
<!--E 点击加载更多-->

<!-- 我的登录信息显示开始 -->
<div class="mylogininfo">
<img src="<?php echo ($headerinfo["avatar_file"]); ?>" ><span><em><?php echo ($headerinfo["username"]); ?></em>&nbsp; , <?php echo ($headerinfo["tag"]); ?></span>
</div>
<!-- 我的登录信息显示结束-->


<!--评论框开始  -->
<div id="editor-container" class="commentcontainer">
        <div id="editor-trigger"></div>      
</div>
<!--评论框结束  -->

<!--提交信息按钮  -->
<div class="usercommentcon">

    <input type="checkbox" name="isHaveName" id="isHaveName" value="1"> <label for="isHaveName">匿名</label>
    <div class="usercommentsubmitbtndiv">
    <input type="submit" value="提交回答" class="usercommentsubmitbtn  add_button_answer">
    <input type="hidden" class="writeanswer-dialog_default_question_id" value="<?php echo ($q); ?>">
    </div>

</div>
<hr style="margin-top:30px;height:1px;border:none;border-top:1px dashed #0066CC;" />
</div>

<!--问题信息结束-->


<!--右边内容开始-->
<div class="questionabout">

<!--问题创建人信息开始-->
<div class="questionfocus_div">

<a href="javascript:void(0)" class="questionfocus focus-question-btn" data-question-id="<?php echo ($q); ?>">
<?php if($focus_question == 0): ?>关注问题
<?php else: ?>
取消关注<?php endif; ?>
</a>
</div>
<div class="founder">
<span>发起人</span>
<div class="founderinfo">

	<img src="<?php echo ($qinfo["avatar_file"]); ?>" width="40" height="40" /> <span class="founderinfo_name"><a href="/mytest/mingzhi/Home/Profile/index/u/<?php echo ($qinfo["uid"]); ?>"><?php echo ($qinfo["username"]); ?></a></span>

</div>
</div>
<!--问题创建人信息结束-->

<!--问题状态开始-->
<div class="questionstatus">
	<span>问题状态</span>
	<div class="questionstatuscon">
	
		<span>浏览量：<?php echo ($qinfo["q_view_count"]); ?></span>
		<span>关注数：<?php echo ($qinfo["focus_count"]); ?></span>
	
		<!--关注者头像展示开始-->
		<div class="questionstatusconimg">
		   <?php if(is_array($avatarinfo)): $i = 0; $__LIST__ = $avatarinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$avatarinfo): $mod = ($i % 2 );++$i;?><img src="<?php echo ($avatarinfo["avatar_file"]); ?>" width="35" height="35"/><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<!--关注者头像展示结束-->
	
	</div>
	
</div>
<!--问题状态结束-->
</div>
<!--右边内容结束-->

</div>

<!-- 页脚开始 -->


<div id="footer">
<a href="#"><?php echo (C("WEB_COPYRIGHT")); ?></a><a href="#"><?php echo (C("WEB_FOOTER_DECLARE")); ?></a><a href="<?php echo U('Home/Terms/index');?>"><?php echo (C("WEB_FOOTER_AGREEMENT")); ?></a><a href="#"><?php echo (C("WEB_FOOTER_CONNECT")); ?></a>
</div>
<!-- 页脚结束 -->


<!--提问  弹窗开始-->
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
<!--提问  弹窗结束  -->

<!--分享弹窗 开始 -->
  <div class="mark"></div>
  <div class="share-dialog">
             
                <div class="share-close" onclick="$('.mark,.share-dialog').hide();"></div> 
                <div class="share-dialog-title">
                    分享
                </div> 
                <div class="share-dialog-cont"> 
                    <div class="share-copy"> 
                        <div class="share-copy-l">
                            分享链接：
                        </div> 
                        <div class="share-copy-c">
                            <input id="copytext" type="text" />
                        </div> 
                        <div id="btnCopy" class="share-copy-r" data-clipboard-target="copytext">
                        复制链接
                        </div> 
                        <div class="clear"></div> 
                    </div> 
                    <div class="share-platform"> 
                        <div class="share-platform-l">
                            社交平台：
                        </div> 
                        <div class="share-platform-r"> 
                            <div class="bdsharebuttonbox"> 
                                <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a> 
                                <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a> 
                                <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a> 
                                <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a> 
                            </div> 
                            <div class="share-platform-text">
                                您可以直接复制短链，分享给朋友，也可直接点击社交平台图标，指定分享。 
                            </div> 
                        </div> 
                    </div> 
                </div>
        </div> 
<!--分享弹窗结束  -->


<div class="mark"></div>
  <div class="dialog  collection">
             
                <div class="dialog-close" onclick="$('.mark,.dialog').hide();"></div> 
                <div class="dialog-title">
                                          添加到收藏夹
                </div> 
                <div class="dialog-content"> 
                      
                   <div class="collection-content">
                   </div>
                   <div class="collection-operation">
                      <a href="javascript:void(0);" class="add-collection-link" onclick="$('.mark,.dialog').hide();$('.create-collection,.mark').show();">创建新收藏夹</a>
                   </div>
                   <input type="hidden"  class="hide-current-collection-answer-id" value=""/>
                   
                </div>
</div> 



<div class="mark"></div>
  <div class="dialog   create-collection">
             
                <div class="dialog-close" onclick="$('.mark,.dialog').hide();"></div> 
                <div class="dialog-title">
                                         创建新收藏夹
                </div> 
                <div class="dialog-content"> 
                     <div class="create-collection-div">
                            <label>收藏夹名称</label><br>
                            <input type="text" class="collection-name" placeholder="收藏夹名称"/>
                             <br><br><label>收藏夹描述(可选)</label><br>
                            <textarea class="collection-desc" placeholder="收藏夹描述(可选)"></textarea><br><br>
                            <button class="create-collection-btn">确认创建</button>&nbsp;<a href="javascript:void(0)" onclick="$('.mark,.dialog').hide();" class="reset">取消</a>
                     <br><br>
                     </div> 
                </div>
</div> 

<script>

window._bd_share_config = {"common": {"bdSnsKey": {}, "bdText": "分享到微博","bdDesc":"lalalalala","bdPic":"/mytest/mingzhi/Public/Home/images/wowowo.jpg", "bdMini": "1", "bdMiniList": ["weixin","tsina","sqq","qzone"], "bdPic": "", "bdStyle": "1", "bdSize": "32"}, "share": {}};
with (document)0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];

var g_url = window.location.href;
$('.share-copy-c input').val(g_url);
var clip = new ZeroClipboard(document.getElementById("btnCopy")); 
</script>

</body>
</html>

<script type="text/javascript" src="/mytest/mingzhi/Public/static/wangEditor/dist/js/wangEditor.js"></script>	
<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/Editor.js"></script>