$(function(){
	
	$(".describe").each(function(){
		var summary_content=$(this).prev().find('.summary_text').text();
		if(summary_content=="" || summary_content==null ){
			var maxwidth=250;
			var contenttext=$(this).text();
			if(contenttext.length>maxwidth){
				var subcontent=contenttext.substring(0,maxwidth)+"...";
				$(this).prev().find('.summary_text').text(subcontent);
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
				
			}else{
		      	//$(this).prev().find('.summary_text').text(contenttext);
				$(this).show();
				$(this).next().hide();
				$(this).prev().hide();
			}
		}
    
	});
	 //首页图片灯箱
   // $('.describe .lightBox_a').lightBox();
	 $('.describe img').zoomify();
	/*$(".describe").each(function(){
		var maxwidth=200;
		var contenttext=$(this).text();
		if(contenttext.length>maxwidth){
			var subcontent=contenttext.substring(0,maxwidth)+"...";
			$(this).prev().find('.summary_text').text(subcontent);
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
			
		}else{
	      	//$(this).prev().find('.summary_text').text(contenttext);
			$(this).show();
			$(this).next().show();
			$(this).prev().hide();
		}
		
    
	});*/
	
});