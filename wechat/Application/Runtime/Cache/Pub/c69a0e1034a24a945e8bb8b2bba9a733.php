<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>设备详情</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />   
	<meta name="apple-mobile-web-app-status-bar-style" content="black" /> <meta name="format-detection" content="telephone=no" />
	<link rel="stylesheet" href="/wechat/Public/css/common.css">
</head>
<body>
	<div class="allbox">
	<?php if(is_array($openid)): $i = 0; $__LIST__ = $openid;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><ul class="device_ul">
			<div class="brown"></div>
			<li><a href="<?php echo U('Index/img',array('id'=>$res));?>">设备二维码<i></i></a></li>			 
			<li><a href="<?php echo U('Index/resive',array('id'=>$res));?>">使用人信息修改<i></i></a></li>			
			<li><a href="<?php echo U('Index/handle');?>">操作指南<i></i></a></li>
			<li><a href="<?php echo U('Index/question');?>">试用问答<i></i></a></li>
		</ul><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<script type="text/javascript" src="/wechat/Public/js/common.js"></script>	
	<script type="text/javascript" src="/wechat/Public/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
				var hh=$(window).height();
				$(".device_ul").height(hh);
			});
	</script>
</body>
</html>