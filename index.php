<?php
//将目前thinkphp生产模式变为开发模式
define('APP_DEBUG', TRUE);

//定义项目路径
define('APP_PATH', './Application/');

//css,js,images总路径
define('SOURCE_URL', "./Public/");

//定义上传文件位置
define('UPLOAD_URL',"./Uploads/");

//引入thinkphp核心程序
require './ThinkPHP/ThinkPHP.php';