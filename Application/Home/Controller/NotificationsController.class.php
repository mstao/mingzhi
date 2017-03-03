<?php
/**
 *
 * 消息 控制器
 */
namespace Home\Controller;
use Common\Controller\HomeController;

class NotificationsController extends HomeController {
    public function index(){
        $this->display();
    }
    public function notificationsinfo(){
        $this->display();
    }
}