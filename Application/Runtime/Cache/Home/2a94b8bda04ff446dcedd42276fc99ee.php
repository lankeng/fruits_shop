<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="/fruits_shop/Public/css/fruit.css"/>
		<link rel="stylesheet" type="text/css" href="/fruits_shop/Public/css/style.css" media="screen" />
		<script type="text/javascript" src="/fruits_shop/Public/js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="/fruits_shop/Public/js/jquery.banner.revolution.min.js"></script>
		<script type="text/javascript" src="/fruits_shop/Public/js/banner.js"></script>
		<title></title>
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
						<?php if(isset($mid)): echo ($mname); ?>，欢迎来到百果园！[<a href="/fruits_shop/Home/User/logout">退出</a>]
						<?php else: ?>
						<span class="cha3">
							<a href="/fruits_shop/Home/User/login" style="color: darkgray;">登录</a>
						</span>
						<span class="cha4">
							|
						</span>
						<span class="cha5">
							<a href="/fruits_shop/Home/User/register" style="color: darkgray;">注册</a>
						</span><?php endif; ?>
					</div>
					<div class="headright">
						<a href="/fruits_shop/Home/Cart/index"><img src="/fruits_shop/Public/image/mycar.jpg"/></a>
					</div>
				</div>
				<div class="nav">
					<ul>
						<li><a href="/fruits_shop/">首页</a></li>
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
								<li><a href="">澳洲水果</a></li>
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
						<script src="/fruits_shop/Public/follow.js" type="text/javascript"></script>
						</div>
					</div>
				</div>
				<div class="content2">
					<a href=""><img src="/fruits_shop/Public/image/pic1.jpg"/></a>
					<a href=""><img src="/fruits_shop/Public/image/pic2.jpg" style="margin-left: 3px;"/></a>
					<a href=""><img src="/fruits_shop/Public/image/pic3.jpg" style="margin-left: 3px;"/></a>
					<a href=""><img src="/fruits_shop/Public/image/pic4.jpg" style="margin-left: 3px;"/></a>
				</div>
				<div class="content3">
					<div class="sty1">
						<a href="">进口水果</a>
					</div>
					<div class="sty1" style="margin-left: 47px;">
						<a href="">国产水果</a>
					</div>
					<div class="sty1" style="margin-left: 47px;">
						<a href="">新鲜蔬菜</a>
					</div>
					<div class="sty1" style="margin-left: 47px;">
						<a href="">热卖推荐</a>
					</div>
				</div>
				<div class="content4">
				<?php if(is_array($best)): foreach($best as $key=>$v): ?><div class="pice1" style="float:left;margin-left:35px;height:420px">
						<?php if(empty($v["thumb"])): ?><img src="/fruits_shop/Public/image/preview.jpg" style="width:456px;height:300px;"/><?php else: ?><img src="/fruits_shop/Public/uploads/thumb/<?php echo ($v["thumb"]); ?>" style="width:456px;height:300px;"><?php endif; ?>
						<div class="op">
							<div class="op1">					
								<p class="fot1"><?php echo ($v["gname"]); ?></p>
								<p class="fot2">
									<span class="fot4">￥<?php echo ($v["price"]); ?></span>
									<span class="fot6">￥28.00</span>
								</p>
								<div class="fot7">
									<a href="/fruits_shop/Home/Index/goods/id/<?php echo ($v["gid"]); ?>">购买</a>
								</div>
							</div>	
						</div>
					</div><?php endforeach; endif; ?>
				</div>
			</div>
			<div class="footer">
				<img src="/fruits_shop/Public/image/footer.jpg"/>
			</div>
		</div>
</body>
</html>