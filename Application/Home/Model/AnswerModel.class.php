<?php
/**  
 * 
 +-----------------------------------------------------
 * 回答model 
 +-----------------------------------------------------
 * @desc 用来获取首页显示的回答信息，以及与回答有关的信息
 * @author Mingshan
 * 
 +-----------------------------------------------------
 */

namespace Home\Model;
use Think\Model;
class AnswerModel extends Model{
    
   
        
    
    /**
     * 获取登录用户关注的话题 的id
     * @return mixed|boolean|string|NULL|unknown|object
     */
    function getConcernTopicId(){
        //获取登录用户的id
        $user_id=session('uid');
        $map['uid']=$user_id;
        $map['status']=1;
        $topicinfo=M("user_linktopic")->where($map)->select();
        return $topicinfo;
    }
    
    
    /**
     * 获取登录用户关注的话题
     * @return unknown
     */
    function getConcernTopic(){
        //获取登录用户的id
        $user_id=session("uid");
        //$sql="select t.* from user_linktopic ul,topic t where ul.uid='".$user_id."' and ul.tid=t.id";
       //获取用户 关注的话题的数据
        $Model=M("user_linktopic");
        $tinfo=$Model
              ->alias("ul")
              ->field("t.*")
              ->join('__TOPIC__ t ON ul.tid = t.id')
              ->join('__USER__ u ON ul.uid=u.id')
              ->order('ul.concern_time desc')
              ->limit('6')
              ->select();
        
              
      //将查询到的关注的话题信息返回
      return $tinfo;
    }
    
    
    /**
     * 回答问题
     * 
     * @param $info 问题信息
     * @param $uid  用户id
     * @return $aid
     * 
     */
    
    function answerQuestion($info,$uid){
        $qid=$info['qid']; //获取问题id
        $a_content=$info['ac'];//获取回答内容
        $is_name=$info['in'];//获取是否匿名 1为匿名 0不匿名
        $ctime=time();
        $data=array(
            'question_id'   =>$qid,
            'answer_content' =>$a_content,
            'uid'           =>$uid,
            'isname'        =>$is_name,
            'create_time'   =>$ctime
           );
        $aid=D('Answer')->add($data);
       
        //问题表  回答数量+1
        D('Question')->where('id='.$qid)->setInc('answer_count');
        
        /**
         * 推送通知
         * 当前用户回答了xx用户的问题
         */
        //获取此文问题的发起者
        $q_info=D('Question')->getQuestionSimpleInfo($qid);
        $q_uid=$q_info[0]['uid'];
        $type_flag="aq";
        D('Notifications')->writeNotification($uid,$q_uid,$qid,$type_flag);
        
        
        /**
         * 推送feed
         * 推送类型  ：用户回答了问题，推送给关注此问题的用户  和关注此问题的话题的用户
         * 保证推送表中内容不重复，需要去重
         */
        
        //根据问题信息  获取关注此问题的用户
        $arr_uid=D('Question')->getPersonByFocusQuestion($qid);
        //将消息推送给   所有关注此问题的人
        foreach ($arr_uid as $key =>$val){
            $ruid=$val['uid'];
            $feeds_arr=array(
                'suid'    =>$uid,
                'ruid'    =>$ruid,
                'item_id' =>$aid,
                'type'    =>'a',
                'add_time'=>$ctime           
            );
            
            M('feeds')->add($feeds_arr);
        }
        
       /**将消息推送给关注此问题的话题的用户**/
       
       //根据问题信息 查询出 此问题的话题标签
       $arr_topic=D('Question')->getTopicByQuestion($qid);
       //循环 将信息都推送    这里可以对用户进行更复杂的判断来选择推送给谁
       foreach ($arr_topic as $key =>$val){
           $topic_id=$val['id'];
           //获取 此话题关注者
           $person_topic=D('Topic')->getPersonByFocusTopic($topic_id);
            
           //将消息推送给   所有关注此话题的人
           foreach ($person_topic as $key =>$val){
               $ruid=$val['uid'];
               $feeds_arr_t=array(
                   'suid'    =>$uid,
                   'ruid'    =>$ruid,
                   'item_id' =>$aid,
                   'type'    =>'a',
                   'add_time'=>$ctime
           
               );
                
               //因为一个人可以关注多个话题  为防止重复推送，需要进行筛选
               $IS_PUSH_arr=array(
                   'suid'    =>$uid,
                   'ruid'    =>$ruid,
                   'item_id' =>$aid,
                   'type'    =>'a'
               );
               $IS_PUSH=M('feeds')->where($IS_PUSH_arr)->select();
               //只有feeds没有此条信息 才进行推送
               if(empty($IS_PUSH)){
                   M('feeds')->add($feeds_arr_t);
               }
           }
       }
       
       //添加用户记录  此type 为  aq 回答了问题
       $type="aq";
       D('User')->addUserRecord($uid,$aid,$type);
       
       return $aid;
    }
  
   
    /**
     * 赞同回答
     * @param unknown $aid
     * @param unknown $uid
     * @return number
     */
    function upvoteAnswer($aid,$uid){
        $ctime=time();
        $type="za";//该条用户记录类型
        $type_flag="za";
        //获取该回答的发表用户id
        $a_info=$this->getSimpleAnswerInfo($aid);
        $a_uid=$a_info[0]['uid'];
        $is_exist=D("Feeds")->getUpvoteStatusByAid($aid, $uid);
        if($is_exist['vote_value']==null ){
           
            $data1=array(
                'answer_id' =>$aid,
                'vote_uid'  =>$uid,
                'add_time'  =>$ctime,
                'vote_value'=>1
            );
            M('answer_vote')->add($data1);
            D('Answer')->where('id='.$aid)->setInc('upvote_count');
            
           //添加用户记录  此type 为  aq           
           D('User')->addUserRecord($uid,$aid,$type);
           
           /**
            * 推送通知   类型为赞同了回答
            * @var integer $flag
            */

           D('Notifications')->writeNotification($uid,$a_uid,$aid,$type_flag);
          
           $flag=1;
        }else if($is_exist['vote_value']==1){
            $data2=array(
                'vote_id'   =>$is_exist['vote_id'],
                'answer_id' =>$aid,
                'vote_uid'  =>$uid,
                'add_time'  =>$ctime,
                'vote_value'=>0
            );
            M('answer_vote')->save($data2);
            D('Answer')->where('id='.$aid)->setDec('upvote_count');
            //取消赞 ，删除用户记录  记录类型为 aq
            D('User')->deleteUserRecord($uid,$aid,$type);
            
            /**
             * 取消推送通知
             * 
             */
           
            D('Notifications')->deleteNotifications($uid,$a_uid,$aid,$type_flag);
            
            $flag=0;
        }else if($is_exist['vote_value']==-1 || $is_exist['vote_value']==0){
            $data3=array(
                'vote_id'   =>$is_exist['vote_id'],
                'answer_id' =>$aid,
                'vote_uid'  =>$uid,
                'add_time'  =>$ctime,
                'vote_value'=>1 
            );
            M('answer_vote')->save($data3);
            D('Answer')->where('id='.$aid)->setInc('upvote_count');
            //添加用户记录  此type 为  aq
            D('User')->addUserRecord($uid,$aid,$type);
            
            /**
             * 推送通知   类型为赞同了回答
             * @var integer $flag
             */
             
            D('Notifications')->writeNotification($uid,$a_uid,$aid,$type_flag);
            
            $flag=1;
        } 
        return $flag;
       
    }
    
   
    /**
     * 获取用户的回答问题数量
     * @param unknown $uid
     * @return unknown
     */
    function getAnswerCountByUid($uid){
        $info=D('Answer')->where('uid='.$uid)->count();
        return  $info;
    }
    
    
    /**
     * 获取用户的回答
     * @param unknown $uid
     * @param unknown $position
     * @param unknown $item_per_page
     * @return unknown
     */
    function getAnswerInfoByUid($uid,$position,$item_per_page){
        $info=D('Answer')
                ->alias('a')
                //->field('u.username,u.tag,u.avatar_file,q.question_name,a.*,ao.vote_value,')
                ->field(array('u.username','u.tag','u.avatar_file','q.question_name','a.*','ao.vote_value','qf.focus_id'=>'q_focus_id','ar.report_id'=>'a_report_id'))
                ->join('__USER__ u ON u.id=a.uid')
                ->join('__QUESTION__ q ON q.id=a.question_id')
                ->join('__ANSWER_VOTE__ ao ON ao.answer_id=a.id')
                ->join('LEFT JOIN __ANSWER_VOTE__ av ON av.answer_id=a.id')
                ->join('LEFT JOIN __QUESTION_FOCUS__ qf ON qf.question_id=a.question_id and qf.uid='.$uid)
                ->join('LEFT JOIN __ANSWER_REPORT__ ar ON ar.answer_id=a.id and ar.uid='.$uid)
                ->where('a.uid='.$uid)
                ->order('a.create_time desc')
                ->limit($position,$item_per_page)
                ->select();
        return $info;
    }
    
    
    /**
     * 获取用户赞同的回答信息
     * @param unknown $uid
     * @param unknown $position
     * @param unknown $item_per_page
     * @return unknown
     */
    function  getUpvoteAnswerByUid($uid,$position,$item_per_page){
    	$info=D('answer_vote')
    	        ->alias('av')
    	        ->field(array('u.username','u.tag','u.avatar_file','q.question_name','a.*','av.vote_value','qf.focus_id'=>'q_focus_id','ar.report_id'=>'a_report_id'))
    	        ->join('__ANSWER__ a ON a.id=av.answer_id')
    	        ->join('__QUESTION__ q ON q.id=a.question_id')
    	        ->join('__USER__ u ON u.id=av.vote_uid')
    	        ->join('LEFT JOIN __QUESTION_FOCUS__ qf ON qf.question_id=a.question_id and qf.uid='.$uid)
    	        ->join('LEFT JOIN __ANSWER_REPORT__ ar ON ar.answer_id=a.id and ar.uid='.$uid)
    	        ->where('av.vote_uid='.$uid)
    	        ->where('av.vote_value=1')
    	        ->order('av.add_time desc')
    	        ->limit($position,$item_per_page)
    	        ->select();
    	return $info;
    }
    
    
    /**
     * 获取用户对回答的举报状态
     * @param unknown $uid
     * @param unknown $aid
     * @return mixed|boolean|string|NULL|unknown|object
     */
    function  getReportAnswerStatus($uid,$aid){
        $where=array(
           'uid'         =>$uid,
           'answer_id'   =>$aid
       );
        $is_exist=M('answer_report')->where($where)->select();
        return $is_exist;
    }
    

    /**
     * 对用户举报回答的处理
     * @param unknown $uid
     * @param unknown $aid
     * @return number|mixed|boolean|unknown|string
     */
    function reportAnswer($uid,$aid){
        $type_flag="ra";
        //判断举报信息是否存在
        $is_exist=$this->getReportAnswerStatus($uid, $aid);
         //获取回答的超简单信息
        $a_info=$this->getSimpleAnswerInfo($aid);
        $r_uid=$a_info[0]['uid'];
        if ($is_exist==null){
            $time=time();
            $data=array(
                'answer_id'    =>$aid,
                'uid'          =>$uid,
                'add_time'     =>$time
            );
            $info=M('answer_report')->data($data)->add();
            /**
             * 推送通知  举报回答
             */
            
            D('Notifications')->writeNotification($uid,$r_uid,$aid,$type_flag);
            
        }else{
            $info=0;
            
            /**
             * 取消推送通知  举报回答
             */
            D('Notifications')->deleteNotifications($uid,$r_uid,$aid,$type_flag);
            
        }
         
        return $info;
    }
    
    
    /**
     * 评论回答
     * @param unknown $uid
     * @param unknown $aid
     * @param unknown $content
     * @return mixed|boolean|unknown|string
     */
    function commentAnswer($uid,$aid,$content){
        $time=time();
        $data=array(
            'answer_id'  =>$aid,
            'suid'       =>$uid,
            'message'    =>$content,
            'add_time'   =>$time
        );
        
        $flag=M('answer_comment')->data($data)->add();
        //计数加1
        D('Answer')->where('id='.$aid)->setInc('comment_count');
        
        //获取超简单回答信息
        $a_info=$this->getSimpleAnswerInfo($aid);
        $r_uid=$a_info[0]['uid'];
        $type_flag="pa";
        D('Notifications')->writeNotification($uid,$r_uid,$aid,$type_flag);
        return $flag;
    }
    
    
    /**
     * 获取超简单回答信息
     * @param unknown $aid
     * @return mixed|boolean|string|NULL|unknown|object
     */
    function getSimpleAnswerInfo($aid){
        $info=D('Answer')->field('answer_content,id,uid')->where('id='.$aid)->select();
        return $info;
    }
    
    
    /**
     * 获取发现里的热门回答
     * @param unknown $uid
     * @return unknown
     */
    function getExploreAnswerInfo($uid,$position,$item_per_page){
        $info=D('Answer')
                    ->alias('a')
                    ->field(array('u.username','u.tag','u.avatar_file','q.question_name','a.*','ao.vote_value','qf.focus_id'=>'q_focus_id','ar.report_id'=>'a_report_id'))
                    ->join('__USER__ u ON u.id=a.uid')
                    ->join('__QUESTION__ q ON q.id=a.question_id')
                    ->join('__ANSWER_VOTE__ ao ON ao.answer_id=a.id')
                    ->join('LEFT JOIN __ANSWER_VOTE__ av ON av.answer_id=a.id')
                    ->join('LEFT JOIN __QUESTION_FOCUS__ qf ON qf.question_id=a.question_id and qf.uid='.$uid)
                    ->join('LEFT JOIN __ANSWER_REPORT__ ar ON ar.answer_id=a.id and ar.uid='.$uid)
                    ->order('a.upvote_count desc')
                    ->where('a.upvote_count >0')
                    ->select();
        return $info;
    }
    
    /**
     * 获取发现里的热门回答总数
     * @return unknown
     */
    function getExploreAnswerCount(){
        $count=D('Answer')->where('upvote_count >0')->count('id');
        return $count;
    }
    
    /**
     * 处理关于回答的搜索
     * @param unknown $uid
     * @param unknown $token
     * @param unknown $position
     * @param unknown $item_per_page
     * @return unknown
     */
    function  dealSearchAnswerInfo($uid,$token,$position,$item_per_page){
        $map['answer_content']=array('like','%'.$token.'%');
        $info=D('Answer')
                    ->alias('a')
                    ->field(array('u.username','u.tag','u.avatar_file','q.question_name','a.*','ao.vote_value','qf.focus_id'=>'q_focus_id','ar.report_id'=>'a_report_id'))
                    ->join('__USER__ u ON u.id=a.uid')
                    ->join('__QUESTION__ q ON q.id=a.question_id')
                    ->join('__ANSWER_VOTE__ ao ON ao.answer_id=a.id')
                    ->join('LEFT JOIN __ANSWER_VOTE__ av ON av.answer_id=a.id')
                    ->join('LEFT JOIN __QUESTION_FOCUS__ qf ON qf.question_id=a.question_id and qf.uid='.$uid)
                    ->join('LEFT JOIN __ANSWER_REPORT__ ar ON ar.answer_id=a.id and ar.uid='.$uid)
                    ->order('a.upvote_count desc')
                    ->where($map)
                    ->select();
        return $info;
    }
    
    
    /**
     * 获取搜索回答的数量
     * @param unknown $token
     * @return unknown
     */
    
    function  getSearchAnswerCount($token){
        $map['question_name']=array('like','%'.$token.'%');
        $info=D('Answer')
                    ->alias('a')
                    ->join('__QUESTION__ q ON q.id=a.question_id')
                    ->where($map)
                    ->count('a.id');
        return $info;
    }
    
}