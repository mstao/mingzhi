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
}