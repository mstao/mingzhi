<?php
/**
 +-----------------------------------------------------
 * 话题管理
 * @author mingshan
 *
 +-----------------------------------------------------
 */

namespace Admin\Controller;

use Common\Controller\AdminController;

class TopicManageController  extends  AdminController{
   
    
    /**
     * 话题列表
     */
    function  topicList(){
        $count=D("Topic")->getTopicCount();
        $relation=D("Topic");
        //向分页封装函数传入参数
        $p=getpage($relation,$count,15);
        
        $info=D("Topic")->getTopicInfo();
        $this->page=$p->show();
        $this->assign("topicinfo",$info);
        $this->display("Content/topicManage");
    }
}