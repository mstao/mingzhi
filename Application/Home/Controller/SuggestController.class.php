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
 +----------------------------------
 */
namespace Home\Controller;
use Common\Controller\HomeController;

class SuggestController extends HomeController{
    
   
    /**
     * 导航栏搜索输入内容
     */
    function searchAutoComplete(){
        $token=$_POST['token'];
        $return_rs=array();
        $suggest_question=D('Question')->dealSearchQuestionInfo($token);
        $suggest_user=D('User')->dealSearchUserInfo($token);
        $suggest_topic=D('Topic')->dealSearchTopicInfo($token);
        $return_rs['question']=$suggest_question;
        $return_rs['user']=$suggest_user;
        $return_rs['topic']=$suggest_topic;
        $data['status']  = 1;
        $data['content'] = $return_rs;
        $this->ajaxReturn($data);
        exit();
    }
    
    
    /**
     * 问题发起时根据输入信息提示填充
     */
    
   function questionAutoComplete(){
       $token=$_POST['token'];
       $return_rs=array();
       $suggest_question=D('Question')->dealSearchQuestionInfo($token);
       $return_rs['question']=$suggest_question;
       $data['status']=1;
       $data['content']=$return_rs;
       $this->ajaxReturn($data);
       exit();
   }
}