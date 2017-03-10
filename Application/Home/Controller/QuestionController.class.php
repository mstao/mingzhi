<?php
/**
 * 
 * 问题详细信息控制器
 */
namespace Home\Controller;
use Common\Controller\HomeController;

class QuestionController extends HomeController {
    public function qindex(){
        $qid=$_GET['qid'];
        //问题浏览量+1
        D('Question')->where('id='.$qid)->setInc('q_view_count');
                
        //默认从第一条开始取
        $position=0;
        //设置一次请求显示的数目
        $item_per_page = 10;
        //取得传过来的参数
        $page_number = filter_var($_GET["p"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
        //获得当前记录的位置
        $position = ($page_number * $item_per_page);
        
        //获取问题基本信息
        $qinfo=D('Question')->getQuestionInfo($qid);       
        $topicinfo=D('Question')->getTopicByQuestion($qid);
        $avatarinfo=D('Question')->getAvatarByQuestin($qid); 
       
        //获取回答信息
        $answer_info=D('Question')->getAnswerInfoByQuestion($qid,$position,$item_per_page);
        //计算回答数量
        $answer_count=D('Question')->getAllAnswerCountByQuestion($qid);
        //计算出AJAX分多少页
        $ajax_page_count=ceil($answer_count/$item_per_page);
        //根据问题id获取与此问题相关的话题信息
        $topic_one=$this->getSimpleTopicInfo($qid);
        //根据问题id俩判断当前用户对问题的关注状态
        $uid=session('uid');
        $focus_status=D('Question')->getFocusQuestionStatus($uid,$qid);
        if($focus_status==null){
            $focus_question=0;
        }else{
            $focus_question=1;
        }
        
        $this->assign('focus_question',$focus_question);
        $this->assign('q_answer_count',$answer_count);
        $this->assign('qinfo',$qinfo);
        $this->assign('topicinfo',$topicinfo);
        $this->assign('avatarinfo',$avatarinfo);
        
        $this->assign("q",$qid);
        $this->assign("all_page", $ajax_page_count);
        $this->assign("topic_one",$topic_one);
        $this->assign("answer_info",$answer_info);
        if(IS_AJAX){
            $answer_info=D('Question')->getAnswerInfoByQuestion($qid,$position,$item_per_page);
           /*  echo "<pre>";
            var_dump($feed_arr);
            echo "</pre>";  */  
           //模板渲染
           $this->ajaxReturn($this->fetch('Question/answer_ajax'));
       }else{           
           //非AJAX请求正常显示 ，默认从第一条开始取           
           $this->display();
       }
    }
    
    function getSimpleTopicInfo($qid){
        $topic_one=D('Topic')->getFeedTopicByQuestion($qid);
        $info['id']=$topic_one[0]['id'];
        $info['topic_name']=$topic_one[0]['topic_name'];
        $info['topic_desc']=$topic_one[0]['topic_desc'];
        $info['question_count']=$topic_one[0]['question_count'];
        $info['topic_focus_count']=$topic_one[0]['topic_focus_count'];
        return $info;
    }
    
    
   //回答问题
    public  function Answer(){
        $uid=session('uid');
        $flag=D('Answer')->answerQuestion($_POST,$uid);
        if($flag>0){
            $data['status']  = 1;
            $data['content'] = '回答成功';
            $this->ajaxReturn($data);
            exit();
        }else{
            $data['status']  = 0;
            $data['content'] = '回答失败';
            $this->ajaxReturn($data);
            exit();
        }
    }
    
}