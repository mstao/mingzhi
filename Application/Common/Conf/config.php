<?php
/*
 * 主配置文件
 */
return array(
	//'配置项'=>'配置值'
	
    
    'LOAD_EXT_CONFIG'       =>   'db,webinfo,webdefault',         //加载网站设置文件
    //**************修改定界符************
    'TMPL_L_DELIM'          =>    '<{',
    'TMPL_R_DELIM'          =>    '}>',
    //**************设置伪静态************
    'URL_HTML_SUFFIX'       =>   '',              //默认后缀
    'SHOW_PAGE_TRACE'       =>   false,                //开启页面trace
    //******定义常用css,js,images路径*******
    'TMPL_PARSE_STRING'     =>   array(                //定义常用路径
           __HOME_CSS__     =>   __ROOT__.'/Public/Home/css',
           __HOME_JS__      =>   __ROOT__.'/Public/Home/js',
           __HOME_IMAGES__  =>   __ROOT__.'/Public/Home/images',
           __ADMIN_CSS__    =>   __ROOT__.'/Public/Admin/css',
           __ADMIN_JS__     =>   __ROOT__.'/Public/Admin/js',
           __ADMIN_IMAGES__ =>   __ROOT__.'/Public/Admin/images',
           __ADMIN_FONT__   =>   __ROOT__.'/Public/Admin/font',
    ),
   
    //*****************定义上传路径 ,公共资源路径************
    'UPLOADS_PATH'          =>	__ROOT__.'/Uploads/',
    'PUBLIC_PATH'           =>	__ROOT__.'/Public/',
    //*****************URL**************
    'URL_MODEL'             =>  2,                      // 为了兼容性更好而设置成1 如果确认服务器开启了mod_rewrite 请设置为 2
    'URL_CASE_INSENSITIVE'  =>  true,                   //url 不区分大小写  为TRUE不区分大小写
    //****************SESSION设置*****************
   'SESSION_OPTIONS'        =>  array(
        'name'              =>  'MZSESSION',                 //设置session名
        'expire'            =>  24*3600*7,                   //SESSION保存7天
        'use_trans_sid'     =>  1,                            //跨页传递
       'use_only_cookies'   =>  0,                            //是否只开启基于cookies的session的会话方式
    ),
    
    
);