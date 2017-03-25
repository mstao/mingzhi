<?php if (!defined('THINK_PATH')) exit(); if(is_array($record_info)): $i = 0; $__LIST__ = $record_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$record_content): $mod = ($i % 2 );++$i;?>

<?php if($record_content['record_flag'] == 'fq'): if(is_array($record_content['question'])): $i = 0; $__LIST__ = $record_content['question'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$record_info_details): $mod = ($i % 2 );++$i;?><div class="mydongtai-ua index-rightcontent">
<div class="mydongtai-ua-tag"><span class="dongtai-type-zan">发起了问题</span><span class="dongtai-time-zan"><?php echo (time2Units($record_info_details["action_time"])); ?></span></div>
<div class="mydongtai-ua-question"><a href="<?php echo U('Home/Question/qindex',array('qid'=>$record_info_details['id']));?>"><?php echo ($record_info_details["question_name"]); ?></a></div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>


<?php elseif($record_content['record_flag'] == 'za'): ?>

<?php if(is_array($record_content['answer'])): $i = 0; $__LIST__ = $record_content['answer'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$record_info_details): $mod = ($i % 2 );++$i;?>

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
<?php endforeach; endif; else: echo "" ;endif; ?>

<?php elseif($record_content['record_flag'] == 'aq'): ?>


<?php if(is_array($record_content['answer'])): $i = 0; $__LIST__ = $record_content['answer'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$record_info_details): $mod = ($i % 2 );++$i;?>
<div class="mydongtai-ua index-rightcontent">
<div class="mydongtai-ua-tag"><span class="dongtai-type-zan">回答了问题</span><span class="dongtai-time-zan"><?php echo (time2Units($record_info_details["create_time"])); ?></span></div>
<div class="mydongtai-ua-question"><a href="<?php echo U('Home/Question/qindex',array('qid'=>$record_info_details['question_id']));?>"><?php echo ($record_info_details["question_name"]); ?></a></div>
<div class="mydongtai-ua-user"><img src="<?php echo ($record_info_details["avatar_file"]); ?>" width="50px" height="50px"/> <span class="mydongtai-ua-username"><?php echo ($record_info_details["username"]); ?></span></div>
<div class="mydongtai-ua-answer Editor-txt"><?php echo ($record_info_details["answer_content"]); ?></div>
<div class="mydongtai-ua-question-time">问题发布于 <?php echo (time2Units($record_info_details["create_time"])); ?></div>

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


<?php elseif($record_content['record_flag'] == 'gq'): ?>
关注了问题
<?php elseif($record_content['record_flag'] == 'gt'): ?>
关注了话题
<?php elseif($record_content['record_flag'] == 'sq'): ?>
收藏了问题
<?php elseif($record_content['record_flag'] == 'sa'): endif; endforeach; endif; else: echo "还没有评论哦，赶紧来抢沙发吧:)" ;endif; ?>