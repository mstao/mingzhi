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
    var mp=<?php echo ($mp); ?>;
    var PUBLIC_PATH='<?php echo C("PUBLIC_PATH");?>';
	</script>
<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/indexheader.css" />
<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/topics.css" />
<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/footer.css" />
<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/jQuery.tween.js"></script>
<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/truncaString.js"></script>
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

<!--主体内容-->


<div id="maincontent">

<!--左边内容开始  -->
<div class="leftcontent">
<div class="topicguangchang">话题广场 <span>已关注<a href="yiguanzhu"><?php echo ($focus_topic_count); ?></a>个话题</span></div>
<!--父级话题展示 开始 -->
<div class="fathertopic">

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
<!--父级话题展示结束  -->

<!--公共话题展示开始 -->
<div class="alltopics grid">

<!-- 引入模板 -->
<?php if(is_array($all_topic)): $i = 0; $__LIST__ = $all_topic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$all_topic): $mod = ($i % 2 );++$i;?><!--一个话题div开始  -->
<div class="onetopicinfo grid-item">
<div class="onetopicinfo-touxiang"><a href="<?php echo U('Home/Topic/index',array('tid'=>$all_topic['tid'],'sel'=>'trends'));?>">
<img src="<?php echo ($all_topic["topic_pic"]); ?>" width="40" height="40"/></a>
</div>
<div class="onetopicinfo-rightcontent">
<div class="onetopicinfo-topicfirst"><a href="<?php echo U('Home/Topic/index',array('tid'=>$all_topic['tid'],'sel'=>'trends'));?>" class="onetopicinfo-topicname"><?php echo ($all_topic["topic_name"]); ?></a><a href="#" class="onetopicinfo-tianjiafocus">
<?php if($all_topic['focus_id'] == ''): ?><img src="/mytest/mingzhi/Public/Home/images/add.png"/>关注
<?php else: ?>
<span style="color:#666666;">取消关注</span><?php endif; ?>
</a></div>
<div class="onetopicinfo-topicdesc"><?php echo (msubstr($all_topic["topic_desc"])); ?> </div>


</div>
</div>
<!--一个话题div结束  --><?php endforeach; endif; else: echo "" ;endif; ?>

</div>
<!--公共话题展示结束 -->
</div>
<!--左边内容结束  -->


<!--右边内容开始  -->
<div class="rightcontent">
<span>推荐话题</span>

<div class="tuijiantopic">

<?php if(is_array($commend_topic)): $i = 0; $__LIST__ = $commend_topic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$commend_topic): $mod = ($i % 2 );++$i;?><!-- 话题内容开始 -->
<div class="tui-sss">
<div class="tui-touxiang">
<img src="<?php echo ($commend_topic["topic_pic"]); ?>" width="40" height="40"/>
</div>
<div class="tui-rightcontent">
<div class="where">
 <ul  class="bubblemenu"> 
           
<li>
<a href="#"><?php echo ($commend_topic["topic_name"]); ?></a>
 <div>
<div id="topicinformation">
<div id="topicinfo">
<div class="topicinfomytouxiang"><a href="#">
<img src="<?php echo ($commend_topic["topic_pic"]); ?> width="40" height="40"/></a>
</div>
<div class="topicinforightcontent">
<div class="topicinfoname">英雄联盟</div>
<div class="topicinfonameanswer">《英雄联盟》（简称lol）是由美国Riot Games开发，腾讯游戏运营的英雄对战网游。《英雄联盟》除了即时战略、团队作战外，还拥有特色的英雄、自动匹配的战网平台，包括天赋树、召唤师系统、符文等元素。 </div>
 


</div>
</div>
<div class="topicopinfooperation">问题：<a href="#">30</a> &nbsp;&nbsp;热点：<a href="#">16</a>&nbsp;&nbsp;关注者:<a href="#">17</a><a href="#" class="topicinfoquxiao"><img src="/mytest/mingzhi/Public/Home/images/add.png"/>关注</a></div>


</div>
             
</div>
</li>
</ul>


</div>
<div class="foucus-number"><?php echo ($commend_topic["topic_focus_count"]); ?> 人关注</div>

</div>

<div class="tui-answer"><a href="/mytest/mingzhi/index.php/Home/Question/qindex" >你为什么喜欢英雄联盟，你最喜欢英雄联盟里的哪个英雄? </a></div>
</div>
<!-- 话题内容结束 --><?php endforeach; endif; else: echo "" ;endif; ?>



</div>

<div class="copyright">
<a href="#"><?php echo (C("WEB_COPYRIGHT")); ?></a><a href="#"><?php echo (C("WEB_FOOTER_DECLARE")); ?></a><a href="<?php echo U('Home/Terms/index');?>"><?php echo (C("WEB_FOOTER_AGREEMENT")); ?></a><a href="#"><?php echo (C("WEB_FOOTER_CONNECT")); ?></a>
</div>
</div>
<!--右边内容结束  -->

</div>



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
<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/dynamics.js"></script>
<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/minigrid.js"></script>
<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/alltopicloading.js"></script>


<script type="text/javascript">
$(function(){
	var track_click = 0;
	$(window).scroll(function(){
	  
  	　　var scrollTop = $(this).scrollTop();//滚动高度
  	　　var scrollHeight = $(document).height();//内容高度
  	　　var windowHeight = $(this).height();//可见高度
  	　　if(scrollTop + windowHeight == scrollHeight){
  		 track_click++;
  		if(track_click<mp){
  	　　　　//加载话题数据
  		$.ajax({
			type:'post',
			dataType:'html',
			url:MODULE+'/Topics/index',
			data:'p='+track_click,
			beforeSend:function(){
				//显示正在加载
				layer.load(2);
			},
			success:function(data){

				//关闭正在加载
				setTimeout(function(){
					  layer.closeAll('loading');
				}, 1000);
				$('.grid').append(data);
				$.getScript(PUBLIC_PATH+"Home/js/alltopicloading.js");
			},
			error:function(){

				//关闭正在加载
				setTimeout(function(){
				  layer.closeAll('loading');
				}, 1000);
				layer.msg(AJAX_ERROR, {icon: 2,time:2000});
		    }
		});
  		}
  	　}
  });
});
</script>