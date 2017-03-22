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
 * 个人主页控制器
 +----------------------------------
 */


namespace Home\Controller;
use Common\Controller\HomeController;

class ProfileController extends HomeController {
     public function  index($u){
         $u=$_GET['u'];
         $sel=$_GET['sel'];
         $current_page=I('get.p','');
         $data=$this->getInfo($u);
         $focus_topic_info=$this->getTopicInfo($u);  
         
         //默认从第一条开始取
         $position=0;
         //设置一次请求显示的数目
         $item_per_page =10;
         //取得传过来的参数
         $page_number=$current_page;
         //获得当前记录的位置
         $position = ($page_number * $item_per_page);
         //默认进入个人主页，浏览个人动态信息
         if(!empty($u) && empty($sel)){
             //访问控制器 主页浏览量+1
             D('User')->where('id='.$u)->setInc('u_view_count');  
             //获取用户uid
            // $uid=session('uid');
               
            
             
             //获取用户行为记录的总数
             $record_count=D('User')->getUserRecordCount($u);
             //根据行为记录总数计算出ajax最多加载次数
             $ajax_p=ceil($record_count/$item_per_page);
             //获取用户行为记录的详细信息
             $record_info=D('User')->getUserRecord($u,$position,$item_per_page);
              /* echo "<pre>";
             var_dump($record_info);
             echo "</pre>";   */ 
             //获取用户的统计信息
             $u_count=$this->getUserCountInfo($u);
             $this->assign("u_count",$u_count);
             $this->assign('ajax_p',$ajax_p);
             $this->assign('record_info',$record_info);
             $this->assign("umsg",$data);
             $this->assign("uid",$u);
             $this->assign("focus_topic",$focus_topic_info);
             if(IS_AJAX){
                 //获取用户行为记录的详细信息
                
                 echo $this->fetch('Profile/mytrends_ajax');
             }else{
                 $this->display('Profile/index');
             }
             
         }else if(!empty($u) && $sel=='question'){
             //获取用户发表的问题
             
            
             
             //获取用户行为记录的总数
             $record_count=D('Question')->getQuestionCountByUid($u);
             //根据行为记录总数计算出ajax最多加载次数
             $ajax_p=ceil($record_count/$item_per_page);
             //获取用户行为记录的详细信息
             $record_info=D('Question')->getQuestionByUid($u,$position,$item_per_page);
              /* echo "<pre>";
             var_dump($record_info);
             echo "</pre>";   */ 
             $u_count=$this->getUserCountInfo($u);
             $this->assign("u_count",$u_count);
             $this->assign('ajax_p',$ajax_p);
             $this->assign('record_info',$record_info);
             $this->assign("umsg",$data);
             $this->assign("focus_topic",$focus_topic_info);
             $this->assign("uid",$u);
             if(IS_AJAX){
                 //获取用户行为记录的详细信息
               
                 echo  $this->fetch('Profile/question_ajax');
             }else{
                 $this->display('question');
             }
            
         }else if(!empty($u) && $sel=='answer'){
             //获取用户的回答
             
            
              
             //获取用户行为记录的总数
             $record_count=D('Answer')->getAnswerCountByUid($u);
             //根据行为记录总数计算出ajax最多加载次数
             $ajax_p=ceil($record_count/$item_per_page);
             //获取用户行为记录的详细信息
             $record_info=D('Answer')->getAnswerInfoByUid($u,$position,$item_per_page);
             /* echo "<pre>";
              var_dump($record_info);
              echo "</pre>";   */
             //获取统计信息
             $u_count=$this->getUserCountInfo($u);
             $this->assign("u_count",$u_count);
             $this->assign('ajax_p',$ajax_p);
             $this->assign('record_info',$record_info);
             $this->assign("umsg",$data);
             $this->assign("focus_topic",$focus_topic_info);
             $this->assign("uid",$u);
             if(IS_AJAX){
                 //获取用户行为记录的详细信息
               
                 echo $this->fetch('Profile/answer_ajax');
             }else{
                  $this->display('answer');
             }
             

            
         }else if(!empty($u) && $sel=='collect'){
             
             //获取用户的收藏夹信息
             $collection_info=D('Collection')->getCollectionInfoByUid($u);
             $u_count=$this->getUserCountInfo($u);
             
             $this->assign("collection_info",$collection_info);
             $this->assign("u_count",$u_count);
             $this->assign("umsg",$data);
             $this->assign("focus_topic",$focus_topic_info);
             $this->assign("uid",$u);
             $this->display('collect');
             
         }else if(!empty($u) && $sel=='upvote'){
           	//赞同了回答
         	
            
              
             //获取用户行为记录的总数
             $record_count=D('User')->getUpvoteCount($u);
             //根据行为记录总数计算出ajax最多加载次数
             $ajax_p=ceil($record_count/$item_per_page);
             //获取用户行为记录的详细信息
             $record_info=D('Answer')->getUpvoteAnswerByUid($u,$position,$item_per_page);
             /* echo "<pre>";
              var_dump($record_info);
              echo "</pre>";   */
             //获取统计信息
             $u_count=$this->getUserCountInfo($u);
             $this->assign("u_count",$u_count);
             $this->assign('ajax_p',$ajax_p);
             $this->assign('record_info',$record_info);
             $this->assign("umsg",$data);
             $this->assign("focus_topic",$focus_topic_info);
             $this->assign("uid",$u);
             if(IS_AJAX){
                 //获取用户行为记录的详细信息
                
                 echo $this->fetch('Profile/upvote_ajax');
             }else{
                 $this->display('upvote');
             }
            
         }
         
         
                
     }
     public function myinfo(){
         $this->display();
     }
     public function pageinfo(){
         $this->display();
     }
     public function behavior(){
         $this->display();
     }
     //编辑
     public function edit($u){
         $data=$this->getInfo($u);
         $alljob=$this->getAllJob($u);
         $focus_topic_info=$this->getTopicInfo($u);
         $this->assign("umsg",$data);
         $this->assign("alljob",$alljob);
         $this->assign("focus_topic",$focus_topic_info);
         $this->display();
     }
     //获取用户一些基本信息
     public function getInfo($uid){
         $user=new  \Home\Model\UserModel();
         $uinfo=$user->getPersonInfo($uid);
         $job=$user->getJob($uid);
         $focus_person_count=$user->getFollowCountByUser($uid);//关注了多少人
         $focus_topic_count=D('User')->getFocusTopicCountByUser($uid);//关注的话题数量
         $data['session_id']=session('uid');
         $data['uid']=$uinfo[0]['id'];
         $data['username']=$uinfo[0]['username'];
         $data['avatar_file']=$uinfo[0]['avatar_file'];
         $data['tag']=$uinfo[0]['tag'];
         $data['sex']=$uinfo[0]['sex'];
         $data['city']=$uinfo[0]['city'];
         $data['desc']=$uinfo[0]['desc'];
         $data['myweb']=$uinfo[0]['myweb'];
         $data['job']=$job[0]['job_name'];
         $data['fans_count']=$uinfo[0]['fans_count'];
         $data['u_view_count']=$uinfo[0]['u_view_count'];
         $data['focus_person']=$focus_person_count;
         $data['focus_topic_count']=$focus_topic_count;
         return $data;
     }
     //获取所有的职业信息
     public function getAllJob(){
         $user=new  \Home\Model\UserModel();
         $job=$user->getAllJob();
         return $job;
     }
     //获取关注的话题信息
     public function getTopicInfo($uid){
         $user=new  \Home\Model\UserModel();
         $topicinfo=$user->getFocusTopicInfo($uid);
         return $topicinfo;
     }
     
     //获取用户的统计数据
     public function getUserCountInfo($uid){
         //获取用户的提出问题数量
         $question_count=D('Question')->getQuestionCountByUid($uid);
         //获取用户的回答数量
         $answer_count=D('Answer')->getAnswerCountByUid($uid);
         
         //获取用户的赞同数量
         $upvote_count=D('User')->getUpvoteCount($uid);
         //获取用户的收藏夹数量
         $collection_count=D('Collection')->getCollectionCount($uid);
         
         $data2["answer_count"]=$answer_count;
         $data2["question_count"]=$question_count;
         $data2["upvote_count"]=$upvote_count;
         $data2["collection_count"]=$collection_count;
         return $data2;
     }
}