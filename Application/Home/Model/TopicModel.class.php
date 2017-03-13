<?php

/**
 * 话题 model
 * @desc 处理与话题有关的信息
 */
namespace Home\Model;
use Think\Model;
class TopicModel extends Model{
    
   /**
    * 获取话题的简单信息
    * @param unknown $tid
    * @return mixed|boolean|string|NULL|unknown|object
    */ 
    
   function getTopicSimpleInfoByTid($tid){
       $info=D('Topic')->field('id,topic_name,topic_pic')->where('id='.$tid)->select();
       $arr['topic_id']=$info[0]['id'];
       $arr['topic_name']=$info[0]['topic_name'];
       $arr['topic_pic']=$info[0]['topic_pic'];
       
       return $arr;
   }
    
    
    
    /**
     * 根据话题信息查询出关注此话题的用户
     * @param unknown $tid
     * @return unknown
     */
   function getPersonByFocusTopic($tid){
       $info=M('topic_focus')
                  ->alias('tf')
                  ->field('uid')
                  ->where('topic_id='.$tid)
                  ->select();
       return $info;
   }
   

   /**
    * 获取热门话题 ，根据话题的问题数量来显示，包括对所有话题的筛选
    * @param unknown $uid
    * @return unknown
    */
   function getHotTopic($uid){
       $hinfo=D("Topic")
       		      ->alias("t")
       		      ->field('topic_name,id,focus_id,topic_pic')
       		      ->join("LEFT JOIN __TOPIC_FOCUS__ tf ON t.id=tf.topic_id and tf.uid=".$uid)
                  ->order("t.question_count desc")           
                  ->limit(5)
                  ->select();
       return $hinfo;
   }

   /**
    * 用户对话题的关注处理
    * @param unknown $uid
    * @param unknown $tid
    * @return number
    */
   function dealFocusTopic($uid,$tid){
      //根据当前用户id和话题id来获取用户对该话题的关注状态
      $flag=$this->getFocusTopicStatus($uid, $tid);
       
     //flag为1，代表此时用户已关注此话题，进行取消关注操作
    
     if($flag==1){
	     $where=array(
	     		'uid'     =>$uid,
	     		'topic_id'=>$tid
	     );
         M('topic_focus')->where($where)->delete();
         $return=0;
     //flag为0时，代表此时用户未关注话题，进行关注操作
     }else if($flag==0){
     	$time=time();
     	$data=array(
     			'uid'     =>$uid,
     			'topic_id'=>$tid,
     			'add_time'=>$time
     	);
     	M('topic_focus')->data($data)->add();
     	$return=1;
     }
     return $return;
   }
   
   

   /**
    * 获取问题 相关的 话题标签   根据关注量  取一个话题  用于feed流
    * @param unknown $qid
    * @return unknown
    */
   function getFeedTopicByQuestion($qid){
       $info=M('topic_relation')
                   ->alias('tr')
                   ->field('t.topic_name,t.id,t.topic_pic,tf.focus_id')
                   ->where('item_id='.$qid)
                   ->join('__TOPIC__ t ON t.id=tr.topic_id')
                   ->join('LEFT JOIN __TOPIC_FOCUS__ tf ON tf.topic_id=t.id')
                   ->order('topic_focus_count desc')
                   ->limit(1)
                   ->select();
       return $info;
   
   }
   
 
   

   /**
    * 根据话题tid信息查询话题信息
    * @param unknown $tid
    * @return string[]|unknown[]|number[]
    */
   function getTopicInfoByTid($tid){
       $info=D('Topic')->where('id='.$tid)->select();
       $arr=array();
       //当前用户的id 
       $uid=session('uid');
       //判断当前用户是否关注此话题
       
       $IS_FOCUS=$this->getFocusTopicStatus($uid, $tid);
       if(empty($IS_FOCUS)){
       	$focus_status='0';
       }else{
       	$focus_status='1';
       }
       //获取热门问题的信息
       $hot_question=D('Topic')->getHotQuestionByTid($tid);
       //计算热门话题的总数数量
       $hot_question_count=count($hot_question);
       
       $arr['topic_id']=$info[0]['id'];
       $arr['topic_name']=$info[0]['topic_name'];
       $arr['topic_desc']=$info[0]['topic_desc'];
       $arr['topic_pic']=$info[0]['topic_pic'];
       $arr['view_count']=$info[0]['view_count'];
       $arr['focus_status']=$focus_status;
       $arr['question_count']=$info[0]['question_count'];
       $arr['topic_focus_count']=$info[0]['topic_focus_count'];
       $arr['hot_question_count']=$hot_question_count;
       return $arr;           
   }
   
   

   /**
    * 判断当前用户是否关注此话题
    * @param unknown $uid
    * @param unknown $tid
    * @return string
    */
   function getFocusTopicStatus($uid,$tid){
      
       $where=array(
           'uid'=>$uid,
           'topic_id'=>$tid
       );
       $IS_FOCUS=M('topic_focus')->where($where)->select();
       if(empty($IS_FOCUS)){
           $focus_status='0';
       }else{
           $focus_status='1';
       }
       return $focus_status;
   }
   

   /**
    * 根据话题tid获取此话题的关注量
    * @param unknown $tid
    * @return unknown
    */
   function getTopicFocusCountByTid($tid){
       $info=M('topic_focus')
                 ->where('topic_id='.$tid)
                 ->count('focus_id');
       return $info;
   }
   

   /**
    * 根据 话题tid获取此话题相关的问题数量
    * @param unknown $tid
    * @return unknown
    */
   function getQuestionCountByTid($tid){
       $info=M('topic_relation')
                 ->where('topic_id='.$tid)
                 ->count('id');
       return $info;
   }
   

   /**
    * 根据话题tid  获取   待回答问题
    * @param unknown $tid
    * @return unknown
    */
   function getQuestionInfoByTid($uid,$tid){
       $info=M('topic_relation')
                     ->alias('tr')
                     ->field('q.id,q.question_name,q.create_time,q.answer_count,q.focus_count,qf.focus_id,qr.report_id')
                     ->join('__QUESTION__ q ON q.id=tr.item_id')
                     ->join('LEFT JOIN __QUESTION_FOCUS__ qf ON qf.question_id=tr.item_id and qf.uid='.$uid)
                     ->join('LEFT JOIN __QUESTION_REPORT__ qr ON qr.question_id=tr.item_id and qr.uid='.$uid)
                     ->where('tr.topic_id='.$tid)
                     ->order('q.create_time desc')
                     ->select();
       return $info;
   }
   

   /**
    * 获取热门问题
    * @param unknown $tid
    * @return unknown
    */
   function getHotQuestionByTid($tid){
       $info=M('topic_relation')
                     ->alias('tr')
                     ->join('__QUESTION__ q ON q.id=tr.item_id')
                     
                     ->where('q.answer_count>0 AND tr.topic_id='.$tid)
                     ->order('q.answer_count desc')
                     ->select();
       return $info;
   }
   

   /**
    * 获取话题的最新回答动态
    * @param unknown $tid
    * @return unknown
    */
   function getTopicTrendsByTid($uid,$tid){
       $info=M('topic_relation')
                     ->alias('tr')
                     //->field('u.username,u.tag,q.*,a.*')
                     ->field(array('q.id'=>'qid','a.id'=>'aid','a.uid','a.isname','a.upvote_count','a.comment_count','a.create_time','a.answer_content','q.question_name','u.username','u.tag','qf.focus_id','av.vote_value','ar.report_id'))
                     ->join('__QUESTION__ q ON q.id=tr.item_id')
                     ->join('__ANSWER__ a ON a.question_id=q.id')
                     ->join('__USER__ u ON u.id=a.uid')
                     ->join('LEFT JOIN __QUESTION_FOCUS__ qf ON qf.question_id=tr.item_id and qf.uid='.$uid)
                     ->join('LEFT JOIN __ANSWER_REPORT__ ar ON ar.answer_id=a.id and ar.uid='.$uid)
                     ->join('LEFT JOIN __ANSWER_VOTE__ av ON av.answer_id=a.id and av.vote_uid='.$uid)
                     ->where('tr.topic_id='.$tid)
                     ->order('a.create_time desc')
                     ->select();
       return $info;
   }
   

   /**
    * 获取用户最新关注的话题  一个
    * @param unknown $uid
    * @return unknown
    */
   function getOnlyFocusTopic($uid){
       $info=M('topic_focus')
                     ->alias('tr')
                     ->field('t.id')
                     ->where('uid='.$uid)
                     ->join('__TOPIC__ t ON t.id=tr.topic_id')
                     ->order('add_time desc')
                     ->limit(1)
                     ->select();
       return $info;
   }
   /**
    * 处理关于话题的搜索
    * @param unknown $token
    * @return mixed|boolean|string|NULL|unknown|object
    */
   function dealSearchTopicInfo($token){
       $map['topic_name']=array('like','%'.$token.'%');
       
       $info=D('Topic')
                  ->field('id,topic_name,question_count')
                  ->where($map)
                  ->order('question_count desc')
                  ->limit(3)
                  ->select();
       return $info;
   }
   
   /**
    * 推荐话题信息
    * @return unknown
    */
   function  recommendTopic(){
       $info=D('Topic')
                ->alias('t')
                ->field(array('t.id' => 'tid','t.topic_name','topic_focus_count','t.topic_pic'))
                
                ->order('t.topic_focus_count desc')
                ->limit(3)
                ->select();
       return $info;
   }
   
  /**
   * 获取话题广场的所有话题
   * 
   * @param unknown $position
   * @param unknown $item_per_page
   * @return unknown
   */
   function getAllTopicInfo($uid,$position,$item_per_page){
       $info=D('Topic')
                    ->alias('t')
                    ->field(array('t.id'=>'tid','t.topic_name','t.topic_desc','t.topic_pic','tf.focus_id'))
                    ->join('LEFT JOIN __TOPIC_FOCUS__ tf ON tf.topic_id=t.id and tf.uid='.$uid)
                    ->order('t.topic_focus_count desc')
                   
                    ->limit($position,$item_per_page)
                    ->select();
       return $info;
   }
   /**
    * 获取共有多少话题
    * @return unknown
    */
   function getAllTopicCount(){
       $info=D('Topic')->count('id');
       return $info;
   }
}