<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="keywords" content="<?php echo (C("WEB_KEYWORDS")); ?>" />
<meta name="description" content="<?php echo (C("WEB_DESC")); ?>" />

	<title><?php echo (session('username')); ?>-<?php echo (C("WEB_NAME")); ?></title>
	<script type="text/javascript">
	var MODULE='/mytest/mingzhi/index.php/Home';
	var HOME_IMAGES='/mytest/mingzhi/Public/Home/images';
	var PUBLIC_PATH='<?php echo C("PUBLIC_PATH");?>';
    var AJAX_ERROR='<?php echo C("AJAX_ERROR_TIPS");?>';
	var default_question_desc='<?php echo C("DEFAULT_QUESTION_DESC");?>';
	var DEFAULT_QUESTION_URL=MODULE+"/Question/qindex/qid/";
	</script>
	<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/indexheader.css" />
	<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/topic.css" />
	<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/fenye.css" />
	<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/footer.css" />
	<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/static/layer-2.4/layer.js"></script>
	<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/static/wangEditor/dist/css/wangEditor.min.css" />
	<script type="text/javascript" src="/mytest/mingzhi/Public/static/lightBox/js/jquery.lightbox-0.5.js"></script>	
	<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/jQuery.tween.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/js.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/header.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/FocusTopic.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/LoadTopicInfo.js"></script>
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


	</script>                   
	<div class="header">

			<div class="page-menu-wrapper clearfix" >
				<ul class="menu-function">
					<li>
						<a href="/mytest/mingzhi/index.php/Home/Index/index" title="" class="home" ><font  size="6"><?php echo (C("WEB_NAME")); ?></font></a>                                    
					</li>
					<li id="search-hidden">
						<input type="text" name="" class="searchinput" placeholder="搜索话题,人物或问题"><a href="javascript:void(0);" class="search_btn" title=""><img  src="/mytest/mingzhi/Public/Home/images/search_s.png"></a>
					</li>
					
				</ul>
				<!-- S SEARCH-RESULT -->	
					
				<div class="search-container"></div>
				<!-- E SEARCH-RESULT -->
				
				
				<ul class="menu-share">
                 <li><a href="index.html">发现</a></li>
                <li><a href="/mytest/mingzhi/index.php/Home/Topic/index">话题</a></li>
                  <li><a href="javascript:void(0);" class="notifications">消息<span class="nav-counter nav-counter-blue">9</span></a>
                  </li>
                   
                  <div class="notificationsbox">
						<div class="notifications-arrow-range">
							<b class="notifications-arrow-outer"></b>
							<b class="notifications-arrow-inner"></b>				
						</div>					
						<div class="notificationscon">
							<!-- <div class="notifications-go-all"><a href="/mytest/mingzhi/index.php/Home/notifications/index">查看全部消息 </a></div>						 			
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
									<div class="tab_1" id="s" >
									    <div class="no-notifications">
										<img src="/mytest/mingzhi/Public/Home/images/notifications.png"/><br>
										<span>没有更多消息</span>   
										</div>
									</div>
									<div class="tab_2" id="f" style=" display: none;">
									<span class="no-message">你收到的赞同会在这里显示</span>
									</div>
									<div class="tab_3" id="g" style=" display: none;"> 
									<span class="no-message">有人关注你时会显示在这里</span>
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
						<a href="/mytest/mingzhi/index.php/Home/Profile/index/u/<?php echo (session('uid')); ?>" title="" class="mymainname"><img src="<?php echo (session('avatar_file')); ?>" class="mytouxiangimg"><span class="myname_header"><?php echo (session('username')); ?></span></a>
						<ul class="dropdown-menu follow">
							<li><a href="/mytest/mingzhi/index.php/Home/Profile/index/u/<?php echo (session('uid')); ?>" >我的主页</a></li>
							<li><a href="/mytest/mingzhi/index.php/Home/Inbox/index" >私信<img src="/mytest/mingzhi/Public/Home/images/yuandian.png"/></a></li>
							<li><a href="" >设置</a></li>
							<li><a href="/mytest/mingzhi/index.php/Home/Index/exitsys">退出</a></li>
							
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


<div class="topicguangchang">关注的话题<span>已关注<a href="javascript:void(0)"><?php echo ($focus_topic_count); ?></a>个话题</span></div>

<div class="topicconcernlist">
    
<ul  class="bubblemenu"> 
<?php if(is_array($all_focus_topic)): $i = 0; $__LIST__ = $all_focus_topic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$topicinfo): $mod = ($i % 2 );++$i;?><li>
<input type="hidden" class="hidden-topic-id" value="<?php echo ($topicinfo["id"]); ?>">
<a href="<?php echo U('Home/Topic/index',array('idt'=>$topicinfo['id']));?>"  class="nav_topicname enter-topicname"><?php echo ($topicinfo["topic_name"]); ?></a> 

<div>
<div id="topicinformation">
<div id="topicinfo"></div>
<div class="topicopinfooperation">问题：<a href="javascript:void(0);" class="topic-question-count"></a> &nbsp;&nbsp;热点：<a href="javascript:void(0);" class="topic-hot-question-count"></a>&nbsp;&nbsp;关注者:<a href="javascript:void(0);" class="topic-foucs-person-count"></a>
<a href="javascript:void(0);" class="topicinfoquxiao topic-focus-btn"><?php if($hottopic['focus_id'] == ''): ?>关注话题<?php else: ?>取消关注<?php endif; ?></a>


<input type="hidden" class="hidden-topic-id" value="<?php echo ($topicinfo["id"]); ?>">

</div>


</div>
             
</div>
</li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
    
	</div>

<div class="topicallcontent">
<div class="topic_new_question_tag">
<span>话题最新问题</span>
</div>

<div  class="topic_detail_info topic-selected-div">
<img src="<?php echo ($topic_info["topic_pic"]); ?>" /> 
<a href="<?php echo U('Home/Topic/index',array('tid'=>$topic_info['topic_id'],'sel'=>'trends'));?>" class="topic_detail_info_name"><?php echo ($topic_info["topic_name"]); ?></a>
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
<span class="answer-toquestion upvote"><a href="javascript:void(0);"><img src="/mytest/mingzhi/Public/Home/images/answerquestion.png">&nbsp;回答  &nbsp;</a> </span><a href="#"><img src="/mytest/mingzhi/Public/Home/images/add.png"/>关注问题</a><a href="javascript:void(0)" class="pass">不感兴趣</a>
<span class="shadow_border">
<a href="#"><img src="/mytest/mingzhi/Public/Home/images/collect.png"/> 收藏</a>
<a href="#"><img src="/mytest/mingzhi/Public/Home/images/report.png"/> 举报</a>
</span>

</div>

</div><?php endforeach; endif; else: echo "还没问题怎么办，快去提问吧" ;endif; ?>

<br>
<div class="pagelist"><?php echo ($page); ?></div> 
<br><br>

</div>






</div> 
<!-- 左边内容结束 -->


<!-- 右边部分开始 -->
<div id="topicmainright">


<div class="gotopicquare">
<a href="/mytest/mingzhi/index.php/Home/Topics/index" class="gototopic">话题广场</a>
</div>

<!--热门话题开始  -->
<div class="hottopicview">
   <span class="hottop-title">热门话题</span>
   
   <!--热门话题内容开始  -->
   <?php if(is_array($hot_topic)): $i = 0; $__LIST__ = $hot_topic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hot_topic): $mod = ($i % 2 );++$i;?><div class="hottopicsss">
	<div class="hottopicsss-touxiang"><a href="<?php echo U('Home/Topic/index',array('tid'=>$hot_topic['id'],'sel'=>'trends'));?>">
	<img src="<?php echo ($hot_topic["topic_pic"]); ?>" width="40" height="40"/></a>
	</div>
	<div class="hottopicsss-rightcontent">
	<a href="<?php echo U('Home/Topic/index',array('tid'=>$hot_topic['id'],'sel'=>'trends'));?>" class="hottopicsss-topicname"><?php echo ($hot_topic["topic_name"]); ?></a><a href="javascript:void(0);" class="hottopicsss-tianjiafocus">
	<?php if($hot_topic['focus_id'] == ''): ?><img src="/mytest/mingzhi/Public/Home/images/add.png"/>关注
	<?php else: ?>
	取消关注<?php endif; ?>
	</a>
	
	</div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
   
   
   
    
   <!--热门话题内容结束  -->
   
</div>
<!--热门话题结束 -->
<div class="footer">
<div class="copyright">
<a href="#"><?php echo (C("WEB_COPYRIGHT")); ?></a><a href="#"><?php echo (C("WEB_FOOTER_DECLARE")); ?></a><a href="<?php echo U('Home/Terms/index');?>"><?php echo (C("WEB_FOOTER_AGREEMENT")); ?></a><a href="#"><?php echo (C("WEB_FOOTER_CONNECT")); ?></a>
</div>
</div>

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
                       <img src="<?php echo (session('avatar_file')); ?>"/> <span><em><?php echo (session('username')); ?></em>&nbsp; , <?php echo (session('tag')); ?></span>
                      </div>    
                      <!--E 回答者信息  -->
                      
                      <!--S 编辑器 -->              
                      <div id="editor-container" class="answercontainer"><div id="editor-trigger"></div></div>
                      <!--E 编辑器  -->
                      <input type="checkbox" name="isHaveName" id="isHaveName" > <label for="isHaveName">匿名</label>
                      <div class="writeranswer-function">
                      <input type="button" class="add_button_answer" value="提交回答"/>&nbsp;<a href="javascript:void(0)" class="answer_reset">取消</a>
                      
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
		    <span><a href="/mytest/mingzhi/index.php/Home/Publish/index">高级模式</a></span>
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