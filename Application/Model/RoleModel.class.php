<?php
namespace Model;
use Think\Model;
class RoleModel extends Model{
    
    //分配权限
    
    //$auth为数组
    function  saveAuth($auth,$role_id){
        //将数组变为字符串
        $authids=implode(",", $auth);
        //查询对应的权限信息
        $authinfo=D('auth')->select($authids);
       
        //拼装控制器和方法   用 - 连接
        foreach ($authinfo as $key=>$val){
            if(!empty($val['auth_c'])){
                $auth_ac.=$val['auth_c'].'-'.$val['auth_a'].',';
            }
           
        }
        $auth_ac=rtrim($auth_ac,",");
        
        //将数据添加到role表中
        $arr=array(
            'role_id'=>$role_id,
            'role_auth_ids'=>$authids,
            'role_auth_ac'=>$auth_ac
        );
        $flag=$this->save($arr);
        return $flag;
    }
}