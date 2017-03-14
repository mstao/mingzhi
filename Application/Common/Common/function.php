<?php
/**
 *   公共函数库
 */
header("Content-type:text/html;charset=utf-8");

/**
 * TODO 基础分页的相同代码封装，使前台的代码更少
 * @param $m 模型，引用传递
 * @param $count 总记录数
 * @param int $pagesize 每页查询条数
 * @return \Think\Page
 */
function getpage(&$m,$count,$pagesize){
   // $m1=clone $m;//浅复制一个模型
    //$count = $m->where($where)->count();//连惯操作后会对join等操作进行重置
  // $m=$m1;//为保持在为定的连惯操作，浅复制一个模型
    $p=new \Think\Page($count,$pagesize);
    $p->lastSuffix=false;//最后一页不显示为总数页
    $p->setConfig('header','<li class="rows_records">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
    $p->setConfig('prev','<');
    $p->setConfig('next','>');
    $p->setConfig('last','末页');
    $p->setConfig('first','首页');
    $p->setConfig('rollPage','8'); // 分页栏每页显示的页数
    $p->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
/*     $p->parameter=I('get.'); */
    $m->limit($p->firstRow,$p->listRows);
  
    return $p;
}


// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
function check_verify($code, $id = ''){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

/**
 * 
 * 计算时差
 * @param $oldtime
 * @return string
 */
function time2Units ($oldtime)
{   $nowtime=time();
    $time=$nowtime-$oldtime;
    
    $year   = floor($time / 60 / 60 / 24 / 365);
    $time  -= $year * 60 * 60 * 24 * 365;
    $month  = floor($time / 60 / 60 / 24 / 30);
    $time  -= $month * 60 * 60 * 24 * 30;
    $week   = floor($time / 60 / 60 / 24 / 7);
    $time  -= $week * 60 * 60 * 24 * 7;
    $day    = floor($time / 60 / 60 / 24);
    $time  -= $day * 60 * 60 * 24;
    $hour   = floor($time / 60 / 60);
    $time  -= $hour * 60 * 60;
    $minute = floor($time / 60);
    $time  -= $minute * 60;
    $second = $time;
    $elapse = '';

    $unitArr = array('年'  =>'year', '个月'=>'month',  '周'=>'week', '天'=>'day',
        '小时'=>'hour', '分钟'=>'minute', '秒'=>'second'
    );

    foreach ( $unitArr as $cn => $u )
    {
        if ( $$u > 0 )
        {
            $elapse = $$u . $cn;
            break;
        }
    }

    return $elapse.'前';
}


/** 
 * 字符串截取，支持中文和其他编码 
 * 
 * @static 
 * @access public 
 * @param string $str 需要转换的字符串 
 * @param string $start 开始位置 
 * @param string $length 截取长度 
 * @param string $charset 编码格式 
 * @param string $suffix 截断显示字符 
 * @return string 
 */
function msubstr($str, $start=0, $length=12, $charset="utf-8", $suffix=TRUE) {
        if(function_exists("mb_substr"))
            $slice = mb_substr($str, $start, $length, $charset);
        elseif(function_exists('iconv_substr')) {
            $slice = iconv_substr($str,$start,$length,$charset);
        }else{
            $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
            $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
            $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
            $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
            preg_match_all($re[$charset], $str, $match);
            $slice = join("",array_slice($match[0], $start, $length));
        }
        $str_len=strlen($str);
        if($str_len>$length){
           return  $slice.'...';
        }else {
           return $slice;
        }
       // return $suffix ? $slice.'...' : $slice;
}

/**
 * 获取访问用户ip
 */
function get_ip(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

/**
 * 获取纯文本
 * @param unknown $str
 * @return string
 */
function getTextUnits($str,$sublen="12")
{
    $str = trim($str); //清除字符串两边的空格
    $str = strip_tags($str,""); //利用php自带的函数清除html格式
    $str = preg_replace("/\t/","",$str); //使用正则表达式替换内容，如：空格，换行，并将替换为空。
    $str = preg_replace("/\r\n/","",$str); 
    $str = preg_replace("/\r/","",$str); 
    $str = preg_replace("/\n/","",$str); 
    $str = preg_replace("/ /","",$str);
    $str = preg_replace("/  /","",$str);  //匹配html中的空格
    return trim($str); //返回字符串
    
    
}

