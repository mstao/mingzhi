<?php

/**
 +-----------------------------------------------------
 * 后台首页
 * @author mingshan
 *
 +-----------------------------------------------------
 */

namespace Admin\Controller;

use Common\Controller\AdminController;
class IndexController extends AdminController{
    protected   $auid;
    public function _initialize(){
        parent::_initialize();
        $this->auid=session('auid');

    }
    
    /**
     * 后台主页
     */
    public function index(){
        //获取管理员的信息
        $admin_info=$this->getAdminUserInfo($this->auid);
       
        //获取服务器信息
        $server_info=$this->getServerInfo();
        $this->assign('uinfo',$admin_info);
        $this->assign('server_info',$server_info);
      
        $this->display();
    }
    

    /**
     * 用户管理
     */
    public function userList(){
        //默认从1条开始取数据
        $position=0;
        $item_per_page=15;
        
        $userinfo=D('AdminUser')->getUserInfo($position,$item_per_page);
       
        $this->assign('userinfo',$userinfo);
        $this->display('Content/userManage');
    }

    
    /**
     * 获取管理员信息
     * @param unknown $auid
     * @return unknown
     */
    public function getAdminUserInfo($auid){
        $admin_info=D('AdminUser')->getAdminUserInfo($this->auid);
        $info['admin_name']=$admin_info[0]['username'];
        return $info;
    }
    
    /**
     * 获取服务器端的信息
     * @return string[]|unknown[]|NULL[]
     */
    public function getServerInfo(){
        
        date_default_timezone_set('PRC');
        //获取服务器端运行环境
        $server=new \Admin\Common\ServerInfo();
        
        $server_info=array(
            
            'M_SERVER_UNNAME'                =>php_uname(),    //获取服务器端运行环境
            'M_SERVER_SAPI_NAME'             =>php_sapi_name(),  //获取PHP运行方式 
            'M_SERVER_Current_User'          =>Get_Current_User(), //获取当前用户进程名
            'M_SERVER_PHP_VERSION'           =>PHP_VERSION,           //获取当前php版本
            'M_SERVER_ZEND_VERSION'          =>zend_version(),        //获取zend版本号
            'M_SERVER_INCLUDE_PATH'          =>DEFAULT_INCLUDE_PATH,   //获取php安装路径
            'M_SERVER_FILE'                  =>__FILE__,          //获取当前文件绝对路径
            'M_SERVER_HTTP_HOST'             =>$_SERVER['HTTP_HOST'],//获取Http请求中Host值
            'M_SERVER_IP'                    =>GetHostByName($_SERVER['SERVER_NAME']),//获取服务器IP
            'M_SERVER_SOFTWARE'              =>$_SERVER['SERVER_SOFTWARE'],//获取服务器解译引擎
            'M_SERVER_PROCESSOR_IDENTIFIER'  =>$_SERVER['PROCESSOR_IDENTIFIER'],//获取服务器CPU数量
            'M_SERVER_HTTP_ACCEPT_LANGUAGE'  =>$_SERVER['HTTP_ACCEPT_LANGUAGE'],//获取服务器语言
            'M_SERVER_NAME'                  =>$_SERVER['SERVER_NAME'],//获取服务器域名 
            'M_SERVER_TIME'                  =>$server->GetServerTime(), //获取服务器时间
            'M_SERVER_MYSQL_VERSION'         =>$server->GetMysqlVersion(), //mysql版本
            'M_SERVER_HTTP_VERSION'          =>$server->GetHttpVersion(),  //获取http版本
            'M_SERVER_GD_VERSION'            =>$server->GetGdVersion(),   //获取图形处理库版本
            'M_SERVER_Memory_Usage'          =>$server->GetMemoryUsage(), //获取系统内存占用
            'M_SERVER_SESSIONID'             =>session_id(),   //获取sessionid
         );
        return $server_info;
    }
    
    

}