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
	 var HOME_IMAGES="/mytest/mingzhi/Public/Home/images";
     var PUBLIC_PATH='<?php echo C("PUBLIC_PATH");?>';
     var AJAX_ERROR="<?php echo (C("AJAX_ERROR_TIPS")); ?>";
     var default_question_desc="<?php echo (C("DEFAULT_QUESTION_DESC")); ?>";
     var r_p=<?php echo ($ajax_p); ?>;
     var u=<?php echo ($uid); ?>;
    </script>
    
    <link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/indexheader.css" />
	<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/profile.css" />
	<link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/common.css" />
	
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
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/report.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/CommentAnswer.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/LoadAnswerComments.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/ReplayComment.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/CommentOperate.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/LoadCollectionInfo.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/AddCollection.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/FocusQuestion.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/Suggest.js"></script>
	<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/notifications.js"></script>
	
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

<!--导航栏结束-->           
	

<!--主体内容-->

<div id="myhomecontent">



<div class="myhomecontentleft">

<!-- 个人资料开始 -->
<!-- 个人资料 -->
<div class="gerenzhiliao">
<div class="myhonetouxiang">
<?php if($umsg['avatar_file'] == ''): ?><img src="/mytest/mingzhi/Public/Home/images/default-avatar-big.png"  class="mytouxiangimg" width="100" height="100" />
<?php else: ?>
<img src="<?php echo ($umsg["avatar_file"]); ?>"  class="mytouxiangimg" width="100" height="100" /><?php endif; ?>

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
<?php if($umsg['uid'] == $umsg['session_id']): ?><div class="bianjimycontent"><a href="/mytest/mingzhi/Home/Profile/edit/u/<?php echo (session('uid')); ?>"><img src="/mytest/mingzhi/Public/Home/images/edit.png" class="image_edit" />编辑我的资料</a></div>
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

<li><a href="#" >编辑<span class="shoucangnumber">0</span></a></li>
<li><a href="<?php echo U('Home/Profile/index',array('u'=>$umsg['uid'],'sel'=>'upvote'));?>" >赞同<span class="shoucangnumber"><?php echo ($u_count["upvote_count"]); ?></span></a></li>
<li><a href="<?php echo U('Home/Profile/index',array('u'=>$umsg['uid'],'sel'=>'collect'));?>" >收藏夹<span class="shoucangnumber"><?php echo ($u_count["collection_count"]); ?></span></a></li>
</ul>
</div>



</div>

<div class="newactivity">

<div class="mydongtaibiaoqian"><?php echo ($umsg["username"]); ?>的赞同</div>

<!--赞同动态-->

<div class="mytrends_content">
<!--AJAX 加载个人动态  -->
 
<?php if(is_array($record_info)): $i = 0; $__LIST__ = $record_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$record_info_details): $mod = ($i % 2 );++$i;?>

<div class="mydongtai-ua index-rightcontent">
<div class="mydongtai-ua-tag"><span class="dongtai-type-zan">赞同了回答</span><span class="dongtai-time-zan"><?php echo (time2Units($record_info_details["add_time"])); ?></span></div>
<div class="mydongtai-ua-question"><a href="<?php echo U('Home/Question/qindex',array('qid'=>$record_info_details['question_id']));?>"><?php echo ($record_info_details["question_name"]); ?></a></div>
<div class="mydongtai-ua-user"><img src="<?php echo ($record_info_details["avatar_file"]); ?>" width="50px" height="50px"/> <span class="mydongtai-ua-username"><?php echo ($record_info_details["username"]); ?></span></div>
<div class="mydongtai-ua-answer Editor-txt"><?php echo ($record_info_details["answer_content"]); ?></div>

<!-- 引入回答通用模板 -->


<div class="index_my_left_category  answer-operate">
<input type="hidden" class="hide_answer_id" value="<?php echo ($record_info_details["id"]); ?>">
<input type="hidden" class="hide_question_id" value="<?php echo ($record_info_details["question_id"]); ?>">
<span class="upvote answer-upvote">
<?php if($record_info_details['vote_value'] == 1): ?><a href="javascript:void(0);" style="color:#666666;">已赞 </a> <i class="answer-upvote-count" style="color:#666666"><?php echo ($record_info_details["upvote_count"]); ?></i>
<?php else: ?>
<a href="javascript:void(0);" >赞同</a> <i class="answer-upvote-count"><?php echo ($record_info_details["upvote_count"]); ?></i><?php endif; ?>
</span>
<a href="javascript:void(0);">反对</a>
<a href="javascript:void(0);" class="focus-question-btn">
<?php if($record_info_details['q_focus_id'] == ''): ?><img src="/mytest/mingzhi/Public/Home/images/add.png"/>关注问题
<?php else: ?>
<img src="/mytest/mingzhi/Public/Home/images/nofocus.png"/>取消关注<?php endif; ?>
</a>
</a>
<?php if($record_info_details['comment_count'] == 0): ?><a href="javascript:void(0)" class="commentbtn"><img src="/mytest/mingzhi/Public/Home/images/comment.png"/>添加评论</a>
<?php else: ?>
<a href="javascript:void(0)" class="commentbtn"><img src="/mytest/mingzhi/Public/Home/images/comment.png"/>评论</a><span class="shoucangnumber"><?php echo ($record_info_details["comment_count"]); ?></span><?php endif; ?>

<span class="shadow_border">
<a href="javascript:void(0);" class="answer-collection-btn"><img src="/mytest/mingzhi/Public/Home/images/collect.png"/> 收藏</a>
<a href="javascript:void(0);" class="report-answer-btn">
<?php if($record_info_details['a_report_id'] == ''): ?><img src="/mytest/mingzhi/Public/Home/images/report.png"/> 举报
<?php else: ?>
<img src="/mytest/mingzhi/Public/Home/images/report_blue.png" /><font style="color:#0F88EB;">已举报</font><?php endif; ?>
</a>
</span>

</div>


<div class="commentbox">
			<div class="arrow-range">
				<b class="arrow-outer"></b>
				<b class="arrow-inner"></b>				
			</div>
			<div class="commentcon">
					 
					 
					 
				<div class="othercomment_mycomment">
				    <div> 
				        <?php if($headerinfo['avatar_file'] == ''): ?><img src="/mytest/mingzhi/Public/Home/images/default-avatar.png" class="mycommen_touxiang" >
				        <?php else: ?>
				        <img src="<?php echo ($headerinfo["avatar_file"]); ?>" class="mycommen_touxiang" ><?php endif; ?>
						
						
						<div class="mycomment_input" contenteditable="true"></div>
					</div>
					<div >
						<form action="" method="">
						    <div class="replay-other-btn-div">
						    <input type="submit" value="评论" class="replay-other-btn" data-answer-id="<?php echo ($record_info_details["id"]); ?>">
						    </div>
						</form>
					</div>
				</div>
				
				
				
                       	
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
			    
			</div>
</div> 


</div>
<?php endforeach; endif; else: echo "还没有评论哦，赶紧来抢沙发吧:)" ;endif; ?>
 

</div>


<!--S 点击加载更多 -->
<div class="js-load-more js-load-more-upvote"><span class="loading_span">加载更多</span><img src="/mytest/mingzhi/Public/Home/images/loading.gif" class="loading_image"/></div>
<!--E 点击加载更多-->


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
<a href="<?php echo U('Home/Topic/index',array('tid'=>$focus_topic['id'],'sel'=>'trends'));?>" class="enter-topicname" data-topic-id="<?php echo ($focus_topic["id"]); ?>"><?php echo ($focus_topic["topic_name"]); ?></a>
<div>
<div id="topicinformation">
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
		    <span><a href="/mytest/mingzhi/Home/Publish/index">高级模式</a></span>
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


</body>
</html>