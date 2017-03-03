<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="keywords" content="<?php echo (C("WEB_KEYWORDS")); ?>" />
<meta name="description" content="<?php echo (C("WEB_DESC")); ?>" />

	<title><?php echo (session('username')); ?>-<?php echo (C("WEB_NAME")); ?></title>
	<script type="text/javascript">
	var MODULE="/mytest/mingzhi/index.php/Home";
	var default_question_desc="<?php echo (C("DEFAULT_QUESTION_DESC")); ?>";
	var DEFAULT_QUESTION_URL=MODULE+"/Question/qindex/qid/";
	</script>
<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/indexheader.css" />
<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/topic.css" />
<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/answer_topic_question.css" />
<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/footer.css" />
<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/fenye.css" />
<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/static/lightBox/css/jquery.lightbox-0.5.css" />
<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/static/wangEditor/dist/css/wangEditor.min.css" />
<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/jQuery.tween.js"></script>
<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/truncaString.js"></script>
<script type="text/javascript" src="/mytest/mingzhi/Public/static/lightBox/js/jquery.lightbox-0.5.js"></script>
<script type="text/javascript" src="/mytest/mingzhi/Public/static/layer-2.4/layer.js"></script>
<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/js.js"></script>
<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/header.js"></script>
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
<div  class="topic_detail_info">
<img src="<?php echo ($topic_info["topic_pic"]); ?>" /> 
<span class="topic_detail_info_name"><?php echo ($topic_info["topic_name"]); ?></span>
</div>

<div class="topic_detail_info_operate">
  <a href="javascript:void(0);" class="operate_info_span " id="topic_dongtai_link">动态</a>
  <a href="<?php echo U('Home/Topic/index',array('tid'=>$topic_info['topic_id'],'sel'=>'hot'));?>" class="operate_info_span">热门问题</a>&nbsp;
  <a href="<?php echo U('Home/Topic/index',array('tid'=>$topic_info['topic_id'],'sel'=>'unanswered'));?>" class="operate_info_span">等待回答</a>
</div>


<!--S 回答循环渲染页面  -->
<?php if(is_array($new_trends_answer)): $i = 0; $__LIST__ = $new_trends_answer;if( count($__LIST__)==0 ) : echo "话题还没有动态哦.." ;else: foreach($__LIST__ as $key=>$trend_info): $mod = ($i % 2 );++$i;?><!-- 回答问题内容开始 -->
<div class="index-sss">
<div class="touxiang">

<img src="<?php echo ($topic_info['topic_pic']); ?>" width="40" height="40"/>

</div>
<div class="index-rightcontent">
<div class="where">

 <ul  class="bubblemenu"> 
    <li>
            来自&nbsp;&nbsp; <a href="<?php echo U('Home/Topic/index',array('tid'=>$topic_info['id'],'sel'=>'trends'));?>"><?php echo ($topic_info["topic_name"]); ?></a>
        <div>
        <div id="topicinformation">
<div id="topicinfo">
<div class="topicinfomytouxiang"><a href="#">
<img src="<?php echo ($topic_info['topic_pic']); ?>" width="40" height="40"/></a>
</div>
<div class="topicinforightcontent">
<div class="topicinfoname"><a href="<?php echo U('Home/Topic/index',array('tid'=>$topic_info['id'],'sel'=>'trends'));?>"><?php echo ($topic_info["topic_name"]); ?></a></div>
<div class="topicinfonameanswer"><?php echo ($topic_info["topic_desc"]); ?></div>
 


</div>
</div>
<div class="topicopinfooperation">问题：<a href="#"><?php echo ($topic_info["question_count"]); ?></a> &nbsp;&nbsp;热点：<a href="#">16</a>&nbsp;&nbsp;关注者:<a href="#"><?php echo ($topic_info["topic_focus_count"]); ?></a><a href="#" class="topicinfoquxiao">取消关注</a></div>


</div>
             
</div>
</li>
</ul>




</div>
<div class="answer"><a href="<?php echo U('Home/Question/qindex',array('qid'=>$trend_info['question_id']));?>" ><?php echo ($trend_info["question_name"]); ?></a></div>
<!-- 回答开始 -->
<div class="answer-info">

<div class="user">
<?php if($trend_info['isname'] == 0): ?><a href="<?php echo U('Home/Profile/index',array('u'=>$trend_info['uid']));?>" ><?php echo ($trend_info["username"]); ?></a> ，<p class="biaoqian"><?php echo ($trend_info["tag"]); ?></p>
<?php else: ?>
<p class="biaoqian">匿名用户</p><?php endif; ?>
</div>

<div class="summary">

<div class="summary_text"></div>
<a href="javascript:void(0);" class="showhide">显示全部</a>
</div> 
<div class="describe  Editor-txt ">

<?php echo ($trend_info["answer_content"]); ?>
</div>
<a href="javascript:void(0);" class="showhide_hide">隐藏</a>
<div class="edittime">发表于 <span><?php echo (time2Units($trend_info["create_time"])); ?></span></div>
</div>
<!-- 回答结束 -->
<div class="index_my_left_category">

<span class="upvote"><a href="javascript:void(0);">赞同 <?php if($feeds_info_detail['upvote_content'] == ''): else: ?> |<?php echo ($trend_info["upvote_content"]); endif; ?></a> </span><a href="javascript:void(0);">反对</a><a href="javascript:void(0);"><img src="/mytest/mingzhi/Public/Home/images/add.png"/>关注问题</a>
<?php if($feeds_info_detail['comment_content'] == ''): ?><a href="javascript:void(0)" class="commentbtn"><img src="/mytest/mingzhi/Public/Home/images/comment.png"/>添加评论</a>
<?php else: ?>
<a href="javascript:void(0)" class="commentbtn"><img src="/mytest/mingzhi/Public/Home/images/comment.png"/>评论</a><span class="shoucangnumber"><?php echo ($trend_info["comment_content"]); ?></span><?php endif; ?>

<span class="shadow_border">
<a href="#"><img src="/mytest/mingzhi/Public/Home/images/collect.png"/> 收藏</a>
<a href="#"><img src="/mytest/mingzhi/Public/Home/images/report.png"/> 举报</a>
</span>

</div>

<!--评论内容 开始 -->
<div class="commentbox">
			<div class="arrow-range">
				<b class="arrow-outer"></b>
				<b class="arrow-inner"></b>				
			</div>
			<div class="commentcon">
					 
					 
					 <!--我的回复开始  -->
				<div class="othercomment_mycomment">
				    <div>
						<img src="<?php echo (session('avatar_file')); ?>" class="mycommen_touxiang" >
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
				  
				   
				   
						 <!-- 其他人评论内容开始 -->
						<div class="othercomment_info_div">
						<div class="othercomment_user_touxiang">
						<img src="/mytest/mingzhi/Public/Home/images/yingxiong.jpg" />
						</div>
						<div class="replay-rightcontent">
										
						<div class="othercomment_info_message"><a href="#" >当时明月</a>:<span>这种游戏就是这个样子呀，上号这种游戏就是这个样子呀，上号号这种游戏就是这个样子呀，上号</span> </div>
						<div class="othercomment_replay_time"><span class="replay_time">·2天前</span> 
						<!-- 操作开始 -->
						<div class="othercomment_replay_operate">
						<a href="javascript:void(0)"><img  src="/mytest/mingzhi/Public/Home/images/upvote.png"> 赞</a>
						<a href="javascript:void(0)" class="othercomment_replay_btn"><img  src="/mytest/mingzhi/Public/Home/images/replay-inner.png"> 回复</a>
						<a href="javascript:void(0)"><img  src="/mytest/mingzhi/Public/Home/images/report.png"> 举报</a>
						</div>
						
						<!-- 操作结束 -->
						<span class="replay-upvote-num">3 赞</span>
						</div> 
						<!-- 隐藏评论开始 -->
						<div class="replay-other-input-div">
						    <div>
					
								<!-- 回复内容 -->
								<div class="replay-other-input" contenteditable="true"></div>
							</div>
							<div >
								<form action="" method="">
								 
								    <div class="replay-other-btn-div">
								  
								    <input type="submit" value="回复" class="replay-person-btn">
								    </div>
								</form>
							</div>
						</div>	
					    <!--隐藏评论结束  -->
									
						</div>
						</div>
						<!-- 其他人评论内容结束 -->
				   
				         <!-- 其他人评论内容开始 -->
						<div class="othercomment_info_div">
						<div class="othercomment_user_touxiang">
						<img src="/mytest/mingzhi/Public/Home/images/yingxiong.jpg" />
						</div>
						<div class="replay-rightcontent">
										
						<div class="othercomment_info_message"><a href="#" >当时明月</a>:<span>这种游戏就是这个样子呀，上号这种游戏就是这个样子呀，上号号这种游戏就是这个样子呀，上号</span> </div>
						<div class="othercomment_replay_time"><span class="replay_time">·2天前</span> 
						<!-- 操作开始 -->
						<div class="othercomment_replay_operate">
						<a href="javascript:void(0)"><img  src="/mytest/mingzhi/Public/Home/images/upvote.png"> 赞</a>
						<a href="javascript:void(0)" class="othercomment_replay_btn"><img  src="/mytest/mingzhi/Public/Home/images/replay-inner.png"> 回复</a>
						<a href="javascript:void(0)"><img  src="/mytest/mingzhi/Public/Home/images/report.png"> 举报</a>
						</div>
						
						<!-- 操作结束 -->
						<span class="replay-upvote-num">3 赞</span>
						</div> 
						<!-- 隐藏评论开始 -->
						<div class="replay-other-input-div">
						    <div>
					
								<!-- 回复内容 -->
								<div class="replay-other-input" contenteditable="true"></div>
							</div>
							<div >
								<form action="" method="">
								 
								    <div class="replay-other-btn-div">
								  
								    <input type="submit" value="回复" class="replay-person-btn">
								    </div>
								</form>
							</div>
						</div>	
					    <!--隐藏评论结束  -->
									
						</div>
						</div>
						<!-- 其他人评论内容结束 -->
				   
				    
				   
			    </div>
			    <!--其他人评论结束 -->
			</div>
</div> 
<!--评论内容结束  -->

</div>
</div>
<!-- 回答问题内容结束 --><?php endforeach; endif; else: echo "话题还没有动态哦.." ;endif; ?>
<!--E 回答循环渲染页面  -->   

<div class="pagelist"><?php echo ($page); ?></div> 
<br><br>

</div>
<!-- 左边内容结束 -->


<!-- 右边部分开始 -->
<div id="topicmainright">
<div class="focus_topic_button_div">
  <a href="javascript:void(0)" class="focus_topic_button"> <span>关注话题</span></a><br>
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