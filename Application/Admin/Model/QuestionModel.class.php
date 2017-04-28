<?php

/**
 * 
 +-----------------------------------------------------
 * 问题model
 * @author mingshan
 *
 +-----------------------------------------------------
 */

namespace  Admin\Model;
use Think\Model;

class QuestionModel  extends Model{
    
    /**
     * 获取问题信息总量
     * @return unknown
     */
    function  getQuestionCount(){
        $count=D('Question')->count('id');
        return $count;
    }
    
    /**
     * 获取问题列表
     * @param unknown $position
     * @param unknown $item_per_page
     * @return mixed|boolean|string|NULL|unknown|object
     */
    function getQuestionInfo($position,$item_per_page){
        $info=D("Question")->select();
        return $info;
    }
}