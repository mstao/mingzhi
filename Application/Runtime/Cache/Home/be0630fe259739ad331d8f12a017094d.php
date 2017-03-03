<?php if (!defined('THINK_PATH')) exit(); if(is_array($record_info)): $i = 0; $__LIST__ = $record_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$record_content): $mod = ($i % 2 );++$i;?>

<?php if($record_content['record_flag'] == 'fq'): if(is_array($record_content['question'])): $i = 0; $__LIST__ = $record_content['question'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$record_info_details): $mod = ($i % 2 );++$i;?><div class="mydongtai-ua index-rightcontent">
<div class="mydongtai-ua-tag"><span class="dongtai-type-zan">发起了问题</span><span class="dongtai-time-zan"><?php echo (time2Units($record_info_details["action_time"])); ?></span></div>
<div class="mydongtai-ua-question"><a href="<?php echo U('Home/Question/qindex',array('qid'=>$record_info_details['id']));?>"><?php echo ($record_info_details["question_name"]); ?></a></div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>


<?php elseif($record_content['record_flag'] == 'za'): ?>

<?php if(is_array($record_content['answer'])): $i = 0; $__LIST__ = $record_content['answer'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$record_info_details): $mod = ($i % 2 );++$i;?>

<div class="mydongtai-ua index-rightcontent">
<div class="mydongtai-ua-tag"><span class="dongtai-type-zan">赞同了回答</span><span class="dongtai-time-zan"><?php echo (time2Units($record_info_details["create_time"])); ?></span></div>
<div class="mydongtai-ua-question"><a href="<?php echo U('Home/Question/qindex',array('qid'=>$record_info_details['question_id']));?>"><?php echo ($record_info_details["question_name"]); ?></a></div>
<div class="mydongtai-ua-user"><img src="<?php echo ($record_info_details["avatar_file"]); ?>" width="50px" height="50px"/> <span class="mydongtai-ua-username"><?php echo ($record_info_details["username"]); ?></span></div>
<div class="mydongtai-ua-answer Editor-txt"><?php echo ($record_info_details["answer_content"]); ?></div>

<div class="index_my_left_category  answer-operate">
<input type="hidden" class="hide_answer_id" value="<?php echo ($record_info_details["id"]); ?>">
<input type="hidden" class="hide_upvote_status" value="<?php echo ($record_info_details["upvote_status"]["vote_value"]); ?>">
<span class="upvote answer-upvote"><a href="javascript:void(0);" ><b>赞同</b> | <i class="answer-upvote-count"><?php echo ($record_info_details["upvote_count"]); ?></i></a> </span>
<a href="javascript:void(0);">反对</a><a href="javascript:void(0);"><img src="/mytest/mingzhi/Public/Home/images/add.png"/>关注问题</a>
<?php if($feeds_info_detail['comment_content'] == ''): ?><a href="javascript:void(0)" class="commentbtn"><img src="/mytest/mingzhi/Public/Home/images/comment.png"/>添加评论</a>
<?php else: ?>
<a href="javascript:void(0)" class="commentbtn"><img src="/mytest/mingzhi/Public/Home/images/comment.png"/>评论</a><span class="shoucangnumber"><?php echo ($record_info_details["comment_count"]); ?></span><?php endif; ?>

<span class="shadow_border">
<a href="#"><img src="/mytest/mingzhi/Public/Home/images/collect.png"/> 收藏</a>
<a href="#"><img src="/mytest/mingzhi/Public/Home/images/report.png"/> 举报</a>
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
					<div >
						<form action="" method="">
						    <div class="replay-other-btn-div">
						    <input type="submit" value="评论" class="replay-other-btn">
						    </div>
						</form>
					</div>
				</div>
				
				
				
				
				        	
				        <div class="othercomment_info">
				  
				   
				   
						 
						<div class="othercomment_info_div">
						<div class="othercomment_user_touxiang">
						<img src="/mytest/mingzhi/Public/Home/images/yingxiong.jpg" />
						</div>
						<div class="replay-rightcontent">
										
						<div class="othercomment_info_message"><a href="#" >当时明月</a>:<span>这种游戏就是这个样子呀，上号这种游戏就是这个样子呀，上号号这种游戏就是这个样子呀，上号</span> </div>
						<div class="othercomment_replay_time"><span class="replay_time">·2天前</span> 
						
						<div class="othercomment_replay_operate">
						<a href="javascript:void(0)"><img  src="/mytest/mingzhi/Public/Home/images/upvote.png"> 赞</a>
						<a href="javascript:void(0)" class="othercomment_replay_btn"><img  src="/mytest/mingzhi/Public/Home/images/replay-inner.png"> 回复</a>
						<a href="javascript:void(0)"><img  src="/mytest/mingzhi/Public/Home/images/report.png"> 举报</a>
						</div>
						
						
						<span class="replay-upvote-num">3 赞</span>
						</div> 
						
						<div class="replay-other-input-div">
						    <div>
					
								
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
					    
									
						</div>
						</div>
						
				   
				         
						<div class="othercomment_info_div">
						<div class="othercomment_user_touxiang">
						<img src="/mytest/mingzhi/Public/Home/images/yingxiong.jpg" />
						</div>
						<div class="replay-rightcontent">
										
						<div class="othercomment_info_message"><a href="#" >当时明月</a>:<span>这种游戏就是这个样子呀，上号这种游戏就是这个样子呀，上号号这种游戏就是这个样子呀，上号</span> </div>
						<div class="othercomment_replay_time"><span class="replay_time">·2天前</span> 
						
						<div class="othercomment_replay_operate">
						<a href="javascript:void(0)"><img  src="/mytest/mingzhi/Public/Home/images/upvote.png"> 赞</a>
						<a href="javascript:void(0)" class="othercomment_replay_btn"><img  src="/mytest/mingzhi/Public/Home/images/replay-inner.png"> 回复</a>
						<a href="javascript:void(0)"><img  src="/mytest/mingzhi/Public/Home/images/report.png"> 举报</a>
						</div>
						
						
						<span class="replay-upvote-num">3 赞</span>
						</div> 
						
						<div class="replay-other-input-div">
						    <div>
					
								
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
					    
									
						</div>
						</div>
						

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


<div class="index_my_left_category  answer-operate">
<input type="hidden" class="hide_answer_id" value="<?php echo ($record_info_details["id"]); ?>">
<input type="hidden" class="hide_upvote_status" value="<?php echo ($record_info_details["upvote_status"]["vote_value"]); ?>">
<span class="upvote answer-upvote"><a href="javascript:void(0);" ><b>赞同</b> | <i class="answer-upvote-count"><?php echo ($record_info_details["upvote_count"]); ?></i></a> </span>
<a href="javascript:void(0);">反对</a><a href="javascript:void(0);"><img src="/mytest/mingzhi/Public/Home/images/add.png"/>关注问题</a>
<?php if($feeds_info_detail['comment_content'] == ''): ?><a href="javascript:void(0)" class="commentbtn"><img src="/mytest/mingzhi/Public/Home/images/comment.png"/>添加评论</a>
<?php else: ?>
<a href="javascript:void(0)" class="commentbtn"><img src="/mytest/mingzhi/Public/Home/images/comment.png"/>评论</a><span class="shoucangnumber"><?php echo ($feeds_info_detail["comment_count"]); ?></span><?php endif; ?>

<span class="shadow_border">
<a href="#"><img src="/mytest/mingzhi/Public/Home/images/collect.png"/> 收藏</a>
<a href="#"><img src="/mytest/mingzhi/Public/Home/images/report.png"/> 举报</a>
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
					<div >
						<form action="" method="">
						    <div class="replay-other-btn-div">
						    <input type="submit" value="评论" class="replay-other-btn">
						    </div>
						</form>
					</div>
				</div>
				
				
				
				        	
				        <div class="othercomment_info">
				  
						 
						<div class="othercomment_info_div">
						<div class="othercomment_user_touxiang">
						<img src="/mytest/mingzhi/Public/Home/images/yingxiong.jpg" />
						</div>
						<div class="replay-rightcontent">
										
						<div class="othercomment_info_message"><a href="#" >当时明月</a>:<span>这种游戏就是这个样子呀，上号这种游戏就是这个样子呀，上号号这种游戏就是这个样子呀，上号</span> </div>
						<div class="othercomment_replay_time"><span class="replay_time">·2天前</span> 
						
						<div class="othercomment_replay_operate">
						<a href="javascript:void(0)"><img  src="/mytest/mingzhi/Public/Home/images/upvote.png"> 赞</a>
						<a href="javascript:void(0)" class="othercomment_replay_btn"><img  src="/mytest/mingzhi/Public/Home/images/replay-inner.png"> 回复</a>
						<a href="javascript:void(0)"><img  src="/mytest/mingzhi/Public/Home/images/report.png"> 举报</a>
						</div>
						
						
						<span class="replay-upvote-num">3 赞</span>
						</div> 
						
						<div class="replay-other-input-div">
						    <div>
					
								
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
					    
									
						</div>
						</div>
						
				   
				         
						<div class="othercomment_info_div">
						<div class="othercomment_user_touxiang">
						<img src="/mytest/mingzhi/Public/Home/images/yingxiong.jpg" />
						</div>
						<div class="replay-rightcontent">
										
						<div class="othercomment_info_message"><a href="#" >当时明月</a>:<span>这种游戏就是这个样子呀，上号这种游戏就是这个样子呀，上号号这种游戏就是这个样子呀，上号</span> </div>
						<div class="othercomment_replay_time"><span class="replay_time">·2天前</span> 
						</* 操作开始  */}>
						<div class="othercomment_replay_operate">
						<a href="javascript:void(0)"><img  src="/mytest/mingzhi/Public/Home/images/upvote.png"> 赞</a>
						<a href="javascript:void(0)" class="othercomment_replay_btn"><img  src="/mytest/mingzhi/Public/Home/images/replay-inner.png"> 回复</a>
						<a href="javascript:void(0)"><img  src="/mytest/mingzhi/Public/Home/images/report.png"> 举报</a>
						</div>
						
						
						<span class="replay-upvote-num">3 赞</span>
						</div> 
						
						<div class="replay-other-input-div">
						    <div>
					
								
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
					    
									
						</div>
						</div>
						
				   
				    
				   
			    </div>
			    
			</div>
</div> 


</div>

<?php endforeach; endif; else: echo "" ;endif; ?>


<?php elseif($record_content['record_flag'] == 'gq'): ?>
关注了问题
<?php elseif($record_content['record_flag'] == 'gt'): ?>
关注了话题
<?php elseif($record_content['record_flag'] == 'sq'): ?>
收藏了问题
<?php elseif($record_content['record_flag'] == 'sa'): endif; endforeach; endif; else: echo "" ;endif; ?>