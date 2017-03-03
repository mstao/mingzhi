<?php
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
        
        //检测是否登录  ，如果登录 则不加载
        
//         $user=new  \Home\Model\UserModel();
//         $uinfo=$user->getPersonInfo($uid);
//         $data['username']=$uinfo[0]['username'];       
//         $data['avatar_file']=$uinfo[0]['avatar_file'];
//         $data['tag']=$uinfo[0]['tag'];
//         $this->assign("headerinfo",$data); 
    }
}