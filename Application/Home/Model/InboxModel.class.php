<?php
namespace  Home\Model;
use Think\Model;

/**
 * @desc 私信,用来私信相关的操作
 * @author mingshan
 *
 */
class  InboxModel extends Model{
    
    
    /**
     * 写私信
     * @param unknown $suid
     * @param unknown $ruid
     * @param unknown $content
     * @return mixed|boolean|unknown|string
     */
    function writeInbox($suid,$ruid,$content){
        $time=time();
        $data=array(
            'sender_uid'      =>$suid,
            'recipient_uid'   =>$ruid,
            'inbox_content'   =>$content,
            'add_time'        =>$time
        );
        $flag=D('Inbox')->data($data)->add();
        return $flag;
    }
    
    /**
     *  获取用户的私信
     * @param unknown $uid
     * @param unknown $position
     * @param unknown $item_per_page
     * @return unknown
     */
    function  getInbox($uid){
        $info=D('Inbox')
                  ->alias('i')
                  ->field(array('i.*','u.username' =>'r_username','u.id'=>'ruid','su.username'=>'s_username','su.id'=>'suid','su.avatar_file'))
                  ->join('__USER__ u ON u.id=i.recipient_uid')
                  ->join('LEFT JOIN __USER__ su ON SU.id=i.sender_uid')
                  ->order('i.add_time desc')
                  ->select();
        return $info;
    }
    
   /**
    * 删除私信
    * @param unknown $iid
    * @return mixed|boolean|unknown
    */
    function  delInbox($iid){
        $flag=D('Inbox')
                     ->where('id='.$iid)->delete();
        return $flag;
    }
    
    /**
     * 获取私信的数量
     * @param unknown $uid
     * @return unknown
     */
    function  getInboxCount($uid){
        $count=D('Inbox')->where('recipient_uid='.$uid)->count('id');
        return $count;
    }
}