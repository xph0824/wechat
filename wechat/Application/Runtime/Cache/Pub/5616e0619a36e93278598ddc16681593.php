<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>血糖评测</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<link rel="stylesheet" href="/wechat/Public/suggest/css/common.css">
</head>
<body>
	<div class="allBox">
		<div class="top_title">
		<?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><span><?php echo ($res); ?></span> 血糖测量详情<?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<div class="blood">
			<div class="circle01">
				<?php if(is_array($temp)): $i = 0; $__LIST__ = $temp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><p><?php echo ($res); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
				<p>mmol/L</p>
				<p>餐前</p>
			</div>
			<div class="circle02">
				<a href="tel:010-51758587"><img src="/wechat/Public/suggest/phone.png" alt=""></a>
				<p>健康咨询师</p>
			</div>
		</div>
		<ul class="detail">
			<h5 class="detailTitle">血糖报告</h5>
			<li>餐前正常</li>
			<h5 class="detailTitle">对照标准</h5>
			<li>餐前偏低<span>血糖&lt; 3.9</span></li>
			<li>餐前正常<span>血糖3.9～6.1</span></li>
			<li>餐前偏高<span>血糖6.1～7.0</span></li>
			<li>餐前严重偏高<span>血糖&gt;7.0</span></li>
		</ul>
		<h5 class="detailTitle">医学专家建议</h5>
		<ul class="detailUl02">
			<li>
				<p>如果在用餐前血糖值处于3.9~6.1 mmol/L之间，那么血糖值就属于正常范围内。建议您通过以下几个方面保持血糖状况：<br /><br />
				1、饮食方面：保持良好规律的饮食习惯；不暴饮暴食，膳食营养搭配要科学合理；保持体重，多吃蔬菜水果，少吃零食。<br />
				2、运动方面：生命在于运动，坚持锻炼是保持健康的必备因素；每天坚持锻炼半小时到一小时，达到标准的运动量即可；<br />
				3、睡眠方面：保持良好的睡眠质量，规律作息时间；养成午休的习惯，利于保持血糖平稳。<br />
				4、药物：血糖正常的情况下不需要借助药物保持血糖状况。<br />
				5、保持乐观积极的心态对血糖的平稳有着重要的作用。</p>
				<br />
				一、注意事项：<br />
			   	1、筛查糖尿病一定不要只顾空腹血糖，最好能够查一查餐后2小时血糖。<br />
				2、对于糖友而言，即使餐前血糖值正常，也要注意控制饮食范围以及进食量，避免餐后血糖突然增高的现象。<br />
				3、以下人群请重点测量餐后血糖：老年人、肥胖、超重、有家族病史、合并心脑血管疾病、妊娠糖尿病史、运动少等高危人群均应特别关注餐后血糖。以便尽早发现高血糖，并及时采取干预措施。
			</li>
			<li>
				二、维持血糖正常的生活准则：<br />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;生活方式干预主要包括饮食控制和运动。包括保证膳食平衡，限制摄入的总热量和脂肪成分，限制饮酒，多食蔬菜及高纤维食物以及进行规律持久的体育运动等。<br />
				具体的目标是：<br />
				1、肥胖或超重者体重指数BMI，即体重（kg）/身高（ ）达到或接近24kg/m2，或体重至少减少5%-10%；<br />
				2、至少减少每日饮食总热量400-500千卡；<br />
				3、饱和脂肪酸摄入占总脂肪酸摄入的30%以下；<br />
				4、体力活动增加到250-300分钟/周。
			</li>
		</ul>
	</div>
	<script type="text/javascript" src="/wechat/Public/suggest/js/common.js"></script>	
</body>
</html>