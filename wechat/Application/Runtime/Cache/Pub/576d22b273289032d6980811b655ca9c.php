<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>健康报告</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />   
	<meta name="apple-mobile-web-app-status-bar-style" content="black" /> <meta name="format-detection" content="telephone=no" />
	<link rel="stylesheet" href="/wechat/Public/css/common.css">
	<link rel="stylesheet" href="/wechat/Public/css/mui.min.css">
	<link rel="stylesheet" href="/wechat/Public/css/setting.css">
	<link rel="stylesheet" href="/wechat/Public/css/mui.picker.min.css">
</head>
<body>
	<div class="allbox">
		<ul class="health_report">
			<div class="brown"></div>
			<li class="health_report_user">&nbsp;&nbsp;用户
				<?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><span class="ture_user"><?php echo ($res['user']); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
			</li>
			<li><a href=""><span>2017年1月</span><i></i></a></li>
			<li><a href=""><span>2016年12月</span><i></i></a></li>
			<li><a href=""><span>2016年11月</span><i></i></a></li>
		<!-- 	<li class="health_report_time">&nbsp;&nbsp;选择月份查看
				<i></i>
				<span class="true_time"></span>
			</li> -->
			<ul class="mui-table-view mui-table-view-chevron">
				<li class="mui-table-view-cell health_report_time">
					<a href="javascript:changeMonth()" class="mui-navigate-right">选择月份查看 <span id="showMonth" class="mui-pull-right update"></span><b></b></a>
				</li>
			</ul>
		</ul>
	</div>
	<script type="text/javascript" src="/wechat/Public/js/common.js"></script>	
	<script type="text/javascript" src="/wechat/Public/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/wechat/Public/js/mui.min.js"></script>
	<script type="text/javascript" src="/wechat/Public/js/mui.picker.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
				var hh=$(window).height();
				$(".health_report").height(hh);
		});
			function changeMonth(){
			/*
			 * 首次显示时实例化组件
			 * 示例为了简洁，将 options 放在了按钮的 dom 上
			 * 也可以直接通过代码声明 optinos 用于实例化 DtPicker
			 */
			var options = {"type":"month"};
			var picker = new mui.DtPicker(options);
			picker.show(function(rs) {
				/*
				 * rs.value 拼合后的 value
				 * rs.text 拼合后的 text
				 * rs.y 年，可以通过 rs.y.vaue 和 rs.y.text 获取值和文本
				 * rs.m 月，用法同年
				 * rs.d 日，用法同年
				 * rs.h 时，用法同年
				 * rs.i 分（minutes 的第二个字母），用法同年
				 */
	//			result.innerText = '选择结果: ' + rs.text;
				$("#showMonth").html('月份: ' + rs.text);
				picker.dispose();
				//页面跳转，查看月报
				showReport(rs.text);
			});
		}
		
		function changeUser(){
			//普通示例
			var userPicker = new mui.PopPicker();
			var userList = [];
			var pdata = [];
			for(var i=0; i<userList.length; i++){
				pdata[i] = {'value': userList[i].id, 'text': userList[i].userName};
			}
			userPicker.setData(pdata);
			userPicker.show(function(items) {
				$("#showUser").html(items[0].text);
				$("#userId").val(items[0].value);
				//返回 false 可以阻止选择框的关闭
				//return false;
			});
		}
		
		function showReport(date){
			//var aa = <?php echo ($res['openid']); ?>;
			window.location.href="http://test.ykzp.com/wechat/index.php/Pub/Index/month_look?openid=<?php echo ($res['openid']); ?>&date="+date;
		}
		
		/**
		 * 查看月报
		 * @param date	月份
		 */
		<!-- function showReport(date){ -->
			<!-- var userId = $("#userId").val(); -->
			<!-- if(userId == null || userId == ""){ -->
				<!-- alert("请先选择用户"); -->
				<!-- return ; -->
			<!-- } -->
			<!-- window.location.href="/userMonReport.htm?userId="+userId+"&date=" + date; -->
		<!-- } -->
	</script>	
</body>
</html>