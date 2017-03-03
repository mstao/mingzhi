<?php
/**
 *
 * 公共页面控制器
 */
namespace Home\Controller;
use Common\Controller\HomeController;

class PublicController extends HomeController {
    public function header(){
        
        $this->display();
    }
    public function footer(){
        $this->display();
    }
    public function minifooter(){
        $this->display();
    }
    public function publish(){
        $this->display();
    }
    
}