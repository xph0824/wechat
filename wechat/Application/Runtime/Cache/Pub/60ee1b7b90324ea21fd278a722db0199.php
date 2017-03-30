<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改成功</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />   
	<meta name="apple-mobile-web-app-status-bar-style" content="black" /> <meta name="format-detection" content="telephone=no" />
	<link rel="stylesheet" href="/wechat/Public/css/common.css">
</head>
<body>
	<div class="allbox">
		<div class="success">
			<img src="/wechat/Public/img/success.png" alt="">
			<p>恭喜您，修改成功</p>
			<a href="JavaScript:WeixinJSBridge.call('closeWindow');">确定</a>
		</div>
	</div>
	<script type="text/javascript" src="/wechat/Public/js/common.js"></script>	
	<script type="text/javascript" src="/wechat/Public/js/jquery-1.11.3.min.js"></script>
</body>
</html>