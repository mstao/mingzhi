<?php
/*
 * 话题控制器  
 */
namespace Home\Controller;
use Common\Controller\HomeController;

class TopicController extends HomeController {
    protected  $uid;
    public function _initialize(){
        parent::_initialize();
        $this->uid=session('uid');
        
        
    }
    
    /**
     * 
     * 渲染页面
     */
    
     public function index(){
         $tid=$_GET['tid'];   
         $sel=$_GET['sel'];//代表查看 话题内容的选择   热门  
         $idt=$_GET['idt'];//代表
     
         if(empty($tid) || empty( $sel)){   
             $all_focus_topic=D('User')->getAllFocusTopicInfo($this->uid);
             $focus_topic_count=D('User')->getFocusTopicCountByUser($this->uid);
             $hot_topic=D('Topic')->getHotTopic($this->uid);
             if(empty($idt)){
             //获取最近关注的一个话题信息
             $onlyTopic=D('Topic')->getOnlyFocusTopic($this->uid);
             $tid=$onlyTopic[0]['id'];
             }else{
                 $tid=$idt;
             }
             
             //获取我关注的话题的一个话题的简单信息
             $onlyTopicInfo=D('Topic')->getTopicSimpleInfoByTid($tid);
             //获取  话题 新提出的问题
             $BaseTopicInfo=$this->getBaseTopicInfo($tid);
             $topicinfo=$BaseTopicInfo['topicinfo'];
             //获取问题数量  ，问题分页也要用
             $question_count=$BaseTopicInfo['question_count'];
             $topic_focus_count=$BaseTopicInfo['topic_focus_count'];
              
             $topic_relation=M('topic_relation');
             //向分页封装函数传入参数
             $p=getpage($topic_relation,$question_count,10);
             //获取此话题待回答的问题信息
             $unanswer_question=D('Topic')->getQuestionInfoByTid($tid);
              
             $this->unanswer_question=$unanswer_question;
             $this->page=$p->show();
             $this->topic_info=$onlyTopicInfo;
             
             $this->assign("hot_topic",$hot_topic);
             $this->assign("focus_topic_count",$focus_topic_count);
             $this->assign("all_focus_topic",$all_focus_topic);
             $this->display('mytopic');
         }else if( !empty($tid) && $sel=='trends'){ 
             //将话题的浏览量+1
             D('Topic')->where('id='.$tid)->setInc('view_count');
             //获取 话题的最新动态
             $BaseTopicInfo=$this->getBaseTopicInfo($tid);
             $topicinfo=$BaseTopicInfo['topicinfo']; 
             $question_count=$BaseTopicInfo['question_count'];
             $topic_focus_count=$BaseTopicInfo['topic_focus_count'];
             $topic_relation=M('topic_relation');
             //根据话题id获取获取回答信息
             $new_trends_answer_info=D('Topic')->getTopicTrendsByTid($this->uid,$tid);
             //计算最新问题回答数量
             $new_trends_answer_count=count($new_trends_answer_info);
             //向分页封装函数传入参数
             $p=getpage($topic_relation,$new_trends_answer_count,10);
             $this->new_trends_answer= $new_trends_answer_info;
             $this->page=$p->show();
             
             $topicinfo['question_count']=$question_count;
             $topicinfo['topic_focus_count']=$topic_focus_count;
             $this->assign("topic_info",$topicinfo);
             $this->display('trends');
         }else if( !empty($tid) && $sel=='hot'){
             
             //获取话题的热门问题
             $BaseTopicInfo=$this->getBaseTopicInfo($tid);
             $topicinfo=$BaseTopicInfo['topicinfo'];
             $question_count=$BaseTopicInfo['question_count'];
             $topic_focus_count=$BaseTopicInfo['topic_focus_count'];
             
             $topic_relation=M('topic_relation');
             //获取热门问题的信息
             $hot_question=D('Topic')->getHotQuestionByTid($tid);
             //计算热门话题的总数数量
             $hot_question_count=count($hot_question);
             //向分页封装函数传入参数   
             $p=getpage($topic_relation,$hot_question_count,4);
             
             $this->hot_question=$hot_question;
             $this->page=$p->show();
             
             $topicinfo['question_count']=$question_count;
             $topicinfo['topic_focus_count']=$topic_focus_count;
             $this->assign("topic_info",$topicinfo);
            
             $this->display('hot');
         }else if( !empty($tid) && $sel=='unanswered'){
             
             //获取  话题 新提出的问题
             $BaseTopicInfo=$this->getBaseTopicInfo($tid);
             $topicinfo=$BaseTopicInfo['topicinfo'];
             //获取问题数量  ，问题分页也要用
             $question_count=$BaseTopicInfo['question_count'];
             $topic_focus_count=$BaseTopicInfo['topic_focus_count'];
             
             $topic_relation=M('topic_relation');           
             //向分页封装函数传入参数   
             $p=getpage($topic_relation,$question_count,4);
             //获取此话题待回答的问题信息
             $unanswer_question=D('Topic')->getQuestionInfoByTid($tid);
                                               
             $this->unanswer_question=$unanswer_question;
             $this->page=$p->show();
                       
             $topicinfo['question_count']=$question_count;
             $topicinfo['topic_focus_count']=$topic_focus_count;
             $this->assign("topic_info",$topicinfo);
             //$this->assign("unanswer_question",$unanswer_question);
             $this->display('unanswered');
         }
         
     }


     /**
      * 获取话题的基本信息
      * @param unknown $tid
      * @return unknown[]
      */
     public function getBaseTopicInfo($tid){
         $topic=D('Topic');
         $topicinfo= $topic->getTopicInfoByTid($tid); //获取话题基本信息
         $topic_focus_count= $topic->getTopicFocusCountByTid($tid); //获取话题关注数量
         $question_count= $topic->getQuestionCountByTid($tid); //获取话题问题量
         //将信息存为数组以供多次调用
         $arr=array();
         $arr['topicinfo']=$topicinfo;
         $arr['topic_focus_count']=$topic_focus_count;
         $arr['question_count']=$question_count;
         return $arr;
     }
     
}