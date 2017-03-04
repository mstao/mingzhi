<?php
namespace Admin\Model;
use Think\Model;

/**
 * 后台管理
 * 
 * @desc 处理后台用户请求
 * @author mingshan
 *
 */
class UserModel extends Model{
  
    /**
     * 制作一个方法对用户名和密码进行校验（后台管理）
     * @param unknown $name
     * @param unknown $pw
     * @return boolean|unknown
     */
    function  CheckNamePw($name,$pw){
    
        //根据指定字段进行查询  getByXXX()  XXX为字段,函数返回以为数组信息
        $info =$this->getByUsername($name);
        if($info!=null){
            //验证密码
            if($info['password']!=md5($pw)){
                return false;
            }else{
                return $info;
            }
        }else{
            return false;
        }
    }
    /**
     * 获取后台管理人员的信息
     * @param unknown $uid
     * @return mixed|boolean|string|NULL|unknown|object
     */
    function  getAdminUserInfo($uid){
        $info=D('admin_user')->where('id='.$uid)->select();
        return $info;
    }
}