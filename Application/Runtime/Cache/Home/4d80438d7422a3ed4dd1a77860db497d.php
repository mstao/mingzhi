<?php if (!defined('THINK_PATH')) exit(); if(is_array($all_topic)): $i = 0; $__LIST__ = $all_topic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$all_topic): $mod = ($i % 2 );++$i;?><!--一个话题div开始  -->
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