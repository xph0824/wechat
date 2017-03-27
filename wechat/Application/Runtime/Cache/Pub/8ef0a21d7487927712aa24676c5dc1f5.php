<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我关注谁</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />   
	<meta name="apple-mobile-web-app-status-bar-style" content="black" /> <meta name="format-detection" content="telephone=no" />
	<link rel="stylesheet" href="/wechat/Public/css/common.css">
</head>
<body>
	<div class="allbox">
		<ul class="carefor">
			<div class="brown"></div>
		<?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/resive',array('id'=>$row['openid']));?>">用户信息<i></i><span><?php echo ($row['tel']); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		<?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/device',array('id'=>$row['openid']));?>">血糖仪<i></i><span>【<?php echo ($res['devid']); ?>】</span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	<script type="text/javascript" src="/wechat/Public/js/common.js"></script>	
	<script type="text/javascript" src="/wechat/Public/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
				var hh=$(window).height();
				$(".carefor").height(hh);
			});
	</script>
</body>
</html>