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
				<p>餐后</p>
			</div>
			<div class="circle02">
				<a href="tel:010-51758587"><img src="/wechat/Public/suggest/phone.png" alt=""></a>
				<p>健康咨询师</p>
			</div>
		</div>
		<ul class="detail">
			<h5 class="detailTitle">血糖报告</h5>
			<li>餐后正常</li>
			<h5 class="detailTitle">对照标准</h5>
			<li>餐后偏低<span>血糖&lt; 3.9</span></li>
			<li>餐后正常<span>血糖3.9～7.7</span></li>
			<li>餐后偏高<span>血糖7.8～11.1</span></li>
			<li>餐后严重偏高<span>血糖&gt;11.1</span></li>
		</ul>
		<h5 class="detailTitle">医学专家建议</h5>
		<ul class="detailUl02">
			<li>
				<p>在医学上，餐后2小时血糖的正常值在3.9～7.7mmol/L以内，在该范围内则表示血糖水平正常。建议您关注以下几个方面继续保持血糖正常状况：<br /><br />
				1、饮食方面：保持良好规律的饮食习惯；不暴饮暴食，膳食营养搭配要科学合理；多吃蔬菜水果，少吃零食。具体的饮食原则请参考后文第四点。<br />
				2、运动方面：生命在于运动，坚持锻炼是保持健康的必备因素；每天坚持锻炼半小时到一小时，达到标准的运动量即可；保持正常的体重。<br />
				3、睡眠方面：保持良好的睡眠质量，规律作息时间；养成午休的习惯，利于保持血糖平稳。<br />
				4、药物：血糖正常的情况下不需要借助药物保持血糖状况。<br />
				5、保持乐观积极的心态对血糖的平稳有着重要的作用。</p>
				<br />
				一、血糖的正常状态<br />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;正常情况下，血糖浓度在一天之中是轻度波动的。一般来说餐前血糖略低，餐后血糖略高，但这种波动是保持在一定范围内的。<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;因为正常人血糖的产生和利用是处于动态平衡之中，因此可以维持血糖相对稳定，既不会过高，也不会过低。<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;正常人的空腹血糖波动3.9～6.1mmol/L之间，空腹血糖浓度超过6.1mmol/L称为高血糖，血糖浓度低于2.8mmol/L称为低血糖；而糖尿病人血糖浓度低于3.9mmol/L即为低血糖。<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;根据世界卫生组织糖尿病专家委员会报告1999年版标准，服糖后2小时毛细血管全血血糖应该小于7.8mmol/L。 <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;同时依据专家共识形成的经验值，正常人的餐后1小时血糖应小于8.9mmol/L，餐后2小时血糖应小于6.7mmol/L，仅作为参考。<br />
				二、如何维持血糖正常：<br />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;血糖的调节主要依靠体内胰高血糖素和胰岛素的相互制约和调节使得血糖处于正常状态。<br />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;影响餐后血糖的因素很多，主要包括饮食结构和自身的代谢状态。要想血糖维持在正常水平，首先自己的饮食结构一定要健康科学，荤素搭配均衡，各种营养的摄入要保持正常的量，其次，要维持胰岛素和胰高血糖素的正常分泌，就要控制情绪波动，保持良好的心态，餐后进行适量运动，糖尿病患者要注意制定合理的治疗方案及有效执行。
			</li>
			<li>
				三、血糖正常的重要性：<br />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;糖类物质是我们身体必不可少的营养物质之一，既提供了生命活动所需的大部分能量，又是细胞构成的重要成分之一，人体细胞所需的糖都来自血液输送的葡萄糖，血糖的浓度能够反映出人体糖类代谢利用的情况及自身的健康状态，所以维持合适的血糖浓度至关重要。血糖降至3.8mmol/L时，人就会感到饥饿、倦怠、疲乏；降至3.6mmol/L时，就会饥肠辘辘；若不采取措施，血糖继续降低，将会导致晕眩、心律紊乱、两腿发软、意识模糊基至危及生命，即所谓的“低血糖症”；如果长期血糖水平过高不能得到有效控制，放任高血糖状态的持续存在最终就会导致糖尿病及并发症发生。

			</li>
			<li>
				四、稳定血糖必备的营养素：<br />
				1、蛋白质；<br />
    			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;蛋白质时一切生命的物质基础，是人体细胞的重要组成部分，是人体组织更新和修补的主要原料。优质蛋白包括：肉类、鱼贝类、鸡蛋、奶酪、豆制品等，大部分植物性蛋白质营养价值低于动物性蛋白。<br />
				2、糖类；<br />
    			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;糖类是为人体提供能量的能源物质，如摄入不足，人体会精力不足、容易疲乏、大脑迟钝甚至可能丧失意识。我们每日所需糖类主要从淀粉类食物中获取，如大米、面粉、红薯等。<br />
				3、脂类；<br />
    			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;脂类是人体重要的营养之一，是维持人体健康必不可少的营养成分，但摄入过多会导致肥胖，进而导致动脉硬化等疾病发生，应保持理想的摄入比例，对肉类、黄油、奶油等动物性脂肪应减少摄入。<br />
				4、维生素；<br />
    			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;维生素是人体正常功能必备的营养素，虽然维生素的生理需求量很少，但维生素不足会导致多种疾病，蔬菜是补充维生素C的最好来源，粗粮和肉类可补充维生素B，日常生活中应当保证维生素的正常供给。<br />
				5、矿物质；<br />
    			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;矿物质是人体必备的微量元素，必须从食物中获取，我国的膳食结构中容易缺乏的矿物质是钙和铁，应当注意补充。<br />
				6、膳食纤维<br />
    			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;膳食纤维是人体消化系统内不能被消化吸收的物质，但对人体的健康有着不可替代的作用，有助于糖尿病患者长期血糖控制，还有助于我们的饮食控制和体重控制。豆类、富含纤维的谷物类、水果、蔬菜和全麦食物均为膳食纤维的良好来源。<br />
				7、水；<br />
    			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;水的摄入也是维持血糖正常的必不可少的因素，要科学合理的安排水的摄入量。
			</li>
		</ul>
	</div>
	<script type="text/javascript" src="/wechat/Public/suggest/js/common.js"></script>	
</body>
</html>