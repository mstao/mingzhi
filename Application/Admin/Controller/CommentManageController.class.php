<?php

/**
 +-----------------------------------------------------
 * 评论管理
 * @author mingshan
 *
 +-----------------------------------------------------
 */

namespace Admin\Controller;

use Common\Controller\AdminController;

class CommentManageController extends AdminController{

    
    public function commentList(){

        $count=D('AnswerComment')->getCommentCount();
       
        $relation=M('answer_comment');
        //向分页封装函数传入参数
        $p=getpage($relation,$count,15);
        $info=D('AnswerComment')->getCommentInfo();       
        
        $this->page=$p->show();
        $this->assign('info',$info);
        $this->display('Content/commentManage');
    }
}
