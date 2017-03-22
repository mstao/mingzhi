<?php
/**
 +----------------------------------------------------------------------
 |  MINGZHI
 +----------------------------------------------------------------------
 | Copyright (c) 2017 mingzhi All rights reserved.
 +----------------------------------------------------------------------
 | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
 +----------------------------------------------------------------------
 | Author: mingshan <499445428@qq.com>
 +----------------------------------------------------------------------

 +----------------------------------
 * 话题广场控制器
 +----------------------------------
 */
namespace Home\Controller;
use Common\Controller\HomeController;

class TopicsController extends HomeController {
    public  $uid;
    public function _initialize(){
        parent::_initialize();
        $this->uid=session('uid');

    }
    
     public function index(){
         
         //默认从第一条开始取
         $position=0;
         //设置一次请求显示的数目
         $item_per_page = 12;
         //取得传过来的参数
         $page_number = filter_var($_POST["p"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
         //获得当前记录的位置
         $position = ($page_number * $item_per_page);
         //获取总话题数目
         $all_topic_count=D('Topic')->getAllTopicCount();
         //根据topic总量计算出Ajax最多加载次数  进1取整
         $ajax_max_load_page=ceil( $all_topic_count/$item_per_page);
         //获取用户关注话题信息
         $all_focus_topic=D('User')->getAllFocusTopicInfo($this->uid);
         $focus_topic_count=D('User')->getFocusTopicCountByUser($this->uid);
         //获取推荐话题信息
         $commend_topic_info=D('Topic')->recommendTopic();
         $all_topic=D('Topic')->getAllTopicInfo($this->uid,$position,$item_per_page);
         $this->assign('all_topic',$all_topic);
         $this->assign('all_focus_topic',$all_focus_topic);
         $this->assign('focus_topic_topic',$focus_topic_count);
         $this->assign('commend_topic',$commend_topic_info);
         $this->assign('mp',$ajax_max_load_page);
         if(IS_AJAX){
             //模板渲染
             echo $this->fetch('Topics/topicinfo');
         }else{
              
             //非AJAX请求正常显示 ，默认从第一条开始取 
             $this->display();
         }
        
     }
    
}