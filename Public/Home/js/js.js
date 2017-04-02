

$(function () {
	/*返回顶部*/
	$("#back-to-top").hide();
	
	$(window).scroll(function(){
		if ($(window).scrollTop()>200){
		$("#back-to-top").fadeIn(500);
		}
		else
		{
		$("#back-to-top").fadeOut(500);
		}
	});
	//当点击跳转链接后，回到页面顶部位置
	$("#back-to-top").click(function(){
	$('body,html').animate({scrollTop:0},200);
		return false;
	});
	
	
	/***S  header  js***/
	
/*	//通知框弹出 隐藏
	$(".notifications").click(function(){
		 
	});*/
	
	//问题描述  placeholder 
	$(".openModal-question-desc").text(default_question_desc);
	$(".openModal-question-desc").focus(function(){
		if($(".openModal-question-desc").text()==default_question_desc){
			$(".openModal-question-desc").text("");
		}		
	});
	$(".openModal-question-desc").blur(function(){
		if($(".openModal-question-desc").text()==""){
			$(".openModal-question-desc").text(default_question_desc);
		}	
	});
	
	//提问 弹窗 关闭
	
	
	$('.publish_btn_open').bind('click',function(){

		$('.modalDialog').show();
		$('html').addClass('overHiden');
	});
	$('.question-close').bind('click',function(){
		$('.modalDialog').hide();
		$('html').removeClass('overHiden');
	});
	//搜索框颜色变化
	$('.searchinput').bind('focus',function(){
		$(this).next().css('backgroundColor','#ffffff');
	}).bind('blur',function(){
		$(this).next().css('backgroundColor','#f4f4f4');
	});
	
	
	/** 点击 消息按钮 显示**/
	function stopPropagation(e) {
        var ev = e || window.event;
        if (ev.stopPropagation) {
            ev.stopPropagation();
        }
        else if (window.event) {
            window.event.cancelBubble = true;//兼容IE
        }
    }
	
	/*$('.notifications').click(function (e) {
		$(".notificationsbox").css({"margin-top":"-10px"});
		 $(".notificationsbox").slowMove(
				{"speed":15,"tween":"Bounce","ease":"easeOut"},
				{"opacity":1,"margin-top":"0px"}
		 );
		 $(".notificationsbox").toggle();
        stopPropagation(e);
    });*/
    $(document).bind('click', function () {
        $(".notificationsbox").hide();
        $(".search-container").fadeOut('normal');
    });
	$('.notificationsbox, .searchinput').click(function (e) {
        stopPropagation(e);
    });

	
	
	
	
	/***E header js***/
	
	/***禁止加载分享弹窗***/
	$('.mark,.share-dialog').hide();
	
		
	/***移动我的头像显示上传图片隐藏***/
	$('.myhonetouxiang ,.myrightimage').bind('mouseover',function(){
		$('.mytouxiang_upload_div').show();
	}).bind('mouseout',function(){
		$('.mytouxiang_upload_div').hide();
	});
	
	/*****在编辑我的资料页面中  显示隐藏 上传头像******/
	$('.checkmyavatar').bind('change',function(){
		$('.checkimage-dialog').show();
		$('.mark').show();
		change();
	});
	
	//收藏夹背景颜色改变
	
	$(document).on('mouseover','.collection-info',function(){
		$(this).css('backgroundColor','#EEEEEE');
	}).on('mouseout','.collection-info',function(){
		$(this).css('backgroundColor','#ffffff');
	});
	
	//限制字符个数  ，没有更多，收起,只显示省略号
	/*$(".onetopicinfo-topicdesc").each(function(){
		var maxwidth=0;
		var text=$(this).text();
		if($(this).text().length>maxwidth){
			 $(this).text($(this).text().substring(0,maxwidth));
			
			 $(this).html($(this).html()+"...");
		}
		
	});*/
	
	/*$(".describe").each(function(){
		var maxwidth=60;
		var text=$(this).text();
		if($(this).text().length>maxwidth){
			$(this).text($(this).text().substring(0,maxwidth));
			
			 $(this).html($(this).html()+"..."+"<a href='###' class='lookmoredesc' style='text-decoration:none;color:#70DB93;'> 点击展开</a>");//如果字数超过最大字数，超出部分用...代替，并且在后面加上点击展开的链接；
		}
		$(this).find(".lookmoredesc").click(function(){
            $(this).parent().text(text);//点击“点击展开”，展开全文
        })
	});*/
	//限制字符个数 ，有更多，收起
    /* $('.describe').truncaString({
         length: 160, 
         hideClue: true, 
         isHide: true,
         moreText:"显示全部",
         hideText:"收起",
         boundary:  /^(\u002c|\u002e|\uff0c|\u3002|[\u4E00-\u9FA5])+$/
     });*/
  
	//首页摘要处理   1
	/*$(".describe").each(function(){
		var maxwidth=200;
		var contenttext=$(this).text();
		if(contenttext.length>maxwidth){
			var subcontent=contenttext.substring(0,maxwidth)+"...";
			$(this).prev().find('.summary_text').text(subcontent);
		}else{
	      	$(this).prev().find('.summary_text').text(contenttext);
		}
		$(this).find('img').each(function(){		   
			//将每个图片用<a></a>包裹起来
			$(this).wrap(function() {
				  return '<a href="' + $(this).attr('src') + '"  class="lightBox_a"  target="_blank"></a>';
			});
		});
	   
	    //取回答的第一张图片为概要图片 去出表情图片
		var firstimageurl=$(this).find('img[alt]:first').attr('src');
		
		//获取文件的宽度和高度
		var theImage = new Image();
		theImage.src=firstimageurl;
		var imageWidth = theImage.width;
		var imageHeight = theImage.height;
		if(typeof(firstimageurl) != "undefined"){
			var summary_image="";
			//如果图片过大，不能直接显示
			if(imageWidth>520 || imageHeight>250){
			    summary_image='<img src="'+firstimageurl+'" width="520px" height="250px" >';
			}else{
				 summary_image='<img src="'+firstimageurl+'" >';
			}
			$(this).prev().find('.summary_text').before(summary_image);
		}else{
			
		}
    
	});
	*/
	
	
	
	//首页摘要处理    2
	$(".describe").each(function(){
		var maxwidth=250;
		var contenttext=$(this).text();
		$(this).find('img').each(function(){		   
			//将每个图片用<a></a>包裹起来
			$(this).wrap(function() {
				  return '<a href="' + $(this).attr('src') + '"  class="lightBox_a"  target="_blank"></a>';
			});
		});
		if(contenttext.length>maxwidth){
			var subcontent=contenttext.substring(0,maxwidth)+"...";
			$(this).prev().find('.summary_text').text(subcontent);
			/*$(this).find('img').each(function(){		   
				//将每个图片用<a></a>包裹起来
				$(this).wrap(function() {
					  return '<p   class="lightBox_a" ></p>';
				});
			});*/
		   
		    //取回答的第一张图片为概要图片 去出表情图片
			var firstimageurl=$(this).find('img[alt]:first').attr('src');
			
			//获取文件的宽度和高度
			var theImage = new Image();
			theImage.src=firstimageurl;
			var imageWidth = theImage.width;
			var imageHeight = theImage.height;
			if(typeof(firstimageurl) != "undefined"){
				var summary_image="";
				//如果图片过大，不能直接显示
				if(imageWidth>520 || imageHeight>250){
				    summary_image='<img src="'+firstimageurl+'" width="520px" height="250px" >';
				}else{
					 summary_image='<img src="'+firstimageurl+'" >';
				}
				$(this).prev().find('.summary_text').before(summary_image);
			}else{
				
			}
			
		}else{
	      	//$(this).prev().find('.summary_text').text(contenttext);
			$(this).show();
			$(this).next().hide();
			$(this).prev().hide();
		}
		
    
	});
/*	var maxwidth=60;
	var contenttext=$('.showhide').closest('.summary').next().text();
	if(contenttext.length>maxwidth){
		var subcontent=contenttext.substring(0,maxwidth)+"...";
		$('.showhide').closest('.summary').find('.summary_text').text(subcontent);
	}*/
     //首页摘要显示与隐藏
   $(document).on('click','.showhide',function(){
	   $(this).closest('.summary').next().show();
	   $(this).closest('.summary').hide();
	   $(this).closest('.summary').closest('.answer-info').find('.showhide_hide').show();
   });
   $(document).on('click','.showhide_hide',function(){
	   $(this).hide();
	   $(this).closest('.answer-info').find('.describe').hide();
	   $(this).closest('.answer-info').find('.summary').show();
   });
	 //index 收藏，举报显示隐藏
	 
	/* $('.index-sss').mouseover(function(){
		$('.shadow_border').show();
	 });
	 
	 $('.index-sss').mouseout(function(){
		 $('.shadow_border').hide();
	 });*/
	 
	/* $('.index-sss').bind("mouseover",function(){
		 $(">div:nth-child(2)>div:nth-child(4)>span:nth-child(3)",this).show();
	 }).bind("mouseout",function(){
		 $(">div:nth-child(2)>div:nth-child(4)>span:nth-child(3)",this).hide();
	 });*/
	 
	 
	 //index 收藏，举报显示隐藏
	/*$('.index_my_left_category').bind("mouseover",function(){
		$(this).children("span").last().show();
		
	}).bind("mouseout",function(){
		$(this).children("span").last().hide();
	});*/
	 
	//index 收藏，举报显示隐藏
	$(document).on('mouseover','.index-rightcontent',function(){
		$(this).find('.index_my_left_category').find('.shadow_border').show();
	}).on('mouseout','.index-rightcontent',function(){
		$(this).find('.index_my_left_category').find('.shadow_border').hide();
	});
	/*$('.index-rightcontent').bind('mouseover',function(){
		$(this).find('.index_my_left_category').find('.shadow_border').show();
	}).bind('mouseout',function(){
		$(this).find('.index_my_left_category').find('.shadow_border').hide();
	});*/
	
	//话题详情   ---未回答问题--  收藏，举报显示隐藏
	$(".unanswered_question_div").bind('mouseover',function(){
		$(this).find('.index_my_left_category').find('.shadow_border').show();
	}).bind('mouseout',function(){
		$(this).find('.index_my_left_category').find('.shadow_border').hide();
	});
	
	//index  评论显示与隐藏
	/* $(document).on('click','.commentbtn',function(){
		
	 });*/
	
	/*$(".commentbtn").click(function(){
		   
		 $(".commentbox").css({"height":"0px","margin-top":"-5px"});
		 $(".commentbox").slowMove(
				{"speed":0,"tween":"Linear","ease":"easeOut"},
				{"height":"105px","opacity":1,"margin-top":"0px"}
			);
		 //主页评论显示与隐藏
		 $(this).closest('.index_my_left_category').next().toggle();
		 //问题详情 评论显示与隐藏
		 $(this).closest('.question_my_left_category').next().toggle();
     });*/
	
	//index  点击回答 弹出写回答 弹窗  获取当前  问题的id和标题
    $(document).on('click','.answer-toquestion',function(){
		 var hide_question_name= $(this).closest('.index_my_left_category').find('.hide_question_name').val();
		 var hide_question_id=$(this).closest('.index_my_left_category').find('.hide_question_id').val();
		 //拼装问题url
		 var q_url=DEFAULT_QUESTION_URL+hide_question_id;
		 //将问题信息写入问题弹窗
		 $('.writeanswer-dialog_default_question_name').text(hide_question_name).attr('href',q_url);
		 $('.writeanswer-dialog_default_question_id').val(hide_question_id);
		 $('.writeanswer-dialog').show();
		 $('.mark').show();
	});

	 
	//question 收藏，举报  显示与隐藏
   
	$(".question_rightcontent").bind("mouseover",function(){
		$(">div:nth-child(3)>div",this).css("display","inline-block");
	}).bind("mouseout",function(){
		$(">div:nth-child(3)>div",this).css("display","none");
	});
    
	/* var ArrayMenu = $('.commentbtn');
	 for(var i = 0;i < ArrayMenu.length; i++){   
	        //绑定方法每个菜单的点击
	        $(ArrayMenu[i]).bind("click",{'bindText':i},function ChangContent(e){
	            var num = e.data.bindText;
	           
	      });
	  }	
*/
	
     //question 回复框显示隐藏
	$(document).on('click','.othercomment_replay_btn',function(){
		 $(this).closest('.othercomment_replay_operate').closest('.othercomment_replay_time').next().toggle();
	});
/*	$(".othercomment_replay_btn").click(function(){
		   
		 $(this).closest('.othercomment_replay_operate').closest('.othercomment_replay_time').next().toggle();
    });*/
	
   //写私信弹出
	
	/*$('.theme-login').click(function(){
		$('.theme-popover-mask').fadeIn(100);
		$('.theme-popover').slideDown(200);
	});
	$('.theme-poptit .close').click(function(){
		$('.theme-popover-mask').fadeOut(100);
		$('.theme-popover').slideUp(200);
	});
	$(".reset").click(function(){
		$('.theme-popover-mask').fadeOut(100);
		$('.theme-popover').slideUp(200);
	});*/
    $(document).on('click','.write_letter_btn',function(){
	   $('.letter-dialog').show();
	   $('.mark').show();
   });
    
  
 /*  $('.write_letter_btn').on('click',function(){
	   $('.letter-dialog').show();
	   $('.mark').show();
   });*/
	
	//写私信默认文字
	
	$(".openModal-sixin-content").html("搜索用户");
	$(".openModal-sixin-content").focus(function(){
		if($(".openModal-sixin-content").html()=="搜索用户"){
			$(".openModal-sixin-content").html("");
		}		
	});
	$(".openModal-sixin-content").blur(function(){
		if($(".openModal-sixin-content").html()==""){
			$(".openModal-sixin-content").html("搜索用户");
		}	
	});
	
	$(".openModal-sixin-desc").html("填写私信内容");
	$(".openModal-sixin-desc").focus(function(){
		if($(".openModal-sixin-desc").html()=="填写私信内容"){
			$(".openModal-sixin-desc").html("");
		}		
	});
	$(".openModal-sixin-desc").blur(function(){
		if($(".openModal-sixin-desc").html()==""){
			$(".openModal-sixin-desc").html("填写私信内容");
		}	
	});
	
	
	//主页鼠标移动到回答问题背景改变
	$(document).on('mouseover','.answer-info',function(){
		$(this).css('background','#F6F6F6');
	}).on('mouseout','.answer-info',function(){
		$(this).css('background','#FFFFFF');
	});
	
	/*$('.answer-info').mouseover(function(){
		$(this).css('background','#F6F6F6');
	}).mouseout(function(){
		$(this).css('background','#FFFFFF');
	});*/
	
	
	//回复   操作中 显示与隐藏
	$(document).on('mouseover','.replay-rightcontent',function(){
		$(">div:nth-child(2)>div",this).css("display","inline-block");
	}).on('mouseout','.replay-rightcontent',function(){
		$(">div:nth-child(2)>div",this).css("display","none");
	});
/*	$('.replay-rightcontent').mouseover(function(){
		$(">div:nth-child(2)>div",this).css("display","inline-block");
	}).mouseout(function(){
		$(">div:nth-child(2)>div",this).css("display","none");
	});*/
	
	/*
	 * 我的主页js 
	 *
	 */
	
	//点击打开收藏夹页面
	$(document).on('click','.answer-collection-btn',function(){
		$('.collection').show();
		$('.mark').show();
	});
	
	
	/****我的名称   编辑的显示与隐藏***/
	$('.myname').bind('mouseover',function(){
		$(this).find(".myname_edit_span_tag").show();	    
	}).bind('mouseout',function(){
		$(this).find(".myname_edit_span_tag").hide();
	});
	$('.myname_edit_span_tag').bind('click',function(){
		$(this).hide();
		$('.myname_con').hide();
		$('.myname_tag_hidd').show();
		$('.myname_tag_hidd_edit').text($('.myname_con').text());
		$('.myname').bind('mouseover',function(){
			$(this).find(".myname_edit_span_tag").hide();	    
		});
	});
	$('.myname_tag_reset').bind('click',function(){
		$('.myname_tag_hidd').hide();
		$('.myname_con').show();
		$('.myname').bind('mouseover',function(){
			$(this).find(".myname_edit_span_tag").show();	    
		}).bind('mouseout',function(){
			$(this).find(".myname_edit_span_tag").hide();
		});
	});
	
	/***我的标签  隐藏 修改js**/
	$('.biaoqian').bind('mouseover',function(){
		$(this).find('.mybiaoqian_edit_span_tag').show();
	}).bind('mouseout',function(){
		$(this).find('.mybiaoqian_edit_span_tag').hide();
	});
	
	$('.mybiaoqian_edit_span_tag').bind('click',function(){
		$(this).hide();
		$('.biaoqian_con').hide();
		$('.mybiaoqian_tag_hidd').show();
		$('.mybiaoqian_tag_hidd_edit').text($('.biaoqian_con').text());
		$('.biaoqian').bind('mouseover',function(){
			$(this).find(".mybiaoqian_edit_span_tag").hide();	    
		});
	});
	$('.mybiaoqian_tag_reset').bind('click',function(){
		$('.mybiaoqian_tag_hidd').hide();
		$('.biaoqian_con').show();
		$('.biaoqian').bind('mouseover',function(){
			$(this).find(".mybiaoqian_edit_span_tag").show();	    
		}).bind('mouseout',function(){
			$(this).find(".mybiaoqian_edit_span_tag").hide();
		});
	});
	
	
	/*
	 * 编辑我的个人信息页面js
	 * 
	 */
	
	/*****编辑我的性别  js*****/
	$('.myright_edit_span_sex').bind('click',function(){
		$(this).hide();
		$('.info_sex').hide();
		$('.myright_sex_hidd').show();
		$('.myright').bind('mouseover',function(){
			$(this).find('.myright_edit_span').hide();
		});
	});
	$('.myright_sex_reset').bind('click',function(){
		
		$('.myright_sex_hidd').hide();
		$('.info_sex').show();
		$('.myright').bind('mouseover',function(){
			$(this).find('.myright_edit_span').show();
		}).bind('mouseout',function(){
			$(this).find('.myright_edit_span').hide();
		});
	});
	
	
	/***编辑 描述一下自己 js***/
	
	//点击编辑  显示编辑div  
	$('.myright_fill_desc').bind('click',function(){
		$(this).hide();
		$('.info_desc').hide();
		$('.myright_desc_hidd_edit').text($('.info_desc').text());
		$('.myright_desc_hidd').show();
	});
	$('.myright_desc_reset').bind('click',function(){
		$('.myright_desc_hidd_edit').text('');
		$('.myright_desc_hidd').hide();
		$('.myright_fill_desc').show();
		$('.info_desc').show();
	});
	
	
	/***编辑一句话介绍 js***/
	
	//编辑显示与隐藏   总控制js
	$('.myright').bind('mouseover',function(){
		$(this).find('.myright_edit_span').show();
	}).bind('mouseout',function(){
		$(this).find('.myright_edit_span').hide();
	});
	
	$('.myright_edit_span_tag').bind('click',function(){
		$(this).hide();
		$('.info_tag').hide();
		$('.myright_tag_hidd').show();
		$('.myright_tag_hidd_edit').text($('.biaoqian_con').text());
		$('.myright').bind('mouseover',function(){
			$(this).find('.myright_edit_span').hide();
		});
	});
	$('.myright_tag_reset').bind('click',function(){
		$('.myright_tag_hidd_edit').text('');
		$('.myright_tag_hidd').hide();
		$('.info_tag').show();
		$('.myright').bind('mouseover',function(){
			$(this).find('.myright_edit_span').show();
		}).bind('mouseout',function(){
			$(this).find('.myright_edit_span').hide();
		});
	});
	
   /*****我的职业 js****/
	$('.myright_fill_profession').bind('click',function(){
		$(this).hide();
		$('.myright_profession_hidd').show();
	});
	$('.myright_profession_reset').bind('click',function(){
		$('.myright_profession_hidd_edit').text('');
		$('.myright_profession_hidd').hide();
		$('.myright_fill_profession').show();
	});
	
	
	
	/**
	 * 
	 * 	动态添加话题标签 js
	 */
	var num = 5;  
    
    $(".openModal-question-topic").keyup(function(event) {  
        var code = event.keyCode;  
        if(code==13) {  
            var c = $(this).val();
            var reg=/^[a-zA-Z\u4e00-\u9fa5]{1,10}$/gi;          
           // c=$.trim(c);  //取出起始空格
            c=c.replace(/\s/g, "");
            //添加的话题字母不区分大小写 ，先转化为小写，但写入数据库照原样录入
            var c_lower=c.toLowerCase();
            if(c!="") {  
                if($(".keyword-in").length>=num) {  
                   // alert("最多只能允许添加"+num+"个关键字");  
                    layer.msg("最多只能允许添加"+num+"个关键字",{time:2000});
                    event.preventDefault();  
                    return;  
                }  
                if(!reg.test(c)){
                	layer.msg("标签不能含有特殊字符，长度为1~10",{time:2000});
                	event.preventDefault();  
                    return;  
                }
                  
                /*主要是用来对输入的内容进行获取，判断是否有重复输入，如果有重复输入则不显示*/  
                var aks =document.getElementsByName("aks"); 
                /*for(var i=0;i<aks.length;i++) {  
                    if($(aks[i]).val()==c); {//$(aks[i]) DOM对象  
                    	layer.msg("话题不能重复添加哦"); 
                        event.preventDefault();  
                        return; 
                    }  
                }  */
                for (var i = 0; i < aks.length; i++) {
                	//将已有的话题值字母全部转化为小写 ，以便进行重复性验证
                	
                    if (aks[i].value.toLowerCase()==c_lower) {
                    	layer.msg("话题不能重复添加哦(字母大小写不区分)"); 
                        event.preventDefault();  
                        return;
                    }
                }
                /*主要是用来对输入的内容进行获取，判断是否有重复输入，如果有重复输入则不显示*/  
        /*      $("input[name='aks']").each(function() {  
                    //alert($(this).val());  
                    if($(this).val()==c); {  
                        alert("不能添加重复关键字");  
                        event.preventDefault();//本实例阻止不起作用，因为在闭包中  
                        return;  
                    }  
                });  
                */  
                var ki = createKeyword(c);  
                $(".question-topicresult-div").append(ki);  
                $(this).val("");  
            }  
        }  
    });  
/*    
    //此处为什么不使用.keyword-shut?因为直接操作<a></a>对上面动态新加入的html不会起作用，只对原有写死的有效果。所以需要使用js的事件委派on或off  
    $(".keyword-shut").click(function() {  
    })*/  
    $(".question-topicresult-div").on("click","a.keyword-shut",function(event) {//on参数，第一个是事件，第二个是选择器，也就是在keywords-wrap上委派一个click事件，委派给keyword-shut  
//      alert(event.type);  
        $(this).parent("div.keyword-in").remove();  
        //return false;这种截止可以，或者使用event.preventDefault();  
        event.preventDefault();  
    });  
    function createKeyword(val) {  
        return "<div class='keyword-in'><span>"+val  
        +"</span> <a href='#' class='keyword-shut'>×</a><input type='checkbox' name='aks' value='"+val+"' class='question_topic_hide' checked ></div>";  
    }  
	
    
  
    
    $('.describe img').zoomify();

	
});




