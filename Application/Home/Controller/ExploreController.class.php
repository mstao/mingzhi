<?php

/**
 * 
 * @desc 发现控制器
 * @author mingshan
 */

namespace Home\Controller;

use \Common\Controller\HomeController;
class ExploreController extends HomeController{
    public  $uid;
    public function _initialize(){
        parent::_initialize();
        $this->uid=session('uid');
    
    }
    
    
    public function  index(){
        $current_page=I('get.p','');
        
        //获取推荐的问题
        $recommend_q=D('Question')->getExploreQuestionInfo();
        //获取热门话题
        $hot_topic=D('Topic')->getHotTopic($this->uid);
        //默认从第一条开始取
        $position=0;
        //设置一次请求显示的数目
        $item_per_page =10;
        //取得传过来的参数
        $page_number=$current_page;
        //获得当前记录的位置
        $position = ($page_number * $item_per_page);
        //获取热门回答的总数
        $record_count=D('Answer')->getExploreAnswerCount();
        //根据热门回答的总数计算出ajax最多加载次数
        $ajax_p=ceil($record_count/$item_per_page);
        //获取用户行为记录的详细信息
        $record_info=D('Answer')->getExploreAnswerInfo($this->uid,$position,$item_per_page);
        /* echo "<pre>";
         var_dump($record_info);
         echo "</pre>";   */
        //获取统计信息
        $this->assign("recommend_q",$recommend_q);
        $this->assign("hot_topic",$hot_topic);
        $this->assign('ajax_p',$ajax_p);
        $this->assign('record_info',$record_info);
      
        if(IS_AJAX){
            //获取用户行为记录的详细信息
             
            echo $this->fetch('Explore/answer');
        }else{
            $this->display();
        }
    }
}