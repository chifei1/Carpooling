//JavaScript Document
var carpool_obj={
		banner_init:function(){
			//$("#shop_skin_index").css({"height":0.5*$(window).width(),"line-height":0.5*$(window).width()-20+"px"});
			var tableheight=$(window).height()-40-$("#shop_skin_index").height()-$(".footer").height()
			//alert(tableheight);
			if(tableheight<320){
				tableheight=320;
			}
			$("#design_index_box").css({"height":tableheight});
			for(i=0; i<shop_skin_data.length; i++){
				var obj=$("#shop_skin_index div").filter('[rel=edit-'+shop_skin_data[i]['Postion']+']');
				
				if(shop_skin_data[i]['ContentsType']==1){
					var dataImg=eval("("+shop_skin_data[i]['ImgPath']+")");
					var dataUrl=eval("("+shop_skin_data[i]['Url']+")");
					var dataTitle=eval("("+shop_skin_data[i]['Title']+")");
					var _banner='<div class="slider"><div class="flexslider"><ul class="slides">';
					
					for(var k=0; k<dataImg.length; k++){
						
						if(dataImg[k].indexOf('http://')!=-1){
							var s='';
						}else if(dataImg[k].indexOf('/u_file/')!=-1){
							var s=domain.img;
							dataImg[k]=dataImg[k].replace('/u_file', '');
						}else if(dataImg[k].indexOf('/api/')!=-1){
							var s=domain.static;
						}else{
							var s='';
						}
						
						dataUrl[k] = apiurl(dataUrl[k]);
						
						if(shop_skin_data[i]['NeedLink']==1){
							
							_banner=_banner+'<li><a href="'+dataUrl[k]+'"><img src="'+s+dataImg[k]+'" alt="'+dataTitle[k]+'" /></a></li>';
							
							
						}else{
							_banner=_banner+'<li><img src="'+s+dataImg[k]+'" alt="'+dataTitle[k]+'" /></li>';
							
						}
					}
					var _banner=_banner+'</ul></div></div>';
					
					obj.find('.img').html(_banner);
					obj.find('.flexslider').flexslider({animation:"slide"});
					$('.flex-control-nav, .flex-direction-nav').remove();
				}else{
					var _Url='', s='';
					if(shop_skin_data[i]['NeedLink']==1){
						_Url=shop_skin_data[i]['Url']?shop_skin_data[i]['Url']:'';
					}
					if(shop_skin_data[i]['ImgPath'].indexOf('http://')!=-1){
						var s='';
					}else if(shop_skin_data[i]['ImgPath'].indexOf('/u_file/')!=-1){
						var s=domain.img;
						shop_skin_data[i]['ImgPath']=shop_skin_data[i]['ImgPath'].replace('/u_file', '');
					}else if(shop_skin_data[i]['ImgPath'].indexOf('/api/')!=-1){
						var s=domain.static;
					}else{
						var s='';
					}
					
					_Url = apiurl(_Url);
					
					var _Img=_Url?'<a href="'+_Url+'"><img src="'+s+shop_skin_data[i]['ImgPath']+'" /></a>':'<img src="'+s+shop_skin_data[i]['ImgPath']+'" />';
					var _Title=_Url?'<a href="'+_Url+'">'+shop_skin_data[i]['Title']+'</a>':shop_skin_data[i]['Title'];
					obj.find('.img').html(_Img);
					obj.find('.text').html(_Title);
				}
			}
		}

}