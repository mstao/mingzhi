<?php
namespace Admin\Controller;
use \Think\Controller;
/**
 +-----------------------------------------------------
 * 后台用户请求处理
 * @author mingshan
 *
 +-----------------------------------------------------
 */
class AdminUserController extends Controller{
    //登录
    public function Login(){
        $user=D('AdminUser');
        if(!empty($_POST)){

            // echo "验证码正确";
            //验证Model 定义的表单判断
             
            $name=I('post.um','');
            $pw=I('post.pw','');
            //判断用户名和密码是否正确
            $rst=$user->CheckNamePw($name,$pw);
            if($rst==false){
                $data['status']  = 0;
                $data['content'] = '用户名或密码错误';
                $this->ajaxReturn($data);
                exit;
            }else{
                //用户验证正确
                //将登陆信息保存在session中
                session('ausername',$rst['username']);
                $uid=$rst['id'];
                session('auid',$uid);
        
                $uinfo=$user->getAdminUserInfo($uid);
                $data['status']  = 1;
                $data['content'] = '登录成功';
                $this->ajaxReturn($data);

            }   
             
        }else{
            $this->display();
        }
    
    }
    
    /**
     *退出后台系统 
     */
    
    public function logOut(){
        unset($_SESSION['auid']);
        unset($_SESSION['ausername']);
        $this->redirect("AdminUser/Login");
    }
}