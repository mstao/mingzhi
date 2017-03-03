<?php if (!defined('THINK_PATH')) exit();?> 
 
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