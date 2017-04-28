<?php

/**
 +-----------------------------------------------------
 * 用户管理
 * @author mingshan
 *
 +-----------------------------------------------------
 */

namespace Admin\Controller;

use Common\Controller\AdminController;

class UserManageController extends AdminController{

    /**
     * 用户管理
     */
    public function userList(){
        
        $count=D('AdminUser')->getUserCount();
        $relation=D('User');
        //向分页封装函数传入参数
        $p=getpage($relation,$count,15);
        $userinfo=D('AdminUser')->getUserInfo();
        $this->page=$p->show();
        $this->assign('userinfo',$userinfo);
        $this->display('Content/userManage');
    }
}