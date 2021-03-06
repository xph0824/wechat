<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />   
	<meta name="apple-mobile-web-app-status-bar-style" content="black" /> 
	<meta name="format-detection" content="telephone=no" />
	<link rel="stylesheet" href="/wechat/Public/css/common.css">
</head>
<body>
	<div class="allbox">
		<div class="topDiv">
			<img src="/wechat/Public/img/logo123.png" alt="" class="logo">
			<!-- <?php if(is_array($user_info)): $i = 0; $__LIST__ = $user_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Index/myhome',array('openid'=>$user_info['openid']));?>" class="personal"><img src="/wechat/Public/img/personal.png" alt=""></a><?php endforeach; endif; else: echo "" ;endif; ?> -->
			<div class="blood_Num">
				<span style="display:inline-block;margin-top:0.2rem;font-size:0.34rem">血糖值</span>
			<?php if(is_array($record)): $i = 0; $__LIST__ = $record;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><p><?php echo ($res['bloodglu']); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
				<span>mmol/L</span>					
			</div>
			<div class="indexJumpDiv"><a href="<?php echo U('index/cartogram',array('openid'=>$user_info['openid']));?>" class="indexJump">历史数据记录<!-- &nbsp;<img src="/wechat/Public/img/point.png" alt=""> --></a></div>
			<!-- <p class="blood_yi"></p> -->
		</div>
		<div class="bloodNum_analy">
			云健康智能血糖仪
		</div>
		<ul class="blood_select">
			<li class="blood_now">餐前血糖</li>
			<li>餐后血糖</li>
		</ul>
		<div class="bloodContent">
			<ul class="bloodSection bloodShow">
				<h6 class="beforeBlood">餐前血糖</h6>
				<volist name="arr" id="result">
				<li>平均<span><i><?php echo ($arr['avg2']); ?></i>mmol/L</span></li>
				<li>最高<span><i><?php echo ($arr['max2']); ?></i>mmol/L</span></li>
				<li>最低<span><i><?php echo ($arr['min2']); ?></i>mmol/L</span></li>
				<volist>
				<h6 class="beforeBlood">对照标准</h6>
				<li>餐前偏低<span>血糖&lt; 3.9</span></li>
				<li>餐前正常<span>血糖3.9～6.1</span></li>
				<li>餐前偏高<span>血糖6.1～7.0</span></li>
				<li>餐前严重偏高<span>血糖&gt;7.0</span></li>
				<!-- <div class="indexJumpDiv"><a href="" class="indexJump">历史数据记录<img src="/wechat/Public/img/point.png" alt=""></a></div> -->
				
			</ul>
			<ul class="bloodSection">
				<h6 class="beforeBlood">餐后血糖</h6>
				<volist name="arr" id="result">
				<li>平均<span><i><?php echo ($arr['avg1']); ?></i>mmol/L</span></li>
				<li>最高<span><i><?php echo ($arr['max1']); ?></i>mmol/L</span></li>
				<li>最低<span><i><?php echo ($arr['min1']); ?></i>mmol/L</span></li>
				<volist>
				<h6 class="beforeBlood">对照标准</h6>
				<li>餐后偏低<span>血糖&lt;3.9</span></li>
				<li>餐后正常<span>血糖3.9~7.7</span></li>
				<li>餐后偏高<span>血糖7.8~11.1</span></li>
				<li>餐后严重偏高<span>血糖&gt;11.1</span></li>
				
			</ul>
		</div>
		<div class="bot"></div>
		<ul class="footer">
			<li>
				<a href="tel:010-51758587" id="alink" >
					<p><img src="/wechat/Public/img/teacher.png" alt="" class="footerImg01"></p>
					<span>健康咨询师</span>
				</a>
			</li>
			<li>
				<a href="http://www8.53kf.com/m.php?cid=72052991">
					<p><img src="/wechat/Public/img/online.png" alt="" class="footerImg02"></p>
					<span>在线咨询</span>
				</a>
			</li>
			<li>
				<a href="http://h.eqxiu.com/s/7botOlhm">
					<p><img src="/wechat/Public/img/docter.png" alt="" class="footerImg03"></p>
					<span>国医预约</span>
				</a>
			</li>
		</ul>
	</div>
	<script type="text/javascript" src="/wechat/Public/js/common.js"></script>	
	<script type="text/javascript" src="/wechat/Public/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		$(".blood_select li").click(function() {
			var bloodIndex=$(".blood_select li").index(this);
			$(this).addClass('blood_now').siblings().removeClass('blood_now');
			$(".bloodSection").eq(bloodIndex).addClass('bloodShow').siblings().removeClass('bloodShow');
		});
		
	</script>	
</body>
</html>