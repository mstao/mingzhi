<?php
/**
 * @desc 收藏夹  处理
 * @author mingshan
 */
namespace Home\Model;
use Think\Model;

class CollectionModel extends Model{
    
    
    /**
     * 获取用户的创建的收藏夹信息
     * @param unknown $aid
     * @param unknown $uid
     * @return unknown
     */
    function  getCollectionInfo($aid,$uid){
        $info=D('Collection')
                    ->alias('c')
                    ->field(array('c.*','ac.collect_id'=>'acid'))
                    ->join('LEFT JOIN __ANSWER_COLLECT__ ac ON ac.collection_id=c.id and ac.answer_id='.$aid)
                    ->where('c.uid='.$uid)
                    ->select();
        return $info;
    }
    
  
    /**
     * 将信息存到回答收藏中
     * @param unknown $cid
     * @param unknown $uid
     * @param unknown $aid
     * @return number
     */
    function addAnswerInfoToCollection($cid,$uid,$aid){
       
       //判断记录是否存在
       $is_exist=$this->isAddAnswerInfoToCollection($cid, $uid, $aid);
       if($is_exist==null){
        $time=time();
        $data=array(
            'uid'           =>$uid,
            'answer_id'     =>$aid,
            'collection_id' =>$cid,
            'add_time'      =>$time
        );
        
        
        M('answer_collect')->data($data)->add();
        //收藏夹记录+1
        D('Collection')->where('id='.$cid)->setInc('collection_num');
        $flag=1;
       }else{
            $where=array(
                 'uid'           =>$uid,
                 'answer_id'     =>$aid,
                 'collection_id' =>$cid
            );
            M('answer_collect')->where($where)->delete();
            //收藏夹记录-1
            D('Collection')->where('id='.$cid)->setDec('collection_num');
            
            $flag=0;
       }
        
       return $flag;
    }
    
  
    /**
     * 判断回答是否已收藏
     * @param unknown $cid
     * @param unknown $uid
     * @param unknown $aid
     * @return mixed|boolean|string|NULL|unknown|object
     */
    function isAddAnswerInfoToCollection($cid,$uid,$aid){
        $where=array(
            'uid'             =>$uid,
            'answer_id'       =>$aid,
            'collection_id'   =>$cid
        );
        $is_exist=M('answer_collect')->where($where)->select();
        return $is_exist;
    }
    

    /**
     * 添加收藏夹
     * @param unknown $uid
     * @param unknown $collection_name
     * @param unknown $collection_desc
     * @return number
     */
    function addCollectionInfo($uid,$collection_name,$collection_desc){
        
        //判断收藏夹是否存在
        
        $is_exist=$this->isAddCollection($collection_name);
        if($is_exist==null){
        
            $time=time();
            $data=array(
                'uid'              =>$uid,
                'collection_name'  =>$collection_name,
                'collection_desc'  =>$collection_desc,
                'add_time'         =>$time
            );
            D('Collection')->data($data)->add();
            $flag=1;
        }else{
            $flag=0;
        }
        return $flag;
    }
    

    /**
     * 判断收藏夹是否存在
     * @param unknown $collection_name
     * @return mixed|boolean|string|NULL|unknown|object
     */
    function isAddCollection($collection_name){
        $where=array(
            'collection_name' =>$collection_name
        );
        $is_exist=M('Collection')->where($where)->select();
        return $is_exist;
    }
    
    /**
     * 获取用户的收藏夹数量
     * @param unknown $uid
     * @return unknown
     */
    function getCollectionCount($uid){
        $info=D('Collection')->where('uid='.$uid)->count();
        return $info;
    }
    
    /**
     * 获取用户的收藏夹信息 
     * @param unknown $uid
     */
    function getCollectionInfoByUid($uid){
        $info=D('Collection')
                        ->where('uid='.$uid)
                        ->select();
        return $info;
    }
}
