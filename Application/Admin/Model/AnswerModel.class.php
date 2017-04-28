<?php
namespace Admin\Model;
use Think\Model;

/**
 +-----------------------------------------------------
 * 
 * 回答model
 * @author mingshan
 *
 +-----------------------------------------------------
 */
class  AnswerModel extends Model{
    
    /**
     * 获取回答数量
     * @return unknown
     */
    function getAnswerCount(){
        $count=D('Answer')->count();
        return $count;
    }
    
    /**
     * 获取回答内容
     */
    function  getAnswerInfo(){

        $info=D('Answer')
                    ->alias("a")
                    ->field("a.*,q.id,q.question_name") 
                    ->join("__QUESTION__ q on q.id=a.question_id")
                    ->select();
        return $info;
    }
}