<?php
/**
 *
 * @desc 消息 控制器
 * @author Mingshan
 */
namespace Home\Controller;
use Common\Controller\HomeController;
use Think\Controller;

class NotificationsController extends HomeController {
    protected $uid;
    public function _initialize(){
        parent::_initialize();
        $this->uid=session('uid');
    }
    
    /**
     *  获取全部通知信息
     */
    public function index(){
        
        if(IS_AJAX){
             $position=0;
             $item_pre_page=10;
            //获取消息信息
             $info=D('Notifications')->readNotifications($this->uid,$position,$item_pre_page);
           
             $this->assign('notification_content',$info);
             echo $this->fetch('Public:notification_content');
        }
    }
    
    /**
     * @desc 获取赞同消息
     */
    public function upvote(){
       if (IS_AJAX){
            $position=0;
            $item_pre_page=10;
            $type_flag="za";
            //获取消息信息
            $info=D('Notifications')->getUpvoteAnswer($this->uid,$type_flag,$position,$item_pre_page);
            $this->assign('notification_content',$info);
            echo $this->fetch('Public:notification_upvote');
       }
    }
    
    /**
     * 获取关注我的通知
     */
    public function  focus(){
        if (IS_AJAX){
            $position=0;
            $item_pre_page=10;
            $type_flag="gp";
            //获取消息信息
            $info=D('Notifications')->getFocusPersonInfo($this->uid,$type_flag,$position,$item_pre_page);
            $this->assign('notification_content',$info);
            echo $this->fetch('Public:notification_focus');
        }
    }
    
    /**
     * @desc ajax长轮询 来获取通知消息信息
     * @return 通知信息数量，>o
     */
    public function longPoll(){
       
        
        if(!$_GET['timed']) exit();
        date_default_timezone_set("PRC");
        session_write_close();
        set_time_limit(0);//无限请求超时时间
        $timed = $_GET['timed'];
        while (true) {
            sleep(3); // 休眠3秒，模拟处理业务等
            //判断有无新通知出现
             $no_count=D('Notifications')->getNotificationsCount($this->uid);
             if ($no_count>0) { 
                $responseTime = time();
                // 返回数据信息，请求时间、返回数据时间、耗时
                $content=array(
                    'result'         =>$no_count,
                    'reponse_time'   =>$responseTime,
                    'request_time'   =>$timed,
                    'use_time'       =>($responseTime - $timed)
                );
                $this->ajaxReturn($content);
                exit();
            } else { // 模拟没有数据变化，将休眠 hold住连接
                sleep(13);
                exit();
            }
        }
        
        
    }
}