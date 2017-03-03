<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="keywords" content="<?php echo (C("WEB_KEYWORDS")); ?>" />
<meta name="description" content="<?php echo (C("WEB_DESC")); ?>" />

	<title>私信-<?php echo (C("WEB_NAME")); ?></title>
	<script type="text/javascript">
	 var MODULE="/mytest/mingzhi/index.php/Home";
     var AJAX_ERROR="<?php echo (C("AJAX_ERROR_TIPS")); ?>";
     var default_question_desc="<?php echo (C("DEFAULT_QUESTION_DESC")); ?>";
	</script>
<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/indexheader.css" />
<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/inbox.css" />
<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/footer.css" />
<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/jQuery.tween.js"></script>
<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/truncaString.js"></script>
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

<div id="inboxmain">                 

<!-- 左边内容开始 -->
<div id="inboxleftcontent">


<div class="inboxleft-nav">我的私信<span><a href="javascript:void(0)" class="write_letter_btn">写私信</a></span></div>
<div class="inboxleft-info">

<!-- 一条私信开始 -->
<div class="sss">
<div class="touxiang">
<img src="/mytest/mingzhi/Public/Home/images/yingxiong.jpg" width="40" height="40"/>
</div>
<div class="rightcontent">


<div class="user"><a href="#" >管理员</a>：</div>
<div class="answercon">尊敬的明山，您已经注册成为明之 社区的会员，请您在发表言论时，遵守当地法律法规。
如果您有什么疑问可以联系管理员。</div> 
<div class="timecon">2016-03-22 07:34</div>
<div class="my_left_category">


<span><a href="javascript:void(0);">回复</a></span><span><a href="javascript:void(0);" class="commentbtn">删除</a></span>

</div>



</div>
</div>
<!-- 一条私信结束 -->

<!-- 一条私信开始 -->
<div class="sss">
<div class="touxiang">
<img src="/mytest/mingzhi/Public/Home/images/yingxiong.jpg" width="40" height="40"/>
</div>
<div class="rightcontent">


<div class="user"><a href="#" >管理员</a>：</div>
<div class="answercon">尊敬的明山，您已经注册成为明之 社区的会员，请您在发表言论时，遵守当地法律法规。
如果您有什么疑问可以联系管理员。</div> 
<div class="timecon">2016-03-22 07:34</div>
<div class="my_left_category">


<span><a href="javascript:void(0);">回复</a></span><span><a href="javascript:void(0);" class="commentbtn">删除</a></span>

</div>



</div>
</div>
<!-- 一条私信结束 -->


</div>

</div> 
<!-- 左边内容结束 -->


<!-- 右边部分开始 -->
<div id="inboxmainright">

<span class="tips">Tips:</span>
<p>系统通知会在私信里面哦:)</p>
<p>说些悄悄话( ^_^ )</p>

<div class="footer">
<div class="copyright">
<a href="#"><?php echo (C("WEB_COPYRIGHT")); ?></a><a href="#"><?php echo (C("WEB_FOOTER_DECLARE")); ?></a><a href="<?php echo U('Home/Terms/index');?>"><?php echo (C("WEB_FOOTER_AGREEMENT")); ?></a><a href="#"><?php echo (C("WEB_FOOTER_CONNECT")); ?></a>
</div>
</div>
</div>
 
<!-- 右边部分结束 -->



</div>
<!-- 主体内容结束 -->


<!-- 写私信弹出开始 -->
<div class="mark"></div>
  <div class="letter-dialog">
             
                <div class="letter-close" onclick="$('.mark,.letter-dialog').hide();"></div> 
                <div class="letter-dialog-title">
                   写私信
                </div> 
                <div class="letter-dialog-cont"> 
                    <div class="theme-popbod">
                      
                
                      <div class="openModal-sixin">
			             <div class="openModal-sixin-content" contenteditable="true">搜索用户</div>
			             <div class="openModal-sixin-desc" contenteditable="true">填写私信内容</div> 
                      </div> 
                       <div class="openModal-sixin-opr">
                       <a href="javascript:void(0)" class="letter_reset" onclick="$('.mark,.letter-dialog').hide();">取消</a>
                       <input class="letter_submit" type="submit" name="submit" value="发送 " />
                       </div>

                   </div>
                </div>
        </div> 
<!-- 写私信弹出结束 -->


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
             <span></span>
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