<?php
/*
 * 发起话题控制器
 */
namespace Home\Controller;
use Common\Controller\HomeController;

class PublishController extends HomeController {
    public function index(){
        
        $this->display();
    }
    public function publishleft(){
        $this->display();
    }
    public function publishright(){
        $this->display();
    }
}