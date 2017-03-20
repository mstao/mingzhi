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
    
    /**
     * 私信页面
     */
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
        
        if (IS_AJAX){
            $username=$_POST['um'];
            $content=$_POST['con'];
            //由username获取uid
            $ruid=D('User')->getUidByUserName($username);
            if($ruid==null){
                
                $data['status']  = 2;
                $this->ajaxReturn($data);
                exit();
            }else{
                $flag=D('Inbox')->writeInbox($this->uid,$ruid,$content);
                if($flag>0){
                    $data['status']  = 1;
                    $data['content'] = $flag;
                    $this->ajaxReturn($data);
                    exit();
                }else{
                    $data['status']  = 0;
                    $data['content'] = $flag;
                    $this->ajaxReturn($data);
                    exit();
                }
            }
           
        }
       
       
    }
    
    /**
     * 查询用户
     * @param unknown $token
     */
    function  getUserInfo($token){
        if(IS_AJAX){
            $info=D('User')->dealSearchUserInfo($token);
            $data['status']  = 1;
            $data['content'] = $info;
            $this->ajaxReturn($data);
            exit();
        }
      
    }
    
    function  delInbox($iid){
        if(IS_AJAX){
            $flag=D('Inbox')->delInbox($iid);
            if($flag>0){
                $data['status']  = 1;
                $data['content'] = $flag;
                $this->ajaxReturn($data);
                exit();
            }else{
                $data['status']  = 0;
                $data['content'] = $flag;
                $this->ajaxReturn($data);
                exit();
            }

        }
    }
    
}