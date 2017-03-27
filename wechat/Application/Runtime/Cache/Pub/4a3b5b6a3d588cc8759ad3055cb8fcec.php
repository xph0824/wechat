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
			<li>餐前偏低</li>
			<h5 class="detailTitle">对照标准</h5>
			<li>餐前偏低<span>血糖&lt; 3.9</span></li>
			<li>餐前正常<span>血糖3.9～6.1</span></li>
			<li>餐前偏高<span>血糖6.1～7.0</span></li>
			<li>餐前严重偏高<span>血糖&gt;7.0</span></li>
		</ul>
		<h5 class="detailTitle">医学专家建议</h5>
		<ul class="detailUl02">
			<li>
				<p>如果在用餐前血糖值低于3.9mmol/L，即为餐前低血糖。餐前低血糖被称为“餐前饥饿现象”，这是糖尿病前期的一个很重要的症状。建议您通过以下几个方面改善血糖状况：<br /><br />
				1、饮食方面：尽可能地定时定量进餐，尤其是早餐，一定要吃；低血糖患者应该限制单糖类的摄入量，少吃或不吃糖分高的生果和果汁；尽量不饮酒或少饮酒，尤其是不能空腹饮酒。具体的饮食原则请参考后文第四点。<br />
				2、运动方面：低血糖患者不可剧烈运动，但需要坚持进行低强度的有氧运动，如快走、慢跑、爬山、游泳、太极等；运动过程中需及时补充食物，避免低血糖发生；运动要适量，也要适时，不要在饥饿或饱食后立即运动。<br />
				3、睡眠方面：规律作息时间，保证睡眠质量；养成午休的习惯，利于平稳血糖。<br />
				4、药物：应用胰岛素等有可能导致低血糖的药物时，要了解这些药物的起效时间，并在起效时间内进餐；药物使用须从小剂量开始，逐渐增加剂量并谨慎调整；对于老年糖友而言，应尽量选择起效快、作用时间短、低血糖风险小的口服降糖药或胰岛素剂型，避免使用长效降糖药；④掌握胰岛素注射技巧，保证把胰岛素正确注射到皮下组织。注意胰岛素的注射部位，如果餐后可能去运动，那么餐前胰岛素应该在腹部注射，一般不要注射到大腿和上臂上，以免肢体运动加快胰岛素的吸收。<br />
				5、控制自己的情绪，低血糖患者不可过于紧张或者激动。</p>
				<br />
				一、餐前血糖偏低的症状<br />
			   	1、饥饿感、心慌、出汗、紧张、软弱无力、面色苍白；<br />
				2、四肢冷汗、发凉、颤抖、心率加快、血压升高；<br />
				3、头痛头晕、不安躁动、语言障碍；<br />
				4、定向力、识别力突然丧失或精神失常；<br />
				5、抽搐、偏瘫、昏睡、呼吸、血压被抑制状态。
			</li>
			<li>
				二、餐前血糖偏低的原因<br />
				 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;当体内血糖升高需要胰岛素的时候，胰岛素没有及时分泌；而当血糖已经降低时，胰岛素却又异常分泌，结果导致了血糖的不正常。<br />
				 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;其主要问题在于胰岛素的分泌延迟和抵抗。这样，当进食后葡萄糖吸收入血，达到高峰时，需要的胰岛素未能及时、充足分泌，造成餐后2小时血糖升高；<br />
				 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;到下一次进餐前，血糖较前下降了，而此时的胰岛素延迟分泌却使得血液中的胰岛素出现高峰，发挥降血糖作用，从而导致血糖的进一步降低，由此发生低血糖。<br />
				 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;这一时段常常发生在餐后3～4小时，也就是下顿餐前。
			</li>
			<li>
				三、餐前血糖偏低的危害<br />
				1、如果血糖更低或持续低血糖的时间更长，就会出现精神和意识障碍，表现在神经中枢功能异常；<br />
				2、低血糖可造成脑细胞得损害,如果低血糖昏迷持续6小时以上的话,脑细胞将受到严重的伤害,可导致痴呆，即使在治疗后脑组织也不能恢复到正常了。<br />
				3、低血糖还会影响心脏的功能,出现心律失常、心绞痛或发生急性心肌梗死等。
			</li>
			<li>
				四、餐前血糖偏低的饮食原则<br />
				1、少吃多餐<br />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;低血糖患者最好少量多餐，--天大约吃6～8餐。睡前吃少量的零食及点心也会有帮助。除此，要交替食物种类，不要经常吃某种食物，因为过敏症常与低血糖症有关。食物过敏将恶化病情，使症状更复杂；<br />
				2、均衡饮食<br />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;饮食应该力求均衡，最少包含50-60％的碳水化合物（和糖尿病患者同样的饮食原则），包括蔬菜、糙米、酪梨、魔芋、种子、核果、谷类、瘦肉、鱼、酸乳、生乳酪；<br />
				3、应加以限制的食物<br />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;严格限制单糖类摄取量，要尽量少吃精制及加工产品（例如，速食米及马铃薯）、白面粉、汽水、酒、盐。避免糖分高的水果及果汁（例如，葡萄汁混合50％的水饮用）。也少吃通心粉、面条、肉汁、白米、玉米片、番薯。豆类及马铃薯可以一周吃2次；<br />
				4、增加高纤维饮食<br />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;高纤饮食有助于稳定血糖浓度。当血糖下降时，可将纤维与蛋白质食品合用（例如，麦麸饼子加生乳酪或杏仁果酱）。吃新鲜苹果取代苹果酱，苹果中的纤维能抑制血糖的波动，也町加一杯果汁，以迅速提升血糖浓度。 纤维本身也可延缓血糖下降，餐前半小时，先服用纤维素，以稳定血糖。两餐之间服用螺旋藻片，可进一步地稳定血糖浓度；<br />
				5、戒烟禁酒<br />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;酒精、咖啡因、抽烟都将严重影响血糖的稳定，最好能戒除或少用；<br />
				6、低血糖患者应该严酷的限制单糖类的摄入量，少吃一些精制品或加工品，制止食用糖分高的生果和果汁；<br />
				7、面粉做的细条状食品、白米、甘薯、通心粉和粟米片都应该少吃；<br />
				8、戒烟禁酒。酒精、咖啡因、抽烟都将严重影响血糖的稳定，最好能戒除或少用。
			</li>
		</ul>
	</div>
	<script type="text/javascript" src="/wechat/Public/suggest/js/common.js"></script>	
</body>
</html>