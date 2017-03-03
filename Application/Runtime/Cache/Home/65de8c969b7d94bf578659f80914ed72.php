<?php if (!defined('THINK_PATH')) exit(); if(is_array($feeds_info)): $i = 0; $__LIST__ = $feeds_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feeds_info_all): $mod = ($i % 2 );++$i; if($feeds_info_all['feed_flag'] == 'q'): if(is_array($feeds_info_all['question'])): $i = 0; $__LIST__ = $feeds_info_all['question'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feeds_info_detail): $mod = ($i % 2 );++$i;?><div class="index-sss">
<div class="touxiang">
<?php if(is_array($feeds_info_detail['topic'])): $i = 0; $__LIST__ = $feeds_info_detail['topic'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$focus_topic_info): $mod = ($i % 2 );++$i;?><img src="<?php echo ($focus_topic_info['topic_pic']); ?>" width="40" height="40"/><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div class="index-rightcontent">




<div class="where">
<?php if(is_array($feeds_info_detail['topic'])): $i = 0; $__LIST__ = $feeds_info_detail['topic'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$focus_topic_info): $mod = ($i % 2 );++$i;?><ul  class="bubblemenu"> 
    <li>
            来自&nbsp;&nbsp; 
  
<input type="hidden" class="hidden-topic-id" value="<?php echo ($focus_topic_info["id"]); ?>">
<a href="<?php echo U('Home/Topic/index',array('tid'=>$focus_topic_info['id'],'sel'=>'trends'));?>" class="enter-topicname"><?php echo ($focus_topic_info["topic_name"]); ?></a>
<div>
<div class="topicinformation">
<div class="topicinfo"></div>
<div class="topicopinfooperation">问题：<a href="javascript:void(0);" class="topic-question-count"></a> &nbsp;&nbsp;热点：<a href="javascript:void(0);" class="topic-hot-question-count"></a>&nbsp;&nbsp;关注者:<a href="javascript:void(0);" class="topic-foucs-person-count"></a>
<a href="javascript:void(0);" class="topicinfoquxiao topic-focus-btn"><?php if($focus_topic_info['focus_id'] == ''): ?>关注话题<?php else: ?>取消关注<?php endif; ?></a>


<input type="hidden" class="hidden-topic-id" value="<?php echo ($focus_topic_info["id"]); ?>">

</div>


</div>
             
</div>
</li>
</ul><?php endforeach; endif; else: echo "" ;endif; ?>
</div>



<div class="answer"><a href="<?php echo U('Home/Question/qindex',array('qid'=>$feeds_info_detail['id']));?>" ><?php echo ($feeds_info_detail["question_name"]); ?></a></div>

<div class="answer-info">
<div class="describe">
<?php echo ($feeds_info_detail["question_desc"]); ?>
</div> 
<div class="edittime"> <span class="publish_username"><a href="<?php echo U('Home/Profile/index',array('u'=>$feeds_info_detail['uid']));?>"><?php echo ($feeds_info_detail["username"]); ?></a></span> 发起于 <span><?php echo (time2Units($feeds_info_detail["create_time"])); ?></span></div>
</div>

<div class="index_my_left_category">

<input type="hidden" class="hide_question_name" value="<?php echo ($feeds_info_detail["question_name"]); ?>">
<input type="hidden" class="hide_question_id" value="<?php echo ($feeds_info_detail["id"]); ?>">
<span class="answer-toquestion upvote"><a href="javascript:void(0);"><img src="/mytest/mingzhi/Public/Home/images/answerquestion.png">&nbsp;回答  &nbsp;</a> </span>
<a href="javascript:void(0);" class="focus-question-btn">
<?php if($feeds_info_detail['focus_question'] == 0): ?><img src="/mytest/mingzhi/Public/Home/images/add.png"/>关注问题
<?php else: ?>
<img src="/mytest/mingzhi/Public/Home/images/nofocus.png"/>取消关注<?php endif; ?>
</a>
<a href="javascript:void(0);" class="pass"><img src="/mytest/mingzhi/Public/Home/images/wugan.png"/>不感兴趣</a>
<span class="shadow_border">
<a href="javascript:void(0);"><img src="/mytest/mingzhi/Public/Home/images/collect.png"/> 收藏</a>

<a href="javascript:void(0);" class="report-question-btn">
<?php if($feeds_info_detail['report_question_status'] == 0): ?><img src="/mytest/mingzhi/Public/Home/images/report.png" />举报</a>
<?php elseif($feeds_info_detail['report_question_status'] == 1): ?>
<img src="/mytest/mingzhi/Public/Home/images/report_blue.png" /><font style="color:#0F88EB;">已举报</font><?php endif; ?>
</span>

</div>


</div>


</div>

<?php endforeach; endif; else: echo "" ;endif; ?>



<?php elseif($feeds_info_all['feed_flag'] == 'a'): ?> 



<?php if(is_array($feeds_info_all['answer'])): $i = 0; $__LIST__ = $feeds_info_all['answer'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feeds_info_detail): $mod = ($i % 2 );++$i;?>
<div class="index-sss">
<div class="touxiang">
<?php if(is_array($feeds_info_detail['topic'])): $i = 0; $__LIST__ = $feeds_info_detail['topic'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$focus_topic_info): $mod = ($i % 2 );++$i;?><img src="<?php echo ($focus_topic_info['topic_pic']); ?>" width="40" height="40"/><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div class="index-rightcontent">
<div class="where">
 <?php if(is_array($feeds_info_detail['topic'])): $i = 0; $__LIST__ = $feeds_info_detail['topic'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$focus_topic_info): $mod = ($i % 2 );++$i;?><ul  class="bubblemenu"> 
    <li>
            来自&nbsp;&nbsp; 

<input type="hidden" class="hidden-topic-id" value="<?php echo ($focus_topic_info["id"]); ?>">       
   <a href="<?php echo U('Home/Topic/index',array('tid'=>$focus_topic_info['id'],'sel'=>'trends'));?>" class="enter-topicname"><?php echo ($focus_topic_info["topic_name"]); ?></a>
        <div>
        <div class="topicinformation">
<div class="topicinfo"></div>
<div class="topicopinfooperation">问题：<a href="javascript:void(0);" class="topic-question-count"></a> &nbsp;&nbsp;热点：<a href="javascript:void(0);" class="topic-hot-question-count"></a>&nbsp;&nbsp;关注者:<a href="javascript:void(0);" class="topic-foucs-person-count"></a>
<a href="javascript:void(0);" class="topicinfoquxiao topic-focus-btn"><?php if($focus_topic_info['focus_id'] == ''): ?>关注话题<?php else: ?>取消关注<?php endif; ?></a>


<input type="hidden" class="hidden-topic-id" value="<?php echo ($focus_topic_info["id"]); ?>">

</div>


</div>
             
</div>
</li>
</ul><?php endforeach; endif; else: echo "" ;endif; ?>


</div>
<div class="answer"><a href="<?php echo U('Home/Question/qindex',array('qid'=>$feeds_info_detail['question_id']));?>" ><?php echo ($feeds_info_detail["question_name"]); ?></a></div>

<div class="answer-info">

<div class="user">
<?php if($feeds_info_detail['isname'] == 0): ?><a href="<?php echo U('Home/Profile/index',array('u'=>$feeds_info_detail['uid']));?>" ><?php echo ($feeds_info_detail["username"]); ?></a> ，<p class="biaoqian"><?php echo ($feeds_info_detail["tag"]); ?></p>
<?php else: ?>
<p class="biaoqian">匿名用户</p><?php endif; ?>
</div>

<div class="summary">

<div class="summary_text"></div>
<a href="javascript:void(0);" class="showhide">显示全部</a>
</div> 
<div class="describe  Editor-txt ">
<?php echo ($feeds_info_detail["answer_content"]); ?>
</div>
<a href="javascript:void(0);" class="showhide_hide">隐藏</a>
<div class="edittime">发表于 <span><?php echo (time2Units($feeds_info_detail["create_time"])); ?></span></div>
</div>

<div class="index_my_left_category  answer-operate">
<input type="hidden" class="hide_question_id" value="<?php echo ($feeds_info_detail["question_id"]); ?>">
<input type="hidden" class="hide_answer_id" value="<?php echo ($feeds_info_detail["id"]); ?>">
<input type="hidden" class="hide_upvote_status" value="<?php echo ($feeds_info_detail["upvote_status"]["vote_value"]); ?>">
<span class="upvote answer-upvote">

<?php if($feeds_info_detail['vote_value'] == 1 ): ?><a href="javascript:void(0);" style="color:#666666;background:#F6F6F6;"><b>已赞</b> | <i class="answer-upvote-count"><?php echo ($feeds_info_detail["upvote_count"]); ?></i></a>
<?php else: ?>
<a href="javascript:void(0);" ><b>赞同</b> | <i class="answer-upvote-count"><?php echo ($feeds_info_detail["upvote_count"]); ?></i></a><?php endif; ?>

</span>
<a href="javascript:void(0);">反对</a>
<a href="javascript:void(0);" class="focus-question-btn">
<?php if($feeds_info_detail['focus_question'] == 0): ?><img src="/mytest/mingzhi/Public/Home/images/add.png"/>关注问题
<?php else: ?>
<img src="/mytest/mingzhi/Public/Home/images/nofocus.png"/>取消关注<?php endif; ?>
</a>
<?php if($feeds_info_detail['comment_count'] == 0): ?><a href="javascript:void(0);" class="commentbtn"><img src="/mytest/mingzhi/Public/Home/images/comment.png"/>添加评论</a>
<?php else: ?>
<a href="javascript:void(0);" class="commentbtn"><img src="/mytest/mingzhi/Public/Home/images/comment.png"/>评论</a><span class="shoucangnumber"><?php echo ($feeds_info_detail["comment_count"]); ?></span><?php endif; ?>

<span class="shadow_border">
<a href="javascript:void(0);" class="answer-collection-btn"><img src="/mytest/mingzhi/Public/Home/images/collect.png"/> 收藏</a>
<a href="javascript:void(0);" class="report-answer-btn">
<?php if($feeds_info_detail['report_answer_status'] == 0): ?><img src="/mytest/mingzhi/Public/Home/images/report.png"/> 举报
<?php elseif($feeds_info_detail['report_answer_status'] == 1): ?>
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
						<img src="<?php echo (session('avatar_file')); ?>" class="mycommen_touxiang" >
						
						<div class="mycomment_input" contenteditable="true"></div>
					</div>
					<div>				
						<div class="replay-other-btn-div">
						    <input type="submit" value="评论" class="replay-other-btn" data-answer-id="<?php echo ($feeds_info_detail["id"]); ?>"/>

					    </div>
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
</div><?php endforeach; endif; else: echo "还没有评论哦，赶紧来抢沙发吧:)" ;endif; ?>

			    </div>
			    
			</div>
</div> 


</div>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>    
   
    
<?php else: ?>
    <span>这里可以扩展feed</span><?php endif; endforeach; endif; else: echo "" ;endif; ?>