<?php

/**  
 * 网站主页 控制器
 */

namespace Home\Controller;
use Common\Controller\HomeController;
class IndexController extends HomeController {
    public  $uid;
    public function _initialize(){
        parent::_initialize();
        $this->uid=session('uid');

    }
    

    public function index(){  
       
       //获取最新首页feed流
       
       
       //默认从第一条开始取
       $position=0;
       //设置一次请求显示的数目
       $item_per_page = 6;
       //取得传过来的参数
       $page_number = filter_var($_POST["p"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
       //获得当前记录的位置
       $position = ($page_number * $item_per_page);
       /*  echo "<pre>";
       var_dump($feed_arr);
       echo "</pre>";  */   
       
       //获取用户关注的话题信息
       $topicinfo=D('User')->getFocusTopicInfo($this->uid);
       //获取热门话题
       $hottopic=D('Topic')->getHotTopic($this->uid);  
      /*  echo "<pre>";
        var_dump($hottopic);
       echo "</pre>";    */
       //获取登录用户feed流总数
       $feedcount=D('Feeds')->getFeedsCountByUid($this->uid);
       //根据feed总量计算出Ajax最多加载次数  进1取整
       $ajax_max_load_page=ceil($feedcount/$item_per_page);
       //获取默认的feed流
       $feed_arr=D('Feeds')->getNewFeeds($this->uid,$position,$item_per_page);
       /*  echo "<pre>";
       var_dump($feed_arr);
       echo "</pre>";   */
       $this->assign("focus_topic",$topicinfo);
       $this->assign("hottopic",$hottopic);
       $this->assign("feedallpage", $ajax_max_load_page);
       $this->assign("feeds_info",$feed_arr);
       if(IS_AJAX){
           //模板渲染
           echo $this->fetch('Index/Feeds_Index_Ajax');
       }else{
           
           //非AJAX请求正常显示 ，默认从第一条开始取
           
           $this->display();
       }
           
       
       
      
    }    

    //弹窗   问题发起
    public function openModal(){
        if(!empty($_POST)){
           $index=new \Home\Model\QuestionModel();
           $flag=$index->publish_open($_POST);
           if($flag>0){  
               $data['status']  = 1;
               $data['content'] = $flag;
               $this->ajaxReturn($data);
               exit();
           }else if($flag=='0'){
               $data['status']  = 2;
               $data['content'] = '发起问题失败，请仔细核对信息';
               $this->ajaxReturn($data); 
               exit();
           }
        }else{
          $this->display();  
        }
        
    }
    //首页  回答 点赞
    public function upvote(){
        if(IS_AJAX){
            $aid=$_POST['aid'];
                     
            $flag=D('Answer')->upvoteAnswer($aid,$this->uid);
            $data['status']  = 1;
            $data['content'] = $flag;
            $this->ajaxReturn($data);
            exit();
        }
      
        
    }
    //首页  回答 不赞同
    public function downvote(){
        
    }
    
    //加载话题信息 
    public function loadTopicInfo(){
    	IF(IS_AJAX){
    	    $tid=$_POST['tid'];
    	    $arr=D('Topic')->getTopicInfoByTid($tid);
    	    if(!empty($arr)){
    	        $data['status']  = 1;
    	        $data['content'] = $arr;
    	        $this->ajaxReturn($data);
    	        exit();
    	    }else{
    	        $data['status']  = 1;
    	        $data['content'] = "出错了哦";
    	        $this->ajaxReturn($data);
    	        exit();
    	    } 
    	}
       
    }
    // 关注 取消关注 话题 
    public function focusOrNoTopic(){
        if(IS_AJAX){
            $tid=$_POST['tid'];
            $flag=D('Topic')->dealFocusTopic($this->uid,$tid);
            $data['status']  = 1;
            $data['content'] = $flag;
            $this->ajaxReturn($data);
            exit();
        }
    	
    	
    }
    //首页 关注问题
    public function focusOrNoQuestion(){
        if(IS_AJAX){
            $qid=$_POST['qid'];
            $flag=D('Question')->focusQuestionOrNo($this->uid,$qid);
            if($flag>0){
                $data['status']  = 1;
                $data['content'] = $flag;
                $this->ajaxReturn($data);
                exit();
            }else{
                $data['status']  = 0;
                $data['content'] = '有问题了哦';
                $this->ajaxReturn($data);
                exit();
            }    
        }
        
    	
    }
    //首页   加载回答评论ajax
    public function commentAjax(){
        if(IS_AJAX){
        
        
        //设置一次请求显示的数目
        $item_per_page = 10;
        
        //获取回答aid信息
        $aid=$_POST['aid'];
        //取得传过来的页码参数
        $page_number = filter_var($_POST["p"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
        //获得当前记录的位置
        $position = ($page_number * $item_per_page);
      
        //获取记录总数
        $comment_count=D('AnswerComment')->getAnswerCommentCount($aid);
        //根据总量计算出Ajax最多加载次数  进1取整
        $ajax_max_load_page=ceil($comment_count/$item_per_page);
        //根据偏移量获取评论信息
        $comment_info=D('AnswerComment')->getAnswerCommentInfo($aid,$position,$item_per_page);
     

        //$this->assign("comment_all_page", $ajax_max_load_page);
        $this->assign("comment_info",$comment_info);
        
        //评论模板渲染
        echo $this->fetch('Index:Answer_Comment_Ajax');

        }
         
         
    }
    //首页  回答 添加评论
    public function commentAnswer(){
        
        if(IS_AJAX){
            $aid=$_POST['aid'];
            $content=$_POST['content'];
            $flag=D('Answer')->commentAnswer($this->uid,$aid,$content);
            if($flag>0){
                $data['status']  = 1;
                $data['content'] = $flag;
                $this->ajaxReturn($data);
                exit();
            }else{
                $data['status']  = 0;
                $data['content'] = '评论出现问题';
                $this->ajaxReturn($data);
                exit();
            }     
        }
       
    }
    
    //首页 回复评论
    public function replayComment(){
        if (IS_AJAX){
            $ruid=$_POST['ruid'];
            $aid=$_POST['aid'];
            $comment_id=$_POST['comment_id'];
            $content=$_POST['content'];
            $flag=D('AnswerComment')->replayComment($aid,$this->uid,$ruid,$comment_id,$content);
            if($flag>0){
                $data['status']  = 1;
                $data['content'] = $flag;
                $this->ajaxReturn($data);
                exit();
            }else{
                $data['status']  = 0;
                $data['content'] = '回复出现问题';
                $this->ajaxReturn($data);
                exit();
            }     
        }
       
    }
    
    //举报评论 
    public function reportComment(){
        if(IS_AJAX){
            $comment_id=$_POST['comment_id'];
            $info=D('AnswerComment')->reportComment($this->uid,$comment_id);
            $data['status']  = 1;
            $data['content'] = $info;
            $this->ajaxReturn($data);
            exit();
        }
        
    }
    
    //点赞与取消赞 评论
    public function upvoteComment(){
        if(IS_AJAX){
            $comment_id=$_POST['comment_id'];
            $info=D('AnswerComment')->dealCommentVote($this->uid,$comment_id);
            $data['status']  = 1;
            $data['content'] = $info;
            $this->ajaxReturn($data);
            exit();
        }
       
    }
    
    
    //首页  回答收藏
    public function collect(){
        
    }
    
    //首页  回答举报
    public function reportAnswer(){
        if (IS_AJAX){
            $aid=$_POST['aid'];
            $info=D('Answer')->reportAnswer($this->uid,$aid);
            $data['status']  = 1;
            $data['content'] = $info;
            $this->ajaxReturn($data);
            exit();
        }
        
    }
    
    //问题举报
    public function reportQuestion(){
        if (IS_AJAX){
            $qid=$_POST['qid'];
            $info=D('Question')->reportQuestion($this->uid,$qid);
            $data['status']  = 1;
            $data['content'] = $info;
            $this->ajaxReturn($data);
            exit();
        }
       
    }
    
    //加载收藏夹内容
    public function getCollectionInfo(){
        if(IS_AJAX){
            $aid=$_POST['aid'];
            $info=D('Collection')->getCollectionInfo($aid,$this->uid);
            $data['status']  = 1;
            $data['content'] = $info;
            $this->ajaxReturn($data);
            exit();
        }
        
     
    }
    
    //添加收藏夹
    public function addCollectionInfo(){
        
        if(IS_AJAX){
            $collection_name=$_POST['cn'];
            $collection_desc=$_POST['cd'];
            $flag=D('Collection')->addCollectionInfo($this->uid,$collection_name,$collection_desc);
            $data['status']  = 1;
            $data['content'] = $flag;
            $this->ajaxReturn($data);
            exit();
        }
       
    }
    //将回答信息收藏
    public function addAnswerCollect(){
        if(IS_AJAX){
            $aid=$_POST['aid'];
            $cid=$_POST['cid'];
            $flag=D('Collection')->addAnswerInfoToCollection($cid,$this->uid,$aid);
            $data['status']  = 1;
            $data['content'] = $flag;
            $this->ajaxReturn($data);
            exit();
        }
        
    }
    
    //退出系统
    public function exitsys(){
        unset ($_SESSION['uid']);
        $this->redirect("User/Login");
    }
}