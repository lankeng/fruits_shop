<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="/fruits_shop/Public/css/fruit.css"/>
		<link rel="stylesheet" type="text/css" href="/fruits_shop/Public/css/style.css" media="screen" />
		<script type="text/javascript" src="/fruits_shop/Public/js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="/fruits_shop/Public/js/jquery.banner.revolution.min.js"></script>
		<script type="text/javascript" src="/fruits_shop/Public/js/banner.js"></script>
		<title></title>
		<script>
	$("#pwd2").blur(function(){ //失去焦点时判断
		if($(this).val() !== $("#pwd").val()){
			$(this).addClass('error');
		}else{
			$(this).removeClass('error');
		}
	});
	$("form").submit(function(){ //表单提交时判断
		if($("#pwd2").val() !== $("#pwd").val()){
			alert('两次输入密码不一致！');
			return false;
		}
	});
</script>
	</head>
	<body>
		<div class="page">
			<div class="header">
				<div class="head">
					<div class="headleft">
						<span class="cha1">Vegetables & Fruits & Beverage </span>
						<span class="cha2">
							百果园
						</span>
						<!--<span class="cha3">
							<a href="login.html" style="color: darkgray;">登录</a>
						</span>
						<span class="cha4">
							|
						</span>
						<span class="cha5">
							<a href="regisitration.html" style="color: darkgray;">注册</a>
						</span>
					--></div>
					<div class="headright">
						<a href="car.html"><img src="/fruits_shop/Public/image/mycar.jpg"/></a>
					</div>
				</div>
				<div class="nav">
					<ul>
						<li><a href="index.html">首页</a></li>
						<li><a href="#">进口水果</a></li>
						<li><a href="#">新鲜蔬菜</a></li>
						<li><a href="#">健康搭配</a></li>
						<li><a href="#">特价专场</a></li>
					</ul>
					
				</div>
				<div class="">
					<form >						
						<input type="text" value="  新鲜水果" class="search"/>
					</form>
				</div>
			</div>
			<div class="content">
				<div class="content1">
					<div class="food">
						<div class="food1">
							<p>所有食品分类</p>
						</div>
						<div class="food2">
							<ul>
								<li><a href="#">澳洲水果</a></li>
								<li><a href="#">奇异果</a></li>
								<li><a href="#">新奇士美国脐橙</a></li>
								<li><a href="#">苹果</a></li>
								<li><a href="#">澳洲水果</a></li>
								<li><a href="#">车厘子</a></li>
								<li><a href="#">热带水果</a></li>
							</ul>
						</div>
					</div>
					<div class="foodrun">
						<div class="wrapper">
							<div class="fullwidthbanner-container">
								<div class="fullwidthbanner">
									<ul>
										<li data-transition="3dcurtain-horizontal" data-slotamount="15" data-masterspeed="300">
											<img src="/fruits_shop/Public/image/slides/slide3.jpg" alt="" />									
										</li>
										<li data-transition="3dcurtain-vertical" data-slotamount="15" data-masterspeed="300" data-link="#">
											<img src="/fruits_shop/Public/image/slides/slide5.jpg" alt="" />
										</li>
										<li data-transition="papercut" data-slotamount="15" data-masterspeed="300" data-link="#">
											<img src="/fruits_shop/Public/image/slides/slide2.jpg" alt="" />
										</li>
										<li data-transition="turnoff" data-slotamount="15" data-masterspeed="300">
											<img src="/fruits_shop/Public/image/slides/slide1.jpg" alt="" />
										</li>	
										<li data-transition="flyin" data-slotamount="15" data-masterspeed="300">
											<img src="/fruits_shop/Public/image/slides/slide6.jpg" alt="" />	 
										</li>					
									</ul>
								</div>
							</div>
						</div>
						
						<div style="text-align:center;clear:both;">
						<script src="/fruits_shop/Public/gg_bd_ad_720x90.js" type="text/javascript"></script>
						<script src="/fruits_shop/Publicfollow.js" type="text/javascript"></script>
						</div>
					</div>
				</div>
				<div class="P2content2">
						<form action="" method="post">
							<label >用户名</label>	
							<input type="text" name="user" required class="logini" /><br>
							<label style="margin-left:16px">密码</label>
							<input type="password" name="pwd" id="pwd" required class="logini" style="margin-top:15px"/><br>
							<label style="margin-left:-16px">确认密码</label>
							<input type="password" name="pwd" id="pwd2" required class="logini" style="margin-top:15px"/><br>
							<label style="position:absolute;left:570px;top:642px;">验证码</label>	
							<input type="text" name="captcha" class="logini" style="position:absolute;left:625px;top:630px;width:300px"/>
							<img src="/fruits_shop/Home/User/captcha" onclick="this.src='/fruits_shop/Home/User/captcha/'+Math.random()" style="position:absolute;left:650px;top:690px;"/>
							<input type="submit" name="" class="subm" value="注册"  style="position:absolute;left:595px;top:770px;"/>
							<a href="/fruits_shop/Home/User/login" style="position:absolute;left:870px;top:850px;font-size: 15px;color: #838379;">返回登录</a>
						</form>
						
				</div>
			</div>
			<div class="footer" style="position: relative;top: 400px;">
				<img src="/fruits_shop/Public/image/footer.jpg"/>
			</div>
		</div>
	</body>
</html>