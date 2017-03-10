<?php
/**
 * @desc 回答评论加载
 * @author Mingshan
 * 
 */



namespace Home\Model;
use Think\Model;
class AnswerCommentModel extends Model{
    
    
    /**
     * 根据回答id获取评论记录数
     * @param unknown $aid
     * @return unknown
     */
    function getAnswerCommentCount($aid){
         $info=M('answer_comment')->where('answer_id='.$aid)->count();
         return $info;
    }
    
    
    /**
     * 根据偏移量获取相应的评论信息
     * @param unknown $aid
     * @param unknown $position
     * @param unknown $item_per_page
     * @return unknown
     */
    function getAnswerCommentInfo($aid,$position,$item_per_page){
        $info=M('answer_comment')
                     ->alias('ac')
                     ->field(array('ac.*','u.username'=>'s_username','u.avatar_file','us.username'=>'r_username','acr.id'=>'report_id','acu.id'=>'vote_id'))
                     ->join('__USER__ u ON u.id=ac.suid')
                     ->join('LEFT JOIN __USER__ us ON us.id=ac.ruid')
                     ->join('LEFT JOIN __ANSWER_COMMENT_REPORT__ acr ON acr.comment_id=ac.id')
                     ->join('LEFT JOIN __ANSWER_COMMENT_UPVOTE__ acu ON acu.comment_id=ac.id')
                     ->where('ac.answer_id='.$aid)
                     ->order('ac.add_time desc')
                     ->limit($position,$item_per_page)
                     ->select();
        return $info;
    }
    
   
    /**
     * 回复评论
     * @param unknown $aid
     * @param unknown $suid
     * @param unknown $ruid
     * @param unknown $comment_id
     * @param unknown $content
     * @return mixed|boolean|unknown|string
     */
    function replayComment($aid,$suid,$ruid,$comment_id,$content){
        $time=time();
        $data=array(
            'answer_id'         =>$aid,
            'suid'              =>$suid,
            'ruid'              =>$ruid,
            'message'           =>$content,
            'replay_comment_id' =>$comment_id,
            'add_time'          =>$time
        );
        
        $flag=M('answer_comment')->data($data)->add();
        //计数加1
        D('Answer')->where('id='.$aid)->setInc('comment_count');
        
        return $flag;
    }
    
   
    /**
     * 获取用户对评论的举报状态
     * 
     * @param unknown $uid
     * @param unknown $comment_id
     * @return mixed|boolean|string|NULL|unknown|object
     */
    function getCommentReportStatus($uid,$comment_id){
        $where=array(
           'uid'         =>$uid,
           'comment_id'  =>$comment_id
        );
        $is_exist=M('answer_comment_report')->where($where)->select();
        return $is_exist;
    }
    
    
    /**
     * 举报评论处理
     * @param unknown $uid
     * @param unknown $comment_id
     * @return number|mixed|boolean|unknown|string
     */
    function  reportComment($uid,$comment_id){
        //判断用户对评论的举报状态
        $is_exist=$this->getCommentReportStatus($uid, $comment_id);
        //如果举报状态不存在
        if($is_exist==null){
            $time=time();
            $data=array(
                'uid'        =>$uid,
                'comment_id' =>$comment_id,
                'add_time'   =>$time
            );
            $info=M('answer_comment_report')->data($data)->add();
            //修改 举报 记录值
            $where=array(
                'id'  =>$comment_id
            );
            M('answer_comment')->where($where)->setInc('report_count');
            
        }else{
            $info=0;
        }
        
        return $info;
    }
    
    
    
    /**
     * 获取用户对评论的点赞情况
     * @param unknown $uid
     * @param unknown $comment_id
     * @return mixed|boolean|string|NULL|unknown|object
     */
    function getCommentUpvoteStatus($uid,$comment_id){
        $where=array(
            'uid'         =>$uid,
            'comment_id'  =>$comment_id
        );
        $is_exist=M('answer_comment_upvote')->where($where)->select();
        return $is_exist;
    }
    
    
    /**
     * 处理用户对评论的点赞  ，取消点赞
     * @param unknown $uid
     * @param unknown $comment_id
     * @return number
     */
    function dealCommentVote($uid,$comment_id){
        //判断点赞情况
        $is_exist=$this->getCommentUpvoteStatus($uid, $comment_id);
        //未点赞 ，将要进行点赞操作
        if($is_exist==null){
            $time=time();
            $data=array(
                'uid'         =>$uid,
                'comment_id'  =>$comment_id,
                'add_time'    =>$time
            );
            
            M('answer_comment_upvote')->data($data)->add();
            
            //修改 评论点赞记录
            
            M('answer_comment')->where('id='.$comment_id)->setInc('upvote_count');
           
            $info=1;
        }else{
            //此时已点赞，将要进取消赞操作
            $where=array(
                'uid'         =>$uid,
                'comment_id'  =>$comment_id
            );
            M('answer_comment_upvote')->where($where)->delete();
            
            //修改 评论点赞记录
       
            M('answer_comment')->where('id='.$comment_id)->setDec('upvote_count');
            
            $info=0;
        }
        
        return $info;
    }
    
    /**
     * 获取超简单评论信息
     * @param unknown $cid
     * @return mixed|boolean|string|NULL|unknown|object
     */
    function  getSimpleCommentInfo($cid){
        $info= M('answer_comment')->field('suid,ruid,message,id')->where('id='.$cid)->select();
        return $info;
    }
    
}