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
 * 搜索控制器
 * 用来控制处理搜索后详细内容页面的调度
 +----------------------------------
 */

namespace Home\Controller;

use Common\Controller\HomeController;

class SearchController extends HomeController{
    public  $uid;
    public function _initialize(){
        parent::_initialize();
        $this->uid=session('uid');
    
    }
    
    
   
    /**
     * 导航栏点击按钮搜索
     * @param unknown $token
     */
   function search($token,$style){
       
       //默认从第一条开始取
       $position=0;
       //设置一次请求显示的数目
       $item_per_page =10;
       
       /**
        * 根据style来判断搜索内容
        * 然后根据style的内容来选择不同的view渲染页面
        * c  代表内容 
        * t  代表话题
        * q  代表话题 
        * p  代表用户 
        * 
        */
       if($style=="c"){
           $current_page=I('get.p','');
           $page_number=$current_page;
           //获得当前记录的位置
           $position = ($page_number * $item_per_page);
           //获取热门回答的总数
           $record_count=D('Answer')->getSearchAnswerCount($token);
           //根据热门回答的总数计算出ajax最多加载次数
           $ajax_p=ceil($record_count/$item_per_page);
           //获取用户行为记录的详细信息
           $record_info=D('Answer')->dealSearchAnswerInfo($this->uid,$token,$position,$item_per_page);
           $this->assign('token',$token);
           $this->assign('record_info',$record_info);
           $this->assign('ajax_p',$ajax_p);
           if(IS_AJAX){
               //获取用户行为记录的详细信息
                
               echo $this->fetch('Search/answer_temp');
           }else{
               $this->display('index');
           }
           
       }else if($style=="p"){
           
           $current_page=I('get.p','');
           $page_number=$current_page;
           //获得当前记录的位置
           $position = ($page_number * $item_per_page);
           //获取总数
           $record_count=D('User')->getSearchUserCount($token);
           //根据总数计算出ajax最多加载次数
           $ajax_p=ceil($record_count/$item_per_page);
           //获取用户行为记录的详细信息
           $record_info=D('User')->dealSearchUserDetails($this->uid,$token,$position,$item_per_page);
           $this->assign('token',$token);
           $this->assign('record_info',$record_info);
           $this->assign('ajax_p',$ajax_p);
           if(IS_AJAX){
               //获取用户行为记录的详细信息
           
               echo $this->fetch('Search/person_temp');
           }else{
               $this->display('person');
           }
       }else if($style=="t"){
           $current_page=I('get.p','');
           $page_number=$current_page;
           //获得当前记录的位置
           $position = ($page_number * $item_per_page);
           //获取总数
           $record_count=D('Topic')->getSearchTopicCount($token);
           //根据总数计算出ajax最多加载次数
           $ajax_p=ceil($record_count/$item_per_page);
           //获取用户行为记录的详细信息
           $record_info=D('Topic')->dealSearchTopicDetails($this->uid,$token,$position,$item_per_page);
           $this->assign('token',$token);
           $this->assign('record_info',$record_info);
           $this->assign('ajax_p',$ajax_p);
           
           if(IS_AJAX){
               //获取用户行为记录的详细信息
                
               echo $this->fetch('Search/person_temp');
           }else{
               $this->display('topic');
           }
       }else if($style=="q"){
           $current_page=I('get.p','');
           $page_number=$current_page;
           //获得当前记录的位置
           $position = ($page_number * $item_per_page);
           //获取总数
           $record_count=D('Question')->getSearchQuestionCount($token);
           //根据总数计算出ajax最多加载次数
           $ajax_p=ceil($record_count/$item_per_page);
           //获取用户行为记录的详细信息
           $unanswer_question=D('Question')->dealsearchquestiondetails($this->uid,$token,$position,$item_per_page);
           $this->assign('token',$token);
           $this->assign('unanswer_question',$unanswer_question);
           $this->assign('ajax_p',$ajax_p);
            
           if(IS_AJAX){
               //获取用户行为记录的详细信息
           
               echo $this->fetch('Search/question_temp');
           }else{
               $this->display('question');
           }
       }
   }
    
    
}