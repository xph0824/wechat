<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户信息修改</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />   
	<meta name="apple-mobile-web-app-status-bar-style" content="black" /> <meta name="format-detection" content="telephone=no" />
	<link rel="stylesheet" href="/wechat/Public/css/common.css">
</head>
<body>
	<div class="allbox">
		<ul class="revise">
			<div class="brown"></div>
			<form action="<?php echo U('Index/resive');?>" enctype="multipart/form-data" method="post" id="reviseForm" name="reviseForm"> 
				<?php if(is_array($quantity)): $i = 0; $__LIST__ = $quantity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><li>
						<!--<a href="<?php echo U('Index/unfollow');?>" class="revisePerson">-->
							<label>已绑微信用户：</label>						
							<p><span><?php echo ($res); ?></span>&nbsp人<i></i></p>								
						<!--</a>-->
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><input type="hidden" name="register_id" value="<?php echo ($row['register_id']); ?>">
					<li>
			            <label for="revise_num">使用人电话：</label>
			            <input type="text" id="revise_num" name="tel" value="<?php echo ($row['tel']); ?>" />
			        </li>
		          
	                <li class="resiveCon">
			            <label for="revise_connection">与您的关系：</label>
			            <input type="text" id="revise_connection" name="connection" value="<?php echo ($row['connection']); ?>" readonly />
			        </li>
			        <li>
			            <label for="resive_user">使用人姓名：</label>
			            <input type="text" id="resive_user" name="user" value="<?php echo ($row['user']); ?>" />
			        </li>
		            <li>
			            <label for="resive_sex">使用人性别：</label>
			            <input type="text" id="resive_sex" name="sex" value="<?php echo ($row['sex']); ?>" readonly/>
			        </li><?php endforeach; endif; else: echo "" ;endif; ?>
	                <input type="submit" value="确认修改" id="resive_sub">
			</form>
		</ul>
		<!-- 遮罩层 -->
		<div class="op">
		</div>
		<!-- 性别弹框 -->
		<ul class="sex_box">
        	<li>
        		<label for=""><input type="radio" name="sex" value="男">男</label>
        	</li>
        	<li>
        		<label for=""><input type="radio" name="sex" value="女">女</label>
        	</li>
        </ul>
        <!-- 关系弹框 -->
        <ul class="connect_s">
        	<li>
        		<label for=""><input type="radio" name="con" value="爸爸">爸爸</label>
        	</li>
        	<li>
        		<label for=""><input type="radio" name="con" value="妈妈">妈妈</label>
        	</li>
        	<li>
        		<label for=""><input type="radio" name="con" value="自己">自己</label>
        	</li>
        	<li>
        		<label for=""><input type="radio" name="con" value="丈夫">丈夫</label>
        	</li>
        	<li>
        		<label for=""><input type="radio" name="con" value="老婆">老婆</label>
        	</li>
        	<li>
        		<label for=""><input type="radio" name="con" value="岳父">岳父</label>
        	</li>
        	<li>
        		<label for=""><input type="radio" name="con" value="岳母">岳母</label>
        	</li>
        	<li>
        		<label for=""><input type="radio" name="con" value="婆婆">婆婆</label>
        	</li>
        	<li>
        		<label for=""><input type="radio" name="con" value="公公">公公</label>
        	</li>
        	<li>
        		<label for=""><input type="radio" name="con" value="爷爷">爷爷</label>
        	</li>
        	<li>
        		<label for=""><input type="radio" name="con" value="奶奶">奶奶</label>
        	</li>
        	<li>
        		<label for=""><input type="radio" name="con" value="外公">外公</label>
        	</li>
        	<li>
        		<label for=""><input type="radio" name="con" value="外婆">外婆</label>
        	</li>
        	<li>
        		<label for=""><input type="radio" name="con" value="哥哥">哥哥</label>
        	</li>
        	<li>
        		<label for=""><input type="radio" name="con" value="姐姐">姐姐</label>
        	</li>
        	<li>
        		<label for=""><input type="radio" name="con" value="弟弟">弟弟</label>
        	</li>
        	<li>
        		<label for=""><input type="radio" name="con" value="妹妹">妹妹</label>
        	</li>
        	<li>
        		<label for=""><input type="radio" name="con" value="同事">同事</label>
        	</li>
        </ul>
	</div>
	<script type="text/javascript" src="/wechat/Public/js/common.js"></script>	
	<script type="text/javascript" src="/wechat/Public/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		var isphone= /^1[34578]\d{9}$/;
		var isname=/^[\u4E00-\u9FA5\uf900-\ufa2d]{2,10}$/;
		$(document).ready(function() {
				var hh=$(window).height();
				$(".revise").height(hh);
				$(".op").css({
					height: hh,
					display: 'none'
			});
		});
			// 性别弹出框
		$("#resive_sex").click(function() {			
			$(".op").css({
				display: 'block'
			});
			$(".sex_box").css('display', 'block');
		});
		// 性别点击
		$(".sex_box li").click(function() {
			$(this).children('label').children('input').prop('checked','true');
			var sexVal=$(this).children('label').children('input').val();
			$("#resive_sex").val(sexVal);
			$(".sex_box").css('display', 'none');
			$(".op").css('display', 'none');
		});
		// 关系弹出框
		$("#revise_connection").click(function() {
			$(".op").css({
				display: 'block'
			});
			$(".connect_s").css('display', 'block');
		});
		// 关系选择
		$(".connect_s li").click(function() {
			$(this).children('label').children('input').prop('checked','true');
			var conVal=$(this).children('label').children('input').val();
			$("#revise_connection").val(conVal);
			$(".connect_s").css('display', 'none');
			$(".op").css('display', 'none');
		});
		// 正则验证电话、姓名
		$("#resive_sub").click(function() {
			if ($("#revise_num").val()=="") {
				alert("请输入使用人的手机号！");
				return false;
			}else if(!isphone.test($("#revise_num").val())){
				alert("请输入有效的手机号码！");
				return false;
			}else{
				if ($("#resive_user").val()=="") {
					alert("请输入使用人的真实姓名！");
					return false;
				}else if(!isname.test($("#resive_user").val())){
					alert("请输入合法名字！");
					return false;
				}else{
					return true;
					$("#resive_sub").submit();
				}
			}
		});
	</script>
</body>
</html>