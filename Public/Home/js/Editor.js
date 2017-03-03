 // 阻止输出log
        // wangEditor.config.printLog = false;

        var editor = new wangEditor('editor-trigger');
        
        
        //移除菜单项   video 和location,alignright,table 
       /* editor.config.menus = $.map(wangEditor.config.menus, function(item, key) {
          if (item === 'video') {
              return null;
         }
          if (item === 'location') {
              return null;
          }
          if(item==='alignright'){
          	  return null;
          }
          if(item==='table'){
          	  return null;
          }
          return item;
      });*/
        
        //自定义菜单
        // 普通的自定义菜单
        editor.config.menus = [
            'source',
            '|',     // '|' 是菜单组的分割线
            'bold',
            'underline',
            'italic',
            'eraser',
            '|',
            'quote',
            'unorderlist',
            'orderlist',
            'link',
            'unlink',
            'emotion',
            '|',
            'insertcode',
            'img',
            '|',
            'undo',
            'fullscreen'
         ];
        
        // 上传图片
        editor.config.uploadImgUrl = MODULE+'/User/EditorUploadImage';
        
        //上传图片名称
        editor.config.uploadImgFileName = 'myimage';
        	
        editor.config.uploadParams = {
            // token1: 'abcde',
            // token2: '12345'
        };
        editor.config.uploadHeaders = {
            // 'Accept' : 'text/x-json'
        }
        // editor.config.uploadImgFileName = 'myFileName';

        // 隐藏网络图片
        editor.config.hideLinkImg = true;

        // 表情显示项  icon 为
        editor.config.emotionsShow = 'icon';
        editor.config.emotions = {
            'default': {
                title: '默认', 
                data:[{
				            icon : PUBLIC_PATH+'static/wangEditor/static/emotions/default/1.gif',
				            value : "[草泥马]"
			         },{
					        icon : PUBLIC_PATH+'static/wangEditor/static/emotions/default/2.gif',
					        value : "[草泥马]"
				     },{
					        icon : PUBLIC_PATH+'static/wangEditor/static/emotions/default/3.gif',
					        value : "[草泥马]"
				     },{
					        icon : PUBLIC_PATH+'static/wangEditor/static/emotions/default/4.gif',
					        value : "[草泥马]"
				     },{
					        icon : PUBLIC_PATH+'static/wangEditor/static/emotions/default/5.gif',
					        value : "[草泥马]"
				     },{
					        icon : PUBLIC_PATH+'static/wangEditor/static/emotions/default/6.gif',
					        value : "[草泥马]"
				     },{
					        icon : PUBLIC_PATH+'static/wangEditor/static/emotions/default/7.gif',
					        value : "[草泥马]"
				     },{
					        icon : PUBLIC_PATH+'static/wangEditor/static/emotions/default/8.gif',
					        value : "[草泥马]"
				     },{
					        icon : PUBLIC_PATH+'static/wangEditor/static/emotions/default/9.gif',
					        value : "[草泥马]"
				     },{
					        icon : PUBLIC_PATH+'static/wangEditor/static/emotions/default/11.gif',
					        value : "[草泥马]"
				     },{
					        icon : PUBLIC_PATH+'static/wangEditor/static/emotions/default/12.gif',
					        value : "[草泥马]"
				     },{
					        icon : PUBLIC_PATH+'static/wangEditor/static/emotions/default/13.gif',
					        value : "[草泥马]"
				     },{
					        icon : PUBLIC_PATH+'static/wangEditor/static/emotions/default/14.gif',
					        value : "[草泥马]"
				     },{
					        icon : PUBLIC_PATH+'static/wangEditor/static/emotions/default/15.gif',
					        value : "[草泥马]"
				     },{
					        icon : PUBLIC_PATH+'static/wangEditor/static/emotions/default/16.gif',
					        value : "[草泥马]"
				     },{
					        icon : PUBLIC_PATH+'static/wangEditor/static/emotions/default/17.gif',
					        value : "[草泥马]"
				     }
                
                  ]
            },
            'weibo': {
                title: '微博表情',
                data: [{
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/7a/shenshou_thumb.gif",
					        value : "[草泥马]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/60/horse2_thumb.gif",
					        value : "[神马]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/bc/fuyun_thumb.gif",
					        value : "[浮云]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/c9/geili_thumb.gif",
					        value : "[给力]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/f2/wg_thumb.gif",
					        value : "[围观]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/70/vw_thumb.gif",
					        value : "[威武]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/6e/panda_thumb.gif",
					        value : "[熊猫]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/81/rabbit_thumb.gif",
					        value : "[兔子]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/bc/otm_thumb.gif",
					        value : "[奥特曼]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/15/j_thumb.gif",
					        value : "[囧]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/89/hufen_thumb.gif",
					        value : "[互粉]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/c4/liwu_thumb.gif",
					        value : "[礼物]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/ac/smilea_thumb.gif",
					        value : "[呵呵]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/0b/tootha_thumb.gif",
					        value : "[嘻嘻]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/6a/laugh.gif",
					        value : "[哈哈]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/14/tza_thumb.gif",
					        value : "[可爱]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/af/kl_thumb.gif",
					        value : "[可怜]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/a0/kbsa_thumb.gif",
					        value : "[挖鼻屎]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/f4/cj_thumb.gif",
					        value : "[吃惊]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/6e/shamea_thumb.gif",
					        value : "[害羞]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/c3/zy_thumb.gif",
					        value : "[挤眼]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/29/bz_thumb.gif",
					        value : "[闭嘴]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/71/bs2_thumb.gif",
					        value : "[鄙视]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/6d/lovea_thumb.gif",
					        value : "[爱你]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/9d/sada_thumb.gif",
					        value : "[泪]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/19/heia_thumb.gif",
					        value : "[偷笑]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/8f/qq_thumb.gif",
					        value : "[亲亲]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/b6/sb_thumb.gif",
					        value : "[生病]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/58/mb_thumb.gif",
					        value : "[太开心]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/17/ldln_thumb.gif",
					        value : "[懒得理你]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/98/yhh_thumb.gif",
					        value : "[右哼哼]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/6d/zhh_thumb.gif",
					        value : "[左哼哼]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/a6/x_thumb.gif",
					        value : "[嘘]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/af/cry.gif",
					        value : "[衰]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/73/wq_thumb.gif",
					        value : "[委屈]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/9e/t_thumb.gif",
					        value : "[吐]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/f3/k_thumb.gif",
					        value : "[打哈欠]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/27/bba_thumb.gif",
					        value : "[抱抱]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/7c/angrya_thumb.gif",
					        value : "[怒]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/5c/yw_thumb.gif",
					        value : "[疑问]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/a5/cza_thumb.gif",
					        value : "[馋嘴]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/70/88_thumb.gif",
					        value : "[拜拜]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/e9/sk_thumb.gif",
					        value : "[思考]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/24/sweata_thumb.gif",
					        value : "[汗]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/7f/sleepya_thumb.gif",
					        value : "[困]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/6b/sleepa_thumb.gif",
					        value : "[睡觉]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/90/money_thumb.gif",
					        value : "[钱]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/0c/sw_thumb.gif",
					        value : "[失望]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/40/cool_thumb.gif",
					        value : "[酷]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/8c/hsa_thumb.gif",
					        value : "[花心]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/49/hatea_thumb.gif",
					        value : "[哼]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/36/gza_thumb.gif",
					        value : "[鼓掌]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/d9/dizzya_thumb.gif",
					        value : "[晕]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/1a/bs_thumb.gif",
					        value : "[悲伤]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/62/crazya_thumb.gif",
					        value : "[抓狂]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/91/h_thumb.gif",
					        value : "[黑线]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/6d/yx_thumb.gif",
					        value : "[阴险]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/89/nm_thumb.gif",
					        value : "[怒骂]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/40/hearta_thumb.gif",
					        value : "[心]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/ea/unheart.gif",
					        value : "[伤心]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/58/pig.gif",
					        value : "[猪头]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/d6/ok_thumb.gif",
					        value : "[ok]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/d9/ye_thumb.gif",
					        value : "[耶]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/d8/good_thumb.gif",
					        value : "[good]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/c7/no_thumb.gif",
					        value : "[不要]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/d0/z2_thumb.gif",
					        value : "[赞]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/40/come_thumb.gif",
					        value : "[来]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/d8/sad_thumb.gif",
					        value : "[弱]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/91/lazu_thumb.gif",
					        value : "[蜡烛]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/6a/cake.gif",
					        value : "[蛋糕]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/d3/clock_thumb.gif",
					        value : "[钟]"
					    }, {
					        icon : "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/1b/m_thumb.gif",
					        value : "[话筒]"
					    }
					]
            }
        };

        // 插入代码时的默认语言
        // editor.config.codeDefaultLang = 'html'

        // 只粘贴纯文本
        // editor.config.pasteText = true;

        // 跨域上传
        // editor.config.uploadImgUrl = 'http://localhost:8012/upload';

        // 第三方上传
        // editor.config.customUpload = true;

        // 普通菜单配置
        // editor.config.menus = [
        //     'img',
        //     'insertcode',
        //     'eraser',
        //     'fullscreen'
        // ];
        // 只排除某几个菜单（兼容IE低版本，不支持ES5的浏览器），支持ES5的浏览器可直接用 [].map 方法
        // editor.config.menus = $.map(wangEditor.config.menus, function(item, key) {
        //     if (item === 'insertcode') {
        //         return null;
        //     }
        //     if (item === 'fullscreen') {
        //         return null;
        //     }
        //     return item;
        // });

        // onchange 事件
        // editor.onchange = function () {
        //     console.log(this.$txt.html());
        // };


        // 取消过滤js
        // editor.config.jsFilter = false;

        // 取消粘贴过来
        // editor.config.pasteFilter = false;

        // 设置 z-index
        // editor.config.zindex = 20000;

        // 语言
        // editor.config.lang = wangEditor.langs['en'];

        // 自定义菜单UI
        // editor.UI.menus.bold = {
        //     normal: '<button style="font-size:20px; margin-top:5px;">B</button>',
        //     selected: '.selected'
        // };
        // editor.UI.menus.italic = {
        //     normal: '<button style="font-size:20px; margin-top:5px;">I</button>',
        //     selected: '<button style="font-size:20px; margin-top:5px;"><i>I</i></button>'
        // };
        
        
        //创建编辑器
        editor.create();
        
        
        /*
         * editor.$text
         * 
         * editor.$txt是一个 jquery 封装的div元素，这个div元素就是编辑器的可编辑区域。
         *因此，想要设置、获取、处理编辑器区域的内容，操作这个 editor.$txt 即可。
         * 由于它本身就是 jquery 封装的，因此支持 jquery 所有API
         */
        
        
        //初始化内容
        editor.$txt.html('<p style="color:#666666;">写下你的想法...</p>');
        
        //编辑器模拟  placeholder 效果
        
    	
/*                   
$(function(){
	
	   
        	//获取编辑器中的内容
        	$('.add_button_answer').click(function(){
        		// 获取编辑器区域完整html代码
		        var html = editor.$txt.html();
		        alert(html);
		        // 获取编辑器纯文本内容
		        var text = editor.$txt.text();
		        alert(text);
		        // 获取格式化后的纯文本
		        var formatText = editor.$txt.formatText();
		        alert(formatText);
        	});
        	
        	//追加内容
	        $('#btn2').click(function(){
	        	editor.$txt.append('<p>追加的内容</p>');
	        });
	        
	        //清空内容
	        $('#btn3').click(function(){
	        	editor.$txt.html('<p><br></P>');
	        });
});*/
    
  /**
   * 
   * 回答问题AJAX
   * 
   */      
        
$(function(){
	  
      $(document).on('click','.add_button_answer',function(){
    	  //获取当前问题的id
    	  var hide_question_id=$('.writeanswer-dialog_default_question_id').val();
    	  //获取当前回答的内容
    	  var answer_content = editor.$txt.html();
    	  //获取回答者是否匿名
    	  var is_name_check=$('#isHaveName').is(':checked');
    	  var is_name='';
    	  if(is_name_check==true){
    		  is_name=1;
    	  }else{
    		  is_name=0;
    	  }
    	  //获取编辑后的纯文本
    	  var  only_text= editor.$txt.text();
    	  if(only_text.replace(/(^\s*)|(\s*$)/g,"")=="" || only_text=="写下你的想法..."){
    		  $.ajax({
    				type:'post',
    				dataType:'json',
    				url:MODULE+'/Question/Answer',
    				data:'qid='+hide_question_id+'&ac='+answer_content+'&in='+is_name,
    				beforeSend:function(){
    					//显示正在加载
    					layer.load(1);
    				},
    				success:function(data){

    					//关闭正在加载
    					setTimeout(function(){
    						  layer.closeAll('loading');
    					}, 1000);
    					
    					if(data.status==1){
    						layer.msg(data.content, {icon: 1,time:1000});   						
    						//$('.myname_tag_reset').trigger('click');
    					}else{
    						layer.msg(data.content, {icon: 2,time:1000});
    					}
    				},
    				error:function(){

    					//关闭正在加载
    					setTimeout(function(){
    						  layer.closeAll('loading');
    					}, 1000);
    					layer.msg(AJAX_ERROR, {icon: 2,time:2000});
    				}
    			});
    	  }else{
    		  layer.msg("回答内容不可以为空呀");
    	  }
      });
  });    
        
  
        