<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo (C("WEB_NAME")); ?>-<?php echo (C("WEB_TITLE")); ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="keywords" content="<?php echo (C("WEB_KEYWORDS")); ?>" />
<meta name="description" content="<?php echo (C("WEB_DESC")); ?>" />

        <script type="text/javascript">
        var MODULE="/mytest/mingzhi/index.php/Home";
        </script>
        <link rel="stylesheet" type="text/css" href="/mytest/mingzhi/Public/Home/css/login.css" />
		<script type="text/javascript" src="/mytest/mingzhi/Public/static/js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="/mytest/mingzhi/Public/Home/js/form.js"></script>
        <script type="text/javascript" src="/mytest/mingzhi/Public/static/layer-2.4/layer.js"></script>
	</head>
	<body>
		<!--canvas-->
		<!-- <canvas id="Mycanvas">该浏览器不支持canvas</canvas> -->
		
		
		<!--表单内容-->
		<div class="container">
		<div class="webtitle">
			<h1><?php echo (C("WEB_NAME")); ?></h1><br>
			<span><?php echo (C("WEB_NAME_DESC")); ?></span>
		</div>
		<div class="header">
        <div class="switch" id="switch"><a class="switch_btn_focus" id="switch_qlogin" href="javascript:void(0);" tabindex="7">快速登录</a>
			<a class="switch_btn" id="switch_login" href="javascript:void(0);" tabindex="8">快速注册</a><div class="switch_bottom" id="switch_bottom" style="position: absolute; width: 64px; left: 0px;"></div>
        </div>
        </div>
		<!--登录开始-->
		<div class="web_qr_login" id="web_qr_login" style="display: block; ">
	    <form action="/mytest/mingzhi/index.php/Home/User/Login" name="loginForm" class="formBlock" method="post">		
		<div>
			
			<input type="text" name="username"  id="loginusername"  placeholder="用户名或邮箱"  autocomplete="off" />
		    <span class="err_username_login err_info"></span>
		</div>
		<div>
			
			<input type="password" name="password"  id="loginpassword" placeholder="密码" autocomplete="off"/>
		    <span class="err_password_login err_info"></span>
		</div>
		<div>
			<input type="text" name="verify" id="loginverify" placeholder="验证码" autocomplete="off"/>
			<img src="/mytest/mingzhi/index.php/Home/User/Verify"  title="点击刷新" onClick="this.src=this.src+'?'+Math.random();"/>	
			<span class="err_verify_login err_info"></span>
		</div>
		<div class="btnBlock">
			<input type="submit" class="btn" value="登录"/>
		</div>
		<div class="errorBlock">
			<p id="loginErr"></p>
	    </div>
		
	</form>
    </div>
    <!--登录结束-->
    
    <!--注册开始-->
    <div class="qlogin" id="qlogin" style="display: none; ">
        <form   action="/mytest/mingzhi/index.php/Home/User/Login" name="registerForm" class="formBlock" method="post">
		<div>			
			<input type="text" name="username"  id="zhuusername" placeholder="用户名" autocomplete="off"/>	
			<span class="err_username  err_info"></span>	
		</div>
		<div>			
			<input type="password" name="password"  id="zhupassword" placeholder="密码" autocomplete="off"/>		
			<span class="err_password err_info"></span>	    
		</div>
		
		<div>
			<input type="text" name="email" id="zhuemail" value="" placeholder="邮箱" autocomplete="off"/>
			<span class="err_email err_info"></span>
					
		</div>
		<div>
		    <input type="text" name="verify" id="regverify" placeholder="验证码" autocomplete="off"/>
		    <img src="/mytest/mingzhi/index.php/Home/User/Verify"  title="点击刷新" onClick="this.src=this.src+'?'+Math.random();"/>	
		    <span class="err_verify_r err_info"></span>
		</div>
		<div class="btnBlock">
			<input type="submit"  class="btn" value="注册"/>
		</div>
		<div class="errorBlock">
			<p id="regErr"></p>
	    </div>
	    </form>
    </div>
    <!--注册结束-->
    <!--Copyright-->
    <div class="copyright">
		<span><?php echo (C("WEB_COPYRIGHT")); ?></span>	
	</div>
</div>
	</body>
</html>