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
        var HOME_IMAGES="/mytest/mingzhi/Public/Home/images";
        var AJAX_ERROR="<?php echo (C("AJAX_ERROR_TIPS")); ?>";
        var default_question_desc="<?php echo (C("DEFAULT_QUESTION_DESC")); ?>";
    </script>
    <link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/indexheader.css" />
	<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/profile.css" />
	<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/jquery.form.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/jQuery.tween.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/truncaString.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/static/layer-2.4/layer.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/placeImage.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/static/lightBox/js/jquery.lightbox-0.5.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/profile/profile.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/js.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/header.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/upvoteso.js"></script>
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

<!--导航栏结束-->           
	

<!--主体内容-->

<div id="myhomecontent">



<div class="myhomecontentleft">

<!-- 个人资料开始 -->
<!-- 个人资料 -->
<div class="gerenzhiliao">
<div class="myhonetouxiang">

<img src="<?php echo ($umsg["avatar_file"]); ?>"  class="mytouxiangimg" width="100" height="100" />
<?php if($umsg['uid'] == $umsg['session_id']): ?><div class="mytouxiang_upload_div">
<form id="myupload" enctype="multipart/form-data" method="post">
 <input type="file" name="myavatar" id="myavatar" class="checkmyavatar"> 
</form>
</div>
<?php else: endif; ?>
</div>

<div class="myhomecontentmyzhiliaoright">
<!--S myusername  -->
<div class="myname"><span class="myname_con"><?php echo ($umsg["username"]); ?></span>
<?php if($umsg['uid'] == $umsg['session_id']): ?><span class="myname_edit_span_tag myright_edit_span"><img src="/mytest/mingzhi/Public/Home/images/edit.png"><a href="javascript:void(0)">编辑</a></span>
<?php else: endif; ?>
<div class="myname_tag_hidd">
<div class="myname_tag_hidd_edit" contenteditable="true"></div>
<div class="myname_tag_hide_oper"><input type="button" class="add_button_name add_button" value="修改"/>&nbsp;<a href="javascript:void(0)" class="myname_tag_reset myright_reset">取消</a></div>
</div> 
<!--E myusername  -->
</div>   
<!-- 一句话描述开始 -->           
<div class="biaoqian">
<span class="biaoqian_con">
<?php if($umsg['tag'] == ''): ?>写句话介绍一下自己
<?php else: ?>
<?php echo ($umsg["tag"]); endif; ?>

</span>
<?php if($umsg['uid'] == $umsg['session_id']): ?><span class="mybiaoqian_edit_span_tag myright_edit_span"><img src="/mytest/mingzhi/Public/Home/images/edit.png"><a href="javascript:void(0)">编辑</a></span>
<?php else: endif; ?>
<div class="mybiaoqian_tag_hidd">
<div class="mybiaoqian_tag_hidd_edit" contenteditable="true"></div>
<div class="mybiaoqian_tag_hide_oper"><input type="button" class="add_button_biaoqian add_button" value="修改"/>&nbsp;<a href="javascript:void(0)" class="mybiaoqian_tag_reset myright_reset">取消</a></div>
</div> 

</div>

<!-- 一句话描述结束 -->   

<!-- S city job sex  -->
<div class="myinfo_address_work_sex">
<span><img src="/mytest/mingzhi/Public/Home/images/address.png"/> 
<?php if($umsg['city'] == ''): ?>暂无地址信息
<?php else: ?>
<?php echo ($umsg["city"]); endif; ?></span>&nbsp;
<span><img src="/mytest/mingzhi/Public/Home/images/work.png"/>
<?php if($umsg['job'] == ''): ?>暂无工作信息
<?php else: ?>
<?php echo ($umsg["job"]); endif; ?> </span>&nbsp;
<span>
<?php if($umsg['sex'] == '男'): ?><img src="/mytest/mingzhi/Public/Home/images/man.png"/>
<?php elseif($umsg['sex'] == '女'): ?>
   <img src="/mytest/mingzhi/Public/Home/images/woman.png"/>
<?php else: ?>
性别暂无<?php endif; ?>
</span>
</div>
<!-- E city job sex  -->

<!--S myweb  -->
<div class="myweb"><span class="myweb_con"><img src="/mytest/mingzhi/Public/Home/images/myweb.png"/>&nbsp;
<?php if($umsg['myweb'] == ''): ?>暂无个人网站
<?php else: ?>
<a href="http://<?php echo ($umsg["myweb"]); ?>"><?php echo ($umsg["myweb"]); ?></a><?php endif; ?>
</span>
</div>

<!--E myweb  -->

 <!--S 我擅长的话题  -->
<!--
<div  class="mygoodat_topic">
</div>
E 我擅长的话题  -->

<!--S editlink  -->
<?php if($umsg['uid'] == $umsg['session_id']): ?><div class="bianjimycontent"><a href="/mytest/mingzhi/index.php/Home/Profile/edit/u/<?php echo (session('uid')); ?>"><img src="/mytest/mingzhi/Public/Home/images/edit.png" class="image_edit" />编辑我的资料</a></div>
<?php else: endif; ?>
<!--E editlink  -->
</div>

</div>

<!-- 个人资料结束 -->
<!-- 我的动态开始  -->
<!-- 我的个人动态 -->
<div class="allactivity">
<div class="ding">我的动态</div>
<div class="dongtai"><a href="<?php echo U('Home/Profile/index',array('u'=>$umsg['uid']));?>" >最新动态</a></div>
<div id="nav">
<ul>
<li><a href="<?php echo U('Home/Profile/index',array('u'=>$umsg['uid'],'sel'=>'question'));?>" >提问<span class="shoucangnumber"><?php echo ($u_count["question_count"]); ?></span></a></li>
<li><a href="<?php echo U('Home/Profile/index',array('u'=>$umsg['uid'],'sel'=>'answer'));?>" >回答<span class="shoucangnumber"><?php echo ($u_count["answer_count"]); ?></span></a></li>
<li><a href="<?php echo U('Home/Profile/index',array('u'=>$umsg['uid'],'sel'=>'collect'));?>" >收藏<span class="shoucangnumber">0</span></a></li>
<li><a href="#" >编辑<span class="shoucangnumber">0</span></a></li>
<li><a href="<?php echo U('Home/Profile/index',array('u'=>$umsg['uid'],'sel'=>'upvote'));?>" >赞同<span class="shoucangnumber"><?php echo ($u_count["upvote_count"]); ?></span></a></li>
</ul>
</div>



</div>

<div class="newactivity">

<div class="mydongtaibiaoqian"><?php echo ($umsg["username"]); ?>的收藏</div>

<!--赞同动态-->












</div>
<!-- 我的动态结束 -->


</div>

<!-- 我的主页信息开始 -->

<!-- 我的主页信息 -->
<div class="mything">
<div class="allguanzhu"><div class="guanzhule">关注了:<a href="#"><?php echo ($umsg["focus_person"]); ?>人</a></div><div class="beiguanzhu">粉丝量:<a href="#"><?php echo ($umsg["fans_count"]); ?>人</a></div></div>

<div class="guanzhutopic">关注了<a href="<?php echo U('Home/Topic/index');?>"><?php echo ($umsg["focus_topic_count"]); ?></a>个话题</div>
<div class="guanzhutopiccontent">

<!-- S topicinfo -->
<ul  class="bubblemenu"> 

<?php if(is_array($focus_topic)): $i = 0; $__LIST__ = $focus_topic;if( count($__LIST__)==0 ) : echo "还没有关注话题哦" ;else: foreach($__LIST__ as $key=>$focus_topic): $mod = ($i % 2 );++$i;?><li>

<input type="hidden" class="hidden-topic-id" value="<?php echo ($focus_topic["id"]); ?>">
<a href="<?php echo U('Home/Topic/index',array('tid'=>$focus_topic['id'],'sel'=>'trends'));?>" class="enter-topicname"><?php echo ($focus_topic["topic_name"]); ?></a>
<div>
<div id="topicinformation">
<div id="topicinfo"></div>
<div class="topicopinfooperation">问题：<a href="javascript:void(0);" class="topic-question-count"></a> &nbsp;&nbsp;热点：<a href="javascript:void(0);" class="topic-hot-question-count"></a>&nbsp;&nbsp;关注者:<a href="javascript:void(0);" class="topic-foucs-person-count"></a>
<a href="javascript:void(0);" class="topicinfoquxiao topic-focus-btn"><?php if($focus_topic['focus_id'] == ''): ?>关注话题<?php else: ?>取消关注<?php endif; ?></a>


<input type="hidden" class="hidden-topic-id" value="<?php echo ($focus_topic["id"]); ?>">

<?php if($focus_topic['focus_id'] == ''): ?><input type="hidden" class="hidden-topic-focus-status" value="0">
<?php else: ?>
<input type="hidden" class="hidden-topic-focus-status" value="1"><?php endif; ?>
</div>


</div>
             
</div>
</li><?php endforeach; endif; else: echo "还没有关注话题哦" ;endif; ?>
 
</ul>
<!-- E topicinfo -->




</div>
<div class="zhuyeliulanzhe">主页浏览量:<a href="#"><?php echo ($umsg["u_view_count"]); ?>人</a></div>
<div class="xinxi">

<a href="#">©2016 明之</a><a href="#">声明</a><a href="#">明之协议</a><br/><a href="#">联系我们</a>
</div>

</div>
<!-- 我的主页信息结束 -->


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
<!--弹窗结束 -->

<!--浏览我的头像  -->
<div class="mark"></div>
  <div class="checkimage-dialog">
             
                <div class="checkimage-close" onclick="$('.mark,.checkimage-dialog').hide();"></div> 
                <div class="checkimage-dialog-title">
                   选择头像
                </div> 
          
                <div class="checkimage-dialog-cont"> 
                
                  <img id="preview" src="" alt="" name="pic" width="200px" height="200px" />
                  <div class="progress">
				    <div class="progress-bar progress-bar-striped" ><span class="percent">50%</span></div>
				  </div>
                  <div class="avatar_operate_open">
                     <input type="button" class="add_button_avatar add_button" value="上传头像"/>&nbsp;&nbsp;<a href="javascript:void(0)" class="myright_avatar_reset myright_reset" onclick="$('.mark,.checkimage-dialog').hide();">取消</a>
                  </div>
                </div>
                
               <!--  <div id="preview-pane">
                    <div class="preview-container">
                  <img  id="jcrop-preview" alt="Preview" />
                    </div>
                </div>
                获取裁剪后的图片属性 
                <form action="crop.php" method="post" onsubmit="return checkCoords();">
					<input type="hidden" id="x" name="x" />
					<input type="hidden" id="y" name="y" />
					<input type="hidden" id="w" name="w" />
					<input type="hidden" id="h" name="h" />
					<input type="submit" value="Crop Image" class="btn btn-large btn-inverse" />
				</form> -->
</div> 


</body>
</html>