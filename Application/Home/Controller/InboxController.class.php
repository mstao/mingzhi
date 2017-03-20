<?php
/**
 * 私信控制器
 * 
 */
namespace Home\Controller;
use Common\Controller\HomeController;
class InboxController extends HomeController{
    protected  $uid;
    
    public function  _initialize(){
        $this->uid=session('uid');
    }
    
    
    public function index(){
        //获取私信数量
        $inbox_count=D('Inbox')->getInboxCount($this->uid);

        $position=0;
        $inbox_relation=D('Inbox');
       //向分页封装函数传入参数
        $p=getpage($inbox_relation,$inbox_count,4);
        //获取数据
        $inbox_info=D('Inbox')->getInbox($this->uid);
        $this->inbox_info= $inbox_info;
        $this->page=$p->show(); 
        $this->display();
    }
 
    public function writeInbox(){
        $this->display();
    }
    
}