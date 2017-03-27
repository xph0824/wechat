<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />   
	<meta name="apple-mobile-web-app-status-bar-style" content="black" /> <meta name="format-detection" content="telephone=no" />
	<link rel="stylesheet" href="/wechat/Public/css/common.css">
</head>
<body>
	<div class="allbox">
		<ul class="signUp">
			<div class="brown"></div>
			<form action="" enctype="multipart/form-data" method="post" id="signUpForm" name="signUpForm">  
			        <li>
			            <label for="signUp_num">使用人电话：</label>
			            <input type="text" id="signUp_num" name="tel" placeholder="请输入使用人的电话" />
			        </li>
		            <li>
			            <label for="signUp_sex">使用人性别：</label>
			            <input type="text" id="signUp_sex" name="sex" value="男" readonly/>
			        </li>
			        <li>
			            <label for="signUp_user">使用人姓名：</label>
			            <input type="text" id="signUp_user" name="user" placeholder="请输入使用人的真实姓名" />
			        </li>
		            <li class="connectionLi">
			            <label for="connection">与您的关系：</label>
			            <input type="text" id="connection" name="cond" value="请选择与您的关系" readonly />
						<i class="connectionImg"></i>
			        </li>
					<li>
						<label for="signUp_sel">选择门店:</label>
						<select name="shop" id="signUp_sel">
						<?php if(is_array($nums)): $i = 0; $__LIST__ = $nums;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><option value ="<?php echo ($row['shop_number']); ?>"><?php echo ($row['shop_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</li>
			        <!-- 地区 -->
			        <li class="infolist">
	                    <label>详细地址：</label>
	                    <div class="liststyle">
	                        <span id="Province">
	                            <i>省</i>
	                            <ul>
	                                <li><a href="javascript:void(0)" alt="省">省</a></li>
	                            </ul>
								<b></b>
	                            <input type="hidden" name="cho_Province" value="省">
	                        </span>
	                        <span id="City">
	                            <i>市</i>
	                            <ul>
	                                <li><a href="javascript:void(0)" alt="市">市</a></li>
	                            </ul>
								<b></b>
	                            <input type="hidden" name="cho_City" value="市">
	                        </span>
	                        <span id="Area">
	                            <i>区</i>
	                            <ul>
	                                <li><a href="javascript:void(0)" alt="区">区</a></li>
	                            </ul>
								<b></b>
	                            <input type="hidden" name="cho_Area" value="区">
	                        </span>
	                    </div>
	                    <div class="clear"></div>
	                    <textarea name="addres" id="signUp_text" placeholder="请输入路名、街道地址、门牌号"></textarea>
	                </li>
	                <input type="submit" value="点击注册" id="signUp_sub">
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
	<script type="text/javascript" src="/wechat/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/wechat/Public/js/city.min.js"></script>
	<script type="text/javascript">
		var isphone= /^1[34578]\d{9}$/;
		var isname=/^[\u4E00-\u9FA5\uf900-\ufa2d]{2,10}$/;
		// 性别弹出框
		$(document).ready(function() {
			var hh=$(window).height();
			$(".signUp").height(hh);
			$(".op").css({
				height: hh,
				display: 'none'
			});
		});
		$("#signUp_sex").click(function() {
			$(".op").css({
				display: 'block'
			});
			$(".sex_box").css('display', 'block');
		});
		// 性别点击
		$(".sex_box li").click(function() {
			$(this).children('label').children('input').prop('checked','true');
			var sexVal=$(this).children('label').children('input').val();
			$("#signUp_sex").val(sexVal);
			$(".sex_box").css('display', 'none');
			$(".op").css('display', 'none');
		});
		// 关系弹出框
		$("#connection").click(function() {
			$(".op").css({
				display: 'block'
			});
			$(".connect_s").css('display', 'block');
			$(".connectionImg").css({
				background: 'url(/wechat/Public/img/up.png) 0 0 no-repeat',
				backgroundSize: '100%'
			})
			
		});
		// 关系选择
		$(".connect_s li").click(function() {
			$(this).children('label').children('input').prop('checked','true');
			var conVal=$(this).children('label').children('input').val();
			$("#connection").val(conVal);
			$(".connect_s").css('display', 'none');
			$(".op").css('display', 'none');
			$(".connectionImg").css({
				background: 'url(/wechat/Public/img/down.png) 0 0 no-repeat',
				backgroundSize: '100%'
			})
		});
		// 正则验证电话、姓名
		$("#signUp_sub").click(function() {
			if ($("#signUp_num").val()=="") {
				alert("请输入使用人的手机号！");
				return false;
			}else if(!isphone.test($("#signUp_num").val())){
				alert("请输入有效的手机号码！");
				return false;
			}else{
				if ($("#signUp_user").val()=="") {
					alert("请输入使用人的真实姓名！");
					return false;
				}else if(!isname.test($("#signUp_user").val())){
					alert("请输入合法名字！");
					return false;
				}else{
					return true;
					$("#signUp_sub").submit();
				}
			}
		});
	</script>
</body>
</html>