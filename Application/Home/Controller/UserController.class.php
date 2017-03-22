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
 * 用户控制器
 +----------------------------------
 */
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller{
    
    //登录
    public function Login(){
        $user=new  \Home\Model\UserModel();
        if(!empty($_POST)){
                    
                    $v=I('post.verify',''); //获取$_POST['verify']
                    // 检查验证码
                    if(!check_verify($v)){
                        $data['status']  = 2;
                        $data['content'] = '验证码错误';
                        $this->ajaxReturn($data);
                        exit;
                    }else{
                        // echo "验证码正确";
                        //验证Model 定义的表单判断                      
                           
                            $name=I('post.username','');
                            $pw=I('post.password','');
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
                                session('username',$rst['username']);
                                $uid=$rst['id'];
                                session('uid',$uid);
                                
                                $data['status']  = 1;
                                $data['content'] = '登录成功';
                                $this->ajaxReturn($data);
                                exit();
                                //跳转
                                //$this->redirect('Index/index');
                            }
                
                        }                   
                             
        }else{
            $this->display();
        }
        
}
    
    //注册
    public function register(){
        $user=new  \Home\Model\UserModel();
        $ver=I('post.verify',''); //获取$_POST['verify']
        
        // 检查验证码
        if(!check_verify($ver)){
                $data['status']  = 2;
                $data['content'] = '验证码错误';
                $this->ajaxReturn($data);
                exit();
        }else{
            $flag=$user->AddUser($_POST);
            if($flag>0){
                $data['status']  = 1;
                $data['content'] = '<font color="green">注册成功</font>';
                $this->ajaxReturn($data);
                exit();
            }else{
                $data['status']  = 0;
                $data['content'] = '注册失败';
                $this->ajaxReturn($data);
                exit();
            }
            
        }
    }
    
    
    /*
     * 生成验证码
     */
    function  Verify(){
        $user=new  \Home\Model\UserModel();
        $user->VerifyImg();
    }
    
    
    //注册时用户名校验是否可用
    public function CheckNm($name){
        $info=D('User')->getByUsername($name);
        if($info==null){
            $data['status']  = 1;
            $data['content'] = '<font color="green">用户名可用</font>';
            $this->ajaxReturn($data);
            exit();
            //echo '<font color="green">用户名可用</font>';
        }else{
            $data['status']  = 0;
            $data['content'] = '用户名已被使用';
            $this->ajaxReturn($data);
            exit();
            //echo "用户名已被注册";        
        }
        exit;
    }
    
    //注册时邮箱校检是否可用
    public function CheckEmail($email){
        //$info=D('User')->getByEmail($email);
       
        $info=D('User')->where(array('email'=>$email))->find();
        if($info==null){
            $data['status']  = 1;
            $data['content'] = '<font color="green">邮箱可用</font>';
            $this->ajaxReturn($data);
            exit();
        }else{
            $data['status']  = 0;
            $data['content'] = '邮箱已被使用';
            $this->ajaxReturn($data);
            exit();
        }
        
    }
    
    //Ajax上传图片
    public function UploadAvatar(){
        
        //判断是否有文件上传
        if(!empty($_FILES)){
          $myava=D('User')->UploadMyAvatar($_FILES);
          $path=$myava['path'];
          $flag=$myava['flag'];
          if($flag=='x'){
              $data['status']  = 3;
              $data['content'] = '上传出错';
              $this->ajaxReturn($data);
              exit();
          }else if($flag>0){
              $data['status']  = 1;
              $data['content'] = $path;
              $this->ajaxReturn($data);
              exit();
          }else {
              $data['status']  = 0;
              $data['content'] = '写入数据库出错';
              $this->ajaxReturn($data);
              exit();
          }
        }
    }
    
    //Ajax更改用户名
    function UpdateUserName(){
        if(IS_AJAX){
            if(!empty($_POST)){
                $user=D('User');
                $name=$_POST['name'];
                $IS_USE=$user->getByUsername($name);
                if($IS_USE==null){
                    $update=$user->UpdateName_Model($name);
                    if($update>0){
                        $data['status']  = 1;
                        $data['content'] = $name;
                        session('username',$name);
                        $this->ajaxReturn($data);
                        exit();
                    }else{
                        $data['status']  = 2;
                        $data['content'] = '更改失败';
                        $this->ajaxReturn($data);
                        exit();
                    }
                }else{
                    $data['status']  = 0;
                    $data['content'] = '用户名已被使用';
                    $this->ajaxReturn($data);
                    exit();
                }
                
                
            }
        }else{
            $data['status']  = 3;
            $data['content'] = '非法请求';
            $this->ajaxReturn($data);
            exit();
        }
    }
    
    //Ajax更改一句话介绍
    function UpdateIntroduction(){
        if(IS_AJAX){
            $uid=session('uid');
            $tag=$_POST['tag'];
            $flag=D('User')->UpdateIntroduction_Model($tag);
            if($flag>0){
                $data['status']  = 1;
                $data['content'] = $tag;
                $this->ajaxReturn($data);
                exit();
            }else{
                $data['status']  = 0;
                $data['content'] = '更改失败';
                $this->ajaxReturn($data);
                exit();
            }
            
        }else{
            $data['status']  = 3;
            $data['content'] = '非法请求';
            $this->ajaxReturn($data);
            exit();
        }
    }
    
    //Ajax 更改性别信息
    function UpdateSex(){
        if(IS_AJAX){
            $sex=$_POST['sex'];
            $flag=D('User')->UpdateSex_Model($sex);
            if($flag>0){
                $data['status']  = 1;
                $data['content'] = $sex;
                $this->ajaxReturn($data);
                exit();
            }else{
                $data['status']  = 0;
                $data['content'] = '更改失败';
                $this->ajaxReturn($data);
                exit();
            }
        }else{
            $data['status']  = 3;
            $data['content'] = '非法请求';
            $this->ajaxReturn($data);
            exit();
        }
    }
     
    //Ajax 更改个人描述信息
    function UpdateDesc(){
        if(IS_AJAX){
            $desc=$_POST['desc'];
            $flag=D('User')->UpdateDesc_Model($desc);
            if($flag>0){
                $data['status']  = 1;
                $data['content'] = $desc;
                $this->ajaxReturn($data);
                exit();
            }else{
                $data['status']  = 0;
                $data['content'] = '更改失败';
                $this->ajaxReturn($data);
                exit();
            }
        }else{
            $data['status']  = 3;
            $data['content'] = '非法请求';
            $this->ajaxReturn($data);
            exit();
        }
    }
    
    //Ajax  更改职业
    function  UpdateJob(){
        if(IS_AJAX){
            $job=$_POST['job'];
            $flag=D('User')->UpdateJob_Model($job);
            $name=D('User')->getJobNameById($job);
            if($flag>0){
                $data['status']  = 1;
                $data['content'] = $name;
                $this->ajaxReturn($data);
                exit();
            }else{
                $data['status']  = 0;
                $data['content'] = '更改失败';
                $this->ajaxReturn($data);
                exit();
            }
        }else{
            $data['status']  = 3;
            $data['content'] = '非法请求';
            $this->ajaxReturn($data);
            exit();
        }
    }
    
    //编辑器图片上传
    function  EditorUploadImage(){
          $image_path=D('User')->EditorUplaodImg_Model($_FILES);
          
          echo $image_path;
    }
 
}