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
			<li>餐后严重偏高</li>
			<h5 class="detailTitle">对照标准</h5>
			<li>餐后偏低<span>血糖&lt; 3.9</span></li>
			<li>餐后正常<span>血糖3.9～7.7</span></li>
			<li>餐后偏高<span>血糖7.8～11.1</span></li>
			<li>餐后严重偏高<span>血糖&gt;11.1</span></li>
		</ul>
		<h5 class="detailTitle">医学专家建议</h5>
		<ul class="detailUl02">
			<li>
				<p>在医学上，餐后2小时血糖的正常值在3.9～7.7mmol/L以内，如果高于这一范围，称为高血糖，当检查到血糖值高于11.1mmol/L时，可先判定为“疑似糖尿病”，当再次检查后结果仍高于11.1mmol/L时，即可确诊为糖尿病。建议您通过以下几个方面改善血糖状况：<br /><br />
				1、饮食方面：需要严格控制饮食，平衡膳食，饮食多样化，做到主食粗细搭配，副食荤素搭配；避免食用肥肉、全脂和油炸食品，选用鱼类、瘦肉等低脂蛋白食品，多吃粗粮、蔬菜等高纤维食品；限盐、限酒、戒烟。具体的饮食原则请参考后文第四点。<br />
				2、运动方面：坚持进行有氧运动，如快走、慢跑、爬山、游泳、太极等；有计划地进行中高强度运动，如球类比赛、跳绳等；运动要适量，也要适时，不要在饥饿或饱食后立即运动。<br />
				3、睡眠方面：提升睡眠质量，规律作息时间；养成午休的习惯，利于平稳血糖。<br />
				4、药物：降糖药的选用需要根据糖尿病的病情发展来定，结合药物的特点以及自身情况，选择适合自己的药物；选择作用机制互补的两种或多种降糖药物进行治疗，可延缓糖尿病慢性并发症的发生和发展；平稳降糖，避免低血糖；④目前临床上常用的降糖药物较多，如：双胍类、胰岛素促泌剂、α-糖苷酶抑制剂等，需要在医生指导下服用。<br />
				5、控制自己的情绪，保持良好的心情有利于血糖的控制。</p>
				<br />
				一、糖尿病的症状<br />
				1、典型表现<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;血糖水平高是糖尿病最突出的特征。糖尿病的典型表现常被描述为。三多一少。，即多饮、多食、多尿和体重下降。<br />
				（1）多饮<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;糖尿病患者的每日饮水量多在2000～3000毫升以上，有的病人每天的饮水量基至要用暖壶来计算。<br />
				（2）多食<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;也就是吃得多。糖尿病患者食欲亢进，老有吃不饱的感觉，甚至每天吃五六次饭，主食达两三斤，副食也比正常人明显增多，即便这样，还总觉得饿。这是因为糖尿病患者血糖高但不能被利用，因此机体能量不足，患者只能靠多吃食物来弥补。<br />
				（3）多尿<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;指尿的总量多和排尿的次数多。糖尿病患者每昼夜尿量可达3000～5000毫升，最高可达10000毫升以上。除了尿量多，糖尿病患者的排尿次数也比常人多，一两个小时就可能要尿一回，有的病人甚至每昼夜要尿30多次。<br />
				（4）体重下降<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;虽然糖尿病患者吃得多，但因为不能有效利用葡萄糖，所以机体总是处于能量不足的状态，只能靠分解体内储存的脂肪和蛋白质来提供能量，长此以往，能量入不敷出，体重自然下降。<br />
				2、不典型症状：<br />
				（1）疲乏无力<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;糖尿病患者身体内缺乏胰岛素或存在胰岛素抵抗，导致血糖不能顺利进入细胞，使得细胞缺乏能量。大约2/3的糖尿病患者有疲乏无力的症状。<br />
				（2）容易感染<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;糖尿病患者免疫功能差，抵抗力降低，容易出现皮肤疥肿，呼吸、泌尿系统的各种炎症，而且治疗起来比较困难。<br />
				（3）皮肤感觉异常<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;这一症状是糖尿病神经系统并发症引起的，表现为四肢末梢部位皮肤感觉异常，如蚁走感(老感觉有蚂蚁在皮肤上爬似的)、麻木、针刺感、瘙痒等，女性可以外阴瘙痒为首发症状。<br />
				（4）视力障碍<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;糖尿病可引起眼部合并症，表现为视力减退、黑瞳、失明等<br />
				（5）性功能障碍<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;糖尿病造成的血管、神经系统病变以及心理障碍等可引发男性阳痿，女性性冷淡、月经失调等性功能障碍表现。<br />
				（6）不明原因的下肢水肿<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;由于机体缺乏能量，蛋白质被异常分解，含量下降，因而出现低蛋白性水肿。这种水肿容易出现在身体的低垂部位，例如脚或小腿。<br />
				（7）排尿困难<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;部分糖尿病患者排尿意识弱，排尿间隔时间延长，，乃至排尿困难，膀胱内余尿增多膀胱扩张。严重者可出现尿路感染、尿液逆流、肾功能衰竭等合并症。<br />
				（8）手足挛缩<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;手掌不能伸平，平放呈拱形，手掌皮肤可以摸到索状硬结，按压的时候有痛感，局部皮肤粗糙，严重者手指向掌侧拘缩，这是糖尿病血管病变的一种表现。
			</li>
			<li>
				二、糖尿病的病因：<br />
				1、遗传因素<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;现代研究发现，2型糖尿病有明显的遗传倾向，具有家族聚集性。<br />
				2、饮食因素<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;糖尿病是吃出来的病，这是不争的事实，我国传统的饮食结构以谷物类粮食为主，这种饮食结构让人们远离了糖尿病、高脂血症和冠心病，而在80年代以后，生活水平的提高导致了饮食结构的变化，从以前的谷物类营养逐步变成了肉、蛋、水产品、油脂类食物，也因此，糖尿病的发病率逐年上升。<br />
				3、缺乏运动<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;糖尿病是懒出来的病，吃的越来越多，越来越好，却不运动，这就导致了体内的营养物质堆积、过剩，久而久之，糖尿病就上身了。运动是防治糖尿病的有效措施，长期坚持运动能增强体质，促进身体代谢，改善心肺功能，降糖降脂。<br />
				4、吸烟<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;吸烟是造成糖尿病的一个独立危险因素，且吸烟量越大，糖尿病发病率越高，吸烟可能通过氧化应激、炎症反应等，导致胰岛素抵抗的发生。吸烟也可引起交感神经系统活性增加，导致升血糖激素释放增多，对抗胰岛素的作用。吸烟还可使胰岛素介导的葡萄糖摄取和利用降低。另有研究表明，烟草中的尼古丁对胰岛吕细胞和胰岛素受一体敏感性有直接损害作用。吸烟还会改变机体脂肪的分布，造成腹型肥胖，从而间接导致糖尿病的发生。<br />
				5、肥胖<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;在糖尿病患者中，80%都是肥胖者。而且，发生肥胖的时间越长，患糖尿病的机会就越大。根本原因就在于肥胖者体内存在着胰岛素抵抗。另外，肥胖引起的炎症反应、氧化应激损伤等还会直接损伤胰岛0细胞，引起胰岛素的合成和分泌障碍。肥胖与糖尿病就像一对“孪生兄弟”，它们常常如影随形。<br />
				6、心理因素<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;现代医学认为，糖尿病的发生与精神刺激及不良的情绪关系密切。工作节奏快，生活压力大，一天到晚精神紧张的人易患糖尿病。当人处在紧张、激动、焦虑、恐惧或受惊吓等不良情绪状态时，交感神经兴奋，抑制胰岛素的分泌。其次，长期处于紧张、焦虑状态，体内的一些应激性激素(比如肾上腺素、去甲肾上腺素、糖皮质激素等)的水平会升高，这些应激性激素能够对抗胰岛素，使胰岛素降血糖的作用下降，因而血糖就不易控制。再者，压力会刺激人对高糖和高脂食物的渴求，这无形中也增加了糖尿病发生的危险性。<br />
				7、年龄因素<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;糖尿病的发病率也随年龄的增长而增加。不论男女和种族，20岁以下人群糖尿病的发生率都比较低，40岁以上者则随着年龄的增长发病率上升，一般60～70岁达到发病高峰。因而，糖尿病也被称为与年龄相关的老年性疾病。
			</li>
			<li>
				三、糖尿病的危害：<br />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;糖尿病是人类健康的“无声的、甜蜜的”杀手，一般而言，糖尿病的危害主要包括以下几个方面：<br />
				1、糖尿病急性并发症：<br />
			    急性严重代谢紊乱，包括糖尿病酮症酸中毒、非酮症高渗性糖尿病昏迷、乳酸酸中毒等，若不及时救治甚至可以危及生命。<br />
				2、感染性疾病，因糖尿病病人抵抗力低下，常发生疖、痈等皮肤化脓性感染，女性病人可见膀胱炎和肾盂肾炎。<br />
				3、糖尿病慢性并发症：<br />
				（1）心脏病变（冠心病、糖尿病性心肌病）可引起猝死；<br />
				（2）脑血管病变（如脑血栓等）可引起瘫痪、昏迷等；<br />
				（3）糖尿病神经病变可出现四肢麻木疼痛、感觉丧失、无痛性心肌梗死，体味性低血压，胃轻瘫，阳痿等；<br />
				（4）糖尿病肾病可进展至尿毒症；<br />
				（5）糖尿病视网膜病变严重时会导致失明；<br />
				（6）糖尿病足合并感染可导致下肢溃疡及坏疽甚至截肢。
			</li>
			<li>
				四、糖尿病饮食原则：<br />
				1、根据自身情况，制定个体化的饮食计划<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;个体化饮食计划应该包括食物选择的优化，尽量做到平衡膳食，以合理摄入各种营养素。<br />
				2、合理控制热量摄入，达到或维持标准体重。<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;能量摄入在成人以能够达到或维持理想体重为标准；儿童青少年则保持正常生长发育为标准；妊娠期糖尿病则需要同时保证胎儿与母体的营养需求。<br />
				3、适当控制碳水化合物摄入，但不宜控制过严。<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;主食控制过严虽然对降低血糖有帮助，但可能对血脂代谢有不利影响。<br />
				4、摄入适量的蛋白质。<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;蛋白质是构成、修复更新人体组织及调节生理功能等作用的重要营养素。糖尿病患者的蛋白质摄入量与一般人群类似，通常不超过能量摄入量的20%。<br />
				5、控制脂肪和胆固醇的摄入。<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;过高的脂肪摄入量可导致心血管病发病风险增加，应将脂肪总量占供能比控制在30%以下。限制膳食胆固醇摄入有助于控制血胆固醇水平，建议将膳食胆固醇摄入限制在每天300mg以内。<br />
				6、适量补充膳食纤维。<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;膳食纤维有助于糖尿病患者长期血糖控制。豆类、富含纤维的谷物类、水果、蔬菜和全麦食物均为膳食纤维的良好来源。<br />
				7、维生素及无机盐供给量应满足机体需要，它们是调节生理功能不可缺少的营养素。<br />
				8、一日至少三餐，并尽量做到少量多餐，每餐应定时定量。<br />
				9、限盐，限酒，戒烟。<br />
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;提倡清淡饮食，尤其是合并高血压的患者，食盐应限量在每天5克以内。有心功能不全症状的糖尿病患者，食盐摄入量应少于每天2克。如果糖尿病患者想要饮酒，最好咨询医生或营养师后进行，并且把饮酒量计算入总能量范围内。
			</li>
		</ul>
	</div>
	<script type="text/javascript" src="/wechat/Public/suggest/js/common.js"></script>	
</body>
</html>