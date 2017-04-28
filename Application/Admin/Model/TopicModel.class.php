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
class TopicModel  extends Model{
    
    
    /**
     * 获取话题数量
     * @return unknown
     */
    function  getTopicCount(){
        $count=D('Topic')->count();
        return $count;
    }
    
    function  getTopicInfo($position,$item_per_page){
        $info=D('Topic')->select();
        return $info;
    }
}