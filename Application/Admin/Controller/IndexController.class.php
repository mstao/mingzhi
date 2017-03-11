<?php
namespace Admin\Controller;

use Common\Controller\AdminController;
class IndexController extends AdminController{
    protected   $auid;
    public function _initialize(){
        parent::_initialize();
        $this->auid=session('auid');

    }
    public function index(){
        //获取管理员的信息
        $admin_info=$this->getAdminUserInfo($this->auid);
        $this->assign('u_info',$admin_info);
        $this->display();
    }
    
    /**
     * 获取管理员信息
     * @param unknown $auid
     * @return unknown
     */
    public function getAdminUserInfo($auid){
        $admin_info=D('AdminUser')->getAdminUserInfo($this->auid);
        $info['admin_name']=$admin_info[0]['username'];
        return $info;
    }
}