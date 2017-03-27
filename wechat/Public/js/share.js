// 适配
	var html=document.getElementsByTagName("html")[0];
	var bod=document.getElementsByTagName("body")[0];
	function getFontSize(){
		var width=document.documentElement.clientWidth||document.body.clientWidth;
		var fontSize=(100/720)*width;
		return fontSize;
	}
	html.style.fontSize=getFontSize()+"px"; 
	window.onload=function(){
		html.style.fontSize=getFontSize()+"px";
		bod.style.display='block';
		var winh=$(window).height();
		$(".sharebox").height(winh);
		$(".member").height(winh);
		$(".show").height(winh);
	}
	window.onresize=function(){
		html.style.fontSize=getFontSize()+"px";
		bod.style.display='block';
		var winh=$(window).height();
		$(".sharebox").height(winh);
		$(".member").height(winh);
		$(".show").height(winh);
	}