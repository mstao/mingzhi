<?php

/**
 +-----------------------------------------------------
 * 回答管理
 * @author mingshan
 *
 +-----------------------------------------------------
 */


namespace Admin\Controller;

use Common\Controller\AdminController;

class AnswerManageController extends AdminController{

    /**
     * 用户管理
     */
    public function answerList(){

        $count=D('Answer')->getAnswerCount();
       
        $relation=D('Answer');
        //向分页封装函数传入参数
        $p=getpage($relation,$count,15);
        $info=D('Answer')->getAnswerInfo();
        
        $this->page=$p->show();
        $this->assign('info',$info);
        $this->display('Content/answerManage');
    }
}