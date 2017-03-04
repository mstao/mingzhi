<?php
namespace Admin\Controller;

use Common\Controller\AdminController;
class IndexController extends AdminController{
    protected   $uid;
    public function _initialize(){
        parent::_initialize();
        $this->uid=session('uid');

    }
    public function index(){
        
    }
}