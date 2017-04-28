<?php
/**
 +-----------------------------------------------------
 * 问题管理
 * @author mingshan
 *
 +-----------------------------------------------------
 */

namespace Admin\Controller;

use Common\Controller\AdminController;

class QuestionManageController extends  AdminController{
    
    
    /**
     * 获取问题列表
     */
    function   questionList(){

        $count=D("Question")->getQuestionCount();
        
        $relation=D('Question');
        //向分页封装函数传入参数
        $p=getpage($relation,$count,15);
        
        $info=D('Question')->getQuestionInfo();
        $this->page=$p->show();
        $this->assign("questioninfo",$info);
        $this->display("Content/questionManage");
    }
}