<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>月报表</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />   
	<meta name="apple-mobile-web-app-status-bar-style" content="black" /> <meta name="format-detection" content="telephone=no" />
	<link rel="stylesheet" href="/wechat/Public/css/swiper-3.3.1.min.css">
	<link rel="stylesheet" href="/wechat/Public/css/month.css">
	<script type="text/javascript" src="/wechat/Public/js/echarts.js"></script>
</head>
<body>
	<div class="swiper-container">
	    <div class="swiper-wrapper">
			<!-- 第三张 -->
	        <div class="swiper-slide">
	        	<div class="month3">
	        		<p class="titleP">您和小益的亲密接触</p>
	        		<div class="times">共测量<br /><span><?php echo ($arr['count']); ?></span><br />次</div>
	        		<p class="timeShow">您本月测量<span><?php echo ($arr['count']); ?></span>次。</p>
	        		<hr>
	        		<ol>
	        			<p>小贴士：</p>
	        			<li>1、每天测量能更好的掌握血糖变化；</li>
	        			<li>2、同时段的数据对比会更加科学，应继续保持；</li>
	        		</ol>
	        	</div>
	        	<div class="month_page">
					1/6
				</div>
	        </div>
	    	<!-- 第一张 -->
	        <div class="swiper-slide">
				<div class="month01">
					<p class="titleP">血糖月报</p>
					<img src="/wechat/Public/img/month01.png" alt="">
					<p class="mean">
					<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i; endforeach; endif; else: echo "" ;endif; ?>
						<!-- 您本月的平均血糖值<span><?php echo ($arr['avg']); ?></span>mmol/L,最高血糖值<span><?php echo ($arr['max']); ?></span>mmol/L，最低血糖值<span><?php echo ($arr['min']); ?></span>mmol/L。 -->
						您本月餐前血糖最高值为<span><?php echo ($arr['max2']); ?></span>mmol/L，最低为<span><?php echo ($arr['min2']); ?></span>mmol/L，检测<span><?php echo ($arr['total2']); ?></span>次，达标<span><?php echo ($arr['normal2']); ?></span>次。<br />
						餐后血糖最高值为<span><?php echo ($arr['max1']); ?></span>mmol/L，最低为<span><?php echo ($arr['min1']); ?></span>mmol/L，检测<span><?php echo ($arr['total1']); ?></span>次，达标<span><?php echo ($arr['normal1']); ?></span>次。
					</p>
				</div>
				<div class="month_page">
					2/6
				</div>
	        </div>
	        <!-- 第二张 -->
 	        <div class="swiper-slide">
	        	<div class="month02">
	        		<p class="titleP">血糖值评估</p>
	        		<ul>
	        			<li><span class="color01">餐前偏低 </span><i class="be">血糖&lt;3.9</i></li>
	        			<li><span class="color02">餐前偏高 </span><i class="be">血糖6.1~7.0</i></li>
	        			<li><span class="color03">餐前严重偏高 </span><i class="be">血糖&gt;7.0</i></li>
	        			<li><span class="color04">餐前正常 </span><i class="be">血糖3.9 ~ 6.1</i></li>
	        			<li><span class="color01">餐后偏低 </span><i class="aft">血糖&lt;3.9</i></li>
	        			<li><span class="color02">餐后偏高 </span><i class="aft">血糖7.8～11.1</i></li>
	        			<li><span class="color03">餐后严重偏高 </span><i class="aft">血糖&gt;11.1</i></li>
	        			<li style="border-bottom:0"><span class="color04">餐后正常 </span><i class="aft">血糖3.9～7.7</i></li>
	        		</ul>
	        		<div>您本月血糖值餐前异常<span><?php echo ($arr['abnormal2']); ?></span>次，餐后异常<span><?php echo ($arr['abnormal1']); ?></span>次。<br />血糖异常健康指导请致电<a href="tel:010-51758587" style="color:#2a90d7;text-decoration:underline">010-51758587</a>咨询。</div>
	        	</div>
	        	<div class="month_page">
					3/6
				</div>
	        </div> 
			
	       
	        <!-- 第四张 -->
	        <div class="swiper-slide">
	        	<div class="month4">
	        		<p class="titleP">走势分析</p>
	        		<div class="colorInstruc">
	        			<i></i>高血糖
	        			<i></i>正常值
	        			<i></i>低血糖
	        		</div>
	        		<!-- Echarts -->
	        		<div id="mychart">        			
	        		</div>
	        		<script type="text/javascript">
	        			// 基于准备好的dom，初始化echarts实例
				        var myChart = echarts.init(document.getElementById('mychart'));
				        // 指定图表的配置项和数据
				        var option = {
				            title: {},
				            tooltip: { trigger: 'axis'},
				            legend: {
				            	// 
				            	show:false
				            },
				            xAxis: {
				                data: ["月初","月末"],
								 <!-- ["<?php echo ($test_time1['0']); ?>", "<?php echo ($mtest_time1['0']); ?>"], -->
				                textStyle:{
						            fontSize: 20,
						        	color: '#5a5a5a'
						        }      
				            },
				            yAxis: {
				            	 splitLine:{ 
					                      show:false 
					               },
				            },
				            series: [
					            {
					                name: '餐前血糖',
					                type: 'bar',
					                data: [<?php echo ($bloodglu2['0']); ?>, <?php echo ($mbloodglu2['0']); ?>],
					                barWidth : 38,
					                itemStyle: {   
				                        //通常情况下：
				                        normal:{  
				        　　　　　　　　　　　　//每个柱子的颜色即为colorList数组里的每一项，如果柱子数目多于colorList的长度，则柱子颜色循环使用该数组
				                            color: function (params){ 
				                            	var index_color = params.value;
			                                    if(index_color<3.9){
			                                        return '#25dcbc';
			                                    }else if(index_color>3.9&&index_color<6.1){
			                                        return '#8aec47';
			                                    }else{
			                                    	return '#eab835';
			                                    }
				                            },
				                        },
				                    },
					            },
					            {
					            	name: '餐后血糖',
					                type: 'bar',
					                data: [<?php echo ($bloodglu1['0']); ?>, <?php echo ($mbloodglu1['0']); ?>],
					                barWidth : 38,
					                itemStyle: {   
				                        //通常情况下：
				                        normal:{  
				        　　　　　　　　　　　　//每个柱子的颜色即为colorList数组里的每一项，如果柱子数目多于colorList的长度，则柱子颜色循环使用该数组
				                            color: function (params){ 
				                            	var index_color = params.value;
			                                    if(index_color<3.9){
			                                        return '#25dcbc';
			                                    }else if(index_color>3.9&&index_color<7.7){
			                                        return '#8aec47';
			                                    }else{
			                                    	return '#eab835';
			                                    }
				                            }
				                        },
				                    },
					            }

				            ]
				        };
				        // 使用刚指定的配置项和数据显示图表。
				        myChart.setOption(option);
	        		</script>
	        		<!-- <div class="month4Mean">本月您的血糖平均值为：<span><?php echo ($arr['avg']); ?></span>mmol/L ，<?php echo ($arr['hint']); ?>于正常值<span><?php echo ($arr['bad']); ?></span>。</div> -->
	        	</div>
	        	<div class="month_page">
					4/6
				</div>
	        </div>
	        <!-- 第五张 -->
	        <div class="swiper-slide">
	        	<div class="month5">
	        		<p class="titleP">月初的你VS现在的你</p>
	        		<!-- <ul>
	        			<li class="monthStart">月初测量：<span><?php echo ($test_time1['0']); ?></span></li>
	        			<li class="monthEnd">月末测量：<span><?php echo ($mtest_time1['0']); ?></span></li>
	        		</ul> -->
	        	<!-- 	<ol>
	        			<li>餐前<span class="colorGre"><?php echo ($bloodglu2['0']); ?></span>mmol/L<span class="colorYel"><?php echo ($mbloodglu2['0']); ?></span>mmol/L</li>
	        			<li>餐后<span class="colorGre"><?php echo ($bloodglu1['0']); ?></span>mmol/L<span class="colorYel"><?php echo ($mbloodglu1['0']); ?></span>mmol/L</li>
	        		</ol> -->
					<table class="month5_table">
						<tr>
							<th>时段</th>
							<th>月初测量</th>
							<th>月末测量</th>
						</tr>
						<tr>
							<th>餐前</th>
							<td><span style="color:#00a23f"><?php echo ($bloodglu2['0']); ?></span>mmol/L</td>
							<td><span style="color:#ac8e1f"><?php echo ($bloodglu1['0']); ?></span>mmol/L</td>
						</tr>
						<tr>
							<th>餐后</th>
							<td><span style="color:#00a23f"><?php echo ($mbloodglu2['0']); ?></span>mmol/L</td>
							<td><span style="color:#ac8e1f"><?php echo ($mbloodglu1['0']); ?></span>mmol/L</td>
						</tr>
					</table>
	        	</div>
	        	<div class="month_page">
					5/6
				</div>
	        </div>
	        <!-- 第六张 -->
	        <div class="swiper-slide">
				<div class="month6">
	        		<img src="/wechat/Public/img/month0603.png" alt="">
	        		<p class="month6_title"><span>2017年3月</span>，小益与您并肩进步</p>
	        		<ul>
	        			<p>春分：春捂养阳防春寒，治怒怡情好心态。</p>
						<li>1、春分后，春阳之气上升快，人体的血液循环和激素分泌增强，应注意调节睡眠，合理饮食，平衡血糖血脂。</li>
						<li>2、春分饮食：禁忌大热、大寒的饮食，保持寒热均匀。</li>
					</ul
	        	</div>
	        	<div class="month_page">
					6/6
				</div>
	        </div>
	    </div>
	</div>
	<script type="text/javascript" src="/wechat/Public/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/wechat/Public/js/month.js"></script>	
	<script type="text/javascript" src="/wechat/Public/js/swiper-3.3.1.min.js"></script>	
	<script type="text/javascript">
		var mySwiper = new Swiper('.swiper-container',{
		loop : true,
		})


		$(document).ready(function(){
			
			<!-- 餐前餐后颜色判断 -->
			if(<?php echo ($arr['condavg1']); ?><3.9){
				$(".be").eq(0).addClass("presentBefore").siblings().removeClass("presentBefore");
			}else if(<?php echo ($arr['condavg1']); ?>>=6.1 && <?php echo ($arr['condavg1']); ?><7.0){
				$(".be").eq(1).addClass("presentBefore").siblings().removeClass("presentBefore");
			}else if(<?php echo ($arr['condavg1']); ?>>=3.9 && <?php echo ($arr['condavg1']); ?><6.1){
				$(".be").eq(3).addClass("presentBefore").siblings().removeClass("presentBefore");
			}else{
				$(".be").eq(2).addClass("presentBefore").siblings().removeClass("presentBefore");
			}
	
			if(<?php echo ($arr['condavg2']); ?><3.9){
				$(".aft").eq(0).addClass("persentAfter").siblings().removeClass("persentAfter");
			}else if(<?php echo ($arr['condavg2']); ?>>=7.8 && <?php echo ($arr['condavg2']); ?><11.1){
				$(".aft").eq(1).addClass("persentAfter").siblings().removeClass("persentAfter");
			}else if(<?php echo ($arr['condavg2']); ?>>=3.9 && <?php echo ($arr['condavg2']); ?><7.7){
				$(".aft").eq(3).addClass("persentAfter").siblings().removeClass("persentAfter");
			}else{
				$(".aft").eq(2).addClass("persentAfter").siblings().removeClass("persentAfter");
			}
			
		})

	</script>

</body>
</html>