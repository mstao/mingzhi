<?php
/**
 *
 * @desc 用来获取首页Feeds
 *
 */

namespace Home\Model;
use Think\Model;
class FeedsModel extends Model{
    /**
     *  获取首页最新动态流
     *  @param $uid 用户id
     *  @param $position 记录位置
     *  @param $item_per_page 每次读取条数
     *  @return $feed_return_arr
     */
     
    function getNewFeeds($uid,$position,$item_per_page){
    
        //根据登录用户的id来查询feeds表中的推送信息
        $feed_info=M('feeds')
                        ->where('ruid='.$uid)
                        ->order('add_time desc')
                        ->limit($position,$item_per_page)
                        ->select();
        //设置一个大数组  用于存储feeds流信息
        $feed_return_arr=array();
         
        //获取到推送 的信息后进行遍历 判断推送类型
        foreach ($feed_info as $val){
    
            //如果推送信息的类型为q，则代表此推送信息类型 为  用户已关注话题产生的问题
            if ($val['type']=='q'){
                //获取此条推送信息的问题id
                $qid=$val['item_id'];
    
                //根据问题id获取与此条问题有关的信息
                $qinfo_q=D('Question')->getQuestionSimpleInfo($qid);
                //根据问题id获取与此问题相关的话题信息
                $tinfo_q=D('Topic')->getFeedTopicByQuestion($qid);
                //将话题信息追加到问题信息数组中
                $qinfo_q[0]['topic']= $tinfo_q;
                //判断用户对问题的关注状态
                $focus_question=D('Question')->getFocusQuestionStatus($uid,$qid);
                if($focus_question==null){
                    $qinfo_q[0]['focus_question']=0;
                }else{
                    $qinfo_q[0]['focus_question']=1;
                }
                //判断当前用户对问题的举报状态
                $report_question_status=D('Question')->getReportQuestionStatus($uid,$qid);
                if ($report_question_status==null){
                    $qinfo_q[0]['report_question_status']=0;
                }else{
                    $qinfo_q[0]['report_question_status']=1;
                }
                //将整理后的信息添加到feed数组中，并做一个标记 q,以便在模板中判断解析
                $arr_fd['question']=$qinfo_q;
                $arr_fd['feed_flag']='q';
                $feed_return_arr[]=  $arr_fd;
            }else if($val['type']=='a'){
                //如果推送类型 为a  则代表推送信息类型为  用户关注的话题有关的问题或关注的问题产生的回答
                $aid=$val['item_id'];
                /**根据回答id获取获取与此回答有关的信息**/
                //获取推送人的uid
                $suid=$val['suid'];
                //获取当前用户对回答的赞同状态
                $upvote_status=$this->getUpvoteStatusByAid($aid, $uid);
                //获取feed流 回答信息
                $a_info_all=$this->getFeedAnswerInfo($aid);
                $question_id=$a_info_all[0]['question_id'];
                //根据问题id获取与此问题相关的话题信息
                $tinfo_a=D('Topic')->getFeedTopicByQuestion($question_id);
                //将话题信息追加到回答信息数组中
                $a_info_all[0]['topic']= $tinfo_a;
                //将当前用户对回答的赞同状态最佳到信息数组中
                $a_info_all[0]['upvote_status']=$upvote_status;
                
                //根据回答id获取问题id
                $qid=D('Question')->getQuestionIdByAid($aid);
                //判断用户对问题的关注状态
                $focus_question=D('Question')->getFocusQuestionStatus($uid,$qid);
                if($focus_question==null){
                    $a_info_all[0]['focus_question']=0;
                }else{
                    $a_info_all[0]['focus_question']=1;
                }
                
                //判断用户对回答的举报状态
                $report_answer_status=D('Answer')->getReportAnswerStatus($uid,$aid);
                if ($report_answer_status==null){
                   $a_info_all[0]['report_answer_status']=0;
                }else{
                   $a_info_all[0]['report_answer_status']=1;
                }
                
                //将整理后的信息添加到feed数组中，并做一个标记 a,以便在模板中判断解析
                $arr_fd['answer']=$a_info_all;
                $arr_fd['feed_flag']='a';
                $feed_return_arr[]=  $arr_fd;
            }
    
        }
    
    
        return $feed_return_arr;
    }
    

    /**
     * 获取用户feed流总数量
     * @param unknown $uid
     * @return unknown
     */
    function getFeedsCountByUid($uid){
        $info=M('feeds')
        ->where('ruid='.$uid)
        ->count();
        return $info;
    }


    /**
     * 首页feed流回答的问题信息
     * @param unknown $aid
     * @return unknown
     */
    function getFeedAnswerInfo($aid){
        $info=D('Answer')
                ->alias('a')
                //->field('u.username,u.tag,u.avatar_file,q.question_name,a.*')
                ->field(array('u.username','u.tag','u.avatar_file','q.question_name','a.*','av.vote_value'))
                ->join('__USER__ u ON u.id=a.uid')
                ->join('__QUESTION__ q ON q.id=a.question_id')
                ->join('LEFT JOIN __ANSWER_VOTE__ av ON av.answer_id=a.id')
                ->where('a.id='.$aid)
                ->select();
        return $info;
    }
    

    /**
     * 判断当前用户对当前回答的赞同情况
     * @param unknown $aid
     * @param unknown $uid
     * @return unknown
     */
    function getUpvoteStatusByAid($aid,$uid){
        $where=array(
            'answer_id' =>$aid,
            'vote_uid'  =>$uid
        );
        $is_exist=M('answer_vote')->where($where)->select();
        $info['vote_value']=$is_exist[0]['vote_value'];
        $info['vote_id']=$is_exist[0]['vote_id'];
        return $info;
    }
    
}