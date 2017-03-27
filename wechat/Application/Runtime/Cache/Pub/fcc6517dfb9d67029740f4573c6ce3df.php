<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>设备二维码</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />   
	<meta name="apple-mobile-web-app-status-bar-style" content="black" /> <meta name="format-detection" content="telephone=no" />
	<link rel="stylesheet" href="/wechat/Public/css/common.css">
	
</head>
<body>

	<div class="allbox">
		<div class="success" >
			<?php if(is_array($url)): $i = 0; $__LIST__ = $url;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><img src="<?php echo ($res); ?>" alt="" style="width:200px;height:200px;"><?php endforeach; endif; else: echo "" ;endif; ?>
			<p>二维码</p>
			<a href="JavaScript:WeixinJSBridge.call('closeWindow');">确定</a>
		</div>
	</div>
	<script type="text/javascript" src="/wechat/Public/js/common.js"></script>	
	<script type="text/javascript" src="/wechat/Public/js/jquery-1.11.3.min.js"></script>
</body>
</html>