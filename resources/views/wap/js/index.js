// JavaScript Document
$(function(){
	//首页轮播指向banner类
/*	$('.banner').height($('.banner').width()*0.3);
	$('.banner').touchslide({timecontrol:3000,animatetime:300,direction:'left',navshow:true,canvassuport:true});*/
	
	//首页点击搜索图标弹出搜索框
		
	$("#searchcoin").click(function(){
		$(".toplink .search").css("display","block")
		
  	//首页点击取消搜索框消失
		
	});
	$("#scancel").click(function(){
		$(".toplink .search").css("display","none")
  		
	});
	
	//收藏页点击收藏变样式
	
 	$("#collection").click(function(){
		if($("#collection img").attr("src")=="images/collect/colcoin2.png"){
	  		$("#collection img").attr("src","images/collect/colcoin3.png");
	    }else if($("#collection img").attr("src")=="images/collect/colcoin3.png"){
	  		$("#collection img").attr("src","images/collect/colcoin2.png");
	    }
	});
	
	//点击分享出蒙版
	$("#share").click( function(){
		$(".mask").css("display","block")
	});
	
	$(".mask").click( function(){
		$(".mask").css("display","none")
	});
	
	//页面顶部收藏，点击后改变样式
	$("#enshrine").click(function(){
			if($("#enshrine img").attr("src")=="images/collect/colcoin1.png"){
	  		$("#enshrine img").attr("src","images/collect/colcoin4.png");
	    }else if($("#enshrine img").attr("src")=="images/collect/colcoin4.png"){
	  		$("#enshrine img").attr("src","images/collect/colcoin1.png");
	    }
	})
	//下拉框替换内容
	
	$(".btn-select select" ).change(function(){
		var checktext=$(this).find("option:selected").text(); 
		$(this).parents("div").children("span").html(checktext);
		
	});
	
	
	
		

		
		 setTime($("#stat_time"));
		 //实例化结束时间下拉
		 setTime($("#end_time"));	
		 //实例化区域选择下拉
		 select3("sel_region_1","txt_region_1");
		 //实例化类型1下拉
		 select("sel_type_1","txt_type_1");

		$("#secum").show();
		$("#seown").hide();
		$("#searcun").click(function(){
			$(".sfooter div").removeClass('active');
			$(this).addClass('active');
			$("#secum").show();
			$("#seown").hide();
		});
		$("#searown").click(function(){
			$(".sfooter div").removeClass('active');
			$(this).addClass('active');
			$("#seown").show();
			$("#secum").hide();
		});
		 
		 //拼车类型改变触发js
		 $("#carpooltypecum select").change(function(){
			 //alert('123')
			 var carpooltype = $("#curtype").text();
			 var html='';
			 //alert(carpooltype)
			 $.post('?s=carpool/carpooltypechange','&carpooltype='+carpooltype,function(data){
				 if(data.ret == 1){
					 $('#curdate').text('每天');
					 $('#sdate').hide();
				 }else{
					 $('#sdate').show();
				 }
			 
			 },'json');
		});
		 //乘客信息提交
		 $('#ok').click(function(data){
			 //alert('123');
			 var area = $('#curarea').text();
			 var areas = $('#curareas').text();
			 //alert(area);
			 //alert(areas);
			 //alert($('#cuminf').serialize());
			 $('#ok').val("提交中...");
			 if($('.canclick').length==0){
				 $(this).addClass("canclick"); 
				 $.post('?s=carpool/cuminf',$('#cuminf').serialize()+'&area='+area+'&areas='+areas,function(data){
					 $('#ok').val("提交");
					 if(data.ret == 3){
						 global_obj.win_alert('添加成功！'); 
						 window.location.href='?s=carpool/index';
					 }else{
						 global_obj.win_alert('添加失败！');
					 }
				 
				 },'json');
			 }
		
		 });
		 
		 //拼车类型改变触发js
		 $("#carpooltype select").change(function(){
			 //alert('123')
			 var carpooltype = $("#curtype").text();
			 var html='';
			 //alert(carpooltype)
			 $.post('?s=carpool/carpooltypechange','&carpooltype='+carpooltype,function(data){
				 if(data.ret == 1){
					 $('#curdate').text('每天');
					 $('#sdate').hide();
				 }else{
					 $('#sdate').show();
				 }
			 
			 },'json');
		});
		 //车主信息提交
		 $('#ownok').click(function(data){
			 //alert('123');
			 var area = $('#curarea').text();
			 var areas = $('#curareas').text();
			 //alert(area);
			 //alert(areas);
			 //alert($('#cuminf').serialize());
			 $('#ownok').val("提交中...");
			 if($('.canclick').length==0){
				 $(this).addClass("canclick"); 
				 $.post('?s=carpool/owninf',$('#owninf').serialize()+'&area='+area+'&areas='+areas,function(data){
					 $('#ownok').val("提交");
					 if(data.ret == 3){
						 global_obj.win_alert('添加成功！'); 
						 window.location.href='?s=carpool/index';
					 }else{
						 global_obj.win_alert('添加失败！');
					 }
				 
				 },'json');
			 }
		
		 });
		 

			if($("#txt_region_1").val()){
				//alert('123');
				var selectedValue=$("#txt_region_1").val();
				var selectedValue2=$("#txt_region_2").val();
				//$("#"+inputer).val(selectedValue);
				//$("#txt_region_1").val('');
				$.post('?s=Shoper/add_product','region1='+selectedValue,function(data){
						if(data.ret == 7){
							html='';
							for(var i=0; i<data.msg.length; i++){
								if(data.msg[i]['area'] == selectedValue2 ){
									html+='<option value="'+data.msg[i]['id']+'" selected="selected" >'+data.msg[i]['area']+'</option>';
								}else{
									html+='<option value="'+data.msg[i]['id']+'">'+data.msg[i]['area']+'</option>';
								}
								
							}
							$('#sel_region_2').html(html);
							select2("sel_region_2","txt_region_2");
							
						}else{
							$('#sel_region_2').html('');
						}
				});
			}
			
			if($("#txt_type_1").val()){
				//alert('123');
				var selectedValue=$("#txt_type_1").val();
				var selected2Value=$("#txt_type_2").val();
				//$("#"+inputer).val(selectedValue);
				//$("#txt_region_1").val('');
				$.post('?s=Shoper/add_product','txttype1='+selectedValue,function(data){
					if(data.ret == 1){
						html='';
						for(var i=0; i<data.msg.length; i++){
							if(data.msg[i]['category'] == selected2Value ){
								html+='<option value="'+data.msg[i]['id']+'" selected="selected">'+data.msg[i]['category']+'</option>';
							}else{
								html+='<option value="'+data.msg[i]['id']+'">'+data.msg[i]['category']+'</option>';
							}
							
						}
						$('#sel_type_2').html(html);
						select2("sel_type_2","txt_type_2");
						
					}else{
						$('#sel_type_2').html('');
					}
			});
			}
});
//时间下拉插件
	function setTime($id)
	{
		var curr = new Date().getFullYear();
		var opt = {
			'time': {
				preset: 'time'
			},
			'select': {
				preset: 'select'
			}
		}
		$id.scroller('destroy').scroller($.extend(opt['time'], {
			theme: 'android-holo',
			mode: 'scroller',
			display: 'bottom',
			animate: 'fade',
			lang: 'zh'
		 }));	 
	}
	 
	//文本下拉插件    select("sel_type_1","txt_type_1");
	function select(selecter,inputer)
	{	
		var opt = {
			'select': {
				preset: 'select'
			}
		}
		
		$("#"+selecter).scroller('destroy').scroller($.extend(opt['select'], {
			theme: 'android-holo',
			mode: 'scroller',
			display: 'bottom',
			animate: 'fade',
			lang:"zh",
			onSelect:function()
			{
				var selectedValue=$("#"+selecter+"_dummy").val();
				$("#"+inputer).val(selectedValue);
				$("#txt_type_2").val('');
				$.post('?s=Shoper/add_product','txttype1='+selectedValue,function(data){
						if(data.ret == 1){
							html='';
							for(var i=0; i<data.msg.length; i++){
								html+='<option value="'+data.msg[i]['id']+'">'+data.msg[i]['category']+'</option>';
							}
							$('#sel_type_2').html(html);
							select2("sel_type_2","txt_type_2");
							
						}else{
							$('#sel_type_2').html('');
						}
				});
			}
		}));
	}
	
	
	//第一个大区域实例化
	function select3(selecter,inputer)
	{	
		var opt = {
			'select': {
				preset: 'select'
			}
		}
		
		$("#"+selecter).scroller('destroy').scroller($.extend(opt['select'], {
			theme: 'android-holo',
			mode: 'scroller',
			display: 'bottom',
			animate: 'fade',
			lang:"zh",
			onSelect:function()
			{
				var selectedValue=$("#"+selecter+"_dummy").val();
				$("#"+inputer).val(selectedValue);
				$("#txt_region_2").val('');
				$.post('?s=Shoper/add_product','region1='+selectedValue,function(data){
						if(data.ret == 7){
							html='';
							for(var i=0; i<data.msg.length; i++){
								html+='<option value="'+data.msg[i]['id']+'">'+data.msg[i]['area']+'</option>';
							}
							$('#sel_region_2').html(html);
							select2("sel_region_2","txt_region_2");
							
						}else{
							$('#sel_region_2').html('');
						}
				});
			}
		}));
	}
	
	//基本的实例化
	function select2(selecter,inputer)
	{	
		var opt = {
			'select': {
				preset: 'select'
			}
		}
		
		$("#"+selecter).scroller('destroy').scroller($.extend(opt['select'], {
			theme: 'android-holo',
			mode: 'scroller',
			display: 'bottom',
			animate: 'fade',
			lang:"zh",
			onSelect:function()
			{
				var selectedValue=$("#"+selecter+"_dummy").val();
				$("#"+inputer).val(selectedValue);
			}
		}));
		
	}
	
	//区域联动JS
	function imitateselect(id) {
		 var aa = document.getElementById(id);
		 var svalue=$(aa).val();
		 //alert(svalue);
		 $('#curareas').html('');
		 $.post('?s=carpool/cuminf','&areaid='+svalue,function(data){
				if(data.ret == 1){
					html='';
					for(var i=0; i<data.msg.length; i++){
						html+='<option value="'+data.msg[i]['id']+'">'+data.msg[i]['area']+'</option>';
					}
					$('#areas').html(html);	
				}else{
					$('#areas').html('');
				}
		 });

	}

