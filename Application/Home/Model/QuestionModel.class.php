<?php

/**  
 * 问题model 
 * 
 * 用来发起提问，将提问信息添加到数据库
 * 获取提问的具体信息
 * 
 * @author Mingshan
 */

namespace Home\Model;
use Think\Model;
class QuestionModel extends Model{
    
    
    /**
     * 提问添加-弹出
     * @param unknown $arr
     * @return mixed|boolean|unknown|string
     */
    function publish_open($arr){
        $qn=$arr['qn'];
        $qd=$arr['qd'];
        $qt=$arr['qt'];
        $uid=session('uid');
        $createtime=time();
        
        //将问题数据存入数据库
        $arr_q=array(
                'uid'           =>$uid,
                'question_name' =>$qn,
                'question_desc' =>$qd,
                'create_time'   =>$createtime
        );
        $flag=$this->add($arr_q);
        
        //将取出话题最后一个,
        $qt=rtrim($qt,",");
        
        //将话题转存为数组
        $qtarr=explode(",", $qt);
               
        foreach ($qtarr as $key =>$val){
             //判断话题是否存在
             $IS_T=M('Topic')->getByTopic_name($val);
             if(!empty($IS_T)){
                 $topic_id=$IS_T['id'];
             }else{
                 $arr_t=array(
                     'topic_name' =>$val,
                     'topic_createtime' => $createtime
                 );
                 $topic_id=M('Topic')->add($arr_t);
                 
             }
             //话题关注量+1
             M('Topic')->where('id='.$topic_id)->setInc("topic_focus_count");
             //话题的问题量+1
             M('Topic')->where('id='.$topic_id)->setInc('question_count');
             //将问题 与  话题标签进行关联
             $arr_q_t=array(
                 'topic_id'  =>$topic_id,
                 'item_id'   =>$flag,
                 'uid'       =>$uid,
                 'add_time'  =>$createtime                 
             );
             
             M('topic_relation')->add($arr_q_t);
              
             //默认用户关注添加的话题
                          
             $arr_f=array(
                 'uid'        =>$uid,
                 'topic_id'   =>$topic_id
             );
               
             //判断用户是否关注了添加的话题
             $IS_FOCUS=M('topic_focus')->where($arr_f)->select();
             if(empty($IS_FOCUS)){
                 
                 $arr_focus=array(
                     'uid'      =>$uid,
                     'topic_id' =>$topic_id,
                     'add_time' =>$createtime
                 );
                 M('topic_focus')->add($arr_focus);
                 //用户关注话题量+1
                 D('User')->where('id='.$uid)->setInc("topic_focus_count");
             }
             
             //生成用户记录  
             //添加用户记录  用户发起问题   此type 为  fq
             $type='fq';
             D('User')->addUserRecord($uid,$flag,$type);
             
             /**
              * 此推送类型为 ：
              *    用户关注的话题 发表了新问题，
              *    需要将此消息推送给 此话题关注者
              *    将推送信息写入feeds表中
              */
              
             //获取 此话题关注者
             $person_topic=D('Topic')->getPersonByFocusTopic($topic_id);
             
             //将消息推送给   所有关注此话题的人
             foreach ($person_topic as $key =>$val){
                 $ruid=$val['uid'];
                 $feeds_arr=array(
                     'suid'    =>$uid,
                     'ruid'    =>$ruid,
                     'item_id' =>$flag,
                     'type'    =>'q',
                     'add_time'=>$createtime
                      
                 );
             
                //因为一个人可以关注多个话题  为防止重复推送，需要进行筛选
                $IS_PUSH_arr=array(
                    'suid'    =>$uid,
                    'ruid'    =>$ruid,
                    'item_id' =>$flag,
                    'type'    =>'q'
                );
                $IS_PUSH=M('feeds')->where($IS_PUSH_arr)->select();
                //只有feeds没有此条信息 才进行推送
                if(empty($IS_PUSH)){
                    M('feeds')->add($feeds_arr);
                }
             }
             
             
        }
        
        
        
        //默认用户关注问题
        $arr_q_focus=array(
            'uid'        =>$uid,
            'question_id'=>$flag,
            'add_time'   =>$createtime
        );
        M('question_focus')->add($arr_q_focus);
        //将用户发表问题数量+1
        D('User')->where('id='.$uid)->setInc('question_count');
        //将问题表的关注量加1
        D('Question')->where('id='.$flag)->setInc('focus_count');
        //将问题表中的浏览量加1
        D('Question')->where('id='.$flag)->setInc('q_view_count');
        
              
        
       return $flag;
      
       
      
    }
    
    
   
    /**
     * 获取问题详细信息  包含发布者信息  不包含回答
     * @param unknown $qid
     * @return unknown
     */
    function getQuestionInfo($qid){
       // $info=$this->where('id='.$qid)->select();
       $info=D('Question')
                ->alias('q')
                ->where('q.id='.$qid)
                ->join('__USER__ U ON u.id=q.uid')
                ->select();
        return $info;
    }
    
    
    /**
     * 获取问题简单信息，包含发布者简单信息  （feed流）
     * @param unknown $qid
     * @return unknown
     */
    function getQuestionSimpleInfo($qid){
        $info=D('Question')
                   ->alias('q')
                   ->field('q.id,q.uid,q.question_name,q.question_desc,q.create_time,u.username')
                   ->where('q.id='.$qid)
                   ->join('__USER__ U ON u.id=q.uid')
                   ->select();
        return $info;
    }
    

    /**
     * 获取问题 相关的 话题标签 
     * @param unknown $qid
     * @return unknown
     */
    function getTopicByQuestion($qid){
        $info=M('topic_relation')
                     ->alias('tr')
                     ->field('t.topic_name,t.topic_pic,t.id,tf.focus_id')
                     ->where('tr.item_id='.$qid)
                     ->join('__TOPIC__ t ON t.id=tr.topic_id')
                     ->join('LEFT JOIN __TOPIC_FOCUS__ tf ON tf.topic_id=t.id')
                     ->select();
        return $info;
            
    }
    
   
    /**
     * 获取问题关注者的头像
     * @param unknown $qid
     * @return unknown
     */
    function getAvatarByQuestin($qid){
        $info=M('question_focus')
                     ->alias('tf')
                     ->where('tf.question_id='.$qid)
                     ->join('__USER__ u ON u.id=tf.uid')
                     ->select();
        return $info;
    }
    
    
   
    /**
     * 根据问题信息查询出关注此问题的用户
     * @param unknown $qid
     * @return unknown
     */
    function getPersonByFocusQuestion($qid){
        $info=M('question_focus')
                    ->alias('qf')
                    ->field('uid')
                    ->where('question_id='.$qid)
                    ->select();
        return $info;
    }
    
   
    /**
     * 根据问题id获得回答信息
     * @param unknown $qid
     * @param unknown $position
     * @param unknown $item_per_page
     * @return unknown
     */
    function getAnswerInfoByQuestion($qid,$position,$item_per_page){
        $info=D('Question')
                       ->alias('q')
                       //->field('u.username,u.avatar_file,u.tag,a.*,q.*')
                       ->field(array('u.username','u.avatar_file','u.tag','a.*','ar.report_id','av.vote_id','av.vote_value'))
                       ->join('__ANSWER__ a ON a.question_id=q.id')
                       ->join('__USER__ u ON u.id=a.uid')
                       ->join('LEFT JOIN __ANSWER_REPORT__ ar ON ar.answer_id=a.id')
                       ->join('LEFT JOIN __ANSWER_VOTE__ av ON av.answer_id=a.id')
                       ->order('a.create_time desc')
                       ->where('q.id='.$qid)
                       ->limit($position,$item_per_page)
                       ->select();
        return $info;
    }
   
    /**
     * 根据问题id获取回答总数量
     * @param unknown $qid
     * @return unknown
     */
    function getAllAnswerCountByQuestion($qid){
        $info=D('Question')
                        ->alias('q')
                        ->join('__ANSWER__ a ON a.question_id=q.id')
                        ->where('q.id='.$qid)
                        ->count();
        return $info;
    }
    
    
    /**
     * 根据用户关注的话题获取该话题最新的问题
     * @param unknown $uid
     * @return unknown
     */
    function getNewQuestionByTopic($uid){
        $info=D('Topic_focus')
                     ->alias('tf')
                     ->field('q.question_name,q.create_time,t.topic_name,t.topic_pic,tf.topic_id,tr.item_id')
                     ->join('__TOPIC__ t ON t.id=tf.topic_id')
                     ->join('__TOPIC_RELATION__ tr ON tr.topic_id=tf.topic_id')
                     ->join('__QUESTION__ q ON q.id=tr.item_id')
                     ->where('tf.uid='.$uid)
                     ->order('q.create_time desc')
                     ->limit(10)
                     ->select();
        return $info;
    }
    
   
    /**
     * 根据用户id 来获取用户提出的问题 （用户主页）
     * @param unknown $uid
     * @param unknown $position
     * @param unknown $item_per_page
     * @return unknown
     */
    function getQuestionByUid($uid,$position,$item_per_page){
        $info=D('Question')
                    ->alias('q')
                    ->field('q.id,q.question_name,q.create_time')
                    ->where('uid='.$uid)
                    ->order('create_time desc')
                    ->limit($position,$item_per_page)
                    ->select();
        return $info;       
    }
  
    /**
     * 根据用户id获取问题总数
     * @param unknown $uid
     * @return unknown
     */
    function getQuestionCountByUid($uid){
        $info=D('Question')->where('uid='.$uid)->count();
        return  $info;
    }
   
  
   /**
    * 关注问题，取消关注
    * @param unknown $uid
    * @param unknown $qid
    * @return number[]|mixed[]|boolean[]|unknown[]|string[]
    */
   function focusQuestionOrNo($uid,$qid){
       //判断是否关注此问题
       
       $is_focus=$this->getFocusQuestionStatus($uid, $qid);
       //如果未关注问题,说明将要进行 关注问题操作
       if($is_focus==null){
           //将记录写如数据库
           $time=time();
           $data=array(
               'uid'  =>$uid,
               'question_id' =>$qid,
               'add_time'    =>$time
               
           );
           $flag=M('question_focus')->data($data)->add();
           $arr=array(
               'flag'=>$flag,
               'status' =>1
           );
           
       }else{
         //既然关注了问题，那么接下来就是取消关注
           $where1=array(
               'uid'        =>$uid,
               'question_id'=>$qid
           );
           $flag=M('question_focus')->where($where1)->delete();
           $arr=array(
               'flag'=>$flag,
               'status' =>0
           );
       }
       
       return $arr;
       
   }
   
   /**
    * 判断用户对问题的关注状态
    * 
    * @param unknown $uid
    * @param unknown $qid
    * @return mixed|boolean|string|NULL|unknown|object
    */
   function getFocusQuestionStatus($uid,$qid){
       $where1=array(
           'uid'        =>$uid,
           'question_id'=>$qid
       );
       $is_focus=M('question_focus')->where($where1)->select();
       return $is_focus;
   }
   
   
   /**
    * 根据回答id获取问题id
    * @param unknown $aid
    * @return unknown
    */
   function getQuestionIdByAid($aid){
       $info=M('Answer')->where('id='.$aid)->select();
       $qid=$info[0]['question_id'];
       return $qid;
   }
   
   
   /**
    * 举报问题
    * @param unknown $uid
    * @param unknown $qid
    * @return number|mixed|boolean|unknown|string
    */
   
   function reportQuestion($uid,$qid){
       //判断举报信息是否存在
       $is_exist=$this->getReportQuestionStatus($uid,$qid);
       $type_flag="rq";
       //获取问题的超简单信息
       $q_info=$this->getQuestionSimpleInfo($qid);
       $r_uid=$q_info[0][uid];
       if ($is_exist==null){
           $time=time();
           $data=array(
                'question_id'  =>$qid,
                'uid'          =>$uid,
                'add_time'     =>$time
           );
           $info=M('question_report')->data($data)->add();
           
           /**
            * 推送通知
            */
           D('Notifications')->writeNotification($uid,$r_uid,$qid,$type_flag);
       }else{
           $info=0;
       }
       
       return $info;
   }
   
   
   /**
    * 获取问题的举报状态
    * @data 2017年3月1日 下午1:39:37
    * @author mingshan
    * @param variable
    */
   function getReportQuestionStatus($uid,$qid){
       $where=array(
           'uid'         =>$uid,
           'question_id' =>$qid
       );
       $is_exist=M('question_report')->where($where)->select();
       return $is_exist;
   }
   
   /**
    * 处理关于问题的搜索
    * @param token
    */
   
   function dealSearchQuestionInfo($token){
       $map['question_name']=array('like','%'.$token.'%');
       $info=D('Question')
                    ->field('id,question_name,answer_count')
                    ->where($map)
                    ->order('answer_count desc')
                    ->limit(3)
                    ->select();
       return $info;
   }
   
   /**
    * 处理关于问题搜索的详细信息
    * @param unknown $uid
    * @param unknown $token
    * @param unknown $position
    * @param unknown $item_per_page
    * @return unknown
    */
   function dealsearchquestiondetails($uid,$token,$position,$item_per_page){
       $map['question_name']=array('like','%'.$token.'%');
       $info=D('Question')
                    ->alias('q')
                    ->field('q.id,q.question_name,q.create_time,q.answer_count,q.focus_count,q.uid,u.username,qf.focus_id,qr.report_id')
                    ->join('LEFT JOIN __QUESTION_FOCUS__ qf ON qf.question_id=q.id and qf.uid='.$uid)
                    ->join('LEFT JOIN __QUESTION_REPORT__ qr ON qr.question_id=q.id and qr.uid='.$uid)
                    ->join('LEFT JOIN __USER__ u ON u.id=q.uid')
                    ->where($map)
                    ->limit($position,$item_per_page)
                    ->select();
       return $info;
   }
   
   
   /**
    * 获取搜索的问题的数量
    * @param unknown $token
    * @return unknown
    */
   function getSearchQuestionCount($token){
        $map['question_name']=array('like','%'.$token.'%');
        $count=D('Question')->where($map)->count('id');
        return $count;
   }
   
   
   /**
    * 获取超简单问题信息
    * @param unknown $qid
    * @return mixed|boolean|string|NULL|unknown|object
    */
   function getSimpleQuestionInfo($qid){
       $info=D('Question')->field('question_name,id')->where('id='.$qid)->select();
       return $info;
   }
   
   
   /**
    * 获取发现里的推荐问题
    * @return unknown
    */
   function getExploreQuestionInfo(){
       $info=D('Question')->field("question_name,id")->order("answer_count desc")->limit(5)->select();
       return $info;
   }
}