<?php
/*
 * 普通控制器的父类
 */

namespace Common\Controller;
use Common\Controller\BaseController;

class AdminController extends BaseController{
    //构造方法
    public function _initialize(){
      parent::_initialize();
      /* //获取当前控制器名-方法名
      $now_ac=CONTROLLER_NAME."-".ACTION_NAME;
      $sql1="select role_auth_ac from han_user u join han_role r on u.role_id=r.role_id where u.id=".$_SESSION['user_id'];
      $auth_info=D()->query($sql1);
      $auth_ac=$auth_info['0']['role_auth_ac'];
      //判断$now_ac是否在$auth_ac中出现过  strpos()
      //需要将Index/index ,Index/left,Index/head,Index/right,User/login权限放开
      $allow_ac=array('Index-index','Index-left','Index-head','Index-right','User/login');
      if(!in_array($now_ac, $allow_ac) && $_SESSION['user_id']!=1 && strpos($auth_ac,$now_ac)===false){
          $this->error('没有权限访问！',U("User/login"));
      } */ 
      
      
      //检测用户是否登录
      $uid = isset($_SESSION['auid']) ? $_SESSION['auid'] :null;
      if(!$uid){
          $this->redirect('AdminUser/Login');
          //$this->error('没有权限访问！',U("User/login"),0);
      }
    }
}