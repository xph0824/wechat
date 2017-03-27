<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>血糖仪个人中心</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />   
	<meta name="apple-mobile-web-app-status-bar-style" content="black" /> <meta name="format-detection" content="telephone=no" />
	<link rel="stylesheet" href="/wechat/Public/css/common.css">
</head>
<body>
	<div class="allbox">
		<div class="personBig">
			<div class="personalDiv">
				<div class="personal_cir01">
					<p class="personal_cir02">
					<?php if(is_array($head)): $i = 0; $__LIST__ = $head;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><img src="<?php echo ($res); ?>" alt=""><?php endforeach; endif; else: echo "" ;endif; ?>	
					</p>
				</div>
				<div class="personal_rig">
				<?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><p class="personalName"><?php echo ($row['user']); ?></p>
					<p class="personalAddre">地址：<span><?php echo ($row['province']); ?></span></p><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
			<ul class="personalUl">
				<li><a href="<?php echo U('Index/carefor',array('id'=>$row['openid']));?>"><i><img src="/wechat/Public/img/personal01.png" alt=""></i>我关注谁<span></span></a></li>
				<li><a href="<?php echo U('Index/health_report',array('id'=>$row['openid']));?>"><i><img src="/wechat/Public/img/personal02.png" alt=""></i>健康报告<span></span></a></li>
				<!-- <li><a href=""><i><img src="/wechat/Public/img/personal03.png" alt=""></i>咨询历史<span></span></a></li> -->
			</ul>
		</div>
	</div>
	<script type="text/javascript" src="/wechat/Public/js/common.js"></script>
	<script type="text/javascript" src="/wechat/Public/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var hh=$(window).height();
			$(".personBig").height(hh);
		});
	</script>
</body>
</html>