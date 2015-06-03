	$(document).ready(function(){
		var box_h=$("#metro_box").height();
		var box_w=$("#metro_box").width();
		$("#metro_box").css("margin-top",(($(window).height()-box_h)/2)-10+"px");
		//var img_h=$(".arr_left img").height();
		//var img_w=$(".arr_left img").width();
		//$(".prev").css("position","absolute").css("left","10px").css("top",($(window).height()-img_h)/2);
		//$(".next").css("position","absolute").css("right","10px").css("top",($(window).height()-img_h)/2);
		//链接在新窗口打开
		$(".a_link dd a").attr("target","_blank");
		$(".a_link ul li>a").hover(function(){
			var a_href=$(this).attr("href");			
			$(this).siblings().find("a").attr("href",a_href);
		});
		
		//切屏-----------------------------------------------------------------
		$("#top dl dd a").click(function(){
			var now_class=$(this).attr("class");	
			$("#top dl dd a.a_index").attr("class","a_index");
			$("#top dl dd a.a_mzdw").attr("class","a_mzdw");
			$("#top dl dd a.a_spyy").attr("class","a_spyy");
			$("#top dl dd a.a_xwzx").attr("class","a_xwzx");
			$("#top dl dd a.a_gwtb").attr("class","a_gwtb");
			$("#top dl dd a.a_yxyl").attr("class","a_yxyl");
			$("#top dl dd a.a_sygj").attr("class","a_sygj");
			$("#top dl dd a.a_yszy").attr("class","a_yszy");
			$(this).attr("class",now_class).addClass(now_class+"_h");			
			var index=$(this).index();
			$("#metro_box dd").hide();
			$("#metro_box dd").eq(index).toggle(100);
			if(index==1){
				$("body").attr("class","bg0");	
			}
			switch (index){
				case 0:
					$("body").attr("class","");						
					break;
				case 1:
					$("body").attr("class","bg0");					
					break;
				case 2:
					$("body").attr("class","bg1");						
					break;
				case 3:
					$("body").attr("class","bg2");					
					break;
				case 4:
					$("body").attr("class","bg3");					
					break;
				case 5:
					$("body").attr("class","bg4");						
					break;	
				case 6:
					$("body").attr("class","bg5");						
					break;	
				default :
					$("body").attr("class","bg6");						
			}
			
			<!--[if IE 6]>$("#metro_box dd").eq(index).show(300);<![endif]-->			
		});
	});
