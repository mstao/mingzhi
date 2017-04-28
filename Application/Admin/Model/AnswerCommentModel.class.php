<?php
namespace Admin\Model;
use Think\Model;

/**
 * 
 +-----------------------------------------------------
 * 话题model
 * @author mingshan
 *
 +-----------------------------------------------------
 */
class AnswerCommentModel  extends Model{
    
    
    /**
     * 获取评论数量
     * @return unknown
     */
    function  getCommentCount(){
        $count=D('answer_comment')->count();
        return $count;
    }
    
    /**
     * 获取内容
     * @param unknown $position
     * @param unknown $item_per_page
     * @return unknown
     */
    function  getCommentInfo(){
        $info=M('answer_comment')
                        ->alias("ac")
                        ->field(array("ac.*","a.answer_content","u1.username" => "susername","u2.username" => "rusername"))
                        ->join("LEFT JOIN __USER__ u1 ON u1.id=ac.suid")
                        ->join("LEFT JOIN __USER__ u2 ON u2.id=ac.ruid")
                        ->join("__ANSWER__ a ON a.id=ac.answer_id")
                        ->order("ac.add_time desc")
                        ->select();
        return $info;
    }
}