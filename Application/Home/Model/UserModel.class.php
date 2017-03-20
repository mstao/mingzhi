<?php
namespace Home\Model;
use Think\Model;
/**
 * @desc 处理用户请求
 * @author mingshan
 *
 */
class UserModel extends Model{
    // 是否批处理验证
   /*  protected $patchValidate    =   true;
    protected $_validate        =   array(
        array('username','require','用户名不能为空'),
        array('password','require','密码不能为空'),
    );  // 自动验证定义
     */
    

    /**
     * 制作一个方法对用户名和密码进行校验
     * @param unknown $name
     * @param unknown $pw
     * @return boolean|unknown
     */
    function  CheckNamePw($name,$pw){
        
        //1.查询是否有这样的一条记录
        //$sql="select * from han_user where username=$name"
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
     * 注册
     * @param unknown $arr
     * @return mixed|boolean|unknown|string
     */
    function AddUser($arr){     
      $password=$arr['password'];
      $username=$arr['username'];
      $email=$arr['email'];
      $defaultavatar=C('PUBLIC_PATH').'Home/images/defaultavatar.jpg';
      $regtime=time();
      $data=array(
          'username' =>$username,
          'email'    =>$email,
          'password' =>md5($password), 
          'reg_time' =>$regtime,
          'avatar_file'=>$defaultavatar,
          'status'   =>1
      );
      
       $flag= $this->add($data);
       return $flag;
      
    }
    
 
    /**
     * 生成验证码
     */
    function  VerifyImg(){
        /* 配置验证码信息 */
        $config=array(
            'imageH'    =>  60,               // 验证码图片高度
            'imageW'    =>  320,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'fontSize'  =>  28,              // 验证码字体大小(px)
            'useImgBg'  =>  false,           // 使用背景图片
            'useCurve'  =>  false,            // 是否画混淆曲线
            'useNoise'  =>  true,            // 是否添加杂点
        );
    
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
    
    
    
    /**
     * 生成用户操作记录 
     * 这里的记录类型分为七种 
     * 
     * 1.赞同了回答     za
     * 2.回答了问题     aq
     * 3.关注了问题     gq
     * 4.关注了话题     gt
     * 5.收藏了问题     sq
     * 6.收藏了回答     sa
     * 7.发起了问题     fq
     * 
     * 
     * @param unknown $uid
     * @param unknown $item_id
     * @param unknown $type
     * @return mixed|boolean|unknown|string
     */
    function addUserRecord($uid,$item_id,$type){
        //获取当前时间
        $ctime=time();
        //获取用户操作信息
        $arr=array(
            'uid'     =>$uid,
            'item_id' =>$item_id,
            'type'    =>$type,
            'add_time'=>$ctime
        );
        //判断该记录是否存在 
        $IS_EXIST=M('user_record')->where($arr)->select();
        //如果不存在，说明该条记录未产生，可以入库
        if(empty($IS_EXIST)){
            $flag=M('user_record')->add($arr);
        }
        return $flag;
    }

    /**
     * 删除用户的行为记录
     * @param unknown $uid
     * @param unknown $item_id
     * @param unknown $type
     */
    function deleteUserRecord($uid,$item_id,$type){
        //获取用户操作信息
        $arr=array(
            'uid'     =>$uid,
            'item_id' =>$item_id,
            'type'    =>$type
        );
        M('user_record')->where($arr)->delete();
    }
    

    /**
     * 获取用户的行为记录的总数
     * @param unknown $uid
     * @return unknown
     */
    function getUserRecordCount($uid){
        $info=M('user_record')->where('uid='.$uid)->count();
        return $info;
    }
    
    /**
     * 读取用户的动态记录记录
     * 
     * 用于个人主页用户的最新动态展示
     * @param $uid,$position,$item_per_page
     * @return $all_user_record
     */
    function getUserRecord($uid,$position,$item_per_page){
        //根据用户记录表查询用户记录
        $record_arr=D('user_record')
                           ->where('uid='.$uid)
                           ->order('add_time desc')
                           ->limit($position,$item_per_page)
                           ->select();
        //设置一个大数组，用户存储用户的所有记录  (根据一次加载记录条数)
        $all_user_record=array();
        
        //循环获取用户记录的具体信息 
        foreach ($record_arr as $key => $val){
            //获取一条用户记录类型，然后根据用户记录类型来获取用户记录的具体信息
            
            //获取用户记录信息id
            $item_id=$val['item_id'];
            if($val['type']=='za'){       //如果类型为za  则代表 为用户 赞同了回答
               /*  //获取当前用户对回答的赞同状态
                $upvote_status=D('Feeds')->getUpvoteStatusByAid($item_id, $uid); */
                //获取 回答信息
                $a_info_all=D('Feeds')->getFeedAnswerInfo($item_id,$uid);
               /*  //将当前用户对回答的赞同状态最佳到信息数组中
                $a_info_all[0]['upvote_status']=$upvote_status; */
                //将整理后的信息添加到大数组中，并做一个标记za,以便在模板中判断解析
                $a_info_all[0]['action_time']=$val['add_time'];
                $arr_rd1['answer']=$a_info_all;
                $arr_rd1['record_flag']='za';
                $all_user_record[]= $arr_rd1;
                
            }else if($val['type']=='aq'){ //如果类型为aq  则代表 为用户 回答了问题
                /* //获取当前用户对回答的赞同状态
                $upvote_status=D('Feeds')->getUpvoteStatusByAid($item_id, $uid); */
                //获取 回答信息
                $a_info_all=D('Feeds')->getFeedAnswerInfo($item_id,$uid);
                /* //将当前用户对回答的赞同状态最佳到信息数组中
                $a_info_all[0]['upvote_status']=$upvote_status; */
                //将整理后的信息添加到大数组中，并做一个标记aq,以便在模板中判断解析
                $a_info_all[0]['action_time']=$val['add_time']; 
                $arr_rd2['answer']=$a_info_all;
                $arr_rd2['record_flag']='aq';
                $all_user_record[]= $arr_rd2;
            }else if($val['type']=='gq'){ //如果类型为gq  则代表 为用户 关注了问题
                
            }else if($val['type']=='gt'){ //如果类型为gt  则代表 为用户 关注了话题
                
            }else if($val['type']=='sq'){ //如果类型为sq  则代表 为用户 收藏了问题
                
            }else if($val['type']=='sa'){ //如果类型为sa  则代表 为用户 收藏了回答
                
                                
            }else if($val['type']=='fq'){ //如果类型为fq  则代表 为用户 发起了问题
                 //获取问题信息
                $q_info=D('Question')->getQuestionSimpleInfo($item_id);
                $q_info[0]['action_time']=$val['add_time'];                
                $arr_rd7['question']=$q_info;
                $arr_rd7['record_flag']='fq';
                $all_user_record[]=$arr_rd7;  
            }
        }
        
        return  $all_user_record;
    }
    
    
    
   
    /**
     * 获取用户信息 
     * @param unknown $uid
     * @return mixed|boolean|string|NULL|unknown|object
     */
    function  getPersonInfo($uid){
        
        $info=$this->where('id='.$uid)->select();
        return $info;
    }
    /**
     * 获取工作信息
     * @param unknown $uid
     * @return unknown
     */
    function getJob($uid){
        $info=$this->alias('u')
                 ->field('j.job_name')
                 ->join('__JOBS__ j ON j.id=u.job_id')
                 ->where('u.id='.$uid)
                 ->select();
        return $info;
    }
    
    /**
     * 获取所有工作列表
     * @return mixed|boolean|string|NULL|unknown|object
     */
    function getAllJob(){
        $info=M('Jobs')->select();
        return $info;
    }
    
    /**
     * 获取所有工作列表名称
     * @param unknown $id
     * @return unknown
     */
    function getJobNameById($id){
        $info=M('Jobs')->where('id='.$id)->select();
        $name=$info[0]['job_name'];
        return $name;
    }
    

    /**
     * 获取用户关注人的数量
     * @param unknown $uid
     * @return unknown
     */
    function getFollowCountByUser($uid){
         
        $info=M('user_follow')->where('fans_uid='.$uid)->count('follow_id');
        return $info;
    }
    
 
    /**
     * 获取用户关注的话题数量
     * @param unknown $uid
     * @return unknown
     */
    function  getFocusTopicCountByUser($uid){
        $info=M('topic_focus')->where('uid='.$uid)->count('focus_id');
        return $info;
    }

    /**
     * 获取用户关注的话题具体内容
     * @param unknown $uid
     * @return unknown
     */
    function getFocusTopicInfo($uid){
        $info=M('topic_focus')
                      ->alias('tf')
                      ->field('topic_name,id,focus_id')
                      ->where('tf.uid='.$uid)
                      ->join('__TOPIC__ t ON t.id=tf.topic_id')
                      ->order('tf.add_time desc')
                      ->limit(10)
                      ->select();
        return $info;
    }

    /**
     * 获取用户关注的全部话题
     * @param unknown $uid
     * @return unknown
     */
    function getAllFocusTopicInfo($uid){
        $info=M('topic_focus')
                        ->alias('tf')
                        ->where('tf.uid='.$uid)
                        ->join('__TOPIC__ t ON t.id=tf.topic_id')
                        ->order('tf.add_time desc')
                        ->select();
        return $info;
    }
    
    /**
     *
     * @param unknown $info
     * @return string|boolean上传头像
     */
    function  UploadMyAvatar($info){
        $uid=session('uid');
        $config = array(
            'maxSize'    =>    3145728,
            'rootPath'   =>    './Uploads/',  //文件保存根目录
            'savePath'   =>    'avatar/',   //文件上传保存的保存路径
            'saveName'   =>    array('uniqid',''),  //上传文件的保存规则，支持数组和字符串方式定义
            'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub'    =>    true,
            'subName'    =>    array('date','Ymd'), //子目录创建方式，采用数组或者字符串方式定义
            'autoSub'    =>    true,
        );
        $upload = new \Think\Upload($config);// 实例化上传类
    
        // 上传文件
        $msg  =   $upload->uploadOne($info['myavatar']);
    
        if(!$msg) {
            // 上传错误提示错误信息
            return 'x';
        }else{
    
            /*
             * 将图片路径保存到数据库
             */
            //拼装图片保存路径
            $path=C('UPLOADS_PATH').$msg['savepath'].$msg['savename'];
    
            $data['avatar_file']=$path;
            /* $sql="update han_user set avatar_file='".$path."' where id=".$uid;
            $flag=D()->execute($sql);  */
            $flag=$this->where('id='.$uid)->save($data);  
            $returnarr=array(
                'path' =>$path,
                'flag' =>$flag
            );
            return $returnarr;
    
        }
    }
    
    /**
     *  编辑器上传图片
     * @param unknown $info
     * @return path
     * 
     */
    function EditorUplaodImg_Model($info){
        $uid=session('uid');
        $config = array(
            'maxSize'    =>    3145728,
            'rootPath'   =>    './Uploads/',  //文件保存根目录
            'savePath'   =>    'images/',   //文件上传保存的保存路径
            'saveName'   =>    array('uniqid',''),  //上传文件的保存规则，支持数组和字符串方式定义
            'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub'    =>    true,
            'subName'    =>    array('date','Ymd'), //子目录创建方式，采用数组或者字符串方式定义
            'autoSub'    =>    true,
        );
        $upload = new \Think\Upload($config);// 实例化上传类
        
        // 上传文件
        $msg  =   $upload->uploadOne($info['myimage']);
        
        if(!$msg) {
            // 上传错误提示错误信息
            return 'x';
        }else{
       
            //拼装图片保存路径
            $path=C('UPLOADS_PATH').$msg['savepath'].$msg['savename'];
             
            return $path;
        
        }
    }
    

    /**
     * 更改用户名
     * @param unknown $name
     * @return boolean
     */
    function UpdateName_Model($name){
        $uid=session('uid');
        $data['username']=$name;
        /*  $data['id']=$uid;
          
        /*  $sql="update han_user set username='".$name."' where id=".$uid;
         $flag=D()->execute($sql); */
        
        $flag=$this->where('id='.$uid)->save($data);
        return $flag;
    }
    

    /**
     * 更改一句话介绍
     * @param unknown $tag
     * @return boolean
     */
    function UpdateIntroduction_Model($tag){
        $uid=session('uid');
        $data['tag']=$tag;
        $data['id']=$uid; 
       
       /*  $sql="update han_user set tag='".$tag."' where id=".$uid;
        $flag=D()->execute($sql);  */
        
         $flag=$this->where('id='.$uid)->save($data); 
        return $flag;
    }
    

   /**
    * 更改性别
    * @param unknown $sex
    * @return boolean
    */
   function UpdateSex_Model($sex){
       $uid=session('uid');
       $data['id']=$uid;
       $data['sex']=$sex;
       $flag=$this->save($data);
       return $flag;
   }
   

   /**
    * 更改个人描述信息
    * @param unknown $desc
    * @return boolean
    */
   function UpdateDesc_Model($desc){
       $uid=session('uid');
       $data['id']=$uid;
       $data['desc']=$desc;
       $flag=$this->save($data);
       return $flag;
   }
   

   /**
    * 更改个人职业
    * @param unknown $job
    * @return boolean
    */
   function UpdateJob_Model($job){
       $uid=session('uid');
       $data['id']=$uid;
       $data['job_id']=$job;
       $flag=$this->save($data);
       return $flag;
   }
   

   /**
    * 获取用户的赞同数量
    * @param unknown $uid
    * @return unknown
    */
   function getUpvoteCount($uid){
       $where=array(
           "vote_uid"   =>$uid,
           "vote_value" =>"1"
       );
       $info=M('answer_vote')->where($where)->count();
       return $info;
   }
   
   /**
    * 处理关于用户的搜索
    * 
    */
   
   function dealSearchUserInfo($token){
      
       $map['username']=array('like','%'.$token.'%');
       $info=D('User')
                 ->field('id,username,tag')
                 ->where($map)
                 ->limit(3)
                 ->select();
       return $info;
   }
   
   /**
    * 获取超简单的用户信息
    * @param unknown $uid
    * @return mixed|boolean|string|NULL|unknown|object
    */
   
   function getSimpleUserInfo($uid){
       $info=D('User')->field('username,id')->where('id='.$uid)->select();
       return $info;
   }
   /**
    * 处理详细搜索
    * @param unknown $uid
    * @param unknown $token
    * @return unknown
    */
   function dealSearchUserDetails($uid,$token,$position,$item_per_page){
       $map['username']=array('like','%'.$token.'%');
       $info=D('User')
                   ->alias('u')
                   ->field('id,username,tag,avatar_file,fans_count,question_count,answer_count,uf.follow_id')
                   ->join('LEFT JOIN __USER_FOLLOW__ uf ON uf.friend_uid=u.id and uf.fans_uid='.$uid)
                   ->where($map)
                   ->limit(3)
                   ->select();
       return $info;
   }
   
   /**
    * 获取搜索用户的数量
    * @param unknown $token
    */
   function getSearchUserCount($token){
       $map['username']=array('like','%'.$token.'%');
       $count=D('User')->where($map)->count('id');
   }
   
   /**
    * 
    * 有用户名获取用户id ,因为用户名唯一
    * @param unknown $username
    * @return unknown
    */
   function getUidByUserName($username){
       $where=array(
         'username'   =>$username  
       );
       $info=D('User')->field('id')->where($where)->select();
       $uid=$info[0]['id'];
       return $uid;
   }
}
?>