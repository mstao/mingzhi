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
 * Home父控制器
 +----------------------------------
 */


namespace Common\Controller;
use Common\Controller\BaseController;

class HomeController extends BaseController{
 
    public function _initialize(){
        parent::_initialize();
        
        //检测用户是否登录
        $uid = isset($_SESSION['uid']) ? $_SESSION['uid'] :null;
        if(!$uid){
            $this->redirect('User/Login');
            //$this->error('没有权限访问！',U("User/login"),0);
        }
        
         //分配公共信息，包含头像，用户名

         $user=new  \Home\Model\UserModel();
         $uinfo=$user->getPersonInfo($uid);
         $notification=new \Home\Model\NotificationsModel();
         $data['no_count']=$notification->getNotificationsCount($uid);
         $data['username']=$uinfo[0]['username'];       
         $data['avatar_file']=$uinfo[0]['avatar_file'];
         $data['tag']=$uinfo[0]['tag'];
         $this->assign("headerinfo",$data); 
    }
}