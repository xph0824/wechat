// 适配
	var html=document.getElementsByTagName("html")[0];
	var bod=document.getElementsByTagName("body")[0];
	function getFontSize(){
		var width=document.documentElement.clientWidth||document.body.clientWidth;
		var fontSize=(100/640)*width;
		return fontSize;
	}
	html.style.fontSize=getFontSize()+"px"; 
	window.onload=function(){
		html.style.fontSize=getFontSize()+"px";
		// bod.style.display='block';
	}
	window.onresize=function(){
		html.style.fontSize=getFontSize()+"px";
		// bod.style.display='block';
	}