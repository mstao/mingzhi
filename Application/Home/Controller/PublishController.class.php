<?php
/**
 +----------------------------------------------------------------------
 |  MINGZHI
 +----------------------------------------------------------------------
 | Copyright (c) 2017 mingzhi All rights reserved.
 +----------------------------------------------------------------------
 | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
 +----------------------------------------------------------------------
 | Author: mingshan <499445428@qq.com>
 +----------------------------------------------------------------------
 
 +----------------------------------
 * 发起控制器
 +----------------------------------
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