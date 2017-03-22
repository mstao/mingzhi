<?php
namespace  Home\Model;
use Think\Model;

/**
 +-----------------------------------------------------
 * 消息model
 +-----------------------------------------------------
 * @desc 服务器推信息
 * @author mingshan
 *
 +-----------------------------------------------------
 */

class NotificationsModel extends Model{
    
    /**
     * 将推送信息写入到数据库表 Notifications
     * @param unknown $suid
     * @param unknown $ruid
     * @param unknown $item_id
     * @param unknown $type_flag
     * @return mixed|boolean|unknown|string
     */
    
    function writeNotification($suid,$ruid,$item_id,$type_flag){
        //将推过来的信息保存到数据库消息表中
        
        //判断此推送信息是否存在
        $IS_EXIST=$this->isWriteNotification($suid, $ruid, $item_id, $type_flag);
        if($IS_EXIST==null){
            
            //根据type_flag获取type_id
            $type_id=$this->getNotificationTypeID($type_flag);
            $time=time();
            $data=array(
                'sender_uid'     =>$suid,
                'recipient_uid'  =>$ruid,
                'item_id'        =>$item_id,
                'action_type_id' =>$type_id,
                'add_time'       =>$time,
                'read_flag'      =>0
            );
            
            $flag=D('Notifications')->data($data)->add();
        }
        
        return $flag;
    }
    
    /**
     * 判断推送消息是否存在
     * @param unknown $suid
     * @param unknown $ruid
     * @param unknown $item_id
     * @param unknown $type_id
     * @return mixed|boolean|string|NULL|unknown|object
     */
    
    function isWriteNotification($suid,$ruid,$item_id,$type_flag){
       
        $type_id=$this->getNotificationTypeID($type_flag);
        $where=array(
            'sender_uid'     =>$suid,
            'recipient_uid'  =>$ruid,
            'item_id'        =>$item_id,
            'action_type_id' =>$type_id
        );
        $info=D('Notifications')
                       ->field('id')
                       ->where($where)
                       ->select();
        return $info;
    }
    
    /**
     * 根据信息类型获取信息类型id
     * @param unknown $type_flag
     * @return unknown
     */
    function getNotificationTypeID($type_flag){
        $where=array(
            'notification_type_flag' =>$type_flag
        );
        $info=M('notifications_type')->field('id')->where($where)->select();
        $type_id=$info[0]['id'];
        return $type_id;
    }
    
    /**
     * 根据信息id获取信息类型
     * @param unknown $type_id
     * @return unknown
     */
    function getNotificationTypeFlag($type_id){
        $info=M('notifications_type')->field('notification_type_flag')->where('id='.$type_id)->select();
        $type_flag=$info[0]['notification_type_flag'];
        return $type_flag;
    }
    
    /**
     * 获取消息信息
     * @param unknown $uid
     * @param unknown $position
     * @param unknown $item_pre_page
     * @return unknown
     */
    function readNotifications($uid,$position,$item_pre_page){
       
        //获取未读的通知记录
        $where=array(
            'recipient_uid'  =>$uid
        );
        $info=D('Notifications')
                        ->where($where)
                        ->order('add_time desc')    
                        ->limit($position,$item_pre_page)
                        ->select();
       
        //设置一个大数组
        $big_arr=array();
        //循环遍历取出具体信息
        foreach ($info as $key =>$val){
            $type_id=$val['action_type_id'];
            $item_id=$val['item_id'];
            $suid=$val['sender_uid'];
            //根据信息id获取信息类型
            $type_flag=$this->getNotificationTypeFlag($type_id);
            
            if($type_flag=='za'){
               //代表赞同答案
               $a_info=D('Answer')->getSimpleAnswerInfo($item_id);
               //获取超简单用户信息
               $u_info=D('User')->getSimpleUserInfo($suid);
               $a_info[0]['u_info']=$u_info;
               $arr['content']=$a_info;
               
               $arr['flag']='za';
               $big_arr[]=$arr;
                
            }else if($type_flag=='aq'){
               //代表回答问题
               
               //获取超简单问题信息 
               $q_info=D('Question')->getSimpleQuestionInfo($item_id);
               //获取超简单用户信息
               $u_info=D('User')->getSimpleUserInfo($suid);
               $a_info[0]['u_info']=$u_info;
               $arr['content']=$q_info;

               $arr['flag']='aq';
               $big_arr[]=$arr;
            }else if($type_flag=='rq'){
                //代表举报问题
                //获取超简单问题信息
                $q_info=D('Question')->getSimpleQuestionInfo($item_id);
                //获取超简单用户信息
                $u_info=D('User')->getSimpleUserInfo($suid);
                $a_info[0]['u_info']=$u_info;
                $arr['content']=$q_info;
                $arr['flag']='rq';
                $big_arr[]=$arr;
            }else if($type_flag=='ra'){
               //代表举报答案
                //代表赞同答案
                $a_info=D('Answer')->getSimpleAnswerInfo($item_id);
                //获取超简单用户信息
                $u_info=D('User')->getSimpleUserInfo($suid);
                $a_info[0]['u_info']=$u_info;
                $arr['content']=$a_info;
                $arr['flag']='ra';
                $big_arr[]=$arr;
                
            }else if($type_flag=='gp'){
               //代表关注人
                
                //获取超简单用户信息
                $u_info=D('User')->getSimpleUserInfo($suid);
              
                $arr['uinfo']=$u_info;
                $arr['flag']='gp';
                $big_arr[]=$arr;
            }else if($type_flag=='pa'){
               //代表评论回答
               $c_info=D('AnswerComment')->getSimpleCommentInfo($item_id);
               //获取超简单用户信息
               $u_info=D('User')->getSimpleUserInfo($suid);
               $a_info[0]['u_info']=$u_info;
               $arr['content']=$c_info;
               $arr['flag']='ra';
               $big_arr[]=$arr;
            }
            
            
        }
                        
        //读完之后需要将这些信息的read_flag置为1，代表已读
        $map['read_flag']=1;
        foreach ($info as $key =>$val){
            D('Notifications')->where('id='.$val['id'])->save($map);
        }
        
       return $big_arr;
    }
    
    
    /**
     * 获取未读信息数目
     * @param unknown $uid
     * @return unknown
     */
    function getNotificationsCount($uid){
        $where=array(
            'recipient_uid'  =>$uid,
            'read_flag'      =>0
        );
        $count=D('Notifications')->where($where)->count('id');
        return $count;
    }
    
   
    
    /**
     * 获取赞同通知信息
     * @param unknown $uid
     * @param unknown $type_flag
     * @param unknown $position
     * @param unknown $item_pre_page
     * @return unknown
     */
    function getUpvoteAnswer($uid,$type_flag,$position,$item_pre_page){
        $type_id=$this->getNotificationTypeID($type_flag);
        $where=array(
             'action_type_id'  =>$type_id,
             'recipient_uid'   =>$uid
        );
        $info=D('Notifications')
                        ->alias('n')
                        ->field('u.username,n.sender_uid,a.id,a.answer_content')
                        ->where($where)                        
                        ->join('__USER__ u ON u.id=n.sender_uid')
                        ->join('__ANSWER__ a ON a.id=n.item_id')
                        ->order('n.add_time desc')
                        ->limit($position,$item_pre_page)
                        ->select();
        
        //读完之后需要将这些信息的read_flag置为1，代表已读
        $map['read_flag']=1;
        foreach ($info as $key =>$val){
            D('Notifications')->where('id='.$val['id'])->save($map);
        }
        
        return $info;
    }
    
    /**
     * 获取关注用户的通知信息
     * @param unknown $uid
     * @param unknown $type_flag
     * @param unknown $position
     * @param unknown $item_pre_page
     * @return unknown
     */
    function getFocusPersonInfo($uid,$type_flag,$position,$item_pre_page){
       
        $type_id=$this->getNotificationTypeID($type_flag);
        $where=array(
             'action_type_id'  =>$type_id,
             'recipient_uid'   =>$uid
        );
        $info=D('Notifications')
                        ->alias('n')
                        ->field('u.username,n.sender_uid')
                        ->where($where)                        
                        ->join('__USER__ u ON u.id=n.sender_uid')
                        ->order('n.add_time desc')
                        ->limit($position,$item_pre_page)
                        ->select();
        
        //读完之后需要将这些信息的read_flag置为1，代表已读
        $map['read_flag']=1;
        foreach ($info as $key =>$val){
            D('Notifications')->where('id='.$val['id'])->save($map);
        }
        
        return $info;
    }
    
    /**
     * 删除 通知
     * @param unknown $suid
     * @param unknown $ruid
     * @param unknown $item_id
     * @param unknown $type_flag
     * @return mixed|boolean|unknown
     */
    function deleteNotifications($suid,$ruid,$item_id,$type_flag){
        
        //根据类型获取类型id
        $type_id=$this->getNotificationTypeID($type_flag);
        $where=array(
            'sender_uid'     =>$suid,
            'recipient_uid'  =>$ruid,
            'action_type_id' =>$type_id
        );
        //判断此通知信息是否存在
        $IS_EXIST=$this->isWriteNotification($suid, $ruid, $item_id, $type_flag);
        if($IS_EXIST!=null){
            $flag=D('Notifications')->where($where)->delete();
            return $flag;
        }
        
 
    }
    
}