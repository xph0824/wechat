<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>日期查看</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />   
	<meta name="apple-mobile-web-app-status-bar-style" content="black" /> <meta name="format-detection" content="telephone=no" />
	<link rel="stylesheet" href="/wechat/Public/css/month.css">
	<link rel="stylesheet" href="/wechat/Public/css/swiper-3.3.1.min.css">
	<script type="text/javascript" src="/wechat/Public/js/echarts.js"></script>
</head>
<body>
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<div class="date">
				<ul class="date_uls">
					<li class="date_select">日</li>
					<li>周</li>
					<li>月</li>
					<li>年</li>
				</ul>
				<div class="section">
					<div class="date_section dateSecBlock">
						<p class="sectionP"><i class="date_left"></i><span><?php echo ($time); ?></span><i class="date_right"></i></p>
						<div id="dateChart" width="640" height="330"></div>
					</div>
					<div class="date_section">
						<p class="sectionP"><i class="date_left"></i><span><?php echo ($startday); ?>至<?php echo ($endday); ?></span><i class="date_right"></i></p>
						<div id="dateChart2"></div>
					</div>
					<div class="date_section">
						<p class="sectionP"><i class="date_left"></i><span><?php echo ($month); ?></span><i class="date_right"></i></p>
						<div id="dateChart3"></div>
					</div>
					<div class="date_section">
						<p class="sectionP"><i class="date_left"></i><span><?php echo ($year); ?></span><i class="date_right"></i></p>
						<div id="dateChart4"></div>
					</div>
				</div>
				<div class="po_hei"></div>
				<ol class="date_ols">
					<p class="date_ol_title">餐前血糖</p>
					<volist name="arr" id="result">
					<li>平均<span><i><?php echo ($arr['avg2']); ?></i>mmol/L</span></li>
					<li>最高<span><i><?php echo ($arr['max2']); ?></i>mmol/L</span></li>
					<li>最低<span><i><?php echo ($arr['min2']); ?></i>mmol/L</span></li>
					<volist>
					<p class="date_ol_title">对照标准</p>
					<li>餐前偏低<span>血糖&lt;3.9</span></li>
					<li>餐前正常<span>血糖3.9~6.1</span></li>
					<li>餐前偏高<span>血糖6.1~7.0</span></li>
					<li>餐前严重偏高<span>血糖&gt;7.0</span></li>
					
					<p class="date_ol_title">餐后血糖</p>
					<volist name="arr" id="result">
					<li>平均<span><i><?php echo ($arr['avg1']); ?></i>mmol/L</span></li>
					<li>最高<span><i><?php echo ($arr['max1']); ?></i>mmol/L</span></li>
					<li>最低<span><i><?php echo ($arr['min1']); ?></i>mmol/L</span></li>
					<volist>
					<p class="date_ol_title">对照标准</p>
					<li>餐后偏低<span>血糖&lt;3.9</span></li>
					<li>餐后正常<span>血糖3.9~7.7</span></li>
					<li>餐后偏高<span>血糖7.8~11.1</span></li>
					<li>餐后严重偏高<span>血糖&gt;11.1</span></li>
				</ol>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="/wechat/Public/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/wechat/Public/js/month.js"></script>	
	<script type="text/javascript">
		$(".date_uls li").click(function() {
			var dateLiIndex=$(".date_uls li").index(this);
			$(this).addClass('date_select').siblings().removeClass('date_select');
			$(".date_section").eq(dateLiIndex).addClass('dateSecBlock').siblings().removeClass('dateSecBlock');
		});
			// 日
					// 基于准备好的dom，初始化echarts实例
			        var myChart = echarts.init(document.getElementById('dateChart'));
			        // 指定图表的配置项和数据
			        var option = {
			        	backgroundColor: '#fff',
			        	color:['#4c4c4c'],
			            title: {
			                text: '血糖状态：',
			                textStyle: {
							        fontWeight: 'normal', 
							    }
			            },
			            tooltip: {},
			            legend: {
			                data:['餐前','餐后'],
			               itemWidth:45,
			               itemHeight:20,
			               left:'26%',
			            },
			            xAxis: {
			                data: <?php echo ($dtime); ?>,
			                textStyle: {
							        color: '#4c4c4c'
							    },
			            },
			            yAxis: {
			            	 splitLine:{ 
				                      show:false 
				               },
			            },

			            series: [
				            {
				                name: '餐前',
				                type: 'bar',
				                data: <?php echo ($bloodglu2); ?>,
				                itemStyle: {   
			                        //通常情况下：
			                        normal:{  　　　　
			                            color: function (params){
			                                var colorList = ['#6eb92b'];
			                                return colorList[params.dataIndex];
			                            }
			                        },
			                    },
				            },
			            {
			                name: '餐后',
			                type: 'bar',
			                data: <?php echo ($bloodglu1); ?>,
			                itemStyle: {   
		                        //通常情况下：
		                        normal:{  
		                            color: function (params){
		                                var colorList = ['#2bb975'];
		                                return colorList[params.dataIndex];
		                            }
		                        },
		                    },
			            }
			            ]
			        };
			        // 使用刚指定的配置项和数据显示图表。
			        myChart.setOption(option);
	        // 周
	        		// 基于准备好的dom，初始化echarts实例
			        var myChart2 = echarts.init(document.getElementById('dateChart2'));
			        // 指定图表的配置项和数据
			        var option = {
			        	backgroundColor: '#fff',
			        	color:['#4c4c4c'],
			            title: {
			                text: '血糖状态：',
			                textStyle: {
							        fontWeight: 'normal', 
							    }
			            },
			            tooltip: {},
			            legend: {
			                data:['餐前','餐后'],
			                itemWidth:45,
			               itemHeight:20,
			               left:'26%',
			            },
			            xAxis: {
			                data: <?php echo ($temp); ?>,
			            },
			            yAxis: {
			            	 splitLine:{ 
				                      show:false 
				               },
			            },
			            series: [{
			                name: '餐前',
			                type: 'bar',
			                data: <?php echo ($wbloodglu2); ?>,
			                itemStyle: {   
		                        //通常情况下：
		                        normal:{  
		                            color: function (params){
		                                var colorList = ['#6eb92b'];
		                                return colorList[params.dataIndex];
		                            }
		                        },
		                    },
			            },
			            {
			                name: '餐后',
			                type: 'bar',
			                data: <?php echo ($wbloodglu1); ?>,
			                itemStyle: {   
		                        //通常情况下：
		                        normal:{  
		                            color: function (params){
		                                var colorList = ['#2bb975'];
		                                return colorList[params.dataIndex];
		                            }
		                        },
		                    },
			            }
			            ]
			        };
			        // 使用刚指定的配置项和数据显示图表。
			        myChart2.setOption(option);
	        // 月
	        	// 基于准备好的dom，初始化echarts实例
			        var myChart3 = echarts.init(document.getElementById('dateChart3'));
			        // 指定图表的配置项和数据
			        var option = {
			            backgroundColor: '#fff',
			        	color:['#4c4c4c'],
			            title: {
			                text: '血糖状态：',
			                textStyle: {
							        fontWeight: 'normal', 
							    }
			            },
			            tooltip: {},
			            legend: {
			                data:['餐前','餐后'],
			                itemWidth:45,
			               itemHeight:20,
			               left:'26%',
			            },
			            xAxis: {
			                data: <?php echo ($mtime); ?>,
			            },
			            yAxis: {
			            	 splitLine:{ 
				                      show:false 
				               },
			            },
			            series: [{
			                name: '餐前',
			                type: 'bar',
			                data: <?php echo ($mbloodglu2); ?>,
			                itemStyle: {   
		                        //通常情况下：
		                        normal:{  
		                            color: function (params){
		                                var colorList = ['#6eb92b'];
		                                return colorList[params.dataIndex];
		                            }
		                        },
		                    },
			            },
			            {
			                name: '餐后',
			                type: 'bar',
			                data: <?php echo ($mbloodglu1); ?>,
			                itemStyle: {   
		                        //通常情况下：
		                        normal:{  
		                            color: function (params){
		                                var colorList = ['#2bb975'];
		                                return colorList[params.dataIndex];
		                            }
		                        },
		                    },
			            }
			            ]
			        };
			        // 使用刚指定的配置项和数据显示图表。
			        myChart3.setOption(option);
	        // 年
	        		// 基于准备好的dom，初始化echarts实例
			        var myChart4 = echarts.init(document.getElementById('dateChart4'));
			        // 指定图表的配置项和数据
			        var option = {
			            backgroundColor: '#fff',
			        	color:['#4c4c4c'],
			            title: {
			                text: '血糖状态：',
			                textStyle: {
							        fontWeight: 'normal', 
							    }
			            },
			            tooltip: {},
			            legend: {
			                data:['餐前','餐后'],
			                itemWidth:45,
			               itemHeight:20,
			               left:'26%',
			            },
			            xAxis: {
			                data: [],
			            },
			            yAxis: {
			            	 splitLine:{ 
				                      show:false 
				               },
			            },
			            series: [{
			                name: '餐前',
			                type: 'bar',
			                data: <?php echo ($ybloodglu2); ?>,
			                itemStyle: {   
		                        //通常情况下：
		                        normal:{  
		                            color: function (params){
		                                var colorList = ['#6eb92b'];
		                                return colorList[params.dataIndex];
		                            }
		                        },
		                    },
			            },
			            {
			                name: '餐后',
			                type: 'bar',
			                data: <?php echo ($ybloodglu1); ?>,
			                itemStyle: {   
		                        //通常情况下：
		                        normal:{  
		                            color: function (params){
		                                var colorList = ['#2bb975'];
		                                return colorList[params.dataIndex];
		                            }
		                        },
		                    },
			            }
			            ]
			        };
			        // 使用刚指定的配置项和数据显示图表。
			        myChart4.setOption(option);

	</script>
</body>
</html>