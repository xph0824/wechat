<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>中国糖尿病风险评估</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />   
	<meta name="apple-mobile-web-app-status-bar-style" content="black" /> <meta name="format-detection" content="telephone=no" />
	<link rel="stylesheet" href="/wechat/Public/css/common.css">
	<link rel="stylesheet" href="/wechat/Public/css/text.css">
</head>
<body>
	<div class="allbox">
		<div class="sugar_text">
			<section class="sugar_page sugar_page_block">
				<div class="sugar_page_num">1/6</div>
				<p>1.您的年龄阶段（岁）</p>
				<div class="sugar_first sugar_Input_box">
					<div><label for=""><input type="radio" name="ages" value='0'></label>20~24</div>
					<div><label for=""><input type="radio" name="ages" value='4'></label>25~34</div>
					<div><label for=""><input type="radio" name="ages" value='8'></label>35~39</div>
					<div><label for=""><input type="radio" name="ages" value='11'></label>40~44</div>
					<div><label for=""><input type="radio" name="ages" value='12'></label>45~49</div>
					<div><label for=""><input type="radio" name="ages" value='13'></label>50~54</div>
					<div><label for=""><input type="radio" name="ages" value='15'></label>55~59</div>
					<div><label for=""><input type="radio" name="ages" value='16'></label>60~64</div>
					<div><label for=""><input type="radio" name="ages" value='18'></label>65~74</div>
				</div>
				<div class="button_box"><input type="button" value="下一题" class="text__next_button first_button"></div>
			</section>
			<section class="sugar_page">
				<div class="sugar_page_num">2/6</div>
				<p>2.体重指数（BMI=体重（kg）/身高（㎡））</p>
				<div class="sugar_second sugar_Input_box">
					<div><label for=""><input type="radio" name="weight" value='0'></label>&lt;22</div>
					<div><label for=""><input type="radio" name="weight" value='1'></label>22~23.9</div>
					<div><label for=""><input type="radio" name="weight" value='3'></label>24~29.9</div>
					<div><label for=""><input type="radio" name="weight" value='5'></label>&gt;30</div>		
				</div>
				<div class="button_box">
					<input type="button" value="上一题" class="text_pre_button">
					<input type="button" value="下一题" class="text__next_button text_right_next">
				</div>
			</section>
			<section class="sugar_page">
				<div class="sugar_page_num">3/6</div>
				<p>3.腰围（厘米）</p>
				<div class="sugar_third sugar_Input_box">
					<div><label for=""><input type="radio" name="waist" value='0'></label>男性&lt;75，女性&lt;70</div>
					<div><label for=""><input type="radio" name="waist" value='3'></label>男性75~79.9，女性70~74.9</div>
					<div><label for=""><input type="radio" name="waist" value='5'></label>男性80~84.9，女性75~79.9</div>
					<div><label for=""><input type="radio" name="waist" value='7'></label>男性85~89.9，女性80~84.9</div>
					<div><label for=""><input type="radio" name="waist" value='8'></label>男性90~94.9，女性85~89.9</div>
					<div><label for=""><input type="radio" name="waist" value='10'></label>男性&gt;=95，女性&gt;=90</div>		
				</div>
				<div class="button_box">
					<input type="button" value="上一题" class="text_pre_button">
					<input type="button" value="下一题" class="text__next_button text_right_next">
				</div>
			</section>
			<section class="sugar_page">
				<div class="sugar_page_num">4/6</div>
				<p>4.收缩压（毫米汞柱）</p>
				<div class="sugar_fourth sugar_Input_box">
					<div><label for=""><input type="radio" name="pressure" value='0'></label>&lt;110</div>
					<div><label for=""><input type="radio" name="pressure" value='1'></label>110~119</div>
					<div><label for=""><input type="radio" name="pressure" value='3'></label>120~129</div>
					<div><label for=""><input type="radio" name="pressure" value='6'></label>130~139</div>
					<div><label for=""><input type="radio" name="pressure" value='7'></label>140~149</div>
					<div><label for=""><input type="radio" name="pressure" value='8'></label>150~159</div>
					<div><label for=""><input type="radio" name="pressure" value='10'></label>&gt;=160</div>		
				</div>
				<div class="button_box">
					<input type="button" value="上一题" class="text_pre_button">
					<input type="button" value="下一题" class="text__next_button text_right_next">
				</div>
			</section>
			<section class="sugar_page">
				<div class="sugar_page_num">5/6</div>
				<p>5.糖尿病家族史（父母、同胞、子女）</p>
				<div class="sugar_fifth sugar_Input_box">
					<div><label for=""><input type="radio" name="medical_history" value='0'></label>无</div>
					<div><label for=""><input type="radio" name="medical_history" value='6'></label>有</div>		
				</div>
				<div class="button_box">
					<input type="button" value="上一题" class="text_pre_button">
					<input type="button" value="下一题" class="text__next_button text_right_next">
				</div>
			</section>
			<section class="sugar_page">
				<div class="sugar_page_num">6/6</div>
				<p>6.性别</p>
				<div class="sugar_sixth sugar_Input_box">
					<div><label for=""><input type="radio" name="medical_history" value='0'></label>女性</div>
					<div><label for=""><input type="radio" name="medical_history" value='2'></label>男性</div>		
				</div>
				<div class="button_box">
					<input type="button" value="上一题" class="text_pre_button">
					<input type="button" value="提交" class="text_right_next text__next_button text_sub_button">
				</div>
			</section>
			<!-- 评测结果 -->
			<div class="sugar_text_result sugar_page">
				<div class="sugar_top"></div>
				<div class="sugar_circle">
					<img src="/wechat/Public/img/zhen.png" alt="" class="sugar_zhen_img">
					<p class="sugar_result"></p>
				</div>
				<ul class="sugar_result_ul">
					<li><span></span><p>您的评估得分：<i class="sugar_result_02"></i>分</p></li>
					<li><span></span><p class="sugar_result_change"></p></li>			
				</ul>
				<div class="text_again"><a href="sular_text.html">重新评估</a></div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="/wechat/Public/js/common.js"></script>	
	<script type="text/javascript" src="/wechat/Public/js/jquery-1.11.3.min.js"></script>	
	<script type="text/javascript">
		$(document).ready(function() {
			var hh=$(window).height();
			$(".sugar_page").height(hh);
		});
		var sc01,sc02,sc03,sc04,sc05,sc06;
		$(".sugar_first div").click(function() {
			$(".sugar_first div label").removeClass('sugar_age_sele');
			$(this).children("label").children('input').prop('checked', 'true');
			$(this).children("label").addClass('sugar_age_sele');
			sc01=parseInt($(this).children('label').children('input').val());
		});
		$(".sugar_second div").click(function() {
			$(".sugar_second div label").removeClass('sugar_age_sele');
			$(this).children("label").children('input').prop('checked', 'true');
			$(this).children("label").addClass('sugar_age_sele');
			sc02=parseInt($(this).children('label').children('input').val());
		});
		$(".sugar_third div").click(function() {
			$(".sugar_third div label").removeClass('sugar_age_sele');
			$(this).children("label").children('input').prop('checked', 'true');
			$(this).children("label").addClass('sugar_age_sele');
			sc03=parseInt($(this).children('label').children('input').val());
		});
		// 控糖须知
		$(".sugar_fourth div").click(function() {
			$(".sugar_fourth div label").removeClass('sugar_age_sele');
			$(this).children("label").children('input').prop('checked', 'true');
			$(this).children("label").addClass('sugar_age_sele');
			sc04=parseInt($(this).children('label').children('input').val());
		});
		$(".sugar_fifth div").click(function() {
			$(".sugar_fifth div label").removeClass('sugar_age_sele');
			$(this).children("label").children('input').prop('checked', 'true');
			$(this).children("label").addClass('sugar_age_sele');
			sc05=parseInt($(this).children('label').children('input').val());
		});
		$(".sugar_sixth div").click(function() {
			$(".sugar_sixth div label").removeClass('sugar_age_sele');
			$(this).children("label").children('input').prop('checked', 'true');
			$(this).children("label").addClass('sugar_age_sele');
			sc06=parseInt($(this).children('label').children('input').val());
		});
		// 下一题跳转下一题
		$(".sugar_page .text__next_button").click(function() {
			var su_index=$(".sugar_page .text__next_button").index(this);
			var su_val=$(this).parents(".sugar_page").children('.sugar_Input_box').children('div').children('label').children('input:radio:checked').val();
			if(su_val==null){
                alert("请根据您的实际情况选择!");
                return false;
            }else{
                $(".sugar_page").eq(su_index+1).addClass('sugar_page_block').siblings().removeClass('sugar_page_block');
            }	
		});
		// 上一题跳转上一题
		$(".sugar_page .text_pre_button").click(function() {
			var su_index=$(".sugar_page .text_pre_button").index(this);
            $(".sugar_page").eq(su_index).addClass('sugar_page_block').siblings().removeClass('sugar_page_block');
		});
		// 提交分数	// 评测结果
		$(".text_sub_button").click(function() {
			var total=parseInt(sc01+sc02+sc03+sc04+sc05+sc06);
			if (total>=25) {
				$(".sugar_result").css('color', '#c03433');
				$(".sugar_result_02").css('color', '#c03433');
				$(".sugar_result_change").html('根据中国糖尿病和代谢综合征研究数据制定的中国糖尿病风险评分系统，一般得分≥25分者，糖尿病风险较高，有必要到医院做口服葡萄糖耐量试验。');
			}else{
				$(".sugar_result").css('color', '#96ba67');
				$(".sugar_result_02").css('color', '#93cb4a');
				$(".sugar_result_change").html('根据中国糖尿病和代谢综合征研究数据制定的中国糖尿病风险评分系统，一般得分＜25分者，糖尿病风险较低。')
			}
			$(".sugar_result").html(total);
			$(".sugar_result_02").html(total);
			var cc=Math.round($(".sugar_result").html()*(270/50))+'deg';
			$(".sugar_zhen_img").css('webkit-transform', 'rotate('+cc+')');
		});



	

		
	</script>
</body>
</html>